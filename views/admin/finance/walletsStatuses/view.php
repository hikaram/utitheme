<?php
$this->breadcrumbs['Финансы'] = $this->createUrl('default/index');
$this->breadcrumbs['Кошельки'] = $this->createUrl('..') . '/wallets';
$this->breadcrumbs['Статусы новых кошельков'] = $this->createUrl('index');
$this->breadcrumbs['Просмотр статуса №' . $model->id] = $this->createUrl('view', array('id' => $model->id));

$this->renderPartial('_view', array('data' => $model));
?>

