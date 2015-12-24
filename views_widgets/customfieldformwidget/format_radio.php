<div class="form-group format-field">
    <label class="col-md-3 control-label"><?=Yii::t('app', 'В виде группы radiobutton-ов')?></label>
    <div class="col-md-9">
        <?=CHtml::activeCheckBox($model, 'field_format', array('uncheckValue' => NULL, 'value' => CustomFields::SELECT_RADIO))?>
    </div>
</div>

<? /*
<tr class="format-field">
    <td class="text-right"><?=Yii::t('app', 'В виде группы radiobutton-ов')?></td>
    <td><?=CHtml::activeCheckBox($model, 'field_format', array('uncheckValue' => NULL, 'value' => CustomFields::SELECT_RADIO))?></td>
</tr>
*/ ?>