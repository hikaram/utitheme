
<?php $this->layout = 'office'; ?>
<?= CHtml::hiddenField('asseturl', Yii::app()->assetManager->getPublishedUrl(Yii::getPathOfAlias('office.modules.profile.css')), array('id' => 'asseturl')) ?>
<style>
    .from_register input {width: 200px;}
    .from_register select {width: 200px;}
    .form td {padding: 2px; text-align: left; height: 10px;}
</style>

<script>
// closeText: "Done", // Display text for close link
//         prevText: "Prev", // Display text for previous month link
//         nextText: "Next", // Display text for next month link
//         currentText: "Today", // Display text for current month link
//         monthNames: ["January","February","March","April","May","June",
//             "July","August","September","October","November","December"], // Names of months for drop-down and formatting
//         monthNamesShort: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"], // For formatting
//         dayNames: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"], // For formatting
//         dayNamesShort: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"], // For formatting
//         dayNamesMin: ["Su","Mo","Tu","We","Th","Fr","Sa"], // Column headings for days starting at Sunday
//         weekHeader: "Wk", // Column header for week of the year
//         dateFormat: "mm/dd/yy", // See format options on parseDate

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
			<?= Yii::t('app', 'Редактирование профиля') ?></a>
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

							<div class="portlet-body form form-horizontal">
							<div class="form-body">
								<h4><?= Yii::t('app', 'Общее') ?></h4>
								<hr>
								<div class="form-group" style="margin-top: 30px;">
									<label class="col-md-3 text-right control-label <? if ((array_key_exists('attachment__id', $list)) && ((bool)$list['attachment__id']->is_required)) : ?>required<? endif; ?>">
                                        <?= $profile->getAttributeLabel('attachment__id') ?>
                                        <? if ((array_key_exists('attachment__id', $list)) && ((bool)$list['attachment__id']->is_required)) : ?>
                                            <span class="required">*</span>
                                        <? endif; ?>                                        
                                    </label>
									<div class="col-md-9 text-light">

										<div id="show_picture">
											<div id="picture_inner">
												<? if (($profile->attachment != NULL) && ($profile->attachment->secret_name != null)) : ?>
												<?= CHtml::image(MSmarty::attachment_get_file_name($profile->attachment->secret_name, $profile->attachment->raw_name, $profile->attachment->file_ext, '_office_profile', 'office_photo'), '', array('style' => 'margin:0 15px 0 0;')); ?>
												<? else : ?>
												<?= CHtml::image(Yii::app()->assetManager->getPublishedUrl(Yii::getPathOfAlias('office.modules.profile.css')) . '/img/o.jpg', 'nophoto', array('height' => '200px', 'width' => '200px')); ?>
												<? endif; ?>
											</div>
											<div id="widget_upload" class="mt10" style="display: none; width: 100%;">

												<?php
												$this->widget('FileUpLoad', array('action' => $this->createUrl('savePicture'),
													'after_loading_js_code' => 'img_load();',
													'accept' => 'image/*'))->FileLoad();
												?>

											</div>

											<div id="link_edit" class="mt10">
                                                <?= Chtml::link(Yii::t('app', 'Изменить'), 'javascript: void(0)', array('onClick' => 'editPhoto()', 'class' => 'btn green')); ?>
                                                <?= Chtml::link(Yii::t('app', 'Удалить'), 'javascript: void(0)', array('onClick' => 'deletePhoto()', 'class' => 'btn red', 'id' => 'deletePictureLink')); ?>
											</div>

											                         
										</div>
									</div>
								</div>
                                
								<?php $form = $this->beginWidget('CActiveForm', array(
                                    'id' => 'users-form', 
                                    'enableAjaxValidation' => false, 
                                    'htmlOptions' => array(
                                        'class' => 'form-horizontal')
                                    )); ?>

                                    <?php $cities=$this->beginWidget('CitiesWidget', array()); ?>
                                
                                    <? foreach ($list as $fieldAlias => $value) : ?>

