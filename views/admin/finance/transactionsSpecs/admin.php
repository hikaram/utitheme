<?php
/* @var $this TransactionsSpecsController */
/* @var $model FinanceTransactionsSpecs */

$this->breadcrumbs=array(
	'Finance Transactions Specs'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List FinanceTransactionsSpecs', 'url'=>array('index')),
	array('label'=>'Create FinanceTransactionsSpecs', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#finance-transactions-specs-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Finance Transactions Specs</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'finance-transactions-specs-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'alias',
		'sender_object_alias',
		'sender_purpose_alias',
		'sender_wallet_party',
		'recipient_object_alias',
		/*
		'recipient_purpose_alias',
		'recipient_wallet_party',
		'title',
		'description',
		'transactions_group_alias',
		'is_used',
		'is_wallet_update',
		'is_password_require',
		'is_confirm_from_admin',
		'is_confirm_from_sender',
		'is_confirm_from_recipient',
		'is_bill_for_payment',
		'created_at',
		'created_by',
		'created_ip',
		'modified_at',
		'modified_by',
		'modified_ip',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
