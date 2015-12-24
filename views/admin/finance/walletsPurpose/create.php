<?php
$this->breadcrumbs['Финансы'] = $this->createUrl('default/index');
$this->breadcrumbs['Назначения'] = $this->createUrl('index');
$this->breadcrumbs['Создание назначения'] = $this->createUrl('create');
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>