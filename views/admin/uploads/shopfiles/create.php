<?php
/* @var $this UploadsAdminController */
/* @var $model UploadsAdmin */

$this->breadcrumbs=array(
	'Загрузка файлов в магазин'=>array('index'),
	'Добавить',
);

?>

<h1>Выберите файл и заполните форму</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'preview' => $preview)); ?>