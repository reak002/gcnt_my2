<?
/**
 * @var $arResult
 */
foreach($arResult["SEARCH"] as &$arItem){
	$arItem['IMG'] = '/upload/medialibrary/6af/6afec77bd2612514711d918b70bc5eed.png';
	if($res = CIBlockElement::GetByID($arItem['ID'])){
		if($ar_res = $res->GetNext()){
			if(!empty($ar_res['PREVIEW_PICTURE'])){
				$arItem['IMG'] = CFile::GetPath($ar_res['PREVIEW_PICTURE']);
			}
		}
	}
}?>