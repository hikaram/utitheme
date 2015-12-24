<link rel="stylesheet" href="<?=Yii::app()->assetManager->getPublishedUrl(Yii::getPathOfAlias('register.css'))?>/css/style.css" type="text/css" media="screen, projection" />
<?=CHtml::hiddenField('asseturl', Yii::app()->assetManager->getPublishedUrl(Yii::getPathOfAlias('register.css')), array('id' => 'asseturl'))?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array('id'=>'users-form','enableAjaxValidation'=>false)); ?>

<p class="note"><?=Yii::t('app', 'Поля с')?> <span class="required">*</span> <?=Yii::t('app', 'обязательны для заполнения')?></p>

<table class="from_register" style='width: 570px; padding: 0;'>

<? if(array_key_exists('sponsor__id', $list)): ?>
    <? if (($user != NULL) && ((bool)$list['sponsor__id']->is_user_filltype)): ?>
        <tr>
            <td style="width: 215px;"><?=$form->labelEx($profile,'sponsor__id')?></td>
            <td style="width: 355px;"><?=CHtml::encode($user->username)?></td>
            <td></td>
        </tr>
        <tr><td colspan="3" id="sponsor__iderror" style="color: red;"><?=$form->error($profile,'sponsor__id')?></td></tr>

        <? if(array_key_exists('last_name', $list)): ?>
            <tr>
                <td><?=Yii::t('app', 'Фамилия лично-пригласившего')?></td>
                <td id="sponsor_last_name"><?=CHtml::encode($user->profile->lang->last_name)?></td>
                <td></td>
            </tr>
        <? endif; ?>

        <? if(array_key_exists('first_name', $list)): ?>
            <tr>
                <td><?=Yii::t('app', 'Имя лично-пригласившего')?></td>
                <td id="sponsor_first_name"><?=CHtml::encode($user->profile->lang->first_name)?></td>
                <td></td>
            </tr>
        <? endif; ?>

        <? if(array_key_exists('second_name', $list)): ?>
            <tr>
                <td><?=Yii::t('app', 'Отчество лично-пригласившего')?></td>
                <td id="sponsor_first_name"><?=CHtml::encode($user->profile->lang->second_name)?></td>
                <td></td>
            </tr>
        <? endif; ?>

    <? else : ?>
        <tr>
            <td><?=$form->labelEx($profile,'sponsor__id')?></td>
            <td>
                <? if ($can_edit_sponsor) : ?>
                    <?=CHtml::textField('sponsor_login', '', array('id' => 'sponsor_login', 'title' => Yii::t('app', 'Данное поле должно содержать только латинские символы (a-z), цифры (0-9), знак подчеркивания, точка. Буквы в верхнем и в нижнем регистре являются разными символами. Применение спецсимволов не допускается. Минимальная длина данного поля должна быть 4 символа')))?>
                <? else : ?>
                    <span id="span_sponsor_login"></span>
                <?endif; ?>
                <?=$form->hiddenField($profile,'sponsor__id',array('size'=>60,'maxlength'=>100))?>
            </td>
            <td><div class="tooltip-register" name="sponsor_login"><?=Yii::t('app', 'Данное поле должно содержать только латинские символы (a-z), цифры (0-9), знак подчеркивания, точка. Буквы в верхнем и в нижнем регистре являются разными символами. Применение спецсимволов не допускается. Минимальная длина данного поля должна быть 4 символа')?></div></td>
        </tr>
        <tr><td colspan="3" id="sponsor__iderror" style="color: red;"><?=$form->error($profile,'sponsor__id')?></td></tr>

        <? if(array_key_exists('last_name', $list)): ?>
            <tr>
                <td><?=Yii::t('app', 'Фамилия лично-пригласившего')?></td>
                <td id="sponsor_last_name"></td>
                <td></td>
            </tr>
        <? endif; ?>

        <? if(array_key_exists('first_name', $list)): ?>
            <tr>
                <td><?=Yii::t('app', 'Имя лично-пригласившего')?></td>
                <td id="sponsor_first_name"></td>
                <td></td>
            </tr>
        <? endif; ?>

        <? if(array_key_exists('second_name', $list)): ?>
            <tr>
                <td><?=Yii::t('app', 'Отчество лично-пригласившего')?></td>
                <td id="sponsor_second_name"></td>
                <td></td>
            </tr>
        <? endif; ?>

    <? endif; ?>