<? /* -----------------------------------   СПОНСОР ПОЛЬЗОВАТЕЛЯ   -------------------   */ ?>
                                        <? if ($fieldAlias == 'sponsor__id') : ?>
                
                                            <div class="form-group" style="margin-top: 30px;">
                                                <?= $form->labelEx($profile, 'sponsor__id', array('class' => 'col-md-3 text-right control-label')) ?>
                                                <div class="col-md-9 text-light">
                                                    <? if ($profile->sponsor != NULL) : ?>
                                                        <p class="form-control-static"><?= CHtml::encode($profile->sponsor->username) ?></p>     
                                                    <? endif; ?>
                                                </div>
                                            </div>

                                            <? if(array_key_exists('last_name', $list)): ?>
                                                <div class="form-group" style="margin-top: 30px;">
                                                    <label class="col-md-3 text-right control-label"><?= Yii::t('app', 'Фамилия лично-пригласившего') ?></label>
                                                    <div class="col-md-9">
                                                        <? if (($profile->sponsor != NULL) && ($profile->sponsor->profile != NULL)) : ?>
                                                            <p class="form-control-static"><?= CHtml::encode($profile->sponsor->profile->lang->last_name) ?></p>
                                                        <? endif; ?>
                                                    </div>
                                                </div>
                                            <? endif; ?>

                                            <? if(array_key_exists('first_name', $list)): ?>
                                                <div class="form-group" style="margin-top: 30px;">
                                                    <label class="col-md-3 text-right control-label"><?= Yii::t('app', 'Имя лично-пригласившего') ?></label>
                                                    <div class="col-md-9 text-light">
                                                        <? if (($profile->sponsor != NULL) && ($profile->sponsor->profile != NULL)) : ?>
                                                            <p class="form-control-static"><?= CHtml::encode($profile->sponsor->profile->lang->first_name) ?></p>
                                                        <? endif; ?>
                                                    </div>
                                                </div>      
                                            <? endif; ?>
                                            
                                            <? if(array_key_exists('second_name', $list)): ?>
                                                <div class="form-group" style="margin-top: 30px;">
                                                    <label class="col-md-3 text-right control-label"><?= Yii::t('app', 'Отчество лично-пригласившего') ?></label>
                                                    <div class="col-md-9 text-light">
                                                        <? if (($profile->sponsor != NULL) && ($profile->sponsor->profile != NULL)) : ?>
                                                            <p class="form-control-static"><?= CHtml::encode($profile->sponsor->profile->lang->second_name) ?></p>
                                                        <? endif; ?>
                                                    </div>
                                                </div>
                                            <? endif; ?>
                
<? /* -----------------------------------   ЛОГИН ПОЛЬЗОВАТЕЛЯ   -------------------   */ ?>        
                                        <? elseif ($fieldAlias == 'username') : ?>   

                                            <div class="form-group" style="margin-top: 30px;">
                                                <?= $form->labelEx($model, 'username', array('class' => 'col-md-3 text-right control-label')) ?>
                                                <div class="col-md-9 text-light">
                                                    <p class="form-control-static"><?= CHtml::encode($model->username) ?></p>
                                                </div>
                                            </div>                
                
<? /* -----------------------------------   EMAIL ПОЛЬЗОВАТЕЛЯ   -------------------   */ ?>        
                                        <? elseif ($fieldAlias == 'email') : ?>

                                            <div class="form-group" style="margin-top: 30px;">
                                                <?= $form->labelEx($model, 'email', array('class' => 'col-md-3 text-right control-label')) ?>
                                                <? if ($this->editTypeEmail == UsersRegisterSecurityParams::EDIT_TYPE_EMAIL_FIELD) : ?>
                                                    <div class="col-md-3">
                                                        <?= $form->textField($model, 'email', array('size' => 30, 'maxlength' => 30, 'class' => 'form-control')); ?>
                                                        <?= $form->error($model, 'email', array('class' => 'help-block font-red')); ?>
                                                    </div>
                                                <? else : ?>                     
                                                    <div class="col-md-4 text-light">
                                                        <p class="form-control-static"><?= CHtml::encode($model->email); ?></p>
                                                        <? if ((Yii::app()->user->checkAccess('OfficeProfileDefaultChangeemail'))) : ?>
                                                            <a class="btn green-seagreen office-profile-edit" href="<?php echo $this->createUrl('changeemail'); ?>"><i class="glyphicon glyphicon-pencil"></i></a>
                                                        <? endif; ?>
                                                    
                                                    </div>
                                                <? endif; ?>
                                            </div>                                        

