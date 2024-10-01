<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
?>

<?$APPLICATION->IncludeComponent(
	"artproduct:suscribe",
	".default",
	array(
		"CACHE_TIME" => "0",
		"CACHE_TYPE" => "A",
		"TEXT_MSG" => "",
		"COMPONENT_TEMPLATE" => ".default",
		"IS_AJAX"=>1
	),
	false
);?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");?>