<? endif?>

<? if((array_key_exists('username', $list)) && ((bool)$list['username']->is_user_filltype)): ?>
    <tr>
        <td><?=$form->labelEx($model,'username')?></td>
        <td><?=$form->textField($model,'username',array('size'=>60,'maxlength'=>100, 'class' => 'forminput', 'title' => Yii::t('app', 'Данное поле должно содержать только латинские символы (a-z), цифры (0-9), знак подчеркивания, точка. Буквы в верхнем и в нижнем регистре являются разными символами. Применение спецсимволов не допускается. Минимальная длина данного поля должна быть 4 символа')))?></td>
        <td><div class="tooltip-register" name="Users[username]"><?=Yii::t('app', 'Данное поле должно содержать только латинские символы (a-z), цифры (0-9), знак подчеркивания, точка. Буквы в верхнем и в нижнем регистре являются разными символами. Применение спецсимволов не допускается. Минимальная длина данного поля должна быть 4 символа')?></div></td>
    </tr>
    <tr><td colspan="3" id="usernameerror" style="color: red;"><?=$form->error($model,'username')?></td></tr>
<? endif?>

<? if((array_key_exists('email', $list)) && ((bool)$list['email']->is_user_filltype)): ?>
    <tr>
        <td><?=$form->labelEx($model,'email')?></td>
        <td><?=$form->textField($model,'email',array('size'=>60,'maxlength'=>100, 'class' => 'forminput'))?></td>
        <td></td>
    </tr>
    <tr><td colspan="3" id="emailerror" style="color: red;"><?=$form->error($model,'email')?></td></tr>
<? endif?>

