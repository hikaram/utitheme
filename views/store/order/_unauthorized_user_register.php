<div class="order-register margin-top-10">
	<?=$form->radioButton($horder, 'user_mode', array('class' => 'none', 'value' => Horders::USER_MODE_REGISTER, 'checked' => $horder->user_mode == Horders::USER_MODE_REGISTER))?>

<? /* 	AlexXanDOR Учитывая корректировки в модуле AdminRegister перетащить все настройки из AdminRegister и Register (с учетом шагов и правил заполнения полей) в модуль Store 
		является довольно проблематичным и затратным по времени. В перспективе возможно будет реализовать.
		На текущий момент просто ссылка на страницу регистрации */ ?>	

		<? if (Yii::app()->user->checkAccess('RegisterRegisterIndex')) : ?>
			<?=CHtml::link(Yii::t('app', 'Перейти на страницу регистрации'), $this->createUrl('/register'), ['class' => 'btn btn-primary', 'style' => 'color: white;'])?>
		<? endif; ?>

<? /*


<? // --- SPONSOR BLOCK --- ?>
<h4 class="margin-bottom-15"><?=Yii::t('app', 'Данные спонсора');?></h4>

<? if(in_array('sponsor__id', $list)): ?>
	<? if ($user != NULL) : ?>
		<div class="row form-group">
			<div class="col-sm-6 col-md-6">
				<?=$form->labelEx($limitedRegistrationForm,'sponsor__id')?>
				<?=$user->username?>
				<? if($form->error($limitedRegistrationForm,'sponsor__id')) { ?>
					<div class="help-block"><span class="text-danger"><?=$form->error($limitedRegistrationForm,'sponsor__id')?></span></div>
				<? } ?>
			</div>
			<div class="col-sm-6 col-md-6">
				
			</div>
		</div>
		<div class="row form-group">
			<div class="col-sm-6 col-md-6">
				<label><?=Yii::t('app', 'Имя лично-пригласившего');?></label>
				<?=$user->profile->lang->first_name?>
			</div>
			<div class="col-sm-6 col-md-6">
				<label><?=Yii::t('app', 'Фамилия лично-пригласившего');?></label>
				<?=$user->profile->lang->second_name?>
			</div>
		</div>
	<? else : ?>
		<div class="row form-group">
			<div class="col-sm-6 col-md-6">
				<div class="form-caption"><?=$form->labelEx($limitedRegistrationForm,'sponsor__id')?></div>
				<?=CHtml::textField('sponsor_login', '', array('id' => 'sponsor_login', 'size'=>60,'maxlength'=>100, 'class' => 'form-control'))?>
				<?=$form->hiddenField($limitedRegistrationForm,'sponsor__id',array('size'=>60,'maxlength'=>100));?>
				<div class="help-block">
					<span class="text-danger">
						<input id="sponsor__error" type="text" style="display:none;" readonly="readonly" class="form-control" />
					</span>
				</div>
			
			</div>
			<div class="col-sm-6 col-md-6">
				
			</div>
		</div>
		<div class="row form-group">
			<div class="col-sm-6 col-md-6">
				<label><?=Yii::t('app', 'Имя лично-пригласившего');?></label>
				<div>
					<input id="sponsor_first_name" type="text" style="display:none;" readonly="readonly" class="form-control" />
				</div>
			</div>
			<div class="col-sm-6 col-md-6">
				<label><?=Yii::t('app', 'Фамилия лично-пригласившего');?></label>
				<div id="sponsor_last_name">
					<input id="sponsor_last_name" type="text" style="display:none;" readonly="readonly" class="form-control" />
				</div>
			</div>
		</div>
	<? endif; ?>
<? endif; ?>

<hr/>
	
<h4 class="margin-bottom-15"><?=Yii::t('app', 'Личные данные');?></h4>
		
<div class="row form-group">
	<div class="col-sm-6 col-md-6">
	<? if(in_array('username', $list)): ?>
		<?=$form->labelEx($limitedRegistrationForm,'username')?>
		<?=$form->textField($limitedRegistrationForm,'username',array('size'=>60,'maxlength'=>100, 'class' => 'form-control'))?>
		<? if($form->error($limitedRegistrationForm,'username')) { ?>
			<div class="help-block"><span class="text-danger"><?=$form->error($limitedRegistrationForm,'username')?></span></div>
		<? } ?>
	<? endif; ?>
	</div>
	<div class="col-sm-6 col-md-6">
	<? if(in_array('email', $list)): ?>
		<?=$form->labelEx($limitedRegistrationForm,'email')?>
		<?=$form->textField($limitedRegistrationForm,'email',array('size'=>60,'maxlength'=>100, 'class' => 'form-control'))?>
		<? if($form->error($limitedRegistrationForm,'email')) { ?>
			<div class="help-block"><span class="text-danger"><?=$form->error($limitedRegistrationForm,'email')?></span></div>
		<? } ?>
	<? endif; ?>
	</div>
</div>

<div class="row form-group">
	<div class="col-sm-6 col-md-6">
	<? if(in_array('phone', $list)): ?>
		<?=$form->labelEx($limitedRegistrationForm,'phone')?>
		<?=$form->textField($limitedRegistrationForm,'phone',array('size'=>60,'maxlength'=>100, 'class' => 'form-control'))?>
		<? if($form->error($limitedRegistrationForm,'phone')) { ?>
			<div class="help-block"><span class="text-danger"><?=$form->error($limitedRegistrationForm,'phone')?></span></div>
		<? } ?>
	<? endif; ?>
	</div>
	<div class="col-sm-6 col-md-6">
	<? if(in_array('skype', $list)): ?>
		<?=$form->labelEx($limitedRegistrationForm,'skype')?>
		<?=$form->textField($limitedRegistrationForm,'skype',array('size'=>60,'maxlength'=>100, 'class' => 'form-control'))?>
		<? if($form->error($limitedRegistrationForm,'skype')) { ?>
			<div class="help-block"><span class="text-danger"><?=$form->error($limitedRegistrationForm,'skype')?></span></div>
		<? } ?>
	<? endif; ?>
	</div>
</div>

<div class="row form-group">
	<div class="col-sm-6 col-md-6">
	<? if(in_array('first_name', $list)): ?>
		<?=$form->labelEx($limitedRegistrationForm,'first_name')?>
		<?=$form->textField($limitedRegistrationForm,'first_name',array('size'=>60,'maxlength'=>255, 'class' => 'form-control'))?>
		<? if($form->error($limitedRegistrationForm,'first_name')) { ?>
			<div class="help-block"><span class="text-danger"><?=$form->error($limitedRegistrationForm,'first_name')?></span></div>
		<? } ?>
	<? endif; ?>
	</div>
	<div class="col-sm-6 col-md-6">
	<? if(in_array('last_name', $list)): ?>
		<?=$form->labelEx($limitedRegistrationForm,'last_name')?>
		<?=$form->textField($limitedRegistrationForm,'last_name',array('size'=>60,'maxlength'=>255, 'class' => 'form-control'))?>
		<? if($form->error($limitedRegistrationForm,'last_name')) { ?>
			<div class="help-block"><span class="text-danger"><?=$form->error($limitedRegistrationForm,'last_name')?></span></div>
		<? } ?>
	<? endif; ?>
	</div>
</div>

<div class="row form-group">
	<div class="col-sm-6 col-md-6">
	<? if(in_array('second_name', $list)): ?>
		<?=$form->labelEx($limitedRegistrationForm,'second_name')?>
		<?=$form->textField($limitedRegistrationForm,'second_name',array('size'=>60,'maxlength'=>255, 'class' => 'form-control'))?>
		<? if($form->error($limitedRegistrationForm,'second_name')) { ?>
			<div class="help-block"><span class="text-danger"><?=$form->error($limitedRegistrationForm,'second_name')?></span></div>
		<? } ?>
	<? endif; ?>
	</div>
	<div class="col-sm-6 col-md-6">
	<? if(in_array('sex', $list)): ?>
		<?=$form->labelEx($limitedRegistrationForm,'sex')?>
		<?=$form->ListBox($limitedRegistrationForm,'sex', array(Profile::SEX_MALE => 'Муж', Profile::SEX_FEMALE => 'Жен'), array('class' => 'form-control', 'size' => 0)); ?>
		<? if($form->error($limitedRegistrationForm,'sex')) { ?>
			<div class="help-block"><span class="text-danger"><?=$form->error($limitedRegistrationForm,'sex')?></span></div>
		<? } ?>
	<? endif; ?>
	</div>
</div>

<? $cities = $this->beginWidget('CitiesWidget', array()); ?>
<div class="row form-group">
	<div class="col-sm-6 col-md-6">
	<? if(in_array('birthday', $list)): ?>
		<?=$form->labelEx($limitedRegistrationForm,'birthday')?>
		<div class="input-group date date-picker" data-date-format="dd-mm-yyyy">
			<?php echo $form->textField($limitedRegistrationForm,'birthday', array('class'=>'form-control', 'readonly' => 'readonly', 'style' => 'background: #fff;'))?>
			<span class="input-group-btn">
				<button class="btn default" type="button">
					<i class="fa fa-calendar"></i>
				</button>
			</span>
		</div>
		<? if($form->error($limitedRegistrationForm,'birthday')) { ?>
			<div class="help-block"><span class="text-danger"><?=$form->error($limitedRegistrationForm,'birthday')?></span></div>
		<? } ?>
	<? endif; ?>
	</div>
	<div class="col-sm-6 col-md-6">
	<? if(in_array('country_name', $list)): ?>
		<?=$form->labelEx($limitedRegistrationForm,'country_name')?>
		<? $cities->countries($limitedRegistrationForm->country_name, 'OrderLimitedRegistrationForm_country_name', 'OrderLimitedRegistrationForm[country_name]'); ?>
		<? if($form->error($limitedRegistrationForm,'country_name')) { ?>
			<div class="help-block"><span class="text-danger"><?=$form->error($limitedRegistrationForm,'country_name')?></span></div>
		<? } ?>
	<? endif; ?>
	</div>
</div>
<div class="row form-group">
	<div class="col-sm-6 col-md-6">
	<? if(in_array('region_name', $list)): ?>
		<?=$form->labelEx($limitedRegistrationForm,'region_name')?>
		<? $cities->regions($limitedRegistrationForm->region_name, $limitedRegistrationForm->country_name, 'OrderLimitedRegistrationForm_region_name', 'OrderLimitedRegistrationForm[region_name]'); ?>
		<? if($form->error($limitedRegistrationForm,'region_name')) { ?>
			<div class="help-block"><span class="text-danger"><?=$form->error($limitedRegistrationForm,'region_name')?></span></div>
		<? } ?>
	<? endif; ?>
	</div>
	<div class="col-sm-6 col-md-6">
	<? if(in_array('city_name', $list)): ?>
		<?=$form->labelEx($limitedRegistrationForm,'city_name')?>
		<? $cities->cities($limitedRegistrationForm->city_name, $limitedRegistrationForm->region_name, 'OrderLimitedRegistrationForm_city_name', 'OrderLimitedRegistrationForm[city_name]'); ?>
		<? if($form->error($limitedRegistrationForm,'city_name')) { ?>
			<div class="help-block"><span class="text-danger"><?=$form->error($limitedRegistrationForm,'city_name')?></span></div>
		<? } ?>
	<? endif; ?>
	</div>
</div>
<? $this->endWidget(); ?>

<div class="row form-group">
	<div class="col-sm-6 col-md-6">
	<? if(in_array('zip_code', $list)): ?>
		<?=$form->labelEx($limitedRegistrationForm,'zip_code')?>
		<?=$form->textField($limitedRegistrationForm,'zip_code',array('size'=>60, 'class' => 'form-control'))?>
		<? if($form->error($limitedRegistrationForm,'zip_code')) { ?>
			<div class="help-block"><span class="text-danger"><?=$form->error($limitedRegistrationForm,'zip_code')?></span></div>
		<? } ?>
	<? endif; ?>
	</div>
	<div class="col-sm-6 col-md-6">
	<? if(in_array('address', $list)): ?>
		<?=$form->labelEx($limitedRegistrationForm,'address')?>
		<?=$form->textField($limitedRegistrationForm,'address',array('size'=>60,'maxlength'=> 500, 'class' => 'form-control'))?>
		<? if($form->error($limitedRegistrationForm,'address')) { ?>
			<div class="help-block"><span class="text-danger"><?=$form->error($limitedRegistrationForm,'address')?></span></div>
		<? } ?>
	<? endif; ?>
	</div>
</div>


<hr/>
	
<h4 class="margin-bottom-15"><?=Yii::t('app', 'Безопасность');?></h4>
	
<? if(in_array('password', $list)): ?>
	<div class="row form-group">
		<div class="col-sm-6 col-md-6">
			<?=$form->labelEx($limitedRegistrationForm,'password'); ?>
			<?=$form->passwordField($limitedRegistrationForm,'password',array('size'=>20,'maxlength'=>20, 'class' => 'form-control')); ?>
			<? if($form->error($limitedRegistrationForm,'password')) { ?>
				<div class="help-block"><span class="text-danger"><?=$form->error($limitedRegistrationForm,'password')?></span></div>
			<? } ?>
		</div>
		<div class="col-sm-6 col-md-6">
			<?=$form->labelEx($limitedRegistrationForm,'password_confirm')?>
			<?=$form->passwordField($limitedRegistrationForm,'password_confirm',array('size'=>20,'maxlength'=>20, 'class' => 'form-control')); ?>
			<? if($form->error($limitedRegistrationForm,'password_confirm')) { ?>
				<div class="help-block"><span class="text-danger"><?=$form->error($limitedRegistrationForm,'password_confirm')?></span></div>
			<? } ?>
		</div>
	</div>
<? endif; ?>
	
<? if(in_array('finpassword', $list)): ?>
	<div class="row form-group">
		<div class="col-sm-6 col-md-6">
			<?=$form->labelEx($limitedRegistrationForm,'finpassword'); ?>
			<?=$form->passwordField($limitedRegistrationForm,'finpassword',array('size'=>20,'maxlength'=>20, 'class' => 'form-control')); ?>
			<? if($form->error($limitedRegistrationForm,'finpassword')) { ?>
				<div class="help-block"><span class="text-danger"><?=$form->error($limitedRegistrationForm,'finpassword')?></span></div>
			<? } ?>
		</div>
		<div class="col-sm-6 col-md-6">
			<?=$form->labelEx($limitedRegistrationForm,'finpassword_confirm')?>
			<?=$form->passwordField($limitedRegistrationForm,'finpassword_confirm',array('size'=>20,'maxlength'=>20, 'class' => 'form-control')); ?>
			<? if($form->error($limitedRegistrationForm,'finpassword_confirm')) { ?>
				<div class="help-block"><span class="text-danger"><?=$form->error($limitedRegistrationForm,'finpassword_confirm')?></span></div>
			<? } ?>
		</div>
	</div>
<? endif; ?>

	<div class="row">
		<div class="col-sm-12 col-md-12">
			<?=$form->checkBox($limitedRegistrationForm,'form_agree',array('size'=>20,'maxlength'=>20, 'class' => '')); ?>
			&nbsp;<?=Yii::t('app', 'Я принимаю условия')?>&nbsp;<?=CHtml::link(Yii::t('app', 'соглашения'), $this->createUrl('/terms'), array('target' => '_blank'))?>&nbsp;<?=Yii::t('app', 'использования сайта')?>
			<? if($form->error($limitedRegistrationForm,'form_agree')) { ?>
				<div class="help-block"><span class="text-danger"><?=$form->error($limitedRegistrationForm,'form_agree')?></span></div>
			<? } ?>
		</div>
	</div>
        

<div class="padding-top-20">                  
			<?=CHtml::submitButton('Зарегистрироваться', array('name' => 'btn-register', 'class' => 'btn btn-primary')) ?>
		</div>

*/ ?>

</div>

