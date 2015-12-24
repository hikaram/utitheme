<?php
$this->breadcrumbs['Финансы'] = $this->createUrl('default/index');
$this->breadcrumbs['Кошельки'] = $this->createUrl('..') . '/wallets';
$this->breadcrumbs['Типы новых кошельков'] = $this->createUrl('index');
$this->breadcrumbs['Просмотр типа №' . $model->id] = $this->createUrl('view', array('id' => $model->id));

$this->renderPartial('_view', array('data' => $model));
?>

