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
<div class="region_map">
    <svg xmlns="http://www.w3.org/2000/svg" width="542" height="850" viewBox="0 0 542 850" fill="none">
        <?foreach($arResult["ITEMS"] as $arItem):?>
            <?
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
//			var_dump($arItem['PROPERTIES']);
            ?>
            <path id="<?=$this->GetEditAreaID($arItem['ID'])?>"
                   d="<?=$arItem['~PREVIEW_TEXT']?>"
                   data-kdu-value="http://<?=$arItem['PROPERTIES']['KDU']['VALUE']?:'/kdu/'?>"
                   data-ctrk-value="http://<?=$arItem['PROPERTIES']['CTRK']['VALUE']?:'/ctrk/'?>"
                   data-name="<?=$arItem['NAME']?>"
                   fill="#f1f1f1"
                   stroke="#BCBCBC"
                   stroke-width="0.576446"
                   stroke-linecap="round"
                   stroke-linejoin="round"
                    data-hovered="false"
            />
        <?endforeach;?>
    </svg>
    <div class="popup_map" style="display: none;">
        <div class="name"></div>
        <div class="link_block">
            <a class="kdu" target="_blank" href="#">КДУ</a>
            <a class="ctrk" target="_blank" href="#">ЦТРК</a>
        </div>
        <div class="bottom_arrow">
            <svg width="12" height="9" viewBox="0 0 12 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M6 9L0.803849 -9.78799e-07L11.1962 -7.02746e-08L6 9Z" fill="white"/>
            </svg>
        </div>
    </div>
</div>
