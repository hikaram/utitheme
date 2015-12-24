<? foreach ($conditionparams as $key => $value) : ?>
    <tr class="newcondition_tr" id="newcondition_tr_<?=$key?>">
        <td><?=CHtml::encode($value->matrix_param->lang->label)?></td>
        <td></td>
        <td>
            <? if (in_array($value->matrix_param->alias, array('role'))) : ?>
                <?=CHtml::listBox('MatrixTypeActionConditionParamValue[' . $value->matrix_param->id . '][]', array(), $roles, array('size' => 0))?>
            <? elseif (in_array($value->matrix_param->alias, array('matrix_type'))) : ?>
                <?=CHtml::listBox('MatrixTypeActionConditionParamValue[' . $value->matrix_param->id . '][]', array(), $matrixtypes, array('size' => 0))?>
            <? elseif (in_array($value->matrix_param->alias, array('matrix_status'))) : ?>
                <?=CHtml::listBox('MatrixTypeActionConditionParamValue[' . $value->matrix_param->id . '][]', array(), $statuses, array('size' => 0))?>
            <? elseif (in_array($value->matrix_param->alias, array('spec_alias_bonus_in', 'spec_alias_money_out'))) : ?>
                <?=CHtml::listBox('MatrixTypeActionConditionParamValue[' . $value->matrix_param->id . '][]', array(), $specalias, array('size' => 0))?>				
            <? else : ?>
                <?=CHtml::textField('MatrixTypeActionConditionParamValue[' . $value->matrix_param->id . '][]')?>
            <? endif; ?>
        </td>
        <td></td>
        <td></td>
    </tr>
<? endforeach; ?>
