<?php
$this->breadcrumbs=array(
	'Панель управления' => array('index'),
	'Загруженные' => array('uploaded'),
    'Подготовка к установке' => array('prepare', 'name' => $package['info']['name'], 'version' => $package['info']['version'])
);
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'Packages-form',
	'enableAjaxValidation'=>false,
    'action' => $this->createUrl('update'),
));
echo $form->hiddenField($modelPackages, 'id');
?>

<?php echo $form->errorSummary($modelPackages); ?>

<table>
    <tr>
        <td><?=$form->labelEx($modelPackages, 'name')?></td>
        <td><?=$form->textField($modelPackages, 'name', array('name' => 'name', 'class' => 'max', 'readonly' => 'readonly'))?></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td colspan="2"><?=$form->error($modelPackages, 'name')?></td>
    </tr>

    <tr>
        <td><?=$form->labelEx($modelPackages, 'version')?></td>
        <td><?=$form->textField($modelPackages, 'version', array('version' => 'version', 'readonly' => 'readonly'))?></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td colspan="2"><?=$form->error($modelPackages, 'version')?></td>
    </tr>

    <tr>
        <td></td>
        <td colspan="2"><?=$form->error($modelPackages, 'is_active')?></td>
    </tr>

    <tr>
        <td></td>
        <td colspan="2"><?=CHtml::submitButton('Обновить')?></td>
    </tr>
</table>

<?php $this->endWidget(); ?>



