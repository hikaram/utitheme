<?php
$this->breadcrumbs[Yii::t('app', 'Управление почтой')] = $this->createUrl('index');
$this->breadcrumbs[Yii::t('app', 'Редактирование письма')] = $this->createUrl('update', array('id' => $model->id));
?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>