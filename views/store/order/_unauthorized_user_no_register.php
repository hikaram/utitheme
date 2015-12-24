<div class="order-no-register margin-top-10">
	<h4 class="margin-bottom-15"><?=Yii::t('app', 'Данные пользователя');?></h4>
	<?=$form->radioButton($horder, 'user_mode', array('class' => 'none', 'value' => Horders::USER_MODE_NO_REGISTER, 'checked' => $horder->user_mode == Horders::USER_MODE_NO_REGISTER))?>
	<div class="row form-group">
		<div class="col-sm-6 col-md-6">
			<?=$form->labelEx($hiddenRegistrationForm, 'last_name')?>
			<?=$form->textField($hiddenRegistrationForm, 'last_name', array('class' => 'form-control'))?>
			<? if($form->error($hiddenRegistrationForm, 'last_name')) { ?>
				<div class="help-block"><span class="text-danger"><?=$form->error($hiddenRegistrationForm, 'last_name')?></span></div>
			<? } ?>
		</div>
		<div class="col-sm-6 col-md-6">
			<?=$form->labelEx($hiddenRegistrationForm, 'first_name')?>
			<?=$form->textField($hiddenRegistrationForm, 'first_name', array('class' => 'form-control'))?>
			<? if($form->error($hiddenRegistrationForm, 'first_name')) { ?>
				<div class="help-block"><span class="text-danger"><?=$form->error($hiddenRegistrationForm, 'first_name')?></span></div>
			<? } ?>
		</div>
	</div>
	<div class="row form-group">
		<div class="col-sm-6 col-md-6">
			<?=$form->labelEx($hiddenRegistrationForm, 'second_name')?>
			<?=$form->textField($hiddenRegistrationForm, 'second_name', array('class' => 'form-control'))?>
			<? if($form->error($hiddenRegistrationForm, 'second_name')) { ?>
				<div class="help-block"><span class="text-danger"><?=$form->error($hiddenRegistrationForm, 'second_name')?></span></div>
			<? } ?>
		</div>
	</div>
	
	<hr/>
	
	<h4 class="margin-bottom-15"><?=Yii::t('app', 'Контакты');?></h4>
	
	<div class="row form-group">
		<div class="col-sm-6 col-md-6">
			<?=$form->labelEx($hiddenRegistrationForm, 'phone')?>
			<?=$form->textField($hiddenRegistrationForm, 'phone', array('class' => 'form-control'))?>
			<? if($form->error($hiddenRegistrationForm, 'phone')) { ?>
				<div class="help-block"><span class="text-danger"><?=$form->error($hiddenRegistrationForm, 'phone')?></span></div>
			<? } ?>
		</div>
		<div class="col-sm-6 col-md-6">
			<?=$form->labelEx($hiddenRegistrationForm, 'email')?>
			<?=$form->textField($hiddenRegistrationForm, 'email', array('class' => 'form-control'))?>
			<? if($form->error($hiddenRegistrationForm, 'email')) { ?>
				<div class="help-block"><span class="text-danger"><?=$form->error($hiddenRegistrationForm, 'email')?></span></div>
			<? } ?>
		</div>
	</div>
	
</div>