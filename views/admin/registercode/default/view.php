<?php
/* @var $this RegisterCodeController */
/* @var $model RegisterCode */

$this->breadcrumbs=array(
	Yii::t('app', 'Добавление кода')=>array('index'),
	Yii::t('app', 'Код #') . $model->id => array('view','id'=>$model->id),
);

$this->menu=array(
	array('label'=>'List RegisterCode', 'url'=>array('index')),
	array('label'=>'Create RegisterCode', 'url'=>array('create')),
	array('label'=>'Update RegisterCode', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete RegisterCode', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage RegisterCode', 'url'=>array('admin')),
);
?>

<div class="portlet box blue-steel">
	<div class="portlet-title">
		<h3 class="caption">
			<i class="glyphicon glyphicon-eye-open" style="margin-right: 10px;"></i> <?=Yii::t('app','Просмотр кода #') . $model->id;?>
		</h3>
	</div>
<?=$this->renderPartial('_view', array('data'=>$model)); ?>
</div>
<div class="form-actions">
    <?=CHtml::link(Yii::t('app', 'Редактировать'), '/admin/registercode/default/update/id/' . $model->id, array('class' => 'btn green')); ?>
    <?=CHtml::link(Yii::t('app', 'Вернуться назад'), $this->createUrl('index'), array('class' => 'btn grey'))?>
</div>
