<?php $this->layout = 'office'; ?>
<? if (!$empty) : ?>
    <link rel="stylesheet" href="<?=Yii::app()->assetManager->getPublishedUrl(Yii::getPathOfAlias('application.modules.office.modules.statssync.css'))?>/css/officestats.css" type="text/css" media="screen, projection" />
    <?=CHtml::hiddenField('asseturl', Yii::app()->assetManager->getPublishedUrl(Yii::getPathOfAlias('application.modules.office.modules.statssync.css')), array('id' => 'asseturl'))?>


    <div class="loader"></div>
    <div class="portlet box blue">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-gift"></i>Дни рождения в структуре
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
                <div class="portlet-body" style="padding-left: 30px;">
					<div class="filter-block" style="/*overflow: hidden;*/ display: block; width: 90%;">
						<?=CHtml::beginForm('', 'POST', array('id' => 'filterform'))?>
						<table class="table table-striped table-hover table-bordered dataTable no-footer" style="width: 100%">
							<tbody>
							<? foreach ($fields as $field) : ?>
							<?//vg($fields);die;?>
								<? if ((bool)$field['is_filter']) : ?>
										<tr>
											<td style="width: 30%;"><?=CHtml::encode($field['title'])?></td>
											<td style="/*padding-left: 17px; padding-right: 25px;*/">
											<? if ((($field['alias'] == 'birthday') || ($field['alias'] == 'activity_date_end') || ($field['alias'] == 'contract_date')) && (((bool)$field['used']) || (Yii::app()->user->checkAccess('OfficeStatsSettingsIndex')  &&  ((bool)$field['used'])))) : ?>
												<? if (($field['alias'] == 'birthday') && ($params->datefilter_type == OfficeStatsReportsParams::dateFilterTypeMonthSelect)) : ?>
													<?=CHtml::hiddenField('birthday_month', array_key_exists('birthday_month', $filter) ? $filter['birthday_month'] : '', array('class' => 'form-control', 'id' => 'birthday_month'))?>
													<?=CHtml::listBox($field['alias'], array_key_exists($field['alias'], $filter) ? $filter[$field['alias']] : (int)app_date('m'), $filterselects[$field['alias']], array('class' => 'form-control', 'readonly' => 'readonly', 'size' => 0, 'onChange' => 'setDateFormatCorrect()'))?>
													<?=CHtml::hiddenField($field['alias'] . '_from', array_key_exists($field['alias'] . '_from', $filter) ? $filter[$field['alias'] . '_from'] : '', array('id' => 'birthday_from_hidden'))?>
													<?=CHtml::hiddenField($field['alias'] . '_end', array_key_exists($field['alias'] . '_end', $filter) ? $filter[$field['alias'] . '_end'] : '', array('id' => 'birthday_end_hidden'))?>
												<? else : ?>
													<div class="row mb20" style="margin: 0;">
														<div class="col-6">
															<div  style="text-align: center;">	
																<?=Yii::t('app', 'от')?>
															</div>
															<div class="form-group right w190 ">
																<?=CHtml::textField($field['alias'] . '_from', array_key_exists($field['alias'] . '_from', $filter) ? $filter[$field['alias'] . '_from'] : '', array('id' => "datepicker",'style'=>'width: 99%', 'class' => 'form-control date datepicker form-input', 'readonly' => 'readonly',))?>
															</div>
														</div>
														<div class="col-6"> 
															<div  style="text-align: center;">
																<?=Yii::t('app', 'до')?>
															</div>
															<div class="form-group right w190 ml5">
																<?=CHtml::textField($field['alias'] . '_end', array_key_exists($field['alias'] . '_end', $filter) ? $filter[$field['alias'] . '_end'] : '', array('id' => "datepicker2", 'style'=>'width: 99%', 'class' => 'form-control date datepicker form-input', 'readonly' => 'readonly',))?>
															</div>
														</div>
													</div>                                            
												<? endif; ?>
											<? elseif ((($field['alias'] == 'sex') || ($field['alias'] == 'register_status') || ($field['alias'] == 'user_business_types__id')) && (((bool)$field['used']) || (Yii::app()->user->checkAccess('OfficeStatsSettingsIndex')  &&  ((bool)$field['used'])))) : ?>
												<?=CHtml::listBox($field['alias'], array_key_exists($field['alias'], $filter) ? $filter[$field['alias']] : (int)FALSE, $filterselects[$field['alias']], array('class' => 'form-control', 'size' => 0))?>
											<? else : ?>
												<?=CHtml::textField($field['alias'], array_key_exists($field['alias'], $filter) ? $filter[$field['alias']] : '', array('class' => 'form-control form-input'))?>
											<? endif; ?>
										</td>
									</tr>	
								<? endif; ?>
							<? endforeach;?>
							</tbody>
						</table>
						<div class="row">
							 <div class="col-6" >
								<?=CHtml::button(Yii::t('app', 'Фильтровать'), array('class' => 'btn green', 'onClick' => 'saveFilter("birthday")'))?>
							
								<?=CHtml::button(Yii::t('app', 'Сбросить фильтр'),  array('class' => 'btn green','onClick' => 'location.href="/office/statssync/default/birthday"'))?>
							</div>	
						</div>
						<?=CHtml::endForm()?>
					</div>
				</div>
			</div>

        <? endif;
        ?>

        <? if (empty($list)) : ?>
            <? if ((bool)$is_empty_filter) : ?>
                <?=Yii::t('app', 'В вашей первой линии нет ни одного пользователя')?>
            <? else : ?>
                <div style="margin-top: 15px;"><?=Yii::t('app', 'Не найдено ни одного пользователя, удовлетворяющего условиям фильтрации')?></div>
            <? endif; ?>
        <? else : ?>
            <h3 class="text-center bold mb50">Всего в структуре пользователей: <?=$count?></h3>
            <div style="overflow: auto;">
                <?php $cities = $this->beginWidget('CitiesWidget', array()); ?>
                <table class="table table-striped table-hover table-bordered dataTable no-footer"  style="width: 100%;">

                    <thead>
                    <? foreach ($fields as $field) : ?>
                        <? if (((bool)$field['used']) || (Yii::app()->user->checkAccess('OfficeStatsSettingsIndex')  &&  ((bool)$field['used']))) : ?>
                            <th><?=CHtml::encode($field['title'])?></th>
                        <? endif; ?>
                    <? endforeach; ?>
                    </thead>
                    <?php $i = ($page - 1) * $params->dataset_per_page; ?>
                    <tbody>

                    <? foreach ($list as $value) : ?>
                        <?php $i++; ?>
                        <tr>
                            <? foreach ($fields as $field) : ?>
                                <? if (($field['alias'] == 'numeric') && (((bool)$field['used']) || (Yii::app()->user->checkAccess('OfficeStatsSettingsIndex')  &&  ((bool)$field['used'])))) : ?>
                                    <td><?=$i?></td>
                                <? elseif (($field['alias'] == 'username') && (((bool)$field['used']) || (Yii::app()->user->checkAccess('OfficeStatsSettingsIndex')  &&  ((bool)$field['used'])))) : ?>

                                    <? if(!empty($value->userssync->user->username)) : ?>
                                        <td><?=CHtml::encode($value->userssync->user->username)?></td>
                                    <? else :?>
                                        <td><?=Yii::t('app','Пользователь не активирован')?></td>
                                    <? endif; ?>
                                <? elseif (($field['alias'] == 'name') && (((bool)$field['used']) || (Yii::app()->user->checkAccess('OfficeStatsSettingsIndex')  &&  ((bool)$field['used'])))) : ?>
                                    <td><?=CHtml::encode($value->FAM . ' ' . $value->NAME . ' ' . $value->OTCH)?></td>
                                <? elseif (($field['alias'] == 'created_at') && (((bool)$field['used']) || (Yii::app()->user->checkAccess('OfficeStatsSettingsIndex')  &&  ((bool)$field['used'])))) : ?>
                                    <td><?=MSmarty::date_format($value->DAT, 'd.m.Y')?></td>
									
								<? elseif (($field['alias'] == 'birthday') && (((bool)$field['used']) || (Yii::app()->user->checkAccess('OfficeStatsSettingsIndex')  &&  ((bool)$field['used'])))) : ?>
                                    <td><?=MSmarty::date_format($value->BIRTHDAY, 'd.m.Y')?></td>	
                                <? elseif (($field['alias'] == 'contacts') && (((bool)$field['used']) || (Yii::app()->user->checkAccess('OfficeStatsSettingsIndex')  &&  ((bool)$field['used'])))) : ?>
                                    <td>
                                        <?='Skype:&nbsp;'.CHtml::encode($value->skype)?> <br/>
                                        <?=Yii::t('app','Тел').":&nbsp;".CHtml::encode($value->TEL)?> <br/>
                                        <?=CHtml::encode($value->MAIL)?>
                                    </td>
                                <? elseif (($field['alias'] == 'num') && (((bool)$field['used']) || (Yii::app()->user->checkAccess('OfficeStatsSettingsIndex')  &&  ((bool)$field['used'])))) : ?>
                                    <td><?=CHtml::encode($value->NUM)?></td>
                                <? elseif (($field['alias'] == 'status') && (((bool)$field['used']) || (Yii::app()->user->checkAccess('OfficeStatsSettingsIndex')  &&  ((bool)$field['used'])))) : ?>
                                    <td><?=CHtml::encode($value->printout->rank->lang->title)?></td>
                                <? elseif (($field['alias'] == 'activity') && (((bool)$field['used']) || (Yii::app()->user->checkAccess('OfficeStatsSettingsIndex')  &&  ((bool)$field['used'])))) : ?>
                                    <td>
                                        <? if ($value->printout->ACT == 0) :?>
                                            <?=Yii::t('app','Активен')?>
                                        <? else :?>
                                            <?=Yii::t('app','Не активен')?>
                                        <?endif?>
                                    </td>
                                <? elseif (($field['alias'] == 'sendmessage') && (((bool)$field['used']) || (Yii::app()->user->checkAccess('OfficeStatsSettingsIndex')  &&  ((bool)$field['used'])))) : ?>
                                    <td>
                                        <? if(!empty($value->userssync->user->id)) : ?>
                                            <?=CHtml::link(Yii::t('app','Отправить сообщение'), array('/office/message/default/index/tab/2', 'guid' => sha1($value->userssync->user->id))) ?>
                                        <? else :?>
                                            <?=Yii::t('app','Пользователь не активирован')?>
                                        <? endif; ?>
                                    </td>
								<? elseif (!empty($field['table'])):?>									
									<?if($field['table'] == 'SYNC_DISTR'):?>	
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
									<?elseif($field['table'] == 'printout'):?>	
										
										<?//vg($field['alias']);die;?>
										<? if ((((bool)$field['used']) || (Yii::app()->user->checkAccess('OfficeStatsSettingsIndex')  &&  ((bool)$field['used'])))) : ?>
											<?if($field['format'] == 'date'):?>
												<td>
													<?=MSmarty::date_format($value->printout[$field['alias']], 'd.m.Y')?>
												</td>	
											<? else:?>
												<td>
													<?=CHtml::encode($value->printout[$field['alias']])?>
												</td>														
											<?endif?>												
										<?endif?>
									
									<?endif?>
								<? endif; ?>	
                                
                            <? endforeach; ?>
                        </tr>
                    <? endforeach; ?>
                    </tbody>
                </table>
                <?php $this->endWidget(); ?>
            </div>
            <div style="margin-bottom: 20px">
                <? if ($pages != NULL) : ?>
                    <? $this->widget('CLinkPager', array('pages' => $pages,    'header' => '', 'htmlOptions' => array(
                        'class' => 'pagination pagination-sm',
                    )))//, array('class' => 'pagination pagination-sm')?>
                <? endif; ?>
            </div>
        <? endif; ?>

        <div style="margin: 15px 0 15px 10px;">
            <?=CHtml::beginForm($this->createUrl('/office/statssync/settings/index/'))?>
            <?=CHtml::submitButton(Yii::t('app', 'Вернуться к списку отчетов'), array('class' => 'btn green'))?>
            <?=CHtml::endForm()?>
        </div>


        </div>
    </div>

<? else :?>
    Нет данных
<? endif?>
























