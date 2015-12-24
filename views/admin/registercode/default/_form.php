<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'register-code-form',
	'enableAjaxValidation'=>false,
)); ?>

<div class="form-body">
	<?= $form->errorSummary($model); ?>
    <div class="form-group mt20">
		<?=CHtml::label(Yii::t('app', 'Описание'),'description', array('class' => 'col-md-3 control-label')); ?>
		<div class="col-md-9">
			<?=$form->textField($model,'description',array('class' => 'form-control input-inline input-large', 'size'=>60,'maxlength'=>255)); ?>
			<?=$form->error($model,'description'); ?>
		</div>
	</div>
	<div class="form-group">
		<?=CHtml::label(Yii::t('app', 'Код'),'html', array('class' => 'col-md-3 control-label')); ?>
		<div class="col-md-9">
			<?=$form->textArea($model,'html',array('class' => 'form-control input-inline input-large', 'size'=>60, 'rows'=>5)); ?>
			<?=$form->error($model,'html'); ?>
		</div>
	</div>
	<div class="form-group">
		<?=CHtml::label(Yii::t('app', 'Позиция'),'position_alias', array('class' => 'col-md-3 control-label')); ?>
		<div class="col-md-9">
			<?= $form->dropDownList($model,'position_alias',
				array('POS_HEAD'   => $this->printData('position_alias', 'POS_HEAD'),
					  'POS_START'  => $this->printData('position_alias', 'POS_START'),
					  'POS_END'    => $this->printData('position_alias', 'POS_END'),
					  'POS_FOOTER' => $this->printData('position_alias', 'POS_FOOTER')
				), array('class' => 'form-control input-inline input-large')); ?>
			<?=$form->error($model,'position_alias'); ?>
		</div>
	</div>
	<div class="form-group">
		<?=CHtml::label(Yii::t('app', 'Активен'),'is_active', array('class' => 'col-md-3 control-label')); ?>
		<div class="col-md-9 mt10">
			<?= $form->checkBox($model,'is_active'); ?>
			<?=$form->error($model,'is_active'); ?>
		</div>
	</div>
</div><!-- form -->
<div class="form-actions">
	<?=CHtml::submitButton($model->isNewRecord ? Yii::t('app', 'Создать') : Yii::t('app', 'Сохранить'), array('class' => 'btn green')); ?>
	<?=CHtml::link(Yii::t('app', 'Вернуться назад'), $this->createUrl('index'), array('class' => 'btn grey'))?>
</div>
<?php $this->endWidget(); ?>