<? /* -----------------------------------   ПАРОЛЬ ПОЛЬЗОВАТЕЛЯ   -------------------   */ ?>        
                                        <? elseif ($fieldAlias == 'password') : ?>

                                            <div class="form-group" style="margin-top: 30px;">
                                            
                                                <?= $form->labelEx($model, 'password', array('class' => 'col-md-3 text-right control-label')); ?>
                                                
                                                <? if ($this->editTypePass == UsersRegisterSecurityParams::EDIT_TYPE_PASS_FIELD) : ?>

                                                    <div class="col-md-6">
                                                    
                                                        <div id="password_static">
                                                        
                                                            <? if ((Yii::app()->params['passwordHash'] == NULL) || (!(bool)Yii::app()->params['passwordHash'])) : ?>
                                                                <span class="l-real-pass" style="display: block;"><? for ($i = 0; $i < strlen($model->password); $i++) : ?>*<? endfor; ?></span>
                                                                <span class="l-pass" style="display: none;"><?= CHtml::encode($model->password) ?></span>
                                                                <a class="l-show-pass" style="cursor: pointer;"><?php echo Yii::t('app', 'Показать'); ?></a>
                                                                <a class="l-hide-pass" style="cursor: pointer; display: none;"><?php echo Yii::t('app', 'Скрыть'); ?></a>
                                                                <a style="cursor: pointer; margin-left: 20px;" onClick="showPassword()"><?php echo Yii::t('app', 'Изменить'); ?></a>
                                                            <? endif; ?>                        
                                                            <?=CHtml::hiddenField('isChangePassword', FALSE, array('id' => 'isChangePassword'))?>
                                                            
                                                        </div>
                                                    
                                                        <div class="form-group" id="password_dyn1" style="margin-top: 30px; display: none;"">
                                                            <span class="col-md-3 text-right control-label"><?=Yii::t('app', 'Новый пароль')?></span>
                                                            <div class="col-md-3">
                                                                <?=$form->passwordField($model, 'password', array('size'=>20, 'maxlength'=>20, 'class' => 'form-control', 'value' => (string)FALSE)); ?>
                                                                <?= $form->error($model, 'password', array('class' => 'help-block font-red')); ?>
                                                            </div>
                                                        </div>
                                                        <div class="form-group" id="password_dyn2" style="margin-top: 30px; display: none;"">
                                                            <span class="col-md-3 text-right control-label"><?=Yii::t('app', 'Новый пароль ещё раз')?></span>
                                                            <div class="col-md-3">
                                                                <?=$form->passwordField($model, 'password_confirm', array('size'=>20, 'maxlength'=>20, 'class' => 'form-control', 'value' => (string)FALSE)); ?>
                                                                <?= $form->error($model, 'password_confirm', array('class' => 'help-block font-red')); ?>
                                                            </div>
                                                        </div>
                                                        <div id="password_dyn3" style="display: none;">
                                                            <?=CHtml::link(Yii::t('app', 'Отмена'), 'javascript: void(0)', array('onClick' => 'hidePassword()'))?>
                                                        </div>
                                                    </div>
                                                                        
                                                <? else : ?>

                                                    <div class="col-md-4 text-light">

                                                        <? if ((Yii::app()->params['passwordHash'] == NULL) || (!(bool)Yii::app()->params['passwordHash'])) : ?>
                                                            <span class="l-real-pass" style="display: block;"><? for ($i = 0; $i < strlen($model->password); $i++) : ?>*<? endfor; ?></span>
                                                            <span class="l-pass" style="display: none;"><?= CHtml::encode($model->password) ?></span>
                                                            <a class="l-show-pass" style="cursor: pointer;"><?php echo Yii::t('app', 'Показать'); ?></a>
                                                            <a class="l-hide-pass" style="cursor: pointer; display: none;"><?php echo Yii::t('app', 'Скрыть'); ?></a>
                                                        <? endif; ?>
                                                    
                                                        <? if ((Yii::app()->user->checkAccess('OfficeProfileDefaultChangepassword'))) : ?>
                                                            <a class="btn green-seagreen office-profile-edit" href="<?php echo $this->createUrl('changepassword'); ?>"><i class="glyphicon glyphicon-pencil"></i></a>
                                                        <? endif ?>
                                                    </div>
                                                
                                                <? endif; ?>
                                                

                                            </div>                                        

