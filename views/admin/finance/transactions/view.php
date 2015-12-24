<?php
/* @var $this FinanceTransactionsController */
/* @var $model FinanceTransactions */

$this->breadcrumbs=array(
	'Finance Transactions'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List FinanceTransactions', 'url'=>array('index')),
	array('label'=>'Create FinanceTransactions', 'url'=>array('create')),
	array('label'=>'Update FinanceTransactions', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete FinanceTransactions', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage FinanceTransactions', 'url'=>array('admin')),
);
?>

<h1>View FinanceTransactions #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'parent_id',
		'debit_wallet_id',
		'debit_wallet_type_alias',
		'debit_object_alias',
		'debit_object_id',
		'credit_wallet_id',
		'credit_wallet_type_alias',
		'credit_object_alias',
		'credit_object_id',
		'currency_alias',
		'date_open',
		'date_closed',
		'date_decline',
		'amount',
		'group_alias',
		'spec_alias',
		'status_alias',
		'is_confirm_system',
		'is_confirm_debit_object',
		'is_confirm_credit_object',
		'is_confirm_admin',
		'debit_wallet_credit_before',
		'debit_wallet_credit_after',
		'debit_wallet_debit_before',
		'debit_wallet_debit_after',
		'debit_wallet_balance_before',
		'debit_wallet_balance_after',
		'credit_wallet_credit_before',
		'credit_wallet_credit_after',
		'credit_wallet_debit_before',
		'credit_wallet_debit_after',
		'credit_wallet_balance_before',
		'credit_wallet_balance_after',
		'guid',
		'created_at',
		'created_by',
		'created_ip',
		'modified_at',
		'modified_by',
		'modified_ip',
	),
)); ?>
