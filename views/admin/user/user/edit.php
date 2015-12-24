<?=CHtml::hiddenField('asseturl', Yii::app()->assetManager->getPublishedUrl(Yii::getPathOfAlias('admin.modules.user.css')), array('id' => 'asseturl'))?>


<p class="note note-danger">
	<i class="fa fa-warning" style="margin-right: 10px;"></i> <?=Yii::t('app', 'Поля помеченные')?> <span class="required">*</span> <?=Yii::t('app', 'обязательны к заполнению.')?>
</p>
<div class="portlet green box">
	<div class="portlet-title">
		<div class="caption">
			<? if ((boolean)$model->isNewRecord == TRUE) : ?>
				<i class="glyphicon glyphicon-plus"></i> <?=Yii::t('app', 'Добавить')?>
			<? else : ?>
				<i class="glyphicon glyphicon-pencil"></i> <?=Yii::t('app', 'Редактировать данные')?>
			<? endif;?> <?=Yii::t('app', 'пользователя')?>
		</div>
	</div>
	<div class="portlet-body form form-horizontal">
		<? $is_attached = false; ?>
		<? if ((array_key_exists('attachment__id', $list)) && (Yii::app()->isModuleInstall('Attachment', '1.0.5')) && (Yii::app()->isPackageInstall('FileUpLoad')) && (!$model->isNewRecord) && ((bool)$list['sponsor__id']->is_user_filltype)): ?>
			<? $is_attached = true; ?>
			<div class="upload-wrapper">
            
                <div class="form-body">
                    <div class="mt20"></div>
            
                    <div class="form-group">
                        <label for="ProfileAdmin_attachment__id" class="control-label col-md-3 <? if ((array_key_exists('attachment__id', $list)) && ((bool)$list['attachment__id']->is_required)) : ?>required<? endif; ?>">
                            <?=$profile->getAttributeLabel('attachment__id')?>
                            <? if ((array_key_exists('attachment__id', $list)) && ((bool)$list['attachment__id']->is_required)) : ?>
                                <span class="required">*</span>
                            <? endif; ?>
                        </label>
                        <div class="col-md-9">
                            <div id="show_picture">
                            
                                <div id="widget_upload" style="display: none; margin-left: 15px; padding-top: 30px;">

                                    <?php $this->widget('FileUpLoad', array(  
                                        'action'				=>$this->createUrl('user/savePicture/id/' . $model->id),
                                        'after_loading_js_code'	=>'img_load(' . $model->id . ');', 
                                        'accept' 				=> 'image/*'
                                        ))->FileLoad(); 
                                    ?>
                                    
                                </div>
                                
                                <div id="picture_inner" style="display: inline;">
                                    <div style="display: inline;">
                                        <? if (($profile->attachment != NULL) && ($profile->attachment->secret_name != null)) : ?>
                                            <?=CHtml::image(MSmarty::attachment_get_file_name($profile->attachment->secret_name, $profile->attachment->raw_name, $profile->attachment->file_ext, '_office_profile', 'office_photo'), '', array('align' => 'left')); ?>
                                        <? else : ?>
                                            <?=CHtml::image(Yii::app()->assetManager->getPublishedUrl(Yii::getPathOfAlias('admin.modules.user.css')) . '/img/o.jpg', 'nophoto', array('height' => '200px', 'width' => '200px', 'align' => 'left'));?>
                                        <? endif; ?>
                                    </div>

                                    <div class="floater"></div>
                                    
                                    <div id="link_edit">
                                        <? if (($profile->attachment != NULL) && ($profile->attachment->secret_name != null)) : ?>
                                            <?=Chtml::link(Yii::t('app', 'Изменить'), 'javascript: void(0)', array('onClick' => 'editPhoto()', 'class' => 'btn green'));?>&nbsp;&nbsp;
                                            <?=Chtml::link(Yii::t('app', 'Удалить'), 'javascript: void(0)', array('onClick' => 'deletePhoto(' . $model->id . ', ' . $profile->attachment->id . ')', 'class' => 'btn red'));?>
                                        <? else : ?>
                                            <?=Chtml::link(Yii::t('app', 'Загрузить'), 'javascript: void(0)', array('onClick' => 'editPhoto()', 'style' => 'margin-right: 220px; margin-top: 10px;', 'class' => 'btn green'));?>
                                        <? endif; ?>                                
                                    </div>

                                </div>
                                
                            </div>
                            
                            <? if($profile->getError('attachment__id') != "") : ?>
                                <div class="help-block font-red" id="usernameerror"><?=$profile->getError('attachment__id')?></div>
                            <? endif; ?>                            
                            
                        </div>
                    </div>            
                </div>   
			</div>				
		<? endif?>
		<?php $form=$this->beginWidget('CActiveForm', array('id'=>'users-form','enableAjaxValidation'=>false, 'htmlOptions'=>array('enctype'=>'multipart/form-data'))); ?>
		<div class="form-body">
			<div class="mt20"></div>

            <?php $cities = $this->beginWidget('CitiesWidget', array()); ?>

            <? foreach ($list as $fieldAlias => $value) : ?>
            
