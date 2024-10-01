<?
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_before.php");
CModule::IncludeModule("iblock");
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/iblock/prolog.php");
IncludeModuleLangFile(__FILE__);
use Bitrix\Main\Config\Option;

if(!empty($_REQUEST['SITEKEY'])){
	Option::set("artproduct.recaptcha", "SITEKEY", $_REQUEST['SITEKEY']);
	$_SITEKEY = $_REQUEST['SITEKEY'];
}
else{
	$_SITEKEY = Option::get("artproduct.recaptcha", "SITEKEY");
}

if(!empty($_REQUEST['SECRETKEY'])){
	Option::set("artproduct.recaptcha", "SECRETKEY", $_REQUEST['SECRETKEY']);
	$_SECRETKEY = $_REQUEST['SECRETKEY'];
}
else{
	$_SECRETKEY = Option::get("artproduct.recaptcha", "SECRETKEY");
}

?>

<?php $APPLICATION->setTitle(GetMessage("SUBCUS_DEPLE_TITLE"));?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_after.php");?>
<form type="POST">
    <div>
        Ключи для каптчи<br>
        <span style="width: 85px; text-align: right; display: inline-block;">SECRETKEY:</span><input name="SECRETKEY" value="<?=$_SECRETKEY?>" style="width: 400px"><br>
        <span style="width: 85px; text-align: right; display: inline-block;">SITEKEY:</span><input name="SITEKEY" value="<?=$_SITEKEY?>" style="width: 400px"><br>

        <input type="submit" value="сохранить">
    </div>
</form>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_admin.php");?>