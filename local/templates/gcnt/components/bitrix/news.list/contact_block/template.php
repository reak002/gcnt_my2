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
<div class="contact_block">
    <?if($arParams['SHOW_PAGER_TITLE'] === 'Y'):?>
        <div class="pager_title"><?=$arParams['PAGER_TITLE']?></div>
    <?endif;?>
    <div class="tabs_wrapper">
        <div class="header">
			<?foreach($arResult["ITEMS"] as $key => $arItem):?>
				<?
				$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
				$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
				?>
                <div data-tab-id="<?=$arItem['ID']?>" id="<?=$this->GetEditAreaId($arItem['ID']);?>" class="name<?=$key==0?' active':'';?>">
					<?=$arItem['~PREVIEW_TEXT']?>
                </div>
			<?endforeach;?>
        </div>
        <div class="blocks">
			<?foreach($arResult["ITEMS"] as $key => $arItem):?>
                <div id="tab_<?=$arItem['ID']?>" class="block<?=$key==0?' active':'';?>">
                    <div class="text">
                        <div class="address">
                            <div class="block_name"><?=GetMessage('CT_BNL_ELEMENT_ADDRESS')?></div>
                            <?if(!empty($arItem['PROPERTIES']['ADDRESS']['DESCRIPTION'])):?>
                                <a href="<?=$arItem['PROPERTIES']['ADDRESS']['DESCRIPTION']?>" target="_blank" rel="nofollow">
									<?=$arItem['PROPERTIES']['ADDRESS']['VALUE']?>
                                </a>
                            <?else:?>
                                <span>
                                    <?=$arItem['PROPERTIES']['ADDRESS']['VALUE']?>
                                </span>
                            <?endif;?>
                        </div>
                        <div class="phone">
                            <div class="block_name"><?=GetMessage('CT_BNL_ELEMENT_PHONE')?></div>
                            <?foreach($arItem['PROPERTIES']['PHONE']['VALUE'] as $p_key => $phone):?>
                            <a
                                class="phone"
                                href="tel:+<?=preg_replace('~\D+~','', $phone)?>"
                            >
                                <?=implode(' ',array($phone,$arItem['PROPERTIES']['PHONE']['DESCRIPTION'][$p_key]))?>
                            </a>
                            <?endforeach;?>
                        </div>
                        <div class="work_time">
                            <div class="block_name"><?=GetMessage('CT_BNL_ELEMENT_WORK_TIME')?></div>
							<?foreach($arItem['PROPERTIES']['WORK_TIME']['VALUE'] as $work_time):?>
                                <div>
									<?=$work_time?>
                                </div>
							<?endforeach;?>
                        </div>
                    </div>
                    <div class="map">
						<?=$arItem['~DETAIL_TEXT']?>
                    </div>
                </div>
			<?endforeach;?>
        </div>
    </div>
</div>
