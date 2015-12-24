<div class="portlet box grey">
	<div class="portlet-title">
		<h3 class="caption"><i class="fa fa-lock mr10"></i> <?=Yii::t('app', 'Параметры безопасности')?></h3>
	</div>
	<div class="portlet-body form form-horizontal">
		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'matrix-form',
			'enableAjaxValidation'=>false,
		));?>
		<div class="form-body">
			<? if (Yii::app()->user->username == Yii::app()->params['superAdminInfo']['username']) : ?>
			<div class="form-group mt20">
				<div class="col-md-4 control-label no-padding-top"><?=$form->labelEx($modelSecurity, 'is_allowed_edit_username')?></div>
				<div class="col-md-8">
					<?=$form->checkBox($modelSecurity, 'is_allowed_edit_username', array('class' => 'max'))?>
					<div class="help-block"><?=$form->error($modelSecurity, 'is_allowed_edit_username')?></div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-4 control-label no-padding-top"><?=$form->labelEx($modelSecurity, 'is_allowed_edit_password')?></div>
				<div class="col-md-8">
					<?=$form->checkBox($modelSecurity, 'is_allowed_edit_password', array('class' => 'max'))?>
					<div class="help-block"><?=$form->error($modelSecurity, 'is_allowed_edit_password')?></div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-4 control-label no-padding-top"><?=$form->labelEx($modelSecurity, 'is_allowed_edit_finpassword')?></div>
				<div class="col-md-8">
					<?=$form->checkBox($modelSecurity, 'is_allowed_edit_finpassword', array('class' => 'max'))?>
					<div class="help-block"><?=$form->error($modelSecurity, 'is_allowed_edit_finpassword')?></div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-4 control-label no-padding-top"><?=$form->labelEx($modelSecurity, 'is_allowed_view_password')?></div>
				<div class="col-md-8">
					<?=$form->checkBox($modelSecurity, 'is_allowed_view_password', array('class' => 'max'))?>
					<div class="help-block"><?=$form->error($modelSecurity, 'is_allowed_view_password')?></div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-4 control-label no-padding-top"><?=$form->labelEx($modelSecurity, 'is_allowed_view_finpassword')?></div>
				<div class="col-md-8">
					<?=$form->checkBox($modelSecurity, 'is_allowed_view_finpassword', array('class' => 'max'))?>
					<div class="help-block"><?=$form->error($modelSecurity, 'is_allowed_view_finpassword')?></div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-4 control-label no-padding-top"><?=$form->labelEx($modelSecurity, 'is_allowed_change_sponsor')?></div>
				<div class="col-md-8">
					<?=$form->checkBox($modelSecurity, 'is_allowed_change_sponsor', array('class' => 'max'))?>
					<div class="help-block"><?=$form->error($modelSecurity, 'is_allowed_change_sponsor')?></div>
				</div>
			</div>            
			<? endif; ?>
			<div class="form-group">
				<div class="col-md-4 control-label"><?=$form->labelEx($modelSecurity, 'edit_type_email')?></div>
				<div class="col-md-8">
					<?=$form->listBox($modelSecurity, 'edit_type_email', UsersRegisterSecurityParams::getDatasetForEditTypeEmail(), array('class' => 'form-control input-large', 'size' => 1, 'style' => 'width: 800px !important'))?>
					<div class="help-block"><?=$form->error($modelSecurity, 'edit_type_email')?></div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-4 control-label"><?=$form->labelEx($modelSecurity, 'edit_type_password')?></div>
				<div class="col-md-8">
					<?=$form->listBox($modelSecurity, 'edit_type_password', UsersRegisterSecurityParams::getDatasetForEditTypePass(), array('class' => 'form-control input-large', 'size' => 1, 'style' => 'width: 800px !important'))?>
					<div class="help-block"><?=$form->error($modelSecurity, 'edit_type_password')?></div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-4 control-label"><?=$form->labelEx($modelSecurity, 'edit_type_finpassword')?></div>
				<div class="col-md-8">
					<?=$form->listBox($modelSecurity, 'edit_type_finpassword', UsersRegisterSecurityParams::getDatasetForEditTypeFinPass(), array('class' => 'form-control input-large', 'size' => 1, 'style' => 'width: 800px !important'))?>
					<div class="help-block"><?=$form->error($modelSecurity, 'edit_type_finpassword')?></div>
				</div>
			</div>
			<? if (count(UsersRegisterSecurityParams::getDatasetForEditTypePhone()) > 1) : ?>
			<div class="form-group">
				<div class="col-md-4 control-label"><?=$form->labelEx($modelSecurity, 'edit_type_phone')?></div>
				<div class="col-md-8">
					<?=$form->listBox($modelSecurity, 'edit_type_phone', UsersRegisterSecurityParams::getDatasetForEditTypePhone(), array('class' => 'form-control input-large', 'size' => 1, 'style' => 'width: 800px !important'))?>
					<div class="help-block"><?=$form->error($modelSecurity, 'edit_type_phone')?></div>
				</div>
			</div>
			<? endif; ?>
			<div class="form-group">
				<div class="col-md-4 control-label"><?=$form->labelEx($modelSecurity, 'recovery_password_field_type')?></div>
				<div class="col-md-8">
					<?=$form->listBox($modelSecurity, 'recovery_password_field_type', UsersRegisterSecurityParams::getDatasetForPassRecorevFieldType(), array('class' => 'form-control input-large', 'size' => 1, 'style' => 'width: 800px !important'))?>
					<div class="help-block"><?=$form->error($modelSecurity, 'recovery_password_field_type')?></div>
				</div>
			</div>
		</div>
		<div class="form-actions">
			<?=CHtml::submitButton($modelSecurity->isNewRecord ? Yii::t('app', 'Создать') : Yii::t('app', 'Сохранить'), array('name' => 'btn_save', 'class' => 'btn green')); ?>
			<?=CHtml::link(Yii::t('app', 'Отмена'), $this->createUrl('admin/index'), array('class' => 'btn red'))?>
		</div>
		<?php $this->endWidget(); ?>
	</div>
</div>