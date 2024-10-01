<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');

CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetTitle("404 Not Found");

?>

	<div style="
        text-align: center;
        color: var(--main-color);
        font: normal 700 40px/90px 'Candara';
        padding: 50px 0;
    "
	>Cтраница в разработке!</div>

<?php

//$APPLICATION->IncludeComponent("bitrix:main.map", ".default", Array(
//	"LEVEL"	=>	"3",
//	"COL_NUM"	=>	"2",
//	"SHOW_DESCRIPTION"	=>	"Y",
//	"SET_TITLE"	=>	"Y",
//	"CACHE_TIME"	=>	"36000000"
//	)
//);

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>