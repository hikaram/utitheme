<?php $this->layout = 'office'; ?>
<div class="portlet box yellow">
    <div class="portlet-title">
        <h3 class="caption">
            <i class="fa fa-key"></i>
			<?= Yii::t('app', 'Изменение финансового пароля') ?>
        </h3>
    </div>
    <div class="portlet-body form form-horizontal">
		<div class="form-body">
			<?= CHtml::beginForm() ?>
			<? if (in_array($this->editTypeFinpass, array(
			UsersRegisterSecurityParams::EDIT_TYPE_FINPASS_CONFIRM,
			UsersRegisterSecurityParams::EDIT_TYPE_FINPASS_FULL
			))) : ?>				
				<div class="form-group">
					<label class="col-md-3 control-label"><?= Yii::t('app', 'Введите Ваш текущий пароль') ?></label>
					<div class="col-md-3">
						<?= CHtml::activePasswordField($model, 'password', array('value' => '', 'class' => 'form-control')); ?>
						<?  if (($model->getError('password')) != NULL) : ?>
							<div class="help-block font-red"><?= CHtml::encode($model->getError('password')) ?></div>
						<? endif; ?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-3 control-label"><?= Yii::t('app', 'Введите Ваш текущий финансовый пароль') ?></label>
					<div class="col-md-3">
						<?= CHtml::activePasswordField($model, 'finpassword', array('value' => '', 'class' => 'form-control')); ?>
						<?  if (($model->getError('finpassword')) != NULL) : ?>
							<div class="help-block font-red"><?= CHtml::encode($model->getError('finpassword')) ?></div>
						<? endif; ?>
					</div>
				</div>
			<? endif; ?>
			
			<div class="form-group">
				<label class="col-md-3 control-label"><?= Yii::t('app', 'Введите Ваш новый финансовый пароль') ?></label>
				<div class="col-md-3">
					<?= CHtml::passwordField('newfinpassword', '', array('class' => (!empty($error)) ? 'form-control error' : 'form-control')); ?>
					<?  if (!empty($error)) : ?>
						<div class="help-block font-red"><?= CHtml::encode($error) ?></div>
					<? endif; ?>
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-md-3 control-label"><?= Yii::t('app', 'Введите Ваш новый финансовый пароль ещё раз') ?></label>
					<div class="col-md-3">
						<?= CHtml::passwordField('newfinpassword_confirm', '', array('class' => (($model->getError('finpassword_confirm')) != NULL) ? 'form-control error' : 'form-control')); ?>
						<?  if (($model->getError('finpassword_confirm')) != NULL) : ?>
							<div class="help-block font-red"><?= CHtml::encode($model->getError('finpassword_confirm')) ?></div>
						<? endif; ?>
					</div>
			</div>

			<? if ((in_array($this->editTypeFinpass, array(
			UsersRegisterSecurityParams::EDIT_TYPE_FINPASS_QUESTION,
			UsersRegisterSecurityParams::EDIT_TYPE_FINPASS_FULL
			))) && ($answer != NULL)) : ?>
			<div class="form-group">
				<label class="col-md-3 control-label"><?= CHtml::encode($answer->description) ?></label>
				<div class="col-md-3">
					<?= CHtml::activeTextField($answer, 'answer', array('value' => '', 'class' => ((bool)$errorAnswer) ? 'form-control error' : 'form-control')); ?>
					<?  if ((bool)$errorAnswer) : ?>
						<div class="help-block font-red"><?= CHtml::encode($errorAnswerText) ?></div>
					<? endif; ?>
				</div>
			</div>
			<? endif; ?>	
		</div>
		<div class="buttons form-actions" style="margin-top: 10px;">
			<?= CHtml::submitButton(Yii::t('app', 'Изменить'), array('class' => 'btn green', 'name' => 'btn_save')) ?>
			<?= CHtml::button(Yii::t('app', 'Отмена'), array('class' => 'btn', 'onClick' => 'location.href = "' . $this->createUrl('index') . '"')) ?>
		</div>
		<?= CHtml::endForm() ?>
	</div>
</div>