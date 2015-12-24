<?php
/* @var $this FinanceTransactionsController */
/* @var $model FinanceTransactions */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'finance-transactions-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'parent_id'); ?>
		<?php echo $form->textField($model,'parent_id'); ?>
		<?php echo $form->error($model,'parent_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'debit_wallet_id'); ?>
		<?php echo $form->textField($model,'debit_wallet_id'); ?>
		<?php echo $form->error($model,'debit_wallet_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'debit_wallet_type_alias'); ?>
		<?php echo $form->textField($model,'debit_wallet_type_alias',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'debit_wallet_type_alias'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'debit_object_alias'); ?>
		<?php echo $form->textField($model,'debit_object_alias',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'debit_object_alias'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'debit_object_id'); ?>
		<?php echo $form->textField($model,'debit_object_id'); ?>
		<?php echo $form->error($model,'debit_object_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'credit_wallet_id'); ?>
		<?php echo $form->textField($model,'credit_wallet_id'); ?>
		<?php echo $form->error($model,'credit_wallet_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'credit_wallet_type_alias'); ?>
		<?php echo $form->textField($model,'credit_wallet_type_alias',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'credit_wallet_type_alias'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'credit_object_alias'); ?>
		<?php echo $form->textField($model,'credit_object_alias',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'credit_object_alias'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'credit_object_id'); ?>
		<?php echo $form->textField($model,'credit_object_id'); ?>
		<?php echo $form->error($model,'credit_object_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'currency_alias'); ?>
		<?php echo $form->textField($model,'currency_alias',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'currency_alias'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_open'); ?>
		<?php echo $form->textField($model,'date_open'); ?>
		<?php echo $form->error($model,'date_open'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_closed'); ?>
		<?php echo $form->textField($model,'date_closed'); ?>
		<?php echo $form->error($model,'date_closed'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_decline'); ?>
		<?php echo $form->textField($model,'date_decline'); ?>
		<?php echo $form->error($model,'date_decline'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'amount'); ?>
		<?php echo $form->textField($model,'amount',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'amount'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'group_alias'); ?>
		<?php echo $form->textField($model,'group_alias',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'group_alias'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'spec_alias'); ?>
		<?php echo $form->textField($model,'spec_alias',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'spec_alias'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status_alias'); ?>
		<?php echo $form->textField($model,'status_alias',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'status_alias'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'is_confirm_system'); ?>
		<?php echo $form->textField($model,'is_confirm_system'); ?>
		<?php echo $form->error($model,'is_confirm_system'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'is_confirm_debit_object'); ?>
		<?php echo $form->textField($model,'is_confirm_debit_object'); ?>
		<?php echo $form->error($model,'is_confirm_debit_object'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'is_confirm_credit_object'); ?>
		<?php echo $form->textField($model,'is_confirm_credit_object'); ?>
		<?php echo $form->error($model,'is_confirm_credit_object'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'is_confirm_admin'); ?>
		<?php echo $form->textField($model,'is_confirm_admin'); ?>
		<?php echo $form->error($model,'is_confirm_admin'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'debit_wallet_credit_before'); ?>
		<?php echo $form->textField($model,'debit_wallet_credit_before',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'debit_wallet_credit_before'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'debit_wallet_credit_after'); ?>
		<?php echo $form->textField($model,'debit_wallet_credit_after',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'debit_wallet_credit_after'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'debit_wallet_debit_before'); ?>
		<?php echo $form->textField($model,'debit_wallet_debit_before',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'debit_wallet_debit_before'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'debit_wallet_debit_after'); ?>
		<?php echo $form->textField($model,'debit_wallet_debit_after',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'debit_wallet_debit_after'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'debit_wallet_balance_before'); ?>
		<?php echo $form->textField($model,'debit_wallet_balance_before',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'debit_wallet_balance_before'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'debit_wallet_balance_after'); ?>
		<?php echo $form->textField($model,'debit_wallet_balance_after',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'debit_wallet_balance_after'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'credit_wallet_credit_before'); ?>
		<?php echo $form->textField($model,'credit_wallet_credit_before',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'credit_wallet_credit_before'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'credit_wallet_credit_after'); ?>
		<?php echo $form->textField($model,'credit_wallet_credit_after',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'credit_wallet_credit_after'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'credit_wallet_debit_before'); ?>
		<?php echo $form->textField($model,'credit_wallet_debit_before',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'credit_wallet_debit_before'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'credit_wallet_debit_after'); ?>
		<?php echo $form->textField($model,'credit_wallet_debit_after',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'credit_wallet_debit_after'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'credit_wallet_balance_before'); ?>
		<?php echo $form->textField($model,'credit_wallet_balance_before',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'credit_wallet_balance_before'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'credit_wallet_balance_after'); ?>
		<?php echo $form->textField($model,'credit_wallet_balance_after',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'credit_wallet_balance_after'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'guid'); ?>
		<?php echo $form->textField($model,'guid',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'guid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'created_at'); ?>
		<?php echo $form->textField($model,'created_at'); ?>
		<?php echo $form->error($model,'created_at'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'created_by'); ?>
		<?php echo $form->textField($model,'created_by'); ?>
		<?php echo $form->error($model,'created_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'created_ip'); ?>
		<?php echo $form->textField($model,'created_ip',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'created_ip'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'modified_at'); ?>
		<?php echo $form->textField($model,'modified_at'); ?>
		<?php echo $form->error($model,'modified_at'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'modified_by'); ?>
		<?php echo $form->textField($model,'modified_by'); ?>
		<?php echo $form->error($model,'modified_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'modified_ip'); ?>
		<?php echo $form->textField($model,'modified_ip',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'modified_ip'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->