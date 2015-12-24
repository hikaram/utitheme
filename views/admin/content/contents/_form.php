<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'contents-form',
	'enableAjaxValidation'=>false,
)); ?>

<?php echo $form->hiddenField($model_lang, 'lang', array('value'=>Yii::app()->language)); ?>
<?php echo $form->hiddenField($model_lang, 'text', array('id' => 'textarearesult')); ?>

<style>
	.error {color: #a94442;}
	.text-danger{color: #a94442 !important;}
</style>

<div class="note note-info">
	<i class="fa fa-info" style="margin-right: 10px;"></i> <?=Yii::t('app', 'Поля помеченные')?> <span class="required">*</span> <?=Yii::t('app', 'обязательны к заполнению.')?>
</div>

<?=$form->errorSummary([$model, $model_lang], '<div class="note note-danger"><i class="fa fa-warning" style="margin-right: 10px;"></i> ' . Yii::t('app', 'Необходимо исправить следующие ошибки') . ':', '</div>', ['style' => 'display: inline-table;'])?>

<div class="portlet green box">
	<div class="portlet-title">
		<h3 class="caption">
			<? if ((boolean)$model->isNewRecord == TRUE) : ?>
				<i class="glyphicon glyphicon-plus" style="margin-right: 10px;"></i> 
				<?=Yii::t('app', 'Создание нового')?>
			<? else : ?>
				<i class="glyphicon glyphicon-pencil" style="margin-right: 10px;"></i> 
				<?=Yii::t('app', 'Редактирование')?>
			<? endif;?> <?=Yii::t('app', 'текстового блока')?>
		</h3>
	</div>
	<div class="portlet-body form form-horizontal">
		
		<div class="form-body">
			<div class="form-group" style="margin-top: 30px;">
				<?php echo $form->labelEx($model,'name', array('class' => 'col-md-3 control-label')); ?>
				<div class="col-md-9">
					<?php echo $form->textField($model,'name',array('class' => 'form-control input-inline input-large', 'size'=>60,'maxlength'=>1000)); ?>
					<span class="help-block text-danger"><?=$form->error($model, 'name')?></span>
				</div>
			</div>
			<div class="form-group">
				<?php echo $form->labelEx($model_lang,'text', array('class' => 'col-md-3 control-label')); ?>
				<div class="col-md-9">
					<br/>
					<? if (Yii::app()->user->checkAccess('AdminContentContentsSwitchMode')) : ?>
						<?=CHtml::checkBox('useCkeditor', $useEditor, array('onChange' => 'showEditor()', 'id' => 'showEditorBox'))?>
						<?=Yii::t('app', 'Использовать визуальный редактор')?>
					<? endif; ?>
					<br/>
					<br/>
					<div class="ckeditor <? if($model_lang->hasErrors('text')) echo "error"; ?> ">
						<?=CkeditorHelper::init(array(
							'externalStyles' => array(
								Yii::app()->params['hostMetronikStatic'] . '/public/assets/global/plugins/font-awesome/css/font-awesome.min.css',
								Yii::app()->params['hostMetronikStatic'] . '/public/assets/global/plugins/bootstrap/css/bootstrap.min.css',
								Yii::app()->params['hostMetronikStatic'] . '/public/assets/frontend/layout/css/style.css'
								),
							'name' => 'area[textareackeditor]', 'type' => 'content', 'ckfinder' => true, 'value' => empty($model_lang->text) ? '' : $model_lang->text, 'width' => '90%')) ?>
						<?=CHtml::textArea('area[textareablock]', $model_lang->text, array('class' => $form->error($model_lang, 'text') != '' ? 'form-control error' : 'form-control', 'id' => 'textareablock', 'style' => 'width: 90%; display: none;'))?>
						<span class="help-block text-danger"><?=$form->error($model_lang, 'text')?></span>
					</div>
				</div>
			</div>
		</div>
		<div class="form-actions">
			<?php echo CHtml::Button($model->isNewRecord ? Yii::t('app', 'Создать') : Yii::t('app', 'Сохранить'), array ('class' => 'btn green', 'onClick' => 'submitForm()')); ?>
			<?php echo CHtml::Button(Yii::t('app', 'Отмена'), array ('class' => 'btn default', 'onClick' => 'window.location = app.createAbsoluteUrl("admin/content/contents")')); ?>
		</div>
	</div>
</div>

<?php $this->endWidget(); ?>