<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
use Bitrix\Main\Page\Asset;
use Bitrix\Main\Localization\Loc;
Loc::loadMessages(__FILE__);

/**
 * @var $APPLICATION
 */
?>

<?$pageClass = $APPLICATION->GetCurPage(false) != '/' ? 'standard_page' : 'main_page';?>
<?$currentPage = (($pathLength = count($pagePath = explode('/', $APPLICATION->GetCurPage(true))) - 1) > 0) ? $pagePath[$pathLength] == 'index.php' &&  $APPLICATION->GetCurPage(false) != '/' ? 'dir_root_item' :'dir_sub_item' : 'dir_sub_item';?>
<?$currentDir = $APPLICATION->GetCurDir();?>


<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="format-detection" content="telephone=no">
    <title><?$APPLICATION->ShowTitle()?></title>

    <?CJSCore::Init(array("jquery"));?>

	<?
	$APPLICATION->ShowMeta("robots", false);
	$APPLICATION->ShowMeta("keywords", false);
	$APPLICATION->ShowMeta("description", false);
	$APPLICATION->ShowLink("canonical", null);
	$APPLICATION->ShowCSS(true);
	$APPLICATION->ShowHeadStrings();
	$APPLICATION->ShowHeadScripts();
	?>

    <?
	/* плагины и библиотеки */

	/* слайдер start*/
	Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/assets/include_module/splide/splide.min.js");
	Asset::getInstance()->addCss(SITE_TEMPLATE_PATH ."/assets/include_module/splide/splide.min.css");
	/* слайдер end*/

	?>

	<?
	/* основыные css и js */
	Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/assets/js/main.js");
	Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/assets/include_module/maskedinput/jquery.inputmask.bundle.min.js");
	?>

	<?
    if($currentPage === 'dir_root_item' && $currentDir !== '/kontakty/'){
		Asset::getInstance()->addCss(SITE_TEMPLATE_PATH ."/assets/css/sub_page.css"); //автосгенерирован с помощью SASS. Не править если не знаешь что такое SASS!!! пиши в /assets/css/custom.css
    }
    ?>

	<?
	Asset::getInstance()->addCss(SITE_TEMPLATE_PATH ."/assets/css/main.css"); //автосгенерирован с помощью SASS. Не править если не знаешь что такое SASS!!! пиши в /assets/css/custom.css
	Asset::getInstance()->addCss(SITE_TEMPLATE_PATH ."/assets/css/custom.css"); //Если не знаешь что такое SASS то пиши стили в этот файл!!!
	?>

    <!--iphone_css-->
