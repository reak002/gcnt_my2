<?
/**
 * @var $arResult
 */
$arResult['FILTER_TEXT'] = 'Выбрать фильтр';
if(!empty($arResult["ITEMS"])){
	foreach($arResult["ITEMS"] as $arItem){
		foreach($arItem['LIST'] as $key => $item){
			if(!empty($arItem['INPUT_VALUE'])){
				if(in_array($key,$arItem['INPUT_VALUE'])){
				$arResult['FILTER_TEXT'] = 'Выбрано: '.$item;
				}
			}
		}
	}
}
?>