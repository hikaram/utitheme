<div class="form-group format-field">
    <?=CHtml::activelabelEx($model->possibleValues[0], '[0]value', ['class' => 'col-md-3 control-label'])?>
    <div class="col-md-9">
        <?=CHtml::activeHiddenField($model->possibleValues[0], '[0]value')?>
        <? if ($type == 'longText') : ?>
            <?=CHtml::activeTextArea($model->possibleValues[0], '[0]value', array('class' => 'form-control input-inline input-large'))?>
        <? elseif ($type == 'boolean') : ?>
            <?=CHtml::activeCheckBox($model->possibleValues[0], '[0]value')?>
        <? elseif ($type == 'date') : ?>
            <?=CHtml::activeTextField($model->possibleValues[0], '[0]value', array('class' => 'form-control input-inline input-large', 'id' => 'custom_field_date'))?>
            <script>
                $("#custom_field_date").datepicker({
                    showOn:            "button",
                    buttonImage:       "' . Yii::app()->assetManager->getPublishedUrl(Yii::getPathOfAlias('admin.modules.catalog.css')) . '/icons/calendar.png",
                    buttonImageOnly:   true,
                    changeMonth:       true,
                    changeYear:        true,
                    dateFormat:        "dd.mm.yy",
                    yearRange:         "-100:+100"
                });
            </script>
        <? else : ?>
            <?=CHtml::activeTextField($model->possibleValues[0], '[0]value', array('class' => 'form-control input-inline input-large'))?>
        <? endif; ?>
        <span class="help-block text-danger"><?=CHtml::error($model->possibleValues[0], '[0]value')?></span>
    </div>
</div>