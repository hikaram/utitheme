<?php
/* @var $this UploadsAdminController */
/* @var $model UploadsAdmin */

$this->breadcrumbs=array(
	'Загрузка файлов'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List UploadsAdmin', 'url'=>array('index')),
	array('label'=>'Create UploadsAdmin', 'url'=>array('create')),
	array('label'=>'Update UploadsAdmin', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete UploadsAdmin', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage UploadsAdmin', 'url'=>array('admin')),
);
?>

<h1>Детальная информация о файле <?php echo $model->name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'type',
		'date',
		'comments',
        'is_paid',
		
	),
)); ?>
