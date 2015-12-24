<style>
    .max { width: 100%; }
</style>

<div class="content">
    <div class="content-inner">

        <h1><span class="wrapper-3"><?=CHtml::encode($model->lang->name)?></span></h1>
       
        <table class="list" id="matrix">
            <tbody>
                <tr>
                    <td width="450">Псевдоним матрицы:</td>
                    <td width="500"><?=CHtml::encode($model->alias)?></td>
                </tr>
                <tr>
                    <td>Название матрицы:</td>
                    <td><?=CHtml::encode($model->lang->name)?></td>
                </tr>
                <tr>
                    <td>Описание матрицы:</td>
                    <td><?=CHtml::encode($model->lang->description)?></td>
                </tr>
                <tr>
                    <td>Статус:</td>
                    <td>
                        <? if ($model->is_active) : ?><span title="Включена" class="true">&nbsp;</span>
                        <? else : ?><span title="Отключена" class="false">&nbsp;</span>
                        <? endif; ?>                        
                    </td>
                </tr>
                <tr>
                    <td>Доступность пользователям после регистрации:</td>
                    <td>
                        <? if ($model->is_allowed_after_register) : ?><span title="Включена" class="true">&nbsp;</span>
                        <? else : ?><span title="Отключена" class="false">&nbsp;</span>
                        <? endif; ?>                         
                    </td>
                </tr>
                <tr>
                    <td>Статус глубины:</td>
                    <td>
                        <? if ($model->is_depth) : ?><span title="Включена" class="true">&nbsp;</span>
                        <? else : ?><span title="Отключена" class="false">&nbsp;</span>
                        <? endif; ?>                         
                    </td>
                </tr>
                <tr>
                    <td>Ширина матрицы:</td>
                    <td><?=$model->width_level?></td>
                </tr>
                <tr>
                    <td>Глубина матрицы:</td>
                    <td><?=$model->depth_level?></td>
                </tr>
                <tr>
                    <td>Возможность пользователям иметь несколько активных позиций:</td>
                    <td>
                        <? if ($model->is_allowed_multiple_active_for_user) : ?><span title="Включена" class="true">&nbsp;</span>
                        <? else : ?><span title="Отключена" class="false">&nbsp;</span>
                        <? endif; ?>                         
                    </td>
                </tr>
                <tr>
                    <td>Возможность нескольким пользователям находиться в одной ячейке:</td>
                    <td>
                        <? if ($model->is_allowed_multiple_owners_for_token) : ?><span title="Включена" class="true">&nbsp;</span>
                        <? else : ?><span title="Отключена" class="false">&nbsp;</span>
                        <? endif; ?>                         
                    </td>
                </tr>
                <tr>
                    <td>Деление после закрытия:</td>
                    <td>
                        <? if ($model->is_branches_after_close) : ?><span title="Включена" class="true">&nbsp;</span>
                        <? else : ?><span title="Отключена" class="false">&nbsp;</span>
                        <? endif; ?>                         
                    </td>
                </tr>
                <tr>
                    <td>Тип заполнения:</td>
                    <td><?=CHtml::encode($model->matrix_filltype->lang->name)?></td>
                </tr>
                <? if ($model->matrix_fillpriority != NULL) : ?>
                    <tr>
                        <td>Приоритет заполнения:</td>
                        <td><?=CHtml::encode($model->matrix_fillpriority->lang->name)?></td>
                    </tr>
                <? endif; ?>
            </tbody>
        </table>
        
        <br /><br />
        
        <article class="module width_full" style="margin-left: 0;">
            <header><h3>Действия, связанные с матрицей</h3></header>
            <?=CHtml::hiddenField('matrix_type', $model->id, array('id' => 'matrixtype__id'))?>
            <div class="module_content">
                
                <div id="table-matrix-actions"></div>
                
                <br /><br />
                
                
                <div id="action-add" style="display: none;">
                    <?php $form=$this->beginWidget('CActiveForm', array(
                        'id'=>'matrixtypeaction-form',
                        'enableAjaxValidation'=>false,
                    )); ?>
                    <?=$form->hiddenField($modelMatrixTypeAction, 'matrix_types__id')?>
                    <h3>Добавить новое действие</h3>
                    <table>
                        <tr>
                            <td><?=$form->labelEx($modelMatrixTypeAction, 'action')?></td>
                            <td></td>
                            <td width="70%"><?=$form->listBox($modelMatrixTypeAction, 'action', array(MatrixTypeActions::ACTION_AFTER_OPEN_MATRIX => 'При регистрации в матрице', MatrixTypeActions::ACTION_AFTER_CLOSE_MATRIX => 'При закрытии матрицы'), array('class' => 'max', 'size' => 0))?></td>
                            <td width="10"></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td><?=$form->error($modelMatrixTypeAction, 'action')?></td>
                            <td></td>
                            <td></td>
                        </tr>                        
                        <tr>
                            <td><?=$form->labelEx($modelMatrixTypeAction, 'matrix_actions__id')?></td>
                            <td></td>
                            <td><?=$form->listBox($modelMatrixTypeAction, 'matrix_actions__id', $actions, array('class' => 'max', 'size' => 0))?></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr id="before_new_tr">
                            <td></td>
                            <td></td>
                            <td><?=$form->error($modelMatrixTypeAction, 'matrix_actions__id')?></td>
                            <td></td>
                            <td></td>
                        </tr>
<? /* AlexXanDOR 22.05.2013 Привязал alias фин. операции отдельным параметром. Поля is_transaction и finance_transactions_specs__id более не актуальны                     
                        <tr>
                            <td><?=$form->labelEx($modelMatrixTypeAction, 'is_transaction')?></td>
                            <td></td>
                            <td><?=$form->checkBox($modelMatrixTypeAction,'is_transaction'); ?></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td><?=$form->error($modelMatrixTypeAction, 'is_transaction')?></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr id="spec_select" style="display: none;">
                            <td></td>
                            <td></td>
                            <td><?=$form->error($modelMatrixTypeAction, 'finance_transactions_specs__id')?></td>
                            <td></td>
                            <td></td>
                        </tr>                        
                        <tr id="spec_select_error" style="display: none;">
                            <td><?=$form->labelEx($modelMatrixTypeAction, 'finance_transactions_specs__id')?></td>
                            <td></td>
                            <td><?=$form->listBox($modelMatrixTypeAction, 'finance_transactions_specs__id', $financespecs, array('class' => 'max', 'size' => 0))?></td>
                            <td></td>
                            <td></td>
                        </tr>
 * 
 */ ?>
                        <tr>
                            <td colspan="5" style="height: 20px;"></td>                            
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>
                                <?=CHtml::button($modelMatrixTypeAction->isNewRecord ? 'Добавить' : 'Сохранить', array('onClick' => 'matrixtypeactionadd()')); ?>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript: void(0)" onClick="hideAction()">Отмена</a>
                            </td>
                            <td></td>
                            <td><?=$form->error($modelMatrixTypeAction, 'target')?></td>
                            <td></td>
                        </tr>                        

                    </table>
                    
                    <?php $this->endWidget(); ?>                    
                </div>
                
                <br />
                
                <a id="addAction" href="javascript: void(0)" onClick="addAction()">Добавить действие</a>
            </div>
        </article>        
        
        <br /><br />
        
        <form action="<?=$this->createUrl('index')?>">
            <input type="submit" value="Назад" class="btn200" />
        </form>
    </div>
</div><!-- .content-inner-->
