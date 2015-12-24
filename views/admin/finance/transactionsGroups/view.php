<?php
$this->breadcrumbs['Финансы'] = $this->createUrl('default/index');
$this->breadcrumbs['Операции'] = $this->createUrl('..') . '/wallets';
$this->breadcrumbs['Группы операций'] = $this->createUrl('index');
$this->breadcrumbs['Просмотр группы №' . $model->id] = $this->createUrl('create');

$this->renderPartial('_view', array('data' => $model));
?>

