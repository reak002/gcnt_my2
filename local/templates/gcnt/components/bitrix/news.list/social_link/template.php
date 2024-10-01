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
<div class="social_link_list">
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
    <a href="<?=$arItem['CODE']?>" target="_blank" data-name-service="<?=$arItem['NAME']?>" id="<?=$this->GetEditAreaID($arItem['ID'])?>">
		<?/* это для того что б валидатор не ругал если вдруг в svg есть id. в самой svg нужно добавить к %%ID%% к атрибуту ID */?>
		<?=str_replace('%%ID%%',$arParams["PAGE_POSITION"],$arItem['~PREVIEW_TEXT'])?>
    </a>
<?endforeach;?>
</div>
