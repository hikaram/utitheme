<p class="note note-danger">
	<i class="fa fa-warning" style="margin-right: 10px;"></i> <?=Yii::t('app', 'Поля помеченные * обязательны к заполнению.')?>
</p>

<?=CHtml::beginForm(null, 'post', array('enctype' => 'multipart/form-data')) ?>
	<?=CHtml::hiddenField('changePicture', (int)FALSE, array('id' => 'changePicture')) ?>
    <?=CHtml::hiddenField('changePicture_nonactive', (int)FALSE, array('id' => 'changePicture_nonactive')) ?>
<div class="portlet green box">
	<div class="portlet-title">
		<div class="caption">
			<? if ((boolean)$model->isNewRecord == TRUE) : ?>
				<i class="glyphicon glyphicon-plus"></i> <?=Yii::t('app', 'Добавление')?>
			<? else : ?>
				<i class="glyphicon glyphicon-pencil"></i> <?=Yii::t('app', 'Редактирование')?>
			<? endif;?> <?=Yii::t('app', 'языка')?>
		</div>
	</div>
	<div class="portlet-body form form-horizontal">
		<div class="form-body">
			<? if ($model->isNewRecord) : ?>
				<div class="form-group mt20">
					<?=CHtml::activeLabelEx($model,'alias', array('class' => 'col-md-3 control-label')); ?>
					<div class="col-md-9">
						<?=CHtml::activeTextField($model,'alias', array('class' => 'form-control input-large')); ?>
						<? if(CHtml::error($model,'alias') != "") :?>
							<div class="help-block font-red"><?=CHtml::error($model,'alias')?></div>
						<? endif; ?>
					</div>
				</div>
			<? else : ?>
				<div class="form-group mt20">
					<div class="col-md-3 text-right"><?=CHtml::activeLabel($model,'alias'); ?></div>
					<div class="col-md-9"><?=CHtml::encode($model->alias); ?></div>
				</div>
			<? endif; ?>
			<div class="form-group">
				<?=CHtml::activeLabelEx($model_lang,'title', array('class' => 'control-label col-md-3')); ?>
				<div class="col-md-9">
					<?=CHtml::activeTextField($model_lang,'title', array('class' => 'form-control input-large')); ?>
					<? if(CHtml::error($model_lang,'title') != "") :?>
						<div class="help-block font-red"><?=CHtml::error($model_lang,'title')?></div>
					<? endif; ?>
				</div>
			</div>
			<div class="form-group">
				<?=CHtml::activeLabelEx($model,'attachment__id_active', array('class' => 'control-label col-md-3')); ?>
				<div class="col-md-9">
                    <? if (!$model->isNewRecord) : ?>
                        <div id="td_upload_photo" class="mb20">
                            <? if (($model->attachment_active != NULL) && ($model->attachment_active->secret_name != null)) : ?>
                                <?=CHtml::image(MSmarty::attachment_get_file_name($model->attachment_active->secret_name, $model->attachment_active->raw_name, $model->attachment_active->file_ext, '_index', 'langs_flag'), ''); ?>
                            <? else : ?>
                                <?=Yii::t('app', 'Отсутствует')?>
                            <? endif ; ?>
                        </div>
						<div style="display: none;" id="td_upload_form_block">
                            <div class="input-group input-large fileUpload mb10">
								<input type="text" class="form-control file-path" readonly />
								<span class="input-group-btn">
									<span class="btn blue-chambray"><?=Yii::t('app', 'Обзор')?></span>
								</span>
								<?=CHtml::fileField('langs', null, array('class' => 'hidden'))?>
							</div>
                        </div>
                        <?=CHtml::link(Yii::t('app', 'Изменить'), 'javascript:void(0)', array('id' => 'td_upload_link_change', 'class' => 'btn green'))?>
                        <? if (($model->attachment_active != NULL) && ($model->attachment_active->secret_name != null)) : ?>
                            <?=CHtml::linkButton(Yii::t('app', 'Удалить'),array(
                                'submit' => array('deletepicture', 'id' => $model->id),
                                'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
                                'confirm' => Yii::t('app', 'Удалить картинку?'),
								'class' => 'btn red'
							));  ?>
                        <? endif; ?>
                        <?=CHtml::link(Yii::t('app', 'Отмена'), 'javascript:void(0)', array('id' => 'td_upload_link_cancel', 'style' => 'display: none;', 'class' => 'btn grey'))?>
                    <? else : ?>
                        <div style="display: block;" id="td_upload_form_block">
							<div class="input-group input-large fileUpload">
								<input type="text" class="form-control file-path" readonly />
								<span class="input-group-btn">
									<span class="btn blue-chambray"><?=Yii::t('app', 'Обзор')?></span>
								</span>
								<?=CHtml::fileField('langs', null, array('class' => 'hidden'))?>
							</div>
                        </div>
                    <? endif; ?>
					<? if(CHtml::error($model,'attachment__id_active') != "") :?>
						<div class="help-block font-red"><?=CHtml::error($model,'attachment__id_active')?></div>
					<? endif; ?>
                </div>
            </div>
			<div class="form-group">
                <?=CHtml::activeLabelEx($model,'attachment__id_nonactive', array('class' => 'col-md-3 control-label')); ?>
                <div class="col-md-9">
                    <? if (!$model->isNewRecord) : ?>
                        <div id="td_upload_photo_nonactive" class="mb20">
                            <? if (($model->attachment_nonactive != NULL) && ($model->attachment_nonactive->secret_name != null)) : ?>
                                <?=CHtml::image(MSmarty::attachment_get_file_name($model->attachment_nonactive->secret_name, $model->attachment_nonactive->raw_name, $model->attachment_nonactive->file_ext, '_index', 'langs_flag'), ''); ?>
                            <? else : ?>
                                <?=Yii::t('app', 'Отсутствует')?>
                            <? endif ; ?>
                        </div>
						<div style="display: none;" id="td_upload_form_block_nonactive">
                            <div class="input-group input-large fileUpload mb10">
								<input type="text" class="form-control file-path" readonly />
								<span class="input-group-btn">
									<span class="btn blue-chambray"><?=Yii::t('app', 'Обзор')?></span>
								</span>
								<?=CHtml::fileField('langs_nonactive', null, array('class' => 'hidden'))?>
							</div>
                        </div>
                        <?=CHtml::link(Yii::t('app', 'Изменить'), 'javascript:void(0)', array('id' => 'td_upload_link_change_nonactive', 'class' => 'btn green'))?>
                        <? if (($model->attachment_nonactive != NULL) && ($model->attachment_nonactive->secret_name != null)) : ?>
                            <?=CHtml::linkButton(Yii::t('app', 'Удалить'),array(
                                'submit' => array('deletepicturenonactive', 'id' => $model->id),
                                'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
                                'confirm' => Yii::t('app', 'Удалить картинку?'),
								'class' => 'btn red'
							));  ?>
                        <? endif; ?>
                        <?=CHtml::link(Yii::t('app', 'Отмена'), 'javascript:void(0)', array('id' => 'td_upload_link_cancel_nonactive', 'style' => 'display: none;', 'class' => 'btn grey'))?>
                    <? else : ?>
                        <div style="display: block;" id="td_upload_form_block_nonactive">
							<div class="input-group input-large fileUpload">
								<input type="text" class="form-control file-path" readonly />
								<span class="input-group-btn">
									<span class="btn blue-chambray"><?=Yii::t('app', 'Обзор')?></span>
								</span>
								<?=CHtml::fileField('langs_nonactive', null, array('class' => 'hidden'))?>
							</div>
                        </div>
                    <? endif; ?>
					<? if(CHtml::error($model,'attachment__id_nonactive') != "") :?>
						<div class="help-block font-red"><?=CHtml::error($model,'attachment__id_nonactive')?></div>
					<? endif; ?>
                </div>
            </div>
		</div>
		<div class="form-actions">
			<?=CHtml::submitButton($model->isNewRecord ? Yii::t('app', 'Добавить') : Yii::t('app', 'Сохранить'), array ('class' => 'btn green', 'name' => 'btn_save')); ?>
        
			<? if (Yii::app()->user->checkAccess('AdminTranslateLangsIndex')) : ?>
				<?=CHtml::link(Yii::t('app', 'К списку языков'), $this->createUrl('index'), array('class' => 'btn grey'))?>
			<? endif; ?>
		</div>
	</div>
</div>
<?=CHtml::endForm(); ?>

<script>
	$('.fileUpload .btn').click(function(){
		$(this).closest('.fileUpload').find('input[type="file"]').click();
	})
	
	$('.fileUpload input[type="file"]').change(function(){
		val = $(this).val().split("\\");
		$(this).closest('.fileUpload').find('.file-path').val(val[val.length-1]);
	})
</script>