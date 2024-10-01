<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/**
 * @var $arParams
 */

use Bitrix\Main\Mail\Event;
use Bitrix\Main\Config\Option;

CModule::IncludeModule("iblock");
if(!empty($arParams['IBLOCK_ID'])){
	$bufferProperty = array();

	$rsProperty = CIBlockProperty::GetList(
		array('sort'=>'asc'),
		array(
			'IBLOCK_ID' => $arParams['IBLOCK_ID'],
			'ACTIVE' => 'Y',
			'DETAIL_PAGE_SHOW' => 'Y'
		)
	);

	while($element = $rsProperty->Fetch()) {

		$bufferProperty[$element['CODE']] = $element;


		if($element['PROPERTY_TYPE'] == 'L'){
			$property_value_list = CIBlockPropertyEnum::GetList(
				array('sort'=>'asc'),
				array(
				"IBLOCK_ID" => $arParams['IBLOCK_ID'],
				"CODE" => $element['CODE']
				)
			);
			while ($property_value = $property_value_list->Fetch()){
				$bufferProperty[$element['CODE']]['V_LIST'][$property_value['ID']] = $property_value;
			}
		}
		elseif($element['PROPERTY_TYPE'] == 'E'){
			$ibId = $element['LINK_IBLOCK_ID'];
			$arSelect = Array("ID", "NAME", "CODE");
			$arFilter = Array("IBLOCK_ID"=>IntVal($element['LINK_IBLOCK_ID']), "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
			$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
			while($ob = $res->GetNextElement()) {
				$arFields = $ob->GetFields();
				$bufferProperty[$element['CODE']]['V_LIST'][$arFields['ID']] = $arFields;
			}
		}
	}
	$arResult['PROPERTIES'] = $bufferProperty;

	if(check_bitrix_sessid()){

		$el = new CIBlockElement;
		$PROP = array();
		$MAIL_MSG = '';

		foreach($_REQUEST as $key => $order){
			if(!empty($bufferProperty[$key])){
				$PROP[$bufferProperty[$key]['ID']] = $order;

				if($bufferProperty[$key]['PROPERTY_TYPE'] === 'E'){
					$MAIL_MSG .= $bufferProperty[$key]['NAME']. ': '.$bufferProperty[$key]['V_LIST'][$order]['NAME'].PHP_EOL;
				}
				elseif($bufferProperty[$key]['PROPERTY_TYPE'] === 'L'){
					$MAIL_MSG .= $bufferProperty[$key]['NAME']. ': '.$bufferProperty[$key]['V_LIST'][$order]['VALUE'].PHP_EOL;
				}
				else{
					$MAIL_MSG .= $bufferProperty[$key]['NAME']. ': '.$order.PHP_EOL;
				}

			}
		}

		$MAIL_MSG .= GetMessage('MSG_MAIL_TXT').$_REQUEST['DETAIL_TEXT'];

		$arLoadProductArray = Array(
			"IBLOCK_SECTION_ID" => false,          // элемент лежит в корне раздела
			"IBLOCK_ID"      => $arParams['IBLOCK_ID'],
			"PROPERTY_VALUES"=> $PROP,
			"NAME"           => GetMessage('EL_NAME_TEXT').date('d.m.Y H:i:s'),
//			"ACTIVE"         => "Y",            // активен
			"DETAIL_TEXT"    => $_REQUEST['DETAIL_TEXT'],
			"ACTIVE" => $arParams['IBLOCK_ID'] == 26 ? "N" : "Y",
		);

		global $APPLICATION;
		if($_REQUEST['g-recaptcha-response']){
			$_SECRETKEY = Option::get("artproduct.recaptcha", "SECRETKEY");
			$httpClient = new \Bitrix\Main\Web\HttpClient;
			$result = $httpClient->post(
				'https://www.google.com/recaptcha/api/siteverify',
				array(
					'secret' => $_SECRETKEY,
					'response' => $_REQUEST['g-recaptcha-response'],
					'remoteip' => $_SERVER['HTTP_X_REAL_IP']
				)
			);
			$result = json_decode($result, true);
			if($result['success'] !== true){
				$arResult['RESULT_MSG'] = GetMessage('E_MSG');
				$arResult['RESULT_MSG_TYPE'] = false;
				$APPLICATION->throwException("Вы не прошли проверку подтверждения личности");
				return false;
			}
			else{
				if($PRODUCT_ID = $el->Add($arLoadProductArray)){
					$arResult['RESULT_MSG'] = $arParams['TEXT_MSG']?:GetMessage('S_MSG');
					$arResult['RESULT_MSG_TYPE'] = true;

					$SITE_ID = 's1';
					$EVEN_TYPE = 'NEW_FEEDBACK';

					$arFeedForm = array(
						"TEXT" => $MAIL_MSG,
						"LINK" => '/bitrix/admin/iblock_element_edit.php?IBLOCK_ID='.$arParams['IBLOCK_ID'].'&type=feedback&lang=ru&ID='.$PRODUCT_ID.'find_section_section=-1&WF=Y'
					);

					Event::send(array(
						'MESSAGE_ID' => 50,
						"EVENT_NAME" => $EVEN_TYPE,
						"LID" => $SITE_ID,
						"C_FIELDS" => $arFeedForm,
					));


				}
				else{
					$arResult['RESULT_MSG'] = GetMessage('E_MSG_CAPTCHA');
					$arResult['RESULT_MSG_TYPE'] = false;
				}
			}
		}else{
			$arResult['RESULT_MSG'] = GetMessage('E_MSG_CAPTCHA');
			$arResult['RESULT_MSG_TYPE'] = false;
			$APPLICATION->throwException("Вы не прошли проверку подтверждения личности");
			return false;
		}

	}
}

$this->IncludeComponentTemplate();



