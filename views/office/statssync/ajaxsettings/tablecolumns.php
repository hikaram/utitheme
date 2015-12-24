<? if (empty($config)) : ?>

    Нет полей для отображения в отчете

<? else : ?>

    <div class="loader"></div>
    <div class="portlet box blue">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-table"></i>Таблица отчета
            </div>
        </div>
        <div class="portlet-body">
            <div id="sample_editable_1_wrapper" class="dataTables_wrapper no-footer">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                    </div>
                </div>
                <div class="table-scrollable">


                    <table class="table table-striped table-hover table-bordered dataTable no-footer" id="sample_editable_1" role="grid" aria-describedby="sample_editable_1_info">
                        <thead>
                        <tr role="row">
                            <th class="sorting_asc" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label=" <?=Yii::t('app', '№ п/п')?>: activate to sort column ascending" style="width: 178px;">
                                <?=Yii::t('app', '№ п/п')?>
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" aria-label="<?=Yii::t('app', 'Название поля')?>: activate to sort column ascending" style="width: 224px;">
                                <?=Yii::t('app', 'Название поля')?>
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" aria-label="<?=Yii::t('app', 'Описание поля')?> : activate to sort column ascending" style="width: 125px;">
                                <?=Yii::t('app', 'Описание поля')?>

                            </th>
                            <? if ((bool)$is_filter) : ?>
                                <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" aria-label=" <?=Yii::t('app', 'Включить фильтрацию')?> : activate to sort column ascending" style="width: 153px;">
                                    <?=Yii::t('app', 'Включить фильтрацию')?>
                                </th>
                            <? endif;?>
                            <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" aria-label=" <?=Yii::t('app', 'Отображать пользователям')?> : activate to sort column ascending" style="width: 89px;">
                                <?=Yii::t('app', 'Отображать пользователям')?>
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" aria-label=" <?=Yii::t('app', 'Действия')?> : activate to sort column ascending" style="width: 125px;">
                                <?=Yii::t('app', 'Действия')?>
                            </th></tr>
                        </thead>
                        <tbody>

                        <? foreach ($config as $value) : ?>

                            <tr>
                                <td><?=$value->sort_no?></td>
                                <td style="height: 26px; width: 250px; text-align: left;">
                                    <div class="static-table-manage" id="static-table-manage-<?=$value->id?>">
                                        <?/*=CHtml::link('<span class="edit">&nbsp;</span>', 'javascript: void(0)', array('onClick' => 'editColumnTitle(' . $value->id . ')'))*/?>
                                        <?=CHtml::link('<i class="fa fa-edit"></i>', 'javascript: void(0)', array('onClick' => 'editColumnTitle(' . $value->id . ')'))?>
                                    </div>
                                    <div class="dinamic-table-manage" id="dinamic-table-manage-<?=$value->id?>">
                                        <?=CHtml::link('<span class="apply">&nbsp;</span>', 'javascript: void(0)', array('onClick' => 'saveColumnTitle(' . $value->id . ', "' . $alias . '")'))?>
                                        <?=CHtml::link('<span class="cancel">&nbsp;</span>', 'javascript: void(0)', array('onClick' => 'hideColumnTitle(' . $value->id . ')'))?>
                                    </div>
                                    <div class="column-title-static" id="column-title-static-<?=$value->id?>">
                                        <?=CHtml::encode($value->lang->title)?>
                                    </div>
                                    <div class="column-title-dinamic" id="column-title-dinamic-<?=$value->id?>">
                                        <?=CHtml::textField('column-title-' . $alias . '-' . $value->id, $value->lang->title, array('id' => 'column-title-' . $alias . '-' . $value->id, 'class' => 'input-dinamic-title-column'))?>
                                    </div>
                                </td>
                                <td><?=CHtml::encode($value->column->lang->description)?></td>
                                <? if ((bool)$is_filter) : ?>
                                    <td style="text-align: center;">
                                        <? if ((bool)$value->column->is_filter_allowed) : ?>
                                            <?=CHtml::checkBox('column-is_filter-' . $alias . '-' . $value->id, $value->is_filter, array('id' => 'column-is_filter-' . $alias . '-' . $value->id,  'onChange' => 'changeFilterForColumn(' . $value->id . ', "' . $alias . '")'))?>
                                        <? endif; ?>
                                    </td>
                                <? endif;?>
                                <td style="text-align: center;"><?=CHtml::checkBox('column-is_used-' . $alias . '-' . $value->id, $value->is_used, array('id' => 'column-is_used-' . $alias . '-' . $value->id,  'onChange' => 'changeUsed(' . $value->id . ', "' . $alias . '")'))?></td>

                                <td>
                                    <div class="static-table-manage" id="static-table-manage-<?=$value->id?>">
                                        <?=CHtml::link('<i class="fa fa-trash-o"></i>&nbsp;&nbsp;', 'javascript: void(0)', array('onClick' => 'deleteColumn(' . $value->id . ', "' . $alias . '")'))?>
                                        <? if ($value->sort_no > $min_sort) : ?>
                                            <?=CHtml::link('<i class="fa fa-sort-up"></i>&nbsp;', 'javascript: void(0)', array('onClick' => 'sortChange(' . $value->id . ', "' . $alias . '", ' . (int)TRUE . ')'))?>
                                        <? endif; ?>
                                        <? if ($value->sort_no < $max_sort) : ?>
                                            <?=CHtml::link('<i class="fa fa-sort-down"></i>', 'javascript: void(0)', array('onClick' => 'sortChange(' . $value->id . ', "' . $alias . '", ' . (int)FALSE . ')'))?>
                                        <? endif; ?>
                                        <?/* fa-sort-down  =CHtml::link('<span class="delete">&nbsp;</span>', 'javascript: void(0)', array('onClick' => 'deleteColumn(' . $value->id . ', "' . $alias . '")'))*/?>

                                    </div>
                                </td>
                            </tr>
                        <? endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


<? endif; ?>