<style>
    .max { width: 100%; }
</style>


<div style="padding-left: 50px;">
            
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'matrix-form',
        'enableAjaxValidation'=>false,
    ));
?>

    <?=$form->errorSummary(array($modelParam, $modelParamLang)); ?>

    <table>
        <tr>
            <td><?=$form->labelEx($modelParam, 'alias')?></td>
            <td></td>
            <td width="50%"><?=$form->textField($modelParam, 'alias', array('class' => 'max'))?></td>
            <td width="10"></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td><?=$form->error($modelParam, 'alias')?></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><?=$form->labelEx($modelParamLang, 'name')?></td>
            <td></td>
            <td><?=$form->textField($modelParamLang, 'name', array('class' => 'max'))?></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td><?=$form->error($modelParamLang, 'name')?></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><?=$form->labelEx($modelParamLang, 'label')?></td>
            <td></td>
            <td><?=$form->textField($modelParamLang, 'label', array('class' => 'max'))?></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td><?=$form->error($modelParamLang, 'label')?></td>
            <td></td>
            <td></td>
        </tr>        
        <tr>
            <td><?=$form->labelEx($modelParamLang, 'description')?></td>
            <td></td>
            <td><?=$form->textArea($modelParamLang, 'description', array('class' => 'max'))?></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td><?=$form->error($modelParamLang, 'description')?></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>
                <?=CHtml::submitButton($modelParam->isNewRecord ? 'Создать' : 'Сохранить'); ?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?=$this->createUrl('params/index')?>" >Отмена</a>
            </td>
            <td></td>
            <td><?=$form->error($modelParam, 'target')?></td>
            <td></td>
        </tr>
    </table>
    <?php $this->endWidget(); ?>
</div>