<? if ((array_key_exists('password', $list)) && ((bool)$list['password']->is_user_filltype)): ?>
    <? if (($list['password']->param != NULL) && ($list['password']->param->show_type == UsersRegisterFieldsParams::SHOW_TYPE_PASSWORD)) : ?>
        <tr>
            <td><?=$form->labelEx($model,'password'); ?></td>
            <td><label for="Users_password"><?=Yii::t('app', 'Еще раз пароль')?></label></td>
            <td></td>
        </tr>
        <tr>
            <td><?=$form->passwordField($model, 'password', array('size' => 20,'maxlength' => 20, 'class' => 'forminput', 'value' => '', 'title' => Yii::t('app', 'Данное поле должно содержать только латинские символы (a-z), цифры (0-9), знак подчеркивания, точка. Буквы в верхнем и в нижнем регистре являются разными символами. Минимальная длина данного поля должна быть 6 символов'))); ?></td>
            <td><?=$form->passwordField($model, 'password_confirm', array('size' => 20,'maxlength' => 20, 'class' => 'forminput', 'value' => '', 'title' => Yii::t('app', 'Данное поле должно содержать только латинские символы (a-z), цифры (0-9), знак подчеркивания, точка. Буквы в верхнем и в нижнем регистре являются разными символами. Минимальная длина данного поля должна быть 6 символов'))); ?></td>
            <td>
                <div class="tooltip-register" name="Users[password]"><?=Yii::t('app', 'Данное поле должно содержать только латинские символы (a-z), цифры (0-9), знак подчеркивания, точка. Буквы в верхнем и в нижнем регистре являются разными символами. Минимальная длина данного поля должна быть 6 символов')?></div>
                <div class="tooltip-register" name="Users[password_confirm]"><?=Yii::t('app', 'Данное поле должно содержать только латинские символы (a-z), цифры (0-9), знак подчеркивания, точка. Буквы в верхнем и в нижнем регистре являются разными символами. Минимальная длина данного поля должна быть 6 символов')?></div>
            </td>
        </tr>
    <? elseif (($list['password']->param != NULL) && ($list['password']->param->show_type == UsersRegisterFieldsParams::SHOW_TYPE_TEXT)) : ?>
        <tr>
            <td><?=$form->labelEx($model,'password')?></td>
            <td><?=$form->textField($model,'password',array('size'=>60,'maxlength'=>100, 'class' => 'forminput noPasswordEffects', 'value' => '', 'title' => Yii::t('app', 'Данное поле должно содержать только латинские символы (a-z), цифры (0-9), знак подчеркивания, точка. Буквы в верхнем и в нижнем регистре являются разными символами. Минимальная длина данного поля должна быть 6 символов')))?></td>
            <td><div class="tooltip-register" name="Users[password]"><?=Yii::t('app', 'Данное поле должно содержать только латинские символы (a-z), цифры (0-9), знак подчеркивания, точка. Буквы в верхнем и в нижнем регистре являются разными символами. Минимальная длина данного поля должна быть 6 символов')?></div></td>
        </tr>
    <? elseif (($list['password']->param != NULL) && ($list['password']->param->show_type == UsersRegisterFieldsParams::SHOW_TYPE_DYNAMIC)) : ?>
        <tr id="passwordsDesc_password">
            <td><?=$form->labelEx($model, 'password'); ?></td>
            <td><label for="Users_password"><?=Yii::t('app', 'Подтверждение пароля')?></label></td>
            <td></td>
        </tr>
        <tr id="passwordsFields_password">
            <td><?=$form->passwordField($model, 'password', array('size' => 20,'maxlength' => 20, 'class' => 'forminput', 'name' => 'Users[password_w]', 'id' => 'Users_password_w', 'value' => '', 'title' => Yii::t('app', 'Данное поле должно содержать только латинские символы (a-z), цифры (0-9), знак подчеркивания, точка. Буквы в верхнем и в нижнем регистре являются разными символами. Минимальная длина данного поля должна быть 6 символов'))); ?></td>
            <td><?=$form->passwordField($model, 'password_confirm', array('size'=>20,'maxlength'=>20, 'class' => 'forminput', 'name' => 'Users[password_confirm_w]', 'id' => 'Users_password_confirm_w', 'value' => '', 'title' => Yii::t('app', 'Данное поле должно содержать только латинские символы (a-z), цифры (0-9), знак подчеркивания, точка. Буквы в верхнем и в нижнем регистре являются разными символами. Минимальная длина данного поля должна быть 6 символов'))); ?></td>
            <td>
                <div class="tooltip-register" name="Users[password_w]"><?=Yii::t('app', 'Данное поле должно содержать только латинские символы (a-z), цифры (0-9), знак подчеркивания, точка. Буквы в верхнем и в нижнем регистре являются разными символами. Минимальная длина данного поля должна быть 6 символов')?></div>
                <div class="tooltip-register" name="Users[password_confirm_w]"><?=Yii::t('app', 'Данное поле должно содержать только латинские символы (a-z), цифры (0-9), знак подчеркивания, точка. Буквы в верхнем и в нижнем регистре являются разными символами. Минимальная длина данного поля должна быть 6 символов')?></div>
            </td>
        </tr>
        <tr id="passwordShow_password" style="display: none;">
            <td><?=$form->labelEx($model, 'password')?></td>
            <td><?=$form->textField($model, 'password', array('size' => 60,'maxlength' => 100, 'class' => 'forminput', 'name' => 'Users[password_n]', 'id' => 'Users_password_n', 'value' => '', 'title' => Yii::t('app', 'Данное поле должно содержать только латинские символы (a-z), цифры (0-9), знак подчеркивания, точка. Буквы в верхнем и в нижнем регистре являются разными символами. Минимальная длина данного поля должна быть 6 символов')))?></td>
            <td><div class="tooltip-register" name="Users[password_n]"><?=Yii::t('app', 'Данное поле должно содержать только латинские символы (a-z), цифры (0-9), знак подчеркивания, точка. Буквы в верхнем и в нижнем регистре являются разными символами. Минимальная длина данного поля должна быть 6 символов')?></div></td>
        </tr>
        <tr>
            <td colspan="3" style="text-align: left; padding-left: 15px;">
                <?=CHtml::checkBox('show_pass', FALSE, array('id' => 'showPasswordCheckBox', 'style' => 'width: 15px;', 'passId' => 'password'))?>&nbsp;&nbsp;<?=Yii::t('app', 'Показывать пароль')?>
            </td>
        </tr>
    <? endif; ?>
    <tr><td id="passworderror" colspan="3" style="color: red;"><?=$form->error($model,'password'); ?><? if ((($form->error($model,'password') != '')) && (($form->error($model,'password_confirm') != ''))) : ?><br /><?endif; ?><?=$form->error($model,'password_confirm'); ?></td></tr>
