<div class="portlet box green">
    <div class="portlet-title">
        <h3 class="caption">
			<i class="fa fa-money"></i>
			<?= Yii::t('app', 'Вывод финансов') ?></a>
        </h3>
    </div>
    <div class="portlet-body form-horizontal form form-bordered">
        <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'finance-transactions-specs-form',
            'enableAjaxValidation'=>false,
            'action' => Yii::app()->controller->createUrl('/finance/')
        )); ?>
		<div class="form-body">
			<div class="form-group">
				<label class="col-sm-3 control-label" for="accountSystem"><?= Yii::t('app', 'Платежная система') ?></label>
				<div class="col-sm-4">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-money"></i>
						</span>
                        <select name="where_output" class="form-control" id="accountSystem">
                            <option><?= Yii::t('app', 'Вывод финансов на другие системы') ?></option>
                        </select>
					</div>
				</div>
			</div>
			<div class="form-group">
				<?=$form->labelEx($modelFinance, 'amount', array('class' => 'col-sm-3 control-label'))?>
				<div class="col-sm-4">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-check"></i>
						</span>
                        <? if ($this->is_amount_change) : ?>
                            <?=$form->textField($modelFinance, 'amount', array('class' => 'form-control tt-hint'))?><?$this->modelFinance->currency_alias?>
                        <? else : ?>
                            <?=$form->textField($modelFinance, 'amount', array('readonly' => 'readonly', 'class' => 'form-control tt-hint'))?><?$this->modelFinance->currency_alias?>
                        <? endif; ?>                        
					</div>
				</div>
			</div>
            <?php if ($this->is_comment_form_show && $modelFinance->is_comment_form_show) : ?>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?=$form->labelEx($modelFinance, 'comment')?></label>
                    <div class="col-sm-4">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-check"></i>
                            </span>
                            <?=$form->textArea($modelFinance, 'comment', array('class' => 'form-control tt-hint'))?>
                        </div>
                    </div>
                </div>            
            <? endif; ?>
            <?php if ($this->is_password_require && $modelFinance->is_password_require) : ?>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?=$form->labelEx($modelFinance, 'finpassword')?></label>
                    <div class="col-sm-4">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-check"></i>
                            </span>
                            <?=$form->passwordField($modelFinance, 'finpassword', array('class' => 'form-control tt-hint'))?>
                        </div>
                    </div>
                </div>            
            <? endif; ?>            
            
            <?php if ($this->is_show_objects && count($modelFinance->modelsTransactionsObjects) > 0) : ?>

                <?php foreach($modelFinance->modelsTransactionsObjects as $key => $object) : ?>
                <? $property = 'is_show_for_' . $this->scenario ?>
                
                
                <div class="form-group" <? if (!(bool)$object->$property) echo 'style="display:none"'; ?>>
                    <label class="col-sm-3 control-label"><?=Yii::t('app', $object->title)?><?php if($object->is_required) echo ' <span class="required">*</span>'?></label>
                    <div class="col-sm-4">
                        <div class="input-group">
                            <?=$form->hiddenField($object, "[$key]" . 'alias')?>
                            <? if (in_array($key, $this->objects_safe)) : ?>
                                <?=$form->textField($object, "[$key]" . 'value', array('readonly' => 'readonly', 'class' => 'form-control tt-hint'))?>
                            <? else : ?>
                                <?=$form->textArea($object, "[$key]" . 'value', array('cols'=>"145", 'class' => 'form-control tt-hint'))?>
                            <? endif;?>
                        </div>
                    </div>
                </div>            
                
                <?php endforeach; ?>

            <?php endif; ?>            
            
            
		</div>
		<div class="buttons form-actions" style="margin-top: 10px;">
			<?php echo CHtml::submitButton($this->buttonCaption, array('name' => 'yt0', 'class' => 'btn green')); ?>
		</div>
        
        <?=CHtml::hiddenField('scenario', $this->scenario)?>
        <?=$form->hiddenField($modelFinance, 'currency_alias')?>
        <?=$form->hiddenField($modelFinance, 'spec_alias')?>
        <?=$form->hiddenField($modelFinance, 'redirect_open')?>
        <?=$form->hiddenField($modelFinance, 'redirect_decline')?>
        <?=$form->hiddenField($modelFinance, 'redirect_confirm')?>
        <?=CHtml::hiddenField('pageTitle', $this->pageTitle)?>
        <?=CHtml::hiddenField('text', $this->text)?>
        <?=CHtml::hiddenField('debit_object_alias', $this->modelFinance->getModelDebitWallet()->object_alias)?>
        <?=CHtml::hiddenField('credit_object_alias', $this->modelFinance->getModelCreditWallet()->object_alias)?>
        <?=CHtml::hiddenField('debit_wallet_id', $this->modelFinance->getModelDebitWallet()->id)?>
        <?=CHtml::hiddenField('credit_wallet_id', $this->modelFinance->getModelCreditWallet()->id)?>
        <?=CHtml::hiddenField('hash', $this->hash)?>
        <?=CHtml::hiddenField('is_widget', '1')?>
        <?=CHtml::hiddenField('is_show_objects', (int) $this->is_show_objects)?>
        <?=CHtml::hiddenField('is_amount_change', (int) $this->is_amount_change)?>


        <? foreach ($this->objects_safe as $object) : ?>
            <input type="hidden" value="<?=$object?>" name="objects_safe[]" />
        <? endforeach; ?>
        <?php $this->endWidget(); ?>
	</div>
