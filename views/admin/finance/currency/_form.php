<style>
	.col-md-3.no-padding-top {
		padding-top: 0px !important;
	}
</style>

<div class="note note-danger">
	<p><i class="fa fa-warning" style="margin-right: 10px;"></i>Поля помеченные <span class="required">*</span> обязательны к заполнению.</p>
</div>


<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'finance-currency-form',
	'enableAjaxValidation'=>false,
)); ?>

<?php echo $form->errorSummary($model); ?>

<div class="portlet box green">
	<div class="portlet-title">
		<div class="caption">
			<i class="glyphicon glyphicon-plus" style="margin-right: 10px;"></i>
			<? if ((boolean)$model->isNewRecord == TRUE) : ?>
				Создание новой
			<? else : ?>
				Редактирование
			<? endif;?> валюты
		</div>
	</div>
	<div class="portlet-body form form-horizontal">
		<div class="form-body">
			<div class="form-group" style="margin-top: 20px;">
				<?php echo $form->labelEx($model,'alias', array('class' => 'col-md-3 control-label')); ?>
				<div class="col-md-9">
					<?php echo $form->textField($model,'alias',array('class' => 'form-control input-inline input-large', 'size'=>60,'maxlength'=>255)); ?>
					<span class="help-block"><?php echo $form->error($model,'alias'); ?></span>
				</div>
			</div>
			<div class="form-group" style="margin-top: 20px;">
				<?php echo $form->labelEx($model,'title', array('class' => 'col-md-3 control-label')); ?>
				<div class="col-md-9">
					<?php echo $form->textField($model,'title',array('class' => 'form-control input-inline input-large', 'size'=>60,'maxlength'=>255)); ?>
					<span class="help-block"><?php echo $form->error($model,'title'); ?></span>
				</div>
			</div>
			<div class="form-group" style="margin-top: 20px;">
				<?php echo $form->labelEx($model,'abbreviation', array('class' => 'col-md-3 control-label')); ?>
				<div class="col-md-9">
					<?php echo $form->textField($model,'abbreviation',array('class' => 'form-control input-inline input-large', 'size'=>60,'maxlength'=>255)); ?>
					<span class="help-block"><?php echo $form->error($model,'abbreviation'); ?></span>
				</div>
			</div>
			<div class="form-group">
				<?php echo $form->labelEx($model,'is_main', array('class' => 'col-md-3 control-label no-padding-top')); ?>
				<div class="col-md-9">
					<?php echo $form->checkBox($model,'is_main'); ?>
					<span class="help-inline">Отменяет для ранее установленных записей, и делает текущую главной</span>
					<span class="help-block"><?php echo $form->error($model,'is_main'); ?></span>
				</div>
			</div>
		</div>
		<div class="form-actions">
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', array('class'=>'btn green')); ?>
		</div>
	</div>
</div>
	
<?php $this->endWidget(); ?>