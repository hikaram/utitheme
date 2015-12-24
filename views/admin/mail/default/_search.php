<?php
/* @var $this MailLettersController */
/* @var $model MailLetters */
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
		<?php echo $form->label($model,'from'); ?>
		<?php echo $form->textField($model,'from',array('size'=>60,'maxlength'=>4000)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'to'); ?>
		<?php echo $form->textField($model,'to',array('size'=>60,'maxlength'=>4000)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'subject'); ?>
		<?php echo $form->textField($model,'subject',array('size'=>60,'maxlength'=>4000)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'body'); ?>
		<?php echo $form->textArea($model,'body',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status_alias'); ?>
		<?php echo $form->textField($model,'status_alias',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'attempts_count'); ?>
		<?php echo $form->textField($model,'attempts_count'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'posted_at'); ?>
		<?php echo $form->textField($model,'posted_at'); ?>
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