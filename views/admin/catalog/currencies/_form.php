<?php
/* @var $this CurrenciesController */
/* @var $model Currencies */
/* @var $lang CurrenciesLang */
/* @var $form CActiveForm */
?>

<style>

.error, .errorMessage
{
	color: #a94442;
}
.errorSummary p
{
	margin-left: 28px;
	margin-top: 6px;
}
</style>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'currencies-form',
	'enableAjaxValidation'=>false,
)); ?>
<div class="note note-danger error">
	<i class="fa fa-warning" style="margin-right: 10px;"></i> <?=Yii::t('app', 'Поля помеченные')?> <span class="required">*</span> <?=Yii::t('app', 'обязательны к заполнению.')?>
	<?=$form->errorSummary($model)?>
	<?=$form->errorSummary($lang, '')?>
</div>
<div class="portlet green box">
	<div class="portlet-title">
		<div class="caption">
		<? if ((boolean)$model->isNewRecord == TRUE) : ?>
				<i class="glyphicon glyphicon-plus"></i> <?=Yii::t('app', 'Создание новой')?>
			<? else : ?>
				<i class="glyphicon glyphicon-pencil"></i> <?=Yii::t('app', 'Редактирование')?>
			<? endif;?> <?=Yii::t('app', 'валюты')?>
		</div>
	</div>
	<div class="portlet-body form form-horizontal">
		<div class="form-body">
			<div class="form-group" style="margin-top: 20px;">
				<?=$form->labelEx($model, 'symbol', array('class' => 'col-md-3 control-label'))?>
				<div class="col-md-9">
					<?=$form->textField($model, 'symbol', array('class' => 'form-control input-inline input-large'))?>
					<span class="help-block text-danger"><?=$form->error($model, 'symbol')?></span>
				</div>
			</div>
			<div class="form-group" style="margin-top: 20px;">
				<?=$form->labelEx($lang, 'name', array('class' => 'col-md-3 control-label'))?>
				<div class="col-md-9">
					<?=$form->textField($lang, 'name', array('class' => 'form-control input-inline input-large'))?>
					<span class="help-block text-danger"><?=$form->error($lang, 'name')?></span>
				</div>
			</div>
	</div>
	<div class="form-actions">
			<?=CHtml::submitButton($model->isNewRecord ? Yii::t('app', 'Создать') : Yii::t('app', 'Сохранить'), array('class' => 'btn green')); ?>
	</div>
<?php $this->endWidget(); ?>

