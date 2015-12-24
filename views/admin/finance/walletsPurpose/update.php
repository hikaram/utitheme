<?php
$this->breadcrumbs['Финансы'] = $this->createUrl('default/index');
$this->breadcrumbs['Кошельки'] = $this->createUrl('..') . '/wallets';
$this->breadcrumbs['Назначения'] = $this->createUrl('index');
$this->breadcrumbs['Редактирование назначения №' . $model->id] = $this->createUrl('index');
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>