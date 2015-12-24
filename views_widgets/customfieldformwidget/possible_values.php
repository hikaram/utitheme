<div class="form-group format-field custom-field-form-possibles-value">
    <label class="col-md-3 control-label"><?=Yii::t('app', 'Возможные значения')?></label>
    <div class="col-md-9 custom-field-form-possibles-value-inner">

        <? foreach ($model->possibleValues as $i => $valueModel) : ?>

            <? if ($valueModel->prepareToDelete !== TRUE) : ?>

                <div style="margin-bottom: 10px;" class="<?=(!$valueModel->isNewRecord) ? 'custom-field-form-possible-value format-field-possible' : 'custom-field-form-possible-value format-field-possible new' ?>">
                    <?=CHtml::activeHiddenField($valueModel, '['.$i.']id').CHtml::activeTextField($valueModel, '['.$i.']value', array('placeholder' => Yii::t('app', 'Введите значение'), 'class' => 'form-control input-inline input-large'))?>
                    <?=CHtml::activeCheckBox($valueModel, '['.$i.']isDefault', array('class' => 'is-default-checkbox', 'title' => Yii::t('app', 'Выбрано по умолчанию')))?>
                    <? if (empty($valueModel->products)) : ?>
                        <?=CHtml::link(Yii::t('app', 'Удалить'), '#', array(
                            'data-field-id' => (!$model->isNewRecord) ? $model->getPrimaryKey() : NULL,
                            'data-value-id' => (!$valueModel->isNewRecord) ? $valueModel->getPrimaryKey() : NULL,
                            'class' => 'custom-field-form-remove-possible-value'
                        ))?>
                        <?=CHtml::error($valueModel, '['.$i.']value')?>
                    <? endif; ?>
                </div>

            <? endif; ?>

        <? endforeach; ?>

        
        <a href="#" class="custom-field-form-add-possible-value"><?=Yii::t('app', 'Добавить')?></a>
        


    </div>
</div>

<? /*
<tr class="format-field custom-field-form-possibles-value">
    <td class="text-right" style="vertical-align: top; padding-top: 10px;"><?=Yii::t('app', 'Возможные значения')?></td>
    <td>
        <table class="form" style="margin: 0;">
            <?php foreach ($model->possibleValues as $i => $valueModel): ?>
                <?php
                // Не показываем значения подготовленные для удаления
                if ($valueModel->prepareToDelete === TRUE)
                {
                    continue;
                }
                ?>
            
                <tr class="<?=(!$valueModel->isNewRecord) ? 'custom-field-form-possible-value' : 'custom-field-form-possible-value new' ?>">
                    <td>
                        <?=CHtml::activeHiddenField($valueModel, '['.$i.']id').CHtml::activeTextField($valueModel, '['.$i.']value', array('placeholder' => Yii::t('app', 'Введите значение')))?>
                        <?=CHtml::activeCheckBox($valueModel, '['.$i.']isDefault', array('class' => 'is-default-checkbox', 'title' => Yii::t('app', 'Выбрано по умолчанию')))?>
                        <? if (empty($valueModel->products)) : ?>
                        <?=CHtml::link(Yii::t('app', 'Удалить'), '#', array(
                            'data-field-id' => (!$model->isNewRecord) ? $model->getPrimaryKey() : NULL,
                            'data-value-id' => (!$valueModel->isNewRecord) ? $valueModel->getPrimaryKey() : NULL,
                            'class' => 'custom-field-form-remove-possible-value'
                        ))?>
                        <?=CHtml::error($valueModel, '['.$i.']value')?>
                        <? endif; ?>
                    </td>
                </tr>

            <?php endforeach; ?>
            <tr>
                <td><a href="#" class="custom-field-form-add-possible-value"><?=Yii::t('app', 'Добавить')?></a></td>
            </tr>
        </table>
    </td>
</tr>
*/ ?>