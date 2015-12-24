<style>
    .max { width: 100%; }
</style>


<div style="padding-left: 50px;">
            
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'matrix-form',
        'enableAjaxValidation'=>false,
    ));
?>

    <?=$form->errorSummary(array($modelTypes, $modelTypesLang)); ?>

    <table>
        <tr>
            <td><?=$form->labelEx($modelTypes, 'alias')?></td>
            <td></td>
            <td width="50%"><?=$form->textField($modelTypes, 'alias', array('class' => 'max'))?></td>
            <td width="10"></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td><?=$form->error($modelTypes, 'alias')?></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><?=$form->labelEx($modelTypesLang, 'name')?></td>
            <td></td>
            <td><?=$form->textField($modelTypesLang, 'name', array('class' => 'max'))?></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td><?=$form->error($modelTypesLang, 'name')?></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><?=$form->labelEx($modelTypesLang, 'description')?></td>
            <td></td>
            <td><?=$form->textArea($modelTypesLang, 'description', array('class' => 'max'))?></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td><?=$form->error($modelTypesLang, 'description')?></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>
                <?=CHtml::submitButton($modelTypes->isNewRecord ? 'Создать' : 'Сохранить'); ?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?=$this->createUrl('filltypes/index')?>" >Отмена</a>
            </td>
            <td></td>
            <td><?=$form->error($modelTypes, 'target')?></td>
            <td></td>
        </tr>
    </table>
    <?php $this->endWidget(); ?>
</div>