<? /* -------------   СПОНСОР ПОЛЬЗОВАТЕЛЯ   -------------------   */ ?>
                <? if (($fieldAlias == 'sponsor__id') && (($value->is_user_filltype) || (!$model->isNewRecord))) : ?>     

                    <? if (($model->isNewRecord) || ((bool)$modelSecurity->is_allowed_change_sponsor)) : ?>
                
                        <div class="form-group">
                            <?=$form->labelEx($profile,'sponsor__id', array('class' => 'control-label col-md-3'))?>
                            <div class="col-md-9">
                                <?=CHtml::textField('sponsor_login', '', array('id' => 'sponsor_login', 'class' => 'form-control input-large'))?>
                                <?=$form->hiddenField($profile,'sponsor__id',array('size'=>60,'maxlength'=>100))?>
                                <? if($form->error($profile,'sponsor__id') != "") : ?>
                                    <div class="help-block font-red"><?=$form->error($profile,'sponsor__id')?></div>
                                <? endif; ?>
                                <div class="help-block font-red" id="sponsor__iderror"></div>
                            </div>
                        </div>
                        
                        <? if(array_key_exists('last_name', $list)): ?>
                            <div class="form-group">
                                <div class="col-md-3 control-label"><?=Yii::t('app', 'Фамилия лично-пригласившего')?></div>
                                <div class="col-md-9" id="sponsor_last_name"></div>
                            </div>
                        <? endif; ?>

                        <? if(array_key_exists('first_name', $list)): ?>
                            <div class="form-group">
                                <div class="col-md-3 control-label"><?=Yii::t('app', 'Имя лично-пригласившего')?></div>
                                <div class="col-md-9" id="sponsor_first_name"></div>
                            </div>
                        <? endif; ?>

                        <? if(array_key_exists('second_name', $list)): ?>
                            <div class="form-group">
                                <div class="col-md-3 control-label"><?=Yii::t('app', 'Отчество лично-пригласившего')?></div>
                                <div class="col-md-9" id="sponsor_second_name"></div>
                            </div>
                        <? endif; ?>
			
                    <? else : ?>
                    
                        <div class="form-group">
                            <?=$form->label($profile,'sponsor__id', array('class' => 'control-label col-md-3'))?>
                            <div class="col-md-9">
                                <? if ($profile->sponsor != NULL) : ?>
                                    <p class="form-control-static"><?=CHtml::encode($profile->sponsor->username)?></p>
                                <? endif; ?>
                                <? if($form->error($profile,'sponsor__id') != "") : ?>
                                    <div class="help-block font-red"><?=$form->error($profile,'sponsor__id')?></div>
                                <? endif; ?>
                                <div class="help-block font-red" id="sponsor__iderror"></div>
                            </div>
                        </div>
                        
                        <? if(array_key_exists('last_name', $list)): ?>
                            <div class="form-group">
                                <div class="col-md-3 control-label"><?=Yii::t('app', 'Фамилия лично-пригласившего')?></div>
                                <div class="col-md-9" id="sponsor_last_name">
                                    <? if ($profile->sponsor != NULL) : ?>
                                        <p class="form-control-static"><?=CHtml::encode($profile->sponsor->lang->last_name)?></p>
                                    <? endif; ?>                                
                                </div>
                            </div>
                        <? endif; ?>

                        <? if(array_key_exists('first_name', $list)): ?>
                            <div class="form-group">
                                <div class="col-md-3 control-label"><?=Yii::t('app', 'Имя лично-пригласившего')?></div>
                                <div class="col-md-9" id="sponsor_first_name">
                                    <? if ($profile->sponsor != NULL) : ?>
                                        <p class="form-control-static"><?=CHtml::encode($profile->sponsor->lang->first_name)?></p>
                                    <? endif; ?>                                
                                </div>
                            </div>
                        <? endif; ?>

                        <? if(array_key_exists('second_name', $list)): ?>
                            <div class="form-group">
                                <div class="col-md-3 control-label"><?=Yii::t('app', 'Отчество лично-пригласившего')?></div>
                                <div class="col-md-9" id="sponsor_second_name">
                                    <? if ($profile->sponsor != NULL) : ?>
                                        <p class="form-control-static"><?=CHtml::encode($profile->sponsor->lang->second_name)?></p>
                                    <? endif; ?>                                
                                </div>
                            </div>
                        <? endif; ?>                    
                    
                    <? endif; ?>
            
            
			
<? /* -------------   ЛОГИН ПОЛЬЗОВАТЕЛЯ   -------------------   */ ?>
                <? elseif (($fieldAlias == 'username') && (($value->is_user_filltype) || (!$model->isNewRecord))) : ?> 
                    <div class="form-group">
                        <?=$form->labelEx($model,'username', array('class' => 'control-label col-md-3'))?>
                        <div class="col-md-9">
                            <? if (((bool)$modelSecurity->is_allowed_edit_username) || ($model->isNewRecord)) : ?>
                                <?=$form->textField($model,'username',array('size'=>60,'maxlength'=>100, 'class' => 'form-control input-large'))?>
                            <? else : ?>
                                <p class="form-control-static"><?=CHtml::encode($model->username)?></p>
                            <? endif; ?>
                            <? if($form->error($model,'username') != "") : ?>
                                <div class="help-block font-red" id="usernameerror"><?=$form->error($model,'username')?></div>
                            <? endif; ?>
                        </div>
                    </div>
			
            
<? /* -------------   EMAIL ПОЛЬЗОВАТЕЛЯ   -------------------   */ ?>
                <? elseif (($fieldAlias == 'email') && (($value->is_user_filltype) || (!$model->isNewRecord))) : ?>
                    <div class="form-group">
                        <?=$form->labelEx($model,'email', array('class' => 'control-label col-md-3'))?>
                        <div class="col-md-9">
                            <?=$form->textField($model,'email',array('size'=>60,'maxlength'=>100, 'class' => 'form-control input-large'))?>
                            <? if($form->error($model,'email') != "") : ?>
                                <div class="help-block font-red" id="emailerror"><?=$form->error($model,'email')?></div>
                            <? endif; ?>
                        </div>
                    </div>
			
            
