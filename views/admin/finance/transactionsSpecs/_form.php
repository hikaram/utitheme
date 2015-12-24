<style>
	.col-md-3.no-padding-top {
		padding-top: 0px !important;
	}
</style>
<?php
    $options = array();
?>
<div class="note note-danger">
	<p><i class="fa fa-warning" style="margin-right: 10px;"></i>Поля помеченные <span class="required">*</span> обязательны к заполнению.</p>
</div>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'finance-transactions-specs-form',
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
				<? endif;?> спецификации
			</div>
		</div>
		<div class="portlet-body form form-horizontal">
			<div class="form-body">
				<h3 style="padding: 0 20px;">Основная информация</h3>
				<div class="form-group" style="margin-top: 20px;">
					<?php echo $form->labelEx($model,'alias', array('class' => 'col-md-3 control-label')); ?>
					<div class="col-md-9">
						<?php echo $form->textField($model,'alias',array('class' => 'form-control input-inline input-large', 'size'=>60,'maxlength'=>255)); ?>
						<span class="help-block"><?php echo $form->error($model,'alias'); ?></span>
					</div>
				</div>
				<div class="form-group">
					<?php echo $form->labelEx($model,'debit_object_alias', array('class' => 'col-md-3 control-label')); ?>
					<div class="col-md-9">
						<?php echo $form->listBox($model,'debit_object_alias', CHtml::listData($modelsObjects, 'alias', 'title') , array('class' => 'form-control input-inline input-large','size' => 1)); ?>
						<a href="<?=$this->createUrl('objects/create/', array('subsession' => $this->subSession->guid))?>">Добавить объект</a>
						<span class="help-block"><? echo $form->error($modelSpecObjectEmpty, 'debit_object_alias'); ?></span>
					</div>
				</div>
				<div class="form-group">
					<?php echo $form->labelEx($model,'debit_purpose_alias', array('class' => 'col-md-3 control-label')); ?>
					<div class="col-md-9">
						<?php echo $form->listBox($model,'debit_purpose_alias', CHtml::listData($modelsPurpose, 'alias', 'title') , array('class' => 'form-control input-inline input-large','size' => 1)); ?>
						<a href="<?=$this->createUrl('walletspurpose/create/', array('subsession' => $this->subSession->guid))?>">Добавить назначение</a>
						<span class="help-block"><? echo $form->error($modelSpecObjectEmpty, 'debit_purpose_alias'); ?></span>
					</div>
				</div>
				<div class="form-group">
					<?php echo $form->labelEx($model,'credit_object_alias', array('class' => 'col-md-3 control-label')); ?>
					<div class="col-md-9">
						<?php echo $form->listBox($model,'credit_object_alias', CHtml::listData($modelsObjects, 'alias', 'title') , array('class' => 'form-control input-inline input-large','size' => 1)); ?>
						<a href="<?=$this->createUrl('objects/create/', array('subsession' => $this->subSession->guid))?>">Добавить объект</a>
						<span class="help-block"><? echo $form->error($modelSpecObjectEmpty, 'credit_object_alias'); ?></span>
					</div>
				</div>
				<div class="form-group">
					<?php echo $form->labelEx($model,'credit_purpose_alias', array('class' => 'col-md-3 control-label')); ?>
					<div class="col-md-9">
						<?php
							if ($model->isNewRecord)
							{
								$options_alias = array('credit' => array('selected' => 'selected'));
							}
							else
							{
								$options_alias = array();
							}
							echo $form->listBox($model,'credit_purpose_alias', CHtml::listData($modelsPurpose, 'alias', 'title') , array('options' => $options_alias, 'class' => 'form-control input-inline input-large', 'size' => 1)); 
						?>
						<a href="<?=$this->createUrl('walletspurpose/create/', array('subsession' => $this->subSession->guid))?>">Добавить назначение</a>
						<span class="help-block"><? echo $form->error($modelSpecObjectEmpty, 'credit_purpose_alias'); ?></span>
					</div>
				</div>
				<div class="form-group">
					<?php echo $form->labelEx($model,'title', array('class' => 'col-md-3 control-label')); ?>
					<div class="col-md-9">
						<?php echo $form->textField($model,'title',array('class' => 'form-control input-inline input-large', 'size'=>60,'maxlength'=>255)); ?>
						<span class="help-inline">Выводится в фильтре операций</span>
						<span class="help-block"><?php echo $form->error($model,'title'); ?></span>
					</div>
				</div>
				<div class="form-group">
					<?php echo $form->labelEx($model,'description', array('class' => 'col-md-3 control-label')); ?>
					<div class="col-md-9">
						<?php echo $form->textField($model,'description',array('class' => 'form-control input-inline input-large', 'size'=>60,'maxlength'=>255)); ?>
						<span class="help-inline">Выводится в списке операций</span>
						<span class="help-block"><?php echo $form->error($model,'description'); ?></span>
					</div>
				</div>
				<div class="form-group">
					<?php echo $form->labelEx($model,'group_alias', array('class' => 'col-md-3 control-label')); ?>
					<div class="col-md-9">
						<?php echo $form->listBox($model,'group_alias', CHtml::listData($modelsGroups, 'alias', 'title') , array('class' => 'form-control input-inline input-large', 'size' => 1)); ?>
						<a href="<?=$this->createUrl('transactionsgroups/create/', array('subsession' => $this->subSession->guid))?>">Добавить группу</a>
						<span class="help-block"><?php echo $form->error($model,'group_alias'); ?></span>
					</div>
				</div>
				<div class="form-group">
					<?php echo $form->labelEx($model,'is_used', array('class' => 'col-md-3 control-label no-padding-top')); ?>
					<div class="col-md-9">
						<?php echo $form->checkBox($model,'is_used'); ?>
						<span class="help-block"><?php echo $form->error($model,'is_used'); ?></span>
					</div>
				</div>
				<div class="form-group">
					<?php echo $form->labelEx($model,'is_wallet_update', array('class' => 'col-md-3 control-label no-padding-top')); ?>
					<div class="col-md-9">
						<?php echo $form->checkBox($model,'is_wallet_update'); ?>
						<span class="help-block"><?php echo $form->error($model,'is_wallet_update'); ?></span>
					</div>
				</div>
				<div class="form-group">
					<?php echo $form->labelEx($model,'is_comment_form_show', array('class' => 'col-md-3 control-label no-padding-top')); ?>
					<div class="col-md-9">
						<?php echo $form->checkBox($model,'is_comment_form_show'); ?>
						<span class="help-block"><?php echo $form->error($model,'is_comment_form_show'); ?></span>
					</div>
				</div>
				<div class="form-group">
					<?php echo $form->labelEx($model,'is_comment_require', array('class' => 'col-md-3 control-label no-padding-top')); ?>
					<div class="col-md-9">
						<?php echo $form->checkBox($model,'is_comment_require'); ?>
						<span class="help-block"><?php echo $form->error($model,'is_comment_require'); ?></span>
					</div>
				</div>
				<div class="form-group">
					<?php echo $form->labelEx($model,'is_admin_password_require', array('class' => 'col-md-3 control-label no-padding-top')); ?>
					<div class="col-md-9">
						<?php echo $form->checkBox($model,'is_admin_password_require'); ?>
						<span class="help-block"><?php echo $form->error($model,'is_admin_password_require'); ?></span>
					</div>
				</div>
				<div class="form-group">
					<?php echo $form->labelEx($model,'is_debit_password_require', array('class' => 'col-md-3 control-label no-padding-top')); ?>
					<div class="col-md-9">
						<?php echo $form->checkBox($model,'is_debit_password_require'); ?>
						<span class="help-block"><?php echo $form->error($model,'is_debit_password_require'); ?></span>
					</div>
				</div>
				<div class="form-group">
					<?php echo $form->labelEx($model,'is_credit_password_require', array('class' => 'col-md-3 control-label no-padding-top')); ?>
					<div class="col-md-9">
						<?php echo $form->checkBox($model,'is_credit_password_require'); ?>
						<span class="help-block"><?php echo $form->error($model,'is_credit_password_require'); ?></span>
					</div>
				</div>
				<div class="form-group">
					<?php echo $form->labelEx($model,'is_confirm_from_admin', array('class' => 'col-md-3 control-label no-padding-top')); ?>
					<div class="col-md-9">
						<?php echo $form->checkBox($model,'is_confirm_from_admin'); ?>
						<span class="help-block"><?php echo $form->error($model,'is_confirm_from_admin'); ?></span>
					</div>
				</div>
				<div class="form-group">
					<?php echo $form->labelEx($model,'is_confirm_from_debit', array('class' => 'col-md-3 control-label no-padding-top')); ?>
					<div class="col-md-9">
						<?php echo $form->checkBox($model,'is_confirm_from_debit'); ?>
						<span class="help-block"><?php echo $form->error($model,'is_confirm_from_debit'); ?></span>
					</div>
				</div>
				<div class="form-group">
					<?php echo $form->labelEx($model,'is_confirm_from_credit', array('class' => 'col-md-3 control-label no-padding-top')); ?>
					<div class="col-md-9">
						<?php echo $form->checkBox($model,'is_confirm_from_credit'); ?>
						<span class="help-block"><?php echo $form->error($model,'is_confirm_from_credit'); ?></span>
					</div>
				</div>
				<div class="form-group">
					<?php echo $form->labelEx($model,'is_allowed_increase_amount', array('class' => 'col-md-3 control-label no-padding-top')); ?>
					<div class="col-md-9">
						<?php echo $form->checkBox($model,'is_allowed_increase_amount'); ?>
						<span class="help-block"><?php echo $form->error($model,'is_allowed_increase_amount'); ?></span>
					</div>
				</div>
				<div class="form-group">
					<?php echo $form->labelEx($model,'is_allowed_reduce_amount', array('class' => 'col-md-3 control-label no-padding-top')); ?>
					<div class="col-md-9">
						<?php echo $form->checkBox($model,'is_allowed_reduce_amount'); ?>
						<span class="help-block"><?php echo $form->error($model,'is_allowed_reduce_amount'); ?></span>
					</div>
				</div>
				<div class="form-group">
					<?php echo $form->labelEx($model,'is_allowed_amount_zero', array('class' => 'col-md-3 control-label no-padding-top')); ?>
					<div class="col-md-9">
						<?php echo $form->checkBox($model,'is_allowed_amount_zero'); ?>
						<span class="help-block"><?php echo $form->error($model,'is_allowed_amount_zero'); ?></span>
					</div>
				</div>
				<div class="form-group">
					<?php echo $form->labelEx($model,'redirect_open', array('class' => 'col-md-3 control-label')); ?>
					<div class="col-md-9">
						<span class="help-inline" style="vertical-align: middle">http://<?=$_SERVER['HTTP_HOST']?></span>
						<?php echo $form->textField($model, 'redirect_open', array('class' => 'form-control input-inline input-large', 'size' => 60,'maxlength' => 1000)); ?></td>
						<span class="help-block"><?php echo $form->error($model,'redirect_open'); ?></span>
					</div>
				</div>
				<div class="form-group">
					<?php echo $form->labelEx($model,'redirect_confirm', array('class' => 'col-md-3 control-label')); ?>
					<div class="col-md-9">
						<span class="help-inline" style="vertical-align: middle">http://<?=$_SERVER['HTTP_HOST']?></span>
						<?php echo $form->textField($model, 'redirect_confirm', array('class' => 'form-control input-inline input-large', 'size' => 60,'maxlength' => 1000)); ?></td>
						<span class="help-block"><?php echo $form->error($model,'redirect_confirm'); ?></span>
					</div>
				</div>
				<div class="form-group">
					<?php echo $form->labelEx($model,'redirect_decline', array('class' => 'col-md-3 control-label')); ?>
					<div class="col-md-9">
						<span class="help-inline" style="vertical-align: middle">http://<?=$_SERVER['HTTP_HOST']?></span>
						<?php echo $form->textField($model, 'redirect_decline', array('class' => 'form-control input-inline input-large', 'size' => 60,'maxlength' => 1000)); ?></td>
						<span class="help-block"><?php echo $form->error($model,'redirect_decline'); ?></span>
					</div>
				</div>
				<div class="form-group" style="border-bottom: 1px solid #e5e5e5; margin-right: 0; margin-left: 0;"></div>
				<h3 style="padding: 0 20px;">Сумма</h3>
				<?php if(count($modelsTransactionsSpecs) == 0) : ?>
				<div class="note note-success">
					Валюты еще на заведены, вы можете <a href="<?=$this->createUrl('currency/create/', array('subsession' => $this->subSession->guid))?>">создать</a> сейчас.
				</div>
				<?php else : ?>
					<?php foreach($modelsTransactionsSpecs as $alias => $modelTransactionsSpecs) : ?>
					<div class="form-group">
						<label class="col-md-3 control-label">
							<?=$modelsCurrency[$alias]->title?>&nbsp;(<span style="text-transform: uppercase;"><?=$alias?></span>)
						</label>
						<div class="col-md-9">
							<?php echo $form->hiddenField($modelTransactionsSpecs, 'finance_transactions_specs__id', array('name' => 'SpecsCurrency[' . $alias . '][' . get_class($modelTransactionsSpecs) . '][finance_transactions_specs__id]')); ?>
						   <?php echo $form->hiddenField($modelTransactionsSpecs, 'currency_alias', array('name' => 'SpecsCurrency[' . $alias . '][' . get_class($modelTransactionsSpecs) . '][currency_alias]')); ?>
						   <?php echo $form->textField($modelTransactionsSpecs, 'amount', array('name' => 'SpecsCurrency[' . $alias . '][' . get_class($modelTransactionsSpecs) . '][amount]', 'class' => 'form-control input-inline input-large')); ?>
						   <label class="control-label"><?=$modelsCurrency[$alias]->abbreviation?></label><span style="margin-right: 30px;"></span>
						   <?php echo $form->checkBox($modelTransactionsSpecs, 'isSelectForm', array('name' => 'SpecsCurrency[' . $alias . '][' . get_class($modelTransactionsSpecs) . '][isSelectForm]')); ?>
						   <span class="help-block"><?php echo $form->error($modelTransactionsSpecs, 'amount'); ?></span>
						</div>
					</div>
					<?php endforeach; ?>
					<div class="form-group">
						<div class="col-md-3"></div>
						<div class="col-md-9">
							<a href="<?=$this->createUrl('currency/create/', array('subsession' => $this->subSession->guid))?>">Добавить валюту</a>
						</div>
					</div>
				<?php endif; ?>
				<?php foreach($modelsSpecsObjects as $key => $modelSpecObject) : ?>
				<div class="object">
					<div class="form-group" style="border-bottom: 1px solid #e5e5e5; margin-right: 0; margin-left: 0;"></div>
					<h3 style="padding: 0 20px;">Связанный объект</h3>
					<div class="form-group" style="margin-top: 20px;">
						<?php echo $form->labelEx($modelSpecObject, 'alias', array('class' => 'col-md-3 control-label')); ?>
						<div class="col-md-9">
							<?php echo $form->hiddenField($modelSpecObject, 'finance_transactions_specs__id', array('name' => get_class($modelSpecObject) . '[' . $key . '][finance_transactions_specs__id]'))?>
							<?php echo $form->textField($modelSpecObject, 'alias', array('name' => get_class($modelSpecObject) . '[' . $key . '][alias]', 'class' => 'form-control input-inline input-large'))?>
							<span class="help-block"><? echo $form->error($modelSpecObject, 'alias'); ?></span>
						</div>
					</div>
					<div class="form-group">
						<?php echo $form->labelEx($modelSpecObjectEmpty, 'title', array('class' => 'col-md-3 control-label')); ?>
						<div class="col-md-9">
							<?php echo $form->textField($modelSpecObjectEmpty, 'title', array('id' => 'title', 'class' => 'form-control input-inline input-large'))?>
							<span class="help-block"><? echo $form->error($modelSpecObjectEmpty, 'title'); ?></span>
						</div>
					</div>
					<div class="form-group">
						<?php echo $form->labelEx($modelSpecObjectEmpty, 'is_required', array('class' => 'col-md-3 control-label no-padding-top')); ?>
						<div class="col-md-9">
							<?php echo $form->checkBox($modelSpecObject, 'is_required', array('name' => get_class($modelSpecObject) . '[' . $key . '][is_required]'))?>
							<span class="help-block"><? echo $form->error($modelSpecObjectEmpty, 'is_required'); ?></span>
						</div>
					</div>
					<div class="form-group">
						<?php echo $form->labelEx($modelSpecObjectEmpty, 'is_show_for_admin', array('class' => 'col-md-3 control-label no-padding-top')); ?>
						<div class="col-md-9">
							<?php echo $form->checkBox($modelSpecObject, 'is_show_for_admin', array('name' => get_class($modelSpecObject) . '[' . $key . '][is_show_for_admin]'))?>
							<span class="help-block"><? echo $form->error($modelSpecObjectEmpty, 'is_show_for_admin'); ?></span>
						</div>
					</div>
					<div class="form-group">
						<?php echo $form->labelEx($modelSpecObjectEmpty, 'is_show_for_debit', array('class' => 'col-md-3 control-label no-padding-top')); ?>
						<div class="col-md-9">
							<?php echo $form->checkBox($modelSpecObject, 'is_show_for_debit', array('name' => get_class($modelSpecObject) . '[' . $key . '][is_show_for_debit]'))?>
							<span class="help-block"><? echo $form->error($modelSpecObjectEmpty, 'is_show_for_debit'); ?></span>
						</div>
					</div>
					<div class="form-group">
						<?php echo $form->labelEx($modelSpecObjectEmpty, 'is_show_for_credit', array('class' => 'col-md-3 control-label no-padding-top')); ?>
						<div class="col-md-9">
							<?php echo $form->checkBox($modelSpecObject, 'is_show_for_credit', array('name' => get_class($modelSpecObject) . '[' . $key . '][is_show_for_credit]'))?>
							<span class="help-block"><? echo $form->error($modelSpecObjectEmpty, 'is_show_for_credit'); ?></span>
						</div>
					</div>
					<div class="form-group">
						<?php echo $form->labelEx($modelSpecObjectEmpty, 'is_admin_specifies', array('class' => 'col-md-3 control-label no-padding-top')); ?>
						<div class="col-md-9">
							<?php echo $form->checkBox($modelSpecObject, 'is_admin_specifies', array('name' => get_class($modelSpecObject) . '[' . $key . '][is_admin_specifies]'))?>
							<span class="help-block"><? echo $form->error($modelSpecObjectEmpty, 'is_admin_specifies'); ?></span>
						</div>
					</div>
					<div class="form-group">
						<?php echo $form->labelEx($modelSpecObjectEmpty, 'is_debit_specifies', array('class' => 'col-md-3 control-label no-padding-top')); ?>
						<div class="col-md-9">
							<?php echo $form->checkBox($modelSpecObject, 'is_debit_specifies', array('name' => get_class($modelSpecObject) . '[' . $key . '][is_debit_specifies]'))?>
							<span class="help-block"><? echo $form->error($modelSpecObjectEmpty, 'is_debit_specifies'); ?></span>
						</div>
					</div>
					<div class="form-group">
						<?php echo $form->labelEx($modelSpecObjectEmpty, 'is_credit_specifies', array('class' => 'col-md-3 control-label no-padding-top')); ?>
						<div class="col-md-9">
							<?php echo $form->checkBox($modelSpecObject, 'is_credit_specifies', array('name' => get_class($modelSpecObject) . '[' . $key . '][is_credit_specifies]'))?>
							<span class="help-block"><? echo $form->error($modelSpecObjectEmpty, 'is_credit_specifies'); ?></span>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
				<div class="form-group">
					<div class="col-md-3"></div>
					<div class="col-md-9">
						<a id="ObjectLinkForAdd" href="javascript: void(0)">Добавить еще</a>
					</div>
				</div>
			</div>
			<div class="form-actions">
				<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', array('class'=>'btn green')); ?>
			</div>
		</div>
	</div>
