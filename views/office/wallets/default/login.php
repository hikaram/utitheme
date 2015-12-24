<?php $this->layout = 'office'; ?>

<?php
$form = $this->beginWidget('CActiveForm', array(
	'id' => 'finpassword-form',
	'enableClientValidation' => true
		));
?>

	<!--<h3><?=Yii::t('app', 'Подтверждение финансового пароля') ?></h3>-->
	<div class="note note-info">
		<?= Yii::t('app', 'Для доступа к финансовой части проекта введите Ваш финансовый пароль') ?>
	</div>
	<div class="row">
		<?=CHtml::label(Yii::t('app', 'Финансовый пароль').':', '', array('class' => 'control-label mt10 ml15 mr30 pull-left', 'style' => 'margin: 10px 30px 0 15px;'));?>
		<div class="pull-left">
			<div class="input-group input-large">
				<?=$form->passwordField($model, 'finpassword', array('value' => '', 'class' => 'form-control')); ?>
				<span class="input-group-btn">
					<?=CHtml::submitButton(Yii::t('app', 'Войти'), array('class' => 'btn blue', 'name' => 'btn_login')); ?>
				</span>
			</div>
			<? if ($model->getError('finpassword') != '') : ?>
				<div class="help-block font-red"><?= $model->getError('finpassword') ?></div>
			<? endif; ?>
            <? if (Yii::app()->isModuleInstall('OfficeProfile', '1.0.2')) : ?>
                <?=CHtml::link(Yii::t('app', 'Восстановить финансовый пароль'), $this->createUrl('/office/profile/default/passrecoveranswer/type/fin'), array('style' => 'margin-left: 20px;'))?>
            <? endif; ?>
		</div>
	</div>
	
<?php $this->endWidget(); ?>