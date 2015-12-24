<?php $this->layout = 'office'; ?>
<? if (!$empty) : ?>

    <style>
    /*    .table.table-hover thead tr th {
            border: medium none;
            color: #fff;
            background-color : #73bb54
        }*/
    </style>
    <div class="loader"></div>
    <div class="portlet box blue">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-table"></i>Бонусы по периодам
            </div>
        </div>
        <div class="portlet-body" style=" overflow: hidden;">
            <link rel="stylesheet" href="<?=Yii::app()->assetManager->getPublishedUrl(Yii::getPathOfAlias('application.modules.office.modules.statssync.css'))?>/css/officestats.css" type="text/css" media="screen, projection" />
            <?=CHtml::hiddenField('asseturl', Yii::app()->assetManager->getPublishedUrl(Yii::getPathOfAlias('application.modules.office.modules.statssync.css')), array('id' => 'asseturl'))?>
            <? if (empty($list)) : ?>
                <?=Yii::t('app', 'Нет данных')?>
            <? else : ?>
                <div style="width: 100%;overflow: auto;">
                    <table  class="table table-striped table-hover table-bordered dataTable no-footer" style="width: 98%;">
                        <tbody>
                        <thead>
                        <? foreach ($fields as $field) : ?>
                            <? if (((bool)$field['used']) || (Yii::app()->user->checkAccess('OfficeStatsSettingsIndex') && ((bool)$field['used']))) : ?>
                                <th><?=CHtml::encode($field['title'])?></th>
                            <? endif; ?>
                        <? endforeach; ?>
                        </thead>
                        <?php $i = ($page - 1) * $params->dataset_per_page; ?>
                        <? foreach($list as $key => $value) :?>
                            <tr>
                                <? foreach ($fields as $field) : ?>
                                    <? if (($field['alias'] == 'settlement_period') && (((bool)$field['used']) || (Yii::app()->user->checkAccess('OfficeStatsSettingsIndex') && ((bool)$field['used'])))) : ?>
                                        <td><?=CHtml::encode($periods[$value->DAT])?></td>
                                    <? elseif (($field['alias'] == 'contractstype') && (((bool)$field['used']) || (Yii::app()->user->checkAccess('OfficeStatsSettingsIndex') && ((bool)$field['used'])))) : ?>
                                        <td><?=CHtml::encode($value->contract->lang->title)?></td>
                                    <? elseif (($field['alias'] == 'qualification') && (((bool)$field['used']) || (Yii::app()->user->checkAccess('OfficeStatsSettingsIndex') && ((bool)$field['used'])))) : ?>
                                        <td><?=CHtml::encode($value->rank->lang->title)?></td>
                                    <? elseif (($field['alias'] == 'activity') && (((bool)$field['used']) || (Yii::app()->user->checkAccess('OfficeStatsSettingsIndex') && ((bool)$field['used'])))) : ?>
                                        <td>
                                            <? if ($value->ACT != 0) :?>
                                                <?=Yii::t('app','Активен')?>
                                            <? else :?>
                                                <?=Yii::t('app','Не активен')?>
                                            <?endif?>
                                        </td>
                                    <? elseif (($field['alias'] == 'flcount') && (((bool)$field['used']) || (Yii::app()->user->checkAccess('OfficeStatsSettingsIndex') && ((bool)$field['used'])))) : ?>
                                        <td><?=CHtml::encode($value->FLCOUNT)?></td>
                                    <? elseif (($field['alias'] == 'distrcount') && (((bool)$field['used']) || (Yii::app()->user->checkAccess('OfficeStatsSettingsIndex') && ((bool)$field['used'])))) : ?>
                                        <td><?=CHtml::encode($value->DISTRCOUNT)?></td>
                                    <? elseif (($field['alias'] == 'distrcount') && (((bool)$field['used']) || (Yii::app()->user->checkAccess('OfficeStatsSettingsIndex') && ((bool)$field['used'])))) : ?>
                                        <td><?=CHtml::encode($value->COUNT_POTREB)?></td>
                                    <? elseif (($field['alias'] == 'count_potreb') && (((bool)$field['used']) || (Yii::app()->user->checkAccess('OfficeStatsSettingsIndex') && ((bool)$field['used'])))) : ?>
                                        <td><?=CHtml::encode($value->COUNT_POTREB)?></td>
                                    <? elseif (($field['alias'] == 'count_partner') && (((bool)$field['used']) || (Yii::app()->user->checkAccess('OfficeStatsSettingsIndex') && ((bool)$field['used'])))) : ?>
                                        <td><?=CHtml::encode($value->COUNT_PARTNER)?></td>
                                    <? elseif (($field['alias'] == 'count_biz') && (((bool)$field['used']) || (Yii::app()->user->checkAccess('OfficeStatsSettingsIndex') && ((bool)$field['used'])))) : ?>
                                        <td><?=CHtml::encode($value->COUNT_BIZ)?></td>
                                    <? elseif (($field['alias'] == 'lo') && (((bool)$field['used']) || (Yii::app()->user->checkAccess('OfficeStatsSettingsIndex') && ((bool)$field['used'])))) : ?>
                                        <td><?=CHtml::encode(round($value->LO,2))?></td>
                                    <? elseif (($field['alias'] == 'fl_go') && (((bool)$field['used']) || (Yii::app()->user->checkAccess('OfficeStatsSettingsIndex') && ((bool)$field['used'])))) : ?>
                                        <td><?=CHtml::encode(round($value->FL_GO,2))?></td>
                                    <? elseif (($field['alias'] == 'lgo') && (((bool)$field['used']) || (Yii::app()->user->checkAccess('OfficeStatsSettingsIndex') && ((bool)$field['used'])))) : ?>
                                        <td><?=CHtml::encode(round($value->LGO,2))?></td>
                                    <? elseif (($field['alias'] == 'lgo') && (((bool)$field['used']) || (Yii::app()->user->checkAccess('OfficeStatsSettingsIndex') && ((bool)$field['used'])))) : ?>
                                        <td><?=CHtml::encode(round($value->LGO,2))?></td>
                                    <? elseif (($field['alias'] == 'activemonth') && (((bool)$field['used']) || (Yii::app()->user->checkAccess('OfficeStatsSettingsIndex') && ((bool)$field['used'])))) : ?>
                                        <td><?=CHtml::encode($value->ACTIVEMONTH)?></td>
                                    <? elseif (($field['alias'] == 'netbonus') && (((bool)$field['used']) || (Yii::app()->user->checkAccess('OfficeStatsSettingsIndex') && ((bool)$field['used'])))) : ?>
                                        <td><?=CHtml::encode(round($value->NETBONUS,2))?></td>
                                    <? elseif (($field['alias'] == 'bizbonus') && (((bool)$field['used']) || (Yii::app()->user->checkAccess('OfficeStatsSettingsIndex') && ((bool)$field['used'])))) : ?>
                                        <td><?=CHtml::encode(round($value->BIZBONUS,2))?></td>
                                    <? elseif (($field['alias'] == 'flbonus') && (((bool)$field['used']) || (Yii::app()->user->checkAccess('OfficeStatsSettingsIndex') && ((bool)$field['used'])))) : ?>
                                        <td><?=CHtml::encode(round($value->FLBONUS,2))?></td>
                                    <? elseif (($field['alias'] == 'linebonus') && (((bool)$field['used']) || (Yii::app()->user->checkAccess('OfficeStatsSettingsIndex') && ((bool)$field['used'])))) : ?>
                                        <td><?=CHtml::encode(round($value->LINEBONUS,2))?></td>
                                    <? elseif (($field['alias'] == 'line_bonus2') && (((bool)$field['used']) || (Yii::app()->user->checkAccess('OfficeStatsSettingsIndex') && ((bool)$field['used'])))) : ?>
                                        <td><?=CHtml::encode(round($value->LINE_BONUS2,2))?></td>
                                    <? elseif (($field['alias'] == 'line_bonus3') && (((bool)$field['used']) || (Yii::app()->user->checkAccess('OfficeStatsSettingsIndex') && ((bool)$field['used'])))) : ?>
                                        <td><?=CHtml::encode(round($value->LINE_BONUS3,2))?></td>
                                    <? elseif (($field['alias'] == 'line_bonus4') && (((bool)$field['used']) || (Yii::app()->user->checkAccess('OfficeStatsSettingsIndex') && ((bool)$field['used'])))) : ?>
                                        <td><?=CHtml::encode(round($value->LINE_BONUS4,2))?></td>
                                    <? elseif (($field['alias'] == 'line_bonus5') && (((bool)$field['used']) || (Yii::app()->user->checkAccess('OfficeStatsSettingsIndex') && ((bool)$field['used'])))) : ?>
                                        <td><?=CHtml::encode(round($value->LINE_BONUS5,2))?></td>
                                    <? elseif (($field['alias'] == 'totalbonus') && (((bool)$field['used']) || (Yii::app()->user->checkAccess('OfficeStatsSettingsIndex') && ((bool)$field['used'])))) : ?>
                                        <td><?=CHtml::encode(round($value->TOTALBONUS,2))?></td>
                                   	<? elseif (!empty($field['table'])):?>									
											<?//vg($field['alias']);die;?>
											<? if ((((bool)$field['used']) || (Yii::app()->user->checkAccess('OfficeStatsSettingsIndex')  &&  ((bool)$field['used'])))) : ?>
											<?if($field['format'] == 'date'):?>
												<td>
													<?=MSmarty::date_format($value[$field['alias']], 'd.m.Y')?>
												</td>	
											<? else:?>
												<td>
													<?=CHtml::encode($value[$field['alias']])?>
												</td>														
											<?endif?>													
										<?endif?>
									<? endif; ?>	
                                <?endforeach?>
                            </tr>
                        <?endforeach?>
                        <tbody>
                    </table>
                </div>

            <?endif?>


            <div style="margin-bottom: 20px">
                <? if ($pages != NULL) : ?>
                    <? $this->widget('CLinkPager', array('pages' => $pages))?>
                <? endif; ?>
            </div>
            <div style="margin: 15px 0 15px 0px; display: inline !important;">
                <?=CHtml::beginForm($this->createUrl('/office/statssync/settings/index/'))?>
                <?=CHtml::submitButton(Yii::t('app', 'Вернуться к списку отчетов'), array('class' => 'btn green'))?>
                <?=CHtml::endForm()?>
            </div>
        </div>
    </div>
<? else :?>
    Нет данных
<? endif?>