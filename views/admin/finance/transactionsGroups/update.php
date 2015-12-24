<?php
$this->breadcrumbs['Финансы'] = $this->createUrl('default/index');
$this->breadcrumbs['Операции'] = $this->createUrl('..') . '/wallets';
$this->breadcrumbs['Группы операции'] = $this->createUrl('index');
$this->breadcrumbs['Создание группы'] = $this->createUrl('create');
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>