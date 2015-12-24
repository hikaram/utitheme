<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'finance-transactions-statuses-form',
	'enableAjaxValidation'=>false,
)); ?>


<div class="note note-danger">
	<p><i class="fa fa-warning" style="margin-right: 10px;"></i>Поля помеченные <span class="required">*</span> обязательны к заполнению.</p>
</div>

<?php echo $form->errorSummary($model); ?>

<div class="portlet box green">
	<div class="portlet-title">
		<div class="caption">
			<i class="glyphicon glyphicon-plus" style="margin-right: 10px;"></i> 
			<? if ((boolean)$model->isNewRecord == TRUE) : ?>
				Создание нового
			<? else : ?>
				Редактирование
			<? endif;?> назначения
		</div>
	</div>
	<div class="portlet-body form form-horizontal">
		<div class="form-body">
			<div class="form-group" style="margin-top: 20px;">
				<?php echo $form->labelEx($model,'alias', array('class' => 'col-md-3 control-label')); ?>
				<div class="col-md-9">
					<?php echo $form->textField($model,'alias',array('class' => 'form-control input-inline input-large', 'size'=>60,'maxlength'=>100)); ?>
					<span class="help-block"><?php echo $form->error($model,'alias'); ?></span>
				</div>
			</div>
			<div class="form-group">
				<?php echo $form->labelEx($model,'title', array('class' => 'col-md-3 control-label')); ?>
				<div class="col-md-9">
					<?php echo $form->textField($model,'title',array('class' => 'form-control input-inline input-large', 'size'=>60,'maxlength'=>100)); ?>
					<span class="help-block"><?php echo $form->error($model,'description'); ?></span>
				</div>
			</div>
		</div>
		<div class="form-actions">
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', array('class'=>'btn green')); ?>
		</div>
	</div>
</div>

<?php $this->endWidget(); ?>