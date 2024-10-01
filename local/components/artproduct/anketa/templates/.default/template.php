<?php
/**
 * @var $arResult
 * @var $arParams
 */
$arParamsTrans = array("replace_space"=>"_","replace_other"=>"_");
use Bitrix\Main\Config\Option;
?>
<?$group_count = count($arResult['GROUP'])?>
<?$URL = $arParams['IS_AJAX']==1 ? $_REQUEST['A_URL'] : $_SERVER['REQUEST_URI'];?>

<form name="personal_anketa"
      data-all-ct-form="<?=$group_count?>"
      class="forms_list"
      action="<?=$URL?>"
      method="post" >

<?if(!empty($arResult['RESULT_MSG'])):?>
    <div class="msg_text <?=$arResult['RESULT_MSG_TYPE']?'success':'error'?>"><?=$arResult['RESULT_MSG']?></div>
    <?if($arParams['IS_AJAX']!=1):?>
        <a class="btn red_btn_inner resend" href="/"><?=GetMessage('RELOAD_MAIN')?></a>
    <?endif;?>
<?else:?>

    <?$g_pos = 1;?>
    <?foreach($arResult['GROUP'] as $group):?>
        <div class="form" data-form-pos="<?=$g_pos?>" data-form-visible="<?=$g_pos==1?'true':'false'?>">
            <?$g_pos++;?>
            <div class="top_line">
                <h3>
					<?=$group['TITLE']?>
                </h3>
                <div class="position">
                    <?=$group['POSITION']?> / <?=$group_count?>
                </div>
            </div>
            <div class="sub_title"><?if($group['SUB_GROUP'] == 'RATING'):?>
                    (где 1- минимальный балл, а 5 - максимальный балл)
                <?elseif($group['SUB_GROUP'] == 'HOWHAPPYQ'):?>
                    (программой, комфортностью места проведения, техническим оснащением, профессионализмом организаторов и участников  мероприятия, приветливым предупредительным отношением к Вам и т.д.)
                <?elseif($group['SUB_GROUP'] == 'HOWHAPPYA'):?>
                    (удаленностью места проведения мероприятия от места проживания, временем проведения мероприятия, рекламой и т.д.)
                <?endif;?></div>
            <div class="prop_list<?=$group['CODE'] == 'G_12'? ' col_2':'';?>">
				<?$ct = 0;?>
                <?if($group['CODE'] == 'G_12'):?>
                    <div class="custom_col x_col_1">
                <?endif;?>
		        <?foreach($group['ITEMS'] as $code => $prop):?>
                    <div class="input_wrapper" data-group="<?=$group['CODE']?>">
                        <?if($group['CODE'] == 'G_1'):?>
                            <label for="<?=$code?>" class="for_<?=$group['CODE']?>"><?=$prop['NAME']?></label>
                        <?elseif($group['SUB_GROUP'] == 'RATING'):?>
                            <label for="<?=$code?>" class="for_<?=$group['CODE']?>"><?=$prop['HINT']?$prop['HINT']:$prop['NAME']?></label>
                        <?endif;?>
                        <?if($prop['PROPERTY_TYPE']=='L'):?>
                            <?if($prop['LIST_TYPE'] == 'C'):?>
                                <?if($group['SUB_GROUP'] == 'RATING'):?>
                                    <div class="filter_element_list rating_control">
                                        <?$first_radio = true;?>
                                        <?foreach($prop['V_LIST'] as $key => $val):?>
                                            <div class="filter_element">
                                                <input type="radio"
                                                       name="<?=$code?>[]"
                                                       id="<?=Cutil::translit($code.'_'.$val['VALUE'],"ru",$arParamsTrans)?><?=$val['ID']?>"
                                                       value="<?=$val['ID']?>"
													    <?=$first_radio&&$prop['IS_REQUIRED']==='Y'?'required':''?>
                                                >
                                                <label for="<?=Cutil::translit($code.'_'.$val['VALUE'],"ru",$arParamsTrans)?><?=$val['ID']?>">
                                                    <?=$val['VALUE']?>
                                                </label>
                                            </div>
											<?$first_radio = false;?>
                                        <?endforeach;?>
                                    </div>
					            <?else:?>
                                    <div class="filter_element_list_flat">
										<?$first_radio = true;?>
										<?foreach($prop['V_LIST'] as $key => $val):?>
                                            <div class="filter_element_flat">
                                                <input type="radio"
                                                       class="custom-checkbox"
                                                       name="<?=$code?>[]"
                                                       id="<?=Cutil::translit($val['VALUE'],"ru",$arParamsTrans)?><?=$val['ID']?>"
                                                       value="<?=$val['ID']?>"
													    <?=$first_radio&&$prop['IS_REQUIRED']==='Y'?'required':''?>
                                                        <?=$group['CODE'] == 'G_12'?'data-persstatus-place="'.$code.'_'.$val['XML_ID'].'"':''?>
                                                >
                                                <label for="<?=Cutil::translit($val['VALUE'],"ru",$arParamsTrans)?><?=$val['ID']?>">
													<?=$val['VALUE']?>
                                                </label>
                                            </div>
                                            <?$first_radio = false;?>
										<?endforeach;?>
                                    </div>
								<?endif;?>
                            <?else:?>
                                <select id="<?=$code?>" name="<?=$code?>" <?=$prop['IS_REQUIRED']==="y"?'required':''?> >
                                    <option selected disabled value=''><?=!empty($prop['HINT'])?$prop['HINT']:$prop['NAME']?> <?=$prop['IS_REQUIRED']==='Y'?' *':''?></option>
                                    <?foreach($prop['V_LIST'] as $val):?>
                                        <option value="<?=$val['ID']?>" ><?=$val['VALUE']?></option>
                                    <?endforeach;?>
                                </select>
                            <?endif;?>
                        <?elseif($prop['PROPERTY_TYPE']=='E'):?>
                            <select id="<?=$code?>" name="<?=$code?>" <?=$prop['IS_REQUIRED']==='Y'?'required':''?> <?=$ct == 4 || $ct == 5 ? 'class="half-element"':''?>>
                                <option selected disabled value=''><?=!empty($prop['HINT'])?$prop['HINT']:$prop['NAME']?> <?=$prop['IS_REQUIRED']=='Y'?' *':''?></option>
                                <?foreach($prop['V_LIST'] as $val):?>
                                    <option value="<?=$val['ID']?>" ><?=$val['NAME']?></option>
                                <?endforeach;?>
                            </select>
                        <?else:?>
                            <?
                            switch($code){
                                case 'G_1__EVENT_DATE':
                                    $type = 'date';
                                    break;
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
                            <?if($prop['PROPERTY_TYPE'] === 'N')$type='number'?>
                            <input <?=$ct == 4 || $ct == 5 ? 'class="half-element"':''?>
                                    type="<?=$type?>"
                                    id="<?=$code?>"
                                    name="<?=$code?>"
                                    <?=$pattern?>
                                    placeholder="<?=!empty($prop['HINT'])?$prop['HINT']:$prop['NAME']?><?=$prop['IS_REQUIRED']==='Y'?' *':''?>"
                                    <?=$type == 'date'? 'data-date-fill="empty"' : ''; ?>
                                    <?=$prop['IS_REQUIRED']==='Y'?'required':''?>
                                    <?=strpos($code,'G_12__PERSSTATUS_')!==false?'disabled data-type-input="PERSSTATUS"':'';?>
                            >
                        <?endif;?>
                    </div>

                    <?if($code == 'G_12__PERSSTATUS'):?>
                        </div>
                        <div class="custom_col x_col_2">
                    <?endif?>
                    <?if($code == 'G_12__PERSSTATUS_STUD'):?>
                        <div class="input_wrapper" style="height: 70px"></div>
                    <?endif?>

                <?endforeach;?>
				<?if($group['CODE'] == 'G_12'):?>
                    </div>
                <?endif;?>
                <?if($g_pos == $group_count):?>
                    <?=bitrix_sessid_post()?>
                    <input type="hidden" name="IB_ID" value="<?=$arParams['IBLOCK_ID']?>">
                <?endif;?>
            </div>
			<?if($g_pos===$group_count+1):?>
                <div class="control_block" style="position: relative">
                    <?$_SITEKEY = Option::get("artproduct.recaptcha", "SITEKEY");?>
                    <input type="checkbox" class="custom-checkbox" id="GRC" name="GRC" value="Y" required style="opacity: 0; position: absolute; top: 30px; left: 20px;">
                    <div class="g-recaptcha" data-sitekey="<?=$_SITEKEY?>" data-callback='checkCustomCheckboxAnk'></div>
                    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
                </div>
                <br><br>
            <?endif?>
            <div class="bottom_line">
                <span class="btn_pre btn">
                    <svg width="20" height="8" viewBox="0 0 20 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0.646446 4.35355C0.451185 4.15829 0.451185 3.84171 0.646446 3.64645L3.82843 0.464466C4.02369 0.269204 4.34027 0.269204 4.53553 0.464466C4.7308 0.659728 4.7308 0.976311 4.53553 1.17157L1.70711 4L4.53553 6.82843C4.7308 7.02369 4.7308 7.34027 4.53553 7.53553C4.34027 7.7308 4.02369 7.7308 3.82843 7.53553L0.646446 4.35355ZM20 4.5H1V3.5H20V4.5Z" fill="#454545"/>
                    </svg>
                    <span><?=GetMessage('BACK_TXT')?></span>
                </span>
                <span class="btn_next btn red_btn_inner">
                    <span><?=$g_pos!=$group_count+1?GetMessage('NEXT_TXT'):GetMessage('SEND_TXT')?></span>
                    <?if($g_pos != $group_count+1):?>
                        <svg width="20" height="8" viewBox="0 0 20 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19.3536 4.35355C19.5488 4.15829 19.5488 3.84171 19.3536 3.64645L16.1716 0.464466C15.9763 0.269204 15.6597 0.269204 15.4645 0.464466C15.2692 0.659728 15.2692 0.976311 15.4645 1.17157L18.2929 4L15.4645 6.82843C15.2692 7.02369 15.2692 7.34027 15.4645 7.53553C15.6597 7.7308 15.9763 7.7308 16.1716 7.53553L19.3536 4.35355ZM0 4.5H19V3.5H0V4.5Z" fill="white"/>
                        </svg>
					<?endif;?>
                </span>
            </div>
        </div>
    <?endforeach;?>


</form>

<?endif;?>
<script>
    function checkCustomCheckboxAnk(){
        console.log('check');
        $('#GRC').attr('checked',true);
    }
</script>