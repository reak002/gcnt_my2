<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
CModule::IncludeModule("iblock");

CModule::IncludeModule("iblock");

$dbIBlock = CIBlock::GetList(
	Array(),
	Array(
		"ACTIVE" => "Y",
		'TYPE'=> 'feedback',
		"CHECK_PERMISSIONS" => "N"
	),
	false
);

$IBlockElements =array();

while ($arBlock = $dbIBlock->Fetch())
{
	$dbIBlocks[$arBlock["ID"]] = "[".$arBlock["ID"]."] ".$arBlock["NAME"];
}

$arComponentParameters = array(
	"GROUPS" => array(
		"SETTINGS" => array(
			"NAME" => GetMessage("SETTINGS_PHR")
		),
	),
	"PARAMETERS" => array(
		"IBLOCK_ID" => array(
			"PARENT" => "SETTINGS",
			"NAME" => GetMessage("ELEMENT_ID_TEXT"),
			"TYPE" => "LIST",
			"VALUES" => $dbIBlocks,
			"REFRESH" => "Y"
		),
		"IS_AJAX" => array(
			"PARENT" => "SETTINGS",
			"NAME" => GetMessage("IS_AJAX_TXT"),
			"TYPE" => "LIST",
			"VALUES" => array(0=>'Нет',1=>'Да'),
			"REFRESH" => "Y"
		),
		"TITLE_LIST" => array(
			"PARENT" => "SETTINGS",
			"NAME" => GetMessage("TITLE_LIST_TXT"),
			"TYPE" => "STRING",
			"REFRESH" => "Y",
			"MULTIPLE" => "Y",
			"DEFAULT" => array(
				'G_1'=>'Заполните данные о мероприятии, которое вы постетили',
				'G_2'=>'Укажите, который раз Вы посещаете наши мероприятия?',
				'G_3'=>'Удовлетворены ли Вы в целом КАЧЕСТВОМ проведения мероприятия?',
				'G_4'=>'Если вас что-то не устроило в качестве проведения мероприятия, пожалуйста, укажите, что именно ',
				'G_5'=>'Удовлетворены ли Вы в целом ДОСТУПНОСТЬЮ проведения мероприятия?',
				'G_6'=>'Если вас что-то не устроило в организации проведения и доступности мероприятия, пожалуйста,  укажите, что именно ',
				'G_7'=>'Оцените по пятибалльной шкале уровень вашей удовлетворенности мероприятием.',
				'G_8'=>'Оцените по пятибалльной шкале уровень вашей удовлетворенности мероприятием.',
				'G_9'=>'Оцените по пятибалльной шкале уровень вашей удовлетворенности мероприятием.',
				'G_10'=>'Если у Вас есть пожелания и рекомендации к организации и содержанию  мероприятия, укажите их',
				'G_11'=>'Укажите Ваш пол',
				'G_12'=>'Выберете верное для вас утверждение и заполните соответствующее поле ',
				'G_13'=>'Сколько Вам лет (укажите возраст)',
				'G_14'=>'Из каких источников Вы  узнали о мероприятии?',
			)
		),
		"TEXT_MSG" => array(
			"PARENT" => "SETTINGS",
			"NAME" => GetMessage("S_MSG_TEXT"),
			"TYPE" => "STRING",
		),
		"CACHE_TIME" => array(),
	)
);
?>