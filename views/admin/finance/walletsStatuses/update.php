<?php
/* @var $this FinanceWalletsStatusesController */
/* @var $model FinanceWalletsStatuses */

$this->breadcrumbs=array(
	'Finance Wallets Statuses'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List FinanceWalletsStatuses', 'url'=>array('index')),
	array('label'=>'Create FinanceWalletsStatuses', 'url'=>array('create')),
	array('label'=>'View FinanceWalletsStatuses', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage FinanceWalletsStatuses', 'url'=>array('admin')),
);
?>

<h1>Update FinanceWalletsStatuses <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>