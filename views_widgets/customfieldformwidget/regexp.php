<div class="form-group format-field">
    <?=CHtml::activelabelEx($model, 'regexp', ['class' => 'col-md-3 control-label'])?>
    <div class="col-md-9">
        <?=CHtml::activeTextField($model, 'regexp', array('class' => 'form-control input-inline input-large'))?>
        <span class="help-block text-danger"><?=CHtml::error($model, 'regexp')?></span>
    </div>
</div>

<? /*
<tr class="format-field">
    <td class="text-right"><?=CHtml::activeLabelEx($model, 'regexp')?></td>
    <td><?=CHtml::activeTextField($model, 'regexp', array('class' => 'wide'))?></td>
    <td><?=CHtml::error($model, 'regexp')?></td>
</tr>
*/ ?>