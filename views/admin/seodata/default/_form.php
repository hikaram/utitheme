<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'seodata-form',
	'enableAjaxValidation'=>false,
)); ?>
<p class="note note-danger">
	<i class="fa fa-warning" style="margin-right: 10px;"></i> <?=Yii::t('app', 'Поля помеченные')?> <span class="required">*</span> <?=Yii::t('app', 'обязательны к заполнению.')?>
</p>
<div class="portlet green box">
	<div class="portlet-title">
		<div class="caption">
			<? if ((boolean)$model->isNewRecord == TRUE) : ?>
				<i class="glyphicon glyphicon-plus"></i> <?=Yii::t('app', 'Создание нового')?>
			<? else : ?>
				<i class="glyphicon glyphicon-pencil"></i> <?=Yii::t('app', 'Редактирование')?>
			<? endif;?> <?=Yii::t('app', 'набора SEO данных')?>
		</div>
	</div>
    <div class="portlet-body form form-horizontal">
		<div class="form-body">
			<div class="mt20"></div>
            <div class="form-group">
				<?=$form->labelEx($model,'url', array('class' => 'col-md-3 control-label')); ?>
				<div class="col-md-9">
					<?=$form->textField($model,'url',array('class' => 'form-control input-inline input-xlarge', 'placeholder' => Yii::t('app', 'Введите url страницы в виде "/news/list"'), 'size'=>60,'maxlength'=>4000)); ?>
					<span class="help-block font-red"><?=$form->error($model, 'url')?></span>
				</div>
			</div>
            
            <div class="form-group">
				<?=CHtml::activeLabelEx($model_lang,'title',array('class'=>'col-md-3 control-label')); ?>
				<div class="col-md-9">
					
						<?php echo $form->textField($model_lang,'title', array('class' => 'form-control input-xlarge', 'placeholder' => Yii::t('app', 'Рекомендуется вводить не более 70 символов'))); ?>
					
					<span class="help-block font-red"><?=$form->error($model_lang, 'title')?></span>
				</div>
			</div>
            
            <div class="form-group">
				<?=CHtml::activeLabelEx($model_lang,'description',array('class'=>'col-md-3 control-label')); ?>
				<div class="col-md-9">
					<?=$form->textArea($model_lang,'description',array('class' => 'form-control input-inline input-xlarge', 'size'=>60,'maxlength'=>1000, 'rows'=>5, 'placeholder' => Yii::t('app', 'Рекомендуется вводить не более 160 символов'))); ?>
					
					<span class="help-block font-red"><?=$model_lang->getError('description');?></span>
				</div>
			</div>
            
            <div class="form-group">
				<?=CHtml::activeLabelEx($model_lang,'keywords',array('class'=>'col-md-3 control-label')); ?>
				<div class="col-md-9">
					<?=$form->textArea($model_lang,'keywords',array('class' => 'form-control input-inline input-xlarge', 'size'=>60,'maxlength'=>1000, 'rows'=>5, 'placeholder' => Yii::t('app', 'Рекомендуется вводить не более 160 символов'))); ?>
					
					<span class="help-block font-red"><?=$model_lang->getError('keywords');?></span>
				</div>
			</div>
            
         
            <div class="form-actions"> 
                 <?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('app', 'Создать') : Yii::t('app', 'Сохранить'), array ('class' => 'btn green')); ?> 
            </div>


<?php $this->endWidget(); ?>
             </div>
        </div>
</div><!-- portlet green box -->
