<?php
/**
 * @var OrderController $this
 * @var Horders $horder
 * @var CActiveForm $form
 * @var OrderLimitedRegistrationForm $registrationForm
 */
$form=$this->beginWidget('CActiveForm', array(
	'enableAjaxValidation'=>false
));
?>

<?php $this->renderPartial('basket_products');?>

<?php if ($isGuest === TRUE): ?>
	<div class="authorization-choice">
		<p><?=$form->radioButton($horder, 'user_mode', array('value' => Horders::USER_MODE_LOGIN, 'unckeckValue' => 0))?><?=Yii::t('app', 'У меня есть логин')?></p>
		<?=$form->error($horder, 'user_mode')?>
	</div>

	<div class="authorization">
		<h2><?=Yii::t('app', 'Авторизация')?></h2>
		<p><?=Yii::t('app', 'Пожалуйста укажите свои данные для авторизации')?>:</p>
		<fieldset>
			<table class="authorization-table" border="0" cellspacing="10" cellpadding="0">
				<tr>
					<td>
						<div class="smart_input">
							<?=$form->labelEx($loginForm, 'username', array('style' => 'display: inline;', 'id' => 'LoginForm_username_tooltip'))?>
							<?=$form->textField($loginForm, 'username', array('class' => 'custom-input', 'onfocus' => 'hideTT(this);', 'onblur' => 'chkTT(this);'))?>

							<span class="login-icon">&nbsp;</span>
						</div>
					</td>
				</tr>
				<tr>
					<td><div class="smart_input">
							<?=$form->labelEx($loginForm, 'password', array('style' => 'display: inline;', 'id' => 'LoginForm_password_tooltip'))?>
							<?=$form->passwordField($loginForm, 'password', array('class' => 'custom-input', 'onfocus' => 'hideTT(this);', 'onblur' => 'chkTT(this);'))?>
							<span class="password-icon">&nbsp;</span>
						</div>
					</td>
				</tr>
			</table>
			<div class="authorization-checkbox">
				<label><?=$form->checkBox($loginForm, 'rememberMe')?><?=Yii::t('app', 'Запомнить меня')?></label>
			</div>
		</fieldset>
	</div><!-- .authorization -->

	<div class="order-register">

	</div>
	<div class="order-no-register">
		<?=$form->labelEx($registrationForm, 'last_name')?>
		<?=$form->textField($registrationForm, 'last_name')?>
		<?=$form->error($registrationForm, 'last_name')?>
		<br/>
		<?=$form->labelEx($registrationForm, 'first_name')?>
		<?=$form->textField($registrationForm, 'first_name')?>
		<?=$form->error($registrationForm, 'first_name')?>
		<br/>
		<?=$form->labelEx($registrationForm, 'second_name')?>
		<?=$form->textField($registrationForm, 'second_name')?>
		<?=$form->error($registrationForm, 'second_name')?>
		<br/>
		<?=$form->labelEx($registrationForm, 'phone')?>
		<?=$form->textField($registrationForm, 'phone')?>
		<?=$form->error($registrationForm, 'phone')?>
		<br/>
		<?=$form->labelEx($registrationForm, 'email')?>
		<?=$form->textField($registrationForm, 'email')?>
		<?=$form->error($registrationForm, 'email')?>
		<br/>
	</div>
<?php else: ?>
	<div class="user-info">
		<h2><?=Yii::t('app', 'Данные пользователя')?>:</h2>
		<table class="user-info-table">
			<tr>
				<td width="100"><?=Yii::t('app', 'Логин')?>: </td>
				<td><?=$horder->user->username?></td>
			</tr>
			<tr>
				<td><?=Yii::t('app', 'e-mail')?>: </td>
				<td><?=$horder->user->email?></td>
			</tr>
			<?php if (!empty($horder->user->profile_lang)): ?>
				<tr>
					<td><?=Yii::t('app', 'Фамилия')?>: </td>
					<td><?=$horder->user->profile_lang->last_name?></td>
				</tr>
				<tr>
					<td><?=Yii::t('app', 'Имя')?>: </td>
					<td><?=$horder->user->profile_lang->first_name?></td>
				</tr>
				<tr>
					<td><?=Yii::t('app', 'Отчество')?>: </td>
					<td><?=$horder->user->profile_lang->second_name?></td>
				</tr>
			<?php endif;?>
			<?php if (!empty($horder->user->profile)):?>
				<tr>
					<td><?=Yii::t('app', 'Телефон')?></td>
					<td><?=$horder->user->profile->phone?></td>
				</tr>
			<?php endif; ?>
		</table>
	</div><!-- .user-info -->
<?php endif; ?>

<div class="payment-methods">
	<h2><?=Yii::t('app', 'Способы оплаты')?>:</h2>
	<div class="payment-methods-inner">
		<div class="delivery-type-block">
			<?php foreach ($deliveryTypes as $deliveryType):?>
				<p><?=$form->radioButton($horder, 'store_delivery_types__id', array('uncheckValue' => null, 'value' => $deliveryType->id)).$deliveryType->name?></p>
			<?php endforeach;?>
			<?=$form->error($horder, 'store_delivery_types__id')?>
		</div>
		<div class="pad-40"></div>
		<hr />
		<div class="pad-40"></div>
		<div class="payment-methods-block">
			<?php foreach ($payTypes as $payType):?>
				<p><?=$form->radioButton($horder, 'store_pay_types__id', array('uncheckValue' => null, 'value' => $payType->id)).$payType->name?></p>
			<?php endforeach; ?>
			<?=$form->error($horder, 'store_pay_types__id')?>
			<?=Yii::t('app', 'Введите')?> <?=$form->labelEx($financeForm, 'finpassword')?>
			<?=$form->passwordField($financeForm, 'finpassword', array('class' => 'custom-input'))?>

			<?php foreach ($financeForm->getErrors() as $error): ?>
				<?=current($error);?><br/>
			<?php endforeach; ?>

			<div class="pad"></div>
		</div>
		<div class="pad-40"></div>
		<hr />
		<div class="pad-40"></div>
		<?=Yii::t('app', 'Дополнительная информация')?>:
		<?=$form->textArea($horder, 'commentary', array('class' => 'custom-textarea'))?>
		<div class="pad-40"></div>
		<?=CHtml::submitButton(Yii::t('app', 'Оплатить'), array('class' => 'btn200')); ?>
	</div>
</div><!-- .payment-methods -->


<?php $this->endWidget(); ?>