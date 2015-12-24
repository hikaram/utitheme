<?php $this->layout = 'office'; ?>
<?
if (!$empty) : ?>
    <style>
        .table.table-hover thead tr th {
            border: medium none;
            color: #fff;
            background-color : #73bb54
        }
    </style>
    <div class="loader"></div>
    <div class="portlet box blue">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-table"></i>Персональный бонус за период
            </div>
        </div>
        <div class="portlet-body" style=" overflow: hidden;">
            <link rel="stylesheet" href="<?=Yii::app()->assetManager->getPublishedUrl(Yii::getPathOfAlias('application.modules.office.modules.statssync.css'))?>/css/officestats.css" type="text/css" media="screen, projection" />
            <?=CHtml::hiddenField('asseturl', Yii::app()->assetManager->getPublishedUrl(Yii::getPathOfAlias('application.modules.office.modules.statssync.css')), array('id' => 'asseturl'))?>

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
                    <div class="portlet-body" style="padding-left: 30px;">
                        <div class="filter-block" style="/*overflow: hidden;*/ display: block; width: 90%;">
                            <?=CHtml::beginForm('', 'POST', array('id' => 'filterform'))?>
                            <table  class="table table-striped table-hover table-bordered dataTable no-footer" style="width: 100%;">
                                <tbody>
                                <? foreach ($fields as $field) : ?>
                                    <? if ((bool)$field['is_filter']) : ?>
                                        <tr>
                                            <td style="width: 30%;">
                                                <?=CHtml::encode($field['title'])?>
                                            </td>
                                            <td>
                                                <? if (($field['alias'] == 'settlement_period') && (((bool)$field['used']) || (Yii::app()->user->checkAccess('OfficeSyncSettingsIndex')))) : ?>
                                                    <?=CHtml::dropDownList('period',$period,$periods, array('class' => 'form-control'))?>
                                                <? endif?>
                                            </td>
                                        </tr>
                                    <? endif; ?>
                                <? endforeach;?>
                                </tbody>
                            </table>
                        <div class="row">
                            <div class="col-6">
                                <?=CHtml::submitbutton(Yii::t('app', 'Фильтровать'), array('class' => 'btn right', 'style' =>'margin-left:10px;margin-top:10px' ))?>
        <!--                            </div>
                            <div class="col-6">-->
                                <?=CHtml::link(Yii::t('app', 'Сбросить фильтр'), 'javascript: void(0)', array('class' => 'btn green', 'style' =>'margin-left:10px;margin-top:10px', 'onClick' => 'location.href="/office/statssync/default/personalbonusbyperiods"'))?>
                            </div>
                        </div>
                        <?=CHtml::endForm()?>
                        </div>
                    </div>
                </div>
            <? endif?>
            <div class="col-4"></div>
            <div class="row">
                <div class="col-12">
                    <table class="table table-striped table-hover table-bordered dataTable no-footer" style="width: 98%;  margin-left: 1%;">
                        <?

    /*                    echo "<pre>";
                        print_r($list);
                        echo "<pre>";
                        die();*/
                        foreach ($fields as $field) : ?>
                            <? if (($field['alias'] == 'settlement_period') && (((bool)$field['used']) || (Yii::app()->user->checkAccess('OfficeStatsSettingsIndex')  &&  ((bool)$field['used'])))) : ?>
                                <tr>
                                    <td><?=CHtml::encode($field['title'])?></td>
                                    <td><?=CHtml::encode($periods[$period])?></td>
                                </tr>
                            <?endif?>

                            <? if (($field['alias'] == 'contractstype') && (((bool)$field['used']) || (Yii::app()->user->checkAccess('OfficeStatsSettingsIndex')  &&  ((bool)$field['used'])))) : ?>
                                <tr>
                                    <td><?=CHtml::encode($field['title'])?></td>
                                    <td><?=CHtml::encode($list->printoutall[0]->contract->lang->title)?></td>
                                </tr>
                            <?endif?>

                            <? if (($field['alias'] == 'qualification') && (((bool)$field['used']) || (Yii::app()->user->checkAccess('OfficeStatsSettingsIndex')  &&  ((bool)$field['used'])))) : ?>
                                <tr>
                                    <td><?=CHtml::encode($field['title'])?></td>
                                    <td><?=CHtml::encode($list->printoutall[0]->rank->lang->title)?></td>
                                </tr>
                            <?endif?>

                            <? if (($field['alias'] == 'activity') && (((bool)$field['used']) || (Yii::app()->user->checkAccess('OfficeStatsSettingsIndex')  &&  ((bool)$field['used'])))) : ?>
                                <tr>
                                    <td><?=CHtml::encode($field['title'])?></td>
                                    <td>
                                        <? if ($list->printoutall[0]->ACT != 0) :?>
                                            <?=Yii::t('app','Активен')?>
                                        <? else :?>
                                            <?=Yii::t('app','Не активен')?>
                                        <?endif?>
                                    </td>
                                </tr>
                            <?endif?>

                            <? if (($field['alias'] == 'flcount') && (((bool)$field['used']) || (Yii::app()->user->checkAccess('OfficeStatsSettingsIndex')  &&  ((bool)$field['used'])))) : ?>
                                <tr>
                                    <td><?=CHtml::encode($field['title'])?></td>
                                    <td><?=CHtml::encode($list->printoutall[0]->FLCOUNT)?></td>
                                </tr>
                            <?endif?>

                            <? if (($field['alias'] == 'distrcount') && (((bool)$field['used']) || (Yii::app()->user->checkAccess('OfficeStatsSettingsIndex')  &&  ((bool)$field['used'])))) : ?>
                                <tr>
                                    <td><?=CHtml::encode($field['title'])?></td>
                                    <td><?=CHtml::encode($list->printoutall[0]->DISTRCOUNT)?></td>
                                </tr>
                            <?endif?>

                            <? if (($field['alias'] == 'count_potreb') && (((bool)$field['used']) || (Yii::app()->user->checkAccess('OfficeStatsSettingsIndex')  &&  ((bool)$field['used'])))) : ?>
                                <tr>
                                    <td><?=CHtml::encode($field['title'])?></td>
                                    <td><?=CHtml::encode($list->printoutall[0]->COUNT_POTREB)?></td>
                                </tr>
                            <?endif?>

                            <? if (($field['alias'] == 'count_partner') && (((bool)$field['used']) || (Yii::app()->user->checkAccess('OfficeStatsSettingsIndex')  &&  ((bool)$field['used'])))) : ?>
                                <tr>
                                    <td><?=CHtml::encode($field['title'])?></td>
                                    <td><?=CHtml::encode($list->printoutall[0]->COUNT_PARTNER)?></td>
                                </tr>
                            <?endif?>

                            <? if (($field['alias'] == 'count_biz') && (((bool)$field['used']) || (Yii::app()->user->checkAccess('OfficeStatsSettingsIndex')  &&  ((bool)$field['used'])))) : ?>
                                <tr>
                                    <td><?=CHtml::encode($field['title'])?></td>
                                    <td><?=CHtml::encode($list->printoutall[0]->COUNT_BIZ)?></td>
                                </tr>
                            <?endif?>

                            <? if (($field['alias'] == 'lo') && (((bool)$field['used']) || (Yii::app()->user->checkAccess('OfficeStatsSettingsIndex')  &&  ((bool)$field['used'])))) : ?>
                                <tr>
                                    <td><?=CHtml::encode($field['title'])?></td>
                                    <td><?=CHtml::encode(round($list->printoutall[0]->LO,2))?></td>
                                </tr>
                            <?endif?>

                            <? if (($field['alias'] == 'fl_go') && (((bool)$field['used']) || (Yii::app()->user->checkAccess('OfficeStatsSettingsIndex')  &&  ((bool)$field['used'])))) : ?>
                                <tr>
                                    <td><?=CHtml::encode($field['title'])?></td>
                                    <td><?=CHtml::encode(round($list->printoutall[0]->FL_GO,2))?></td>
                                </tr>
                            <?endif?>

                            <? if (($field['alias'] == 'lgo') && (((bool)$field['used']) || (Yii::app()->user->checkAccess('OfficeStatsSettingsIndex')  &&  ((bool)$field['used'])))) : ?>
                                <tr>
                                    <td><?=CHtml::encode($field['title'])?></td>
                                    <td><?=CHtml::encode($list->printoutall[0]->LGO)?></td>
                                </tr>
                            <?endif?>

                            <? if (($field['alias'] == 'activemonth') && (((bool)$field['used']) || (Yii::app()->user->checkAccess('OfficeStatsSettingsIndex')  &&  ((bool)$field['used'])))) : ?>
                                <tr>
                                    <td><?=CHtml::encode($field['title'])?></td>
                                    <td><?=CHtml::encode($list->printoutall[0]->ACTIVEMONTH)?></td>
                                </tr>
                            <?endif?>

                            <? if (($field['alias'] == 'netbonus') && (((bool)$field['used']) || (Yii::app()->user->checkAccess('OfficeStatsSettingsIndex')  &&  ((bool)$field['used'])))) : ?>
                                <tr>
                                    <td><?=CHtml::encode($field['title'])?></td>
                                    <td><?=CHtml::encode(round($list->printoutall[0]->NETBONUS,2))?></td>
                                </tr>
                            <?endif?>

                            <? if (($field['alias'] == 'bizbonus') && (((bool)$field['used']) || (Yii::app()->user->checkAccess('OfficeStatsSettingsIndex')  &&  ((bool)$field['used'])))) : ?>
                                <tr>
                                    <td><?=CHtml::encode($field['title'])?></td>
                                    <td><?=CHtml::encode(round($list->printoutall[0]->BIZBONUS,2))?></td>
                                </tr>
                            <?endif?>

                            <? if (($field['alias'] == 'flbonus') && (((bool)$field['used']) || (Yii::app()->user->checkAccess('OfficeStatsSettingsIndex')  &&  ((bool)$field['used'])))) : ?>
                                <tr>
                                    <td><?=CHtml::encode($field['title'])?></td>
                                    <td><?=CHtml::encode(round($list->printoutall[0]->FLBONUS,2))?></td>
                                </tr>
                            <?endif?>

                            <? if (($field['alias'] == 'linebonus') && (((bool)$field['used']) || (Yii::app()->user->checkAccess('OfficeStatsSettingsIndex')  &&  ((bool)$field['used'])))) : ?>
                                <tr>
                                    <td><?=CHtml::encode($field['title'])?></td>
                                    <td><?=CHtml::encode(round($list->printoutall[0]->LINEBONUS,2))?></td>
                                </tr>
                            <?endif?>

                            <? if (($field['alias'] == 'line_bonus2') && (((bool)$field['used']) || (Yii::app()->user->checkAccess('OfficeStatsSettingsIndex')  &&  ((bool)$field['used'])))) : ?>
                                <tr>
                                    <td><?=CHtml::encode($field['title'])?></td>
                                    <td><?=CHtml::encode(round($list->printoutall[0]->LINE_BONUS2,2))?></td>
                                </tr>
                            <?endif?>

                            <? if (($field['alias'] == 'line_bonus3') && (((bool)$field['used']) || (Yii::app()->user->checkAccess('OfficeStatsSettingsIndex')  &&  ((bool)$field['used'])))) : ?>
                                <tr>
                                    <td><?=CHtml::encode($field['title'])?></td>
                                    <td><?=CHtml::encode(round($list->printoutall[0]->LINE_BONUS2,3))?></td>
                                </tr>
                            <?endif?>

                            <? if (($field['alias'] == 'line_bonus4') && (((bool)$field['used']) || (Yii::app()->user->checkAccess('OfficeStatsSettingsIndex')  &&  ((bool)$field['used'])))) : ?>
                                <tr>
                                    <td><?=CHtml::encode($field['title'])?></td>
                                    <td><?=CHtml::encode(round($list->printoutall[0]->LINE_BONUS4,3))?></td>
                                </tr>
                            <?endif?>

                            <? if (($field['alias'] == 'line_bonus5') && (((bool)$field['used']) || (Yii::app()->user->checkAccess('OfficeStatsSettingsIndex')  &&  ((bool)$field['used'])))) : ?>
                                <tr>
                                    <td><?=CHtml::encode($field['title'])?></td>
                                    <td><?=CHtml::encode(round($list->printoutall[0]->LINE_BONUS5,3))?></td>
                                </tr>
                            <?endif?>

                            <? if (($field['alias'] == 'totalbonus') && (((bool)$field['used']) || (Yii::app()->user->checkAccess('OfficeStatsSettingsIndex')  &&  ((bool)$field['used'])))) : ?>
                                <tr>
                                    <td><?=CHtml::encode($field['title'])?></td>
                                    <td><?=CHtml::encode(round($list->printoutall[0]->TOTALBONUS,2))?></td>
                                </tr>
                            <?endif?>
							<? if (($field['alias'] == 'totalbonus') && (((bool)$field['used']) || (Yii::app()->user->checkAccess('OfficeStatsSettingsIndex')  &&  ((bool)$field['used'])))) : ?>
                                <tr>
                                    <td><?=CHtml::encode($field['title'])?></td>
                                    <td><?=CHtml::encode(round($list->printoutall[0]->TOTALBONUS,2))?></td>
                                </tr>
                            <?endif?>
							<?if (!empty($field['table'])):?>									
								<?if($field['table'] == 'SYNC_DISTR'):?>	
									 <? if ((((bool)$field['used']) || (Yii::app()->user->checkAccess('OfficeStatsSettingsIndex')  &&  ((bool)$field['used'])))) : ?>
										<?if($field['format'] == 'date'):?>
											<tr>
												<td><?=CHtml::encode($field['title'])?></td>
												<td><?=MSmarty::date_format($list[$field['alias']], 'd.m.Y')?></td>
											</tr>										
										<? else:?>
											<tr>
												<td><?=CHtml::encode($field['title'])?></td>
												<td><?=CHtml::encode($list[$field['alias']])?></td>
											</tr>															
										<?endif?>												
									<?endif?>
								<?elseif($field['table'] == 'printout'):?>	
									<? if ((((bool)$field['used']) || (Yii::app()->user->checkAccess('OfficeStatsSettingsIndex')  &&  ((bool)$field['used'])))) : ?>
										<?if($field['format'] == 'date'):?>
											<td><?=CHtml::encode($field['title'])?></td>
											<td>
												<?=MSmarty::date_format($list->printout[$field['alias']], 'd.m.Y')?>
											</td>	
										<? else:?>
											<td><?=CHtml::encode($field['title'])?></td>
											<td>
												<?=CHtml::encode($list->printout[$field['alias']])?>
											</td>														
										<?endif?>												
									<?endif?>								
								<?endif?>
							<? endif; ?>
                        <? endforeach?>

                    </table>
				</div>
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