<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
?>

<?$APPLICATION->IncludeComponent(
	"artproduct:feedback",
	".default",
	array(
		"CACHE_TIME" => "0",
		"CACHE_TYPE" => "A",
		"IBLOCK_ID" => $_REQUEST['IB_ID'],
		"TEXT_MSG" => "",
		"COMPONENT_TEMPLATE" => ".default",
		"IS_AJAX"=>1,
		"HIDE_MSG_BLOCK"=>$_REQUEST['HIDE_MSG']=='Y'?1:0
	),
	false
);?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");?>