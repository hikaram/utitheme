<?php
/* @var $this FinanceWalletsForNewUserController */
/* @var $model FinanceWalletsForNewUser */

$this->breadcrumbs=array(
	'Finance Wallets For New Users'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List FinanceWalletsForNewUser', 'url'=>array('index')),
	array('label'=>'Create FinanceWalletsForNewUser', 'url'=>array('create')),
	array('label'=>'View FinanceWalletsForNewUser', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage FinanceWalletsForNewUser', 'url'=>array('admin')),
);
?>

<h1>Update FinanceWalletsForNewUser <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>