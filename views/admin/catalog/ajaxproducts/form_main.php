<?php
/**
 * @var CActiveForm $form
 */
$form=$this->beginWidget('CActiveForm', array(
    'id'=>'products_form_main',
    'enableAjaxValidation'=>false,
    'htmlOptions' => array(
        'enctype' => 'multipart/form-data'
    )
));
echo $form->hiddenField($model, 'id', array('name' => 'product_id'));
?>
<style>
.ui-widget-content
{
	background: none !important;
}
.error, .errorMessage
{
	color: #a94442;
}
.alert_success
{
	font-size: 14px;
	font-weight: 400;
}
</style>
<p class="note note-danger">
	<i class="fa fa-warning" style="margin-right: 10px;"></i> <?=Yii::t('app', 'Поля помеченные')?> <span class="required">*</span> <?=Yii::t('app', 'обязательны к заполнению.')?>
</p>
<div class="note note-danger error" style="display: none;">
	<?=$form->errorSummary(array($model, $model->currentLangModel))?>
</div>
<div class="note note-success" style="display: none;">
	<i class="fa fa-check" style="margin-right: 10px;"></i> <?=Yii::t('app', 'Продукт успешно сохранен')?><br>
	<p style="margin-left: 28px; margin-top: 7px;" id="flash-messages"></p>
