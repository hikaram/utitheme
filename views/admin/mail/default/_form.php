<?php
/* @var $this MailLettersController */
/* @var $model MailLetters */
/* @var $form CActiveForm */
?>

<style>
	#uniform-MailLetters_is_delivery {float:left;    padding-top: 4px;}
	.radio {padding-top:2px!important;}
</style>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'mail-letters-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>
<?php echo $form->hiddenField($model,'body',array('id'=>'bodyresult')); ?></td>

<div class="note note-info">
    <i class="fa fa-info" style="margin-right: 10px;"></i> <?=Yii::t('app', 'Поля помеченные')?> <span class="required">*</span> <?=Yii::t('app', 'обязательны к заполнению.')?>
</div>

<?=$form->errorSummary($model, '<div class="note note-danger"><i class="fa fa-warning" style="margin-right: 10px;"></i> ' . Yii::t('app', 'Необходимо исправить следующие ошибки') . ':', '</div>', ['style' => 'display: inline-table;'])?>

<div class="portlet green box">
	<div class="portlet-title">
		<div class="caption">
			<? if ((boolean)$model->isNewRecord == TRUE) : ?>
				<i class="glyphicon glyphicon-plus"></i> <?=Yii::t('app', 'Создание нового')?>
			<? else : ?>
				<i class="glyphicon glyphicon-pencil"></i> <?=Yii::t('app', 'Редактирование')?>
			<? endif;?> <?=Yii::t('app', 'письма')?>
		</div>
	</div>
	<div class="portlet-body form form-horizontal">
	<?php #echo $form->errorSummary($model); ?>
		<div class="form-body">
			<div class="form-group" style="margin-top: 20px;">
				<?=$form->labelEx($model,'from_name', array('class' => 'col-md-3 control-label')); ?>
				<div class="col-md-9">
					<?=$form->textField($model,'from_name',array('class' => 'form-control input-inline input-large', 'size'=>60,'maxlength'=>4000)); ?>
					<div class="help-block"><span class="text-danger"><?=$form->error($model, 'from_name')?></span></div>
				</div>
			</div>
			<div class="form-group" style="margin-top: 20px;">
				<?=$form->labelEx($model,'from', array('class' => 'col-md-3 control-label')); ?>
				<div class="col-md-9">
					<?=$form->textField($model,'from',array('class' => 'form-control input-inline input-large', 'size'=>60,'maxlength'=>4000)); ?>
					<div class="help-block"><span class="text-danger"><?=$form->error($model, 'from')?></span></div>
				</div>
			</div>
			<? if ($model->isNewRecord) : ?>
    			<div class="form-group">
                	<?=Chtml::label(Yii::t('app', 'Кому') . ' <span class="required">*</span>','', array('class' => 'col-md-3 control-label', 'style' => 'padding-top: 15px;')); ?>
                	<div class="col-md-9">
    		            <?=Chtml::radioButtonList('type', $type, array(
                            '0' => Yii::t('app', 'Всем пользователям'),
                            '1' => Yii::t('app', 'Определенным пользователям'))
                        ,array('style'=>'margin-left:-10px')); ?>
    	            	<div class="help-block"><span class="text-danger"></span></div>
    	            </div>
    	        </div>
		    <? endif; ?>
			<?= $model->isNewRecord ? '<div class="form-group" id="emailRow" style="display:none;">' : '<div class="form-group">' ?>
				<?=$form->labelEx($model,'to', array('class' => 'col-md-3 control-label')); ?>
				<div class="col-md-9">
					<?=$form->textField($model,'to',array('class' => 'form-control input-inline input-large', 'size'=>60,'maxlength'=>4000)); ?>
					<div class="help-block">
                        <span class="text-danger"><?=$form->error($model, 'to')?></span>
                        <?=Yii::t('app', 'Вы можете ввести несоклько Email-ов через запятую')?>
                    </div>
				</div>
			</div>
			<div class="form-group">
				<?=$form->labelEx($model,'subject', array('class' => 'col-md-3 control-label')); ?>
				<div class="col-md-9">
					<?=$form->textField($model,'subject',array('class' => 'form-control input-inline input-large', 'size'=>60,'maxlength'=>4000)); ?>
					<span class="help-block"><?=$form->error($model, 'subject')?></span>
				</div>
			</div>
			<div class="form-group">
				<?=$form->labelEx($model,'altbody', array('class' => 'col-md-3 control-label', 'style' => 'padding-top: 60px;')); ?>
				<div class="col-md-9">
					<?=$form->textArea($model,'altbody',array('class' => 'form-control input-inline input-large', 'rows'=>6, 'cols'=>50)); ?>
					<span class="help-block"><?=$form->error($model, 'altbody')?></span>
				</div>
			</div>
			<div class="form-group">
				<?=$form->labelEx($model,'body', array('class' => 'col-md-3 control-label', 'style' => 'padding-top: 350px;')); ?>
				<div class="col-md-9">
					<br/>
					<? if (Yii::app()->user->checkAccess('AdminContentContentsSwitchMode')) : ?>
						<?=CHtml::checkBox('useCkeditor', $useEditor, array('onChange' => 'showEditor()', 'id' => 'showEditorBox'))?>
						<?=Yii::t('app', 'Использовать визуальный редактор')?>
					<? endif; ?>
					<br/>
					<br/>
					<?=CkeditorHelper::init(array(
						'externalStyles' => array(
							Yii::app()->params['hostMetronikStatic'] . '/public/assets/global/plugins/font-awesome/css/font-awesome.min.css',
							Yii::app()->params['hostMetronikStatic'] . '/public/assets/global/plugins/bootstrap/css/bootstrap.min.css',
							Yii::app()->params['hostMetronikStatic'] . '/public/assets/frontend/layout/css/style.css'
							),
						'name' => 'area[textareackeditor]', 'type' => 'content', 'ckfinder' => true, 'value' => empty($model->body) ? '' : $model->body, 'width' => '90%')) ?>
					<?=CHtml::textArea('area[textareablock]', $model->body, array('class' => 'form-control', 'id' => 'textareablock', 'style' => 'width: 90%; display: none;'))?>
				</div>
			</div>
			<div class="form-group">
	            <div class="col-md-9" style="margin-left:25%;">
	            	<br/>
	                <?=$form->checkBox($model,'is_delivery'); ?>
	                <?=$form->labelEx($model,'is_delivery', array('class' => 'col-md-3 control-label', 'style' => 'text-align: inherit;padding-top:0px')); ?>
	                <span class="help-block"><?=$form->error($model, 'is_delivery')?></span>
	            </div>
	        </div>
			<? if (!$model->isNewRecord && !empty($attachments)) : ?>
	        <div class="form-group">
	            <div><?=CHtml::label(Yii::t('app', 'Прикрепленные файлы'),'',array('class' => 'col-md-3 control-label'));?></div>
	            <div class="col-md-9">
		            <?php foreach ($attachments as $attachment) : ?>
		                <div>
		                    <?=CHtml::encode($attachment->file_name); ?>
		                    <?=CHtml::link(Yii::t('app', 'Удалить'), 'javascript:void(0);', array('onClick' => "deleteFile(this, $attachment->id)"))?>
		                </div>
		                <?=Chtml::hiddenField("attachmentsForDel[$attachment->id]",'0'); ?>
		            <? endforeach; ?>
	            </div>
	        </div>
	        <? endif; ?>
	        <div class="form-group">
	            <?=Chtml::label('','', array('class' => 'col-md-3 control-label')); ?>
	            <div class="col-md-9">
	            	<?=CHtml::fileField('files[]',Yii::t('app', 'Выберите файл')); ?>
	            </div>
	        </div>
	        <div class="form-group">
	            <?=Chtml::label('','', array('class' => 'col-md-3 control-label')); ?>
	            <div class="col-md-9">
	            	<?=CHtml::link(Yii::t('app', 'Загрузить еще'), 'javascript:void(0);', array('id' => 'createFileUpload', 'onClick' => 'createFileUpload()'))?>
	            </div>
	        </div>
		</div>
		<div class="form-actions">
			<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('app', 'Создать') : Yii::t('app', 'Сохранить'), array('class' => 'btn green')); ?>
			<a href="<?=$this->createUrl('index')?>" class="btn default pull-right"><?=Yii::t('app', 'Вернуться к списку')?></a>
		</div>
	</div>
</div>	

<?php $this->endWidget(); ?>

</div><!-- form -->