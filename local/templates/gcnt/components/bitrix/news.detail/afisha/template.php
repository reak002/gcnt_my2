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
<div class="news-detail">
    <div class="top-block">
        <div class="right" >
<!--            <a href="#fb_form" class="btn red_btn_inner">ЗАПИСАТЬСЯ В КОЛЛЕКТИВ</a>-->
            <div class="age district">
				<?=$arResult['PROPERTIES']['PLACE']['VALUE']?>
            </div>
            <div class="age group">
				<?=$arResult['PROPERTIES']['TYPE']['VALUE']?>
            </div>
            <div class="age category">
				<?=$arResult['PROPERTIES']['AGE_LIMIT']['VALUE']?>
            </div>
			<?if($arResult['PROPERTIES']['STATUS']['VALUE_XML_ID'] == 'BUY'):?>
                <button class="kassy_ru btn red_btn red_btn_inner"
                        data-kassy-agent_id="omsk-gcnt.ru"
                        data-kassy-db="omsk"
                        data-kassy-event_id="<?=$arResult['PROPERTIES']['ID_KASSYRU']['VALUE']?>"
                >
                    Купить
                </button>
			<?elseif($arResult['PROPERTIES']['STATUS']['VALUE_XML_ID'] == 'FREE' ):?>
                <span class="free_event">
                    БЕСПЛАТНО
                </span>
			<?else:?>
                <div class="age group">
					<?=$arResult['PROPERTIES']['STATUS']['VALUE']?>
                </div>
			<?endif;?>
        </div>
        <div class="left">
            <?=$arResult['~DETAIL_TEXT']?>
        </div>
    </div>

    <div style="clear: both;"></div>

</div>