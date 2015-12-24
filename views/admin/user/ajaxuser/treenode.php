<?
	#some shit-code
	$login = array_key_exists('username', $list) ? true : false;
	if((array_key_exists('last_name', $list)) || (array_key_exists('first_name', $list)) || (array_key_exists('second_name', $list))): $fio = true; else : $fio = false; endif;
	
	$email = array_key_exists('email', $list) ? true : false;
	$phone = array_key_exists('phone', $list) ? true : false;
	$skype = array_key_exists('skype', $list) ? true : false;
	if($email || $phone || $skype) { $contacts = true; } else { $contacts = false; }
	
	if((array_key_exists('attachment__id', $list)) && (Yii::app()->isModuleInstall('Attachment'))) { $photo = true; } else { $photo = false; }
	
	$sponsor = array_key_exists('sponsor__id', $list) ? true : false;
	
	$sex = array_key_exists('sex', $list) ? true : false;
	$birthday = array_key_exists('birthday', $list) ? true : false;
	$idpass = array_key_exists('series_passport', $list) ? true : false;
	
	if((array_key_exists('country__id', $list)) || (array_key_exists('region__id', $list)) || (array_key_exists('city__id', $list)) || (array_key_exists('address', $list)) || (array_key_exists('zip_code', $list))) { $adres = true; } else { $adres = false; }
?>

<? foreach($profiles as $key => $tree) :?>  
<tr class="tn-container" node="<?=$tree->user__id?>" parent="<?=$tree->sponsor__id?>" children_count="<?=count($tree->childs)?>" level="<?=$tree->tree_level?>">
    <? if(array_key_exists('username', $list)): ?>
        <td class="tn-manager">
            <div class="tnm-children">
                <span class="fa fa-plus-square-o"></span>
                <span class="fa fa-minus-square-o"></span>
            </div>                                
            <div class="tnm-content">
                <? if($sex) : ?>
                    <? if ($tree->sex == Profile::SEX_MALE) : ?>
                        <span class="icon icon-user font-blue mr10"></span>
                    <? elseif ($tree->sex == Profile::SEX_FEMALE) : ?>
                        <span class="icon icon-user-female font-red-pink mr10"></span>
                    <? endif; ?>                                            
                <? endif; ?>
                <?=CHtml::encode($tree->user->username)?>
            </div>
        </td>
        <? if($fio) : ?><td>
            <?=CHtml::encode($tree->lang->last_name)?> <?=CHtml::encode($tree->lang->first_name)?> <?=CHtml::encode($tree->lang->second_name)?>
        </td><? endif;?>
        <? if($contacts) : ?><td>
            <? if($email) :?><i class="fa fa-envelope-o mr5"></i> <?=CHtml::encode($tree->user->email)?><br/><? endif; ?>
            <? if($phone) :?>
                <? if ($tree->phone and $tree->phone != "") : ?>
                    <i class="fa fa-phone mr5"></i> <?=CHtml::encode($tree->phone)?><br/>
                <? endif; ?>
            <? endif; ?>
            <? if($skype) :?>
                <? if ($tree->skype and $tree->skype != "") : ?>
                    <i class="fa fa-skype mr5"></i> <?=CHtml::encode($tree->skype)?>
                <? endif; ?>
            <? endif; ?>
        </td><? endif;?>
        <? if($adres) : ?><td>
            <? if ($tree->lang->address and $tree->lang->address != "") : ?>
                <?=CHtml::encode($tree->lang->address)?> 
            <? endif; ?>
        </td><? endif;?>
        <? if($sponsor) : ?>
            <td>
                <? if ($tree->sponsor != NULL) : ?>
                    <?=CHtml::encode($tree->sponsor->username)?>
                <? else : ?>
                    <small class="text-muted">(<?=Yii::t('app', 'отсутствует')?>)</small>
                <? endif; ?>
            </td>
            <td>
                <? if ($tree->sponsor != NULL) : ?>
                    <?=CHtml::encode($tree->sponsor->profile->lang->last_name)?> 
                    <?=CHtml::encode($tree->sponsor->profile->lang->first_name)?> 
                    <?=CHtml::encode($tree->sponsor->profile->lang->second_name)?>
                <? else : ?>
                    <small class="text-muted">(<?=Yii::t('app', 'отсутствует')?>)</small>
                <? endif; ?>
            </td>
        <? endif;?>         
        <td>
            <? if ((Yii::app()->user->checkAccess('AdminUserUserView')) && ($tree->user->username != Yii::app()->params['adminUsername'])) : ?>
                <?=CHtml::link('<i class="glyphicon glyphicon-eye-open"></i>', $this->createUrl('user/view', array('id' => sha1($tree->user->id))), array('class' => 'btn blue-steel'))?>
            <? endif; ?>
            <? if ((Yii::app()->user->checkAccess('AdminUserUserEdit')) && ($tree->user->username != Yii::app()->params['adminUsername'])) : ?>
                <?=CHtml::link('<i class="glyphicon glyphicon-pencil"></i>', $this->createUrl('user/create', array('action' => 'edit', 'id' => sha1($tree->user->id))), array('class' => 'btn green-seagreen'))?>
            <? endif; ?>
        </td>
    <? endif; ?>
</tr>
<? endforeach; ?>