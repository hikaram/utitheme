<?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'theme-form',
        'enableAjaxValidation'=>false,
)); ?>

    <div class="note note-info">
        <i class="fa fa-info" style="margin-right: 10px;"></i> <?=Yii::t('app', 'Поля помеченные')?> <span class="required">*</span> <?=Yii::t('app', 'обязательны к заполнению.')?>
    </div>

    <?=$form->errorSummary(array_merge(array_merge(array_merge([$model, $model_lang], $model_phones), $model_skypes), $model_address), '<div class="note note-danger"><i class="fa fa-warning" style="margin-right: 10px;"></i> ' . Yii::t('app', 'Необходимо исправить следующие ошибки') . ':', '</div>', ['style' => 'display: inline-table;'])?>

    <div class="portlet box green">
    	<div class="portlet-title">
    		<div class="caption">
    			<i class="glyphicon glyphicon-plus" style="margin-right: 10px;"></i>
    			<? if ((boolean)$model->isNewRecord == TRUE) : ?>
    				<?=Yii::t('app', 'Создание новой');?>
    			<? else : ?>
    				<?=Yii::t('app', 'Редактирование');?>
    			<? endif;?>
    			<?=Yii::t('app', 'компании');?>
    		</div>
    	</div>
    	<div class="portlet-body form form-horizontal">
    		<div class="form-body">
    			<div class="form-group" style="margin-top: 20px;">
    				<?php echo $form->labelEx($model,'title', array('class' => 'col-md-3 control-label')); ?>
    				<div class="col-md-9">
    					<?php echo $form->textField($model,'title',array('class' => 'form-control input-inline input-large', 'size'=>60,'maxlength'=>255)); ?>
    					<span class="help-block text-danger" style="color: #a94442;"><?php echo $form->error($model,'title'); ?></span>
    				</div>
    			</div>
    			<? if (Yii::app()->user->username == Yii::app()->params['superAdminInfo']['username']) : ?>
    			<div class="form-group">
    				<?php echo $form->labelEx($model,'alias', array('class' => 'col-md-3 control-label')); ?>
    				<div class="col-md-9">
    					<?php echo $form->textField($model,'alias',array('class' => 'form-control input-inline input-large', 'size'=>60,'maxlength'=>255)); ?>
    					<span class="help-block text-danger" style="color: #a94442;"><?php echo $form->error($model,'alias'); ?></span>
    				</div>
    			</div>
    			<? endif; ?>
    			<div class="form-group" id="tr_before_address">
    				<?php echo $form->labelEx($model_lang,'description', array('class' => 'col-md-3 control-label')); ?>
    				<div class="col-md-9">
    					<?php echo $form->textArea($model_lang,'description',array('class' => 'form-control input-inline input-large', 'rows'=>5)); ?>
    					<span class="help-block text-danger" style="color: #a94442;"><?php echo $form->error($model_lang,'description'); ?></span>
    				</div>
    			</div>
    			
    			<? foreach ($model_address as $key5 => $address) : ?>
                    <div class="form-group" id="address_tr_first_<?=$key5?>">
                        <div class="col-md-3 text-right">
                            <? if (empty($key5)) : ?><?=$form->labelEx($address, 'value', array('class' => 'control-label'))?><? endif; ?>
                        </div>
                        <div class="col-md-9">
                            <?=$form->textArea($address, 'value', array('class' => 'form-control input-inline address', 'style' => 'width: 320px;', 'name' => 'CompanyAddress[' . $key5 . '][value]'))?>
                            <? if ($address->id != NULL) : ?>
                                <?=CHtml::linkButton('<i class="fa fa-times"></i>',array(
                                     'submit' => array('list/deleteaddress', 'company' => $model->id, 'id' => $address->id),
                                     'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
                                     'confirm' => Yii::t('app', 'Удалить адрес?'),
                                     'class' => 'btn red'));  ?><br />
                            <? else : ?>
                                <?=CHtml::link('<i class="fa fa-times"></i>', 'javascript:void(0)', array('class' => 'btn red','onClick' => 'deleteAddress(' . $key5 . ')'))?>
                            <? endif; ?>
                            <div id="address_tr_<?=$key5?>" class="text-danger">
                                <?=$form->error($address, 'value')?>
                            </div>
                        </div>
                    </div>
    			<? endforeach; ?>
    			<div class="form-group" id="tr_before_email">
    				<div class="col-md-3"></div>
    				<div class="col-md-9">
    					<?=CHtml::link(Yii::t('app', 'Добавить адрес'), 'javascript:void(0)', array('onClick' => 'addAddress()'))?>
    				</div>
    			</div>
    			
    			<div class="form-group" id="tr_before_phone">
    				<?php echo $form->labelEx($model,'email', array('class' => 'col-md-3 control-label')); ?>
    				<div class="col-md-9">
    					<?php echo $form->textField($model,'email',array('class' => 'form-control input-inline input-large', 'size'=>60,'maxlength'=>255)); ?>
    					<span class="help-block text-danger" style="color: #a94442;"><?php echo $form->error($model,'email'); ?></span>
    				</div>
    			</div>         
                
    			<? foreach ($model_phones as $key => $phone) : ?>
                    <div class="form-group" id="phone_tr_first_<?=$key?>">
                        <div class="col-md-3 text-right">
                            <? if (empty($key)) : ?><?=$form->labelEx($phone, 'value', array('class' => 'control-label'))?><? endif; ?>
                        </div>
                        <div class="col-md-9">
                            <?=$form->textField($phone, 'value', array('class' => 'form-control input-inline phones', 'style' => 'width: 190px;', 'name' => 'CompanyPhones[' . $key . '][value]'))?>
                            <?=$form->labelEx($phone, 'comment', array('class' => 'control-label', 'style' => 'margin-left: 15px;'))?>
                            <?=$form->textField($phone, 'comment', array('class' => 'form-control input-inline', 'style' => 'width: 190px; margin-left: 5px;', 'name' => 'CompanyPhones[' . $key . '][comment]'))?>
                            <? if ($phone->id != NULL) : ?>
                                <?=CHtml::linkButton('<i class="fa fa-times"></i>',array(
                                     'submit' => array('list/deletephone', 'company' => $model->id, 'id' => $phone->id),
                                     'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
                                     'confirm' => Yii::t('app', 'Удалить телефон?'),
                                     'class' => 'btn red'));  ?><br />
                            <? else : ?>
                                <?=CHtml::link('<i class="fa fa-times"></i>', 'javascript:void(0)', array('class' => 'btn red','onClick' => 'deletePhone(' . $key . ')'))?>
                            <? endif; ?>
                            <div id="phone_tr_<?=$key?>" class="text-danger">
                                <?=$form->error($phone, 'value')?>
                            </div>
                        </div>
                    </div>
    			<? endforeach; ?>
    			<div class="form-group" id="tr_before_skype">
    				<div class="col-md-3"></div>
    				<div class="col-md-9">
    					<?=CHtml::link(Yii::t('app', 'Добавить телефон'), 'javascript:void(0)', array('onClick' => 'addPhone()'))?>
    				</div>
    			</div>
    			<? foreach ($model_skypes as $key2 => $skype) : ?>
                    <div class="form-group" id="skype_tr_first_<?=$key2?>">
                        <div class="col-md-3 text-right">
                            <? if (empty($key2)) : ?><?=$form->labelEx($skype, 'value', array('class' => 'control-label'))?><? endif; ?>
                        </div>
                        <div class="col-md-9">
                            <?=$form->textField($skype, 'value', array('class' => 'form-control input-inline input-large skypes', 'name' => 'CompanySkypes[' . $key2 . '][value]'))?>
                            <? if ($skype->id != NULL) : ?>
                                <?=CHtml::linkButton('<i class="fa fa-times"></i>',array(
                                     'submit' => array('list/deleteskype', 'company' => $model->id, 'id' => $skype->id),
                                     'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
                                     'confirm' => Yii::t('app', 'Удалить скайп?'),
                                     'class' => 'btn red'));  ?><br />
                            <? else : ?>
                                <?=CHtml::link('<i class="fa fa-times"></i>', 'javascript:void(0)', array('class' => 'btn red','onClick' => 'deleteSkype(' . $key2 . ')'))?>
                            <? endif; ?>
                            <div id="skype_tr_<?=$key2?>" class="text-danger">
                                <?=$form->error($skype, 'value')?>
                            </div>
                        </div>
                    </div>
    			<? endforeach; ?>
    			<div class="form-group">
    				<div class="col-md-3"></div>
    				<div class="col-md-9">
    					<?=CHtml::link(Yii::t('app', 'Добавить скайп'), 'javascript:void(0)', array('onClick' => 'addSkype()'))?>
    				</div>
    			</div>
    		</div>
    		<div class="form-actions">
    			<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('app', 'Создать') : Yii::t('app', 'Сохранить'), array('class'=>'btn green')); ?>
    			<? if (Yii::app()->user->checkAccess('AdminCompaniesListIndex')) : ?>
                    <?=CHtml::link(Yii::t('app', 'К списку компаний'), $this->createUrl('index'), array('class' => 'btn grey'))?>
                <? endif; ?>
    		</div>
    	</div>
    </div>

<?php $this->endWidget(); ?>