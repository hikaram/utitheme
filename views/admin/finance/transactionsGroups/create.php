<?php
$this->breadcrumbs['Финансы'] = $this->createUrl('default/index');
$this->breadcrumbs['Группы операций'] = $this->createUrl('index');
$this->breadcrumbs['Создание группы операции'] = $this->createUrl('create');
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>