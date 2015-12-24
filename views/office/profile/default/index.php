<?php $this->layout = 'office'; ?>
<?= CHtml::hiddenField('asseturl', Yii::app()->assetManager->getPublishedUrl(Yii::getPathOfAlias('office.modules.profile.css')), array('id' => 'asseturl')) ?>
<style>
    .from_register input {width: 200px;}
    .from_register select {width: 200px;}
    .form td {padding: 2px; text-align: left; height: 33px;}
</style>
<script>
	$(function() {
		$('.l-show-finpass').on('click', function() {
			$(this).hide();
			$('.l-finpass').css('display', 'block');
            $('.l-hide-finpass').show();
            $('.l-real-finpass').hide();
			return false;
		});

		$('.l-show-pass').on('click', function() {
			$(this).hide();
			$('.l-pass').css('display', 'block');
            $('.l-hide-pass').show();
            $('.l-real-pass').hide();
			return false;
		});
        
        
        $('.l-hide-finpass').on('click', function() {
			$(this).hide();
			$('.l-finpass').hide();
            $('.l-show-finpass').show();
            $('.l-real-finpass').show();
			return false;
		});

		$('.l-hide-pass').on('click', function() {
			$(this).hide();
			$('.l-pass').hide();
            $('.l-show-pass').show();
            $('.l-real-pass').show();
			return false;
		});        
        
	});
