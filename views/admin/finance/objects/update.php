<?php
$this->breadcrumbs['Финансы'] = $this->createUrl('default/index');
$this->breadcrumbs['Объекты'] = $this->createUrl('index');
$this->breadcrumbs['Редактирование объекта №' . $model->id] = $this->createUrl('update', array('id' => $model->id));
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>