<style>
	.form-control.error{
		border-color: #a94442 !important;
	}
</style>
<p><?=Yii::t('app', 'Пожалуйста укажите свои данные для авторизации')?>:</p>
<div class="content-form-page">
	<div class="row">
		<div class="col-md-7 col-sm-7">
            <?
                Yii::import('application.modules.admin.modules.register.models.UsersRegisterConfig');
                $modelUsersRegisterConfig = UsersRegisterConfig::model()->find('name = "is_social_register"');
            ?>
            <? if (Yii::app()->isPackageInstall('EAuthExtension') && (bool)$modelUsersRegisterConfig->value) : ?>
            <h2>Через форму сайта:</h2>
            <? endif; ?>
			<div class="form">
				<?php $form=$this->beginWidget('CActiveForm', array(
					'id'=>'login-form',
					'htmlOptions' => array(
						'class' => 'form-horizontal form-without-legend',
						'role'=> 'form'
						),
					'enableClientValidation'=>false,
					'clientOptions'=>array(
						'validateOnSubmit'=>true,
						),
						)); ?>
						<div class="note">
							<?=Yii::t('app', 'Поля помеченные')?> <span class="required-asterisk">*</span> <?=Yii::t('app', 'обязательны к заполнению')?>
						</div>
						<div class="form-group">
							<?php echo $form->labelEx($model,'username', array('class'=>'col-lg-4 control-label')); ?>
							<div class="col-lg-8">
								<?php echo $form->textField($model,'username', array('class' => 'form-control', 'value' => (string)FALSE)); ?>
								<?php echo $form->error($model,'username'); ?>
							</div>
						</div>

						<div class="form-group">
							<?php echo $form->labelEx($model,'password', array('class'=>'col-lg-4 control-label')); ?>
							<div class="col-lg-8">
								<?php echo $form->passwordField($model,'password', array('class' => 'form-control', 'value' => (string)FALSE)); ?>
								<?php echo $form->error($model,'password'); ?>
							</div>
						</div>

						<? if ((Yii::app()->params['authCaptcha'] != NULL) && ((bool)Yii::app()->params['authCaptcha'])): ?>  
						<div class="form-group">
							<?=$form->labelEx($model,'captcha', array('class'=>'col-lg-4 control-label')); ?><br />
							<div class="col-lg-8">
								<?php $this->widget('UTICaptcha', array('buttonLabel' => '<span class="refreshCaptcha"></span>', 'imageOptions' => array('style' => 'margin-bottom: -20px; margin-right: 10px; ')))?>
								<?=$form->textField($model, 'captcha', array('value' => '', 'class' => 'form-control margin-top-20 ')); ?>
								<div class="hint">
									<?=Yii::t('app', 'Пожалуйста, введите код с картинки')?>.<br/><?=Yii::t('app', 'Можно вводить без учета регистра')?>.
								</div>
								<?=$form->error($model,'captcha'); ?>
							</div>
						</div>

					<? endif; ?>	
                    <? if (Yii::app()->isModuleInstall('OfficeProfile')) : ?>
                        <div class="row">
                            <div class="col-lg-8 col-md-offset-4 padding-left-0">
                            <a href="<?=$this->createUrl('office/profile/default/passrecover')?>"><?php echo Yii::t('app', 'Забыли пароль?') ?></a>
                            </div>
                        </div>
                    <? endif; ?>
					<div class="row padding-top-20">
						<div class="col-lg-2 col-xs-3 padding-left-0 col-md-offset-4 ">
							<?php echo CHtml::submitButton(Yii::t('app', 'Войти'), array('class' => 'btn btn-primary')); ?>
						</div>
						<div class="col-lg-3 padding-left-0">
							<?php echo $form->checkBox($model,'rememberMe'); ?>
							<?php echo $form->label($model,'rememberMe'); ?>
							<?php echo $form->error($model,'rememberMe'); ?>
						</div>
					</div>

					<?php $this->endWidget(); ?>
				</div><!-- form -->
			</div><!-- form-wrapper -->
			
			<?php
				if (Yii::app()->user->hasFlash('error')) {
					echo '<div class="error">'.Yii::app()->user->getFlash('error').'</div>';
				}
			?>
            
            <? if (Yii::app()->isPackageInstall('EAuthExtension') && (bool)$modelUsersRegisterConfig->value) : ?>
            <div class="col-md-5 col-sm-5">
                <h2 style="padding-bottom: 25px;"><?=Yii::t('app', 'Через популярные сервисы')?>:</h2>
                <?php
                    $this->widget('ext.eauth.EAuthWidget', array('action' => 'social/login'));
                ?>
                
                <div class="col-md-4 col-sm-4 pull-right">
                    <? /*
                        <div class="form-info">
                            <h2><em>Важная</em> Информация</h2>
                            <p>Здесь может располагаться любая информация которая вам необходима</p>

                            <button type="button" class="btn btn-default">Больше информации</button>
                        </div>
                        */ ?>
                </div>
            </div>
            <? endif; ?>
		</div>
	</div>