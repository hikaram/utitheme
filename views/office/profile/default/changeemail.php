<?php $this->layout = 'office'; ?>
<div class="portlet box green">
	<div class="portlet-title">
		<h3 class="caption">
			<i class="fa fa-envelope-o"></i>
			<?= Yii::t('app', 'Изменение Email') ?></a>
		</h3>
	</div>
	<div class="portlet-body form form-horizontal">
		<div class=" form-body">
			<div class="note note-warning">
				<h4 class="block"><?=Yii::t('app', 'Ваш текущий Email')?>: <span class="text-regular"><?=CHtml::encode($oldemail) ?></span></h4>
				<p>
                    <?=Yii::t('app', 'Если указанный Email более не актуален, Вы можете указать новый Email.')?> 
                    <? if (in_array($this->editTypeEmail, array(
                                UsersRegisterSecurityParams::EDIT_TYPE_EMAIL_CONFIRM,
                                UsersRegisterSecurityParams::EDIT_TYPE_EMAIL_FULL
                                ))) : ?>
                        <?=Yii::t('app', 'На него будет выслано письмо с подтверждением смены адреса. При переходе по ссылке из письма Ваш новый почтовый адрес будет сохранен')?>
                    <? endif; ?>
                </p>
			</div>
			<?=CHtml::beginForm()?>
                <div class="form-group" style="margin-top: 30px;">
                    <label class="col-md-3 control-label"><?= Yii::t('app', 'Введите новый Email') ?></label>
                    <div class="col-md-3">
                        <?=CHtml::activeTextField($model, 'email', array('value' => $value, 'class' =>  (((bool)$error) || (($profile->getError('new_email')) != NULL) || ($model->getError('email') != NULL)) ? 'form-control error' : 'form-control'));?>
                        <? if (((bool)$error) || (($profile->getError('new_email')) != NULL) || ($model->getError('email') != NULL)) : ?>
                            <div class="help-block font-red">
                                <?=CHtml::encode($errorTextEmail)?>
                                <?=CHtml::encode($profile->getError('new_email'))?>
                                <?=CHtml::encode($model->getError('email'))?>
                            </div>
                        <? endif; ?>
                    </div>
                </div>
                
                <? if ((in_array($this->editTypeEmail, array(
                    UsersRegisterSecurityParams::EDIT_TYPE_EMAIL_QUESTION,
                    UsersRegisterSecurityParams::EDIT_TYPE_EMAIL_FULL
                ))) && ($answer != NULL)) : ?>
                
                    <div class="form-group" style="margin-top: 30px;">
                        <label class="col-md-3 control-label"><?=CHtml::encode($answer->description)?></label>
                        <div class="col-md-3">
                            <?=CHtml::activeTextField($answer, 'answer', array('value' => '', 'class' => ((bool)$error) ? 'form-control error' : 'form-control'));?>
                            <?  if ((bool)$error) : ?>
                                <div class="help-block font-red">
                                    <?=CHtml::encode($errorTextAnswer)?>
                                </div>
                            <? endif; ?>
                        </div>
                    </div>                
                
                <? endif; ?>		
            
                <div class="buttons form-actions" style="margin-top: 10px;">
                    <?=CHtml::submitButton(Yii::t('app', 'Изменить'), array('class' => 'btn green'))?>
                    <?=CHtml::button(Yii::t('app', 'Отмена'), array('class' => 'btn', 'onClick' => 'location.href = "' . $this->createUrl('index') . '"'))?>
                </div>
            <?=CHtml::endForm()?>    
        </div>
    </div>
</div>