<? endif?>

<? if ((array_key_exists('finpassword', $list)) && ((bool)$list['finpassword']->is_user_filltype)): ?>
    <? if (($list['finpassword']->param != NULL) && ($list['finpassword']->param->show_type == UsersRegisterFieldsParams::SHOW_TYPE_PASSWORD)) : ?>
        <tr>
            <td><?=$form->labelEx($model,'finpassword'); ?></td>
            <td><label for="Users_password"><?=Yii::t('app', 'Еще раз финансовый пароль')?></label></td>
            <td></td>
        </tr>
        <tr>
            <td><?=$form->passwordField($model, 'finpassword', array('size' => 20,'maxlength' => 20, 'class' => 'forminput', 'value' => '', 'title' => Yii::t('app', 'Данное поле должно содержать только латинские символы (a-z), цифры (0-9), знак подчеркивания, точка. Буквы в верхнем и в нижнем регистре являются разными символами. Минимальная длина данного поля должна быть 6 символов'))); ?></td>
            <td><?=$form->passwordField($model, 'finpassword_confirm', array('size' => 20,'maxlength' => 20, 'class' => 'forminput', 'value' => '', 'title' => Yii::t('app', 'Данное поле должно содержать только латинские символы (a-z), цифры (0-9), знак подчеркивания, точка. Буквы в верхнем и в нижнем регистре являются разными символами. Минимальная длина данного поля должна быть 6 символов'))); ?></td>
            <td>
                <div class="tooltip-register" name="Users[finpassword]"><?=Yii::t('app', 'Данное поле должно содержать только латинские символы (a-z), цифры (0-9), знак подчеркивания, точка. Буквы в верхнем и в нижнем регистре являются разными символами. Минимальная длина данного поля должна быть 6 символов')?></div>
                <div class="tooltip-register" name="Users[finpassword_confirm]"><?=Yii::t('app', 'Данное поле должно содержать только латинские символы (a-z), цифры (0-9), знак подчеркивания, точка. Буквы в верхнем и в нижнем регистре являются разными символами. Минимальная длина данного поля должна быть 6 символов')?></div>
            </td>
        </tr>
    <? elseif (($list['finpassword']->param != NULL) && ($list['finpassword']->param->show_type == UsersRegisterFieldsParams::SHOW_TYPE_TEXT)) : ?>
        <tr>
            <td><?=$form->labelEx($model,'finpassword')?></td>
            <td><?=$form->textField($model,'finpassword',array('size'=>60,'maxlength'=>100, 'class' => 'forminput noPasswordEffects', 'value' => '', 'title' => Yii::t('app', 'Данное поле должно содержать только латинские символы (a-z), цифры (0-9), знак подчеркивания, точка. Буквы в верхнем и в нижнем регистре являются разными символами. Минимальная длина данного поля должна быть 6 символов')))?></td>
            <td><div class="tooltip-register" name="Users[finpassword]"><?=Yii::t('app', 'Данное поле должно содержать только латинские символы (a-z), цифры (0-9), знак подчеркивания, точка. Буквы в верхнем и в нижнем регистре являются разными символами. Минимальная длина данного поля должна быть 6 символов')?></div></td>
        </tr>
    <? elseif (($list['finpassword']->param != NULL) && ($list['finpassword']->param->show_type == UsersRegisterFieldsParams::SHOW_TYPE_DYNAMIC)) : ?>
        <tr id="finpasswordsDesc_password">
            <td><?=$form->labelEx($model, 'finpassword'); ?></td>
            <td><label for="Users_password"><?=Yii::t('app', 'Подтверждение финансового пароля')?></label></td>
            <td></td>
        </tr>
        <tr id="finpasswordsFields_password">
            <td><?=$form->passwordField($model, 'finpassword', array('size' => 20,'maxlength' => 20, 'class' => 'forminput', 'name' => 'Users[finpassword_w]', 'id' => 'Users_finpassword_w', 'value' => '', 'title' => Yii::t('app', 'Данное поле должно содержать только латинские символы (a-z), цифры (0-9), знак подчеркивания, точка. Буквы в верхнем и в нижнем регистре являются разными символами. Минимальная длина данного поля должна быть 6 символов'))); ?></td>
            <td><?=$form->passwordField($model, 'finpassword_confirm', array('size'=>20,'maxlength'=>20, 'class' => 'forminput', 'name' => 'Users[finpassword_confirm_w]', 'id' => 'Users_finpassword_confirm_w', 'value' => '', 'title' => Yii::t('app', 'Данное поле должно содержать только латинские символы (a-z), цифры (0-9), знак подчеркивания, точка. Буквы в верхнем и в нижнем регистре являются разными символами. Минимальная длина данного поля должна быть 6 символов'))); ?></td>
            <td>
                <div class="tooltip-register" name="Users[finpassword_w]"><?=Yii::t('app', 'Данное поле должно содержать только латинские символы (a-z), цифры (0-9), знак подчеркивания, точка. Буквы в верхнем и в нижнем регистре являются разными символами. Минимальная длина данного поля должна быть 6 символов')?></div>
                <div class="tooltip-register" name="Users[finpassword_confirm_w]"><?=Yii::t('app', 'Данное поле должно содержать только латинские символы (a-z), цифры (0-9), знак подчеркивания, точка. Буквы в верхнем и в нижнем регистре являются разными символами. Минимальная длина данного поля должна быть 6 символов')?></div>
            </td>
        </tr>
        <tr id="finpasswordShow_password" style="display: none;">
            <td><?=$form->labelEx($model, 'finpassword')?></td>
            <td><?=$form->textField($model, 'finpassword', array('size' => 60,'maxlength' => 100, 'class' => 'forminput', 'name' => 'Users[finpassword_n]', 'id' => 'Users_finpassword_n', 'value' => '', 'title' => Yii::t('app', 'Данное поле должно содержать только латинские символы (a-z), цифры (0-9), знак подчеркивания, точка. Буквы в верхнем и в нижнем регистре являются разными символами. Минимальная длина данного поля должна быть 6 символов')))?></td>
            <td><div class="tooltip-register" name="Users[finpassword_n]"><?=Yii::t('app', 'Данное поле должно содержать только латинские символы (a-z), цифры (0-9), знак подчеркивания, точка. Буквы в верхнем и в нижнем регистре являются разными символами. Минимальная длина данного поля должна быть 6 символов')?></div></td>
        </tr>
        <tr>
            <td colspan="3" style="text-align: left; padding-left: 15px;">
                <?=CHtml::checkBox('show_finpass', FALSE, array('id' => 'showPasswordCheckBox', 'style' => 'width: 15px;', 'passId' => 'finpassword'))?>&nbsp;&nbsp;<?=Yii::t('app', 'Показывать финансовый пароль')?>
            </td>
        </tr>
    <? endif; ?>
    <tr><td id="passworderror" colspan="3" style="color: red;"><?=$form->error($model,'finpassword'); ?><? if ((($form->error($model,'finpassword') != '')) && (($form->error($model,'finpassword_confirm') != ''))) : ?><br /><?endif; ?><?=$form->error($model,'password_confirm'); ?></td></tr>
