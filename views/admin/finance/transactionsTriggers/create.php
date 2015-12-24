<?php
$this->breadcrumbs['Финансы'] = $this->createUrl('default/index');
$this->breadcrumbs['Триггеры'] = $this->createUrl('transactionstriggers/index');
$this->breadcrumbs['Создание нового триггера'] = $this->createUrl('transactionstriggers/create');
?>
<?php echo $this->renderPartial('_form', array('modelTrigger' => $modelTrigger)); ?>