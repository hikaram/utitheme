<?
Yii::app()->clientScript->registerCss('register', '.has-error input.form-control { border: 1px solid #a94442 !important; }');

?>

<?php
    if (Yii::app()->user->hasFlash('error')) {
        echo '<div class="error">'.Yii::app()->user->getFlash('error').'</div>';
    }
?>
<?
    $modelUsersRegisterConfig = UsersRegisterConfig::model()->find('name = "is_social_register"');
?>
<? if (Yii::app()->isPackageInstall('EAuthExtension') && (bool)$modelUsersRegisterConfig->value) : ?>
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
        <h2><?=Yii::t('app', 'Через социальные сети')?></h2>
        <?php
            $this->widget('ext.eauth.EAuthWidget', array('action' => '/register/register'));
        ?>
    </div>
</div>
<? endif; ?>
<div class="content-form-page">
    <div class="row">
        <h2><?=Yii::t('app', 'Обычная регистрация')?></h2>
        <p class="note"><?=Yii::t('app', 'Поля с')?> <span class="require">*</span> <?=Yii::t('app', 'обязательны для заполнения')?></p>
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
			<?php $form=$this->beginWidget('CActiveForm', array(
                'id'                    => 'users-form',
                'enableAjaxValidation'  => false, 
                'htmlOptions'           => array(
                    'role'      => 'form', 
                    'class'     => 'form-horizontal',
                    'enctype'   => 'multipart/form-data'))); ?>
			<?php echo $form->errorSummary(array($model, $profile, $profilelang), '<h4 class="block">' . Yii::t('app', 'Требуется уточнить данные') . '</h4><p>', '</p>', array('class' => 'note note-danger')); ?>
			<div class="form-body">
                <? if ($modelUsersRegisterSocialSelected !== null) : ?>
                <div class="form-group">
                        <div class="alert alert-block alert-info fade in">
                            <button type="button" class="close" data-dismiss="alert"></button>
                            <h4 class="alert-heading"><?=Yii::t('app', 'Внимание')?>!</h4>
                            <span class="auth-icon auth-<?=$modelUsersRegisterSocialSelected->alias?>" style="float: left;"></span>
                            <p style="padding-top: 10px; padding-left: 40px;">
                                <?=Yii::t('app', 'Вы выбрали регистрацию с помощью сервиса')?> <?=$modelUsersRegisterSocialSelected->title?>.
                            </p>
                            <div class="clearfix"></div>
                            <? if ($profile->hasErrors('social_id')) : ?>
                            <p><?=Yii::t('app', 'Однако ваша учетная запись из')?> <?=$modelUsersRegisterSocialSelected->title?> <?=Yii::t('app', 'зарегистрирована. Нажмите')?> <a href="<?=$this->createUrl('/site/login')?>"><?=Yii::t('app', 'ВХОД')?></a>, <?=Yii::t('app', 'чтобы продолжить использоание сайта')?>.</p>
                            <? endif; ?>
                        </div>
                </div>
                <? endif; ?>
                <?php $cities=$this->beginWidget('CitiesWidget', array()); ?>
                
                <? foreach ($list as $fieldAlias => $fieldParam) : ?>
<? /* -------------   СПОНСОР ПОЛЬЗОВАТЕЛЯ   -------------------   */ ?>
                    <? if ($fieldAlias == 'sponsor__id') : ?>
                        <? if (($user != NULL) && ((bool)$list['sponsor__id']->is_user_filltype)): ?>
                            <div class="form-group <? if ($profile->hasErrors('sponsor__id')) echo 'has-error';?>">
                                <?=$form->labelEx($profile,'sponsor__id', array('class' => 'col-lg-4 col-md-6 col-sm-6 col-xs-12 control-label'))?>
                                <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
                                    <p class="form-control-static"><span id="span_sponsor_login"></span></p>
                                    <?=$form->hiddenField($profile,'sponsor__id',array('size'=>60,'maxlength'=>100, 'value' => $user->id))?>
                                    <span class="help-block" id="sponsor__iderror"><?=$form->error($profile,'sponsor__id')?></span>
                                </div>
                            </div>
                        <? else : ?>
                            <? if ((!$can_edit_sponsor) || (!$isDefaultSponsorValue)) : ?>
                                <div class="form-group <? if ($profile->hasErrors('sponsor__id')) echo 'has-error';?>">
                                    <?=$form->labelEx($profile,'sponsor__id', array('class' => 'col-lg-4 col-md-6 col-sm-6 col-xs-12 control-label'))?>
                                    <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
                                        <? if ($can_edit_sponsor) : ?>
                                            <?=CHtml::textField('sponsor_login', '', array('id' => 'sponsor_login', 'class' => 'form-control', 'title' => Yii::t('app', 'Введите логин Вашего спонсора')))?>
                                        <? else : ?>
                                            <p class="form-control-static"><span id="span_sponsor_login"></span></p>
                                        <?endif; ?>
                                        <?=$form->hiddenField($profile,'sponsor__id',array('size'=>60,'maxlength'=>100))?>
                                        <span class="help-block" id="sponsor__iderror"><?=$form->error($profile,'sponsor__id')?></span>
                                    </div>
                                </div>
                            <? endif; ?>
                        <? endif; ?>
                        
                        <? if ((($user != NULL) && ((bool)$list['sponsor__id']->is_user_filltype)) || ((!$can_edit_sponsor) || (!$isDefaultSponsorValue))) : ?>
                        
                            <div class="row profile">
                                <div class="form-group">
                                    <label class="col-lg-4 col-md-6 col-sm-6 col-xs-12 control-label"><?=Yii::t('app', 'Информация о спонсоре')?></label>
                                    <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12 profile-info">
                                        <h2 style="padding-top: 2px;">
                                            <span id="sponsor_last_name"> </span>
                                            <span id="sponsor_first_name"> </span>
                                            <span id="sponsor_second_name"></span>
                                        </h2>
                                    </div>
                                    <!--end col-md-8-->
                                </div>
                            </div>
				
                        <? endif; ?>
                
