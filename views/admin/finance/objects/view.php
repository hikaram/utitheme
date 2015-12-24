<?php
$this->breadcrumbs['Финансы'] = $this->createUrl('default/index');
$this->breadcrumbs['Объекты'] = $this->createUrl('index');
$this->breadcrumbs['Просмотр объекта №' . $model->id] = $this->createUrl('view', array('id' => $model->id));

$this->renderPartial('_view', array('data' => $model));
?>