</head>
<body>
    <?$APPLICATION->ShowPanel()?>
    <header>
        <div class="top">
            <div class="inner_wrapper">
                <a href="/" class="logo">
					<?$APPLICATION->IncludeComponent(
						"bitrix:main.include",
						".default",
						array(
							"AREA_FILE_SHOW" => "file",
							"EDIT_TEMPLATE" => "",
							"COMPONENT_TEMPLATE" => ".default",
							"PATH" => SITE_TEMPLATE_PATH."/include_area/logo.php"
						),
						false
					);?>
					<?$APPLICATION->IncludeComponent(
						"bitrix:main.include",
						".default",
						array(
							"AREA_FILE_SHOW" => "file",
							"EDIT_TEMPLATE" => "",
							"COMPONENT_TEMPLATE" => ".default",
							"PATH" => SITE_TEMPLATE_PATH."/include_area/slogan.php"
						),
						false
					);?>
                </a>
                <span class="burger_menu">
                    <svg width="32" height="17" viewBox="0 0 32 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <line x1="1" y1="1" x2="29" y2="1" stroke="#454545" stroke-width="2" stroke-linecap="round"/>
                        <line x1="1" y1="8" x2="29" y2="8" stroke="#454545" stroke-width="2" stroke-linecap="round"/>
                        <line x1="1" y1="15" x2="29" y2="15" stroke="#454545" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                </span>
				<?$APPLICATION->IncludeComponent(
                    "vision:vision.special",
                    "custom",
                    Array(),
                    false
                );?>
                <span class="search_toggle">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M23.7061 22.2955L17.9363 16.5257C19.3665 14.782 20.2286 12.5486 20.2286 10.1143C20.2286 4.53061 15.698 0 10.1143 0C4.52571 0 0 4.53061 0 10.1143C0 15.698 4.52571 20.2286 10.1143 20.2286C12.5486 20.2286 14.7771 19.3714 16.5208 17.9412L22.2906 23.7061C22.6824 24.098 23.3143 24.098 23.7061 23.7061C24.098 23.3192 24.098 22.6824 23.7061 22.2955ZM10.1143 18.2155C5.64245 18.2155 2.00816 14.5812 2.00816 10.1143C2.00816 5.64735 5.64245 2.00816 10.1143 2.00816C14.5812 2.00816 18.2204 5.64735 18.2204 10.1143C18.2204 14.5812 14.5812 18.2155 10.1143 18.2155Z" fill="black"/>
                    </svg>
                </span>
				<?$APPLICATION->IncludeComponent("bitrix:news.list", "social_link", Array(
					"ACTIVE_DATE_FORMAT" => "d.m.Y",	// Формат показа даты
					"ADD_SECTIONS_CHAIN" => "N",	// Включать раздел в цепочку навигации
					"AJAX_MODE" => "N",	// Включить режим AJAX
					"AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
					"AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
					"AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
					"AJAX_OPTION_STYLE" => "N",	// Включить подгрузку стилей
					"CACHE_FILTER" => "N",	// Кешировать при установленном фильтре
					"CACHE_GROUPS" => "Y",	// Учитывать права доступа
					"CACHE_TIME" => "36000000",	// Время кеширования (сек.)
					"CACHE_TYPE" => "A",	// Тип кеширования
					"CHECK_DATES" => "Y",	// Показывать только активные на данный момент элементы
					"DETAIL_URL" => "",	// URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
					"DISPLAY_BOTTOM_PAGER" => "N",	// Выводить под списком
					"DISPLAY_DATE" => "N",	// Выводить дату элемента
					"DISPLAY_NAME" => "N",	// Выводить название элемента
					"DISPLAY_PICTURE" => "N",	// Выводить изображение для анонса
					"DISPLAY_PREVIEW_TEXT" => "Y",	// Выводить текст анонса
					"DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
					"FIELD_CODE" => array(	// Поля
						0 => "CODE",
						1 => "SORT",
						2 => "PREVIEW_TEXT",
						3 => "",
					),
					"FILTER_NAME" => "",	// Фильтр
					"HIDE_LINK_WHEN_NO_DETAIL" => "N",	// Скрывать ссылку, если нет детального описания
					"IBLOCK_ID" => "5",	// Код информационного блока
					"IBLOCK_TYPE" => "control",	// Тип информационного блока (используется только для проверки)
					"INCLUDE_IBLOCK_INTO_CHAIN" => "N",	// Включать инфоблок в цепочку навигации
					"INCLUDE_SUBSECTIONS" => "N",	// Показывать элементы подразделов раздела
					"MESSAGE_404" => "",	// Сообщение для показа (по умолчанию из компонента)
					"NEWS_COUNT" => "10",	// Количество новостей на странице
					"PAGER_BASE_LINK_ENABLE" => "N",	// Включить обработку ссылок
					"PAGER_DESC_NUMBERING" => "N",	// Использовать обратную навигацию
					"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// Время кеширования страниц для обратной навигации
					"PAGER_SHOW_ALL" => "N",	// Показывать ссылку "Все"
					"PAGER_SHOW_ALWAYS" => "N",	// Выводить всегда
					"PAGER_TEMPLATE" => ".default",	// Шаблон постраничной навигации
					"PAGER_TITLE" => "соц. сети",	// Название категорий
					"PARENT_SECTION" => "",	// ID раздела
					"PARENT_SECTION_CODE" => "",	// Код раздела
					"PREVIEW_TRUNCATE_LEN" => "",	// Максимальная длина анонса для вывода (только для типа текст)
					"PROPERTY_CODE" => array(	// Свойства
						0 => "",
						1 => "",
					),
					"SET_BROWSER_TITLE" => "N",	// Устанавливать заголовок окна браузера
					"SET_LAST_MODIFIED" => "N",	// Устанавливать в заголовках ответа время модификации страницы
					"SET_META_DESCRIPTION" => "N",	// Устанавливать описание страницы
					"SET_META_KEYWORDS" => "N",	// Устанавливать ключевые слова страницы
					"SET_STATUS_404" => "N",	// Устанавливать статус 404
					"SET_TITLE" => "N",	// Устанавливать заголовок страницы
					"SHOW_404" => "N",	// Показ специальной страницы
					"SORT_BY1" => "SORT",	// Поле для первой сортировки новостей
					"SORT_BY2" => "SORT",	// Поле для второй сортировки новостей
					"SORT_ORDER1" => "ASC",	// Направление для первой сортировки новостей
					"SORT_ORDER2" => "ASC",	// Направление для второй сортировки новостей
					"STRICT_SECTION_CHECK" => "N",	// Строгая проверка раздела для показа списка
					"PAGE_POSITION" => 'header',
				),
					false
				);?>
				<?$APPLICATION->IncludeComponent(
					"bitrix:main.include",
					".default",
					array(
						"AREA_FILE_SHOW" => "file",
						"EDIT_TEMPLATE" => "",
						"COMPONENT_TEMPLATE" => ".default",
						"PATH" => SITE_TEMPLATE_PATH."/include_area/top_btn_buy_ticket.php"
					),
					false
				);?>
            </div>

            <div class="center hidden_block">
                <div class="inner">
					<?$APPLICATION->IncludeComponent(
						"bitrix:search.form",
						"custom",
						Array(
							"PAGE" => "#SITE_DIR#search/index.php",
							"USE_SUGGEST" => "Y",
							"PLACEHOLDER_TEXT" => "Что вы ищете?",
						)
					);?>
                </div>
            </div>

        </div>

        <div class="bottom">
            <div class="inner_wrapper">
                <?$APPLICATION->IncludeComponent("bitrix:menu", "top_multilevel_menu", Array(
                    "ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
                        "CHILD_MENU_TYPE" => "left",	// Тип меню для остальных уровней
                        "DELAY" => "N",	// Откладывать выполнение шаблона меню
                        "MAX_LEVEL" => "2",	// Уровень вложенности меню
                        "MENU_CACHE_GET_VARS" => "",	// Значимые переменные запроса
                        "MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
                        "MENU_CACHE_TYPE" => "A",	// Тип кеширования
                        "MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
                        "ROOT_MENU_TYPE" => "top",	// Тип меню для первого уровня
                        "USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
                        "COMPONENT_TEMPLATE" => "horizontal_multilevel"
                    ),
                    false
                );?>
                <span class="close_burger">
                    <svg width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20.2442 0.635193L11.2706 9.60874L2.29708 0.635193C1.83819 0.176296 1.09421 0.176296 0.635315 0.635193C0.176418 1.09409 0.176418 1.83806 0.635315 2.29696L9.60886 11.2705L0.635315 20.2441C0.176418 20.703 0.176418 21.4469 0.635315 21.9058C1.09421 22.3647 1.83819 22.3647 2.29708 21.9058L11.2706 12.9323L20.2442 21.9058C20.7031 22.3647 21.447 22.3647 21.9059 21.9058C22.3648 21.4469 22.3648 20.703 21.9059 20.2441L12.9324 11.2705L21.9059 2.29696C22.3648 1.83806 22.3648 1.09409 21.9059 0.635193C21.447 0.176296 20.7031 0.176297 20.2442 0.635193Z" fill="black"/>
                    </svg>
                </span>
            </div>
        </div>
    </header>
	<?if(
	        $currentPage === 'dir_root_item' &&
			$pageClass==='standard_page' &&
            $currentDir !== '/kontakty/' &&
            $currentDir !== '/search/' &&
            $currentDir !== '/izdaniya/' &&
            strpos($_SERVER['REQUEST_URI'],'/omskie-mastera/') === false &&
            strpos($_SERVER['REQUEST_URI'],'/nematerialnoe-kulturnoe-nasledie/') === false &&
            strpos($_SERVER['REQUEST_URI'],'/kollektivy/') === false &&
            strpos($_SERVER['REQUEST_URI'],'/proekty/') === false &&
            strpos($_SERVER['REQUEST_URI'],'/ekskursii/') === false &&
            strpos($_SERVER['REQUEST_URI'],'/news/') === false &&
            strpos($_SERVER['REQUEST_URI'],'/afisha/') === false &&
            strpos($_SERVER['REQUEST_URI'],'/dvorets-im-a-m-maluntseva/tsentr-kulturnogo-razvitiya/3d-ekskursii/') === false &&
            strpos($_SERVER['REQUEST_URI'],'/narodnoe-tvorchestvo/kulturno-dosugovaya-deyatelnost/') === false &&
            strpos($_SERVER['REQUEST_URI'],'/narodnoe-tvorchestvo/narodnoe-khudozhestvennoe-tvorchestvo/konkursy-i-festival-rayonov/') === false &&
            strpos($_SERVER['REQUEST_URI'],'/sibirskiy-kulturnyy-tsentr/tsentry-russkoy-slavyanskoy-traditsionnoy-kultury-omskoy-oblasti/') === false &&
            strpos($_SERVER['REQUEST_URI'],'/plan-obrazovatelnykh-sobytiy/') === false
    ):?>
        <div class="sub_header">
            <div class="inner">
                <div class="h1_wrapper">
                    <h1><?$APPLICATION->ShowTitle(false)?></h1>
                </div>
                <div class="menu_wrapper">
					<?$APPLICATION->IncludeComponent("bitrix:menu", "sub_header", Array(
                        "ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
                            "CHILD_MENU_TYPE" => "",	// Тип меню для остальных уровней
                            "DELAY" => "N",	// Откладывать выполнение шаблона меню
                            "MAX_LEVEL" => "1",	// Уровень вложенности меню
                            "MENU_CACHE_GET_VARS" => "",	// Значимые переменные запроса
                            "MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
                            "MENU_CACHE_TYPE" => "A",	// Тип кеширования
                            "MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
                            "ROOT_MENU_TYPE" => "left",	// Тип меню для первого уровня
                            "USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
                            "COMPONENT_TEMPLATE" => ".default"
                        ),
                        false
                    );?>
                </div>
            </div>
        </div>
	<?endif;?>

    <main class="<?=$pageClass?>">
        <?if($pageClass==='standard_page'):?>
            <?if(
                    $currentPage !== 'dir_root_item' ||
                    $currentDir === '/kontakty/' ||
                    $currentDir === '/search/' ||
                    $currentDir === '/izdaniya/' ||
                    strpos($_SERVER['REQUEST_URI'],'/omskie-mastera/') !== false ||
                    strpos($_SERVER['REQUEST_URI'],'/nematerialnoe-kulturnoe-nasledie/') !== false ||
                    strpos($_SERVER['REQUEST_URI'],'/kollektivy/') !== false ||
                    strpos($_SERVER['REQUEST_URI'],'/proekty/') !== false ||
                    strpos($_SERVER['REQUEST_URI'],'/ekskursii/') !== false ||
                    strpos($_SERVER['REQUEST_URI'],'/news/') !== false ||
                    strpos($_SERVER['REQUEST_URI'],'/afisha/') !== false ||
                    strpos($_SERVER['REQUEST_URI'],'/dvorets-im-a-m-maluntseva/tsentr-kulturnogo-razvitiya/3d-ekskursii/') !== false ||
                    strpos($_SERVER['REQUEST_URI'],'/narodnoe-tvorchestvo/kulturno-dosugovaya-deyatelnost/') !== false ||
                    strpos($_SERVER['REQUEST_URI'],'/narodnoe-tvorchestvo/narodnoe-khudozhestvennoe-tvorchestvo/konkursy-i-festival-rayonov/') !== false ||
                    strpos($_SERVER['REQUEST_URI'],'/sibirskiy-kulturnyy-tsentr/tsentry-russkoy-slavyanskoy-traditsionnoy-kultury-omskoy-oblasti/') !== false ||
                    strpos($_SERVER['REQUEST_URI'],'/plan-obrazovatelnykh-sobytiy/') !== false
            ):?>
                <?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "custom", Array(
                    "PATH" => "",	// Путь, для которого будет построена навигационная цепочка (по умолчанию, текущий путь)
                    "SITE_ID" => "s1",	// Cайт (устанавливается в случае многосайтовой версии, когда DOCUMENT_ROOT у сайтов разный)
                    "START_FROM" => "0",	// Номер пункта, начиная с которого будет построена навигационная цепочка
                ),
                    false
                );?>
                <?if(strpos($_SERVER['REQUEST_URI'],'/about/FAQ.php') === false):?>
                    <h1><?$APPLICATION->ShowTitle(false)?></h1>
                <?endif;?>
            <?endif;?>
        <?endif;?>