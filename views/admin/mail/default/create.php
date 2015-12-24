<?php
$this->breadcrumbs[Yii::t('app', 'Управление почтой')] = $this->createUrl('index');
$this->breadcrumbs[Yii::t('app', 'Создание письма')] = $this->createUrl('create');
?>

<?php echo $this->renderPartial('_form', array('model' => $model, 'type' => $type)); ?>