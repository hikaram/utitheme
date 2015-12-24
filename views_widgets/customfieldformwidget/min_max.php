<div class="form-group format-field">
    <label class="col-md-3 control-label"><?=Yii::t('app', 'Минимальная-максимальная длина')?></label>
    <div class="col-md-9">
        <?=CHtml::activeTextField($model, 'min_length', array('class' => 'narrow form-control input-inline'))?>
        -
        <?=CHtml::activeTextField($model, 'max_length', array('class' => 'narrow form-control input-inline'))?>
        <br />
        <span class="help-block">(<?=Yii::t('app', '0 означает отсутствие запретов')?>)</span>
        <span class="help-block text-danger"><?=CHtml::error($model, 'min_length').CHtml::error($model, 'max_length')?></span>
    </div>
</div>

<? /*
<tr class="format-field">
    <td class="text-right"><?=Yii::t('app', 'Минимальная-максимальная длина')?></td>
    <td>
        <?=CHtml::activeTextField($model, 'min_length', array('class' => 'narrow'))?>-<?=CHtml::activeTextField($model, 'max_length', array('class' => 'narrow'))?>
        <span class="help-block">(<?=Yii::t('app', '0 означает отсутствие запретов')?>)</span>
    </td>
    <td>
        <?=CHtml::error($model, 'min_length').CHtml::error($model, 'max_length')?>
    </td>
</tr>
*/ ?>