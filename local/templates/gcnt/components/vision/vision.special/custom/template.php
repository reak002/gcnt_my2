<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/**
 * @var $templateFolder
 * @var $APPLICATION
 * @var $old_css
 */
$_SESSION["special_version"] = "Y";
if( $_SESSION["special_version"] == "Y")
{
$this->addExternalCSS($templateFolder. "/style/css/style.css");
$this->addExternalCSS($templateFolder. "/style/css/bvi-font.css");
$this->addExternalCSS($templateFolder. "/style/css/bvi.css");
$this->addExternalCSS($templateFolder. "/style/css/bvi.min.css");
$this->addExternalCSS($templateFolder. "/style/css/bvi-font.min.css");
$this->addExternalCSS($templateFolder. "/style/css/style.css");

$this->addExternalJS($templateFolder. "/style/js/bvi.js");
$this->addExternalJS($templateFolder. "/style/js/responsivevoice.min.js");
$this->addExternalJS($templateFolder. "/style/js/js.cookie.js");
$this->addExternalJS($templateFolder. "/style/js/responsivevoice.js");
$this->addExternalJS($templateFolder. "/style/js/bvi-init.js");
$this->addExternalJS($templateFolder. "/style/js/bvi.js");
$this->addExternalJS($templateFolder. "/style/js/js.cookie.min.js");
}

$this->addExternalJS($templateFolder. "/style/js/responsivevoice.min.js");
$this->addExternalJS($templateFolder. "/style/js/js.cookie.js");
$this->addExternalJS($templateFolder. "/style/js/bvi-init.js");
$this->addExternalJS($templateFolder. "/style/js/bvi.js");
?>

<a href="#" class="bvi-open have_not_eye" title="<?=GetMessage('GCNT_MAIN_HEADER_HAVE_NOT_EYE_TEXT_TITLE');?>">
    <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
        <g clip-path="url(#eye_svg)">
            <path d="M35.8667 17.5742C35.5832 17.1616 28.7701 7.5 17.9999 7.5C8.75825 7.5 0.523116 17.1062 0.17661 17.5157C-0.0588701 17.7947 -0.0588701 18.2042 0.17661 18.4847C0.523116 18.8942 8.75825 28.5004 17.9999 28.5004C27.2416 28.5004 35.4766 18.8942 35.8231 18.4847C36.0407 18.2267 36.0602 17.8532 35.8667 17.5742ZM17.9999 27.0003C10.5913 27.0003 3.54716 19.9352 1.75768 18.0002C3.54421 16.0637 10.5808 9.00007 17.9999 9.00007C26.6685 9.00007 32.7871 16.0547 34.2812 17.9597C32.5561 19.8332 25.4715 27.0003 17.9999 27.0003Z" fill="black" stroke="black" stroke-width="0.2"/>
            <path d="M18.0001 12C14.691 12 12 14.691 12 18.0001C12 21.3091 14.691 24.0001 18.0001 24.0001C21.3091 24.0001 24.0001 21.3091 24.0001 18.0001C24.0001 14.691 21.3091 12 18.0001 12ZM18.0001 22.5002C15.5191 22.5002 13.5 20.4812 13.5 18.0001C13.5 15.5191 15.5191 13.5001 18.0001 13.5001C20.4811 13.5001 22.5001 15.5191 22.5001 18.0001C22.5001 20.4812 20.4811 22.5002 18.0001 22.5002Z" fill="black" stroke="black" stroke-width="0.2"/>
        </g>
        <defs>
            <clipPath id="eye_svg">
                <rect width="36" height="36" fill="white"/>
            </clipPath>
        </defs>
    </svg>
    <span><?=GetMessage('GCNT_MAIN_HEADER_HAVE_NOT_EYE_TEXT');?></span>
</a>

<?if( isset( $_POST['old_version'] ) )
{
    $APPLICATION->SetAdditionalCSS($old_css, true);
    $_SESSION["special_version"] = "N";
}
?>