<? /* -------------   ПАРОЛЬ ПОЛЬЗОВАТЕЛЯ   -------------------   */ ?>
                <? elseif (($fieldAlias == 'password') && (($value->is_user_filltype) || (!$model->isNewRecord))) : ?>
                    <? if ($model->isNewRecord) : ?>
                        <? if (($list['password']->param != NULL) && ($list['password']->param->show_type == UsersRegisterFieldsParams::SHOW_TYPE_PASSWORD)) : ?>
                            <div class="form-group">
                                <?=$form->labelEx($model,'password', array('class' => 'control-label col-md-3')); ?>
                                <div class="col-md-9">
                                    <?=$form->passwordField($model, 'password', array('size' => 20,'maxlength' => 20, 'class' => 'form-control input-large')); ?>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="Users_password" class="control-label col-md-3"><?=Yii::t('app', 'Еще раз пароль')?><span class="required">*</span></label>
                                <div class="col-md-9">
                                    <?=$form->passwordField($model, 'password_confirm', array('size' => 20,'maxlength' => 20, 'class' => 'form-control input-large')); ?>
                                </div>
                            </div>
                            
                        <? elseif (($list['password']->param != NULL) && ($list['password']->param->show_type == UsersRegisterFieldsParams::SHOW_TYPE_TEXT)) : ?>
                            
                            <div class="form-group">
                                <?=$form->labelEx($model,'password', array('class' => 'control-label col-md-3'))?>
                                <div class="col-md-9">
                                    <?=$form->textField($model,'password',array('size'=>60,'maxlength'=>100, 'class' => 'form-control input-large noPasswordEffects'))?>
                                </div>
                            </div>
        
                        <? elseif (($list['password']->param != NULL) && ($list['password']->param->show_type == UsersRegisterFieldsParams::SHOW_TYPE_DYNAMIC)) : ?>
                            
                            <div class="form-group" id="passwordsDesc_password">
                                <?=$form->labelEx($model, 'password', array('class' => 'control-label col-md-3')); ?>
                                <div class="col-md-9">
                                    <?=$form->passwordField($model, 'password', array('size' => 20,'maxlength' => 20, 'class' => 'form-control input-large', 'name' => 'Users[password_w]', 'id' => 'Users_password_w')); ?>
                                </div>
                                
                            </div>
                            
                            <div class="form-group" id="passwordsFields_password">
                                <label for="Users_password" class="control-label col-md-3"><?=Yii::t('app', 'Подтверждение пароля')?></label>
                                <div class="col-md-9">
                                    <?=$form->passwordField($model, 'password_confirm', array('size'=>20,'maxlength'=>20, 'class' => 'form-control input-large', 'name' => 'Users[password_confirm_w]', 'id' => 'Users_password_confirm_w')); ?>
                                </div>
                            </div>
                            
                            <div class="form-group" id="passwordShow_password" style="display: none;">
                                <?=$form->labelEx($model, 'password', array('class' => 'control-label col-md-3'))?>
                                <div class="col-md-9">
                                    <?=$form->textField($model, 'password', array('size' => 60,'maxlength' => 100, 'class' => 'form-control input-large', 'name' => 'Users[password_n]', 'id' => 'Users_password_n'))?>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-md-9">
                                    <?=CHtml::checkBox('show_pass', FALSE, array('id' => 'showPasswordCheckBox', 'style' => 'width: 15px;', 'passId' => 'password'))?>&nbsp;&nbsp;<?=Yii::t('app', 'Показывать пароль')?>
                                </div>
                            </div>
                        <? endif; ?>
                        <div class="form-group">
                            <div class="col-md-3"></div>
                            <div class="col-md-9 font-red" id="passworderror">
                                <? if($form->error($model,'password') != "") : ?>
                                    <div class="help-block"><?=$form->error($model,'password')?></div>
                                <? endif; ?>
                                <? if($form->error($model,'password_confirm') != "") : ?>
                                    <div class="help-block"><?=$form->error($model,'password_confirm')?></div>
                                <? endif; ?>
                            </div>
                        </div>
                    <? else : ?>
                        <? if (((bool)$modelSecurity->is_allowed_view_password) && (!(bool)$modelSecurity->is_allowed_edit_password)) : ?>
                            <div class="form-group">
                                <?=$form->labelEx($model,'password', array('class' => 'control-label col-md-3'))?>
                                <div class="col-md-9">
                                    <?=CHtml::encode($model->password)?>
                                </div>
                            </div>
                        <? elseif (((bool)$modelSecurity->is_allowed_view_password) && ((bool)$modelSecurity->is_allowed_edit_password)) : ?>
                            <div class="form-group" id="password_static">
                                <div class="col-md-3 control-label"><?=Yii::t('app', 'Текущий пароль пользователя')?>:</div>
                                <div class="col-md-9">
                                    <?=CHtml::encode($password)?><br />
                                    <?=CHtml::link(Yii::t('app', 'Изменить'), 'javascript: void(0)', array('onClick' => 'showPassword()'))?>
                                </div>
                            </div>
                            <div class="form-group" id="password_dyn1" style="display: none;">
                                <div class="col-md-3 control-label"><?=Yii::t('app', 'Новый пароль')?></div>
                                <div class="col-md-9">
                                    <?=$form->passwordField($model,'password',array('size'=>20,'maxlength'=>20, 'class' => 'form-control input-large', 'value' => null)); ?>
                                </div>
                            </div>
                            <div class="form-group" id="password_dyn2" style="display: none;">
                                <label for="Users_password" class="col-md-3 control-label"><?=Yii::t('app', 'Еще раз новый пароль')?></label>
                                <div class="col-md-9">
                                    <?=$form->passwordField($model,'password_confirm',array('size'=>20,'maxlength'=>20, 'class' => 'form-control input-large', 'value' => null)); ?>
                                </div>
                            </div>
                            <div class="form-group" id="password_dyn3" style="display: none;">
                                <div class="col-md-3"></div>
                                <div class="col-md-9">
                                    <?=CHtml::link(Yii::t('app', 'Отмена'), 'javascript: void(0)', array('class' => 'btn red', 'onClick' => 'hidePassword()'))?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-3"></div>
                                <div class="col-md-9 font-red" id="passworderror">
                                    <? if($form->error($model,'password') != "") : ?>
                                        <div class="help-block"><?=$form->error($model,'password')?></div>
                                    <? endif; ?>
                                    <? if($form->error($model,'password_confirm') != "") : ?>
                                        <div class="help-block"><?=$form->error($model,'password_confirm')?></div>
                                    <? endif; ?>
                                </div>
                            </div>
                        <? endif; ?>
                    <? endif; ?>
			
            
