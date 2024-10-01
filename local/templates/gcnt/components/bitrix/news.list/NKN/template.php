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
                    <li class="one_new"
                        id="<?=$this->GetEditAreaId($arItem['ID']);?>"
                    >
                        <a class="visible_place" href="<?=$arItem['DETAIL_PAGE_URL']?>">
                            <div class="img_wrapper">
                                <img
                                        class="preview_picture"
                                        src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
                                        alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
                                        title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
                                />
                                <div class="type_list">
                                    <?foreach($arItem['PROPERTIES']['TYPE']['VALUE'] as $action_type):?>
                                        <div class="one_type"><?=$action_type?></div>
                                    <?endforeach;?>
                                </div>
                            </div>
                            <div class="name"><?=$arItem["NAME"]?></div>
                            <div class="staff district">
                                <?=$arItem['PROPERTIES']['DISTRICT']['VALUE']?>
                            </div>
                            <div class="staff group">
                                <?=$arItem['PROPERTIES']['GROUP']['VALUE']?>
                            </div>
                            <div class="staff category">
                                <?=$arItem['PROPERTIES']['CATEGORY']['VALUE']?>
                            </div>
                        </a>
                    </li>
				<?endforeach;?>
            </ul>
        </div>
    </div>
</div>

