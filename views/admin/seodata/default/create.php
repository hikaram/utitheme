<?php
$this->breadcrumbs[Yii::t('app', 'Список SEO тегов')] = $this->createUrl('index');
$this->breadcrumbs[Yii::t('app', 'Создание SEO данных')] = $this->createUrl('create');
?>

<?php echo $this->renderPartial('_form', array('model'=>$model , 'model_lang' => $model_lang)); ?>