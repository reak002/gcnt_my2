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
<div class="accordion section_list">
	<?foreach($arResult["ITEMS"] as $arSectItem): //Цикл для вывода категорий?>
		<? if(!empty($arSectItem['ELEMENTS'])):?>
            <div class="section">
                <div class="section_name">
                    <?= $arSectItem['NAME']?>
                    <span class="action_btn">
                        <svg width="25" height="26" viewBox="0 0 25 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M24.0234 11.6904H13.4766V0.990716C13.4766 0.443543 13.0394 0 12.5 0C11.9606 0 11.5234 0.443543 11.5234 0.990716V11.6904H0.976562C0.437207 11.6904 0 12.134 0 12.6812C0 13.2283 0.437207 13.6719 0.976562 13.6719H11.5234V24.3716C11.5234 24.9188 11.9606 25.3623 12.5 25.3623C13.0394 25.3623 13.4766 24.9188 13.4766 24.3716V13.6719H24.0234C24.5628 13.6719 25 13.2283 25 12.6812C25 12.134 24.5628 11.6904 24.0234 11.6904Z" fill="#454545"/>
                        </svg>
                    </span>
                </div>
                <div class="section_body">
                    <div class="section_description">
						<?= $arSectItem['~DESCRIPTION']?>
                    </div>
                    <div class="elements_list">
						<? foreach($arSectItem['ELEMENTS'] as $arItem): //цикли для элементов?>
							<?
							$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
							$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
							?>
                            <div class="element" id="<?=$this->GetEditAreaId($arItem['ID']);?>" >
								<?if(!empty($arItem["PREVIEW_PICTURE"]["SRC"])):?>
                                    <img src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>" atl="фото <?=$arItem["NAME"]?>" />
								<?else:?>
                                    <img class="img_default" src="<?=$templateFolder?>/assets/img/plate_bg.svg" atl="фото <?=$arItem["NAME"]?>" />
<!--                                    <div class="img_default">-->
<!---->
<!--                                    </div>-->
								<?endif;?>
                                <div class="element_name"><?=$arItem["NAME"]?></div>
                                <div class="element_status"><?=$arItem["~PREVIEW_TEXT"]?></div>
                            </div>
						<? endforeach ?>
                        <div style="clear: both;"></div>
                    </div>
                </div>
            </div>
		<? endif ?>
	<?endforeach;?>
</div>