<? endif?>

<? if((array_key_exists('question', $list)) && ((bool)$list['question']->is_user_filltype)): ?>
    <tr>
        <td><?=$form->labelEx($profile,'question'); ?></td>
        <td><?php echo $form->ListBox($profile,'question', $questionList['selectBox'], array('class' => 'forminput', 'size' => 0)); ?></td>
        <td></td>
    </tr>
    <tr><td colspan="3" id="addresserror" style="color: red;"><?=$form->error($profile,'question'); ?></td></tr>
<? endif?>

<? if((array_key_exists('answer', $list)) && ((bool)$list['answer']->is_user_filltype)): ?>
    <tr>
        <td colspan="3" style="text-align: right; font-size: 12px; font-style: italic;">
            <? foreach ($questionList['divBox'] as $question) : ?>
                <div style="padding-right: 80px; display: none;" class="answer-desc" id="answer-desc-<?=$question->id?>">
                    <?=CHtml::encode($question->lang->description)?>
                </div>
            <? endforeach;?>
        </td>
    </tr>
    <tr>
        <td><?=$form->labelEx($profile,'answer'); ?></td>
        <td><?php echo $form->textField($profile,'answer', array('class' => 'forminput', 'title' => Yii::t('app', 'Данное поле должно содержать только латинские символы (a-z), цифры (0-9), знак подчеркивания, точка. Буквы в верхнем и в нижнем регистре являются разными символами. Применение спецсимволов не допускается.'))); ?></td>
        <td><div class="tooltip-register" name="Profile[answer]"><?=Yii::t('app', 'Данное поле должно содержать только латинские символы (a-z), цифры (0-9), знак подчеркивания, точка. Буквы в верхнем и в нижнем регистре являются разными символами. Применение спецсимволов не допускается.')?></div></td>
    </tr>
    <tr><td colspan="3" id="addresserror" style="color: red;"><?=$form->error($profile,'answer'); ?></td></tr>
