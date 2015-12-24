<?=CHtml::beginForm()?>
<?=CHtml::listBox('user_id', array(), $users, array('size' => 0));?><br /><br />
<?=CHtml::listBox('matrixtype_id', array(), $matrixtypes, array('size' => 0));?><br /><br />
<?=CHtml::submitButton('Добавить в матрицу', array('name' => "btn_new")); ?><br /><br />
<?=CHtml::endForm()?>
