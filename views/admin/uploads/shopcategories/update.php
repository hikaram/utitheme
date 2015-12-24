<?php
/* @var $this UploadsCategoriesController */
/* @var $model UploadsCategories */

$this->breadcrumbs=array(
	'Категории'=>array('index'),
	$model->category=>array('view','id'=>$model->id),
	'Редактировать'=>array('update','id'=>$model->id),
);

$this->menu=array(
	array('label'=>'List UploadsCategories', 'url'=>array('index')),
	array('label'=>'Create UploadsCategories', 'url'=>array('create')),
	array('label'=>'View UploadsCategories', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage UploadsCategories', 'url'=>array('admin')),
);
?>

<h1>Редактирование категории <?php echo $model->category; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>