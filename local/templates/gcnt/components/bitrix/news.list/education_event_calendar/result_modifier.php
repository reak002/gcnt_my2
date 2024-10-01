<?php
/**
 * @var $arResult
 */
foreach($arResult['ITEMS'] as $arItem){

	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));

	$date = new DateTime($arItem['ACTIVE_FROM']);

	$arEvents[] = array(
		'id' => $arItem['ID'],
		'start_date' => $date->format('Y-m-d H:i'),
		'end_date' => $date->format('Y-m-d H:i'),
		'text' => $arItem['PREVIEW_TEXT'] . '<br><a class="detail_link" id="'.$this->GetEditAreaId($arItem['ID']).'" href="'.$arItem['DETAIL_PAGE_URL'].'" >Подробнее</a>',
	);
}

$arResult["CALENDAR"] = json_encode($arEvents);
?>