</div>

<? /*


<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'finance-transactions-specs-form',
	'enableAjaxValidation'=>false,
    'action' => Yii::app()->controller->createUrl('/finance/')
)); ?>




<style>
    .block-pay {background: #EEEEFF; }
</style>



        <tr>
            <td><?=$form->labelEx($modelFinance, 'amount')?></td>
            <? if ($this->is_amount_change) : ?>
                <td><?=$form->textField($modelFinance, 'amount')?><?$this->modelFinance->currency_alias?></td>
            <? else : ?>
                <td><?=$form->textField($modelFinance, 'amount', array('readonly' => 'readonly'))?><?$this->modelFinance->currency_alias?></td>
            <? endif; ?>
        </tr>
        <tr>
            <?php if ($this->is_comment_form_show && $modelFinance->is_comment_form_show) : ?>
                <td><?=$form->labelEx($modelFinance, 'comment')?></td>
                <td><?=$form->textArea($modelFinance, 'comment')?></td>
            <?php endif; ?>
        </tr>
        <tr>            
            <?php if ($this->is_password_require && $modelFinance->is_password_require) : ?>
                <td><?=$form->labelEx($modelFinance, 'finpassword')?></td>
                <td><?=$form->textField($modelFinance, 'finpassword')?></td>
            <?php endif; ?>
        </tr>

        <?php if ($this->is_show_objects && count($modelFinance->modelsTransactionsObjects) > 0) : ?>

                <?php foreach($modelFinance->modelsTransactionsObjects as $key => $object) : ?>
                <? $property = 'is_show_for_' . $this->scenario ?>
                
                <tr <? if (!(bool)$object->$property) echo 'style="display:none"'; ?>>
                    <td><?=Yii::t('app', $object->title)?><?php if($object->is_required) echo '*'?></td>
                    <td>
                        <?=$form->hiddenField($object, "[$key]" . 'alias')?>
                        <? if (in_array($key, $this->objects_safe)) : ?>
                            <?=$form->textField($object, "[$key]" . 'value', array('readonly' => 'readonly'))?>
                        <? else : ?>
                            <?=$form->textArea($object, "[$key]" . 'value', array('cols'=>"45"))?>
                        <? endif;?>
                    </td>
                </tr>
                <?php endforeach; ?>

        <?php endif; ?>

        <tr>            
            <td colspan="2" style="text-align: center;"><?php echo CHtml::submitButton($this->buttonCaption, array('name' => 'yt0', 'class' => 'btn150')); ?></td>
        </tr>


<?=CHtml::hiddenField('scenario', $this->scenario)?>
<?=$form->hiddenField($modelFinance, 'currency_alias')?>
<?=$form->hiddenField($modelFinance, 'spec_alias')?>
<?=$form->hiddenField($modelFinance, 'redirect_open')?>
<?=$form->hiddenField($modelFinance, 'redirect_decline')?>
<?=$form->hiddenField($modelFinance, 'redirect_confirm')?>
<?=CHtml::hiddenField('pageTitle', $this->pageTitle)?>
<?=CHtml::hiddenField('text', $this->text)?>
<?=CHtml::hiddenField('debit_object_alias', $this->modelFinance->getModelDebitWallet()->object_alias)?>
<?=CHtml::hiddenField('credit_object_alias', $this->modelFinance->getModelCreditWallet()->object_alias)?>
<?=CHtml::hiddenField('debit_wallet_id', $this->modelFinance->getModelDebitWallet()->id)?>
<?=CHtml::hiddenField('credit_wallet_id', $this->modelFinance->getModelCreditWallet()->id)?>
<?=CHtml::hiddenField('hash', $this->hash)?>
<?=CHtml::hiddenField('is_widget', '1')?>
<?=CHtml::hiddenField('is_show_objects', (int) $this->is_show_objects)?>
<?=CHtml::hiddenField('is_amount_change', (int) $this->is_amount_change)?>


<? foreach ($this->objects_safe as $object) : ?>
<input type="hidden" value="<?=$object?>" name="objects_safe[]" />
<? endforeach; ?>
<?php $this->endWidget(); ?>
*/ ?>
