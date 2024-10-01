<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Малый театральный зал");
?><p>
	 Малый театральный зал расположен на третьем этаже, расположенный недалеко от отдельного входа в Кинотеатр. Здесь удобно проведение семинаров, спектаклей, других небольших мероприятий.
</p>
<p>
 <b>Площадь помещения 116,6 м<sup><b>2</b></sup>.</b>
</p>
<p>
 <b><br>
 </b>
</p>
 <?$APPLICATION->IncludeComponent(
	"artproduct:gallery",
	"",
	Array(
		"CACHE_TIME" => "0",
		"CACHE_TYPE" => "A",
		"IBLOCK_ELEMENT_ID" => "113"
	)
);?><br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>