<?php
/* @var $this TransactionsSpecsController */
/* @var $model FinanceTransactionsSpecs */
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
		<?php echo $form->label($model,'alias'); ?>
		<?php echo $form->textField($model,'alias',array('size'=>40,'maxlength'=>40)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'debet_object_alias'); ?>
		<?php echo $form->textField($model,'debet_object_alias',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'debet_purpose_alias'); ?>
		<?php echo $form->textField($model,'debet_purpose_alias',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'debet_wallet_party'); ?>
		<?php echo $form->textField($model,'debet_wallet_party',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'credit_object_alias'); ?>
		<?php echo $form->textField($model,'credit_object_alias',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'credit_purpose_alias'); ?>
		<?php echo $form->textField($model,'credit_purpose_alias',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'credit_wallet_party'); ?>
		<?php echo $form->textField($model,'credit_wallet_party',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>1000)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'transactions_group_alias'); ?>
		<?php echo $form->textField($model,'transactions_group_alias',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'is_used'); ?>
		<?php echo $form->textField($model,'is_used'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'is_wallet_update'); ?>
		<?php echo $form->textField($model,'is_wallet_update'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'is_confirm_from_admin'); ?>
		<?php echo $form->textField($model,'is_confirm_from_admin'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'is_confirm_from_debet'); ?>
		<?php echo $form->textField($model,'is_confirm_from_debet'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'is_confirm_from_credit'); ?>
		<?php echo $form->textField($model,'is_confirm_from_credit'); ?>
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