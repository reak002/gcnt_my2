<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<div class="news-detail">
    <div class="top-block">
        <div class="right" >
<!--            <a href="#fb_form" class="btn red_btn_inner">ЗАПИСАТЬСЯ В КОЛЛЕКТИВ</a>-->
            <?foreach($arResult['PROPERTIES']['PATH']['VALUE'] as $path_of_masters):?>
                <div class="age">
                    <?=$path_of_masters?>
                </div>
            <?endforeach;?>
        </div>
        <div class="left">
            <?=$arResult['~PREVIEW_TEXT']?>
        </div>
    </div>

    <div style="clear: both;"></div>

</div>