<? /* -------------   ФИНАНСОВЫЙ ПАРОЛЬ ПОЛЬЗОВАТЕЛЯ   -------------------   */ ?>
                <? elseif (($fieldAlias == 'finpassword') && ($value->is_user_filltype) && (($model->isNewRecord) || ((($model->finpassword == NULL) || ($model->getError('finpassword') != '') || ($model->getError('finpassword_confirm') != '')) && ((bool)$value->is_required)))) : ?>
                    <? if ($model->isNewRecord) : ?>
                    
                        <? if (($list['finpassword']->param != NULL) && ($list['finpassword']->param->show_type == UsersRegisterFieldsParams::SHOW_TYPE_PASSWORD)) : ?>
                            <div class="form-group">
                                <?=$form->labelEx($model,'finpassword', array('class' => 'control-label col-md-3')); ?>
                                <div class="col-md-9">
                                    <?=$form->passwordField($model, 'finpassword', array('size' => 20,'maxlength' => 20, 'class' => 'form-control input-large')); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 <? if ((bool)$list['finpassword']->is_required) : ?>required<? endif; ?>" for="UsersAdmin_finpassword"><?=Yii::t('app', 'Еще раз финансовый пароль')?><? if ((bool)$list['finpassword']->is_required) : ?><span class="required">*</span><? endif; ?></label>
                                <div class="col-md-9">
                                    <?=$form->passwordField($model, 'finpassword_confirm', array('size' => 20,'maxlength' => 20, 'class' => 'form-control input-large')); ?>
                                </div>
                            </div>
                            
                        <? elseif (($list['finpassword']->param != NULL) && ($list['finpassword']->param->show_type == UsersRegisterFieldsParams::SHOW_TYPE_TEXT)) : ?>
                            <div class="form-group">
                                <?=$form->labelEx($model,'finpassword', array('class' => 'control-label col-md-3'))?>
                                <div class="col-md-9">
                                    <?=$form->textField($model,'finpassword',array('size'=>60,'maxlength'=>100, 'class' => 'form-control input-large noPasswordEffects'))?>
                                </div>
                            </div>
                            
                        <? elseif (($list['finpassword']->param != NULL) && ($list['finpassword']->param->show_type == UsersRegisterFieldsParams::SHOW_TYPE_DYNAMIC)) : ?>
                            
                            <div class="form-group" id="finpasswordsDesc_finpassword">
                                <?=$form->labelEx($model, 'finpassword', array('class' => 'control-label col-md-3')); ?>
                                <div class="col-md-9">
                                    <?=$form->passwordField($model, 'finpassword', array('size' => 20,'maxlength' => 20, 'class' => 'form-control input-large', 'name' => 'Users[finpassword_w]', 'id' => 'Users_finpassword_w')); ?>
                                </div>
                            </div>
                            <div class="form-group" id="finpasswordsFields_finpassword">
                                <label class="control-label col-md-3 <? if ((bool)$list['finpassword']->is_required) : ?>required<? endif; ?>" for="UsersAdmin_finpassword"><?=Yii::t('app', 'Подтверждение финансового пароля')?><? if ((bool)$list['finpassword']->is_required) : ?><span class="required">*</span><? endif; ?></label>
                                <div class="col-md-9">
                                    <?=$form->passwordField($model, 'finpassword_confirm', array('size'=>20,'maxlength'=>20, 'class' => 'form-control input-large', 'name' => 'Users[finpassword_confirm_w]', 'id' => 'Users_finpassword_confirm_w')); ?>
                                </div>
                            </div>
                            <div class="form-group" id="finpasswordShow_finpassword" style="display: none;">
                                <?=$form->labelEx($model, 'finpassword', array('class' => 'control-label col-md-3'))?>
                                <div class="col-md-9">
                                    <?=$form->textField($model, 'finpassword', array('size' => 60,'maxlength' => 100, 'class' => 'form-control input-large', 'name' => 'Users[finpassword_n]', 'id' => 'Users_finpassword_n'))?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-3"><?=Yii::t('app', 'Показывать финансовый пароль')?></div>
                                <div class="col-md-9">
                                    <?=CHtml::checkBox('show_finpass', FALSE, array('id' => 'showFinPasswordCheckBox', 'style' => 'width: 15px;', 'passId' => 'finpassword'))?>&nbsp;&nbsp;
                                </div>
                            </div>
                            
                        <? endif; ?>
                        <div class="form-group">
                            <div class="col-md-3"></div>
                            <div class="col-md-9 font-red" id="passworderror">
                                <? if($form->error($model,'finpassword') != "") : ?>
                                    <div class="help-block"><?=$form->error($model,'finpassword')?></div>
                                <? endif; ?>
                                <? if($form->error($model,'finpassword_confirm') != "") : ?>
                                    <div class="help-block"><?=$form->error($model,'finpassword_confirm')?></div>
                                <? endif; ?>
                            </div>
                        </div>
                    <? else : ?>
                        <? if (((bool)$modelSecurity->is_allowed_view_finpassword) && (!(bool)$modelSecurity->is_allowed_edit_finpassword)) : ?>
                            <div class="form-group">
                                <?=$form->labelEx($model,'finpassword', array('class' => 'control-label col-md-3 no-margin'))?>
                                <div class="col-md-9">
                                    <?=CHtml::encode($model->finpassword)?>
                                </div>
                            </div>
                        <? elseif ((((bool)$modelSecurity->is_allowed_view_finpassword) && ((bool)$modelSecurity->is_allowed_edit_finpassword)) || ($model->finpassword == NULL) || ($model->getError('finpassword') != '') || ($model->getError('finpassword_confirm') != '')) : ?>
                            <div class="form-group" id="finpassword_static">
                                <label class="control-label col-md-3 required" for="UsersAdmin_finpassword">
                                    <?=Yii::t('app', 'Текущий финансовый пароль пользователя')?> <? if ($list['finpassword']->is_required) : ?><span class="required">*</span><? endif; ?>
                                </label>
                                <div class="col-md-9">
                                    <?=CHtml::encode($finpassword)?><br />
                                    <?=CHtml::link(Yii::t('app', 'Изменить'), 'javascript: void(0)', array('onClick' => 'showFinPassword()'))?>
                                </div>
                            </div>
                            <div class="form-group" id="finpassword_dyn1" style="display: none;">
                                <label class="control-label col-md-3"><?=Yii::t('app', 'Новый финансовый пароль')?></label>
                                <div class="col-md-9">
                                    <?=$form->passwordField($model,'finpassword',array('size'=>20,'maxlength'=>20, 'class' => 'form-control input-large', 'value' => null)); ?>
                                </div>
                            </div>
                            <div class="form-group" id="finpassword_dyn2" style="display: none;">
                                <label class="control-label col-md-3" for="Users_finpassword"><?=Yii::t('app', 'Еще раз новый финансовый пароль')?></label>
                                <div class="col-md-9">
                                    <?=$form->passwordField($model,'finpassword_confirm',array('size'=>20,'maxlength'=>20, 'class' => 'form-control input-large', 'value' => null)); ?>
                                </div>
                            </div>
                            <div class="form-group" id="finpassword_dyn3" style="display: none;">
                                <div class="col-md-3"></div>
                                <div class="col-md-9">
                                    <?=CHtml::link(Yii::t('app', 'Отмена'), 'javascript: void(0)', array('onClick' => 'hideFinPassword()'))?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-3"></div>
                                <div class="col-md-9" id="passworderror">
                                    <? if($form->error($model,'finpassword') != "") : ?>
                                        <div class="help-block font-red"><?=$form->error($model,'finpassword')?></div>
                                    <? endif; ?>
                                    <? if($form->error($model,'finpassword_confirm') != "") : ?>
                                        <div class="help-block font-red"><?=$form->error($model,'finpassword_confirm')?></div>
                                    <? endif; ?>
                                </div>
                            </div>
                        <? endif; ?>
                    <? endif; ?>
			
            
