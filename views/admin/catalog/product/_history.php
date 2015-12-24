<table class="table table-striped table-bordered table-hover" id="datatable_history">
    <thead>
        <tr role="row" class="heading">
            <th width="25%">
                <?=Yii::t('app', 'Дата покупки')?>
            </th>
            <th width="55%">
                <?=Yii::t('app', 'Номер заказа')?>
            </th>
            <th width="10%">
                <?=Yii::t('app', 'Статус заказа')?>
            </th>
            <th width="10%">
                <?=Yii::t('app', 'Действия')?>
            </th>
        </tr>
        <tr role="row" class="filter">
            <td>
                <div class="input-group date datetime-picker margin-bottom-5" style="width: 100%;">
                    <?=CHtml::textField('history_created_at_from', array_key_exists('history_created_at_from', $filter) ? $filter['history_created_at_from'] : (string)FALSE, array('class' => 'form-control form-filter input-sm storedatepicker', 'style' => 'width: 100%', 'readonly' => 'readonly', 'data-date-format' => 'dd.mm.yyyy', 'placeholder' => Yii::t('app', 'От')))?>
                </div>
                <div class="input-group date datetime-picker" style="width: 100%;">
                    <?=CHtml::textField('history_created_at_to', array_key_exists('history_created_at_to', $filter) ? $filter['history_created_at_to'] : (string)FALSE, array('class' => 'form-control form-filter input-sm storedatepicker', 'style' => 'width: 100%', 'readonly' => 'readonly', 'data-date-format' => 'dd.mm.yyyy', 'placeholder' => Yii::t('app', 'До')))?>
                </div>
            </td>
            <td>
                <?=CHtml::textField('history_num', array_key_exists('history_num', $filter) ? $filter['history_num'] : (string)FALSE, ['class' => 'form-control form-filter input-sm'])?>
            </td>
            <td>
                <?=CHtml::dropDownList('history_status', array_key_exists('history_status', $filter) ? $filter['history_status'] : (string)FALSE, Horders::gridStatusItems(TRUE), ['class' => 'form-control form-filter input-sm'])?>
            </td>
            <td>
                <div class="margin-bottom-5">
                    <a href="javascript: void(0)" class="btn btn-sm yellow filter-submit margin-bottom" onClick="saveFilterForHistory()"><i class="fa fa-search"></i> <?=Yii::t('app', 'Поиск')?></a>
                </div>
                <a href="javascript: void(0)" class="btn btn-sm red filter-cancel" onClick="clearFilterForHistory()"><i class="fa fa-times"></i> <?=Yii::t('app', 'Сбросить')?></a>
            </td>
        </tr>
    </thead>

    <tbody>
        <? if (empty($dataset)) : ?>
            <tr>
                <td colspan="4"><?=Yii::t('app', 'Не найдно ни одной записи')?></td>
            </tr>
        <? else : ?>
            <? foreach ($dataset as $value) : ?>
                <tr>
                    <td>
                        <?=MSmarty::date_format($value->created_at, 'd.m.Y')?> <?=MSmarty::date_format($value->created_at, '%H:%M')?>
                    </td>
                    <td><?=CHtml::encode($value->num)?> (<?=Yii::t('app', 'Количество товара в заказе')?>: <?=(int)$value->getProductCount($productId)?>)</td>
                    <td>
                        <? if ($value->status == Horders::STATUS_NEW) : ?>
                            <? $class = 'label-warning'; ?>
                        <? elseif ($value->status == Horders::STATUS_PROCESSING) : ?>
                            <? $class = 'label-info'; ?>
                        <? elseif ($value->status == Horders::STATUS_DELIVERING) : ?>
                            <? $class = 'label-info'; ?>
                        <? elseif ($value->status == Horders::STATUS_CLOSED) : ?>
                            <? $class = 'label-success'; ?>
                        <? else : ?>
                            <? $class = 'label-danger'; ?>
                        <? endif; ?>
                        <span class="label label-sm <?=$class?>"><?=CHtml::encode(Horders::gridStatusItem($value->status));?></span>                     
                    </td>
                    <td></td>
                </tr>
            <? endforeach; ?>
        <? endif; ?>

    </tbody>
</table>