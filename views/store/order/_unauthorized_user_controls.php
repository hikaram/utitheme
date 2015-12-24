<?=CHtml::hiddenField('asseturl', Yii::app()->assetManager->getPublishedUrl(Yii::getPathOfAlias('store.css')), array('id' => 'asseturl'))?>
	
<div class="row">

	<?=$form->radioButton($horder, 'user_mode', array('class' => 'none', 'value' => Horders::USER_MODE_LOGIN, 'checked' => $horder->user_mode == Horders::USER_MODE_LOGIN))?>

	<div class="col-md-6 col-sm-6" id="auth">
		<h3><?=Yii::t('app', 'У меня есть логин')?></h3>
		<h3><?=Yii::t('app', 'Авторизация')?></h3>
		<p><?=Yii::t('app', 'Пожалуйста укажите свои данные для авторизации')?>:</p>
		
		<div class="form-group">
			<?=$form->labelEx($loginForm, 'username', array('id' => 'LoginForm_username_tooltip'))?>
			<?=$form->textField($loginForm, 'username', array('class' => 'form-control', 'value' => ''))?>
			<?=$form->error($loginForm, 'username')?>
		</div>
		<div class="form-group">
			<?=$form->labelEx($loginForm, 'password', array('id' => 'LoginForm_password_tooltip'))?>
			<?=$form->passwordField($loginForm, 'password', array('class' => 'form-control', 'value' => ''))?>
			<?=$form->error($loginForm, 'password')?>
		</div>
		<?=$form->checkBox($loginForm, 'rememberMe')?> <label><?=Yii::t('app', 'Запомнить меня')?></label>
		<div class="padding-top-20">                  
			<?=CHtml::submitButton(Yii::t('app', 'Войти'), array('name' => 'btn-auth', 'class' => 'btn btn-primary')) ?>
		</div>
	</div>
</div>

