<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use \Bitrix\Main\Localization\Loc;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CatalogSectionComponent $component
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $componentPath
 *
 *  _________________________________________________________________________
 * |	Attention!
 * |	The following comments are for system use
 * |	and are required for the component to work correctly in ajax mode:
 * |	<!-- items-container -->
 * |	<!-- pagination-container -->
 * |	<!-- component-end -->
 */
?>

<div class="ecskurs_description">
	<?=$arResult['~DESCRIPTION']?>
</div>

<div class="sub_excskur_list">
	<?php foreach($arResult["ITEMS"] as $arItem):?>
        <a href="<?=$arItem['DETAIL_PAGE_URL']?>">
            <svg version="1.1" class="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                 viewBox="0 0 390 390" style="enable-background:new 0 0 390 390;" xml:space="preserve">
                <g class="XMLID_17_">
                    <path class="XMLID_18_" d="M365,95h-70.855l-15.1-40.267C276.85,48.878,271.253,45,265,45H125c-6.253,0-11.85,3.878-14.045,9.733
                        L95.855,95H25c-13.807,0-25,11.193-25,25v200c0,13.807,11.193,25,25,25h340c13.807,0,25-11.193,25-25V120
                        C390,106.193,378.807,95,365,95z M195,125c52.383,0,95,42.617,95,95s-42.617,95-95,95s-95-42.617-95-95S142.617,125,195,125z"/>
                    <path class="XMLID_21_" d="M130,220c0,35.841,29.159,65,65,65s65-29.159,65-65s-29.159-65-65-65S130,184.159,130,220z"/>
                </g>
            </svg>
            <?=$arItem['NAME']?>
        </a>
	<?endforeach?>
</div>
<br><br><br>
<div>
    <a href="<?=$arResult["LIST_PAGE_URL"]?>">Назад</a>
</div>
