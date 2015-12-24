<?php
$this->breadcrumbs[Yii::t('app', 'Управление SEO')] = $this->createUrl('index');
$this->breadcrumbs[Yii::t('app', 'Редактирование SEO')] = $this->createUrl('update', array('id' => $model->id));
?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>