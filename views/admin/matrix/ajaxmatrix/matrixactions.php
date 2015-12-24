<table class="list" id="matrix-actions" style="width: 100%">
    <tbody>
        <tr class="top-table">
            <th class="photo" style="width: 30%">Название действия</th>
            <th class="photo">При условии:</th>
            <th class="photo">Действия</th>
        </tr>
        <? if(empty($matrixactions)) :?>
            <tr><td colspan="2">Дейтвия для типа матрицы не заданы</td></tr>
        <? else : ?>                         
            <? foreach ($matrixactions as $key => $action) : ?>
                <tr>
                    <td>
                        <?=CHtml::encode($action->matrix_action->lang->name)?>
                        <? if (!empty($action->matrix_action_param_value)) : ?>(
                            <? foreach ($action->matrix_action_param_value as $key2 => $param) : ?>
                                <?=CHtml::encode($param->matrix_param->lang->label)?> = <?=CHtml::encode($param->value)?>
                                <? if (array_key_exists($key2 + 1, $action->matrix_action_param_value)) : ?>
                                ;&nbsp;&nbsp;&nbsp;
                                <? endif; ?>
                            <? endforeach; ?>
                        )<? endif; ?>
                    </td>
                    <td style="padding-left: 30px; padding-right: 30px;">
                        <? if($action->action == MatrixTypeActions::ACTION_AFTER_OPEN_MATRIX) : ?>Пользователь зарегистрировался в матрице
                        <? elseif($action->action == MatrixTypeActions::ACTION_AFTER_CLOSE_MATRIX) : ?>Пользователь закрыл матрицу
                        <? endif; ?>
                        
                        <?if (($action->matrix_action_conditions != NULL) && (!empty($action->matrix_action_conditions))) : ?>
                        
                            <? foreach ($action->matrix_action_conditions as $key => $condition) : ?>
                                <br /><?=CHtml::encode($condition->matrix_condition->lang->name)?>
                                <? if (!empty($condition->matrix_action_condition_param_value)) : ?>(
                                    <? foreach ($condition->matrix_action_condition_param_value as $key2 => $param) : ?>
                                        <?=CHtml::encode($param->matrix_param->lang->label)?> = <?=CHtml::encode($param->value)?>
                                        <? if (array_key_exists($key2 + 1, $condition->matrix_action_condition_param_value)) : ?>
                                        ;&nbsp;&nbsp;&nbsp;
                                        <? endif; ?>
                                    <? endforeach; ?>
                                ) (<a href="javascript: void(0)" onClick="if (!confirm('Убрать условие для данного действия?')) return; deleteMatrixTypeActionCondition(<?=$condition->id?>);">Убрать условие</a>)<? endif; ?>                                
                            <? endforeach; ?>
                        
                        <? endif; ?>
                        <br />
                        <a href="javascript: void(0)" onClick="addCondition(<?=$action->id?>);">Добавить условие</a>
                    </td>
                    <td>
                        <a href="javascript: void(0)" onClick="if (!confirm('Удалить действие для матрицы?')) return; deleteMatrixTypeAction(<?=$action->id?>);">Удалить</a>
                    </td>
                </tr>
            <? endforeach; ?>
        <? endif; ?>
    </tbody>                    
</table>
<br />
<div id="condition-add" style="display: none;">
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'matrixtypeactioncondition-form',
        'enableAjaxValidation'=>false,
    )); ?>
    <?=$form->hiddenField($modelMatrixTypeActionConditions, 'matrix_type_actions__id')?>
    <h3>Добавить новое условие</h3>
    <table>
        <tr>
            <td><?=$form->labelEx($modelMatrixTypeActionConditions, 'matrix_conditions__id')?></td>
            <td></td>
            <td><?=$form->listBox($modelMatrixTypeActionConditions, 'matrix_conditions__id', $conditions, array('class' => 'max', 'size' => 0))?></td>
            <td></td>
            <td></td>
        </tr>
        <tr id="beforecondition_new_tr">
            <td></td>
            <td></td>
            <td><?=$form->error($modelMatrixTypeActionConditions, 'matrix_conditions__id')?></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="5" style="height: 20px;"></td>                            
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>
                <?=CHtml::button($modelMatrixTypeActionConditions->isNewRecord ? 'Добавить' : 'Сохранить', array('onClick' => 'matrixtypeconditionadd()')); ?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript: void(0)" onClick="hideCondition()">Отмена</a>
            </td>
            <td></td>
            <td><?=$form->error($modelMatrixTypeActionConditions, 'target')?></td>
            <td></td>
        </tr>                        

    </table>

    <?php $this->endWidget(); ?>                    
</div>