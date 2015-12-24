<div class="portlet green box">
	<div class="portlet-title">
		<div class="caption">
			<?=Yii::t('app', 'Отзыв №')?> <?=$model->id?>
		</div>
	</div>
	<div class="portlet-body form form-horizontal">
		<div class="form-body">
			<div class="mt20"></div>
			<div class="form-group">
				<label class ="col-md-2 control-label"><?=Yii::t('app', 'От кого:')?></label>
				<div class="col-md-10" style="padding-top: 7px;">
					<label><?=CHtml::encode($model->lang->reviews_sender)?></label>
				</div>
			</div>
			<div class="form-group">
				<label class ="col-md-2 control-label"><?=Yii::t('app', 'Сокращенный текст:')?></label>
				<div class="col-md-10" style="padding-top: 7px;">
					<label><?=CHtml::encode($model->lang->brief_text)?></label>
				</div>
			</div>
			<div class="form-group">
				<label class ="col-md-2 control-label"><?=Yii::t('app', 'Текст:')?></label>
				<div class="col-md-10" style="padding-top: 7px;">
					<label><?=$model->lang->text?></label>
				</div>
			</div>
            <div class="form-group">
				<label class ="col-md-2 control-label"><?=Yii::t('app', 'Статус:')?></label>
				<div class="col-md-10" style="padding-top: 7px;">
					<label><?= (bool)$model->is_active ? Yii::t('app', 'Активен') : Yii::t('app', 'Не активен')?> ?></label>
				</div>
			</div>
			<div class="form-group">
				<label class ="col-md-2 control-label"><?=Yii::t('app', 'Изображение:')?></label>
				<div class="col-md-10" style="padding-top: 7px;">
					<label>
						<? if (($model->attachment != NULL) && ($model->attachment->secret_name != null)) :?>
							<?=CHtml::image(MSmarty::attachment_get_file_name($model->attachment->secret_name, $model->attachment->raw_name, $model->attachment->file_ext, '_home_size_1', 'reviews_picture'), ''); ?>
						<? else : ?>
							<p style="text-align: left">Отсутствует</p>
						<? endif; ?>  
					</label>
				</div>
			</div>
			 <? if ((bool)$reviewsSettings->is_allowed_show_at_home) : ?>
             <div class="form-group">
				<label class ="col-md-2 control-label"><?=Yii::t('app', 'Показывать на главной:')?></label>
				<div class="col-md-10" style="padding-top: 7px;">
					<label>
						<? if ($model->show_at_home) : ?><span title="<?=Yii::t('app', 'Да')?>" class="true">&nbsp;</span>
						<? else :?><span title="<?=Yii::t('app', 'Нет')?>" class="false">&nbsp;</span>
						<? endif; ?>
					</label>
				</div>
			</div> 
			<? endif; ?>
			<? if ((bool)$reviewsSettings->is_allowed_show_at_office) : ?>
			<div class="form-group">
				<label class ="col-md-2 control-label"><?=Yii::t('app', 'Показывать в кабинете:')?></label>
				<div class="col-md-10" style="padding-top: 7px;">
					<label>
						 <? if ($model->show_at_office) : ?><span title="<?=Yii::t('app', 'Да')?>" class="true">&nbsp;</span>
						<? else :?><span title="<?=Yii::t('app', 'Нет')?>" class="false">&nbsp;</span>
						<? endif; ?>
					</label>
				</div>
			</div>
			<?endif;?>
		</div>
		<div class="form-actions">
		<form action="<?=$this->createUrl('reviews/create/action/edit/id/' . $model->id)?>">
			<? if (Yii::app()->user->checkAccess('AdminReviewsReviewsEdit')) : ?>
				<input type="submit" value="<?=Yii::t('app', 'Редактировать отзыв')?>" class="btn green" />
			<? endif; ?>
			<? if (Yii::app()->user->checkAccess('AdminReviewsReviewsIndex')) : ?>
				<a class="btn grey" href="javascript:void(0)" onClick="window.location = '<?=$this->createUrl('index')?>'"><?=Yii::t('app', 'Назад')?></a>
			<? endif; ?>
		</form>
		</div>
	</div>
</div>