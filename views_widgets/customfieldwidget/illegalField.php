<li class="custom-field" data-field-id="<?=$model->field__id?>">
    <?=CHtml::activeLabelEx($model, $namePrefix.'value')?>
    <div class="control">
        <?=$field?>

        <?=CHtml::error($model, $namePrefix.'value')?>
        <?=CHtml::error($model, $namePrefix.'field__id')?>
    </div>
    <?=CHtml::activeHiddenField($model, $namePrefix.'field__id', array('class' => 'field-id'))?>
</li>