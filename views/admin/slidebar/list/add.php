<div class="portlet green box">
	<div class="portlet-title">
		<div class="caption">
			<? if ((boolean)$model->isNewRecord == TRUE) : ?>
				<i class="glyphicon glyphicon-plus"></i> <?=Yii::t('app', 'Создание нового')?>
			<? else : ?>
				<i class="glyphicon glyphicon-pencil"></i> <?=Yii::t('app', 'Редактирование')?>
			<? endif;?> <?=Yii::t('app', 'фрейма')?>
		</div>
	</div>
	<div class="portlet-body form form-horizontal">
		<? if(CHtml::errorSummary(array($modelLang, $model)) != "") : ?>
		<div class="form-body">
			<div class="row">
				<div class="col-md-12">
					<div class="alert alert-danger"><?=CHtml::errorSummary(array($modelLang, $model)); ?></div>
				</div>
			</div>
		</div>
		<? endif; ?>
		<? $is_attached = false; ?>
		<? if ((Yii::app()->isModuleInstall('Attachment', '1.0.5')) && (Yii::app()->isPackageInstall('FileUpLoad')) && (!$model->isNewRecord)): ?>
		<div class="form-body">
			<? $is_attached = true; ?>
			<div class="form-group mt20">
				<?=CHtml::activeLabelEx($model, 'attachment__id', array('class' => 'col-md-3 control-label')); ?>
				<div class="col-md-9">
					<div id="show_picture">
						<div id="picture_inner" class="mb20">
							<? if (($model->attachment != NULL) && ($model->attachment->secret_name != null)) : ?>
								<?=CHtml::image(MSmarty::attachment_get_file_name($model->attachment->secret_name, $model->attachment->raw_name, $model->attachment->file_ext, '_thumb_list', 'slidebar'), '', array('style' => 'max-width: 50%; border: 1px solid #d8d8d8;')); ?>
							<? endif; ?>
						</div>
						<div id="widget_upload" style="display: none;">

							<?php $this->widget('FileUpLoad', array(  
								'action'				=>$this->createUrl('savePicture', array('id' => sha1($model->id))),
								'after_loading_js_code'	=>'img_load("' . sha1($model->id) . '");', 
								'accept' 				=> 'image/*'
								))->FileLoad(); 
							?>
							
						</div>
						<div id="link_edit" class="mb20">
							<? if (($model->attachment != NULL) && ($model->attachment->secret_name != null)) : ?>
								<?=Chtml::link(Yii::t('app', 'Изменить'), 'javascript: void(0)', array('onClick' => 'editPhoto()', 'class' => 'btn green'));?>&nbsp;&nbsp;
							<? else : ?>
								<?=Chtml::link(Yii::t('app', 'Загрузить'), 'javascript: void(0)', array('onClick' => 'editPhoto()', 'style' => 'margin-right: 220px; margin-top: 10px;'));?>
							<? endif; ?>                                
						</div>
						
						<!--<div id="link_hide" style="display: none;">
							<?=Chtml::link(Yii::t('app', 'Отмена'), 'javascript: void(0)', array('onClick' => 'hidePhoto()', 'class' => 'btn red'));?>                                
						</div>-->
					</div>
				</div>    
			</div>
		</div>				
		<? endif?> 
		<?=CHtml::beginForm(NULL, 'POST', array('enctype' => 'multipart/form-data')) ?>
		<div class="form-body">
			<? if ((Yii::app()->isModuleInstall('Attachment', '1.0.5')) && (!(bool)$is_attached)): ?>
                <div class="form-group">
                    <?=CHtml::activeLabelEx($model, 'attachment__id', array('class' => 'col-md-3 control-label')); ?></td>
                    <div class="col-md-9">
                        <div class="input-group choose-file input-large">
							<input type="text" class="form-control file-path" readonly />
							<?=CHtml::fileField('slidebar', null, array('class' => 'hidden', 'accept' => 'image/*'))?>
							<span class="input-group-btn">
								<span class="btn blue-chambray">Обзор</span>
							</span>
						</div>
						<p class="help-block small"><?=Yii::t('app', 'Рекомендуется загружать изображения с соотношением сторон 1.85 : 1')?></p>
                    </div>
                </div>        
            <? endif?>
			<div class="form-group">
				<?=CHtml::activeLabelEx($modelLang, 'text', array('class' => 'control-label col-md-3')); ?>
				<div class="col-md-9">
					<?=CHtml::activeTextArea($modelLang, 'text', array('class' => 'form-control input-large')); ?>
				</div>
			</div>
			<div class="form-group">
				<?=CHtml::activeLabelEx($model, 'link', array('class' => 'control-label col-md-3')); ?>
				<div class="col-md-9">
					<?=CHtml::activeTextField($model, 'link', array('class' => 'form-control input-large')); ?>
				</div>
			</div>
			<div class="form-group">
				<?=CHtml::activeLabelEx($model, 'padding_top', array('class' => 'control-label col-md-3')); ?>
				<div class="col-md-9">
					<?=CHtml::activeTextField($model, 'padding_top', array('class' => 'form-control input-large')); ?>
				</div>
			</div>
			<div class="form-group">
				<?=CHtml::activeLabelEx($model, 'padding_left', array('class' => 'control-label col-md-3')); ?>
				<div class="col-md-9">
					<?=CHtml::activeTextField($model, 'padding_left', array('class' => 'form-control input-large')); ?>
				</div>
			</div>
			<div class="form-group">
				<?=CHtml::activeLabelEx($model, 'width', array('class' => 'control-label col-md-3')); ?>
				<div class="col-md-9">
					<?=CHtml::activeTextField($model, 'width', array('class' => 'form-control input-large')); ?>
				</div>
			</div>
		</div>
		<div class="form-actions">
			<?=CHtml::submitButton($model->isNewRecord ? Yii::t('app', 'Сохранить') : Yii::t('app', 'Изменить'), array ('class' => 'btn green', 'name' => 'btn_send')); ?>
            <?=CHtml::link(Yii::t('app', 'Назад'), $this->createUrl('active'), array('class' => 'btn grey'))?>
		</div>
		<?=CHtml::endForm(); ?>
	</div>
</div>
<script>
	$('.choose-file .btn').click(function(){
		$(this).closest('.choose-file').find('input[type="file"]').click();
	})
	
	$('.choose-file input[type="file"]').change(function(){
		val = $(this).val().split("\\");
		$(this).closest('.choose-file').find('.file-path').val(val[val.length-1]);
	})
</script>