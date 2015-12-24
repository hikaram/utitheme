<?php
$this->breadcrumbs['Финансы'] = $this->createUrl('default/index');
$this->breadcrumbs['Валюты'] = $this->createUrl('index');
$this->breadcrumbs['Создание новой валюты'] = $this->createUrl('create');

?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>