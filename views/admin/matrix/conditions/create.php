<style>
    .max { width: 100%; }
</style>


<div style="padding-left: 50px;">
            
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'matrix-form',
        'enableAjaxValidation'=>false,
    ));
?>

    <?=$form->errorSummary(array($modelCondition, $modelConditionLang)); ?>

    <table>
        <tr>
            <td><?=$form->labelEx($modelCondition, 'alias')?></td>
            <td></td>
            <td width="50%"><?=$form->textField($modelCondition, 'alias', array('class' => 'max'))?></td>
            <td width="10"></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td><?=$form->error($modelCondition, 'alias')?></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><?=$form->labelEx($modelConditionLang, 'name')?></td>
            <td></td>
            <td><?=$form->textField($modelConditionLang, 'name', array('class' => 'max'))?></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td><?=$form->error($modelConditionLang, 'name')?></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><?=$form->labelEx($modelConditionLang, 'description')?></td>
            <td></td>
            <td><?=$form->textArea($modelConditionLang, 'description', array('class' => 'max'))?></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td><?=$form->error($modelConditionLang, 'description')?></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Параметры для условия</td>
            <td></td>
            <td><?=CHtml::checkBoxList('MatrixConditionsParams', $selected_paramslist, $paramslist, array('class' => 'forminput', 'style' => 'width: 30px;')); ?></td>
            <td></td>
            <td></td>
        </tr>        
        <tr>
            <td></td>
            <td></td>
            <td>
                <?=CHtml::submitButton($modelCondition->isNewRecord ? 'Создать' : 'Сохранить'); ?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?=$this->createUrl('conditions/index')?>" >Отмена</a>
            </td>
            <td></td>
            <td><?=$form->error($modelCondition, 'target')?></td>
            <td></td>
        </tr>
    </table>
    <?php $this->endWidget(); ?>
</div>