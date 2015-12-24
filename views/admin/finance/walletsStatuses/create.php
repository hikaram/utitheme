<?php
$this->breadcrumbs['Финансы'] = $this->createUrl('default/index');
$this->breadcrumbs['Статусы кошельков'] = $this->createUrl('index');
$this->breadcrumbs['Создание статуса'] = $this->createUrl('create');
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>