<?php
$this->breadcrumbs=array(
	'Панель управления' => array('index'),
	'Пакеты' => array('packages'),
    'Удаление пакета №' . $modelPackage->id => array('delete', 'id' => $modelPackage->id),
);
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'packages-form',
	'enableAjaxValidation'=>false,
)); ?>

<table>
    <tr>
        <td><?=CHtml::radioButton('type', true, array('value' => 'party'))?></td>
        <th>Удалить пакет без удаления данных</th>
    </tr>
    <tr>
        <td><?=CHtml::radioButton('type', false, array('value' => 'full'))?></td>
        <th>Удалить пакет включая данные</th>
    </tr>
    <tr>
        <td><?=CHtml::submitButton('Удалить', array('name' => 'btnDelete'))?></td>
        <th></th>
    </tr>
</table>

<?php $this->endWidget(); ?>