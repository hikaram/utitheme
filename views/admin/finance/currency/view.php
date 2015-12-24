<?php
$this->breadcrumbs['Финансы'] = $this->createUrl('default/index');
$this->breadcrumbs['Валюты'] = $this->createUrl('index');
$this->breadcrumbs['Просмотр валюты №' . $model->id] = $this->createUrl('view', array('id' => $model->id));
$this->renderPartial('_view', array('data' => $model));
?>

