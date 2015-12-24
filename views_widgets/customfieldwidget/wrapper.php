<?php
/**
 * @var CustomFieldsValues $model
 * @var object $namePrefix префикс имени напр. [1], [0] etc
 * @var string $field основное поле для ввода значение
 */
?>

<li class="custom-field" data-field-id="<?=$model->field__id?>">
    <?php if ($model->field->field_format == CustomFields::BOOLEAN): ?>
        <div class="control">
            <label style="font-weight: normal;" for="field_checkbox_<?=$namePrefix?>">
                <?=$model->getAttributeLabel('value')?>
                <?=$field?>
            </label>
            <?=CHtml::error($model, $namePrefix.'value')?>
            <?=CHtml::error($model, $namePrefix.'field__id')?>
        </div>
    <?php else: ?>
        <?=CHtml::activeLabelEx($model, $namePrefix.'value')?>
        <div class="control">
            <?=$field?>
            <?=CHtml::error($model, $namePrefix.'value')?>
            <?=CHtml::error($model, $namePrefix.'field__id')?>
        </div>
    <?php endif;?>

    <?=CHtml::activeHiddenField($model, $namePrefix.'field__id', array('class' => 'field-id'))?>
</li>
<?php if ($model->field->field_format == CustomFields::DATE): ?>
<script type="text/javascript">
    $(function(){
        $.datepicker.setDefaults($.extend($.datepicker.regional["ru"]));
        $(".date-input").datepicker({
            showOn: 			'button',
            buttonImage:		$('#asseturl').val() + '/icons/calendar.png',
            buttonImageOnly:	true,
            changeMonth:		true,
            changeYear:		    true,
            yearRange:			'-90:+10'
        });
    })
</script>
<?php endif; ?>