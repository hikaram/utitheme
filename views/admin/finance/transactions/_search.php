<?php
/* @var $this FinanceTransactionsController */
/* @var $model FinanceTransactions */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'parent_id'); ?>
		<?php echo $form->textField($model,'parent_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'debit_wallet_id'); ?>
		<?php echo $form->textField($model,'debit_wallet_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'debit_wallet_type_alias'); ?>
		<?php echo $form->textField($model,'debit_wallet_type_alias',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'debit_object_alias'); ?>
		<?php echo $form->textField($model,'debit_object_alias',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'debit_object_id'); ?>
		<?php echo $form->textField($model,'debit_object_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'credit_wallet_id'); ?>
		<?php echo $form->textField($model,'credit_wallet_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'credit_wallet_type_alias'); ?>
		<?php echo $form->textField($model,'credit_wallet_type_alias',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'credit_object_alias'); ?>
		<?php echo $form->textField($model,'credit_object_alias',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'credit_object_id'); ?>
		<?php echo $form->textField($model,'credit_object_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'currency_alias'); ?>
		<?php echo $form->textField($model,'currency_alias',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_open'); ?>
		<?php echo $form->textField($model,'date_open'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_closed'); ?>
		<?php echo $form->textField($model,'date_closed'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_decline'); ?>
		<?php echo $form->textField($model,'date_decline'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'amount'); ?>
		<?php echo $form->textField($model,'amount',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'group_alias'); ?>
		<?php echo $form->textField($model,'group_alias',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'spec_alias'); ?>
		<?php echo $form->textField($model,'spec_alias',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status_alias'); ?>
		<?php echo $form->textField($model,'status_alias',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'is_confirm_system'); ?>
		<?php echo $form->textField($model,'is_confirm_system'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'is_confirm_debit_object'); ?>
		<?php echo $form->textField($model,'is_confirm_debit_object'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'is_confirm_credit_object'); ?>
		<?php echo $form->textField($model,'is_confirm_credit_object'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'is_confirm_admin'); ?>
		<?php echo $form->textField($model,'is_confirm_admin'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'debit_wallet_credit_before'); ?>
		<?php echo $form->textField($model,'debit_wallet_credit_before',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'debit_wallet_credit_after'); ?>
		<?php echo $form->textField($model,'debit_wallet_credit_after',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'debit_wallet_debit_before'); ?>
		<?php echo $form->textField($model,'debit_wallet_debit_before',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'debit_wallet_debit_after'); ?>
		<?php echo $form->textField($model,'debit_wallet_debit_after',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'debit_wallet_balance_before'); ?>
		<?php echo $form->textField($model,'debit_wallet_balance_before',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'debit_wallet_balance_after'); ?>
		<?php echo $form->textField($model,'debit_wallet_balance_after',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'credit_wallet_credit_before'); ?>
		<?php echo $form->textField($model,'credit_wallet_credit_before',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'credit_wallet_credit_after'); ?>
		<?php echo $form->textField($model,'credit_wallet_credit_after',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'credit_wallet_debit_before'); ?>
		<?php echo $form->textField($model,'credit_wallet_debit_before',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'credit_wallet_debit_after'); ?>
		<?php echo $form->textField($model,'credit_wallet_debit_after',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'credit_wallet_balance_before'); ?>
		<?php echo $form->textField($model,'credit_wallet_balance_before',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'credit_wallet_balance_after'); ?>
		<?php echo $form->textField($model,'credit_wallet_balance_after',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'guid'); ?>
		<?php echo $form->textField($model,'guid',array('size'=>32,'maxlength'=>32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'created_at'); ?>
		<?php echo $form->textField($model,'created_at'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'created_by'); ?>
		<?php echo $form->textField($model,'created_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'created_ip'); ?>
		<?php echo $form->textField($model,'created_ip',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'modified_at'); ?>
		<?php echo $form->textField($model,'modified_at'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'modified_by'); ?>
		<?php echo $form->textField($model,'modified_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'modified_ip'); ?>
		<?php echo $form->textField($model,'modified_ip',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->