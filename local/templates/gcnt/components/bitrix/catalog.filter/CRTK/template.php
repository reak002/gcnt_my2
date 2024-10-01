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
<form class="custom_filter" name="<?echo $arResult["FILTER_NAME"]."_form"?>" action="<?echo $arResult["FORM_ACTION"]?>" method="get">
	<?foreach($arResult["ITEMS"] as $arItem):
		if(array_key_exists("HIDDEN", $arItem)):
			echo $arItem["INPUT"];
		endif;
	endforeach;?>

    <input type="hidden" name="set_filter" value="Y"/>
    <?$GET_ALL=true;?>
	<?foreach($arResult["ITEMS"] as $arItem):?>
        <?if(!empty($arItem['INPUT_VALUE'])):?>
            <?$GET_ALL=false;?>
            <?break;?>
		<?endif;?>
	<?endforeach;?>
    <input type="submit"
           name="del_filter"
           value="<?=GetMessage("IBLOCK_DEL_FILTER")?>"
           class="btn red_btn<?= $GET_ALL ? ' red_btn_inner':''?>"
    />

	<?foreach($arResult["ITEMS"] as $arItem):?>
        <?if(!array_key_exists("HIDDEN", $arItem)):?>
            <select name="<?=$arItem['INPUT_NAME']?>" <?=empty($arItem['INPUT_VALUE'])?'class="no-select"':''?>>

                <?foreach($arItem['LIST'] as $key => $item):?>

                    <?if(empty($key)):?>
                        <option <?=empty($arItem['INPUT_VALUE']) ? 'selected' : ''?> disabled value=''>
                            <?=$arItem['NAME']?>
                        </option>
                    <?else:?>
                        <option value="<?=$key?>" <?=!empty($arItem['INPUT_VALUE'])?($key ==$arItem['INPUT_VALUE']?'selected':''):(empty($key)?'selected':'');?>>
                            <?=$item?>
                        </option>
                    <?endif;?>
                <?endforeach;?>
            </select>
        <?endif?>
	<?endforeach;?>
</form>
