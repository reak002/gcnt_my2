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

$arParamsTrans = array("replace_space"=>"_","replace_other"=>"_");
?>
<form name="<?echo $arResult["FILTER_NAME"]."_form"?>" action="<?echo $arResult["FORM_ACTION"]?>" method="get" data-select="<?=$arResult['FILTER_TEXT']?>">
	<?foreach($arResult["ITEMS"] as $arItem):
		if(array_key_exists("HIDDEN", $arItem)):
			echo $arItem["INPUT"];
		endif;
	endforeach;?>
    <?foreach($arResult["ITEMS"] as $arItem):?>
        <?if(!array_key_exists("HIDDEN", $arItem)):?>
            <div class="filter_element_list">
                <?foreach($arItem['LIST'] as $key => $item):?>
                    <div class="filter_element">
                        <input type="radio"
                               name="<?=$arItem['INPUT_NAME']?>"
                            <?=!empty($arItem['INPUT_VALUE'])?($key==$arItem['INPUT_VALUE']?'checked':''):(empty($key)?'checked':'');?>
                               id="<?=Cutil::translit($item,"ru",$arParamsTrans)?>_<?=Cutil::translit($arItem['INPUT_NAME'],"ru",$arParamsTrans)?>"
                               value="<?=$key?>"
                        >
                        <label for="<?=Cutil::translit($item,"ru",$arParamsTrans)?>_<?=Cutil::translit($arItem['INPUT_NAME'],"ru",$arParamsTrans)?>">
                            <?=$item?>
                        </label>
                    </div>
                <?endforeach;?>
            </div>
        <?endif?>
    <?endforeach;?>
    <input type="hidden" name="set_filter" value="Y" />&nbsp;
</form>
