<?php $form = $this->beginWidget('CActiveForm', array(
	'id'=>'finance-transactions-types-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($modelTrigger); ?>

    <div class="note note-danger">
		<p><i class="fa fa-warning" style="margin-right: 10px;"></i>Поля помеченные <span class="required">*</span> обязательны к заполнению.</p>
	</div>
	
	<div class="note note-warning">
		<p><i class="fa fa-warning" style="margin-right: 10px;"></i>Каждый указываемый класс должен содержать реализацию метода initFinanceTransaction($modelFinanceTransaction), в который будет передан объект содержащий параметры транзакции.</p>
	</div>
    
    <div class="portlet box green">
		<div class="portlet-title">
			<div class="caption">
				<i class="glyphicon glyphicon-plus" style="margin-right: 10px;"></i> 
				<? if ((boolean)$modelTrigger->isNewRecord == TRUE) : ?>
					Создание нового
				<? else : ?>
					Редактирование
				<? endif;?> триггера
			</div>
		</div>
		<div class="portlet-body form form-horizontal">
			<div class="form-body">
				<div class="form-group" style="margin-top: 20px;">
					<?php echo $form->labelEx($modelTrigger,'spec_alias', array('class' => 'col-md-3 control-label')); ?>
					<div class="col-md-9">
						<?php echo $form->dropDownList($modelTrigger, 'spec_alias', CHtml::listData($modelsTransactionsSpecs, 'alias', 'title'), array('class' => 'form-control input-inline input-large')); ?>
						<span class="help-block"><?php echo $form->error($modelTrigger,'spec_alias'); ?></span>
					</div>
				</div>
				<div class="form-group">
					<?php echo $form->labelEx($modelTrigger,'status_alias', array('class' => 'col-md-3 control-label')); ?>
					<div class="col-md-9">
						<?php echo $form->dropDownList($modelTrigger, 'status_alias', CHtml::listData($modelsTransactionsStatuses, 'alias', 'title'), array('class' => 'form-control input-inline input-large')); ?>
						<span class="help-block"><?php echo $form->error($modelTrigger,'status_alias'); ?></span>
					</div>
				</div>
				<div class="form-group">
					<?php echo $form->labelEx($modelTrigger,'currency_alias', array('class' => 'col-md-3 control-label')); ?>
					<div class="col-md-9">
						<?php echo $form->dropDownList($modelTrigger, 'currency_alias', CHtml::listData($modelsCurrency, 'alias', 'title'), array('class' => 'form-control input-inline input-large')); ?>
						<span class="help-block"><?php echo $form->error($modelTrigger,'currency_alias'); ?></span>
					</div>
				</div>
				<div class="form-group">
					<?php echo $form->labelEx($modelTrigger,'path', array('class' => 'col-md-3 control-label')); ?>
					<div class="col-md-9">
						<?php echo $form->textField($modelTrigger, 'path', array('class' => 'form-control input-inline input-large'), array('size' => 100)); ?>
						<span class="help-inline">Путь от папки protected</span>
						<span class="help-block"><?php echo $form->error($modelTrigger,'path'); ?></span>
					</div>
				</div>
				<div class="form-group">
					<?php echo $form->labelEx($modelTrigger,'class', array('class' => 'col-md-3 control-label')); ?>
					<div class="col-md-9">
						<?php echo $form->textField($modelTrigger, 'class', array('class' => 'form-control input-inline input-large'), array('size' => 100)); ?></td>
						<span class="help-block"><?php echo $form->error($modelTrigger,'class'); ?></span>
					</div>
				</div>
				<div class="form-group">
					<?php echo $form->labelEx($modelTrigger,'method', array('class' => 'col-md-3 control-label')); ?>
					<div class="col-md-9">
						<?php echo $form->textField($modelTrigger, 'method', array('class' => 'form-control input-inline input-large'), array('size' => 100)); ?>
						<span class="help-block"><?php echo $form->error($modelTrigger,'method'); ?></span>
					</div>
				</div>
				<div class="form-group">
					<?php echo $form->labelEx($modelTrigger, 'module_owner', array('class' => 'col-md-3 control-label')); ?>
					<div class="col-md-9">
						<?php echo $form->textField($modelTrigger, 'module_owner', array('class' => 'form-control input-inline input-large'), array('size' => 100)); ?>
						<span class="help-block"><?php echo $form->error($modelTrigger,'module_owner'); ?></span>
					</div>
				</div>
				<div class="form-group">
					<?php echo $form->labelEx($modelTrigger, 'is_active', array('class' => 'col-md-3 control-label')); ?>
					<div class="col-md-9" style="padding-top: 7px;">
						<?php echo $form->checkBox($modelTrigger, 'is_active', array('size' => 100)); ?>
						<span class="help-block"><?php echo $form->error($modelTrigger,'is_active'); ?></span>
					</div>
				</div>
			</div>
			<div class="form-actions">
				<?php echo CHtml::submitButton($modelTrigger->isNewRecord ? 'Создать' : 'Сохранить', array('class' => 'btn green')); ?>
			</div>
		</div>
	</div>
    
<?php $this->endWidget(); ?>