<style>
    .max { width: 100%; }
</style>


<div style="padding-left: 50px;">
            
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'matrix-form',
        'enableAjaxValidation'=>false,
    ));
?>

    <?=$form->errorSummary(array($modelActions, $modelActionsLang)); ?>

    <table>
        <tr>
            <td><?=$form->labelEx($modelActions, 'alias')?></td>
            <td></td>
            <td width="50%"><?=$form->textField($modelActions, 'alias', array('class' => 'max'))?></td>
            <td width="10"></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td><?=$form->error($modelActions, 'alias')?></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><?=$form->labelEx($modelActionsLang, 'name')?></td>
            <td></td>
            <td><?=$form->textField($modelActionsLang, 'name', array('class' => 'max'))?></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td><?=$form->error($modelActionsLang, 'name')?></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><?=$form->labelEx($modelActionsLang, 'description')?></td>
            <td></td>
            <td><?=$form->textArea($modelActionsLang, 'description', array('class' => 'max'))?></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td><?=$form->error($modelActionsLang, 'description')?></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Параметры для действия</td>
            <td></td>
            <td><?=CHtml::checkBoxList('MatrixActionsParams', $selected_paramslist, $paramslist, array('class' => 'forminput', 'style' => 'width: 30px;')); ?></td>
            <td></td>
            <td></td>
        </tr>        
        <tr>
            <td></td>
            <td></td>
            <td>
                <?=CHtml::submitButton($modelActions->isNewRecord ? 'Создать' : 'Сохранить'); ?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?=$this->createUrl('actions/index')?>" >Отмена</a>
            </td>
            <td></td>
            <td><?=$form->error($modelActions, 'target')?></td>
            <td></td>
        </tr>
    </table>
    <?php $this->endWidget(); ?>
</div>