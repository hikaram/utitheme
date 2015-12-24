<div class="note note-danger">
	<i class="fa fa-warning" style="margin-right: 10px;"></i> 
    <?php if ($is_widget && count($fieldsEmpty) > 0) : ?>
    <?=Yii::t('app', 'Пожалуйста, укажите дополнительные данные в следующих полях')?>:
    <ul>
    <? foreach ($fieldsEmpty as $name) : ?>
        <li><?=$transaction->getAttributeLabel($name)?></li>
    <? endforeach; ?>
    </ul>
    <?php endif; ?>

    <?php 
    $errors = array();
    $errors = array_merge($errors, $transaction->getErrors());
    foreach($transaction->modelsTransactionsObjects as $key => $object)
    {
        $errors = array_merge($errors, $object->getErrors());
    }
    ?>

    <?php if (count($errors) > 0 && (bool)$is_widget && count($fieldsEmpty) > 0) : ?>
    <?=Yii::t('app', 'А также исправьте следующие ошибки')?>:
    <?php elseif (count($errors) > 0) : ?>
    <?=Yii::t('app', 'Необходимо исправить следующие ошибки')?>:
    <?php endif; ?>

    <ul>
    <?php foreach($errors as $error) : ?>
        <li>
            <?=$error[0]?>
        </li>
    <?php endforeach; ?>    
    </ul> 
</div>

