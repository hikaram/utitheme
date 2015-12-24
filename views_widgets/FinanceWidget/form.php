

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'finance-transactions-specs-form',
	'enableAjaxValidation'=>false,
    'action' => '/finance/',
    'htmlOptions'=>array('class'=>'reg-form')
)); ?>
<?=$form->hiddenField($modelFinance, 'amount')?><?$this->modelFinance->currency_alias?>
    
<div class="pay-block">
    <table>
        <tr>            
            <td width='200' style="text-align:center; vertical-align: middle;">
                <? if ($modelFinance->modelSpecification->alias == 'wallet_in_for_order_pay_bank') : ?>
                    <img alt="Bank"  src="<?=Yii::app()->assetManager->getPublishedUrl(Yii::getPathOfAlias('store.css')); ?>/img/ps/bank.png">
                <? elseif ($modelFinance->modelSpecification->alias == 'payment_shop_order_registered_users') : ?>
                        <img alt="Wallet"  src="<?=Yii::app()->assetManager->getPublishedUrl(Yii::getPathOfAlias('store.css')); ?>/img/ps/wallet.png">
                <? elseif ($modelFinance->modelSpecification->alias == 'wallet_in_for_order_pay_payboutique') : ?>
                    <img alt="Payboutique"  src="<?=Yii::app()->assetManager->getPublishedUrl(Yii::getPathOfAlias('store.css')); ?>/img/ps/qiwi.png">
				<? elseif ($modelFinance->modelSpecification->alias == 'wallet_in_for_order_pay_walletone') : ?>
                    <img alt="WalletOne"  src="<?=Yii::app()->assetManager->getPublishedUrl(Yii::getPathOfAlias('store.css')); ?>/img/ps/walletone.png">
				<? elseif ($modelFinance->modelSpecification->alias == 'wallet_in_for_order_pay_paypal') : ?>
                    <img alt="Paypal"  src="<?=Yii::app()->assetManager->getPublishedUrl(Yii::getPathOfAlias('store.css')); ?>/img/ps/paypal.png">
				<? elseif ($modelFinance->modelSpecification->alias == 'wallet_in_for_order_pay_perfect') : ?>
                    <img alt="Perfect"  src="<?=Yii::app()->assetManager->getPublishedUrl(Yii::getPathOfAlias('store.css')); ?>/img/ps/perfect.png">
				<? elseif ($modelFinance->modelSpecification->alias == 'wallet_in_for_order_pay_interkassa') : ?>
                    <img alt="Interkassa"  src="<?=Yii::app()->assetManager->getPublishedUrl(Yii::getPathOfAlias('store.css')); ?>/img/ps/interkassa.png">
                                <? elseif ($modelFinance->modelSpecification->alias == 'wallet_in_for_order_pay_moneyonline') : ?>
                    <img alt="Moneyonline"  src="<?=Yii::app()->assetManager->getPublishedUrl(Yii::getPathOfAlias('store.css')); ?>/img/ps/moneyonline.png">
                <? endif; ?>
            </td>
            <td width='550' style='padding-left: 20px; padding-top: 10px;'>
				<? if ($modelFinance->modelSpecification->alias == 'wallet_in_for_order_pay_bank') : ?>
                <? Yii::t('app', '  Оплата наличными в Сбербанке.
                                    Распечайте квитанцию или перепишите банковские реквизиты,
                                    впишите свою фамилию, имя и сумму оплаты и оплачивайте
                                    в ближайшем отделении Сбербанка.')?>
				<? elseif ($modelFinance->modelSpecification->alias == 'payment_shop_order_registered_users') : ?>
					<?=Yii::t('app', 'Оплата заказа с помощью внутреннего кошелька')?>
				<? else : ?>
                    <?=Yii::t('app', 'Оплата заказа с помощью платежной системы')?>
					&nbsp;&nbsp;
					<? if ($modelFinance->modelSpecification->alias == 'wallet_in_for_order_pay_payboutique') : ?>"Qiwi"
					<? elseif ($modelFinance->modelSpecification->alias == 'wallet_in_for_order_pay_walletone') : ?>"Единый кошелек"
					<? elseif ($modelFinance->modelSpecification->alias == 'wallet_in_for_order_pay_paypal') : ?>"Paypal"
					<? elseif ($modelFinance->modelSpecification->alias == 'wallet_in_for_order_pay_perfect') : ?>"PerfectMoney"
					<? elseif ($modelFinance->modelSpecification->alias == 'wallet_in_for_order_pay_interkassa') : ?>"Interkassa"
					<? elseif ($modelFinance->modelSpecification->alias == 'wallet_in_for_order_pay_moneyonline') : ?>"Деньги онлайн"
					<? endif; ?>&nbsp;&nbsp;
				<? endif; ?>
            </td>
            <td width='150' style='padding-left: 20px;'>
               <?=CHtml::submitButton($this->buttonCaption, array('name' => 'yt0', 'class' => 'btn100')); ?>
            </td>
        </tr>  
        <tr>
            <td colspan="2">
                <?php if ($this->is_show_objects && count($modelFinance->modelsTransactionsObjects) > 0) : ?>
                    <table>
                        <?php foreach($modelFinance->modelsTransactionsObjects as $key => $object) : ?>
                        <? $property = 'is_show_for_' . $this->scenario ?>
                        
                        <tr style="display:none">
                            <td><?=$object->title?><?php if($object->is_required) echo '*'?></td>
                            <td>
                                <?=$form->hiddenField($object, "[$key]" . 'alias')?>
                                <? if (in_array($key, $this->objects_safe)) : ?>
                                    <?=$form->textField($object, "[$key]" . 'value', array('readonly' => 'readonly'))?>
                                <? else : ?>
                                    <?=$form->textField($object, "[$key]" . 'value')?>
                                <? endif;?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                <?php endif; ?>
            </td>
        </tr>        
    </table>

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