<? /* -----------------------------------   ФИНАНСОВЫЙ ПАРОЛЬ ПОЛЬЗОВАТЕЛЯ   -------------------   */ ?>        
                                        <? elseif ($fieldAlias == 'finpassword') : ?>

                                            <div class="form-group" style="margin-top: 30px;">
                                                <?= $form->labelEx($model, 'finpassword', array('class' => 'col-md-3 text-right control-label')); ?>
                                                
                                                <? if ($this->editTypeFinpass == UsersRegisterSecurityParams::EDIT_TYPE_FINPASS_FIELD) : ?>
                                                
                                                    <div class="col-md-6">
                                                    
                                                        <div id="finpassword_static">
                                                        
                                                            <? if ((Yii::app()->params['passwordHash'] == NULL) || (!(bool)Yii::app()->params['passwordHash'])) : ?>
                                                                <span class="l-real-finpass" style="display: block;"><? for ($i = 0; $i < strlen($model->finpassword); $i++) : ?>*<? endfor; ?></span>
                                                                <span class="l-finpass" style="display: none;"><?= CHtml::encode($model->finpassword) ?></span>
                                                                <a class="l-show-finpass" style="cursor: pointer;"><?php echo Yii::t('app', 'Показать'); ?></a>
                                                                <a class="l-hide-finpass" style="cursor: pointer; display: none;"><?php echo Yii::t('app', 'Скрыть'); ?></a>
                                                                <a style="cursor: pointer; margin-left: 20px;" onClick="showFinPassword()"><?php echo Yii::t('app', 'Изменить'); ?></a>
                                                            <? endif; ?>
                                                            <?=CHtml::hiddenField('isChangeFinPassword', FALSE, array('id' => 'isChangeFinPassword'))?>
                                                            
                                                        </div>
                                                    
                                                        <div class="form-group" id="finpassword_dyn1" style="margin-top: 30px; display: none;"">
                                                            <span class="col-md-3 text-right control-label"><?=Yii::t('app', 'Новый финансовый пароль')?></span>
                                                            <div class="col-md-3">
                                                                <?=$form->passwordField($model, 'finpassword', array('size'=>20, 'maxlength'=>20, 'class' => 'form-control', 'value' => (string)FALSE)); ?>
                                                                <?= $form->error($model, 'finpassword', array('class' => 'help-block font-red')); ?>
                                                            </div>
                                                        </div>
                                                        <div class="form-group" id="finpassword_dyn2" style="margin-top: 30px; display: none;">
                                                            <span class="col-md-3 text-right control-label"><?=Yii::t('app', 'Новый финансовый пароль ещё раз')?></span>
                                                            <div class="col-md-3">
                                                                <?=$form->passwordField($model, 'finpassword_confirm', array('size'=>20, 'maxlength'=>20, 'class' => 'form-control', 'value' => (string)FALSE)); ?>
                                                                <?= $form->error($model, 'finpassword_confirm', array('class' => 'help-block font-red')); ?>
                                                            </div>
                                                        </div>
                                                        <div id="password_dyn3" style="display: none;">
                                                            <?=CHtml::link(Yii::t('app', 'Отмена'), 'javascript: void(0)', array('onClick' => 'hideFinPassword()'))?>
                                                        </div>
                                                    </div>
                                                
                                                <? else : ?>                                                
                                                
                                                    <div class="col-md-4 text-light">
                                                    
                                                        <? if ((Yii::app()->params['passwordHash'] == NULL) || (!(bool)Yii::app()->params['passwordHash'])) : ?>
                                                            <span class="l-real-finpass" style="display: block;"><? for ($i = 0; $i < strlen($model->finpassword); $i++) : ?>*<? endfor; ?></span>
                                                            <span class="l-finpass" style="display: none;"><?= CHtml::encode($model->finpassword) ?></span>
                                                            <a class="l-show-finpass" style="cursor: pointer;"><?php echo Yii::t('app', 'Показать'); ?></a>
                                                            <a class="l-hide-finpass" style="cursor: pointer; display: none;"><?php echo Yii::t('app', 'Скрыть'); ?></a>
                                                        <? endif; ?>
                                                        
                                                        <? if ((Yii::app()->user->checkAccess('OfficeProfileDefaultChangefinpassword'))) : ?>
                                                            <a class="btn green-seagreen office-profile-edit" href="<?php echo $this->createUrl('default/changepassword/type/fin'); ?>"><i class="glyphicon glyphicon-pencil"></i></a>
                                                        <? endif ?>
                                                    </div>
                                                
                                                <? endif; ?>
                                            </div>                                        

