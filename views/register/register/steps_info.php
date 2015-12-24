<div style="text-align: center; font-size: 16px;">
    <?=Yii::t('app', 'Последний шаг регистрации')?>.<br>
    <?=Yii::t('app', 'Пожалуйста проверьте введенные данные')?>.
</div>    
<?=CHtml::hiddenField('asseturl', Yii::app()->assetManager->getPublishedUrl(Yii::getPathOfAlias('register.css')), array('id' => 'asseturl'))?>
<style>
    .from_register input {width: 200px;}
    .from_register select {width: 200px;}
    .form td {padding: 2px; text-align: left;}
    .static{color: #060;}
    .denamic{display: none;}
    
</style>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array('id'=>'users-form','enableAjaxValidation'=>false, /*'action'=>$steps_array['step_next'])*/)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>
    <div style="color: red; margin-bottom: 15px;">
    </div>
<table class="from_register" style='width: 350px; padding: 0;'>

    <? if(in_array('sponsor__id', $list)): ?>
        <? if ($user != NULL) : ?>
            <tr>
               <td><?=$form->labelEx($profile,'sponsor__id')?></td>
               <td><?=$user->username?></td>
           </tr>
           <tr><td colspan="2" id="sponsor__iderror" style="color: red;"><?=$form->error($profile,'sponsor__id')?></td></tr>
           
           <tr>
               <td><?=Yii::t('app', 'Имя лично-пригласившего')?></td>
               <td id="sponsor_first_name"><?=$user->profile->lang->first_name?></td>
           </tr>

           <tr>
               <td><?=Yii::t('app', 'Фамилия лично-пригласившего')?></td>
               <td id="sponsor_last_name"><?=$user->profile->lang->second_name?></td>
           </tr>
        <? else : ?>
           <tr>
                <td><?=$form->labelEx($profile,'sponsor__id')?></td>
                <td>
                    <span id="span_sponsor_login"></span>
                    <?=$form->hiddenField($profile,'sponsor__id',array('size'=>60,'maxlength'=>100))?>
                </td>
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
       <? endif; ?>
    <? endif?>    
    
    <? if(in_array('username', $list)): ?>      
           <tr>
               <td><?=$form->labelEx($model,'username')?></td>
               
               <td>
                <div class="static">
                    <?=$model->username?>
                </div>
                <div class="denamic">
                    <?=$form->textField($model,'username',array('size'=>60,'maxlength'=>100, 'class' => 'forminput'))?>
                </div> 
               </td>
           </tr>
           
           <tr><td colspan="2" id="usernameerror" style="color: red;"><?=$form->error($model,'username')?></td></tr>
    <? endif?>      

    <? if(in_array('email', $list)): ?>      
       <tr>
           <td><?=$form->labelEx($model,'email')?></td>
           <td>
                <div class="static">
                    <?=$model->email?>
                </div>
                <div class="denamic">
                    <?=$form->textField($model,'email',array('size'=>60,'maxlength'=>100, 'class' => 'forminput'))?>
                </div> 
           </td>
       </tr>
       <tr><td colspan="2" id="emailerror" style="color: red;"><?=$form->error($model,'email')?></td></tr>
    <? endif?>      

    <? if(in_array('password', $list)): ?>      
       <tr><td><?=$form->labelEx($model,'password'); ?></td><td><div class="denamic"><label for="Users_password"><?=Yii::t('app', 'Еще раз пароль')?></label></div></td></tr>
              <td class="static" style=" background: #4f4f4f">
                      <div class="static">
                            <?=$model->password?>
                      </div>
              </td>
              <tr>
                  <td><div class="denamic"><?=$form->passwordField($model,'password',array('size'=>20,'maxlength'=>20, 'class' => 'forminput')); ?></div></td>
                  <td><div class="denamic"><?=$form->passwordField($model,'password_confirm',array('size'=>20,'maxlength'=>20, 'class' => 'forminput')); ?></div></td>
              </tr>   
       <tr><td id="passworderror" colspan="2" style="color: red;"><?=$form->error($model,'password'); ?><? if ((($form->error($model,'password') != '')) && (($form->error($model,'password_confirm') != ''))) : ?><br /><?endif; ?><?=$form->error($model,'password_confirm'); ?></td></tr>
    <? endif?>      

	<? if(in_array('finpassword', $list)): ?>      
		<tr><td><?=$form->labelEx($model,'finpassword'); ?></td><td><div class="denamic"><label for="Users_finpassword_confirm"><?=Yii::t('app', 'Еще раз финансовый пароль')?></label></div></td></tr>
		<tr>
              <td class="static" style=" background: #4f4f4f">
                      <div class="static">
                            <?=$model->finpassword?>
                      </div>
              </td>
              <tr>
                  <td><div class="denamic"><?=$form->passwordField($model,'finpassword',array('size'=>20,'maxlength'=>20, 'class' => 'forminput')); ?></div></td>
                  <td><div class="denamic"><?=$form->passwordField($model,'finpassword_confirm',array('size'=>20,'maxlength'=>20, 'class' => 'forminput')); ?></div></td>
              </tr>    
         
        </tr>
		<tr><td id="finpassworderror" colspan="2" style="color: red;"><?=$form->error($model,'finpassword'); ?><? if ((($form->error($model,'finpassword') != '')) && (($form->error($model,'finpassword_confirm') != ''))) : ?><br /><?endif; ?><?=$form->error($model,'finpassword_confirm'); ?></td></tr>
	<? endif?>      

        <? if(in_array('phone', $list)): ?>  
		<tr>
            <td><?=$form->labelEx($profile,'phone'); ?></td>
            <td>
                <div class="static">
                    <?=$profile->phone?>
                </div>
                <div class="denamic">
                    <?=$form->textField($profile,'phone',array('size'=>20,'maxlength'=>20, 'class' => 'forminput')); ?>
                </div>         </td>
        </tr>
		<tr><td colspan="2" id="phoneerror" style="color: red;"><?=$form->error($profile,'phone'); ?></td></tr>
	<? endif?>      

	<? if(in_array('skype', $list)): ?>  
		<tr>
            <td><?=$form->labelEx($profile,'skype'); ?></td>
            <td>
                <div class="static">
                    <?=$profile->skype?>
                </div>
                <div class="denamic">
                    <?=$form->textField($profile,'skype',array('size'=>30,'maxlength'=>30, 'class' => 'forminput')); ?>
                </div>      </td>
        </tr>
		<tr><td colspan="2" id="skypeerror" style="color: red;"><?=$form->error($profile,'skype'); ?></td></tr>
	<? endif?>      

	<? if(in_array('birthday', $list)): ?>  
		<tr>
            <td><?=$form->labelEx($profile,'birthday'); ?></td>
            <td>
                <div class="static">
                    <?=$profile->birthday?>
                </div>
                <div class="denamic">
                    <?=$form->textField($profile,'birthday', array('class' => 'forminput datepicker', 'readonly' => 'readonly', 'style' => 'width: 180px;')); ?>
                </div>      </td>
        </tr>
		<tr><td colspan="2" id="birthdayerror" style="color: red;"><?=$form->error($profile,'birthday'); ?></td></tr>
	<? endif?>      

	<? if(in_array('sex', $list)): ?>  
		<tr>
            <td><?=$form->labelEx($profile,'sex'); ?></td>
            <td>
                <div class="static">
                    <? if ($profile->sex == Profile::SEX_MALE) : ?>Муж
                    <? elseif ($profile->sex == Profile::SEX_FEMALE) : ?>Жен
                    <? endif; ?>
                </div>
                <div class="denamic">
                    <?php echo $form->ListBox($profile,'sex', array(Profile::SEX_MALE => Yii::t('app', 'Муж'), Profile::SEX_FEMALE => Yii::t('app', 'Жен')), array('class' => 'forminput', 'size' => 0)); ?>
                </div>                  </td>
        </tr>
		<tr><td colspan="2" id="sexerror" style="color: red;"><?=$form->error($profile,'sex'); ?></td></tr>
	<? endif?>

    <? if (!class_exists('CitiesWidget')): ?>
        
        <? if(in_array('country__id', $list)): ?>
            <tr>
                <td><?=$form->labelEx($profile,'country__id'); ?></td>
                <td>
                <div class="static">
                    <?=$profile->country__id?>
                </div>
                <div class="denamic">
                    <?=$form->textField($profile,'country__id', array('class' => 'forminput')); ?>
                </div>        </td>
            </tr>
            <tr><td colspan="2" id="country__iderror" style="color: red;"><?=$form->error($profile,'country__id'); ?></td></tr>
        <? endif?>      

        <? if(in_array('region__id', $list)): ?>  
            <tr>
                <td><?=$form->labelEx($profile,'region__id'); ?></td>
                <td>
                <div class="static">
                    <?=$profile->region__id?>
                </div>
                <div class="denamic">
                    <?=$form->textField($profile,'region__id', array('class' => 'forminput')); ?>
                </div>          </td>
            </tr>
            <tr><td colspan="2" id="region__iderror" style="color: red;"><?=$form->error($profile,'region__id'); ?></td></tr>
        <? endif?>      

        <? if(in_array('city__id', $list)): ?>  
            <tr>
                <td><?=$form->labelEx($profile,'city__id'); ?></td>
                <td>
                <div class="static">
                    <?=$profile->city__id?>
                </div>
                <div class="denamic">
                    <?=$form->textField($profile,'city__id', array('class' => 'forminput')); ?>
                </div> </td>        
            </tr>
            <tr><td colspan="2" id="city__iderror" style="color: red;"><?=$form->error($profile,'city__id'); ?></td></tr>
        <? endif?>
        
    <? else : ?>
            
        <?php $cities=$this->beginWidget('CitiesWidget', array()); ?>
        <? if(in_array('country__id', $list)): ?>
            <tr>
                <td><?=CHtml::activeLabel($profile,'country__id'); ?></td>
                <td>
                <div class="static">
                    <?=$cities->get_country($profile->country__id)?>
                </div>
                <div class="denamic">
                    <?php $cities->countries($profile->country__id); ?>
                </div>                     
                </td>   
                <tr><td colspan="2" id="country__iderror" style="color: red;"><?=$form->error($profile,'country__id'); ?></td></tr>
            </tr>
        <? endif?>
        
        <? if(in_array('region__id', $list)): ?>
            <tr>
                <td><?=CHtml::activeLabel($profile,'region__id'); ?></td>
                <td>
                    <div class="static">
                        <?=$cities->get_country($profile->region__id)?>
                    </div>
                    <div class="denamic">
                        <?php $cities->regions($profile->region__id, $profile->country__id); ?>
                    </div>                       
                </td>    
                <tr><td colspan="2" id="region__iderror" style="color: red;"><?=$form->error($profile,'region__id'); ?></td></tr>
            </tr>
        <? endif?>
        
        <? if(in_array('city__id', $list)): ?>
            <tr>
                <td><?=CHtml::activeLabel($profile,'city__id'); ?></td>
                <td>
                    <div class="static">
                       <?=$cities->get_country($profile->city__id)?>
                    </div>
                    <div class="denamic">
                        <?php $cities->cities($profile->city__id, $profile->region__id); ?>
                    </div>                       
                </td>
                <tr><td colspan="2" id="city__iderror" style="color: red;"><?=$form->error($profile,'city__id'); ?></td></tr>
            </tr>
        <? endif?>
        <?php $this->endWidget(); ?>        
    <? endif; ?>


	<? if(in_array('zip_code', $list)): ?>  
		<tr>
            <td><?=$form->labelEx($profile,'zip_code'); ?></td>
            <td>
                <div class="static">
                    <?=$profile->zip_code?>
                </div>
                <div class="denamic">
                    <?=$form->textField($profile,'zip_code', array('class' => 'forminput')); ?>
                </div>     
            </td>    
        </tr>
		<tr><td colspan="2" id="zip_codeerror" style="color: red;"><?=$form->error($profile,'zip_code'); ?></td></tr>
	<? endif?>      

	<? if(in_array('first_name', $list)): ?>  
		<tr>
            <td><?=$form->labelEx($profilelang,'first_name'); ?></td>
             <td>
                <div class="static">
                    <?=$profilelang->first_name?>
                </div>
                <div class="denamic">
                    <?=$form->textField($profilelang,'first_name',array('size'=>60,'maxlength'=>255, 'class' => 'forminput')); ?>
                </div>     
            </td>   
        </tr>
		<tr><td colspan="2" id="first_nameerror" style="color: red;"><?=$form->error($profilelang,'first_name'); ?></td></tr>
	<? endif?>      

	<? if(in_array('last_name', $list)): ?>  
		<tr>
            <td><?=$form->labelEx($profilelang,'last_name'); ?></td>
             <td>
                <div class="static">
                    <?=$profilelang->last_name?>
                </div>
                <div class="denamic">
                    <?=$form->textField($profilelang,'last_name',array('size'=>60,'maxlength'=>255, 'class' => 'forminput')); ?>
                </div>     
            </td>             
        </tr>
		<tr><td colspan="2" id="last_nameerror" style="color: red;"><?=$form->error($profilelang,'last_name'); ?></td></tr>
	<? endif?>      

	<? if(in_array('second_name', $list)): ?>  
		<tr>
            <td><?=$form->labelEx($profilelang,'second_name'); ?></td>
            <td>
                <div class="static">
                    <?=$profilelang->second_name?>
                </div>
                <div class="denamic">
                  <?=$form->textField($profilelang,'second_name',array('size'=>60,'maxlength'=>255, 'class' => 'forminput')); ?>
                </div>     
            </td>  
        </tr>
		<tr><td colspan="2" id="second_nameerror" style="color: red;"><?=$form->error($profilelang,'second_name'); ?></td></tr>
	<? endif?>      

	<? if(in_array('address', $list)): ?>  
		<tr>
            <td><?=$form->labelEx($profilelang,'address'); ?></td>
                <div class="static">
                    <?=$profilelang->address?>
                </div>
                <div class="denamic">
                  <?=$form->textField($profilelang,'address',array('size'=>60,'maxlength'=>500, 'class' => 'forminput')); ?>
                </div>             
        </tr>
		<tr><td colspan="2" id="addresserror" style="color: red;"><?=$form->error($profilelang,'address'); ?></td></tr>
	<? endif?>
        
</table>
	<div class="row buttons" style="margin-top: 30px;">
        
        <table>
            <tr>
                <td style="text-align: left;">
                    <button type="button" class="btn200" OnClick="edit()"><?=Yii::t('app', 'Редактировать')?></button>
                </td>
                <td style="text-align: right">
                    <?=CHtml::submitButton('Согласен', array('name'=>'btn_register_finish', 'class' => 'btn200')); ?>
                </td>
            </tr>
        </table>
	</div>

<?php $this->endWidget(); ?>

</div>