<? /* -------------   ЛОГИН ПОЛЬЗОВАТЕЛЯ   -------------------   */ ?>        
                    <? elseif ($fieldAlias == 'username'): ?>		
						<div class="form-group <? if ($model->hasErrors('username')) echo 'has-error';?>">
							<?=$form->labelEx($model,'username', array('class' => 'col-lg-4 col-md-6 col-sm-6 col-xs-12 control-label'))?>
							<div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
								<div class="input-group">
									<?=$form->textField($model,'username',array('size'=>60,'maxlength'=>100, 'class' => 'form-control', 'title' => Yii::t('app', 'Данное поле должно содержать только латинские символы (a-z), цифры (0-9), дефис. Применение спецсимволов не допускается. Минимальная длина данного поля должна быть 4 символа')))?>
									<span class="input-group-addon">
										<i class="fa fa-user"></i>
									</span>
								</div>
								<span class="help-block" id="usernameerror"><?=$form->error($model,'username')?></span>
							</div>
						</div>

				
<? /* -------------   EMAIL ПОЛЬЗОВАТЕЛЯ   -------------------   */ ?>        
                    <? elseif ($fieldAlias == 'email'): ?>
						<div class="form-group <? if ($model->hasErrors('email')) echo 'has-error';?>">
							<?=$form->labelEx($model,'email', array('class' => 'col-lg-4 col-md-6 col-sm-6 col-xs-12 control-label'))?>
							<div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
								<div class="input-group">
									<?=$form->textField($model,'email',array('size'=>60,'maxlength'=>100, 'class' => 'form-control'))?>
									<span class="input-group-addon">
										<i class="fa fa-envelope"></i>
									</span>
								</div>
								<span class="help-block" id="emailerror"><?=$form->error($model,'email')?></span>
							</div>
						</div>

				
<? /* -------------   ПАРОЛЬ ПОЛЬЗОВАТЕЛЯ   -------------------   */ ?>        
                    <? elseif ($fieldAlias == 'password'): ?>
                        <? if (($list['password']->param != NULL) && ($list['password']->param->show_type == UsersRegisterFieldsParams::SHOW_TYPE_PASSWORD)) : ?>
                            <div class="form-group <? if ($model->hasErrors('password')) echo 'has-error';?>">
                                <?=$form->labelEx($model,'password', array('class' => 'col-lg-4 col-md-6 col-sm-6 col-xs-12 control-label'))?>
                                <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
                                    <div class="input-group">
                                        <?=$form->passwordField($model, 'password', array('size' => 20,'maxlength' => 20, 'class' => 'live form-control', 'title' => Yii::t('app', 'Внимание! Поле подсвечивается красным цветом, если оно не совпадает с полем для повтора пароля. Данное поле должно содержать только латинские символы (a-z), цифры (0-9), знак подчеркивания, точка. Буквы в верхнем и в нижнем регистре являются разными символами. Минимальная длина данного поля должна быть 6 символов'))); ?>
                                        <span class="input-group-addon">
                                            <i class="fa fa-key"></i>
                                        </span>
                                    </div>
                                    <span class="help-block" id="passworderror"><?=$form->error($model,'password')?></span>
                                </div>
                            </div>
                        
                            <div class="form-group <? if ($model->hasErrors('password_confirm')) echo 'has-error';?>">
                                <label for="Users_password_confirm" class="col-lg-4 col-md-6 col-sm-6 col-xs-12 control-label required"><?=Yii::t('app', 'Еще раз пароль')?><span class="required">*</span></label>
                                <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
                                    <div class="input-group">
                                        <?=$form->passwordField($model, 'password_confirm', array('size' => 20,'maxlength' => 20, 'class' => 'live form-control', 'title' => Yii::t('app', 'Данное поле должно содержать только латинские символы (a-z), цифры (0-9), знак подчеркивания, точка. Буквы в верхнем и в нижнем регистре являются разными символами. Минимальная длина данного поля должна быть 6 символов'))); ?>
                                        <span class="input-group-addon">
                                            <i class="fa fa-key"></i>
                                        </span>
                                    </div>
                                    <span class="help-block" id="password_confirmerror"><?=$form->error($model,'password_confirm')?></span>
                                </div>
                            </div>
                        <? elseif (($list['password']->param != NULL) && ($list['password']->param->show_type == UsersRegisterFieldsParams::SHOW_TYPE_TEXT)) : ?>
                            <div class="form-group <? if ($model->hasErrors('password')) echo 'has-error';?>">
                                <?=$form->labelEx($model,'password', array('class' => 'col-lg-4 col-md-6 col-sm-6 col-xs-12 control-label'))?>
                                <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
                                    <div class="input-group">
                                        <?=$form->textField($model,'password',array('size'=>60,'maxlength'=>100, 'class' => 'form-control', 'title' => Yii::t('app', 'Данное поле должно содержать только латинские символы (a-z), цифры (0-9), знак подчеркивания, точка. Буквы в верхнем и в нижнем регистре являются разными символами. Минимальная длина данного поля должна быть 6 символов')))?>
                                        <span class="input-group-addon">
                                            <i class="fa fa-key"></i>
                                        </span>
                                    </div>
                                    <span class="help-block" id="passworderror"><?=$form->error($model,'password')?></span>
                                </div>
                            </div>					
                        <? elseif (($list['password']->param != NULL) && ($list['password']->param->show_type == UsersRegisterFieldsParams::SHOW_TYPE_DYNAMIC)) : ?>
                            <div  id="passwordsDesc_password" class="form-group <? if ($model->hasErrors('password')) echo 'has-error';?>">
                                <?=$form->labelEx($model,'password', array('class' => 'col-lg-4 col-md-6 col-sm-6 col-xs-12 control-label'))?>
                                <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
                                    <div class="input-group">
                                        <?=$form->passwordField($model, 'password', array('size' => 20,'maxlength' => 20, 'class' => 'live form-control', 'name' => 'UsersRegister[password_w]', 'id' => 'UsersRegister_password_w', 'title' => Yii::t('app', 'Внимание! Поле подсвечивается красным цветом, если оно не совпадает с полем для повтора пароля и зеленым если совпадает. Данное поле должно содержать только латинские символы (a-z), цифры (0-9), знак подчеркивания, точка. Буквы в верхнем и в нижнем регистре являются разными символами. Минимальная длина данного поля должна быть 6 символов'))); ?>
                                        <span class="input-group-addon">
                                            <i class="fa fa-key"></i>
                                        </span>
                                    </div>
                                    <span class="help-block" id="passworderror"><?=$form->error($model,'password')?></span>
                                </div>
                            </div>
                            
                            <div id="passwordsFields_password" class="form-group <? if ($model->hasErrors('password_confirm')) echo 'has-error';?>">
                                <label for="Users_password_confirm_w" class="col-lg-4 col-md-6 col-sm-6 col-xs-12 control-label required"><?=Yii::t('app', 'Еще раз пароль')?><span class="required">*</span></label>
                                <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
                                    <div class="input-group">
                                        <?=$form->passwordField($model, 'password_confirm', array('size'=>20,'maxlength'=>20, 'class' => 'live form-control', 'name' => 'UsersRegister[password_confirm_w]', 'id' => 'UsersRegister_password_confirm_w', 'title' => Yii::t('app', 'Внимание! Поле подсвечивается красным цветом, если оно не совпадает с полем для повтора пароля и зеленым если совпадает. Данное поле должно содержать только латинские символы (a-z), цифры (0-9), знак подчеркивания, точка. Буквы в верхнем и в нижнем регистре являются разными символами. Минимальная длина данного поля должна быть 6 символов'))); ?>
                                        <span class="input-group-addon">
                                            <i class="fa fa-key"></i>
                                        </span>
                                    </div>
                                    <span class="help-block" id="password_confirmerror"><?=$form->error($model,'password_confirm')?></span>
                                </div>
                            </div>
                            
                            <div id="passwordShow_password" class="form-group <? if ($model->hasErrors('password')) echo 'has-error';?>" style="display: none;">
                                <?=$form->labelEx($model,'password', array('class' => 'col-lg-4 col-md-6 col-sm-6 col-xs-12 control-label'))?>
                                <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
                                    <div class="input-group">
                                        <?=$form->textField($model, 'password', array('size' => 60,'maxlength' => 100, 'class' => 'form-control', 'name' => 'UsersRegister[password_n]', 'id' => 'UsersRegister_password_n', 'title' => Yii::t('app', 'Данное поле должно содержать только латинские символы (a-z), цифры (0-9), знак подчеркивания, точка. Буквы в верхнем и в нижнем регистре являются разными символами. Минимальная длина данного поля должна быть 6 символов')))?>
                                        <span class="input-group-addon">
                                            <i class="fa fa-key"></i>
                                        </span>
                                    </div>
                                    <span class="help-block" id="passworderror"><?=$form->error($model,'password')?></span>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12"></div>
                                <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
                                    <? if (!isset($_POST['show_pass'])) $_POST['show_pass'] = false;?>
                                    <?=CHtml::checkBox('show_pass', $_POST['show_pass'], array('id' => 'showPasswordCheckBox', 'style' => 'width: 15px;', 'passId' => 'password'))?>&nbsp;&nbsp;<?=Yii::t('app', 'Показывать пароль')?>
                                </div>
                            </div>
                        <? endif; ?>

				
