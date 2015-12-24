<style>
    .max { width: 100%; }
</style>


<div style="padding-left: 50px;">
            
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'matrix-form',
        'enableAjaxValidation'=>false,
    ));
?>

    <?=$form->errorSummary(array($modelMatrix, $modelMatrixLang)); ?>

    <table>
        <tr>
            <td><?=$form->labelEx($modelMatrix, 'alias')?></td>
            <td></td>
            <td width="25%"><?=$form->textField($modelMatrix, 'alias', array('class' => 'max'))?></td>
            <td width="10"></td>
            <td>Используется для администрирования. Пользователям не показывается</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td><?=$form->error($modelMatrix, 'alias')?></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><?=$form->labelEx($modelMatrixLang, 'name')?></td>
            <td></td>
            <td>
                <? if ((Yii::app()->user->username != Yii::app()->params['superAdminInfo']['username']) && (!$modelMatrix->isNewRecord)) : ?>
                    <?=CHtml::encode($modelMatrixLang->name)?>
                <? else : ?>
                    <?=$form->textField($modelMatrixLang, 'name', array('class' => 'max'))?>
                <? endif; ?>                
            </td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td><?=$form->error($modelMatrixLang, 'name')?></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><?=$form->labelEx($modelMatrixLang, 'description')?></td>
            <td></td>
            <td><?=$form->textArea($modelMatrixLang, 'description', array('class' => 'max'))?></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td><?=$form->error($modelMatrixLang, 'description')?></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><?=$form->labelEx($modelMatrix, 'is_active')?></td>
            <td></td>
            <td><?=$form->checkBox($modelMatrix,'is_active')?></td>
            <td></td>
            <td>Выключенная матрица является неактивной. Пользователи не смогут зайти в матрицу; если выключена матрица, в которой уже есть пользователи, все процессы в ней замораживаются. Рекомендуется включать матрицу после настройки и проверки всех основных параметров и действий</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td><?=$form->error($modelMatrix, 'is_active')?></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><?=$form->labelEx($modelMatrix, 'is_allowed_after_register')?></td>
            <td></td>
            <td><?=$form->checkBox($modelMatrix,'is_allowed_after_register'); ?></td>
            <td></td>
            <td>В недоступную матрицу пользователи не могут попасть самостоятельно</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td><?=$form->error($modelMatrix, 'is_allowed_after_register')?></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><?=$form->labelEx($modelMatrix, 'is_depth')?></td>
            <td></td>
            <td><?=$form->checkBox($modelMatrix,'is_depth'); ?></td>
            <td></td>
            <td>При выключенной глубине матрица не закрывается</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td><?=$form->error($modelMatrix, 'is_depth')?></td>
            <td></td>
            <td></td>
        </tr>        
        <tr>
            <td><?=$form->labelEx($modelMatrix, 'width_level')?></td>
            <td></td>
            <td><?=$form->textField($modelMatrix, 'width_level', array('class' => 'max'))?></td>
            <td></td>
            <td>Количество мест под одной ячейкой</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td><?=$form->error($modelMatrix, 'width_level')?></td>
            <td></td>
            <td></td>
        </tr>
        <tr id="depth_textfield" style="display: none;">
            <td><?=$form->labelEx($modelMatrix, 'depth_level')?></td>
            <td></td>
            <td><?=$form->textField($modelMatrix, 'depth_level', array('class' => 'max'))?></td>
            <td></td>
            <td>Уровень матрицы, необходимый для её закрытия (с учетом верхней ячейки). Неактуально для матриц с выключенной глубиной</td>
        </tr>
        <tr id="depth_textfield_error" style="display: none;">
            <td></td>
            <td></td>
            <td><?=$form->error($modelMatrix, 'depth_level')?></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><?=$form->labelEx($modelMatrix, 'finance_transactions__id_in')?></td>
            <td></td>
            <td><?=$form->listBox($modelMatrix, 'finance_transactions__id_in', $transaction_specs, array('class' => 'max', 'size' => 0))?></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td><?=$form->error($modelMatrix, 'finance_transactions__id_in')?></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><?=$form->labelEx($modelMatrix, 'finance_transactions__id_reinvest')?></td>
            <td></td>
            <td><?=$form->listBox($modelMatrix, 'finance_transactions__id_reinvest', $transaction_specs, array('class' => 'max', 'size' => 0))?></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td><?=$form->error($modelMatrix, 'finance_transactions__id_reinvest')?></td>
            <td></td>
            <td></td>
        </tr>        
        <tr>
            <td><?=$form->labelEx($modelMatrix, 'is_allowed_multiple_active_for_user')?></td>
            <td></td>
            <td><?=$form->checkBox($modelMatrix,'is_allowed_multiple_active_for_user'); ?></td>
            <td></td>
            <td>При включенной возможности пользователи смогут заходить в матрицу неограниченное количество раз</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td><?=$form->error($modelMatrix, 'is_allowed_multiple_active_for_user')?></td>
            <td></td>
            <td></td>
        </tr>
        <tr id="limited_checkbox" style="display: none;">
            <td><?=$form->labelEx($modelMatrix, 'is_limited_active_positions')?></td>
            <td></td>
            <td><?=$form->checkBox($modelMatrix,'is_limited_active_positions'); ?></td>
            <td></td>
            <td>При включенном ограничении пользователя смогут иметь только определённое количество активных ячеек в матрице</td>
        </tr>
        <tr id="limited_checkbox_error" style="display: none;">
            <td></td>
            <td></td>
            <td><?=$form->error($modelMatrix, 'is_limited_active_positions')?></td>
            <td></td>
            <td></td>
        </tr>
        <tr id="limited_textfield" style="display: none;">
            <td><?=$form->labelEx($modelMatrix, 'limited_active_positions_for_user')?></td>
            <td></td>
            <td><?=$form->textField($modelMatrix, 'limited_active_positions_for_user', array('class' => 'max'))?></td>
            <td></td>
            <td>Максимально допустимое количество активных ячеек для пользователя</td>
        </tr>
        <tr id="limited_textfield_error" style="display: none;">
            <td></td>
            <td></td>
            <td><?=$form->error($modelMatrix, 'limited_active_positions_for_user')?></td>
            <td></td>
            <td></td>
        </tr>        
        <tr>
            <td><?=$form->labelEx($modelMatrix, 'is_allowed_multiple_owners_for_token')?></td>
            <td></td>
            <td><?=$form->checkBox($modelMatrix,'is_allowed_multiple_owners_for_token'); ?></td>
            <td></td>
            <td>При включенной возможности в одной ячейке могут располагаться несколько пользователей</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td><?=$form->error($modelMatrix, 'is_allowed_multiple_owners_for_token')?></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><?=$form->labelEx($modelMatrix, 'is_branches_after_close')?></td>
            <td></td>
            <td><?=$form->checkBox($modelMatrix,'is_branches_after_close'); ?></td>
            <td></td>
            <td>При закрытии матрицы она будет делиться на две части по принципу чёт-нечет</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td><?=$form->error($modelMatrix, 'is_branches_after_close')?></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><?=$form->labelEx($modelMatrix, 'is_user_top_in_matrix')?></td>
            <td></td>
            <td><?=$form->checkBox($modelMatrix,'is_user_top_in_matrix'); ?></td>
            <td></td>
            <td>Свойство логики отображения; показывать текущего пользователя наверху матрицы. Рекомендуется выключать данный параметр для фиксированных и делящихся матриц</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td><?=$form->error($modelMatrix, 'is_user_top_in_matrix')?></td>
            <td></td>
            <td></td>
        </tr>		
        <tr>
            <td><?=$form->labelEx($modelMatrix, 'is_clickable_tokens')?></td>
            <td></td>
            <td><?=$form->checkBox($modelMatrix,'is_clickable_tokens'); ?></td>
            <td></td>
            <td>При установке кликабельности, заполненные ячейки мтариц будут являться ссылками</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td><?=$form->error($modelMatrix, 'is_clickable_tokens')?></td>
            <td></td>
            <td></td>
        </tr>
		        <tr>
            <td><?=$form->labelEx($modelMatrix, 'is_allowed_user_search')?></td>
            <td></td>
            <td><?=$form->checkBox($modelMatrix,'is_allowed_user_search'); ?></td>
            <td></td>
            <td>Разрешить выполнять поиск матриц по пользователям</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td><?=$form->error($modelMatrix, 'is_allowed_user_search')?></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><?=$form->labelEx($modelMatrix, 'is_allowed_matrix_search')?></td>
            <td></td>
            <td><?=$form->checkBox($modelMatrix,'is_allowed_matrix_search'); ?></td>
            <td></td>
            <td>Разрешить выполнять поиск матриц по номеру матрицы</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td><?=$form->error($modelMatrix, 'is_allowed_matrix_search')?></td>
            <td></td>
            <td></td>
        </tr>		
        <tr>
            <td><?=$form->labelEx($modelMatrix, 'matrix_filltypes__id')?></td>
            <td></td>
            <td><?=$form->listBox($modelMatrix, 'matrix_filltypes__id', $filltypes, array('class' => 'max', 'size' => 0))?></td>
            <td></td>
            <td id="filltype_description"></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td><?=$form->error($modelMatrix, 'matrix_filltypes__id')?></td>
            <td></td>
            <td></td>
        </tr>
        <tr id="priorities_select" style="display: none;">
            <td><?=$form->labelEx($modelMatrix, 'matrix_fillpriorities__id')?></td>
            <td></td>
            <td><?=$form->listBox($modelMatrix, 'matrix_fillpriorities__id', array(), array('class' => 'max', 'size' => 0))?></td>
            <td></td>
            <td id="fillpriority_description"></td>
        </tr>
        <tr id="priorities_select_error" style="display: none;">
            <td></td>
            <td></td>
            <td><?=$form->error($modelMatrix, 'matrix_fillpriorities__id')?></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><?=$form->labelEx($modelMatrix, 'template')?></td>
            <td></td>
            <td><?=$form->textField($modelMatrix,'template', array('class' => 'max')); ?></td>
            <td></td>
            <td>Шаблон для отображения матрицы</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td><?=$form->error($modelMatrix, 'template')?></td>
            <td></td>
            <td></td>
        </tr>		
        <tr>
            <td></td>
            <td></td>
            <td>
                <?=CHtml::submitButton($modelMatrix->isNewRecord ? 'Создать' : 'Сохранить'); ?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?=$this->createUrl('index')?>" >Отмена</a>
            </td>
            <td></td>
            <td><?=$form->error($modelMatrix, 'target')?></td>
            <td></td>
        </tr>
    </table>
    <?php $this->endWidget(); ?>
</div>