    <?=CHtml::beginForm(null, 'post', array('enctype' => 'multipart/form-data')) ?>

<p class="note note-danger">
	<i class="fa fa-warning" style="margin-right: 10px;"></i> <?=Yii::t('app', 'Поля помеченные')?> <span class="required">*</span> <?=Yii::t('app', 'обязательны к заполнению.')?>
</p>


<div><?=CHtml::errorSummary(array($model_lang, $model), '', '', array('class' => 'note note-danger')); ?></div>
<div class="portlet green box">
	<div class="portlet-title">
		<div class="caption">
			<? if ((boolean)$model->isNewRecord == TRUE) : ?>
				<i class="glyphicon glyphicon-plus"></i> <?=Yii::t('app', 'Создание новой')?>
			<? else : ?>
				<i class="glyphicon glyphicon-pencil"></i> <?=Yii::t('app', 'Редактирование новости')?>
			<? endif;?> 
		</div>
	</div>
	<div class="portlet-body form form-horizontal">
		<div class="form-body">
			<div class="mt20"></div>
			<div class="form-group">
				<?=CHtml::activeLabelEx($model_lang,'reviews_sender',array('class'=>'col-md-3 control-label')); ?>
				<div class="col-md-9">
					<?=CHtml::activeTextField($model_lang, 'reviews_sender', array('class' => 'form-control')); ?>
					<?=CHtml::error($model_lang, 'reviews_sender', array('style' => 'color: red;'))?>
				</div>
			</div>
			<div class="form-group">
				<?=CHtml::activeLabelEx($model_lang,'address',array('class'=>'col-md-3 control-label')); ?>
				<div class="col-md-9">
					<?=CHtml::activeTextField($model_lang, 'address', array('class' => 'form-control')); ?>
					<?=CHtml::error($model_lang, 'address', array('style' => 'color: red;'))?>
				</div>
			</div>
			<div class="form-group">
				<?=CHtml::activeLabelEx($model_lang,'brief_text',array('class'=>'col-md-3 control-label')); ?>
				<div class="col-md-9">
					<?=CHtml::activeTextArea($model_lang, 'brief_text', array('class' => 'form-control')); ?>
					<?=CHtml::error($model_lang, 'brief_text', array('style' => 'color: red;'))?>
				</div>
			</div>
			<div class="form-group">
				<?=CHtml::activeLabelEx($model_lang,'text',array('class'=>'col-md-3 control-label')); ?>
				<div class="col-md-9">
					<?=CkeditorHelper::init(array('name' => 'ReviewsLang[text]', 'type' => 'form-control input-large', 'ckfinder' => true, 'value' => $model_lang->text)) ?>
					<?=CHtml::error($model_lang, 'text', array('style' => 'color: red;'))?>
				</div>
			</div>
			<div class="form-group">
				<?=CHtml::activeLabelEx($model,'sort_no',array('class'=>'col-md-3 control-label')); ?>
				<div class="col-md-9">
					<?=CHtml::activeListBox($model, 'sort_no', $list, array('size' => 0, 'class' => 'form-control input-large'))?>
				</div>
			</div>
			<div class="form-group">
				<?=CHtml::activeLabelEx($model,'sort_no',array('class'=>'col-md-3 control-label')); ?>
				<div class="col-md-9">
					<?=CHtml::activeDropDownList($model, 'is_active', array('0' => Yii::t('app', 'Не активен'), '1' => Yii::t('app', 'Активен')),array('class'=>'form-control input-large'));?>
				</div>
			</div>
			<div class="form-group">
					<label class="col-md-3 control-label"><?=Yii::t('app', 'Изображение')?></label>
				<div class="col-md-9">
					<? if (!$model->isNewRecord) : ?>
							<div id="td_upload_photo">
								<? if (($model->attachment != NULL) && ($model->attachment->secret_name != null)) : ?><?=CHtml::image(MSmarty::attachment_get_file_name($model->attachment->secret_name, $model->attachment->raw_name, $model->attachment->file_ext, '_home_size_3', 'reviews_picture'), ''); ?>
								<? else : ?><?=Yii::t('app', 'Отсутствует')?>
								<? endif ; ?>
							</div>
							<?=CHtml::link(Yii::t('app', 'Изменить'), 'javascript:void(0)', array('id' => 'td_upload_link_change', 'style' => 'display: block;'))?>
							<? if (($model->attachment != NULL) && ($model->attachment->secret_name != null)) : ?>
								<? if (Yii::app()->user->checkAccess('AdminReviewsReviewsDeletepicture')) : ?>
									<?=CHtml::linkButton(Yii::t('app', 'Удалить'),array(
										'submit' => array('reviews/deletepicture', 'id' => $model->id),
										'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
										'confirm' => Yii::t('app', 'Удалить картинку?')));  ?>
								<? endif; ?>
							<? endif; ?>
							<div style="display: none;" id="td_upload_form_block">
								<?=CHtml::fileField('reviews', null, array('class' => 'normal'))?>
							</div>
							<?=CHtml::link(Yii::t('app', 'Отмена'), 'javascript:void(0)', array('id' => 'td_upload_link_cancel', 'style' => 'display: none;'))?>
						<? else : ?>
							<div style="display: block;" id="td_upload_form_block">
								<?=CHtml::fileField('reviews', null, array('class' => 'normal'))?>
							</div>
						<? endif; ?>        
				</div>
			</div>
		
				<? if ($reviewsSettings->is_allowed_show_at_home) : ?>
					<tr>
						<td width ="150"><?=CHtml::activeLabelEx($model,'show_at_home'); ?></td>
						<td> <?=CHtml::activeCheckBox($model, 'show_at_home'); ?></td>
					</tr>
				<? endif; ?>  
				<? if ($reviewsSettings->is_allowed_show_at_office) : ?>
					<tr>
						<td width ="150"><?=CHtml::activeLabelEx($model,'show_at_office'); ?></td>
						<td> <?=CHtml::activeCheckBox($model, 'show_at_office'); ?></td>
					</tr>
				<? endif; ?>     
			
			
		</div>
	
		<div class="form-actions">
		<?=CHtml::submitButton($model->isNewRecord ? Yii::t('app', 'Сохранить') : Yii::t('app', 'Изменить'), array ('class' => 'btn green', 'name' => 'redirect')); ?>
		   
		<? if (Yii::app()->user->checkAccess('AdminReviewsReviewsIndex')) : ?>
			<?=CHtml::link(Yii::t('app', 'Отмена'), $this->createUrl('index'), array('class' => 'btn grey'))?>
		<? endif; ?>
		</div>
	</div>
<?=CHtml::endForm(); ?>
</div>