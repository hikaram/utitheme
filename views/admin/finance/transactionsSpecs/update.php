<?php
$this->breadcrumbs['Финансы'] = $this->createUrl('default/index');
$this->breadcrumbs['Операции'] = $this->createUrl('..') . '/wallets';
$this->breadcrumbs['Спецификации операции'] = $this->createUrl('index');
$this->breadcrumbs['Редактирование спецификации №' . $model->id] = $this->createUrl('update', array('id' => $model->id));
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>