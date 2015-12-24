<?php
$this->breadcrumbs['Финансы'] = $this->createUrl('default/index');
$this->breadcrumbs['Кошельки'] = $this->createUrl('..') . '/wallets';
$this->breadcrumbs['Назначения'] = $this->createUrl('index');
$this->breadcrumbs['Назначение кошелька №' . $model->id] = $this->createUrl('create');

$this->renderPartial('_view', array('data' => $model));
?>

	
