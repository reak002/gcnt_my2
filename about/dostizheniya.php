<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Достижения");
?><h2 style="text-align: left;">Награды Учреждения</h2>
 <br>
 <?$APPLICATION->IncludeComponent(
	"artproduct:gallery",
	"",
	Array(
		"CACHE_TIME" => "0",
		"CACHE_TYPE" => "A",
		"IBLOCK_ELEMENT_ID" => "122"
	)
);?><br>
<h2 style="text-align: left;">Награды коллективов</h2>
 <br>
 <?$APPLICATION->IncludeComponent(
	"artproduct:gallery",
	"",
	Array(
		"CACHE_TIME" => "0",
		"CACHE_TYPE" => "A",
		"IBLOCK_ELEMENT_ID" => "120"
	)
);?><br>
<h2 style="text-align: left;">Награды сотрудников</h2>
 <br>
 <?$APPLICATION->IncludeComponent(
	"artproduct:gallery",
	"",
	Array(
		"CACHE_TIME" => "0",
		"CACHE_TYPE" => "A",
		"IBLOCK_ELEMENT_ID" => "121"
	)
);?><br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>