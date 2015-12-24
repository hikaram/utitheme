<?php
/* @var $model RegisterCode */
$pageTitle = 'Редактирование кода';
$this->breadcrumbs=array(
    Yii::t('app', 'Панель управления') => array('/admin'),
    Yii::t('app', 'Добавление кода') => array('index'),
    Yii::t('app', 'Код #') . $model->id => array('view','id'=>$model->id),
    Yii::t('app', 'Редактировать') => '',
);

$this->menu=array(
	array('label'=>'List RegisterCode', 'url'=>array('index')),
	array('label'=>'Create RegisterCode', 'url'=>array('create')),
	array('label'=>'View RegisterCode', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage RegisterCode', 'url'=>array('admin')),
);
?>

<div class="portlet box green">
	<div class="portlet-title">
		<div class="caption">
			<i class="glyphicon glyphicon-plus" style="margin-right: 10px;"></i>
			<?=Yii::t('app', 'Редактировать код #').$model->id;?>
		</div>
	</div>
	<div class="portlet-body form form-horizontal">
		<?=$this->renderPartial('_form', array('model'=>$model)); ?>
	</div>
</div>