<? /* -------------   ФИНАНСОВЫЙ ПАРОЛЬ ПОЛЬЗОВАТЕЛЯ   -------------------   */ ?>        
                    <? elseif ($fieldAlias == 'finpassword'): ?>
                        <? if (($list['finpassword']->param != NULL) && ($list['finpassword']->param->show_type == UsersRegisterFieldsParams::SHOW_TYPE_PASSWORD)) : ?>
                            <div class="form-group <? if ($model->hasErrors('finpassword')) echo 'has-error';?>">
                                <?=$form->labelEx($model,'finpassword', array('class' => 'col-lg-4 col-md-6 col-sm-6 col-xs-12 control-label'))?>
                                <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
                                    <div class="input-group">
                                        <?=$form->passwordField($model, 'finpassword', array('size' => 20,'maxlength' => 20, 'class' => 'live form-control', 'title' => Yii::t('app', 'Внимание! Поле подсвечивается красным цветом, если оно не совпадает с полем для повтора пароля и зеленым если совпадает. Данное поле должно содержать только латинские символы (a-z), цифры (0-9), знак подчеркивания, точка. Буквы в верхнем и в нижнем регистре являются разными символами. Минимальная длина данного поля должна быть 6 символов'))); ?>
                                        <span class="input-group-addon">
                                            <i class="fa fa-key"></i>
                                        </span>
                                    </div>
                                    <span class="help-block" id="finpassworderror"><?=$form->error($model,'finpassword')?></span>
                                </div>
                            </div>
                        
                            <div class="form-group <? if ($model->hasErrors('finpassword_confirm')) echo 'has-error';?>">
                                <label for="Users_password_confirm" class="col-lg-4 col-md-6 col-sm-6 col-xs-12 control-label <? if ((bool)$list['finpassword']->is_required) : ?>required<? endif; ?>"><?=Yii::t('app', 'Еще раз финансовый пароль')?><? if ((bool)$list['finpassword']->is_required) : ?><span class="required">*</span><? endif; ?></label>
                                <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
                                    <div class="input-group">
                                        <?=$form->passwordField($model, 'finpassword_confirm', array('size' => 20,'maxlength' => 20, 'class' => 'live form-control', 'title' => Yii::t('app', 'Внимание! Поле подсвечивается красным цветом, если оно не совпадает с полем для повтора пароля и зеленым если совпадает. Данное поле должно содержать только латинские символы (a-z), цифры (0-9), знак подчеркивания, точка. Буквы в верхнем и в нижнем регистре являются разными символами. Минимальная длина данного поля должна быть 6 символов'))); ?>
                                        <span class="input-group-addon">
                                            <i class="fa fa-key"></i>
                                        </span>
                                    </div>
                                    <span class="help-block" id="finpassword_confirmerror"><?=$form->error($model,'finpassword_confirm')?></span>
                                </div>
                            </div>				
                        <? elseif (($list['finpassword']->param != NULL) && ($list['finpassword']->param->show_type == UsersRegisterFieldsParams::SHOW_TYPE_TEXT)) : ?>
                            <div class="form-group <? if ($model->hasErrors('finpassword')) echo 'has-error';?>">
                                <?=$form->labelEx($model,'finpassword', array('class' => 'col-lg-4 col-md-6 col-sm-6 col-xs-12 control-label'))?>
                                <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
                                    <div class="input-group">
                                        <?=$form->textField($model,'finpassword',array('size'=>60,'maxlength'=>100, 'class' => 'form-control', 'title' => Yii::t('app', 'Данное поле должно содержать только латинские символы (a-z), цифры (0-9), знак подчеркивания, точка. Буквы в верхнем и в нижнем регистре являются разными символами. Минимальная длина данного поля должна быть 6 символов')))?>
                                        <span class="input-group-addon">
                                            <i class="fa fa-key"></i>
                                        </span>
                                    </div>
                                    <span class="help-block" id="finpassworderror"><?=$form->error($model,'finpassword')?></span>
                                </div>
                            </div>
                        <? elseif (($list['finpassword']->param != NULL) && ($list['finpassword']->param->show_type == UsersRegisterFieldsParams::SHOW_TYPE_DYNAMIC)) : ?>
                            <div id="finpasswordsDesc_finpassword" class="form-group <? if ($model->hasErrors('finpassword')) echo 'has-error';?>">
                                <?=$form->labelEx($model,'finpassword', array('class' => 'col-lg-4 col-md-6 col-sm-6 col-xs-12 control-label'))?>
                                <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
                                    <div class="input-group">
                                        <?=$form->passwordField($model, 'finpassword', array('size' => 20,'maxlength' => 20, 'class' => 'live form-control', 'name' => 'UsersRegister[finpassword_w]', 'id' => 'UsersRegister_finpassword_w', 'title' => Yii::t('app', 'Данное поле должно содержать только латинские символы (a-z), цифры (0-9), знак подчеркивания, точка. Буквы в верхнем и в нижнем регистре являются разными символами. Минимальная длина данного поля должна быть 6 символов'))); ?>
                                        <span class="input-group-addon">
                                            <i class="fa fa-key"></i>
                                        </span>
                                    </div>
                                    <span class="help-block" id="finpassworderror"><?=$form->error($model,'finpassword')?></span>
                                </div>
                            </div>

                            <div id="finpasswordsFields_finpassword" class="form-group <? if ($model->hasErrors('finpassword_confirm')) echo 'has-error';?>">
                                <label for="UsersRegister_password_confirm" class="col-lg-4 col-md-6 col-sm-6 col-xs-12 control-label <? if ((bool)$list['finpassword']->is_required) : ?>required<? endif; ?>"><?=Yii::t('app', 'Еще раз финансовый пароль')?><? if ((bool)$list['finpassword']->is_required) : ?><span class="required">*</span><? endif; ?></label>
                                <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
                                    <div class="input-group">
                                        <?=$form->passwordField($model, 'finpassword_confirm', array('size' => 20,'maxlength' => 20, 'class' => 'live form-control', 'name' => 'UsersRegister[finpassword_confirm_w]', 'id' => 'UsersRegister_finpassword_confirm_w', 'title' => Yii::t('app', 'Данное поле должно содержать только латинские символы (a-z), цифры (0-9), знак подчеркивания, точка. Буквы в верхнем и в нижнем регистре являются разными символами. Минимальная длина данного поля должна быть 6 символов'))); ?>
                                        <span class="input-group-addon">
                                            <i class="fa fa-key"></i>
                                        </span>
                                    </div>
                                    <span class="help-block" id="finpassworderror"><?=$form->error($model,'finpassword')?></span>
                                </div>
                            </div>
                            
                            <div id="finpasswordShow_finpassword" class="form-group <? if ($model->hasErrors('finpassword')) echo 'has-error';?>"  style="display: none;">
                                <?=$form->labelEx($model,'finpassword', array('class' => 'col-lg-4 col-md-6 col-sm-6 col-xs-12 control-label'))?>
                                <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
                                    <div class="input-group">
                                        <?=$form->textField($model, 'finpassword', array('size' => 20,'maxlength' => 20, 'class' => 'form-control', 'name' => 'UsersRegister[finpassword_n]', 'id' => 'UsersRegister_finpassword_n', 'title' => Yii::t('app', 'Данное поле должно содержать только латинские символы (a-z), цифры (0-9), знак подчеркивания, точка. Буквы в верхнем и в нижнем регистре являются разными символами. Минимальная длина данного поля должна быть 6 символов'))); ?>
                                        <span class="input-group-addon">
                                            <i class="fa fa-key"></i>
                                        </span>
                                    </div>
                                    <span class="help-block" id="finpassworderror"><?=$form->error($model,'finpassword'); ?><? if ((($form->error($model,'finpassword') != '')) && (($form->error($model,'finpassword_confirm') != ''))) : ?><br /><?endif; ?><?=$form->error($model,'password_confirm'); ?></span>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12"></div>
                                <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
                                    <? if (!isset($_POST['show_finpass'])) $_POST['show_finpass'] = false; ?>
                                    <?=CHtml::checkBox('show_finpass', $_POST['show_finpass'], array('id' => 'showFinPasswordCheckBox', 'style' => 'width: 15px;', 'passId' => 'finpassword'))?>&nbsp;&nbsp;<?=Yii::t('app', 'Показывать финансовый пароль')?>
                                </div>
                            </div>
                        <? endif; ?>

				
