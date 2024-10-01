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
<?$APPLICATION->AddHeadString('<meta name="viewport" content="width=device-width, initial-scale=1.0" />',true)?>
<?$APPLICATION->AddHeadString('<link type="text/css" rel="stylesheet" href="//cdn.kassy.ru/widget/wrap_widget.css?ver=3" />',true)?>
<?$APPLICATION->AddHeadString('<script src="//cdn.kassy.ru/widget/wrap_widget.js?ver=3"></script>',true)?>
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
                        <a class="visible_place" href="<?=$arItem['DETAIL_PAGE_URL']?>" data-age-limit="<?=$arItem['PROPERTIES']['AGE_LIMIT']['VALUE']?>">
                            <div class="img_wrapper">
                                <img
                                        class="preview_picture"
                                        src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
                                        alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
                                        title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
                                />
                                <div class="type_list">
<!--                                    --><?//foreach($arItem['PROPERTIES']['TYPE']['VALUE'] as $action_type):?>
                                        <div class="one_type"><?=$arItem['PROPERTIES']['TYPE']['VALUE']?></div>
<!--                                    --><?//endforeach;?>
                                </div>
                            </div>
                            <div class="info">
                                <div class="line_first">
                                    <div class="left">
                                        <div class="date"><?=FormatDate('j F', MakeTimeStamp($arItem['PROPERTIES']['EVENT_DATE']['VALUE'] ))?>

                                            <?if(!empty($arItem['ACTIVE_TO'])):?>
                                                - <?=FormatDate('j F', MakeTimeStamp($arItem['ACTIVE_TO']))?>
                                            <?endif;?>




                                        </div>
                                        <div class="place"><?=$arItem['PROPERTIES']['PLACE']['VALUE']?></div>
                                    </div>
                                    <div class="right">
                                        <time class="time">
											<?=FormatDate('H:i', MakeTimeStamp($arItem['PROPERTIES']['EVENT_DATE']['VALUE'] ))?>
                                        </time>
                                    </div>
                                </div>
                                <div class="line_second">
									<?=$arItem["NAME"]?>
                                </div>
                                <div class="line_free">
                                    <?=$arItem["PREVIEW_TEXT"]?>
                                </div>
                            </div>
                        </a>
                        <div class="control">
                            <?if($arItem['PROPERTIES']['STATUS']['VALUE_XML_ID'] == 'BUY'):?>
                                <button class="kassy_ru btn red_btn red_btn_inner"
                                        data-kassy-agent_id="omsk-gcnt.ru"
                                        data-kassy-db="omsk"
                                        data-kassy-event_id="<?=$arItem['PROPERTIES']['ID_KASSYRU']['VALUE']?>"
                                >
                                    Купить
                                </button>
                            <?elseif($arItem['PROPERTIES']['STATUS']['VALUE_XML_ID'] == 'FREE' ):?>
                                <span class="free_event">
                                    БЕСПЛАТНО
                                </span>
                            <?else:?>
                                <a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="btn red_btn red_btn_inner">
                                    <?=$arItem['PROPERTIES']['STATUS']['VALUE']?>
                                </a>
                            <?endif;?>
                        </div>
                    </li>
				<?endforeach;?>
            </ul>
        </div>
    </div>
</div>