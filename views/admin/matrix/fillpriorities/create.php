<style>
    .max { width: 100%; }
</style>


<div style="padding-left: 50px;">
            
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'matrix-form',
        'enableAjaxValidation'=>false,
    ));
?>

    <?=$form->errorSummary(array($modelPriorities, $modelPrioritiesLang)); ?>

    <table>
        <tr>
            <td><?=$form->labelEx($modelPriorities, 'alias')?></td>
            <td></td>
            <td width="50%"><?=$form->textField($modelPriorities, 'alias', array('class' => 'max'))?></td>
            <td width="10"></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td><?=$form->error($modelPriorities, 'alias')?></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><?=$form->labelEx($modelPriorities, 'matrix_filltypes__id')?></td>
            <td></td>
            <td width="50%"><?=$form->listBox($modelPriorities, 'matrix_filltypes__id', $filltypes, array('class' => 'max', 'size' => 0))?></td>
            <td width="10"></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td><?=$form->error($modelPriorities, 'matrix_filltypes__id')?></td>
            <td></td>
            <td></td>
        </tr>        
        <tr>
            <td><?=$form->labelEx($modelPrioritiesLang, 'name')?></td>
            <td></td>
            <td><?=$form->textField($modelPrioritiesLang, 'name', array('class' => 'max'))?></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td><?=$form->error($modelPrioritiesLang, 'name')?></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><?=$form->labelEx($modelPrioritiesLang, 'description')?></td>
            <td></td>
            <td><?=$form->textArea($modelPrioritiesLang, 'description', array('class' => 'max'))?></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td><?=$form->error($modelPrioritiesLang, 'description')?></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>
                <?=CHtml::submitButton($modelPriorities->isNewRecord ? 'Создать' : 'Сохранить'); ?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?=$this->createUrl('fillpriorities/index')?>" >Отмена</a>
            </td>
            <td></td>
            <td><?=$form->error($modelPriorities, 'target')?></td>
            <td></td>
        </tr>
    </table>
    <?php $this->endWidget(); ?>
</div>