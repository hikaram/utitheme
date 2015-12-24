<?php
$options = array();
?>

<div class="note note-danger">
	<p><i class="fa fa-warning" style="margin-right: 10px;"></i>Поля помеченные <span class="required">*</span> обязательны к заполнению.</p>
</div>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'finance-wallets-for-new-user-form',
	'enableAjaxValidation'=>false,
)); ?>

<?php echo $form->errorSummary($model); ?>

<div class="portlet box green">
	<div class="portlet-title">
		<div class="caption">
			<i class="glyphicon glyphicon-plus" style="margin-right: 10px;"></i> 
			<? if ((boolean)$model->isNewRecord == TRUE) : ?>
				Создание нового
			<? else : ?>
				Редактирование
			<? endif;?> типа
		</div>
	</div>
	<div class="portlet-body form form-horizontal">
		<div class="form-body">
			<div class="form-group" style="margin-top: 30px;">
				<?php echo $form->labelEx($model,'type_alias', array('class' => 'col-md-3 control-label')); ?>
				<div class="col-md-9">
					<?php echo $form->listBox($model, 'type_alias', $model->getTypesAlias(), array('class' => 'form-control input-inline input-large', 'size' => 0, 'options' => $options)); ?>
					<span class="help-block"><?php echo $form->error($model,'type_alias'); ?></span>
				</div>
			</div>
			<div class="form-group">
				<?php echo $form->labelEx($model,'object_alias', array('class' => 'col-md-3 control-label')); ?>
				<div class="col-md-9">
					<?php echo $form->listBox($model, 'object_alias', CHtml::listData($modelsObjects, 'alias', 'title'), array('class' => 'form-control input-inline input-large', 'size' => 0, 'options' => $options)); ?>
					<a href="../objects/create/subsession/<?=$this->subSession->guid?>">Добавить объект</a>
					<span class="help-block"><?php echo $form->error($model,'object_alias'); ?></span>
				</div>
			</div>
			<div class="form-group">
				<?php echo $form->labelEx($model,'purpose_alias', array('class' => 'col-md-3 control-label')); ?>
				<div class="col-md-9">
					<?php echo $form->listBox($model, 'purpose_alias', CHtml::listData($modelsWalletsPurpose, 'alias', 'title'), array('class' => 'form-control input-inline input-large', 'size' => 0, 'options' => $options)); ?>
					<a href="../walletspurpose/create/subsession/<?=$this->subSession->guid?>">Добавить назначение</a>
					<span class="help-block"><?php echo $form->error($model,'purpose_alias'); ?></span>
				</div>
			</div>
			<div class="form-group">
				<?php echo $form->labelEx($model,'currency_alias', array('class' => 'col-md-3 control-label')); ?>
				<div class="col-md-9">
					<?php echo $form->listBox($model, 'currency_alias', CHtml::listData($modelsCurrency, 'alias', 'title'), array('class' => 'form-control input-inline input-large', 'size' => 0, 'options' => $options)); ?>
					<a href="../currency/create/subsession/<?=$this->subSession->guid?>">Добавить валюту</a>
					<span class="help-block"><?php echo $form->error($model,'currency_alias'); ?></span>
				</div>
			</div>
			<div class="form-group">
				<?php echo $form->labelEx($model,'status_alias', array('class' => 'col-md-3 control-label')); ?>
				<div class="col-md-9">
					<?php echo $form->listBox($model, 'status_alias', CHtml::listData($modelsStatuses, 'alias', 'title'), array('class' => 'form-control input-inline input-large', 'size' => 0, 'options' => $options)); ?>
					<a href="../walletsstatuses/create/subsession/<?=$this->subSession->guid?>">Добавить статусы</a>
					<span class="help-block"><?php echo $form->error($model,'status_alias'); ?></span>
				</div>
			</div>
			<div class="form-group" style="border-bottom: 1px solid #e5e5e5; margin: 30px 0;"></div>
			<div class="form-group">
				<?php echo $form->labelEx($model,'credit', array('class' => 'col-md-3 control-label')); ?>
				<div class="col-md-9">
					<?php echo $form->textField($model,'credit',array('class'=> 'form-control input-inline input-medium','size' => 20, 'maxlength' => 20)); ?>
					<span class="help-block"><?php echo $form->error($model,'credit'); ?></span>
				</div>
			</div>
			<div class="form-group">
				<?php echo $form->labelEx($model,'credit_unapproved', array('class' => 'col-md-3 control-label')); ?>
				<div class="col-md-9">
					<?php echo $form->textField($model,'credit_unapproved',array('class'=> 'form-control input-inline input-medium','size' => 20, 'maxlength' => 20)); ?>
					<span class="help-block"><?php echo $form->error($model,'credit_unapproved'); ?></span>
				</div>
			</div>
			<div class="form-group">
				<?php echo $form->labelEx($model,'debit', array('class' => 'col-md-3 control-label')); ?>
				<div class="col-md-9">
					<?php echo $form->textField($model,'debit',array('class'=> 'form-control input-inline input-medium','size' => 20, 'maxlength' => 20)); ?>
					<span class="help-block"><?php echo $form->error($model,'debit'); ?></span>
				</div>
			</div>
			<div class="form-group">
				<?php echo $form->labelEx($model,'debit_unapproved', array('class' => 'col-md-3 control-label')); ?>
				<div class="col-md-9">
					<?php echo $form->textField($model,'debit_unapproved',array('class'=> 'form-control input-inline input-medium','size' => 20, 'maxlength' => 20)); ?>
					<span class="help-block"><?php echo $form->error($model,'debit_unapproved'); ?></span>
				</div>
			</div>
			<div class="form-group">
				<?php echo $form->labelEx($model,'balance', array('class' => 'col-md-3 control-label')); ?>
				<div class="col-md-9">
					<?php echo $form->textField($model,'balance',array('class'=> 'form-control input-inline input-medium','size' => 20, 'maxlength' => 20)); ?>
					<span class="help-block"><?php echo $form->error($model,'balance'); ?></span>
				</div>
			</div>
			<div class="form-group">
				<?php echo $form->labelEx($model,'balance_unapproved', array('class' => 'col-md-3 control-label')); ?>
				<div class="col-md-9">
					<?php echo $form->textField($model,'balance_unapproved',array('class'=> 'form-control input-inline input-medium','size' => 20, 'maxlength' => 20)); ?>
					<span class="help-block"><?php echo $form->error($model,'balance_unapproved'); ?></span>
				</div>
			</div>
			<div class="form-group">
				<?php echo $form->labelEx($model,'balance_blocked', array('class' => 'col-md-3 control-label')); ?>
				<div class="col-md-9">
					<?php echo $form->textField($model,'balance_blocked',array('class'=> 'form-control input-inline input-medium','size' => 20, 'maxlength' => 20)); ?>
					<span class="help-block"><?php echo $form->error($model,'balance_blocked'); ?></span>
				</div>
			</div>
			<div class="form-group" style="border-bottom: 1px solid #e5e5e5; margin: 30px 0;"></div>
			<div class="form-group">
				<?php echo $form->labelEx($model,'is_set_credit_balance_limit', array('class' => 'col-md-3 control-label no-padding-top')); ?>
				<div class="col-md-9">
					<?php echo $form->checkBox($model,'is_set_credit_balance_limit'); ?>
					<span class="help-block"><?php echo $form->error($model,'is_set_credit_balance_limit'); ?></span>
				</div>
			</div>
			<div class="form-group">
				<?php echo $form->labelEx($model,'credit_balance_limit', array('class' => 'col-md-3 control-label')); ?>
				<div class="col-md-9">
					<?php echo $form->textField($model,'credit_balance_limit',array('class'=> 'form-control input-inline input-medium','size' => 20, 'maxlength' => 20)); ?>
					<span class="help-block"><?php echo $form->error($model,'credit_balance_limit'); ?></span>
				</div>
			</div>
			<div class="form-group" style="border-bottom: 1px solid #e5e5e5; margin: 30px 0;"></div>
			<div class="form-group">
				<?php echo $form->labelEx($model,'is_set_debit_balance_limit', array('class' => 'col-md-3 control-label no-padding-top')); ?>
				<div class="col-md-9">
					<?php echo $form->checkBox($model,'is_set_debit_balance_limit'); ?>
					<span class="help-block"><?php echo $form->error($model,'is_set_debit_balance_limit'); ?></span>
				</div>
			</div>
			<div class="form-group">
				<?php echo $form->labelEx($model,'debit_balance_limit', array('class' => 'col-md-3 control-label')); ?>
				<div class="col-md-9">
					<?php echo $form->textField($model,'debit_balance_limit',array('class'=> 'form-control input-inline input-medium','size' => 20, 'maxlength' => 20)); ?>
					<span class="help-block"><?php echo $form->error($model,'debit_balance_limit'); ?></span>
				</div>
			</div>
			
		</div>
		<div class="form-actions">
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', array('class'=>'btn green')); ?>
		</div>
	</div>
</div>

<?php $this->endWidget(); ?>