<? /* -------------   СЕКРЕТНЫЙ ВОПРОС   -------------------   */ ?>        
                    <? elseif ($fieldAlias == 'question'): ?>
                        <div class="form-group <? if ($profile->hasErrors('question')) echo 'has-error';?>">
                            <?=$form->labelEx($profile,'question', array('class' => 'col-lg-4 col-md-6 col-sm-6 col-xs-12 control-label'))?>
                            <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
                                    <?=$form->ListBox($profile,'question', $questionList['selectBox'], array('class' => 'form-control', 'size' => 0)); ?>
                                <span class="help-block" id="questionerror"><?=$form->error($profile,'question'); ?></span>
                            </div>
                        </div>

                    
<? /* -------------   ОТВЕТ НА СЕКРЕТНЫЙ ВОПРОС ПОЛЬЗОВАТЕЛЯ   -------------------   */ ?>        
                    <? elseif ($fieldAlias == 'answer'): ?>
                        <div class="form-group">
                            <label class="col-lg-4 col-md-6 col-sm-6 col-xs-12 control-label"><?=Yii::t('app', 'Возможные ответы')?></label>
                            <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
                                <? foreach ($questionList['divBox'] as $question) : ?>
                                    <div style="padding-right: 80px; padding-top: 10px;" class="answer-desc" id="answer-desc-<?=$question->id?>">
                                        <?=CHtml::encode($question->lang->description)?>
                                    </div>				
                                <? endforeach;?>
                            </div>
                        </div>
					
                        <div class="form-group <? if ($profile->hasErrors('answer')) echo 'has-error';?>">
                            <?=$form->labelEx($profile,'answer', array('class' => 'col-lg-4 col-md-6 col-sm-6 col-xs-12 control-label'))?>
                            <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
                                <div class="input-group">
                                    <?=$form->textField($profile,'answer',array('class' => 'form-control', ))?>
                                    <span class="input-group-addon">
                                        <i class="fa fa-exclamation"></i>
                                    </span>
                                </div>
                                <span class="help-block" id="answererror"><?=$form->error($profile,'answer'); ?></span>
                            </div>
                        </div>

				
