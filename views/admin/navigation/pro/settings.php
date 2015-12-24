<style>
	.form-group .checker {
		margin-top: 8px !important;
	}
</style>
<?
	$attachmentModule = 0;
	if (Yii::app()->isModuleInstall('Attachment', '1.1.1')) :
		$attachmentModule = 1;
	endif;
?>

<? if ($attachmentModule == 0) :?>
	<div class="note note-warning">
		<i class="fa fa-warning" style="margin-right: 10px;"></i>
		<?=Yii::t('app', 'Для возможности редактирования параметров изображения необходимо установить модуль Attachment версии 1.1.1 или выше')?>
	</div>
<? endif; ?>

<?=CHtml::beginForm(); ?>
<div class="portlet grey box">
	<div class="portlet-title">
		<h4 class="caption">
			<i class="fa fa-cogs"></i>
			<?=Yii::t('app', 'Настройки навигации')?>
		</h4>
	</div>
	<div class="portlet-body form form-horizontal">
		<div class="form-body">
			<div class="form-group" style="margin-top: 20px;">
				<div class="col-md-4 control-label" title="<?=$settings->getAttributeLabel('allowed_admin_fill_alias')?>" id="desc_<?=$settings->allowed_admin_fill_alias?>">
					<?=$settings->getAttributeLabel('allowed_admin_fill_alias')?>:
				</div>
				<div class="col-md-8" id="value_<?=$settings->allowed_admin_fill_alias?>">
					<?=CHtml::activeCheckBox($settings, 'allowed_admin_fill_alias', array('class' => 'checkBoxSettings', 'id' => 'allowed_admin_fill_alias'))?>
				</div>
			</div>
			<? if ($attachmentModule == 1) : ?>
				<div class="form-group">
					<div class="col-md-4 control-label" title="<?=$settings->getAttributeLabel('allowed_fill_picture')?>" id="desc_<?=$settings->allowed_fill_picture?>">
						<?=$settings->getAttributeLabel('allowed_fill_picture')?>:
					</div>
					<div class="col-md-8" id="value_<?=$settings->allowed_fill_picture?>">
						<?=CHtml::activeCheckBox($settings, 'allowed_fill_picture', array('class' => 'checkBoxSettings', 'id' => 'allowed_fill_picture'))?>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-4 control-label" title="<?=$settings->getAttributeLabel('allowed_admin_fill_picture')?>" id="desc_<?=$settings->allowed_admin_fill_picture?>">
						<?=$settings->getAttributeLabel('allowed_admin_fill_picture')?>:
					</div>
					<div class="col-md-8" id="value_<?=$settings->allowed_admin_fill_picture?>">
						<?=CHtml::activeCheckBox($settings, 'allowed_admin_fill_picture', array('class' => 'checkBoxSettings', 'id' => 'allowed_admin_fill_picture'))?>
					</div>
				</div>
			<? endif; ?>
		</div>
		<div class="form-actions">
			<?=CHtml::submitButton(Yii::t('app', 'Сохранить'), array ('class' => 'btn green', 'name' => 'btn_save')); ?>
			<?=CHtml::link(Yii::t('app', 'Отмена'), $this->createUrl('index'), array('class' => 'btn default'))?>
		</div>
	</div>
</div>

<?=CHtml::endForm(); ?>