</script>
<div class="portlet box yellow">
	<div class="portlet-title">
		<h3 class="caption">
			<i class="fa fa-user"></i>
			<?= Yii::t('app', 'Профиль') ?>
		</h3>
	</div>
	<div class="portlet-body">
		<div class="row profile">
			<div class="col-md-12">
				<!--BEGIN TABS-->
				<div class="tabbable tabbable-custom tabbable-full-width">
					<ul class="nav nav-tabs">
						<li>
							<a href="/office">
								<?= Yii::t('app', 'Кабинет') ?></a>
						</li>
						<li class="active">
							<a href="javascript: void(0)">
								<?= Yii::t('app', 'Профиль') ?> </a>
						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="tab_1_3">
							<div class="form form-horizontal">
								<h4><?= Yii::t('app', 'Общее') ?></h4>
								<hr>
								<div class="form-group" style="margin-top: 30px;">
									<div class="form-group" style="margin-top: 30px;">
										<label class="col-md-3 text-right"><?= $profile->getAttributeLabel('attachment__id') ?></label>
										<div class="col-md-9 text-light">
											<div id="show_picture">
												<div id="picture_inner">
													<? if (($profile->attachment != NULL) && ($profile->attachment->secret_name != null)) : ?>
													<?= CHtml::image(MSmarty::attachment_get_file_name($profile->attachment->secret_name, $profile->attachment->raw_name, $profile->attachment->file_ext, '_office_profile', 'office_photo'), '', array('align' => 'left', 'style' => 'margin:0 15px 0 0;')); ?>
													<? else : ?>
													<?= CHtml::image(Yii::app()->assetManager->getPublishedUrl(Yii::getPathOfAlias('office.modules.profile.css')) . '/img/o.jpg', 'nophoto', array('height' => '200px', 'width' => '200px')); ?>
													<? endif; ?>
												</div>
											</div>
										</div>
									</div>
								</div>
								<?php $form = $this->beginWidget('CActiveForm', array('id' => 'users-form', 'enableAjaxValidation' => false,)); ?>

								<? if(array_key_exists('sponsor__id', $list)): ?>
								<div class="form-group" style="margin-top: 30px;">
									<?= $form->label($profile, 'sponsor__id', array('class' => 'col-md-3 text-right')) ?>
									<div class="col-md-9 text-light">
										<? if ($profile->sponsor != NULL) : ?>
										<?= CHtml::encode($profile->sponsor->username) ?>		
										<? endif; ?>
									</div>
								</div>

								<? if(array_key_exists('last_name', $list)): ?>
								<div class="form-group" style="margin-top: 30px;">
									<label class="col-md-3 text-right"><?= Yii::t('app', 'Фамилия лично-пригласившего') ?></label>
									<div class="col-md-9">
										<? if (($profile->sponsor != NULL) && ($profile->sponsor->profile != NULL)) : ?>
										<?= CHtml::encode($profile->sponsor->profile->lang->last_name) ?>
										<? endif; ?>
									</div>
								</div>
								<? endif; ?>

								<? if(array_key_exists('first_name', $list)): ?>
								<div class="form-group" style="margin-top: 30px;">
									<label class="col-md-3 text-right"><?= Yii::t('app', 'Имя лично-пригласившего') ?></label>
									<div class="col-md-9 text-light">
										<? if (($profile->sponsor != NULL) && ($profile->sponsor->profile != NULL)) : ?>
										<?= CHtml::encode($profile->sponsor->profile->lang->first_name) ?>
										<? endif; ?>
									</div>
								</div>
								<? endif; ?>

								<? if(array_key_exists('second_name', $list)): ?>
								<div class="form-group" style="margin-top: 30px;">
									<label class="col-md-3 text-right"><?= Yii::t('app', 'Отчество лично-пригласившего') ?></label>
									<div class="col-md-9 text-light">
										<? if (($profile->sponsor != NULL) && ($profile->sponsor->profile != NULL)) : ?>
										<?= CHtml::encode($profile->sponsor->profile->lang->second_name) ?>
										<? endif; ?>
									</div>
								</div>
								<? endif; ?>


								<? endif?>    
								<h4><?= Yii::t('app', 'Данные профиля') ?></h4>
								<hr>
								<? if(array_key_exists('username', $list)): ?>
								<div class="form-group" style="margin-top: 30px;">
									<?= $form->label($model, 'username', array('class' => 'col-md-3 text-right')) ?>
									<div class="col-md-9 text-light">
										<?= CHtml::encode($model->username) ?>
									</div>
								</div>
								<? endif?>

								<? if(array_key_exists('email', $list)): ?>
								<div class="form-group" style="margin-top: 30px;">
									<?= $form->label($model, 'email', array('class' => 'col-md-3 text-right')) ?>
									<div class="col-md-4 text-light">
										<?= CHtml::encode($model->email); ?>
										<? if ((Yii::app()->user->checkAccess('OfficeProfileDefaultChangeemail')) && ($this->editTypeEmail != UsersRegisterSecurityParams::EDIT_TYPE_EMAIL_FIELD)) : ?>
                                            <a class="btn green-seagreen office-profile-edit" href="<?php echo $this->createUrl('changeemail'); ?>"><i class="glyphicon glyphicon-pencil"></i></a>
										<? endif; ?>
									</div>
								</div>
								<? endif; ?>

								<? if(array_key_exists('password', $list)): ?>
								<div class="form-group" style="margin-top: 30px;">
									<?= $form->label($model, 'password', array('class' => 'col-md-3 text-right')); ?>
									<div class="col-md-4 text-light">
                                        <? if ((Yii::app()->params['passwordHash'] == NULL) || (!(bool)Yii::app()->params['passwordHash'])) : ?>
                                            <span class="l-real-pass" style="display: block;"><? for ($i = 0; $i < strlen($model->password); $i++) : ?>*<? endfor; ?></span>
                                            <span class="l-pass" style="display: none;"><?= CHtml::encode($model->password) ?></span>
                                            <a class="l-show-pass" style="cursor: pointer;"><?php echo Yii::t('app', 'Показать'); ?></a>
                                            <a class="l-hide-pass" style="cursor: pointer; display: none;"><?php echo Yii::t('app', 'Скрыть'); ?></a>
                                        <? endif; ?>
										<? if ((Yii::app()->user->checkAccess('OfficeProfileDefaultChangepassword')) && ($this->editTypePass != UsersRegisterSecurityParams::EDIT_TYPE_PASS_FIELD)) : ?>
                                            <a class="btn green-seagreen office-profile-edit" href="<?php echo $this->createUrl('changepassword'); ?>"><i class="glyphicon glyphicon-pencil"></i></a>
										<? endif ?>
									</div>
								</div>

								<? endif?>      

								<? if(array_key_exists('finpassword', $list)): ?>
								<div class="form-group" style="margin-top: 30px;">
									<?= $form->label($model, 'finpassword', array('class' => 'col-md-3 text-right')); ?>
									<div class="col-md-4 text-light">
                                        <? if ((Yii::app()->params['passwordHash'] == NULL) || (!(bool)Yii::app()->params['passwordHash'])) : ?>
                                            <span class="l-real-finpass" style="display: block;"><? for ($i = 0; $i < strlen($model->finpassword); $i++) : ?>*<? endfor; ?></span>
                                            <span class="l-finpass" style="display: none;"><?= CHtml::encode($model->finpassword) ?></span>
                                            <a class="l-show-finpass" style="cursor: pointer;"><?php echo Yii::t('app', 'Показать'); ?></a>
                                            <a class="l-hide-finpass" style="cursor: pointer; display: none;"><?php echo Yii::t('app', 'Скрыть'); ?></a>
                                        <? endif; ?>
										<? if ((Yii::app()->user->checkAccess('OfficeProfileDefaultChangefinpassword')) && ($this->editTypeFinpass != UsersRegisterSecurityParams::EDIT_TYPE_FINPASS_FIELD)) : ?>
                                            <a class="btn green-seagreen office-profile-edit" href="<?php echo $this->createUrl('default/changepassword/type/fin'); ?>"><i class="glyphicon glyphicon-pencil"></i></a>
										<? endif ?>
									</div>
								</div>
								<? endif?>

								<? if(array_key_exists('phone', $list)): ?>
								<? if ($this->editTypePhone == UsersRegisterSecurityParams::EDIT_TYPE_PHONE_FIELD) : ?>
								<div class="form-group" style="margin-top: 30px;">
									<?= $form->label($profile, 'phone', array('class' => 'col-md-3 text-right')); ?>
									<div class="col-md-9 text-light">
										<?= CHtml::encode($profile->phone); ?>
									</div>
								</div>
								<? else : ?>
								<div class="form-group" style="margin-top: 30px;">
									<?= $form->label($profile, 'phone', array('class' => 'col-md-3 text-right')); ?>
									<div class="col-md-9 text-light">
										<?= CHtml::encode($profile->phone); ?>
										<a class="btn green-seagreen" href="<?php echo $this->createUrl('changephone'); ?>"><i class="glyphicon glyphicon-pencil"></i></a>
									</div>
								</div>
								<? endif; ?>
								<? endif; ?>

								<? if(array_key_exists('skype', $list)): ?>
								<div class="form-group" style="margin-top: 30px;">
									<?= $form->label($profile, 'skype', array('class' => 'col-md-3 text-right')); ?>
									<div class="col-md-9 text-light">
										<?= CHtml::encode($profile->skype); ?>
									</div>
								</div>
								<? endif?>      

								<? if(array_key_exists('birthday', $list)): ?>
								<div class="form-group" style="margin-top: 30px;">
									<?= $form->label($profile, 'birthday', array('class' => 'col-md-3 text-right')); ?>
									<div class="col-md-9 text-light">
										<?= MSmarty::date_format($profile->birthday, 'd.m.Y') ?>
									</div>
								</div>
								<? endif?>      

								<? if(array_key_exists('sex', $list)): ?>
								<div class="form-group" style="margin-top: 30px;">
									<?= $form->label($profile, 'sex', array('class' => 'col-md-3 text-right')); ?>
									<div class="col-md-9 text-light">
										<? if ($profile->sex == Profile::SEX_MALE) : ?><?= Yii::t('app', 'Муж') ?>
										<? elseif ($profile->sex == Profile::SEX_FEMALE) : ?><?= Yii::t('app', 'Жен') ?>
										<? endif; ?>
									</div>
								</div>
								<? endif?>
								<h4><?= Yii::t('app', 'Местонахождение') ?></h4>
								<hr>
								<?php $cities = $this->beginWidget('CitiesWidget', array()); ?>
								<? if(array_key_exists('country_name', $list)): ?>
								<div class="form-group" style="margin-top: 30px;">
									<?= $form->label($profilelang, 'country_name', array('class' => 'col-md-3 text-right')); ?>
									<div class="col-md-9 text-light">
                                        <? if (!empty($profilelang->country_name)) : ?>
                                            <?= CHtml::encode($profilelang->country_name) ?>
										<? else : ?>
                                            <?php $cities->get_country($profile->country__id); ?>
										<? endif; ?>
									</div>
								</div>
								<? endif?>

								<? if(array_key_exists('region_name', $list)): ?>
								<div class="form-group" style="margin-top: 30px;">
									<?= $form->label($profilelang, 'region_name', array('class' => 'col-md-3 text-right')); ?>
									<div class="col-md-9 text-light">
										<? if (!empty($profilelang->region_name)) : ?>
										<?= CHtml::encode($profilelang->region_name) ?>
										<? else : ?>
										<?php $cities->get_region($profile->region__id); ?>
										<? endif; ?>
									</div>
								</div>
								<? endif?>

								<? if(array_key_exists('city_name', $list)): ?>
								<div class="form-group" style="margin-top: 30px;">
									<?= $form->label($profilelang, 'city_name', array('class' => 'col-md-3 text-right')); ?>
									<div class="col-md-9 text-light">
										<? if (!empty($profilelang->city_name)) : ?>
										<?= CHtml::encode($profilelang->city_name) ?>
										<? else : ?>
										<?php $cities->get_city($profile->city__id); ?>
										<? endif; ?>
									</div>
								</div>
								<? endif?>
								<?php $this->endWidget(); ?>        

								<? if(array_key_exists('zip_code', $list)): ?>
								<div class="form-group" style="margin-top: 30px;">
									<?= $form->label($profile, 'zip_code', array('class' => 'col-md-3 text-right')); ?>
									<div class="col-md-9 text-light">
										<?= CHtml::encode($profile->zip_code); ?>
									</div>
								</div>
								<? endif?>      
                                
								<? if(array_key_exists('address', $list)): ?>
								<div class="form-group" style="margin-top: 30px;">
									<?= $form->label($profilelang, 'address', array('class' => 'col-md-3 text-right')); ?>
									<div class="col-md-9 text-light">
										<?= CHtml::encode($profilelang->address); ?>
									</div>
								</div>
								<? endif?>
                                
								<h4><?= Yii::t('app', 'Личные данные') ?></h4>
								<hr>
								<? if(array_key_exists('series_passport', $list)): ?>
								<div class="form-group" style="margin-top: 30px;">
									<?= $form->label($profile, 'series_passport', array('class' => 'col-md-3 text-right')); ?>
									<div class="col-md-9 text-light">
										<?= CHtml::encode($profile->series_passport); ?>
									</div>
								</div>
								<? endif?>   

								<? if(array_key_exists('last_name', $list)): ?>
								<div class="form-group" style="margin-top: 30px;">
									<?= $form->label($profilelang, 'last_name', array('class' => 'col-md-3 text-right')); ?>
									<div class="col-md-9 text-light">
										<?= CHtml::encode($profilelang->last_name); ?>
									</div>
								</div>
								<? endif?>         

								<? if(array_key_exists('first_name', $list)): ?>
								<div class="form-group" style="margin-top: 30px;">
									<?= $form->label($profilelang, 'first_name', array('class' => 'col-md-3 text-right')); ?>
									<div class="col-md-9 text-light">
										<?= CHtml::encode($profilelang->first_name); ?>
									</div>
								</div>
								<? endif?>      

								<? if(array_key_exists('second_name', $list)): ?>
								<div class="form-group" style="margin-top: 30px;">
									<?= $form->label($profilelang, 'second_name', array('class' => 'col-md-3 text-right')); ?>
									<div class="col-md-9 text-light">
										<?= CHtml::encode($profilelang->second_name); ?>
									</div>
								</div>
								<? endif?>      

								<?php $this->endWidget(); ?>

								<div class="buttons form-actions" style="margin-top: 10px;">
									<?= CHtml::beginForm($this->createUrl('edit')) ?>
									<? if ((Yii::app()->user->checkAccess('OfficeProfileDefaultEdit'))) : ?>
									<a class="btn green" href="/office/profile/default/edit"><?= Yii::t('app', 'Редактировать') ?></a>
									<? endif; ?>
									<?= CHtml::endForm() ?>
								</div>
							</div><!-- form -->
						</div>
					</div>
				</div>
				<!--END TABS-->
			</div>
		</div>
	</div>
</div>