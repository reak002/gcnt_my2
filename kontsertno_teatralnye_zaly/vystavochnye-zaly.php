<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Выставочные залы");
?><p>
	 В выставочном зале Государственного центра народного творчества и Сибирского культурного центра каждый день представлены произведения юных художников и их преподавателей, а также экспозиции русской традиционной культуры.
</p>
<p>
 <b>Площадь помещения 242,5 м</b><sup><b>2</b></sup>.
</p>
<p>
 <br>
</p>
<p>
	 <?$APPLICATION->IncludeComponent(
	"artproduct:gallery",
	"",
	Array(
		"CACHE_TIME" => "0",
		"CACHE_TYPE" => "A",
		"IBLOCK_ELEMENT_ID" => "115"
	)
);?><br>
</p><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>