<? /* -----------------------------------   ТЕЛЕФОН ПОЛЬЗОВАТЕЛЯ   -------------------   */ ?>        
                                        <? elseif ($fieldAlias == 'phone') : ?>

                                            <div class="form-group" style="margin-top: 30px;">
                                                <? if ($this->editTypePhone == UsersRegisterSecurityParams::EDIT_TYPE_PHONE_FIELD) : ?>
                                                    <?= $form->labelEx($profile, 'phone', array('class' => 'col-md-3 text-right control-label')); ?>
                                                    <div class="col-md-3">
                                                        <? if (($list['phone']->param != NULL) && ((bool)$list['phone']->param->is_specific_widget)) : ?>
                                                            <?php $this->widget('PhoneWidget')->activePhoneField($profile, 'phone', array('class' => '')); ?>
                                                        <? else : ?>
                                                            <?= $form->textField($profile, 'phone', array('size' => 30, 'maxlength' => 30, 'class' => 'form-control')); ?>
                                                        <? endif; ?>
                                                        <?= $form->error($profile, 'phone', array('class' => 'help-block font-red')); ?>
                                                    </div>
                                                <? else : ?>
                                                    <?= $form->labelEx($profile, 'phone', array('class' => 'col-md-3 text-right control-label')); ?>
                                                    <div class="col-md-3">
                                                        <?= CHtml::encode($profile->phone) ?>
                                                        <?= $form->error($profile, 'phone', array('class' => 'help-block font-red')); ?>
                                                        <a class="btn green-seagreen" href="<?php echo $this->createUrl('changephone'); ?>"><i class="glyphicon glyphicon-pencil"></i></a>
                                                    </div>
                                                <? endif; ?>
                                            </div>                                        

<? /* -----------------------------------   СКАЙП ПОЛЬЗОВАТЕЛЯ   -------------------   */ ?>        
                                        <? elseif ($fieldAlias == 'skype') : ?>

                                            <div class="form-group" style="margin-top: 30px;">
                                                <?= $form->labelEx($profile, 'skype', array('class' => 'col-md-3 text-right control-label')); ?>
                                                <div class="col-md-3">
                                                    <?= $form->textField($profile, 'skype', array('size' => 30, 'maxlength' => 30, 'class' => 'form-control')); ?>
                                                    <?= $form->error($profile, 'skype', array('class' => 'help-block font-red')); ?>
                                                </div>
                                            </div>
                                        