<? endif?>

<? if((array_key_exists('phone', $list)) && ((bool)$list['phone']->is_user_filltype)): ?>
    <tr>
        <td><?=$form->labelEx($profile,'phone'); ?></td>
        <td>
            <? if (($list['phone']->param != NULL) && ((bool)$list['phone']->param->is_specific_widget)) : ?>
                <?php $this->widget('PhoneWidget')->activePhoneField($profile, 'phone', array('class' => 'forminput')); ?>
            <? else : ?>
                <?=$form->textField($profile,'phone',array('size'=>20,'maxlength'=>20, 'class' => 'forminput')); ?>
            <? endif; ?>
        </td>
        <td></td>
    </tr>
    <tr><td colspan="3" id="phoneerror" style="color: red;"><?=$form->error($profile,'phone'); ?></td></tr>
<? endif?>

<? if((array_key_exists('skype', $list)) && ((bool)$list['skype']->is_user_filltype)): ?>
    <tr>
        <td><?=$form->labelEx($profile,'skype'); ?></td>
        <td><?=$form->textField($profile,'skype',array('size'=>30,'maxlength'=>30, 'class' => 'forminput')); ?></td>
        <td></td>
    </tr>
    <tr><td colspan="3" id="skypeerror" style="color: red;"><?=$form->error($profile,'skype'); ?></td></tr>
<? endif?>

<? if((array_key_exists('birthday', $list)) && ((bool)$list['birthday']->is_user_filltype)): ?>
    <tr>
        <td><?=$form->labelEx($profile,'birthday'); ?></td>
        <td><?=$form->textField($profile,'birthday', array('class' => 'forminput datepicker', 'readonly' => 'readonly', 'style' => 'width: 180px;')); ?></td>
        <td></td>
    </tr>
    <tr><td colspan="3" id="birthdayerror" style="color: red;"><?=$form->error($profile,'birthday'); ?></td></tr>
<? endif?>

<? if((array_key_exists('sex', $list)) && ((bool)$list['sex']->is_user_filltype)): ?>
    <tr>
        <td><?=$form->labelEx($profile,'sex'); ?></td>
        <td><?php echo $form->ListBox($profile,'sex', array(Profile::SEX_MALE => Yii::t('app', 'Муж'), Profile::SEX_FEMALE => Yii::t('app', 'Жен')), array('class' => 'forminput', 'size' => 0)); ?></td>
        <td></td>
    </tr>
    <tr><td colspan="3" id="sexerror" style="color: red;"><?=$form->error($profile,'sex'); ?></td></tr>
<? endif?>

<?php $cities=$this->beginWidget('CitiesWidget', array()); ?>

