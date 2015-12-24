<?php
$this->breadcrumbs=array(
	'Панель управления' => array('index'),
	'Модули' => array('Modules/index'),
    'Удаление модуля №' . $modelModule->id => array('delete', 'id' => $modelModule->id),
);
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'modules-form',
	'enableAjaxValidation'=>false,
)); ?>

<table>
    <tr>
        <td><?=CHtml::radioButton('type', true, array('value' => 'party'))?></td>
        <th>Удалить модуль без удаления данных</th>
    </tr>
    <tr>
        <td><?=CHtml::radioButton('type', false, array('value' => 'full'))?></td>
        <th>Удалить модуль включая данные</th>
    </tr>
    <tr>
        <td><?=CHtml::submitButton('Удалить', array('name' => 'btnDelete'))?></td>
        <th></th>
    </tr>
</table>

<?php $this->endWidget(); ?>