<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
CModule::IncludeModule("iblock");

CModule::IncludeModule("iblock");

$dbIBlock = CIBlock::GetList(
	Array(),
	Array(
		"ACTIVE" => "Y",
		'TYPE'=> 'feedback',
		"CHECK_PERMISSIONS" => "N"
	),
	false
);

$IBlockElements =array();

while ($arBlock = $dbIBlock->Fetch())
{
	$dbIBlocks[$arBlock["ID"]] = "[".$arBlock["ID"]."] ".$arBlock["NAME"];
}

$arComponentParameters = array(
	"GROUPS" => array(
		"SETTINGS" => array(
			"NAME" => GetMessage("SETTINGS_PHR")
		),
	),
	"PARAMETERS" => array(
		"IS_AJAX" => array(
			"PARENT" => "SETTINGS",
			"NAME" => GetMessage("IS_AJAX_TXT"),
			"TYPE" => "LIST",
			"VALUES" => array(0=>'Нет',1=>'Да'),
			"REFRESH" => "Y"
		),
		"TEXT_MSG" => array(
			"PARENT" => "SETTINGS",
			"NAME" => GetMessage("S_MSG_TEXT"),
			"TYPE" => "STRING",
		),
		"CACHE_TIME" => array(),
	)
);
?>