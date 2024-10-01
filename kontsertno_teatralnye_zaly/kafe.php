<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle(" Кафе");
?><p>
	 Уютное кафе расположено на первом этаже рядом с колонным залом. Вы можете приходить не только на «домашние обеды», но и заказать угощения для званых вечеров, концертов, фестивалей и ужинов.
</p>
<p>
 <b>Площадь помещения 115 м<sup><b>2</b></sup>.</b>
</p>
<p>
	<br>
</p>
<p>
</p>
 <?$APPLICATION->IncludeComponent(
	"artproduct:gallery",
	"",
	Array(
		"CACHE_TIME" => "0",
		"CACHE_TYPE" => "A",
		"IBLOCK_ELEMENT_ID" => "116"
	)
);?><br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>