<?php $this->endWidget(); ?>
<textarea id="object" style="display: none">
<div class="object">
	<div class="form-group" style="border-bottom: 1px solid #e5e5e5; margin-right: 0; margin-left: 0;"></div>
	<h3 style="padding: 0 20px;">Связанный объект</h3>
	<div class="form-group" style="margin-top: 20px;">
		<?php echo $form->labelEx($modelSpecObject, 'alias', array('class' => 'col-md-3 control-label')); ?>
		<div class="col-md-9">
			<?php echo $form->hiddenField($modelSpecObject, 'finance_transactions_specs__id', array('name' => get_class($modelSpecObject) . '[' . $key . '][finance_transactions_specs__id]'))?>
			<?php echo $form->textField($modelSpecObject, 'alias', array('name' => get_class($modelSpecObject) . '[' . $key . '][alias]', 'class' => 'form-control input-inline input-large'))?>
			<span class="help-block"><? echo $form->error($modelSpecObject, 'alias'); ?></span>
		</div>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($modelSpecObjectEmpty, 'title', array('class' => 'col-md-3 control-label')); ?>
		<div class="col-md-9">
			<?php echo $form->textField($modelSpecObjectEmpty, 'title', array('id' => 'title', 'class' => 'form-control input-inline input-large'))?>
			<span class="help-block"><? echo $form->error($modelSpecObjectEmpty, 'title'); ?></span>
		</div>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($modelSpecObjectEmpty, 'is_required', array('class' => 'col-md-3 control-label no-padding-top')); ?>
		<div class="col-md-9">
			<?php echo $form->checkBox($modelSpecObject, 'is_required', array('name' => get_class($modelSpecObject) . '[' . $key . '][is_required]'))?>
			<span class="help-block"><? echo $form->error($modelSpecObjectEmpty, 'is_required'); ?></span>
		</div>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($modelSpecObjectEmpty, 'is_show_for_admin', array('class' => 'col-md-3 control-label no-padding-top')); ?>
		<div class="col-md-9">
			<?php echo $form->checkBox($modelSpecObject, 'is_show_for_admin', array('name' => get_class($modelSpecObject) . '[' . $key . '][is_show_for_admin]'))?>
			<span class="help-block"><? echo $form->error($modelSpecObjectEmpty, 'is_show_for_admin'); ?></span>
		</div>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($modelSpecObjectEmpty, 'is_show_for_debit', array('class' => 'col-md-3 control-label no-padding-top')); ?>
		<div class="col-md-9">
			<?php echo $form->checkBox($modelSpecObject, 'is_show_for_debit', array('name' => get_class($modelSpecObject) . '[' . $key . '][is_show_for_debit]'))?>
			<span class="help-block"><? echo $form->error($modelSpecObjectEmpty, 'is_show_for_debit'); ?></span>
		</div>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($modelSpecObjectEmpty, 'is_show_for_credit', array('class' => 'col-md-3 control-label no-padding-top')); ?>
		<div class="col-md-9">
			<?php echo $form->checkBox($modelSpecObject, 'is_show_for_credit', array('name' => get_class($modelSpecObject) . '[' . $key . '][is_show_for_credit]'))?>
			<span class="help-block"><? echo $form->error($modelSpecObjectEmpty, 'is_show_for_credit'); ?></span>
		</div>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($modelSpecObjectEmpty, 'is_admin_specifies', array('class' => 'col-md-3 control-label no-padding-top')); ?>
		<div class="col-md-9">
			<?php echo $form->checkBox($modelSpecObject, 'is_admin_specifies', array('name' => get_class($modelSpecObject) . '[' . $key . '][is_admin_specifies]'))?>
			<span class="help-block"><? echo $form->error($modelSpecObjectEmpty, 'is_admin_specifies'); ?></span>
		</div>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($modelSpecObjectEmpty, 'is_debit_specifies', array('class' => 'col-md-3 control-label no-padding-top')); ?>
		<div class="col-md-9">
			<?php echo $form->checkBox($modelSpecObject, 'is_debit_specifies', array('name' => get_class($modelSpecObject) . '[' . $key . '][is_debit_specifies]'))?>
			<span class="help-block"><? echo $form->error($modelSpecObjectEmpty, 'is_debit_specifies'); ?></span>
		</div>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($modelSpecObjectEmpty, 'is_credit_specifies', array('class' => 'col-md-3 control-label no-padding-top')); ?>
		<div class="col-md-9">
			<?php echo $form->checkBox($modelSpecObject, 'is_credit_specifies', array('name' => get_class($modelSpecObject) . '[' . $key . '][is_credit_specifies]'))?>
			<span class="help-block"><? echo $form->error($modelSpecObjectEmpty, 'is_credit_specifies'); ?></span>
		</div>
	</div>
</div>
</textarea>