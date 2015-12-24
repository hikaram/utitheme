<?php
/* @var $this UploadsAdminController */
/* @var $model UploadsAdmin */

$this->breadcrumbs=array(
	'Загрузка файлов'=>array('index'),
	'Добавить',
);

$this->menu=array(
	array('label'=>'List UploadsAdmin', 'url'=>array('index')),
	array('label'=>'Manage UploadsAdmin', 'url'=>array('admin')),
);
?>

<h1>Выберите файл и заполните форму</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'preview' => $preview)); ?>