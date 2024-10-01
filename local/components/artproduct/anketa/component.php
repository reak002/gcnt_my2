<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/**
 * @var $arParams
 */

use Bitrix\Main\Mail\Event;
use Bitrix\Main\Config\Option;
CModule::IncludeModule("iblock");
if(!empty($arParams['IBLOCK_ID'])){
	$bufferProperty = array();

	$groutBuffer = array();

	$rsProperty = CIBlockProperty::GetList(
		array('sort'=>'asc'),
		array(
			'IBLOCK_ID' => $arParams['IBLOCK_ID'],
			'ACTIVE' => 'Y',
			'DETAIL_PAGE_SHOW' => 'Y'
		)
	);

	while($element = $rsProperty->Fetch()) {


		if($groupCode = explode('__',$element['CODE'])[0]){
			$positionNumber = 0;
			if($positionNumberBuf = explode('_',$groupCode)[1]){
				$positionNumber = $positionNumberBuf;
			}
			if(!array_key_exists($groupCode,$groutBuffer)){
				$group_element = array();

				$group_element['CODE'] = $groupCode;
				$group_element['POSITION'] = $positionNumber;

				if(!empty($arParams['TITLE_LIST'][$groupCode])){
					$group_element['TITLE'] = $arParams['TITLE_LIST'][$groupCode];
				}
				else{
					$group_element['TITLE'] = GetMessage('EL_TITLE_TEXT').$positionNumber;
				}

				$subGroupContainer = explode('__',$element['CODE'])[1];
				if($sub_group = explode('_',$subGroupContainer)[0]){
					$group_element['SUB_GROUP'] = $sub_group;
				}
				else{
					$group_element['SUB_GROUP'] = false;
				}

				$groutBuffer[$groupCode] = $group_element;
			}
			$groutBuffer[$groupCode]['ITEMS'][$element['CODE']] = $element;
			$bufferProperty[$element['CODE']] = $element;
		}else{
			continue;
		}

		if($element['PROPERTY_TYPE'] == 'L'){
			$property_value_list = CIBlockPropertyEnum::GetList(
				array('sort'=>'asc'),
				array(
					"IBLOCK_ID" => $arParams['IBLOCK_ID'],
					"CODE" => $element['CODE']
				)
			);
			while ($property_value = $property_value_list->Fetch()){
				$groutBuffer[$groupCode]['ITEMS'][$element['CODE']]['V_LIST'][$property_value['ID']] = $property_value;
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
				$groutBuffer[$groupCode]['ITEMS'][$element['CODE']]['V_LIST'][$arFields['ID']] = $arFields;
				$bufferProperty[$element['CODE']]['V_LIST'][$property_value['ID']] = $arFields;
			}
		}
	}
	$arResult['GROUP'] = $groutBuffer;

	if(check_bitrix_sessid()){

		$el = new CIBlockElement;
		$PROP = array();
		$arFeedForm = array();

		$SOCIAL_PLACE = '';
		$SOCIAL_STAT = '';

		foreach($_REQUEST as $key => $order){
			if(!empty($bufferProperty[$key])){

				if($bufferProperty[$key]['PROPERTY_TYPE'] != 'L'){
					if($key == 'G_1__EVENT_DATE'){
						$arFeedForm[$key] = date('d.m.Y',strtotime($order));
					}
					elseif(strpos($key,'G_12__PERSSTATUS_')!==false){
						$SOCIAL_PLACE  .= $order;
					}
					else{
						$arFeedForm[$key] = $order;
					}
				}
				else{
					if(strpos($key,'G_12__PERSSTATUS')!==false){
						$SOCIAL_STAT .= ' '.$bufferProperty[$key]['V_LIST'][$order[0]]['VALUE'];
					}
					elseif($key == 'G_1__EVENT_PLACE'){
						$arFeedForm[$key] = $bufferProperty[$key]['V_LIST'][$order]['VALUE'];
					}
					else{
						$arFeedForm[$key] = $bufferProperty[$key]['V_LIST'][$order[0]]['VALUE'];
					}
				}
			}
		}



		$arFeedForm['SOCIAL_STATUS'] = $SOCIAL_STAT.', '.$SOCIAL_PLACE;

		$arLoadProductArray = Array(
			"IBLOCK_SECTION_ID" => false,          // элемент лежит в корне раздела
			"IBLOCK_ID"      => $arParams['IBLOCK_ID'],
			"PROPERTY_VALUES"=> $PROP,
			"NAME"           => GetMessage('EL_NAME_TEXT').date('d.m.Y H:i:s'),
			"ACTIVE"         => "Y",            // активен
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
					$arResult['RESULT_MSG'] = $arParams['TEXT_MSG'] ? :GetMessage('S_MSG');
					$arResult['RESULT_MSG_TYPE'] = true;

					$SITE_ID = 's1';
					$EVEN_TYPE = 'NEW_ANKETA';

					$arFeedForm["LINK"] = '/bitrix/admin/iblock_element_edit.php?IBLOCK_ID=' . $arParams['IBLOCK_ID'] . '&type=feedback&lang=ru&ID=' . $PRODUCT_ID . 'find_section_section=-1&WF=Y';

					Event::send(array(
						'MESSAGE_ID' => 52,
						"EVENT_NAME" => $EVEN_TYPE,
						"LID" => $SITE_ID,
						"C_FIELDS" => $arFeedForm,
					));

				}
				else{
					//			echo "Error: ".$el->LAST_ERROR;
					$arResult['RESULT_MSG'] = GetMessage('E_MSG');
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
