<?php
$this->breadcrumbs=array(
	'Панель управления' => array('index'),
    'Модули' => array('Modules/index'),
	'Загруженные' => array('uploaded'),
    'Подготовка к установке' => array('prepare', 'name' => $module['info']['name'], 'version' => $module['info']['version'])
);
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'modules-form',
	'enableAjaxValidation'=>false,
    'action' => $this->createUrl('update'),
)); 
echo $form->hiddenField($modelModules, 'id');
?>

<?php echo $form->errorSummary($modelModules); ?>

<table>
    <tr>
        <td><?=$form->labelEx($modelModules, 'name')?></td>
        <td><?=$form->textField($modelModules, 'name', array('name' => 'name', 'class' => 'max', 'readonly' => 'readonly'))?></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td colspan="2"><?=$form->error($modelModules, 'name')?></td>
    </tr>
    
    <tr>
        <td><?=$form->labelEx($modelModules, 'version')?></td>
        <td><?=$form->textField($modelModules, 'version', array('version' => 'version', 'readonly' => 'readonly'))?></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td colspan="2"><?=$form->error($modelModules, 'version')?></td>
    </tr>
    
    <tr>
        <td><?=$form->labelEx($modelModules, 'is_active')?></td>
        <td><?=$form->checkBox($modelModules, 'is_active')?></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td colspan="2"><?=$form->error($modelModules, 'is_active')?></td>
    </tr>
    
    <tr>
        <td></td>
        <td colspan="2"><?=$form->error($modelModules, 'path')?></td>
    </tr>
    
    <tr>
        <td></td>
        <td colspan="2"><?=CHtml::submitButton('Обновить')?></td>
    </tr>
</table>

<?php $this->endWidget(); ?>



