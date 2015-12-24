<style>
	.form-control.error{
		border-color: #a94442 !important;
	}
</style>
<div class="content-form-page">
	<div class="row">
		<div class="col-md-7 col-sm-7">
			<div><?=Yii::t('app', 'На Ваш Email будет отправлена инструкция по восстановлению пароля')?></div>
			<div class="pad-40"></div>
			<?=CHtml::beginForm('', 'post', array('class'=> 'form-horizontal form-without-legend', 'role'=> 'form'))?>
			<div class="form-group">
				<? if ($this->recoveryPassField == UsersRegisterSecurityParams::RECOVERY_PASS_FIELD_TYPE_LOGIN) : ?>
					<label class='col-lg-4 control-label'><?=Yii::t('app', 'Введите Ваш логин')?></label>
				<? else : ?>
					<?=Yii::t('app', 'Введите Ваш Email')?>:
				<? endif; ?>   
				<div class="col-lg-8">
					<?=CHtml::textField('login', $login, array('class' => (!empty($error)) ? 'form-control error' : 'form-control'));?>
					<div class="errorMessage"><?=CHtml::encode($error)?></div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-5 col-xs-6 padding-left-0 col-md-offset-4 ">
					<?=CHtml::submitButton(Yii::t('app', 'Далее'), array('class' => 'btn btn-primary', 'name' => 'btn-send'))?>
					&nbsp;&nbsp;&nbsp;<?=CHtml::button(Yii::t('app', 'Отмена'), array('class' => 'btn btn-primary', 'onClick' => 'location.href = "' . $this->createUrl('/site/login') . '"'))?>
				</div>
			</div>
			<?=CHtml::endForm()?>    
		</div>
<!-- col-md-7 col-sm-7 -->
	</div>
<!-- row -->
</div>
<!-- content-form-page -->