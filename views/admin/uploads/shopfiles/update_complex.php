<?php
/* @var $this UploadsAdminController */
/* @var $model UploadsAdmin */

$this->breadcrumbs=array(
	'Загрузка файлов в магазин'=>array('index'),
	'Добавить',
);

?>

<h1>Выберите файл и заполните форму</h1>

<?php echo $this->renderPartial('_formmany', array('model'=>$model, 'modelsCategories' =>$modelsCategories, 'preview' => $preview, 'cats' => $cats, 'model_lang' => $model_lang, 'model_childs' => $model_childs)); ?>