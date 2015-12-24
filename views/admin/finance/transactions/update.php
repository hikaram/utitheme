<?php
/* @var $this FinanceTransactionsController */
/* @var $model FinanceTransactions */

$this->breadcrumbs=array(
	'Finance Transactions'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List FinanceTransactions', 'url'=>array('index')),
	array('label'=>'Create FinanceTransactions', 'url'=>array('create')),
	array('label'=>'View FinanceTransactions', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage FinanceTransactions', 'url'=>array('admin')),
);
?>

<h1>Update FinanceTransactions <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>