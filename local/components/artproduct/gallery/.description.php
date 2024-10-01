<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
$arComponentDescription = array(
	"NAME" => GetMessage("A_G_NAME"),
	"DESCRIPTION" => GetMessage("A_G_DESCRIPTION"),
	"PATH" => array(
		"ID" => GetMessage("A_G_PARENT_NAME"),
//		"CHILD" => array(
//			"ID" => "curdate",
//			"NAME" => GetMessage("A_G_PARENT_NAME"),
//		)
	),
	"ICON" => "/images/icon.gif",
);
?>