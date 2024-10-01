<?php
/**
 * @var $arResult
 * @var $arParams
 */
use Bitrix\Main\Config\Option;

?>
<?if(!empty($arResult['RESULT_MSG']) && !empty($_REQUEST['g-recaptcha-response'])):?>
    <div class="msg_text <?=$arResult['RESULT_MSG_TYPE']?'success':'error'?>"><?=$arResult['RESULT_MSG']?></div>
	<?if($arParams['IS_AJAX']!=1):?>
        <a class="btn red_btn_inner resend" href="<?=$_SERVER['REQUEST_URI'].$arParams['HASH_LINK']?:''?>"><?=GetMessage('RESEND_TXT')?></a>
	<?endif;?>
<?else:?>
	<?$ct = 0;?>
	<?$added_separator = false;?>
	<?$all_ct = count($arResult['PROPERTIES']);?>
	<?$URL = $arParams['IS_AJAX']==1 ? $_REQUEST['A_URL'] : ($_SERVER['REQUEST_URI'].$arParams['HASH_LINK']?:'');?>
    <form name="feedback" action="<?=$URL?>" method="post" data-action-type="feedback" data-ajax="<?=$arParams['IS_AJAX']==1 ? 'Y' : 'N';?>">
		<?=bitrix_sessid_post()?>
        <input type="hidden" name="IB_ID" value="<?=$arParams['IBLOCK_ID']?>">
        <div class="form_inner">
            <div class="l_block">
				<?foreach($arResult['PROPERTIES'] as $code => $prop):?>
				<?$pattern='';?>
				<?if($ct == 3):?>
				<?$added_separator = true;?>
            </div>
            <div class="r_block">
				<?endif;?>
				<?if($prop['PROPERTY_TYPE']=='L'):?>
                    <select name="<?=$code?>" <?=$prop['IS_REQUIRED']==true?'required':''?> >
                        <option selected disabled value=''><?=!empty($prop['HINT'])?$prop['HINT']:$prop['NAME']?> <?=$prop['IS_REQUIRED']==true?' *':''?></option>
						<?foreach($prop['V_LIST'] as $val):?>
                            <option value="<?=$val['ID']?>" ><?=$val['VALUE']?></option>
						<?endforeach;?>
                    </select>
				<?elseif($prop['PROPERTY_TYPE']=='E'):?>
                    <select name="<?=$code?>" <?=$prop['IS_REQUIRED']==true?'required':''?> <?=$ct == 4 || $ct == 5 ? 'class="half-element"':''?>>
                        <option selected disabled value=''><?=!empty($prop['HINT'])?$prop['HINT']:$prop['NAME']?> <?=$prop['IS_REQUIRED']==true?' *':''?></option>
						<?foreach($prop['V_LIST'] as $val):?>
                            <option value="<?=$val['ID']?>" ><?=$val['NAME']?></option>
						<?endforeach;?>
                    </select>
				<?else:?>
					<?
					switch($code){
						case 'EMAIL':
							$type = 'email';
							break;
						case 'PHONE':
							$type = 'tel';
							$pattern = ' pattern="[+0-9]{1}([0-9]{0,1})? \([0-9]{3}\) [0-9]{3}[-]{1}[0-9]{2}[-]{1}[0-9]{2}"';
							break;
						default:
							$type = 'text';
							break;
					}
					?>
                    <input <?=$ct == 4 || $ct == 5 ? 'class="half-element"':''?> type="<?=$type?>" name="<?=$code?>"<?=$pattern?> placeholder="<?=!empty($prop['HINT'])?$prop['HINT']:$prop['NAME']?><?=$prop['IS_REQUIRED']==true?' *':''?>" <?=$prop['IS_REQUIRED']==true?'required':''?>>
				<?endif;?>
				<?$ct++;?>
				<?endforeach;?>
				<?if($all_ct > 2 && !$added_separator):?>
            </div>
            <div class="r_block">
				<?endif;?>
				<?if($arParams['HIDE_MSG_BLOCK']!==1):?>
                    <textarea <?=$all_ct < 4 ? 'class="full-height"' : ''?> name="DETAIL_TEXT" placeholder="<?=GetMessage('TXT_YOU_MSG')?>"></textarea>
				<?endif;?>
            </div>
        </div>
        <div class="control_block" style="position: relative">
			<?$_SITEKEY = Option::get("artproduct.recaptcha", "SITEKEY");?>
            <input type="checkbox" class="custom-checkbox" id="GRC_ID" name="GRC" value="Y" required style="opacity: 0; position: absolute; top: 30px; left: 20px;">
            <div class="g-recaptcha" data-sitekey="<?=$_SITEKEY?>" data-callback='checkCustomCheckboxGRC'></div>
            <script src="https://www.google.com/recaptcha/api.js" async defer></script>
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


