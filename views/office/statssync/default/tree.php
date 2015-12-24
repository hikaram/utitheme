
<?php $this->layout = 'office'; ?>
<? if (!$empty) : ?>
    <link rel="stylesheet" href="<?=Yii::app()->assetManager->getPublishedUrl(Yii::getPathOfAlias('application.modules.office.modules.statssync.css'))?>/css/officestats.css" type="text/css" media="screen, projection" />
    <?=CHtml::hiddenField('asseturl', Yii::app()->assetManager->getPublishedUrl(Yii::getPathOfAlias('application.modules.office.modules.statssync.css')), array('id' => 'asseturl'))?>
    <style>
    /*    .table.table-hover thead tr th {
            border: medium none;
            color: #fff;
            background-color : #73bb54
        }*/
        input.form-control {
            margin-left: 17px;
            width: 90%;
        }

        .tn-container .tnm-children{
            margin-left: -25px !important;
            padding-left: 10px;
        }
        input.form-control {
            margin-left: 0;
            width: 99%;
            display: inline;
        }
    </style>

    <div class="loader"></div>
    <div class="portlet box blue">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-gift"></i>Дерево по личным приглашениям
        </div>
    </div>
    <div class="portlet-body">
         <?=CHtml::encode($params->lang->description)?>
             <? if ((bool)$params->is_filter) : ?>
                
         <div class="portlet box green">
         <div class="portlet-title">
             <div class="caption">
                 <i class="fa fa-cog">&nbsp; Настройки</i>
             </div>
             <div class="tools">
                 <a href="javascript:;" class="collapse"> </a>
             </div>
         </div>
         <div class="portlet-body" >

             <div class="filter-block" style="/*overflow: hidden;*/ display: block; width: 90%;"">
                <?=CHtml::beginForm('', 'POST', array('id' => 'filterform'))?>
                <?=CHtml::hiddenField('userid', array_key_exists('userid', $filter) ? $filter['userid'] : '', array('class' => 'form-control', 'id' => 'disrrtreeauserid'))?>
                 <table  class="table table-striped table-hover table-bordered dataTable no-footer" style="width: 100%;">
                     <tbody>
					 
                         <? foreach ($fields as $field) : ?>
                             <? if ((bool)$field['is_filter']) : ?>
                                <tr>
                                    <td style="width: 30%;">
                                        <?=CHtml::encode($field['title'])?>
                                    </td>
                                    <td>
                                         <? if ((($field['alias'] == 'birthday') || ($field['alias'] == 'activity_date_end') || ($field['alias'] == 'contract_date')) && (((bool)$field['used']) || (Yii::app()->user->checkAccess('OfficeStatsSyncSettingsIndex')  &&  ((bool)$field['used'])))) : ?>
                                             <?=Yii::t('app', 'от')?>&nbsp;<?=CHtml::textField($field['alias'] . '_from', array_key_exists($field['alias'] . '_from', $filter) ? $filter[$field['alias'] . '_from'] : '', array('class' => 'date', 'readonly' => 'readonly',))?>
                                             &nbsp;<?=Yii::t('app', 'до')?>&nbsp;<?=CHtml::textField($field['alias'] . '_end', array_key_exists($field['alias'] . '_end', $filter) ? $filter[$field['alias'] . '_end'] : '', array('class' => 'date', 'readonly' => 'readonly',))?>
                                         <? elseif ((($field['alias'] == 'sex') || ($field['alias'] == 'register_status') || ($field['alias'] == 'user_business_types__id')) && (((bool)$field['used']) || (Yii::app()->user->checkAccess('OfficeStatsSyncSettingsIndex')  &&  ((bool)$field['used'])))) : ?>
                                             <?=CHtml::listBox($field['alias'], array_key_exists($field['alias'], $filter) ? $filter[$field['alias']] : (int)FALSE, $filterselects[$field['alias']], array('class' => 'form-control', 'size' => 0))?>
                                         <? else : ?>

                                            <!--<div class="col-16 text-center">-->
                                                <?=CHtml::textField($field['alias'], array_key_exists($field['alias'], $filter) ? $filter[$field['alias']] : '', array('class' => 'form-control'))?>
                                            <!--</div>-->
                                        <? endif; ?>
                                    </td>
                                </tr>

                             <? endif; ?>
                         <? endforeach;?>
                    </tbody>
                 </table>
                        <div class="row">
                        <div class="col-3 bold"></div>
                            <div >
                                <?=CHtml::button(Yii::t('app', 'Фильтровать'), array('class' => 'btn left', 'style' =>'margin-left:10px;margin-top:10px','onClick' => 'saveFilter("tree")'))?>
       <!--                     </div>
                            <div class="col-4 right" >-->
                                <?=CHtml::link(Yii::t('app', 'Сбросить фильтр'), 'javascript: void(0)', array('class' => 'btn green', 'style' =>'margin-left:10px;margin-top:10px','onClick' => 'location.href="/office/statssync/default/tree"'))?>
                            </div>
                        </div>
                        <?=CHtml::endForm()?>
                    </div>
                </div>
            </div>
            <? endif; ?>
            <div class="col-4"></div>
            <div class="row">
                <div class="col-12" style="padding-left: 10px;width: 99%;">
                <? if (empty($list)) : ?>
                    <? if ((bool)$is_empty_filter) : ?>
                        <?=Yii::t('app', 'В вашей струкутуре нет ни одного пользователя')?>
                    <? else : ?>
                        <? if (count($modelUsers) > 1) : ?>
                            <div style="margin-top: 15px;"><?=Yii::t('app', 'Найдено несколько пользователей, удовлетворяющих условиям фильтрации')?></div>
                        <? else : ?>
                            <div style="margin-top: 15px;"><?=Yii::t('app', 'Не найдено ни одного пользователя, удовлетворяющего условиям фильтрации')?></div>
                        <? endif; ?>
                    <? endif; ?>
                <? else : ?>
                    <table class="list" style="width: 100%;<? if ((bool)$params->is_filter) : ?> margin-top: 15px;<?endif; ?>">
                        <tbody>
                            <tr>
                                <th>Всего в структуре пользователей: <?=$count - 1?>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <?=Yii::t('app','Расчетный период')?>: <?=$periods[0]->REGDAT?></th>
                            </tr>
                        </tbody>
                    </table>
                    <div style="overflow: auto; max-height: 800px">
                        <?php $cities = $this->beginWidget('CitiesWidget', array()); ?>

                        <table class="table table-striped table-hover table-bordered dataTable no-footer"  id="distrslist" style="width: 100%;">

                                <thead>
                                    <? foreach ($fields as $field) : ?>
                                        <? if (((bool)$field['used']) || (Yii::app()->user->checkAccess('OfficeStatsSyncSettingsIndex')  &&  ((bool)$field['used']))) : ?>
                                            <th><?=CHtml::encode($field['title'])?></th>
                                        <? endif; ?>
                                    <? endforeach; ?>
                                    <? if ((Yii::app()->isModuleInstall('AdminMatrix')) && (!empty($user_matrix))) : ?>
                                        <th colspan="<?=count($user_matrix)?>"><?=Yii::t('app', 'Позиции в матрице')?></th>
                                    <? endif; ?>
                                </thead>
                                <?php $i = 0; ?>
                                 <tbody>
                                <? foreach ($list as $key => $value) : ?>
                                    <?php $i++; ?>
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
                            </tbody>
                        </table>
                        <?php $this->endWidget(); ?>
                        <br />
                        <? if ($pages != NULL) : ?>
                            <? $this->widget('CLinkPager', array('pages' => $pages))?>
                        <? endif; ?>
                        <br /><br />
                    </div>
                <? endif; ?>

                    <div style="margin: 15px 0 15px 10px;">
                        <?=CHtml::beginForm($this->createUrl('/office/statssync/settings/index'))?>
                            <?=CHtml::submitButton(Yii::t('app', 'Вернуться к списку отчетов'), array('class' => 'btn left'))?>
                        <?=CHtml::endForm()?>
                    </div>
                </div>
                </div>

            <? if (count($modelUsers) > 1) : ?>
                <div class="list_choose" id="list_choose">
                    <h3>Выберите пользователя:</h3>
                    <div id="table_list">
                        <table class="distrslist" style="width: 690px; margin-top: 2px;">
                            <tr>
                                <th style="width: 130px;">Логин</th>
                                <th style="width: 170px;">Фамилия</th>
                                <th style="width: 170px;">Имя</th>
                                <th style="width: 170px;">Отчество</th>
                            </tr>
                            <? foreach($modelUsers as $item => $row) :?>
                                <tr onClick="insertData('<?=$row->id?>')">
                                <?//vg($row);die;?>
                                    <td><?=(!empty($row->userssync->user->username))?$row->userssync->user->username:Yii::t('app','Пользователь не активирован')?></td>
                                    <td><?=$row->FAM?></td>
                                    <td><?=$row->NAME?></td>
                                    <td><?=$row->OTCH?></td>
                                </tr>
                            <? endforeach; ?>
                        </table>
                        <br />
                        <input type="button" value="Отмена" class="btn100" onClick="hideTable()" />
                    </div>
                </div>
            <? endif; ?>

        </div>
    </div>
<? else :?>
    Нет данных
<? endif?>