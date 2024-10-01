<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use \Bitrix\Main\Localization\Loc;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CatalogSectionComponent $component
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $componentPath
 * @var string $templateFolder
 */

$this->setFrameMode(true);
?>

<div class="detail_text_excursion">
    <?=$arResult['~DETAIL_TEXT']?>
</div>
<div class="block_with_back_link">
    <a href="<?=$arResult ["SECTION"]['SECTION_PAGE_URL']?>">Назад</a>
</div>