<? /* -----------------------------------   ДАТА РОЖДЕНИЯ ПОЛЬЗОВАТЕЛЯ   -------------------   */ ?>        
                                        <? elseif ($fieldAlias == 'birthday') : ?>

                                           <?php 
                                                Yii::app()->clientScript->registerScriptFile(Yii::app()->params['hostMetronikStatic'] . '/public/assets/global/plugins/bootstrap-datepicker/js/locales/bootstrap-datepicker.' . Yii::app()->language . '.js', CClientScript::POS_END);
                                                Yii::app()->clientScript->registerScript('register', '
                                                    $(function(){
                                                       $(".birthday-datepicker").datepicker({
                                                            language: "' . Yii::app()->language . '"
                                                        });
                                                    });
                                                ');
                                            ?>                                        
                                            <div class="form-group" style="margin-top: 30px;">
                                                <?= $form->labelEx($profile, 'birthday', array('class' => 'col-md-3 text-right control-label')); ?>
                                                <div class="col-md-3">
                                                    <div class="input-group date birthday-datepicker" data-date-format="dd.mm.yyyy" data-date-start-date="-100y">
                                                        <?= $form->textField($profile, 'birthday', array('class' => 'form-control', 'data-date-format'=>"dd.mm.yyyy", 'readonly' => 'readonly')); ?>
                                                        <span class="input-group-btn">
                                                            <button class="btn default" type="button" style="margin-right: 0;"><i class="fa fa-calendar"></i></button>
                                                        </span>                                                        
                                                    </div>
                                                    <?= $form->error($profile, 'birthday', array('class' => 'help-block font-red')); ?>
                                                </div>
                                            </div>
                                        
<? /* -----------------------------------   ПОЛ ПОЛЬЗОВАТЕЛЯ   -------------------   */ ?>        
                                        <? elseif ($fieldAlias == 'sex') : ?>

                                            <div class="form-group" style="margin-top: 30px;">
                                                <?= $form->labelEx($profile, 'sex', array('class' => 'col-md-3 text-right control-label')); ?>
                                                <div class="col-md-3">
                                                    <?= $form->ListBox($profile, 'sex', Profile::getSexList(UsersRegisterObjectTypes::TypeAliasProfile), array('class' => 'form-control', 'size' => 0)); ?>
                                                    <?= $form->error($profile, 'sex', array('class' => 'help-block font-red')); ?>
                                                </div>
                                            </div>                                        

<? /* -----------------------------------   СТРАНА ПОЛЬЗОВАТЕЛЯ   -------------------   */ ?>        
                                        <? elseif ($fieldAlias == 'country_name') : ?>

                                            <div class="form-group" style="margin-top: 30px;">
                                                <?= $form->labelEx($profilelang, 'country_name', array('class' => 'col-md-3 text-right control-label')); ?>
                                                <div class="col-md-3">
                                                    <? if (($list['country_name']->param != NULL) && ((bool)$list['country_name']->param->is_specific_widget)) : ?>
                                                        <?php $cities->countries($profile->country__id, 'ProfileOffice_country__id', 'ProfileOffice[country__id]'); ?>
                                                        <? if ((empty($profile->country__id)) && (!empty($profilelang->country_name))) : ?>
                                                            <span class="help-block"><?=Yii::t('app', 'Текущее значение')?>: <?=CHtml::encode($profilelang->country_name)?></span>
                                                        <? endif; ?>                                                        
                                                    <? else : ?>
                                                        <?=$form->textField($profilelang,'country_name', array('class' => 'form-control')); ?>
                                                    <? endif; ?>
                                                    <?= $form->error($profilelang, 'country_name', array('class' => 'help-block font-red')); ?>
                                                </div>
                                            </div>                                        

<? /* -----------------------------------   ОБЛАСТЬ ПОЛЬЗОВАТЕЛЯ   -------------------   */ ?>        
                                        <? elseif ($fieldAlias == 'region_name') : ?>

                                            <div class="form-group" style="margin-top: 30px;">
                                                <?= $form->labelEx($profilelang, 'region_name', array('class' => 'col-md-3 text-right control-label')); ?>
                                                <div class="col-md-3">
                                                    <? if (($list['region_name']->param != NULL) && ((bool)$list['region_name']->param->is_specific_widget)) : ?>
                                                          <?php $cities->regions($profile->region__id, $profile->country__id, 'ProfileOffice_region__id', 'ProfileOffice[region__id]'); ?>
                                                          <? if ((empty($profile->region__id)) && (!empty($profilelang->region_name))) : ?>
                                                                <span class="help-block"><?=Yii::t('app', 'Текущее значение')?>: <?=CHtml::encode($profilelang->region_name)?></span>
                                                            <? endif; ?>                                                          
                                                    <? else : ?>
                                                        <?=$form->textField($profilelang,'region_name', array('class' => 'form-control')); ?>
                                                    <? endif; ?>
                                                    <?= $form->error($profilelang, 'region_name', array('class' => 'help-block font-red')); ?>
                                                </div>
                                            </div>
                                        
<? /* -----------------------------------   ГОРОД ПОЛЬЗОВАТЕЛЯ   -------------------   */ ?>        
                                        <? elseif ($fieldAlias == 'city_name') : ?>

                                            <div class="form-group" style="margin-top: 30px;">
                                                <?= $form->labelEx($profilelang, 'city_name', array('class' => 'col-md-3 text-right control-label')); ?>
                                                <div class="col-md-3">
                                                    <? if (($list['city_name']->param != NULL) && ((bool)$list['city_name']->param->is_specific_widget)) : ?>
                                                        <?php $cities->cities($profile->city__id, $profile->region__id, 'ProfileOffice_city__id', 'ProfileOffice[city__id]'); ?>
                                                        <? if ((empty($profile->city__id)) && (!empty($profilelang->city_name))) : ?>
                                                            <span class="help-block"><?=Yii::t('app', 'Текущее значение')?>: <?=CHtml::encode($profilelang->city_name)?></span>
                                                        <? endif; ?>                                                         
                                                    <? else : ?>
                                                        <?=$form->textField($profilelang,'city_name', array('class' => 'form-control')); ?>
                                                    <? endif; ?>
                                                    <?= $form->error($profilelang, 'city_name', array('class' => 'help-block font-red')); ?>
                                                </div>
                                            </div>                                        

<? /* -----------------------------------   ПОЧТОВЫЙ ИНДЕКС ПОЛЬЗОВАТЕЛЯ   -------------------   */ ?>        
                                        <? elseif ($fieldAlias == 'zip_code') : ?>

                                            <div class="form-group" style="margin-top: 30px;">
                                                <?= $form->labelEx($profile, 'zip_code', array('class' => 'col-md-3 text-right control-label')); ?>
                                                <div class="col-md-3">
                                                    <?= $form->textField($profile, 'zip_code', array('class' => 'form-control')); ?>
                                                    <?= $form->error($profile, 'zip_code', array('class' => 'help-block font-red')); ?>
                                                </div>
                                            </div>                                        

<? /* -----------------------------------   СЕРИЯ ПАСПОРТА ПОЛЬЗОВАТЕЛЯ   -------------------   */ ?>        
                                        <? elseif ($fieldAlias == 'series_passport') : ?>

                                            <div class="form-group" style="margin-top: 30px;">
                                                <?= $form->labelEx($profile, 'series_passport', array('class' => 'col-md-3 text-right control-label')); ?>
                                                <div class="col-md-3">
                                                    <?= $form->textField($profile, 'series_passport', array('class' => 'form-control')); ?>
                                                    <?= $form->error($profile, 'series_passport', array('class' => 'help-block font-red')); ?>
                                                </div>
                                            </div>                                        

<? /* -----------------------------------   ФАМИЛИЯ ПОЛЬЗОВАТЕЛЯ   -------------------   */ ?>        
                                        <? elseif ($fieldAlias == 'last_name') : ?>

                                            <div class="form-group" style="margin-top: 30px;">
                                                <?= $form->labelEx($profilelang, 'last_name', array('class' => 'col-md-3 text-right control-label')); ?>
                                                <div class="col-md-3">
                                                    <?= $form->textField($profilelang, 'last_name', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
                                                    <?= $form->error($profilelang, 'last_name', array('class' => 'help-block font-red')); ?>
                                                </div>
                                            </div>
                                        
<? /* -----------------------------------   ИМЯ ПОЛЬЗОВАТЕЛЯ   -------------------   */ ?>        
                                        <? elseif ($fieldAlias == 'first_name') : ?>

                                            <div class="form-group" style="margin-top: 30px;">
                                                <?= $form->labelEx($profilelang, 'first_name', array('class' => 'col-md-3 text-right control-label')); ?>
                                                <div class="col-md-3">
                                                    <?= $form->textField($profilelang, 'first_name', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
                                                    <?= $form->error($profilelang, 'first_name', array('class' => 'help-block font-red')); ?>
                                                </div>
                                            </div>                                        

<? /* -----------------------------------   ОТЧЕСТВО ПОЛЬЗОВАТЕЛЯ   -------------------   */ ?>        
                                        <? elseif ($fieldAlias == 'second_name') : ?>

                                            <div class="form-group" style="margin-top: 30px;">
                                                <?= $form->labelEx($profilelang, 'second_name', array('class' => 'col-md-3 text-right control-label')); ?>
                                                <div class="col-md-3">
                                                    <?= $form->textField($profilelang, 'second_name', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
                                                    <?= $form->error($profilelang, 'second_name', array('class' => 'help-block font-red')); ?>
                                                </div>
                                            </div>
                                        
<? /* -----------------------------------   АДРЕС ПОЛЬЗОВАТЕЛЯ   -------------------   */ ?>        
                                        <? elseif ($fieldAlias == 'address') : ?>

                                            <div class="form-group" style="margin-top: 30px;">
                                                <?= $form->labelEx($profilelang, 'address', array('class' => 'col-md-3 text-right control-label')); ?>
                                                <div class="col-md-3">
                                                    <?= $form->textField($profilelang, 'address', array('size' => 60, 'maxlength' => 500, 'class' => 'form-control')); ?>
                                                    <?= $form->error($profilelang, 'address', array('class' => 'help-block font-red')); ?>
                                                </div>
                                            </div> 
<? /* -----------------------------------   СКЛАД ОБСЛУЖИВАНИЯ   -------------------   */ ?>        
                                        <? elseif ($fieldAlias == 'ID_PODSKLAD') : ?>

                                            <? if($this->GetConfigByName('isSupportSync')&&(Yii::app()->isPackageInstall('MLMSync'))): ?>
                        
                                                <div class="form-group" style="margin-top: 30px;">
                                                    <label class="left required"><?=Yii::t('app','Склад обслуживания')?> <span class="required">*</span>:</label>
                                                    <div class="col-md-3">
                                                        <?=CHtml::dropDownList('warehouse', $war_guid, $warehouses,array('class' => 'form-control')); ?>              
                                                    </div>
                                                </div>       

                                            <? endif?>                                      

<? /* -----------------------------------   КАПЧА   -------------------   */ ?>        
                                        <? elseif ($fieldAlias == 'captcha'): ?> 

                                            <div class="form-group" style="margin-top: 30px;">
                                                <?=$form->labelEx($profile,'captcha', array('class' => 'col-md-3 text-right control-label'))?>
                                                <div class="col-md-3">
                                                    <?=$form->textField($profile,'captcha',array('class' => 'form-control', 'value' => '', 'size' => 20, 'maxlength' => 20))?>
                                                    <span class="col-md-4">
                                                        <?php $this->widget('UTICaptcha', array('buttonLabel' => 'Обновить'))?>
                                                    </span>
                                                    <span class="col-md-8">
                                                        <?=Yii::t('app', 'Пожалуйста, введите код с картинки')?>.<?=Yii::t('app', 'Можно вводить без учета регистра')?>.
                                                        <?=$form->error($profile,'captcha')?>
                                                    </span>
                                                </div>
                                            </div>                                

                                        <? endif; ?>
                                    
                                    <? endforeach; ?>
                                
                                    <?php $this->endWidget(); ?>


								</div><!-- form -->
								<div class="buttons form-actions" style="margin-top: 10px;">
									<?= CHtml::submitButton(Yii::t('app', 'Сохранить'), array('name' => 'btn_save', 'class' => 'btn green')); ?>
                                    
                                    <? if (Yii::app()->user->checkAccess('OfficeProfileDefaultIndex')) : ?>
                                        <?=CHtml::link(Yii::t('app', 'К просмотру профиля'), $this->createUrl('/office/profile'), array('class' => 'btn purple'))?>
                                    <? endif; ?>
                                    <? if (Yii::app()->user->checkAccess('OfficeDefaultIndex')) : ?>
                                        <?=CHtml::link(Yii::t('app', 'В кабинет'), $this->createUrl('/office'), array('class' => 'btn grey'))?>
                                    <? endif; ?>                                    
                                    
								</div>
								<?php $this->endWidget(); ?>
							</div><!-- form -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>