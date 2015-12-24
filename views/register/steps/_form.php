<?=CHtml::hiddenField('asseturl', Yii::app()->assetManager->getPublishedUrl(Yii::getPathOfAlias('register.css')), array('id' => 'asseturl'))?>
<style>
    .from_register input {width: 200px;}
    .from_register select {width: 200px;}
    .form td {padding: 2px; text-align: left;}
</style>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array('id'=>'users-form','enableAjaxValidation'=>false,)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>
    <div style="color: red; margin-bottom: 15px;">
        <?/*=$form->errorSummary($model)?>
        <?=$form->errorSummary($profile)?>
        <?=$form->errorSummary($profilelang)*/?>
    </div>
<table class="from_register" style='width: 350px; padding: 0;'>

    <? if(in_array('sponsor__id', $list)): ?>      
           <tr>
               <td><?=$form->labelEx($profile,'sponsor__id')?></td>
               <td><?=CHtml::textField('sponsor_login', '', array('id' => 'sponsor_login'))?><?=$form->hiddenField($profile,'sponsor__id',array('size'=>60,'maxlength'=>100))?></td>
           </tr>
           <tr><td colspan="2" id="sponsor__iderror" style="color: red;"><?=$form->error($profile,'sponsor__id')?></td></tr>
           
           <tr>
               <td><?=Yii::t('app', 'Имя лично-пригласившего')?></td>
               <td id="sponsor_first_name"></td>
           </tr>

           <tr>
               <td><?=Yii::t('app', 'Фамилия лично-пригласившего')?></td>
               <td id="sponsor_last_name"></td>
           </tr>
          
    <? endif?>    
    
    <? if(in_array('username', $list)): ?>      
           <tr>
               <td><?=$form->labelEx($model,'username')?></td>
               <td><?=$form->textField($model,'username',array('size'=>60,'maxlength'=>100, 'class' => 'forminput'))?></td>
           </tr>
           <tr><td colspan="2" id="usernameerror" style="color: red;"><?=$form->error($model,'username')?></td></tr>
    <? endif?>      

    <? if(in_array('email', $list)): ?>      
       <tr>
           <td><?=$form->labelEx($model,'email')?></td>
           <td><?=$form->textField($model,'email',array('size'=>60,'maxlength'=>100, 'class' => 'forminput'))?></td>
       </tr>
       <tr><td colspan="2" id="emailerror" style="color: red;"><?=$form->error($model,'email')?></td></tr>
    <? endif?>      

    <? if(in_array('password', $list)): ?>      
       <tr><td><?=$form->labelEx($model,'password'); ?></td><td><label for="Users_password"><?=Yii::t('app', 'Еще раз пароль')?></label></td></tr>
       <tr>
            <td><?=$form->passwordField($model,'password',array('size'=>20,'maxlength'=>20, 'class' => 'forminput')); ?></td>
            <td><?=$form->passwordField($model,'password_confirm',array('size'=>20,'maxlength'=>20, 'class' => 'forminput')); ?></td>
        </tr>
       <tr><td id="passworderror" colspan="2" style="color: red;"><?=$form->error($model,'password'); ?><? if ((($form->error($model,'password') != '')) && (($form->error($model,'password_confirm') != ''))) : ?><br /><?endif; ?><?=$form->error($model,'password_confirm'); ?></td></tr>
    <? endif?>      

	<? if(in_array('finpassword', $list)): ?>      
		<tr><td><?=$form->labelEx($model,'finpassword'); ?></td><td><label for="Users_finpassword_confirm"><?=Yii::t('app', 'Еще раз финансовый пароль')?></label></td></tr>
		<tr>
            <td><?=$form->passwordField($model,'finpassword',array('size'=>20,'maxlength'=>20, 'class' => 'forminput')); ?></td>
            <td><?=$form->passwordField($model,'finpassword_confirm',array('size'=>20,'maxlength'=>20, 'class' => 'forminput')); ?></td>
        </tr>
		<tr><td id="finpassworderror" colspan="2" style="color: red;"><?=$form->error($model,'finpassword'); ?><? if ((($form->error($model,'finpassword') != '')) && (($form->error($model,'finpassword_confirm') != ''))) : ?><br /><?endif; ?><?=$form->error($model,'finpassword_confirm'); ?></td></tr>
	<? endif?>      

        <? if(in_array('phone', $list)): ?>  
		<tr>
            <td><?=$form->labelEx($profile,'phone'); ?></td>
            <td><?=$form->textField($profile,'phone',array('size'=>20,'maxlength'=>20, 'class' => 'forminput')); ?></td>
        </tr>
		<tr><td colspan="2" id="phoneerror" style="color: red;"><?=$form->error($profile,'phone'); ?></td></tr>
	<? endif?>      

	<? if(in_array('skype', $list)): ?>  
		<tr>
            <td><?=$form->labelEx($profile,'skype'); ?></td>
            <td><?=$form->textField($profile,'skype',array('size'=>30,'maxlength'=>30, 'class' => 'forminput')); ?></td>
        </tr>
		<tr><td colspan="2" id="skypeerror" style="color: red;"><?=$form->error($profile,'skype'); ?></td></tr>
	<? endif?>      

	<? if(in_array('birthday', $list)): ?>  
		<tr>
            <td><?=$form->labelEx($profile,'birthday'); ?></td>
            <td><?=$form->textField($profile,'birthday', array('class' => 'forminput datepicker', 'readonly' => 'readonly', 'style' => 'width: 180px;')); ?></td>
        </tr>
		<tr><td colspan="2" id="birthdayerror" style="color: red;"><?=$form->error($profile,'birthday'); ?></td></tr>
	<? endif?>      

	<? if(in_array('sex', $list)): ?>  
		<tr>
            <td><?=$form->labelEx($profile,'sex'); ?></td>
            <td><?php echo $form->ListBox($profile,'sex', array(Profile::SEX_MALE => 'Муж', Profile::SEX_FEMALE => 'Жен'), array('class' => 'forminput', 'size' => 0)); ?></td>
        </tr>
		<tr><td colspan="2" id="sexerror" style="color: red;"><?=$form->error($profile,'sex'); ?></td></tr>
	<? endif?>      

    <? if (!class_exists('CitiesWidget')) : ?>
        
        <? if(in_array('country__id', $list)): ?>  
            <tr>
                <td><?=$form->labelEx($profile,'country__id'); ?></td>
                <td><?=$form->textField($profile,'country__id', array('class' => 'forminput')); ?></td>
            </tr>
            <tr><td colspan="2" id="country__iderror" style="color: red;"><?=$form->error($profile,'country__id'); ?></td></tr>
        <? endif?>      

        <? if(in_array('region__id', $list)): ?>  
            <tr>
                <td><?=$form->labelEx($profile,'region__id'); ?></td>
                <td><?=$form->textField($profile,'region__id', array('class' => 'forminput')); ?></td>
            </tr>
            <tr><td colspan="2" id="region__iderror" style="color: red;"><?=$form->error($profile,'region__id'); ?></td></tr>
        <? endif?>      

        <? if(in_array('city__id', $list)): ?>  
            <tr>
                <td><?=$form->labelEx($profile,'city__id'); ?></td>
                <td><?=$form->textField($profile,'city__id', array('class' => 'forminput')); ?></td>
            </tr>
            <tr><td colspan="2" id="city__iderror" style="color: red;"><?=$form->error($profile,'city__id'); ?></td></tr>
        <? endif?>        
        
    <? else : ?>
            
        <?php $cities=$this->beginWidget('CitiesWidget', array()); ?>
        <tr>
            <td><?=CHtml::activeLabel($profile,'country__id'); ?></td>
            <td><?php $cities->countries($profile->country__id); ?></td>
            <tr><td colspan="2" id="country__iderror" style="color: red;"><?=$form->error($profile,'country__id'); ?></td></tr>
        </tr>
        <tr>
            <td><?=CHtml::activeLabel($profile,'region__id'); ?></td>
            <td><?php $cities->regions($profile->region__id, $profile->country__id); ?></td>
            <tr><td colspan="2" id="region__iderror" style="color: red;"><?=$form->error($profile,'region__id'); ?></td></tr>
        </tr>
            <td><?=CHtml::activeLabel($profile,'city__id'); ?></td>
            <td><?php $cities->cities($profile->city__id, $profile->region__id); ?></td>
            <tr><td colspan="2" id="city__iderror" style="color: red;"><?=$form->error($profile,'city__id'); ?></td></tr>
        </tr>
        <?php $this->endWidget(); ?>        
    <? endif; ?>


	<? if(in_array('zip_code', $list)): ?>  
		<tr>
            <td><?=$form->labelEx($profile,'zip_code'); ?></td>
            <td><?=$form->textField($profile,'zip_code', array('class' => 'forminput')); ?></td>
        </tr>
		<tr><td colspan="2" id="zip_codeerror" style="color: red;"><?=$form->error($profile,'zip_code'); ?></td></tr>
	<? endif?>      

	<? if(in_array('first_name', $list)): ?>  
		<tr>
            <td><?=$form->labelEx($profilelang,'first_name'); ?></td>
            <td><?=$form->textField($profilelang,'first_name',array('size'=>60,'maxlength'=>255, 'class' => 'forminput')); ?></td>
        </tr>
		<tr><td colspan="2" id="first_nameerror" style="color: red;"><?=$form->error($profilelang,'first_name'); ?></td></tr>
	<? endif?>      

	<? if(in_array('last_name', $list)): ?>  
		<tr>
            <td><?=$form->labelEx($profilelang,'last_name'); ?></td>
            <td><?=$form->textField($profilelang,'last_name',array('size'=>60,'maxlength'=>255, 'class' => 'forminput')); ?></td>
        </tr>
		<tr><td colspan="2" id="last_nameerror" style="color: red;"><?=$form->error($profilelang,'last_name'); ?></td></tr>
	<? endif?>      

	<? if(in_array('second_name', $list)): ?>  
		<tr>
            <td><?=$form->labelEx($profilelang,'second_name'); ?></td>
            <td><?=$form->textField($profilelang,'second_name',array('size'=>60,'maxlength'=>255, 'class' => 'forminput')); ?></td>
        </tr>
		<tr><td colspan="2" id="second_nameerror" style="color: red;"><?=$form->error($profilelang,'second_name'); ?></td></tr>
	<? endif?>      

	<? if(in_array('address', $list)): ?>  
		<tr>
            <td><?=$form->labelEx($profilelang,'address'); ?></td>
            <td><?=$form->textField($profilelang,'address',array('size'=>60,'maxlength'=>500, 'class' => 'forminput')); ?></td>
        </tr>
		<tr><td colspan="2" id="addresserror" style="color: red;"><?=$form->error($profilelang,'address'); ?></td></tr>
	<? endif?>      
</table>
	<div class="row buttons" style="margin-top: 30px;">
		<?=CHtml::submitButton($model->isNewRecord ? Yii::t('app', 'Зарегистрироваться') : Yii::t('app', 'Сохранить'), array('name'=>'btn_register')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->