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
        <div class="right">
            <a href="#fb_form" id="to_invite" class="btn red_btn_inner">ЗАПИСАТЬСЯ В КОЛЛЕКТИВ</a>
            <?if(!empty($arResult['PROPERTIES']['AGE_FROM']['VALUE'])):?>
                <div class="age">
                    <?=GetMessage('TXT_AGE_FROM')?> <?=$arResult['PROPERTIES']['AGE_FROM']['VALUE']?>
                </div>
            <?endif;?>
        </div>
        <div class="left">
            <?=$arResult['~PREVIEW_TEXT']?>
        </div>
    </div>

    <div style="clear: both;"></div>

    <div class="feedback_container" id="fb_form">
        <span class="form_title">Записаться в коллектив</span>
        <input type="hidden" value="<?=$arResult['ID']?>" name="COLECTIVE_ID">
		<?$APPLICATION->IncludeComponent(
			"artproduct:feedback",
			".default",
			array(
				"CACHE_TIME" => "0",
				"CACHE_TYPE" => "A",
				"IBLOCK_ID" => 29,
				"TEXT_MSG" => "",
				"COMPONENT_TEMPLATE" => ".default",
				"IS_AJAX"=>0,
                "HIDE_MSG_BLOCK"=>1,
                "HASH_LINK"=>'#fb_form',
			),
			false
		);?>
    </div>

</div>