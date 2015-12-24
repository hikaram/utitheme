<? foreach ($list as $key => $value) : ?>
    <tr class="tn-container" node="<?=$value->NUM?>" parent="<?=$value->NUMSP?>" children_count="<?=count($value->childs)?>" level="<?=$value->printout->DLEVEL?>">
        <? $first = true; ?>
        <? foreach ($fields as $field) : ?>

            <?// vg($value->username);die;?>
            <? if (($field['alias'] == 'numeric') && (((bool)$field['used']) || (Yii::app()->user->checkAccess('OfficeStatsSyncSettingsIndex')  &&  ((bool)$field['used'])))) : ?>
                <td<? if ((bool)$first) : ?> class="tn-manager"<? endif; ?>><? if ((bool)$first) : ?><div class="tnm-children"><span class="fa fa-plus-square-o tnm-toggle-fa" mode="firstline" action="expand"></span><span class="fa fa-minus-square-o tnm-toggle-fa" mode="firstline" action="expand"></span></div><div class="tnm-content"><? endif; ?><?=$i?><? if ((bool)$first) : ?></div><? endif; ?><? $first = false; ?></td>
            <? elseif (($field['alias'] == 'username') && (((bool)$field['used']) || (Yii::app()->user->checkAccess('OfficeStatsSyncSettingsIndex')  &&  ((bool)$field['used'])))) : ?>
                <td<? if ((bool)$first) : ?> class="tn-manager"<? endif; ?>><? if ((bool)$first) : ?><div class="tnm-children"><span class="fa fa-plus-square-o tnm-toggle-fa" mode="firstline" action="expand"></span><span class="fa fa-minus-square-o tnm-toggle-fa" mode="firstline" action="expand"></span></div><div class="tnm-content"><? endif; ?>
                        <? if(!empty($value->userssync->user->username)) : ?>
                            <?=CHtml::encode($value->userssync->user->username)?>
                        <? else :?>
                            <?=Yii::t('app','Пользователь не активирован')?>
                        <? endif; ?>
                        <? if ((bool)$first) : ?></div><? endif; ?><? $first = false; ?></td>
            <? elseif (($field['alias'] == 'email') && (((bool)$field['used']) || (Yii::app()->user->checkAccess('OfficeStatsSyncSettingsIndex')  &&  ((bool)$field['used'])))) : ?>
                <td<? if ((bool)$first) : ?> class="tn-manager"<? endif; ?>><? if ((bool)$first) : ?><div class="tnm-children"><span class="fa fa-plus-square-o tnm-toggle-fa" mode="firstline" action="expand"></span><span class="fa fa-minus-square-o tnm-toggle-fa" mode="firstline" action="expand"></span></div><div class="tnm-content"><? endif; ?><?=CHtml::encode($value->MAIL)?><? if ((bool)$first) : ?></div><? endif; ?><? $first = false; ?></td>
            <? elseif (($field['alias'] == 'name') && (((bool)$field['used']) || (Yii::app()->user->checkAccess('OfficeStatsSyncSettingsIndex')  &&  ((bool)$field['used'])))) : ?>
                <td<? if ((bool)$first) : ?> class="tn-manager"<? endif; ?>><? if ((bool)$first) : ?><div class="tnm-children"><span class="fa fa-plus-square-o tnm-toggle-fa" mode="firstline" action="expand"></span><span class="fa fa-minus-square-o tnm-toggle-fa" mode="firstline" action="expand"></span></div><div class="tnm-content"><? endif; ?><?=CHtml::encode($value->FAM . ' ' . $value->NAME . ' ' . $value->OTCH)?><? if ((bool)$first) : ?></div><? endif; ?><? $first = false; ?></td>
            <? elseif (($field['alias'] == 'birthday') && (((bool)$field['used']) || (Yii::app()->user->checkAccess('OfficeStatsSyncSettingsIndex')  &&  ((bool)$field['used'])))) : ?>
                <td<? if ((bool)$first) : ?> class="tn-manager"<? endif; ?>><? if ((bool)$first) : ?><div class="tnm-children"><span class="fa fa-plus-square-o tnm-toggle-fa" mode="firstline" action="expand"></span><span class="fa fa-minus-square-o tnm-toggle-fa" mode="firstline" action="expand"></span></div><div class="tnm-content"><? endif; ?><?=MSmarty::date_format($value->BIRTHDAY, 'd.m.Y')?><? if ((bool)$first) : ?></div><? endif; ?><? $first = false; ?></td>
            <? elseif (($field['alias'] == 'sponsor_username') && (((bool)$field['used']) || (Yii::app()->user->checkAccess('OfficeStatsSyncSettingsIndex')  &&  ((bool)$field['used'])))) : ?>
                <td<? if ((bool)$first) : ?> class="tn-manager"<? endif; ?>><? if ((bool)$first) : ?><div class="tnm-children"><span class="fa fa-plus-square-o tnm-toggle-fa" mode="firstline" action="expand"></span><span class="fa fa-minus-square-o tnm-toggle-fa" mode="firstline" action="expand"></span></div><div class="tnm-content"><? endif; ?>
                        <? if (!empty($value->sponsorusersync->user )) : ?>
                            <?//if(empty($value->sponsorusersync->user->username)){vg($value->sponsorusersync->user->username);die;}?>
                            <?=CHtml::encode($value->sponsorusersync->user->username)?>
                        <? endif; ?>
                        <? if ((bool)$first) : ?></div><? endif; ?><? $first = false; ?></td>
            <? elseif (($field['alias'] == 'sponsor_name') && (((bool)$field['used']) || (Yii::app()->user->checkAccess('OfficeStatsSyncSettingsIndex')  &&  ((bool)$field['used'])))) : ?>
                <td<? if ((bool)$first) : ?> class="tn-manager"<? endif; ?>><? if ((bool)$first) : ?><div class="tnm-children"><span class="fa fa-plus-square-o tnm-toggle-fa" mode="firstline" action="expand"></span><span class="fa fa-minus-square-o tnm-toggle-fa" mode="firstline" action="expand"></span></div><div class="tnm-content"><? endif; ?>
                        <? if (!empty($value->sponsor )) : ?>
                            <?=CHtml::encode($value->sponsor->FAM . ' ' . $value->sponsor->NAME . ' ' . $value->sponsor->OTCH)?>
                        <? endif; ?>
                        <? if ((bool)$first) : ?></div><? endif; ?><? $first = false; ?></td>
            <? elseif (($field['alias'] == 'created_at') && (((bool)$field['used']) || (Yii::app()->user->checkAccess('OfficeStatsSyncSettingsIndex')  &&  ((bool)$field['used'])))) : ?>
                <td<? if ((bool)$first) : ?> class="tn-manager"<? endif; ?>><? if ((bool)$first) : ?><div class="tnm-children"><span class="fa fa-plus-square-o tnm-toggle-fa" mode="firstline" action="expand"></span><span class="fa fa-minus-square-o tnm-toggle-fa" mode="firstline" action="expand"></span></div><div class="tnm-content"><? endif; ?><?=MSmarty::date_format($value->DAT, 'd.m.Y')?><? if ((bool)$first) : ?></div><? endif; ?><? $first = false; ?></td>
            <? elseif (($field['alias'] == 'num') && (((bool)$field['used']) || (Yii::app()->user->checkAccess('OfficeStatsSyncSettingsIndex')  &&  ((bool)$field['used'])))) : ?>
                <td<? if ((bool)$first) : ?> class="tn-manager"<? endif; ?>><? if ((bool)$first) : ?><div class="tnm-children"><span class="fa fa-plus-square-o tnm-toggle-fa" mode="firstline" action="expand"></span><span class="fa fa-minus-square-o tnm-toggle-fa" mode="firstline" action="expand"></span></div><div class="tnm-content"><? endif; ?><?=CHtml::encode($value->NUM)?><? if ((bool)$first) : ?></div><? endif; ?><? $first = false; ?></td>
            <? elseif (($field['alias'] == 'contacts') && (((bool)$field['used']) || (Yii::app()->user->checkAccess('OfficeStatsSyncSettingsIndex')  &&  ((bool)$field['used'])))) : ?>
                <td<? if ((bool)$first) : ?> class="tn-manager"<? endif; ?>><? if ((bool)$first) : ?><div class="tnm-children"><span class="fa fa-plus-square-o tnm-toggle-fa" mode="firstline" action="expand"></span><span class="fa fa-minus-square-o tnm-toggle-fa" mode="firstline" action="expand"></span></div><div class="tnm-content"><? endif; ?>
                        <? if (($usertreelevel+(!isset($params->contacts_level) || $params->contacts_level==0)? 32767:$params->contacts_level) >= $value->printout->DLEVEL) :?>
                            <?='Skype:&nbsp;'.CHtml::encode($value->skype)?> <br/>
                            <?=Yii::t('app','Тел').":&nbsp;".CHtml::encode($value->TEL)?> <br/>
                            <?=CHtml::encode($value->MAIL)?>
                        <?endif?>
                        <? if ((bool)$first) : ?></div><? endif; ?><? $first = false; ?>
                </td>
            <? elseif (($field['alias'] == 'contractstype') && (((bool)$field['used']) || (Yii::app()->user->checkAccess('OfficeStatsSyncSettingsIndex')  &&  ((bool)$field['used'])))) : ?>
                <td<? if ((bool)$first) : ?> class="tn-manager"<? endif; ?>><? if ((bool)$first) : ?><div class="tnm-children"><span class="fa fa-plus-square-o tnm-toggle-fa" mode="firstline" action="expand"></span><span class="fa fa-minus-square-o tnm-toggle-fa" mode="firstline" action="expand"></span></div><div class="tnm-content"><? endif; ?><?=CHtml::encode($value->printout->contract->lang->title)?><? if ((bool)$first) : ?></div><? endif; ?><? $first = false; ?></td>

            <? elseif (($field['alias'] == 'privetuserscount') && (((bool)$field['used']) || (Yii::app()->user->checkAccess('OfficeStatsSyncSettingsIndex')  &&  ((bool)$field['used'])))) : ?>
                <td<? if ((bool)$first) : ?> class="tn-manager"<? endif; ?>><? if ((bool)$first) : ?><div class="tnm-children"><span class="fa fa-plus-square-o tnm-toggle-fa" mode="firstline" action="expand"></span><span class="fa fa-minus-square-o tnm-toggle-fa" mode="firstline" action="expand"></span></div><div class="tnm-content"><? endif; ?><?=CHtml::encode($value->printout->FLCOUNT)?><? if ((bool)$first) : ?></div><? endif; ?><? $first = false; ?></td>
            <? elseif (($field['alias'] == 'status') && (((bool)$field['used']) || (Yii::app()->user->checkAccess('OfficeStatsSyncSettingsIndex')  &&  ((bool)$field['used'])))) : ?>
                <td<? if ((bool)$first) : ?> class="tn-manager"<? endif; ?>><? if ((bool)$first) : ?><div class="tnm-children"><span class="fa fa-plus-square-o tnm-toggle-fa" mode="firstline" action="expand"></span><span class="fa fa-minus-square-o tnm-toggle-fa" mode="firstline" action="expand"></span></div><div class="tnm-content"><? endif; ?><?=CHtml::encode($value->printout->rank->lang->title)?><? if ((bool)$first) : ?></div><? endif; ?><? $first = false; ?></td>
            <? elseif (($field['alias'] == 'activity') && (((bool)$field['used']) || (Yii::app()->user->checkAccess('OfficeStatsSyncSettingsIndex')  &&  ((bool)$field['used'])))) : ?>
                <td<? if ((bool)$first) : ?> class="tn-manager"<? endif; ?>><? if ((bool)$first) : ?><div class="tnm-children"><span class="fa fa-plus-square-o tnm-toggle-fa" mode="firstline" action="expand"></span><span class="fa fa-minus-square-o tnm-toggle-fa" mode="firstline" action="expand"></span></div><div class="tnm-content"><? endif; ?>
                        <? if ($value->printout->ACT != 0) :?>
                            <?=Yii::t('app','Активен')?>
                        <? else :?>
                            <?=Yii::t('app','Не активен')?>
                        <?endif?>
                        <? if ((bool)$first) : ?></div><? endif; ?><? $first = false; ?>
                </td>
            <? elseif (($field['alias'] == 'nlo') && (((bool)$field['used']) || (Yii::app()->user->checkAccess('OfficeStatsSyncSettingsIndex')  &&  ((bool)$field['used'])))) : ?>
                <td<? if ((bool)$first) : ?> class="tn-manager"<? endif; ?>><? if ((bool)$first) : ?><div class="tnm-children"><span class="fa fa-plus-square-o tnm-toggle-fa" mode="firstline" action="expand"></span><span class="fa fa-minus-square-o tnm-toggle-fa" mode="firstline" action="expand"></span></div><div class="tnm-content"><? endif; ?><?=CHtml::encode(round($value->printout->NLO,2))?><? if ((bool)$first) : ?></div><? endif; ?><? $first = false; ?></td>
            <? elseif (($field['alias'] == 'lo') && (((bool)$field['used']) || (Yii::app()->user->checkAccess('OfficeStatsSyncSettingsIndex')  &&  ((bool)$field['used'])))) : ?>
                <td<? if ((bool)$first) : ?> class="tn-manager"<? endif; ?>><? if ((bool)$first) : ?><div class="tnm-children"><span class="fa fa-plus-square-o tnm-toggle-fa" mode="firstline" action="expand"></span><span class="fa fa-minus-square-o tnm-toggle-fa" mode="firstline" action="expand"></span></div><div class="tnm-content"><? endif; ?><?=CHtml::encode(round($value->printout->LO,2))?><? if ((bool)$first) : ?></div><? endif; ?><? $first = false; ?></td>
            <? elseif (($field['alias'] == 'lgo') && (((bool)$field['used']) || (Yii::app()->user->checkAccess('OfficeStatsSyncSettingsIndex')  &&  ((bool)$field['used'])))) : ?>
                <td<? if ((bool)$first) : ?> class="tn-manager"<? endif; ?>><? if ((bool)$first) : ?><div class="tnm-children"><span class="fa fa-plus-square-o tnm-toggle-fa" mode="firstline" action="expand"></span><span class="fa fa-minus-square-o tnm-toggle-fa" mode="firstline" action="expand"></span></div><div class="tnm-content"><? endif; ?><?=CHtml::encode(round($value->printout->LGO,2))?><? if ((bool)$first) : ?></div><? endif; ?><? $first = false; ?></td>
            <? elseif (($field['alias'] == 'count_potreb') && (((bool)$field['used']) || (Yii::app()->user->checkAccess('OfficeStatsSyncSettingsIndex')  &&  ((bool)$field['used'])))) : ?>
                <td<? if ((bool)$first) : ?> class="tn-manager"<? endif; ?>><? if ((bool)$first) : ?><div class="tnm-children"><span class="fa fa-plus-square-o tnm-toggle-fa" mode="firstline" action="expand"></span><span class="fa fa-minus-square-o tnm-toggle-fa" mode="firstline" action="expand"></span></div><div class="tnm-content"><? endif; ?><?=CHtml::encode($value->printout->COUNT_POTREB)?><? if ((bool)$first) : ?></div><? endif; ?><? $first = false; ?></td>
            <? elseif (($field['alias'] == 'count_partner') && (((bool)$field['used']) || (Yii::app()->user->checkAccess('OfficeStatsSyncSettingsIndex')  &&  ((bool)$field['used'])))) : ?>
                <td<? if ((bool)$first) : ?> class="tn-manager"<? endif; ?>><? if ((bool)$first) : ?><div class="tnm-children"><span class="fa fa-plus-square-o tnm-toggle-fa" mode="firstline" action="expand"></span><span class="fa fa-minus-square-o tnm-toggle-fa" mode="firstline" action="expand"></span></div><div class="tnm-content"><? endif; ?><?=CHtml::encode($value->printout->COUNT_PARTNER)?><? if ((bool)$first) : ?></div><? endif; ?><? $first = false; ?></td>
            <? elseif (($field['alias'] == 'count_biz') && (((bool)$field['used']) || (Yii::app()->user->checkAccess('OfficeStatsSyncSettingsIndex')  &&  ((bool)$field['used'])))) : ?>
                <td<? if ((bool)$first) : ?> class="tn-manager"<? endif; ?>><? if ((bool)$first) : ?><div class="tnm-children"><span class="fa fa-plus-square-o tnm-toggle-fa" mode="firstline" action="expand"></span><span class="fa fa-minus-square-o tnm-toggle-fa" mode="firstline" action="expand"></span></div><div class="tnm-content"><? endif; ?><?=CHtml::encode($value->printout->COUNT_BIZ)?><? if ((bool)$first) : ?></div><? endif; ?><? $first = false; ?></td>
            <? elseif (($field['alias'] == 'activemonth') && (((bool)$field['used']) || (Yii::app()->user->checkAccess('OfficeStatsSyncSettingsIndex')  &&  ((bool)$field['used'])))) : ?>
                <td<? if ((bool)$first) : ?> class="tn-manager"<? endif; ?>><? if ((bool)$first) : ?><div class="tnm-children"><span class="fa fa-plus-square-o tnm-toggle-fa" mode="firstline" action="expand"></span><span class="fa fa-minus-square-o tnm-toggle-fa" mode="firstline" action="expand"></span></div><div class="tnm-content"><? endif; ?><?=CHtml::encode($value->printout->ACTIVEMONTH)?><? if ((bool)$first) : ?></div><? endif; ?><? $first = false; ?></td>
            <? elseif (($field['alias'] == 'sendmessage') && (((bool)$field['used']) || (Yii::app()->user->checkAccess('OfficeStatsSyncSettingsIndex')  &&  ((bool)$field['used'])))) : ?>
                <td<? if ((bool)$first) : ?> class="tn-manager"<? endif; ?>><? if ((bool)$first) : ?><div class="tnm-children"><span class="fa fa-plus-square-o tnm-toggle-fa" mode="firstline" action="expand"></span><span class="fa fa-minus-square-o tnm-toggle-fa" mode="firstline" action="expand"></span></div><div class="tnm-content"><? endif; ?>
                        <? if(!empty($value->userssync->user->id)) : ?>
                            <?=CHtml::link(Yii::t('app','Отправить сообщение'), array('/office/message/default/index/tab/2', 'guid' => sha1($value->userssync->user->id))) ?>
                        <? else :?>
                            <?=Yii::t('app','Пользователь не активирован')?>
                        <? endif; ?>
                        <? if ((bool)$first) : ?></div><? endif; ?><? $first = false; ?></td>
            <? elseif (($field['alias'] == 'newbizcount') && (((bool)$field['used']) || (Yii::app()->user->checkAccess('OfficeStatsSyncSettingsIndex')  &&  ((bool)$field['used'])))) : ?>
                <td<? if ((bool)$first) : ?> class="tn-manager"<? endif; ?>><? if ((bool)$first) : ?><div class="tnm-children"><span class="fa fa-plus-square-o tnm-toggle-fa" mode="firstline" action="expand"></span><span class="fa fa-minus-square-o tnm-toggle-fa" mode="firstline" action="expand"></span></div><div class="tnm-content"><? endif; ?><?=CHtml::encode($value->printout->NEWBIZCOUNT)?><? if ((bool)$first) : ?></div><? endif; ?><? $first = false; ?></td>
            <? elseif (($field['alias'] == 'distrcount') && (((bool)$field['used']) || (Yii::app()->user->checkAccess('OfficeStatsSyncSettingsIndex')  &&  ((bool)$field['used'])))) : ?>
                <td<? if ((bool)$first) : ?> class="tn-manager"<? endif; ?>><? if ((bool)$first) : ?><div class="tnm-children"><span class="fa fa-plus-square-o tnm-toggle-fa" mode="firstline" action="expand"></span><span class="fa fa-minus-square-o tnm-toggle-fa" mode="firstline" action="expand"></span></div><div class="tnm-content"><? endif; ?><?=CHtml::encode($value->printout->DISTRCOUNT)?><? if ((bool)$first) : ?></div><? endif; ?><? $first = false; ?></td>
			<? elseif (!empty($field['table'])):?>						
				<?if($field['table'] == 'SYNC_DISTR'):?>	
					 <? if (((bool)$field['used']) || (Yii::app()->user->checkAccess('OfficeStatsSyncSettingsIndex')  &&  ((bool)$field['used']))) : ?>
						<?if($field['format'] == 'date'):?>
							<td<? if ((bool)$first) : ?> class="tn-manager"<? endif; ?>><? if ((bool)$first) : ?><div class="tnm-children"><span class="fa fa-plus-square-o tnm-toggle-fa" mode="firstline" action="expand"></span><span class="fa fa-minus-square-o tnm-toggle-fa" mode="firstline" action="expand"></span></div><div class="tnm-content"><? endif; ?><?=MSmarty::date_format($value[$field['alias']], 'd.m.Y')?><? if ((bool)$first) : ?></div><? endif; ?><? $first = false; ?></td>		
						<? else:?>										
							<td<? if ((bool)$first) : ?> class="tn-manager"<? endif; ?>><? if ((bool)$first) : ?><div class="tnm-children"><span class="fa fa-plus-square-o tnm-toggle-fa" mode="firstline" action="expand"></span><span class="fa fa-minus-square-o tnm-toggle-fa" mode="firstline" action="expand"></span></div><div class="tnm-content"><? endif; ?><?=CHtml::encode($value[$field['alias']])?><? if ((bool)$first) : ?></div><? endif; ?><? $first = false; ?></td>								
						<?endif?>										
					<?endif?>
				<?elseif($field['table'] == 'printout'):?>				
					<?if($field['format'] == 'date'):?>
							<td<? if ((bool)$first) : ?> class="tn-manager"<? endif; ?>><? if ((bool)$first) : ?><div class="tnm-children"><span class="fa fa-plus-square-o tnm-toggle-fa" mode="firstline" action="expand"></span><span class="fa fa-minus-square-o tnm-toggle-fa" mode="firstline" action="expand"></span></div><div class="tnm-content"><? endif; ?><?=MSmarty::date_format($value->printout[$field['alias']], 'd.m.Y')?><? if ((bool)$first) : ?></div><? endif; ?><? $first = false; ?></td>									
					<? else:?>												
						<td<? if ((bool)$first) : ?> class="tn-manager"<? endif; ?>><? if ((bool)$first) : ?><div class="tnm-children"><span class="fa fa-plus-square-o tnm-toggle-fa" mode="firstline" action="expand"></span><span class="fa fa-minus-square-o tnm-toggle-fa" mode="firstline" action="expand"></span></div><div class="tnm-content"><?=CHtml::encode($value->printout[$field['alias']])?></div><? endif; ?><? $first = false; ?></td>				
					<?endif?>											
				<?endif?>	
            <? endif; ?>
        <? endforeach; ?>
        <? if ((Yii::app()->isModuleInstall('AdminMatrix')) && (!empty($user_matrix))) : ?>
            <? foreach ($user_matrix as $item => $matrix) : ?>
                <td style="padding-left: 15px; padding-right: 5px;">
                    <? if ((!array_key_exists($key, $matrix)) || (!$matrix[$key])) : ?>
                        <span class="matrix-empty">&nbsp;</span>
                    <? else : ?>
                        <a href="<?=$this->createUrl('/office/matrix/tokens/view/type/' . $item . '/token/' . $matrix[$key]->id)?>" target="_blank"><span class="matrix-active"></span></a>
                    <? endif; ?>
                </td>
            <? endforeach; ?>
        <? endif; ?>
    </tr>
<? endforeach; ?>