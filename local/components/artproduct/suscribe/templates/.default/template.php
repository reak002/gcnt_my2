<?php
/**
 * @var $arResult
 * @var $arParams
 */
?>
<?if(!empty($arResult['RESULT_MSG'])):?>
    <div class="msg_text <?=$arResult['RESULT_MSG_TYPE']?'success':'error'?>"><?=$arResult['RESULT_MSG']?></div>
    <?if($arParams['IS_AJAX']!=1):?>
        <a class="btn red_btn_inner resend" href="<?=$_SERVER['REQUEST_URI']?>"><?=GetMessage('RESEND_TXT')?></a>
    <?endif;?>
<?else:?>
    <?$URL = $arParams['IS_AJAX']==1 ? $_REQUEST['A_URL'] : $_SERVER['REQUEST_URI'];?>
    <form name="subscribe" action="<?=$URL?>" method="post" data-ajax="<?=$arParams['IS_AJAX']==1 ? 'Y' : 'N';?>">
		<?=bitrix_sessid_post()?>
        <input type="hidden" name="IB_ID" value="<?=$arParams['IBLOCK_ID']?>">
        <div class="form_inner">
            <div class="full_block">
                <input type="email" name="email" placeholder="<?=GetMessage('TXT_YOU_EMAIL')?> *" required >
            </div>
        </div>
        <div class="control_block">
            <div class="checkbox_container">
                <input type="checkbox" class="custom-checkbox" id="privacy_policy" name="PROPERTY[30]" value="Y" required>
                <label for="privacy_policy"><?=GetMessage('PRIVACY_POLICY_TXT',array('#LINK#'=>'/privacy_policy.pdf'))?></label>
            </div>
            <input type="submit" class="btn red_btn_inner" value="<?=GetMessage('TXT_SEND_MSG')?>" />
        </div>
        <div style="clear: both;"></div>
    </form>
<?endif;?>