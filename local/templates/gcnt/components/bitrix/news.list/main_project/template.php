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
<div class="news_wrapper">
	<?if($arParams['SHOW_PAGER_TITLE'] == 'Y'):?>
        <div class="block_title"><?=$arParams['PAGER_TITLE']?></div>
    <?endif;?>
    <div class="news_list">
        <div>
            <ul>
				<?foreach($arResult["ITEMS"] as $arItem):?>
					<?
					$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
					$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
					?>
                    <li class="one_new" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                        <div class="visible_place">
                            <img
                                    class="preview_picture"
                                    src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
                                    alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
                                    title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
                            />
<!--                            <div class="date">--><?//=$arItem['DISPLAY_ACTIVE_FROM']?><!--</div>-->
                            <div class="name"><?=$arItem["NAME"]?></div>
                        </div>
                        <div class="invisible_place">
<!--                            <div class="date">--><?//=$arItem['DISPLAY_ACTIVE_FROM']?><!--</div>-->
                            <div class="name"><?=$arItem["NAME"]?></div>
                            <div class="preview_text"><?=$arItem['~PREVIEW_TEXT']?></div>
                            <div class="link">
                                <a href="<?=$arItem['DETAIL_PAGE_URL']?>">
                                    <?=GetMessage('DETAIL_TEXT_LINK')?>
                                    <svg width="30" height="8" viewBox="0 0 30 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M29.3536 4.35355C29.5488 4.15829 29.5488 3.84171 29.3536 3.64645L26.1716 0.464466C25.9763 0.269204 25.6597 0.269204 25.4645 0.464466C25.2692 0.659728 25.2692 0.976311 25.4645 1.17157L28.2929 4L25.4645 6.82843C25.2692 7.02369 25.2692 7.34027 25.4645 7.53553C25.6597 7.7308 25.9763 7.7308 26.1716 7.53553L29.3536 4.35355ZM0 4.5H29V3.5H0V4.5Z" fill="white"/>
                                    </svg>
                                </a></div>
                        </div>
                    </li>
				<?endforeach;?>
            </ul>
        </div>
    </div>
</div>