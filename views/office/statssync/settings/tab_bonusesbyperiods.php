<!--<h1>Отчет "<?/*=CHtml::encode($params->lang->title)*/?>"</h1>-->


<div class="report-wrapper">

    <?=CHtml::link(Yii::t('app', 'Перейти к отчету'), $this->createUrl('default/bonusesbyperiods'))?>

    <div class="portlet box green">
        <div class="portlet-title">
            <div class="caption">
                <!--<i class="fa fa-gift"></i>--><?=Yii::t('app', 'Отчет')?> "<?=CHtml::encode($params->lang->title)?>"
            </div>
        </div>
        <div class="portlet-body">
            <div id="bootstrap_alerts_demo">
                <div class="param-report">
                    <h1><?=Yii::t('app', 'Параметры отчета')?></h1>
                    <?=CHtml::beginForm($this->createUrl('settings/saveform/alias/' . SettingsControllerBase::ReportAliasBonusesbyperiods))?>
                    <div class="form-horizontal">
                        <? if (Yii::app()->user->username == Yii::app()->params['superAdminInfo']['username']) : ?>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="title"><?=CHtml::activeLabel($params, 'is_on')?></label>
                                <div class="col-md-7">
                                    <?=CHtml::activeCheckBox($params, 'is_on')?>
                                </div>
                            </div>
                        <? endif; ?>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="title"><?=CHtml::activeLabel($params, 'is_active')?></label>
                            <div class="col-md-7">
                                <?=CHtml::activeCheckBox($params, 'is_active')?>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-3 control-label" for="title"><?=CHtml::activeLabel($params, 'dataset_per_page')?></label>
                            <div class="col-md-7">
                                <?=CHtml::activeTextField($params, 'dataset_per_page', array('class' => "form-control"))?>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-3 control-label" for="title"><?=CHtml::activeLabel($params, 'is_filter')?></label>
                            <div class="col-md-7">
                                <?=CHtml::checkBox('is_filter_' . SettingsControllerBase::ReportAliasBonusesbyperiods, $params->is_filter, array('onClick' => 'changeFilter("' . SettingsControllerBase::ReportAliasBonusesbyperiods . '")'))?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="title"><?=CHtml::activeLabel($params->lang, 'title')?></label>
                            <div class="col-md-7">
                                <?=CHtml::activeTextField($params->lang, 'title', array('class' => "form-control"))?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="title"><?=CHtml::activeLabel($params->lang, 'description')?></label>
                            <div class="col-md-7">
                                <?=CHtml::activeTextArea($params->lang, 'description', array('rows' => 1, 'style' => 'min-height:75px;', 'class' => "form-control"))?>
                            </div>
                        </div>

                        <? if (Yii::app()->user->username == Yii::app()->params['superAdminInfo']['username']) : ?>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="title"><?=CHtml::activeLabel($params, 'is_max_layout_allowed')?></label>
                                <div class="col-md-7">
                                    <?=CHtml::activeCheckBox($params, 'is_max_layout_allowed')?>
                                </div>
                            </div>
                        <? endif; ?>

                        <? if (((bool)$params->is_max_layout_allowed) || (Yii::app()->user->username == Yii::app()->params['superAdminInfo']['username'])) : ?>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="title"><?=CHtml::activeLabel($params, 'is_max_layout')?></label>
                                <div class="col-md-7">
                                    <?=CHtml::activeCheckBox($params, 'is_max_layout')?>
                                </div>
                            </div>
                        <? endif; ?>


                        <? if (Yii::app()->user->username == Yii::app()->params['superAdminInfo']['username']) : ?>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="title"><?=CHtml::activeLabel($params, 'filter_header_color_background')?></label>
                                <div class="col-md-7">
                                    <?=CHtml::activeTextField($params, 'filter_header_color_background')?>
                                </div>
                            </div>
                        <? endif; ?>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="title"></label>
                            <div class="col-md-5">
                                <?=CHtml::submitButton(Yii::t('app', 'Сохранить'), array('class' => 'btn green btn-lg', 'name' => 'btn-' . SettingsControllerBase::ReportAliasBonusesbyperiods . '-save'))?>
                                <!--<td colspan="2"><?/*=CHtml::submitButton(Yii::t('app', 'Сохранить'), array('class' => 'btn100', 'name' => 'btn-' . SettingsControllerBase::ReportAliasBonusesbyperiods . '-save'))*/?></td>-->
                            </div>
                        </div>
                    </div>


                    <?=CHtml::endForm()?>
                </div>

            </div>

        </div>
    </div>


    <div class="report-table-<?=SettingsControllerBase::ReportAliasBonusesbyperiods?>">

        <?=$this->renderPartial('tablecolumns', array(
            'config' => $config,
            'alias' => SettingsControllerBase::ReportAliasBonusesbyperiods,
            'min_sort' => $min_sort,
            'max_sort' => $max_sort,
            'is_filter' => $params->is_filter))?>

    </div>

    <div class="report-manage">

        <div class="report-manage-static">

            <?=CHtml::button('Добавить поле', array('class' => 'btn green', 'onClick' => 'showManageBlock()'))?>

        </div>

        <div class="report-manage-dynamic">

            <?=CHtml::beginForm()?>

            <div class="listBox">

                <?=CHtml::listBox(SettingsControllerBase::ReportAliasBonusesbyperiods, 0,  $allColumns, array('size' => 0, 'class' => 'form-control input-small input-inline'))?>

                <?=CHtml::button('Добавить поле', array('class' => 'btn green', 'onClick' => 'addColumn("' . SettingsControllerBase::ReportAliasBonusesbyperiods . '")'))?>

            </div>

            <div class="listBoxDescription">

            </div>


            <?=CHtml::endForm()?>

            <?=CHtml::link(Yii::t('app', 'Отмена'), 'javascript:void(0)', array('onClick' => 'hideManageBlock()'))?>

        </div>

    </div>
</div>