<? /* -------------   ТЕЛЕФОН ПОЛЬЗОВАТЕЛЯ   -------------------   */ ?>        
                    <? elseif ($fieldAlias == 'phone'): ?>
                        <div class="form-group <? if ($profile->hasErrors('phone')) echo 'has-error';?>">
                            <?=$form->labelEx($profile,'phone', array('class' => 'col-lg-4 col-md-6 col-sm-6 col-xs-12 control-label'))?>
                            <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
                                <div class="input-group">
                                    <? if (($list['phone']->param != NULL) && ((bool)$list['phone']->param->is_specific_widget)) : ?>
                                        <?php $this->widget('PhoneWidget')->activePhoneField($profile, 'phone', array('class' => '')); ?>
                                    <? else : ?>			
                                        <?=$form->textField($profile,'phone',array('size'=>20,'maxlength'=>20, 'class' => 'form-control')); ?>
                                    <? endif; ?>
                                    <span class="input-group-addon">
                                        <i class="glyphicon glyphicon-phone-alt"></i>
                                    </span>
                                </div>
                                <span class="help-block" id="phoneerror"><?=$form->error($profile,'phone'); ?></span>
                            </div>
                        </div>

				
<? /* -------------   СКАЙП ПОЛЬЗОВАТЕЛЯ   -------------------   */ ?>        
                    <? elseif ($fieldAlias == 'skype'): ?>
                        <div class="form-group <? if ($profile->hasErrors('skype')) echo 'has-error';?>">
                            <?=$form->labelEx($profile,'skype', array('class' => 'col-lg-4 col-md-6 col-sm-6 col-xs-12 control-label'))?>
                            <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
                                <div class="input-group">
                                    <?=$form->textField($profile,'skype',array('size'=>30,'maxlength'=>30, 'class' => 'form-control')); ?>
                                    <span class="input-group-addon">
                                        <i class="fa fa-skype"></i>
                                    </span>
                                </div>
                                <span class="help-block" id="skypeerror"><?=$form->error($profile,'skype'); ?></span>
                            </div>
                        </div>


<? /* -------------   СКЛАД ОБСЛУЖИВАНИЯ   -------------------   */ ?>        
                    <? elseif ($fieldAlias == 'ID_PODSKLAD'): ?>
                        <? if( $this->GetConfigByName('isSupportSync')&&(Yii::app()->isPackageInstall('MLMSync'))): ?>
                            <div class="form-group">
                                <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
                                    <div class="input-group">
                                        <?=Yii::t('app','Склад обслуживания')?> <span class="required">*</span>:
                                        <?=CHtml::dropDownList('warehouse', $war_guid, $warehouses,array('class' => 'form-control')); ?>
                                    </div> 
                                </div>   
                            </div>  
                        <? endif?> 