<? /* -------------   СЕКРЕТНЫЙ ВОПРОС   -------------------   */ ?>

                <? elseif (($fieldAlias == 'question') && ($value->is_user_filltype) && (($model->isNewRecord) || ($model->answer == NULL))) : ?>
                        <div class="form-group">
                            <?=$form->labelEx($profile,'question', array('class' => 'control-label col-md-3')); ?>
                            <div class="col-md-9">
                                <?php echo $form->ListBox($profile,'question', $questionList['selectBox'], array('class' => 'form-control input-large', 'size' => 0)); ?>
                                <? if($form->error($profile,'question') != "") : ?>
                                    <div class="help-block font-red" id="emailerror"><?=$form->error($profile,'question')?></div>
                                <? endif; ?>
                            </div>
                        </div>


<? /* -------------   ОТВЕТ НА СЕКРЕТНЫЙ ВОПРОС ПОЛЬЗОВАТЕЛЯ   -------------------   */ ?>
                <? elseif (($fieldAlias == 'answer') && ($value->is_user_filltype) && (($model->isNewRecord) || ($model->answer == NULL))) : ?>            
                
                    
                        <div class="form-group">
                            <?=$form->labelEx($profile,'answer', array('class' => 'control-label col-md-3')); ?>
                            <div class="col-md-9">
                                <?php echo $form->textField($profile,'answer', array('class' => 'form-control input-large')); ?>
                                <? foreach ($questionList['divBox'] as $question) : ?>
                                    <div style="display: none;" class="help-block text-mute answer-desc" id="answer-desc-<?=$question->id?>">
                                        <?=CHtml::encode($question->lang->description)?>
                                    </div>
                                <? endforeach;?>
                                <? if($form->error($profile,'answer') != "") : ?>
                                    <div class="help-block font-red" id="emailerror">
                                        <?=$form->error($profile,'answer')?>
                                    </div>
                                <? endif; ?>
                            </div>						
                        </div>
        
			
