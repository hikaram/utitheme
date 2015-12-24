<?php
/* @var $this WarehouseController */
/* @var $model Warehouse */
/* @var $form CActiveForm */
?>

<div class="form">

	<?php
	$form = $this->beginWidget('CActiveForm', array(
		'id' => 'warehouse-form',
		'enableAjaxValidation' => false,
			));
	?>
<div class="note note-danger">
	<p><i class="fa fa-warning" style="margin-right: 10px;"></i><?=Yii::t('app','Поля помеченные')?> <span class="required">*</span> <?=Yii::t('app','обязательны к заполнению')?>.</p>
	<div class="error-summary"><?=$form->errorSummary(array($model, $modelLang)); ?></div>
</div>
<div class="portlet green box">
	<div class="portlet-title">
		<h3 class="caption">
			<? if ((boolean)$model->isNewRecord == TRUE) : ?>
				<i class="glyphicon glyphicon-plus" style="margin-right: 10px;"></i> 
				<?=Yii::t('app','Создание нового')?>
			<? else : ?>
				<i class="glyphicon glyphicon-pencil" style="margin-right: 10px;"></i> 
				<?=Yii::t('app','Редактирование')?>
			<? endif;?> <?=Yii::t('app','склада')?>
		</h3>
	</div>
	<div class="portlet-body form form-horizontal">
		<div class="form-body">
			
					<div class="form-group"> 
						<?php echo $form->labelEx($modelLang, 'name', array('class' => 'col-md-3 control-label')); ?>
						<div class="col-md-9">
							<div class="input-inline input-medium">
								<?php echo $form->textField($modelLang, 'name', array('size' => 60, 'maxlength' => 60,'class' => 'form-control')); ?>
							</div>
						
							<?php echo $form->error($modelLang, 'name', array('class' => 'help-inline')); ?>
						</div>
					</div>
					<div class="form-group"> 
						<?php echo $form->labelEx($model, 'phone', array('class' => 'col-md-3 control-label')); ?>
						<div class="col-md-9">
							<div class="input-inline input-medium"><div style="position: relative;"><div style="position: absolute; height: 12px; width: 12px; top: 3px; left: 5px;">+</div></div>
								<?php echo $form->textField($model, 'phone', array('size' => 60, 'maxlength' => 60,'class' => 'form-control')); ?>
							</div>
						
							<?php echo $form->error($model, 'phone', array('class' => 'help-inline')); ?>
						</div>
					</div>
					<div class="form-group"> 
						<?php echo $form->labelEx($model, 'email', array('class' => 'col-md-3 control-label')); ?>
						<div class="col-md-9">
							<div class="input-inline input-medium">
								<?php echo $form->textField($model, 'email', array('size' => 60, 'maxlength' => 60,'class' => 'form-control')); ?>
							</div>
						
							<?php echo $form->error($model, 'email', array('class' => 'help-inline')); ?>
						</div>
					</div>
					<div class="form-group"> 
						<?php echo $form->labelEx($model, 'skype', array('class' => 'col-md-3 control-label')); ?>
						<div class="col-md-9">
							<div class="input-inline input-medium">
								<?php echo $form->textField($model, 'skype', array('size' => 60, 'maxlength' => 60,'class' => 'form-control')); ?>
							</div>
						
							<?php echo $form->error($model, 'skype', array('class' => 'help-inline')); ?>
						</div>
					</div>
					<?php $cities = $this->beginWidget('CitiesWidget', array()); ?>
					<div class="form-group"> 
						<?php echo $form->labelEx($model, 'country_id', array('class' => 'col-md-3 control-label')); ?>
						<div class="col-md-9">
							<div class="input-inline input-medium">
								<?php $cities->countries($model->country_id,'WarWarehouse_country_id','WarWarehouse[country_id]'); ?>
							</div>
						
							<?php echo $form->error($model, 'country_id', array('class' => 'help-inline')); ?>
						</div>
					</div>
					<div class="form-group"> 
						<?php echo $form->labelEx($model, 'region_id', array('class' => 'col-md-3 control-label')); ?>
						<div class="col-md-9">
							<div class="input-inline input-medium">
								<?php $cities->regions($model->region_id, $model->country_id,'WarWarehouse_region_id','WarWarehouse[region_id]'); ?>
							</div>
						
							<?php echo $form->error($model, 'region_id', array('class' => 'help-inline')); ?>
						</div>
					</div>
					<div class="form-group"> 
						<?php echo $form->labelEx($model, 'city_id', array('class' => 'col-md-3 control-label')); ?>
						<div class="col-md-9">
							<div class="input-inline input-medium">
								<?php $cities->cities($model->city_id, $model->region_id,'WarWarehouse_city_id','WarWarehouse[city_id]'); ?>
							</div>
						
							<?php echo $form->error($model, 'city_id', array('class' => 'help-inline')); ?>
						</div>
					</div>
					<?php $this->endWidget(); ?>
					<div class="form-group"> 
						<?php echo $form->labelEx($model, 'war_type__id', array('class' => 'col-md-3 control-label')); ?>
						<div class="col-md-9">
							<div class="input-inline input-medium">
								<?php echo $form->dropDownList($model, 'war_type__id', WarWarehouse::allType($model->id), array('onChange' => 'isUser()', 'class' =>'form-control', 'id' => 'WarWarehouse_war_type__id')); ?>
							</div>
						
							<?php echo $form->error($model, 'war_type__id', array('class' => 'help-inline')); ?>
						</div>
					</div>
					<div class="form-group" id="users_tr"> 
						<?php echo $form->labelEx($model, 'users__id', array('class' => 'col-md-3 control-label')); ?>
						<div class="col-md-9">
							<div class="input-inline input-medium">
								<?= CHtml::textField('name',CHtml::encode($model->fio), array('id' => 'inputName','readonly'=>'readonly', 'class' => 'form-control')) ?>
								<?php echo $form->hiddenField($model, 'users__id', array('size' => 11, 'maxlength' => 11,'class'=>'form-control')); ?>
								<?php $this->widget('UserSearchWidget', array('input_name' => 'inputName', 'input_id' => 'WarWarehouse_users__id'))->userSearch(); ?>
																			
							</div>
						
							<?php echo $form->error($model, 'users__id', array('class' => 'help-inline')); ?>
						</div>
					</div>
					<div class="form-group"> 
						<?php echo $form->labelEx($model, 'adress', array('class' => 'col-md-3 control-label')); ?>
						<div class="col-md-9">
							<div class="input-inline input-medium">
								<?php echo $form->textField($modelLang, 'adress', array('size' => 60, 'maxlength' => 255,'class'=>'form-control')); ?>
							</div>
						
							<?php echo $form->error($model, 'adress', array('class' => 'help-inline')); ?>
						</div>
					</div>
					<div class="form-actions fluid">
						<div class="col-md-offset-3 col-md-9">
							<?php echo CHtml::submitButton(Yii::t('app', 'Сохранить'), array('class' => 'btn green')); ?>
							<?php echo CHtml::button(Yii::t('app', 'Отмена'), array('class' => 'btn default', 'onclick' => 'window.location = app.createAbsoluteUrl("admin/warehouse/warehouse")')); ?>
						</div>
					</div>
					<? /*
					<tr id="users_tr"> 
						<td><?php echo $form->labelEx($model, 'users__id'); ?></td>
						<td>
							<?= CHtml::textField('name',CHtml::encode($model->fio), array('id' => 'inputName','readonly'=>'readonly', 'class' => 'form-control input-inline input-large')) ?>
							<?php echo $form->hiddenField($model, 'users__id', array('size' => 11, 'maxlength' => 11,'style'=>'width:195px')); ?>
							<?php $this->widget('UserSearchWidget', array('input_name' => 'inputName', 'input_id' => 'WarWarehouse_users__id'))->userSearch(); ?>
						</td>
						<td><?php echo $form->error($model, 'users__id'); ?></td>
					*/?>
		</div>
	</div>
</div>
	

	<?php $this->endWidget(); ?>

</div><!-- form -->



