<?php
/* @var $this UploadsCategoriesController */
/* @var $model UploadsCategories */

$this->breadcrumbs=array(
	'Категории'=>array('index'),
	'Создать'=>array('create'),
);

$this->menu=array(
	array('label'=>'List UploadsCategories', 'url'=>array('index')),
	array('label'=>'Manage UploadsCategories', 'url'=>array('admin')),
);
?>

<h1>Создать категорию</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>