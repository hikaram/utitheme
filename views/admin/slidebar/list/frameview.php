<div class="portlet box blue-steel">
	<div class="portlet-title">
		<h3 class="caption">
			<i class="glyphicon glyphicon-eye-open" style="margin-right: 10px;"></i> <?=Yii::t('app', 'Просмотр фрейма')?>
		</h3>
	</div>
	<div class="portlet-body form form-horizontal">
		<div class="form-body">
			<div class="row mt20 mb30">
				<div class="col-md-3 text-right">
					<h4 class="h4-label"><?=CHtml::encode(SlidebarFrames::model()->getAttributeLabel('attachment__id')); ?>:</h4>
				</div>
				<div class="col-md-9">
					<? if (($model->attachment != NULL) && ($model->attachment->secret_name != null)) :?>
						<?=CHtml::image(MSmarty::attachment_get_file_name($model->attachment->secret_name, $model->attachment->raw_name, $model->attachment->file_ext, '_carousel', 'slidebar'), '', array('style' => 'max-width: 50%; border: 1px solid #d8d8d8;')); ?>
					<? endif; ?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3 text-right">
					<h4 class="h4-label"><?=CHtml::encode(SlidebarFramesLang::model()->getAttributeLabel('text')); ?>:</h4>
				</div>
				<div class="col-md-9">
					<h4><?=CHtml::encode($model->id)?></h4>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3 text-right">
					<h4 class="h4-label"><?=CHtml::encode(SlidebarFrames::model()->getAttributeLabel('link')); ?>:</h4>
				</div>
				<div class="col-md-9">
					<h4><?=CHtml::encode($model->link)?></h4>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3 text-right">
					<h4 class="h4-label"><?=CHtml::encode(SlidebarFrames::model()->getAttributeLabel('padding_top')); ?>:</h4>
				</div>
				<div class="col-md-9">
					<h4><?=sprintf('%.0f', $model->padding_top)?></h4>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3 text-right">
					<h4 class="h4-label"><?=CHtml::encode(SlidebarFrames::model()->getAttributeLabel('padding_left')); ?>:</h4>
				</div>
				<div class="col-md-9">
					<h4><?=sprintf('%.0f', $model->padding_left)?></h4>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3 text-right">
					<h4 class="h4-label"><?=CHtml::encode(SlidebarFrames::model()->getAttributeLabel('width')); ?>:</h4>
				</div>
				<div class="col-md-9">
					<h4><?=sprintf('%.0f', $model->width)?></h4>
				</div>
			</div>
		</div>
		<div class="form-actions">
			<? if (Yii::app()->user->checkAccess('AdminSlidebarListFrameedit')) : ?>
				<?=CHtml::link(Yii::t('app', 'Редактировать'), $this->createUrl('frame', array('slide' => sha1($model->slidebars__id), 'action' => 'edit', 'id' => sha1($model->id))), array('class' => 'btn green'))?>
			<? endif; ?>
			<? if (Yii::app()->user->checkAccess('AdminSlidebarListIndex')) : ?>
				<?=CHtml::link(Yii::t('app', 'Назад'), $this->createUrl('active'), array('class' => 'btn grey'))?>
			<? endif; ?>
		</div>
	</div>
</div>