<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/**
 * @var $arParams
 */

if(check_bitrix_sessid() ){
	if(CModule::IncludeModule('subscribe') && !empty($_REQUEST['email'])){

		$email = $_REQUEST['email'];
		global $USER;
		$subscribeFields = array(
			"USER_ID" => ($USER->IsAuthorized() ? $USER->GetID() :false),
			"FORMAT" => "html",
			"EMAIL" => $email,
			"ACTIVE" => "Y",
			"CONFIRMED" => 'Y',//($USER->IsAuthorized() ? "Y" :"N"),
			"SEND_CONFIRM" => 'N',//($USER->IsAuthorized() ? "N" :"Y"),
			"RUB_ID" => array(1)
		);

		$rsSub = CSubscription::GetByEmail($email);
		$arSub = $rsSub->Fetch();
		if($arSub === false){
			$subscr = new CSubscription;
			$ID = $subscr->Add($subscribeFields);

			if($ID > 0){
//			CSubscription::Authorize($ID);
				$arResult['RESULT_MSG'] = $arParams['TEXT_MSG']?:GetMessage('S_MSG');
				$arResult['RESULT_MSG_TYPE'] = true;
			}
			else{
				$arResult['RESULT_MSG'] = GetMessage('E_MSG');
				$arResult['RESULT_MSG_TYPE'] = false;
			}
		}
		else{
			$arResult['RESULT_MSG'] = GetMessage('E_MSG_UZE');
			$arResult['RESULT_MSG_TYPE'] = false;
		}


	}
}

$this->IncludeComponentTemplate();