<? if((array_key_exists('country__id', $list)) && ((bool)$list['country__id']->is_user_filltype)): ?>
    <tr>
        <td><?=$form->labelEx($profile,'country__id'); ?></td>
        <td>
            <? if (($list['country__id']->param != NULL) && ((bool)$list['country__id']->param->is_specific_widget)) : ?>
                <?php $cities->countries($profile->country__id); ?>
            <? else : ?>
                <?=$form->textField($profilelang,'country_name', array('class' => 'forminput')); ?>
            <? endif; ?>
        </td>
        <td></td>
    </tr>
    <tr><td colspan="3" id="country__iderror" style="color: red;"><?=$form->error($profile,'country__id'); ?></td></tr>
<? endif?>

<? if((array_key_exists('region__id', $list)) && ((bool)$list['region__id']->is_user_filltype)): ?>
    <tr>
        <td><?=$form->labelEx($profile,'region__id'); ?></td>
        <td>
            <? if (($list['region__id']->param != NULL) && ((bool)$list['region__id']->param->is_specific_widget)) : ?>
                <?php $cities->regions($profile->region__id, $profile->country__id); ?>
            <? else : ?>
                <?=$form->textField($profilelang,'region_name', array('class' => 'forminput')); ?>
            <? endif; ?>
        </td>
        <td></td>
    </tr>
    <tr><td colspan="3" id="region__iderror" style="color: red;"><?=$form->error($profile,'region__id'); ?></td></tr>
<? endif?>

<? if((array_key_exists('city__id', $list)) && ((bool)$list['city__id']->is_user_filltype)): ?>
    <tr>
        <td><?=$form->labelEx($profile,'city__id'); ?></td>
        <td>
            <? if (($list['city__id']->param != NULL) && ((bool)$list['city__id']->param->is_specific_widget)) : ?>
                <?php $cities->cities($profile->city__id, $profile->region__id); ?>
            <? else : ?>
                <?=$form->textField($profilelang,'city_name', array('class' => 'forminput')); ?>
            <? endif; ?>
        </td>
        <td></td>
    </tr>
    <tr><td colspan="3" id="city__iderror" style="color: red;"><?=$form->error($profile,'city__id'); ?></td></tr>
<? endif?>

<?php $this->endWidget(); ?>

<? if((array_key_exists('zip_code', $list)) && ((bool)$list['zip_code']->is_user_filltype)): ?>
    <tr>
        <td><?=$form->labelEx($profile,'zip_code'); ?></td>
        <td><?=$form->textField($profile,'zip_code', array('class' => 'forminput')); ?></td>
        <td></td>
    </tr>
    <tr><td colspan="3" id="zip_codeerror" style="color: red;"><?=$form->error($profile,'zip_code'); ?></td></tr>
<? endif?>

<? if((array_key_exists('last_name', $list)) && ((bool)$list['last_name']->is_user_filltype)): ?>
    <tr>
        <td><?=$form->labelEx($profilelang,'last_name'); ?></td>
        <td><?=$form->textField($profilelang,'last_name',array('size'=>60,'maxlength'=>255, 'class' => 'forminput', 'title' => Yii::t('app', 'Данное поле должно содержать только латинские символы (a-z), цифры (0-9), знак подчеркивания, точка. Буквы в верхнем и в нижнем регистре являются разными символами. Применение спецсимволов не допускается.'))); ?></td>
        <td><div class="tooltip-register" name="ProfileLang[last_name]"><?=Yii::t('app', 'Данное поле должно содержать только латинские символы (a-z), цифры (0-9), знак подчеркивания, точка. Буквы в верхнем и в нижнем регистре являются разными символами. Применение спецсимволов не допускается.')?></div></td>
    </tr>
    <tr><td colspan="3" id="last_nameerror" style="color: red;"><?=$form->error($profilelang,'last_name'); ?></td></tr>
<? endif?>

<? if((array_key_exists('first_name', $list)) && ((bool)$list['first_name']->is_user_filltype)): ?>
    <tr>
        <td><?=$form->labelEx($profilelang,'first_name'); ?></td>
        <td><?=$form->textField($profilelang,'first_name',array('size'=>60,'maxlength'=>255, 'class' => 'forminput', 'title' => Yii::t('app', 'Данное поле должно содержать только латинские символы (a-z), цифры (0-9), знак подчеркивания, точка. Буквы в верхнем и в нижнем регистре являются разными символами. Применение спецсимволов не допускается.'))); ?></td>
        <td><div class="tooltip-register" name="ProfileLang[first_name]"><?=Yii::t('app', 'Данное поле должно содержать только латинские символы (a-z), цифры (0-9), знак подчеркивания, точка. Буквы в верхнем и в нижнем регистре являются разными символами. Применение спецсимволов не допускается.')?></div></td>
    </tr>
    <tr><td colspan="3" id="first_nameerror" style="color: red;"><?=$form->error($profilelang,'first_name'); ?></td></tr>
