<?php
$this->breadcrumbs['Финансы'] = $this->createUrl('default/index');
$this->breadcrumbs['Типы новых кошельков'] = $this->createUrl('index');
$this->breadcrumbs['Создание типа'] = $this->createUrl('create');
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>