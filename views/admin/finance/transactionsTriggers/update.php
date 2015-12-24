<?php
$this->breadcrumbs['Финансы'] = $this->createUrl('default/index');
$this->breadcrumbs['Триггеры'] = $this->createUrl('transactionstriggers/index');
$this->breadcrumbs['Редактирование триггера'] = $this->createUrl('transactionstriggers/update');
?>

<?php echo $this->renderPartial('_form', array('modelTrigger' => $modelTrigger)); ?>