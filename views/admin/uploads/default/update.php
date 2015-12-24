<?php
/* @var $this UploadsAdminController */
/* @var $model UploadsAdmin */

$this->breadcrumbs=array(
	'Категории'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Редактировать'=>array('update','id'=>$model->id),
);

$this->menu=array(
	array('label'=>'List UploadsAdmin', 'url'=>array('index')),
	array('label'=>'Create UploadsAdmin', 'url'=>array('create')),
	array('label'=>'View UploadsAdmin', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage UploadsAdmin', 'url'=>array('admin')),
);
?>

<h1>Редактировать загруженный файл <?php echo $model->name; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>