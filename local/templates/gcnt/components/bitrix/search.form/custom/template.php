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
$this->setFrameMode(true);?>
<div class="search-form">
<form action="<?=$arResult["FORM_ACTION"]?>">
    <div>
		<?if($arParams["USE_SUGGEST"] === "Y"):?><?$APPLICATION->IncludeComponent(
			"bitrix:search.suggest.input",
			"custom",
			array(
				"NAME" => "q",
                    "VALUE" => "",
				"INPUT_SIZE" => 15,
				"DROPDOWN_SIZE" => 10,
				"PLACEHOLDER_TEXT" => $arParams['PLACEHOLDER_TEXT']?:'',
			),
			$component, array("HIDE_ICONS" => "Y")
		);?><?else:?><input type="text" name="q" value="" size="15" maxlength="50" <?=$arParams['PLACEHOLDER_TEXT']?'placeholder="'.$arParams['PLACEHOLDER_TEXT'].'"':''?> /><?endif;?>
    </div>
    <div>
        <input name="s" type="submit" value="<?=GetMessage("BSF_T_SEARCH_BUTTON");?>" />
    </div>
</form>
</div>