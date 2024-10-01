<?
use Bitrix\Main\EventManager;
EventManager::getInstance()->addEventHandler("main", "OnBuildGlobalMenu", function (&$arGlobalMenu, &$arModuleMenu){

	$arGlobalMenu["global_menu_custom"] = [
		"menu_id" => "custom",
		"text" => GetMessage("AGR_MENU_TEXT"),
		"title" => GetMessage("AGR_MENU_TEXT"),
		"sort" => 1000,
		"items_id" => "global_menu_custom",
		"help_section" => "custom",
		"items" => [
			[
				"parent_menu" => "global_menu_custom",
				"text" => GetMessage("AGR_MENU_OPTION"),
				"title" => GetMessage("AGR_MENU_OPTION"),
				"url" => 'artproduct_recaptcha_option.php',
				"icon" => "sys_menu_icon",
				"sort" => 100,
			]
		],
	];

});

//$aMenu = array(
//	'parent_menu' => 'global_menu_custom',
//	'sort' => 50,
//	'text' => GetMessage('AGR_MENU_CAPTCHA'),
//	'title' => GetMessage('AGR_MENU_CAPTCHA'),
//	'icon' => 'sale_menu_icon_statisti',
//	'page_icon' => 'sale_menu_icon_statisti',
//	'items_id' => 'moving_warehouses_sub_menu',
////	'items' => array(
////		array(
////			'text' => GetMessage('AGR_MENU_CAPTCHA'),
////			'title' => GetMessage('AGR_MENU_CAPTCHA'),
////			'url' => 'moving_warehouses_list.php',
////		),
//////		array(
//////			'text' => GetMessage('MOVING_WAREHOUSES_MENU_ITEMS_TEXT_ADD'),
//////			'title' => GetMessage('MOVING_WAREHOUSES_MENU_ITEMS_TITLE_ADD'),
//////			'url' => 'moving_warehouses_add.php',
//////		),
////	)
//);


return (!empty($aMenu) ? $aMenu :false);