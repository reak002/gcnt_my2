<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle(" Колонный зал");
?><p>
	 Колонный зал имеет обширное пространство для званых вечеров, концертов, фестивалей, ужинов, и т.д.
</p>
<p>
 <b>Колонный зал 334,2 м</b><sup><b>2</b></sup><b> </b>
</p>
 <b> </b> <b>
<p>
	 Оборудование:
</p>
 </b>
<ul>
	<li>Акустическая система "Fender" FE 126889</li>
	<li>Светильник ПРОЖЕКТОР ГАЛОГЕН 500 ВТ</li>
	<li>Интеллектуальный прибор с движущимся зеркалом DJ-Scan 576</li>
</ul>
<br>
 <?$APPLICATION->IncludeComponent(
	"artproduct:gallery",
	"",
	Array(
		"CACHE_TIME" => "0",
		"CACHE_TYPE" => "A",
		"IBLOCK_ELEMENT_ID" => "114"
	)
);?><br>
<p>
</p>
 <br>
 <br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>