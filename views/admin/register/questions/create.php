<div class="portlet box green">
	<div class="portlet-title">
		<h3 class="caption">
			<? if ((boolean)$modelQuestion->isNewRecord == TRUE) : ?>
				<i class="glyphicon glyphicon-plus"></i> <?=Yii::t('app', 'Создание нового')?>
			<? else : ?>
				<i class="glyphicon glyphicon-pencil"></i> <?=Yii::t('app', 'Редактирование')?>
			<? endif;?> <?=Yii::t('app', 'контрольного вопроса')?>
		</h3>
	</div>
	<div class="portlet-body form form-horizontal">
		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'matrix-form',
			'enableAjaxValidation'=>false,
		)); ?>
			<div class="form-body">
				<?=$form->errorSummary(array($modelQuestion, $modelQuestionLang), '<div class="mb5">'.Yii::t('app', 'При добавлении были допущены следующие ошибки:') . '</div>', '', array('class' => 'note note-danger')); ?>
				<div class="form-group mt20">
					<?=$form->labelEx($modelQuestionLang, 'text', array('class' => 'col-md-4 control-label'))?>
					<div class="col-md-8">
						<?=$form->textField($modelQuestionLang, 'text', array('class' => 'form-control input-large'))?>
						<div class="help-block">
							<span class="text-danger"><?=$form->error($modelQuestionLang, 'text')?></span>
						</div>
					</div>
				</div>
				<div class="form-group">
					<?=$form->labelEx($modelQuestionLang, 'description', array('class' => 'col-md-4 control-label'))?>
					<div class="col-md-8">
						<?=$form->textArea($modelQuestionLang, 'description', array('class' => 'form-control input-large'))?>
						<div class="help-block">
							<span class="text-danger"><?=$form->error($modelQuestionLang, 'description')?></span>
						</div>
					</div>
				</div>
			</div>
			<div class="form-actions">
				<?=CHtml::submitButton($modelQuestion->isNewRecord ? Yii::t('app', 'Создать') : Yii::t('app', 'Сохранить'), array('name' => 'btn_save', 'class' => 'btn green')); ?>
				<?=CHtml::link(Yii::t('app', 'Отмена'), $this->createUrl('questions/index'), array('class' => 'btn red'))?>
			</div>
		<?php $this->endWidget(); ?>
	</div>
</div>



