<? foreach ($actionparams as $key => $value) : ?>
    <tr class="new_tr" id="new_tr_<?=$key?>">
        <td><?=CHtml::encode($value->matrix_param->lang->label)?></td>
        <td></td>
        <td>
            <? if (in_array($value->matrix_param->alias, array('role'))) : ?>
                <?=CHtml::listBox('MatrixTypeActionParamValue[' . $value->matrix_param->id . '][]', array(), $roles, array('size' => 0))?>
            <? elseif (in_array($value->matrix_param->alias, array('matrix_type'))) : ?>
                <?=CHtml::listBox('MatrixTypeActionParamValue[' . $value->matrix_param->id . '][]', array(), $matrixtypes, array('size' => 0))?>
            <? elseif (in_array($value->matrix_param->alias, array('spec_alias_bonus_in', 'spec_alias_money_out'))) : ?>
                <?=CHtml::listBox('MatrixTypeActionParamValue[' . $value->matrix_param->id . '][]', array(), $specalias, array('size' => 0))?>
            <? else : ?>
                <?=CHtml::textField('MatrixTypeActionParamValue[' . $value->matrix_param->id . '][]')?>
            <? endif; ?>
        </td>
        <td></td>
        <td></td>
    </tr>
<? endforeach; ?>