</div>
	<div class="form-horizontal form-row-seperated">
		<div class="tab-pane active">

			<div class="form-group" style="margin-top: 20px;">
				<?=$form->labelEx($model->currentLangModel,'name', array('class' => 'col-md-2 control-label'))?>
				<div class="col-md-10">
					<?=$form->textField($model->currentLangModel,'name',array('size'=>60,'maxlength'=>255, 'class' => 'form-control'))?>
					<span class="help-block text-danger"><?=$form->error($model->currentLangModel, 'name')?></span>
				</div>
			</div>
			<div class="form-group" style="margin-top: 20px;">
				<?=$form->labelEx($model, 'article', array('class' => 'col-md-2 control-label'))?>
				<div class="col-md-10">
					<?=$form->textField($model, 'article',array('size'=>60,'maxlength'=>255, 'class' => 'form-control'))?>
					<span class="help-block text-danger"><?=$form->error($model, 'article')?></span>
				</div>
			</div>
			<div class="form-group" style="margin-top: 20px;">
				<?=$form->labelEx($model, 'status', array('class' => 'col-md-2 control-label'))?>
				<div class="col-md-10">
					<?=$form->dropDownList($model, 'status', Products::gridStatusItems(), array('class' => 'form-control'))?>
					<span class="help-block text-danger"><?=$form->error($model, 'status')?></span>
				</div>
			</div>
			<div class="form-group" style="margin-top: 20px;">
				<?=$form->labelEx($model, 'available', array('class' => 'col-md-2 control-label'))?>
				<div class="col-md-10">
					<?=$form->dropDownList($model, 'available', Products::gridAvailableItems(), array('class' => 'form-control'))?>
					<span class="help-block text-danger"><?=$form->error($model, 'available')?></span>
				</div>
			</div>
			<? if ($model->is_allowed_show_at_home) : ?>
				<div class="form-group" style="margin-top: 20px;">
					<?=$form->labelEx($model, 'show_at_home', array('class' => 'col-md-2 control-label'))?>
					<div class="col-md-10">
						<?=$form->checkBox($model, 'show_at_home', Products::gridStatusItems(), array('class' => 'form-control'))?>
						<span class="help-block text-danger"><?=$form->error($model, 'show_at_home')?></span>
					</div>
				</div>
			 <? endif; ?>
			 <div class="form-group" style="margin-top: 20px;">
				<?=$form->labelEx($model, 'currency__id', array('class' => 'col-md-2 control-label'))?>
				<div class="col-md-10">
					<?=CHtml::activeListBox($model, 'currency__id', $currenciesList, array('class' => 'form-control', 'size' => 0)); ?>
					<span class="help-block text-danger"><?=$form->error($model, 'currency__id')?></span>
				</div>
			</div>
			<div class="form-group" style="margin-top: 20px;">
				<?=$form->labelEx($model, 'price', array('class' => 'col-md-2 control-label'))?>
				<div class="col-md-10">
					<?=$form->textField($model,'price',array('size'=>10,'maxlength'=>10, 'class' => 'form-control', 'id' => 'price')); ?>
					<span class="help-block text-danger"><?=$form->error($model, 'price')?></span>
				</div>
			</div>
			<? if($points_view) : ?>
				<div class="form-group" style="margin-top: 20px;">
					<?=$form->labelEx($model, 'points', array('class' => 'col-md-2 control-label'))?>
					<div class="col-md-10">
						<?=$form->textField($model,'points',array('size'=>10,'maxlength'=>10, 'class' => 'form-control', 'id' => 'price')); ?>
						<span class="help-block text-danger"><?=$form->error($model, 'points')?></span>
					</div>
				</div>
			<? endif; ?>
			<div class="form-group" style="margin-top: 20px;">
				<div class='col-md-2 control-label'><?=$form->labelEx($model, 'catalogues')?>
				<span class="help-block help-italic">
					<?=Yii::t('app', 'Зажмите Ctrl для выбора нескольких каталогов')?>
				</span></div>
				<div class="col-md-10">
					 <?=CHtml::activeListBox($model, 'catalogues', $cataloguesOptions->list, array('options' => $cataloguesOptions->params, 'class' => 'form-control', 'style' => 'height: 170px;', 'multiple' => 'multiple'))?>
					<span class="help-block text-danger"><?=$form->error($model, 'catalogues')?></span>
				</div>
			</div>
			<div class="form-group" style="margin-top: 20px;">
				<?=$form->labelEx($model->currentLangModel, 'meta_description', array('class' => 'col-md-2 control-label'))?>
				<div class="col-md-10">
					<?=$form->textArea($model->currentLangModel,'meta_description',array('size'=>60,'maxlength'=>255, 'class' => 'form-control'))?>
					<span class="help-block text-danger"><?=$form->error($model->currentLangModel, 'meta_description')?></span>
				</div>
			</div>
			<div class="form-group" style="margin-top: 20px;">
				<?=$form->labelEx($model->currentLangModel, 'meta_keywords', array('class' => 'col-md-2 control-label'))?>
				<div class="col-md-10">
					<?=$form->textArea($model->currentLangModel,'meta_keywords',array('size'=>60,'maxlength'=>255, 'class' => 'form-control'))?>
					<span class="help-block text-danger"><?=$form->error($model->currentLangModel, 'meta_keywords')?></span>
				</div>
			</div>
			<div class="form-group" style="margin-top: 20px;">
				<?=$form->labelEx($model->currentLangModel, 'order_description', array('class' => 'col-md-2 control-label'))?>
				<div class="col-md-10">
					<?=$form->textArea($model->currentLangModel,'order_description',array('size'=>60,'maxlength'=>255, 'class' => 'form-control'))?>
					<span class="help-block text-danger"><?=$form->error($model->currentLangModel, 'order_description')?></span>
				</div>
			</div>
			
			<div class="form-group" style="margin-top: 20px;">
				<?=$form->labelEx($model->currentLangModel, 'brief_text', array('class' => 'col-md-2 control-label'))?>
				<div class="col-md-10">
					<?=$form->textArea($model->currentLangModel,'brief_text',array('size'=>60,'maxlength'=>255, 'class' => 'form-control'))?>
					<span class="help-block text-danger"><?=$form->error($model->currentLangModel, 'brief_text')?></span>
				</div>
			</div>
			<div class="form-group" style="margin-top: 20px;">
				<?=$form->labelEx($model->currentLangModel, 'description', array('class' => 'col-md-2 control-label'))?>
				<div class="col-md-10">
					<?=$form->textArea($model->currentLangModel,'description',array('size'=>60,'maxlength'=>255, 'class' => 'form-control'))?>
					<span class="help-block text-danger"><?=$form->error($model->currentLangModel, 'description')?></span>
				</div>
			</div>
			<div class="form-group" style="margin-top: 20px;">
				<?=$form->labelEx($model->currentLangModel, 'youtube_iframe', array('class' => 'col-md-2 control-label'))?>
				<div class="col-md-10">
					<?=$form->textArea($model->currentLangModel,'youtube_iframe',array('size'=>60,'maxlength'=>255, 'class' => 'form-control'))?>
					<span class="help-block text-danger"><?=$form->error($model->currentLangModel, 'youtube_iframe')?></span>
				</div>
			</div>
		</div>
		<div class="form-actions">
			<?=CHtml::submitButton($model->isNewRecord ? Yii::t('app', 'Создать') : Yii::t('app', 'Сохранить'), array('class' => 'btn green')); ?>
		</div>
</ul>
<?php $this->endWidget();?>

<script type="text/javascript">
    $(function(){
        $('#products_form_main').ajaxForm({
            cache: false,
            beforeSerialize: function(form, options){
                $.each(CKEDITOR.instances, function(key, value){
                    value.updateElement();
                });
            },
            beforeSubmit: ProductTabsForm.ajaxFormBeforeSubmit,
            success: ProductTabsForm.ajaxFormSuccess
        });
    });
</script>