<? /* -------------   ДАТА РОЖДЕНИЯ ПОЛЬЗОВАТЕЛЯ   -------------------   */ ?>        
                    <? elseif ($fieldAlias == 'birthday'): ?> 
                    
                        <?
                            //BEGIN ЭТОТ БЛОК НУЖЕН ДЛЯ РАБОТЫ КАЛЕНДАРЯ МЕТРОНИКА
                            Yii::app()->clientScript->registerCssFile(Yii::app()->params['hostMetronikStatic'] . '/public/assets/global/plugins/bootstrap-datepicker/css/datepicker3.css');
                            Yii::app()->clientScript->registerScriptFile(Yii::app()->params['hostMetronikStatic'] . '/public/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js', CClientScript::POS_END);
                            Yii::app()->clientScript->registerScriptFile(Yii::app()->params['hostMetronikStatic'] . '/public/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js', CClientScript::POS_END);
                            Yii::app()->clientScript->registerScriptFile(Yii::app()->params['hostMetronikStatic'] . '/public/assets/global/plugins/bootstrap-datepicker/js/locales/bootstrap-datepicker.' . Yii::app()->language . '.js', CClientScript::POS_END);
                            Yii::app()->clientScript->registerCssFile(Yii::app()->params['hostMetronikStatic'] . '/public/assets/global/css/plugins.css');
                                                
                            Yii::app()->clientScript->registerScript('register', '
                                        if (jQuery().datepicker) {
                                            datep = $(".date-picker").datepicker({
                                                rtl: Metronic.isRTL(),
                                                orientation: "right",
                                                autoclose: true,
                                                language: "' . Yii::app()->language . '"
                                            });
                                            
                                                var date = $(".date-picker input").val();
                                            
                                                $(".date-picker").datepicker("setDate", "-40y");
                                                
                                                $(".date-picker input").val(date);
                                            }
                            ', CClientScript::POS_END);
                            //END ЭТОТ БЛОК НУЖЕН ДЛЯ РАБОТЫ КАЛЕНДАРЯ МЕТРОНИКА
                        ?>                
                    
                        <div class="form-group <? if ($profile->hasErrors('birthday')) echo 'has-error';?>">
                            <?=$form->labelEx($profile,'birthday', array('class' => 'col-lg-4 col-md-6 col-sm-6 col-xs-12 control-label'))?>
                            <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
                                
                                <div class="input-group date date-picker" data-date-format="dd.mm.yyyy" data-date-start-date="-100y">
                                    <?=$form->textField($profile,'birthday', array('class' => 'form-control datepicker', 'readonly' => 'readonly', 'title' => Yii::t('app', 'Для выбора другого месяца, щелкните по названию месяца и года. Для выбора другого года, щелкните по названию месяца и года, и потом по году.'))); ?>
                                    <span class="input-group-btn">
                                    <button class="btn default" type="button" style="margin-right: 0;"><i class="fa fa-calendar"></i></button>
                                    </span>
                                </div>

                                <span class="help-block" id="birthdayerror"><?=$form->error($profile,'birthday'); ?></span>
                            </div>
                        </div>

				
<? /* -------------   ПОЛ ПОЛЬЗОВАТЕЛЯ   -------------------   */ ?>        
                    <? elseif ($fieldAlias == 'sex'): ?>         
                        <div class="form-group  <? if ($profile->hasErrors('sex')) echo 'has-error';?>">
                            <?=$form->labelEx($profile,'sex', array('class' => 'col-lg-4 col-md-6 col-sm-6 col-xs-12 control-label'))?>
                            <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
                                <? if (array_key_exists((string)FALSE, Profile::getSexList(UsersRegisterObjectTypes::TypeAliasRegister))) : ?>
                                    <?=$form->ListBox($profile, 'sex', Profile::getSexList(UsersRegisterObjectTypes::TypeAliasRegister), array('class' => 'form-control', 'size' => 0)); ?>
                                    <span class="help-block"><?=$form->error($profile,'sex'); ?></span>
                                <? else : ?>
                                    <div data-toggle="buttons" class="btn-group">
                                        <label class="btn btn-default <? if($profile->sex==Profile::SEX_MALE) echo 'active'?>" style="width: auto">
                                            <i class="fa fa-male"></i>
                                            <?=$form->RadioButton($profile, 'sex', array('class' => 'toggle', 'uncheckValue' => null, 'value' => Profile::SEX_MALE))?><?=Yii::t('app', 'Мужчина')?>
                                        </label>
                                            
                                        <label class="btn btn-default <? if($profile->sex==Profile::SEX_FEMALE) echo 'active'?>" style="width: auto">
                                            <i class="fa fa-female"></i>
                                            <?=$form->RadioButton($profile, 'sex', array('class' => 'toggle', 'uncheckValue' => null, 'value' => Profile::SEX_FEMALE))?><?=Yii::t('app', 'Женщина')?>
                                        </label>
                                    </div>	
                                    <span class="help-block" id="sexerror"><?=$form->error($profile,'sex'); ?></span>                                
                                <? endif; ?>
                            </div>
                        </div>	
				
				
<? /* -------------   СТРАНА ПОЛЬЗОВАТЕЛЯ   -------------------   */ ?>        
                    <? elseif ($fieldAlias == 'country_name'): ?> 
                        <div class="form-group <? if ($profilelang->hasErrors('country_name')) echo 'has-error';?>">
                            <?=$form->labelEx($profilelang,'country_name', array('class' => 'col-lg-4 col-md-6 col-sm-6 col-xs-12 control-label'))?>
                            <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
                                    <? if (($list['country_name']->param != NULL) && ((bool)$list['country_name']->param->is_specific_widget)) : ?>
                                        <?php $cities->countries($profile->country__id, 'ProfileRegister_country__id', 'ProfileRegister[country__id]'); ?>
                                    <? else : ?>
                                        <?=$form->textField($profilelang,'country_name', array('class' => 'form-control')); ?>
                                    <? endif; ?>
                                <span class="help-block" id="country_nameerror"><?=$form->error($profilelang,'country_name'); ?></span>
                            </div>
                        </div>

				
<? /* -------------   ОБЛАСТЬ ПОЛЬЗОВАТЕЛЯ   -------------------   */ ?>        
                    <? elseif ($fieldAlias == 'region_name'): ?> 
                        <div class="form-group <? if ($profilelang->hasErrors('region_name')) echo 'has-error';?>">
                            <?=$form->labelEx($profilelang,'region_name', array('class' => 'col-lg-4 col-md-6 col-sm-6 col-xs-12 control-label'))?>
                            <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
                                    <? if (($list['region_name']->param != NULL) && ((bool)$list['region_name']->param->is_specific_widget)) : ?>
                                        <?php $cities->regions($profile->region__id, $profile->country__id, 'ProfileRegister_region__id', 'ProfileRegister[region__id]'); ?>
                                    <? else : ?>
                                        <?=$form->textField($profilelang,'region_name', array('class' => 'form-control')); ?>
                                    <? endif; ?>
                                <span class="help-block" id="region_nameerror"><?=$form->error($profilelang,'region_name'); ?></span>
                            </div>
                        </div>

			
<? /* -------------   ГОРОД ПОЛЬЗОВАТЕЛЯ   -------------------   */ ?>        
                    <? elseif ($fieldAlias == 'city_name'): ?>         
                        <div class="form-group <? if ($profilelang->hasErrors('city_name')) echo 'has-error';?>">
                            <?=$form->labelEx($profilelang,'city_name', array('class' => 'col-lg-4 col-md-6 col-sm-6 col-xs-12 control-label'))?>
                            <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
                                    <? if (($list['city_name']->param != NULL) && ((bool)$list['city_name']->param->is_specific_widget)) : ?>
                                        <?php $cities->cities($profile->city__id, $profile->region__id, 'ProfileRegister_city__id', 'ProfileRegister[city__id]'); ?>
                                    <? else : ?>				
                                        <?=$form->textField($profilelang,'city_name', array('class' => 'form-control')); ?>
                                    <? endif; ?>
                                <span class="help-block" id="city_nameerror"><?=$form->error($profilelang,'city_name'); ?></span>
                            </div>
                        </div>
				
				
<? /* -------------   ПОЧТОВЫЙ ИНДЕКС ПОЛЬЗОВАТЕЛЯ   -------------------   */ ?>        
                    <? elseif ($fieldAlias == 'zip_code'): ?>
                        <div class="form-group <? if ($profile->hasErrors('zip_code')) echo 'has-error';?>">
                            <?=$form->labelEx($profile,'zip_code', array('class' => 'col-lg-4 col-md-6 col-sm-6 col-xs-12 control-label'))?>
                            <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
                                <div class="input-group">
                                    <?=$form->textField($profile,'zip_code',array('class' => 'form-control'))?>
                                    <span class="input-group-addon">
                                        <i class="fa fa-ellipsis-h"></i>
                                    </span>
                                </div>
                                <span class="help-block" id="zip_codeerror"><?=$form->error($profile,'zip_code')?></span>
                            </div>
                        </div>
				
				
<? /* -------------   НОМЕР ПАСПОРТА ПОЛЬЗОВАТЕЛЯ   -------------------   */ ?>        
                    <? elseif ($fieldAlias == 'series_passport'): ?>
                        <div class="form-group <? if ($profile->hasErrors('series_passport')) echo 'has-error';?>">
                            <?=$form->labelEx($profile,'series_passport', array('class' => 'col-lg-4 col-md-6 col-sm-6 col-xs-12 control-label'))?>
                            <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
                                <div class="input-group">
                                    <?=$form->textField($profile,'series_passport',array('class' => 'form-control'))?>
                                    <span class="input-group-addon">
                                        <i class="glyphicon glyphicon-book"></i>
                                    </span>
                                </div>
                                <span class="help-block" id="series_passporterror"><?=$form->error($profile,'series_passport')?></span>
                            </div>
                        </div>

				
<? /* -------------   ФАМИЛИЯ ПОЛЬЗОВАТЕЛЯ   -------------------   */ ?>        
                    <? elseif ($fieldAlias == 'last_name'): ?>
                        <div class="form-group <? if ($profilelang->hasErrors('last_name')) echo 'has-error';?>">
                            <?=$form->labelEx($profilelang,'last_name', array('class' => 'col-lg-4 col-md-6 col-sm-6 col-xs-12 control-label'))?>
                            <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
                                    <?=$form->textField($profilelang,'last_name',array('class' => 'form-control', 'size'=>60,'maxlength'=>255, 'title' => Yii::t('app', 'Данное поле должно содержать только латинские символы (a-z), русские символы (а-я) и дефис')))?>
                                <span class="help-block" id="last_nameerror"><?=$form->error($profilelang,'last_name')?></span>
                            </div>
                        </div>

				
<? /* -------------   ИМЯ ПОЛЬЗОВАТЕЛЯ   -------------------   */ ?>        
                    <? elseif ($fieldAlias == 'first_name'): ?>        
                        <div class="form-group <? if ($profilelang->hasErrors('first_name')) echo 'has-error';?>">
                            <?=$form->labelEx($profilelang,'first_name', array('class' => 'col-lg-4 col-md-6 col-sm-6 col-xs-12 control-label'))?>
                            <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
                                    <?=$form->textField($profilelang,'first_name',array('class' => 'form-control', 'size'=>60,'maxlength'=>255, 'title' => Yii::t('app', 'Данное поле должно содержать только латинские символы (a-z), русские символы (а-я) и дефис')))?>
                                <span class="help-block" id="first_nameerror"><?=$form->error($profilelang,'first_name')?></span>
                            </div>
                        </div>

				
<? /* -------------   ОТЧЕСТВО ПОЛЬЗОВАТЕЛЯ   -------------------   */ ?>        
                    <? elseif ($fieldAlias == 'second_name'): ?>        
                        <div class="form-group <? if ($profilelang->hasErrors('second_name')) echo 'has-error';?>">
                            <?=$form->labelEx($profilelang,'second_name', array('class' => 'col-lg-4 col-md-6 col-sm-6 col-xs-12 control-label'))?>
                            <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
                                    <?=$form->textField($profilelang,'second_name',array('class' => 'form-control', 'size'=>60,'maxlength'=>255, 'title' => Yii::t('app', 'Данное поле должно содержать только латинские символы (a-z), русские символы (а-я) и дефис')))?>
                                <span class="help-block" id="second_nameerror"><?=$form->error($profilelang,'second_name')?></span>
                            </div>
                        </div>

				
<? /* -------------   АДРЕС ПОЛЬЗОВАТЕЛЯ   -------------------   */ ?>        
                    <? elseif ($fieldAlias == 'address'): ?>        
                        <div class="form-group <? if ($profilelang->hasErrors('address')) echo 'has-error';?>">
                            <?=$form->labelEx($profilelang,'address', array('class' => 'col-lg-4 col-md-6 col-sm-6 col-xs-12 control-label'))?>
                            <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
                                <div class="input-group">
                                    <?=$form->textField($profilelang,'address',array('class' => 'form-control', 'size'=>60,'maxlength'=>500))?>
                                    <span class="input-group-addon">
                                        <i class="fa fa-home"></i>
                                    </span>
                                </div>
                                <span class="help-block" id="addresserror"><?=$form->error($profilelang,'address')?></span>
                            </div>
                        </div>

                
<? /* -------------   ФОТОГРАФИЯ ПОЛЬЗОВАТЕЛЯ   -------------------   */ ?>        
                    <? elseif ($fieldAlias == 'attachment__id'): ?>        

                        <div class="form-group <? if ($profile->hasErrors('attachment__id')) echo 'has-error';?>">
                            <?=$form->labelEx($profile,'attachment__id', array('class' => 'col-lg-4 col-md-6 col-sm-6 col-xs-12 control-label'))?>
                            <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
                                <div class="input-group choose-file input-large">
                                    <input type="text" class="form-control file-path" readonly />
                                    <?=CHtml::fileField('profile', null, array('class' => 'hidden'))?>
                                    <span class="input-group-btn">
                                        <span class="btn blue-chambray"><?=Yii::t('app', 'Обзор')?></span>
                                    </span>
                                </div>                            
                                <span class="help-block" id="attachment__iderror"><?=$form->error($profile,'attachment__id')?></span>
                            </div>
                        </div>               
                
				
<? /* -------------   КАПЧА   -------------------   */ ?>        
                    <? elseif ($fieldAlias == 'captcha'): ?>                
                        <div class="form-group <? if ($profile->hasErrors('captcha')) echo 'has-error';?>">
                            <?=$form->labelEx($profile,'captcha', array('class' => 'col-lg-4 col-md-6 col-sm-6 col-xs-12 control-label'))?>
                            <div class="col-md-8">
                                    <?=$form->textField($profile,'captcha',array('class' => 'form-control', 'value' => ''))?>
                                    <span class="col-md-4">
                                        <?php $this->widget('UTICaptcha', array('buttonLabel' => Yii::t('app', 'Обновить')))?>
                                    </span>
                                    <span class="col-md-8">
                                    <?=Yii::t('app', 'Пожалуйста, введите код с картинки')?>.<?=Yii::t('app', 'Можно вводить без учета регистра')?>.
                                    <span class="help-block" id="captchaerror"><?=$form->error($profile,'captcha')?></span>
                                    </span>
                            </div>
                        </div>
                    <? endif; ?>
				
                <? endforeach; ?>
                
                <?php $this->endWidget(); ?>                 
				
				<? if (empty($steps_array) || (!empty($form_agree_step) && $form_agree_step == $steps_array['step'])) : ?>
					<? if ($user == NULL) : ?>
						<div class="form-group <? if ($profile->hasErrors('form_agree')) echo 'has-error';?>">
                        <label for="ProfileRegister_form_agree" class="col-lg-4 col-md-6 col-sm-6 col-xs-12 control-label required <? if ($profile->hasErrors('form_agree')) echo 'error';?>">
                            Условия
                            <span class="required">*</span>
                        </label>
							<div class="col-lg-8 col-md-6 col-sm-6 col-xs-12 padding-top-10">
								<?=$form->checkBox($profile, 'form_agree') ?>&nbsp;<?=Yii::t('app', 'Я принимаю условия')?>&nbsp;<?=CHtml::link(Yii::t('app', 'соглашения'), $this->createUrl('/terms'), array('target' => '_blank'))?>&nbsp;<?=Yii::t('app', 'использования сайта')?>
								<span class="help-block" id="form_agreeerror">
								<?=$form->error($profile,'form_agree'); ?>
							</span>
							</div>							
						</div>
					<? endif; ?>
				<? endif; ?>
				
				<div class="form-group">
					<label class="col-lg-4 col-md-6 col-sm-6 col-xs-12 control-label"></label>
					<div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
						<?=CHtml::submitButton($user == NULL ? Yii::t('app', 'Зарегистрироваться') : Yii::t('app', 'Зарегистрировать'), array('name'=>'btn_register', 'class' => 'btn btn-primary')); ?>
					</div>			
				</div>
				<?php $this->endWidget(); ?>
			</div>
		</div>
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 pull-right" style="position: relative">
		  <div class="form-info" style="position: absolute; top: 100px; left: 0; opacity: 0;">
			<h2><em>Подсказка</em> для регистрации</h2>
			<p id="form-text-info"></p>
		  </div>
		</div>
	</div>
</div>

<script>
	$('.choose-file .btn').click(function(){
		$(this).closest('.choose-file').find('input[type="file"]').click();
	})
	
	$('.choose-file input[type="file"]').change(function(){
		val = $(this).val().split("\\");
		$(this).closest('.choose-file').find('.file-path').val(val[val.length-1]);
	})
</script>