<? endif?>

<? if((array_key_exists('second_name', $list)) && ((bool)$list['second_name']->is_user_filltype)): ?>
    <tr>
        <td><?=$form->labelEx($profilelang,'second_name'); ?></td>
        <td><?=$form->textField($profilelang,'second_name',array('size'=>60,'maxlength'=>255, 'class' => 'forminput', 'title' => Yii::t('app', 'Данное поле должно содержать только латинские символы (a-z), цифры (0-9), знак подчеркивания, точка. Буквы в верхнем и в нижнем регистре являются разными символами. Применение спецсимволов не допускается.'))); ?></td>
        <td><div class="tooltip-register" name="ProfileLang[second_name]"><?=Yii::t('app', 'Данное поле должно содержать только латинские символы (a-z), цифры (0-9), знак подчеркивания, точка. Буквы в верхнем и в нижнем регистре являются разными символами. Применение спецсимволов не допускается.')?></div></td>
    </tr>
    <tr><td colspan="3" id="second_nameerror" style="color: red;"><?=$form->error($profilelang,'second_name'); ?></td></tr>
<? endif?>

<? if((array_key_exists('address', $list)) && ((bool)$list['address']->is_user_filltype)): ?>
    <tr>
        <td><?=$form->labelEx($profilelang,'address'); ?></td>
        <td><?=$form->textField($profilelang,'address',array('size'=>60,'maxlength'=>500, 'class' => 'forminput')); ?></td>
        <td></td>
    </tr>
    <tr><td colspan="3" id="addresserror" style="color: red;"><?=$form->error($profilelang,'address'); ?></td></tr>
<? endif?>

<? if ((array_key_exists('captcha', $list)) && ((bool)$list['captcha']->is_user_filltype)): ?>
    <tr>
        <td>
            <?=$form->labelEx($profile,'captcha'); ?><br />
            <?php $this->widget('UTICaptcha', array('buttonLabel' => '<span class="refreshCaptcha"></span>', 'imageOptions' => array('style' => 'margin-bottom: -20px; margin-right: 10px;'), 'buttonOptions' => array('style' => 'display: table;')))?>
        </td>
        <td>
            <?=$form->textField($profile, 'captcha', array('value' => '')); ?>
            <div class="hint">
                <?=Yii::t('app', 'Пожалуйста, введите код с картинки')?>.<br/><?=Yii::t('app', 'Можно вводить без учета регистра')?>.
            </div>
        </td>
        <td></td>
    </tr>
    <tr><td colspan="3" id="addresserror" style="color: red;"><?=$form->error($profile,'captcha'); ?></td></tr>
<? endif; ?>

<? if ($user == NULL) : ?>
    <tr>
        <td colspan="3">
            <?=$form->checkBox($profile, 'form_agree', array('style' => 'width: 10px;')) ?>
            &nbsp;<?=Yii::t('app', 'Я принимаю условия')?>&nbsp;<?=CHtml::link(Yii::t('app', 'соглашения'), $this->createUrl('/terms'), array('target' => '_blank'))?>&nbsp;<?=Yii::t('app', 'использования сайта')?>
        </td>
    </tr>
    <tr><td colspan="3" id="addresserror" style="color: red;"><?=$form->error($profile,'form_agree'); ?></td></tr>
<? endif; ?>

</table>
<div class="row buttons" style="margin-top: 30px;">
    <?=CHtml::submitButton($user == NULL ? Yii::t('app', 'Зарегистрироваться') : Yii::t('app', 'Зарегистрировать'), array('name'=>'btn_register', 'class' => 'btn200')); ?>
</div>

<?php $this->endWidget(); ?>

</div><!-- form -->