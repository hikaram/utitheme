<?php
$this->breadcrumbs['Финансы'] = $this->createUrl('default/index');
$this->breadcrumbs['Операции'] = $this->createUrl('..') . '/wallets';
$this->breadcrumbs['Спецификации операции'] = $this->createUrl('index');
$this->breadcrumbs['Просмотр спецификации №' . $model->id] = $this->createUrl('view', array('id' => $model->id));

$this->renderPartial('_view', array('data' => $model));
?>