<div class="portlet box green">
    <div class="portlet-title">
        <h3 class="caption">
			<i class="fa fa-money"></i>
			<?= $this->pageTitle; ?></a>
        </h3>
    </div>
    <div class="portlet-body form-horizontal form form-bordered">
    
        <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'finance-transactions-specs-form',
            'enableAjaxValidation'=>false,
        )); ?>

        <div class="form-body">
        
			<div class="form-group">
                <?=$form->labelEx($transaction, 'amount', array('class' => 'col-sm-3 control-label'))?>
				<div class="col-sm-4">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-user"></i>
						</span>
                        <? if ($is_amount_change) : ?>
                            <?=$form->textField($transaction, 'amount', array('class' => 'form-control'))?>
                        <? else : ?>
                            <?=$form->textField($transaction, 'amount', array('readonly' => 'readonly', 'class' => 'form-control'))?>
                        <? endif; ?>                        
                        <span class="input-group-addon" style="background-color: #fff; border: none;">
							<?=CHtml::encode($transaction->getModelCurrency()->abbreviation)?>
						</span>
					</div>
                    <div class="help-block font-red"><?php echo $form->error($transaction, 'amount'); ?></div>
                    
				</div>
			</div>            
            
			<div class="form-group" style="display: none;">
                <?=$form->labelEx($transaction, 'spec_alias', array('class' => 'col-sm-3 control-label'))?>
				<div class="col-sm-4">
					<div class="input-group">
                        <?=$form->textField($transaction, 'spec_alias', array('readonly' => 'readonly', 'class' => 'form-control'))?>
					</div>
                    <div class="help-block font-red"><?php echo $form->error($transaction,'spec_alias'); ?></div>
                    
				</div>
			</div>             
            
            <?php if ($transaction->is_comment_form_show) : ?>
            
                <div class="form-group">
                    <?=$form->labelEx($transaction, 'comment', array('class' => 'col-sm-3 control-label'))?>
                    <div class="col-sm-4">
                        <div class="input-group">
                            <?=$form->textArea($transaction, 'comment', array('class' => 'form-control'))?>
                        </div>
                        <div class="help-block font-red"><?php echo $form->error($transaction,'comment'); ?></div>
                        
                    </div>
                </div>             
            
            <? endif; ?>
            
            <?php if ($transaction->is_password_require) : ?>
            
                <div class="form-group">
                    <?=$form->labelEx($transaction, 'finpassword', array('class' => 'col-sm-3 control-label'))?>
                    <div class="col-sm-4">
                        <div class="input-group">
                            <?=$form->passwordField($transaction, 'finpassword', array('class' => 'form-control', 'value' => (string)FALSE))?>
                        </div>
                        <div class="help-block font-red"><?php echo $form->error($transaction,'finpassword'); ?></div>
                        
                    </div>
                </div>             
            
            <? endif; ?>
            
            <?php if ($is_show_objects) : ?>
            
                <?php foreach($transaction->modelsTransactionsObjects as $key => $object) : ?>
                    <? $property = 'is_show_for_' . $transaction->scenario ?>

                    <div class="form-group" <? if (!(bool)$object->$property) echo 'style="display:none"'; ?>>
                        <label class="col-sm-3 control-label"><?=Yii::t('app', $object->title)?><?php if($object->is_required) echo ' <span class="required">*</span>'?></label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <?=$form->hiddenField($object, "[$key]" . 'alias')?>
                                <? if (in_array($key, $objects_safe) || in_array($key, $objects_readonly)) : ?>
                                    <?=$form->textField($object, "[$key]" . 'value', array('readonly' => 'readonly', 'class' => 'col-sm-3 control-label'))?>
                                <? else : ?>
                                    <?=$form->textField($object, "[$key]" . 'value', array('class' => 'form-control'))?>
                                <? endif;?>
                            </div>
                            <div class="help-block font-red"><?php echo $form->error($object, 'value'); ?></div>
                            
                        </div>
                    </div> 
                    
                <?php endforeach; ?>
            
            <? endif; ?>
            <? /*
            <table>

                
                <?php if ($is_show_objects) : ?>
                    <?php foreach($transaction->modelsTransactionsObjects as $key => $object) : ?>
                    <? $property = 'is_show_for_' . $transaction->scenario ?>
                    <tr <? if (!(bool)$object->$property) echo 'style="display:none"'; ?>>
                        <td><?=Yii::t('app', $object->title)?><?php if($object->is_required) echo '*'?></td>
                        <td>
                            <?=$form->hiddenField($object, "[$key]" . 'alias')?>
                            <? if (in_array($key, $objects_safe) || in_array($key, $objects_readonly)) : ?>
                                <?=$form->textField($object, "[$key]" . 'value', array('readonly' => 'readonly'))?>
                            <? else : ?>
                                <?=$form->textField($object, "[$key]" . 'value')?>
                            <? endif;?>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td colspan="2"><?php echo $form->error($object, 'value'); ?></td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
                
                <tr>
                    <td></td>
                    <td colspan="2"><?php echo CHtml::submitButton($_POST['yt0']); ?></td>
                </tr>
                
            </table>
*/ ?>
            <?=$form->hiddenField($transaction, 'currency_alias')?>

            <?=CHtml::hiddenField('scenario', $transaction->scenario)?>
            <?=$form->hiddenField($transaction, 'currency_alias')?>
            <?=$form->hiddenField($transaction, 'spec_alias')?>
            <?=$form->hiddenField($transaction, 'redirect_open')?>
            <?=$form->hiddenField($transaction, 'redirect_decline')?>
            <?=$form->hiddenField($transaction, 'redirect_confirm')?>
            <?=CHtml::hiddenField('pageTitle', $this->pageTitle)?>
            <?=CHtml::hiddenField('text', $text)?>
            <?=CHtml::hiddenField('debit_object_alias', $transaction->getModelDebitWallet()->object_alias)?>
            <?=CHtml::hiddenField('credit_object_alias', $transaction->getModelCreditWallet()->object_alias)?>
            <?=CHtml::hiddenField('debit_wallet_id', $transaction->getModelDebitWallet()->id)?>
            <?=CHtml::hiddenField('credit_wallet_id', $transaction->getModelCreditWallet()->id)?>
            <?=CHtml::hiddenField('hash', $hash)?>
            <?=CHtml::hiddenField('is_widget', '0')?>
            <?=CHtml::hiddenField('is_show_objects', (int) $is_show_objects)?>
            <?=CHtml::hiddenField('is_amount_change', (int) $is_amount_change)?>

            <? if (array_key_exists('objects_safe', $_POST)) : ?>
            <? foreach ($_POST['objects_safe'] as $object) : ?>
            <input type="hidden" value="<?=$object?>" name="objects_safe[]" />
            <? endforeach; ?>
            <? endif; ?>

            <? if (array_key_exists('objects_readonly', $_POST)) : ?>
            <? foreach ($_POST['objects_readonly'] as $object) : ?>
            <input type="hidden" value="<?=$object?>" name="objects_readonly[]" />
            <? endforeach; ?>
            <? endif; ?>
        
        </div>
        
		<div class="buttons form-actions" style="margin-top: 10px;">
			<?php echo CHtml::submitButton($_POST['yt0'], array('class' => 'btn green')); ?>
		</div>        
        
        <?php $this->endWidget(); ?>
    
    
    </div>
</div>


