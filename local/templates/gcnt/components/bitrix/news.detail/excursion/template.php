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

	<?if(
		!empty($arResult["PROPERTIES"]["GALLERY"]["VALUE"]) &&
		$arResult["PROPERTIES"]["GALLERY_POSITION"]["VALUE_XML_ID"]=="TOP"
	):?>
		<?$APPLICATION->IncludeComponent(
			"artproduct:gallery",
			"",
			Array(
				"CACHE_TIME" => "0",
				"CACHE_TYPE" => "A",
				"IBLOCK_ELEMENT_ID" => $arResult["PROPERTIES"]["GALLERY"]["VALUE"]
			)
		);?>
        <br>
	<?endif;?>

	<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["DETAIL_PICTURE"])):?>
		<img
			class="detail_picture"
			border="0"
			src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>"
			width="<?=$arResult["DETAIL_PICTURE"]["WIDTH"]?>"
			height="<?=$arResult["DETAIL_PICTURE"]["HEIGHT"]?>"
			alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>"
			title="<?=$arResult["DETAIL_PICTURE"]["TITLE"]?>"
			/><br>
	<?endif?>

    <div>
		<?echo $arResult["~DETAIL_TEXT"];?>
    </div>
	<div style="clear:both"></div>
	<?if(
		!empty($arResult["PROPERTIES"]["GALLERY"]["VALUE"]) &&
		$arResult["PROPERTIES"]["GALLERY_POSITION"]["VALUE_XML_ID"]=="BOTTOM"
	):?>
        <br>
		<?$APPLICATION->IncludeComponent(
			"artproduct:gallery",
			"",
			Array(
				"CACHE_TIME" => "0",
				"CACHE_TYPE" => "A",
				"IBLOCK_ELEMENT_ID" => $arResult["PROPERTIES"]["GALLERY"]["VALUE"]
			)
		);?>
        <br>
	<?endif;?>
</div>