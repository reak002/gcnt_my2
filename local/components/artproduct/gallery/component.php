<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/**
 * @var $arParams
 */

CModule::IncludeModule("iblock");

$dbProp = CIBlockElement::GetProperty(16, $arParams['IBLOCK_ELEMENT_ID'], array(), Array('CODE'=>'PHOTO'));

while($ar_props = $dbProp->Fetch())
	$arResult['GALLERY'][] = CFile::GetPath($ar_props['VALUE']);

$this->IncludeComponentTemplate();
?>