<? /* -------------   ФОТОГРАФИЯ ПОЛЬЗОВАТЕЛЯ   -------------------   */ ?>        
                <? elseif (($fieldAlias == 'attachment__id') && (($value->is_user_filltype) || (!$model->isNewRecord))) : ?>
                    <? if ($model->isNewRecord) : ?>
                        <div class="form-group">
                            <?=$form->labelEx($profile,'attachment__id', array('class' => 'control-label col-md-3')); ?>
                            <div class="col-md-9">
                                <div class="input-group choose-file input-large">
                                    <input type="text" class="form-control file-path" readonly />
                                    <?=CHtml::fileField('profile', null, array('class' => 'hidden'))?>
                                    <span class="input-group-btn">
                                        <span class="btn blue-chambray">Обзор</span>
                                    </span>
                                </div>
                                <? if($form->error($profile,'attachment__id') != "") : ?>
                                    <div class="help-block font-red" id="emailerror">
                                        <?=$form->error($profile,'attachment__id')?>
                                    </div>
                                <? endif; ?>
                            </div>
                        </div>
                    <? endif?>
			
            
<? /* -------------   ТЕЛЕФОН ПОЛЬЗОВАТЕЛЯ   -------------------   */ ?>
                <? elseif (($fieldAlias == 'phone') && (($value->is_user_filltype) || (!$model->isNewRecord))) : ?>
                    <div class="form-group">
                        <?=$form->labelEx($profile,'phone', array('class' => 'control-label col-md-3')); ?>
                        <div class="col-md-9">
                            <? if (($list['phone']->param != NULL) && ((bool)$list['phone']->param->is_specific_widget)) : ?>
                                <div class="input-group input-large">
                                    <?php $this->widget('PhoneWidget')->activePhoneField($profile, 'phone', array('class' => 'form-control')); ?>
                                </div>
                            <? else : ?>
                                <?=$form->textField($profile,'phone',array('size'=>20,'maxlength'=>20, 'class' => 'form-control input-large')); ?>
                            <? endif; ?>
                            <? if($form->error($profile,'phone') != "") : ?>
                                <div class="help-block font-red" id="phoneerror">
                                    <?=$form->error($profile,'phone')?>
                                </div>
                            <? endif; ?>
                        </div>
                    </div>
            
            
<? /* -------------   СКАЙП ПОЛЬЗОВАТЕЛЯ   -------------------   */ ?>
                <? elseif (($fieldAlias == 'skype') && (($value->is_user_filltype) || (!$model->isNewRecord))) : ?>
                    <div class="form-group">
                        <?=$form->labelEx($profile,'skype', array('class' => 'control-label col-md-3')); ?>
                        <div class="col-md-9">
                            <?=$form->textField($profile,'skype',array('size'=>30,'maxlength'=>30, 'class' => 'form-control input-large')); ?>
                            <? if($form->error($profile,'skype') != "") : ?>
                                <div class="help-block font-red" id="skypeerror">
                                    <?=$form->error($profile,'skype')?>
                                </div>
                            <? endif; ?>
                        </div>
                    </div>
            
            
