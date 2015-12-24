<div class="row">
	<div class="col-md-6">
		<div class="portlet sale-summary">
			<div class="portlet-title">
				<div class="caption">
					<?=CHtml::encode($transaction->spec->description)?>
				</div>
			</div>
			<div class="portlet-body">
				<ul class="list-unstyled">
					<li>
						<span class="sale-info">
							<?=Yii::t('app', 'Сумма операции')?>
						</span>
						<span class="sale-num">
							<?=sprintf('%.2f', $transaction->amount);?> <?=CHtml::encode($abbreviation)?>
						</span>
					</li>
					<li>
						<span class="sale-info">
							<?=Yii::t('app', 'Комиссия')?>
						</span>
						<span class="sale-num">
							0.00
						</span>
					</li>
					<li>
						<span class="sale-info">
							<?=Yii::t('app', 'Сумма к оплате')?>
						</span>
						<span class="sale-num">
							<?=sprintf('%.2f', $transaction->amount);?> <?=CHtml::encode($abbreviation)?>
						</span>
					</li>
				</ul>				
                    <?php $form = $this->beginWidget('CActiveForm', array(
                        'method' => 'POST',
                        'action' => $config->EMULATION === 'true' ? $this->createUrl('pay/emulation', array('guid' => $transaction->guid)) : 'https://merchant.webmoney.ru/lmi/payment.asp',
                        'htmlOptions' => array(
                            'accept-charset' => 'utf-8',
                            'name' => 'pay'
                        )
                    )) ?>
                        <?php if ($config->EMULATION === 'true') : ?>
                            <?=$form->hiddenField($transaction, 'guid')?>
                        <?php endif; ?>

                        <?php if ($config->EMULATION === 'false') : ?>
                            <?=CHtml::hiddenField('LMI_PAYMENT_AMOUNT', number_format($transaction->amount, 2))?>
                            <?=CHtml::hiddenField('LMI_PAYMENT_DESC', CHtml::encode(Translit::Encode($transaction->spec->title)))?>
                            <?=CHtml::hiddenField('LMI_PAYMENT_NO', $transaction->id)?>
                            <?=CHtml::hiddenField('LMI_PAYEE_PURSE', $PAYEE_PURSE)?>
                            <?php if (!empty($config->sim_mode)) : ?><?=CHtml::hiddenField('LMI_SIM_MODE', $config->sim_mode)?> <?php endif; ?>
                            <?=CHtml::hiddenField('LMI_RESULT_URL', $this->createUrl('result'))?>
                            <?=CHtml::hiddenField('LMI_FAIL_URL', $this->createUrl('fail'))?>
                        <?php endif; ?>

                        <?=CHtml::submitButton(Yii::t('app', 'Оплатить'),['class' => "btn green"])?>                
                    <?php $this->endWidget(); ?>
                </div>
		</div>
	</div>
</div>