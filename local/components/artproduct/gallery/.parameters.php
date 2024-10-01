<?
CModule::IncludeModule("iblock");

$dbIBlockElement = CIBlockElement::GetList(
	Array("SORT"=>"ASC"),
	Array("ACTIVE" => "Y",'IBLOCK_CODE'=> 'galleries'),
	false,
 	false,
 	Array()
 );

while ($arBlockElement = $dbIBlockElement->Fetch())
{
	$dbIBlockElements[$arBlockElement["ID"]] = "[".$arBlockElement["ID"]."] ".$arBlockElement["NAME"];
}

$arComponentParameters = array(
	"GROUPS" => array(
		"SETTINGS" => array(
			"NAME" => GetMessage("SETTINGS_PHR")
		),
		"PARAMS" => array(
			"NAME" => GetMessage("PARAMS_PHR")
		),
	),
	"PARAMETERS" => array(
		"IBLOCK_ELEMENT_ID" => array(
			"PARENT" => "SETTINGS",
			"NAME" => GetMessage("ELEMENT_ID_TEXT"),
			"TYPE" => "LIST",
			"ADDITIONAL_VALUES" => "Y",
			"VALUES" => $dbIBlockElements,
			"REFRESH" => "Y"
		),
		"CACHE_TIME" => array(),
	)
);
?>