<? /* -------------   ДАТА РОЖДЕНИЯ ПОЛЬЗОВАТЕЛЯ   -------------------   */ ?>
                <? elseif (($fieldAlias == 'birthday') && (($value->is_user_filltype) || (!$model->isNewRecord))) : ?>
                
                    <?
                        //BEGIN ЭТОТ БЛОК НУЖЕН ДЛЯ РАБОТЫ КАЛЕНДАРЯ МЕТРОНИКА
                        Yii::app()->clientScript->registerCssFile(Yii::app()->params['hostMetronikStatic'] . '/public/assets/global/plugins/bootstrap-datepicker/css/datepicker3.css');
                        Yii::app()->clientScript->registerScriptFile(Yii::app()->params['hostMetronikStatic'] . '/public/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js', CClientScript::POS_END);
                        Yii::app()->clientScript->registerScriptFile(Yii::app()->params['hostMetronikStatic'] . '/public/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js', CClientScript::POS_END);
                        Yii::app()->clientScript->registerScriptFile(Yii::app()->params['hostMetronikStatic'] . '/public/assets/global/plugins/bootstrap-datepicker/js/locales/bootstrap-datepicker.' . Yii::app()->language . '.js', CClientScript::POS_END);
                        Yii::app()->clientScript->registerCssFile(Yii::app()->params['hostMetronikStatic'] . '/public/assets/global/css/plugins.css');
                                            
                        Yii::app()->clientScript->registerScript('adminadd', '
                                    if (jQuery().datepicker) {
                                        datep = $(".datepicker-admin").datepicker({
                                            rtl: Metronic.isRTL(),
                                            orientation: "right",
                                            autoclose: true,
                                            format: "dd.mm.yyyy",
                                            language: "' . Yii::app()->language . '"
                                        });

                                        }
                        ', CClientScript::POS_END);
                        //END ЭТОТ БЛОК НУЖЕН ДЛЯ РАБОТЫ КАЛЕНДАРЯ МЕТРОНИКА
                    ?>          
                
                    <div class="form-group">
                        <?=$form->labelEx($profile,'birthday', array('class' => 'control-label col-md-3')); ?>
                        
                        <div class="col-md-9">
                            <div class="input-group date datepicker-admin input-large" data-date-format="dd.mm.yyyy" data-date-start-date="-100y">
                                <?=$form->textField($profile,'birthday', array('class' => 'form-control', 'readonly' => 'readonly', 'title' => Yii::t('app', 'Для выбора другого месяца, щелкните по названию месяца и года. Для выбора другого года, щелкните по названию месяца и года, и потом по году.'))); ?>
                                <span class="input-group-btn">
                                    <button class="btn default" type="button" style="margin-right: 0;"><i class="fa fa-calendar"></i></button>
                                </span>
                            </div>   
                            <? if($form->error($profile,'birthday') != "") : ?>
                                <div class="help-block font-red" id="birthdayerror">
                                    <?=$form->error($profile,'birthday')?>
                                </div>
                            <? endif; ?>                            
                        </div>
                    </div>
                
                
<? /* -------------   ПОЛ ПОЛЬЗОВАТЕЛЯ   -------------------   */ ?>
                <? elseif (($fieldAlias == 'sex') && (($value->is_user_filltype) || (!$model->isNewRecord))) : ?>
                    <div class="form-group">
                        <?=$form->labelEx($profile,'sex', array('class' => 'control-label col-md-3')); ?>
                        <div class="col-md-9">
                            <?php echo $form->ListBox($profile,'sex', Profile::getSexList(UsersRegisterObjectTypes::TypeAliasAdminadd), array('class' => 'form-control input-large', 'size' => 0)); ?>
                            <? if($form->error($profile,'sex') != "") : ?>
                                <div class="help-block font-red" id="sexerror">
                                    <?=$form->error($profile,'sex')?>
                                </div>
                            <? endif; ?>
                        </div>
                    </div>
			
            
<? /* -------------   СТРАНА ПОЛЬЗОВАТЕЛЯ   -------------------   */ ?>
                <? elseif (($fieldAlias == 'country_name') && (($value->is_user_filltype) || (!$model->isNewRecord))) : ?>
                    <div class="form-group">
                        <?=$form->labelEx($profilelang,'country_name', array('class' => 'control-label col-md-3')); ?>
                        <div class="col-md-9">
                            <div class="input-large">
                            <? if (($list['country_name']->param != NULL) && ((bool)$list['country_name']->param->is_specific_widget)) : ?>
                                <?php $cities->countries($profile->country__id, 'ProfileAdmin_country__id', 'ProfileAdmin[country__id]'); ?>
                            <? else : ?>
                                <?=$form->textField($profilelang,'country_name', array('class' => 'form-control')); ?>
                            <? endif; ?>
                            <? if($form->error($profilelang,'country_name') != "") : ?>
                                <div class="help-block font-red" id="country_nameerror">
                                    <?=$form->error($profilelang,'country_name')?>
                                </div>
                            <? endif; ?>
                            </div>
                        </div>
                    </div>
            
            
<? /* -------------   ОБЛАСТЬ ПОЛЬЗОВАТЕЛЯ   -------------------   */ ?>
                <? elseif (($fieldAlias == 'region_name') && (($value->is_user_filltype) || (!$model->isNewRecord))) : ?>
                    <div class="form-group">
                        <?=$form->labelEx($profilelang,'region_name', array('class' => 'control-label col-md-3')); ?>
                        <div class="col-md-9">
                            <div class="input-large">
                            <? if (($list['region_name']->param != NULL) && ((bool)$list['region_name']->param->is_specific_widget)) : ?>
                                <?php $cities->regions($profile->region__id, $profile->country__id, 'ProfileAdmin_region__id', 'ProfileAdmin[region__id]'); ?>
                            <? else : ?>
                                <?=$form->textField($profilelang,'region_name', array('class' => 'form-control')); ?>
                            <? endif; ?>
                            <? if($form->error($profilelang,'region_name') != "") : ?>
                                <div class="help-block font-red" id="region_nameerror">
                                    <?=$form->error($profilelang,'region_name')?>
                                </div>
                            <? endif; ?>
                            </div>
                        </div>
                    </div>
				
                
<? /* -------------   ГОРОД ПОЛЬЗОВАТЕЛЯ   -------------------   */ ?>
                <? elseif (($fieldAlias == 'city_name') && (($value->is_user_filltype) || (!$model->isNewRecord))) : ?>
                    <div class="form-group">
                        <?=$form->labelEx($profilelang,'city_name', array('class' => 'control-label col-md-3')); ?>
                        <div class="col-md-9">
                            <div class="input-large">
                            <? if (($list['city_name']->param != NULL) && ((bool)$list['city_name']->param->is_specific_widget)) : ?>
                                <?php $cities->cities($profile->city__id, $profile->region__id, 'ProfileAdmin_city__id', 'ProfileAdmin[city__id]'); ?>
                            <? else : ?>
                                <?=$form->textField($profilelang,'city_name', array('class' => 'form-control')); ?>
                            <? endif; ?>
                            <? if($form->error($profilelang,'city_name') != "") : ?>
                                <div class="help-block font-red" id="city__iderror">
                                    <?=$form->error($profilelang,'city_name')?>
                                </div>
                            <? endif; ?>
                            </div>
                        </div>
                    </div>

			
<? /* -------------   ПОЧТОВЫЙ ИНДЕКС ПОЛЬЗОВАТЕЛЯ   -------------------   */ ?>
                <? elseif (($fieldAlias == 'zip_code') && (($value->is_user_filltype) || (!$model->isNewRecord))) : ?>
                    <div class="form-group">
                        <?=$form->labelEx($profile,'zip_code', array('class' => 'control-label col-md-3')); ?>
                        <div class="col-md-9">
                            <?=$form->textField($profile,'zip_code', array('class' => 'form-control input-large')); ?>
                            <? if($form->error($profile,'zip_code') != "") : ?>
                                <div class="help-block font-red" id="zip_codeerror">
                                    <?=$form->error($profile,'zip_code')?>
                                </div>
                            <? endif; ?>
                        </div>
                    </div>


<? /* -------------   СЕРИЯ ПАСПОРТА ПОЛЬЗОВАТЕЛЯ   -------------------   */ ?>
                <? elseif (($fieldAlias == 'series_passport') && (($value->is_user_filltype) || (!$model->isNewRecord))) : ?>
                    <div class="form-group">
                        <?=$form->labelEx($profile,'series_passport', array('class' => 'control-label col-md-3')); ?>
                        <div class="col-md-9">
                            <?=$form->textField($profile,'series_passport', array('class' => 'form-control input-large')); ?>
                            <? if($form->error($profile,'series_passport') != "") : ?>
                                <div class="help-block font-red" id="series_passporterror">
                                    <?=$form->error($profile,'series_passport')?>
                                </div>
                            <? endif; ?>
                        </div>
                    </div>

		
<? /* -------------   ФАМИЛИЯ ПОЛЬЗОВАТЕЛЯ   -------------------   */ ?>
                <? elseif (($fieldAlias == 'last_name') && (($value->is_user_filltype) || (!$model->isNewRecord))) : ?>
                    <div class="form-group">
                        <?=$form->labelEx($profilelang,'last_name', array('class' => 'control-label col-md-3')); ?>
                        <div class="col-md-9">
                            <?=$form->textField($profilelang,'last_name',array('size'=>60,'maxlength'=>255, 'class' => 'form-control input-large')); ?>
                            <? if($form->error($profilelang,'last_name') != "") : ?>
                                <div class="help-block font-red" id="last_nameerror">
                                    <?=$form->error($profilelang,'last_name')?>
                                </div>
                            <? endif; ?>
                        </div>
                    </div>

            
<? /* -------------   ИМЯ ПОЛЬЗОВАТЕЛЯ   -------------------   */ ?>
                <? elseif (($fieldAlias == 'first_name') && (($value->is_user_filltype) || (!$model->isNewRecord))) : ?>
                    <div class="form-group">
                        <?=$form->labelEx($profilelang,'first_name', array('class' => 'control-label col-md-3')); ?>
                        <div class="col-md-9">
                            <?=$form->textField($profilelang,'first_name',array('size'=>60,'maxlength'=>255, 'class' => 'form-control input-large')); ?>
                            <? if($form->error($profilelang,'first_name') != "") : ?>
                                <div class="help-block font-red" id="first_nameerror">
                                    <?=$form->error($profilelang,'first_name')?>
                                </div>
                            <? endif; ?>
                        </div>
                    </div>
         

<? /* -------------   ОТЧЕСТВО ПОЛЬЗОВАТЕЛЯ   -------------------   */ ?>
                <? elseif (($fieldAlias == 'second_name') && (($value->is_user_filltype) || (!$model->isNewRecord))) : ?>
                    <div class="form-group">
                        <?=$form->labelEx($profilelang,'second_name', array('class' => 'control-label col-md-3')); ?>
                        <div class="col-md-9">
                            <?=$form->textField($profilelang,'second_name',array('size'=>60,'maxlength'=>255, 'class' => 'form-control input-large')); ?>
                            <? if($form->error($profilelang,'second_name') != "") : ?>
                                <div class="help-block font-red" id="second_nameerror">
                                    <?=$form->error($profilelang,'second_name')?>
                                </div>
                            <? endif; ?>
                        </div>
                    </div>


<? /* -------------   АДРЕС ПОЛЬЗОВАТЕЛЯ   -------------------   */ ?>
                <? elseif (($fieldAlias == 'address') && (($value->is_user_filltype) || (!$model->isNewRecord))) : ?>
                    <div class="form-group">
                        <?=$form->labelEx($profilelang,'address', array('class' => 'control-label col-md-3')); ?>
                        <div class="col-md-9">
                            <?=$form->textField($profilelang,'address',array('size'=>60,'maxlength'=>500, 'class' => 'form-control input-large')); ?>
                            <? if($form->error($profilelang,'address') != "") : ?>
                                <div class="help-block font-red" id="addresserror">
                                    <?=$form->error($profilelang,'address')?>
                                </div>
                            <? endif; ?>
                        </div>
                    </div>


                <? endif; ?>    
            
            <? endforeach; ?>
            
            <?php $this->endWidget(); ?>

                
			<div class="form-group">
				<div class="col-md-3 text-right" style="font-size: 14px;">
					<?=Yii::t('app', 'Роли для пользователя')?>
				</div>
				<div class="col-md-9">
					<?=CHtml::checkBoxList('UserRoles', $selected, $modelsAuthitem_array, array('class' => 'forminput', 'style' => 'width: 30px;')); ?>
				</div>
			</div>
            
		</div>
		<div class="form-actions">
			<?=CHtml::submitButton($model->isNewRecord ? Yii::t('app', 'Добавить') : Yii::t('app', 'Сохранить'), array('name'=>'btn_save', 'class' => 'btn green')); ?>
			<? if (Yii::app()->user->checkAccess('AdminUserUserIndex')) : ?>
				<?=CHtml::link(Yii::t('app', 'Назад'), $this->createUrl('index'), array('class' => 'btn grey'));?>
			<? endif; ?>
		</div>
		<?php $this->endWidget(); ?>
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
<link href="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/plugins/bootstrap-datetimepicker/css/datetimepicker.css" rel="stylesheet" type="text/css"/>