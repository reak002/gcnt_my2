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
<form class="custom_filter" name="<?echo $arResult["FILTER_NAME"]."_form"?>" action="<?echo $arResult["FORM_ACTION"]?>" method="get"  data-select="<?=$arResult['FILTER_TEXT']?>">
	<?foreach($arResult["ITEMS"] as $arItem):
		if(array_key_exists("HIDDEN", $arItem)):
			echo $arItem["INPUT"];
		endif;
	endforeach;?>

    <input type="hidden" name="set_filter" value="Y"/>


	<?foreach($arResult["ITEMS"] as $arItem):?>
	    <?if(!array_key_exists("HIDDEN", $arItem)):?>
            <input type="submit"
                   name="del_filter"
                   value="<?=GetMessage("IBLOCK_DEL_FILTER")?>"
                   class="btn red_btn<?=empty($arItem['INPUT_VALUE'])?' red_btn_inner':''?>"
            />
            <?if(!array_key_exists("HIDDEN", $arItem)):?>
                <select name="<?=$arItem['INPUT_NAME']?>[]" <?=empty($arItem['INPUT_VALUE'])?'class="no-select"':''?>>

                    <?foreach($arItem['LIST'] as $key => $item):?>

                        <?if(empty($key)):?>
                            <option <?=empty($arItem['INPUT_VALUE']) ? 'selected' : ''?> disabled value=''>
                                <?=$arItem['NAME']?>
                            </option>
                        <?else:?>
                            <option value="<?=$key?>" <?=!empty($arItem['INPUT_VALUE'])?(in_array($key,$arItem['INPUT_VALUE'])?'selected':''):(empty($key)?'selected':'');?>>
                                <?=$item?>
                            </option>
                        <?endif;?>
                    <?endforeach;?>
                </select>
            <?endif?>
		<?endif?>
	<?endforeach;?>
</form>
