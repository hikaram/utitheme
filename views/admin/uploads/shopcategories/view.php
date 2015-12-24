<?php
/* @var $this UploadsCategoriesController */
/* @var $model UploadsCategories */

$this->breadcrumbs=array(
	'Категории'=>array('index'),
	$model->category => $this->createUrl('view', array('id' => $model->id))
);

$this->menu=array(
	array('label'=>'List UploadsCategories', 'url'=>array('index')),
	array('label'=>'Create UploadsCategories', 'url'=>array('create')),
	array('label'=>'Update UploadsCategories', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete UploadsCategories', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage UploadsCategories', 'url'=>array('admin')),
);
?>

<h1>Просмотр категории <?php echo $model->category; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'category',
		
	),
)); ?>
