<?php $this->layout = 'office'; ?>

<? if (((bool)$accessToWalletInBank) && (Yii::app()->isModuleInstall('Bank'))) : ?>

    <?=$this->renderPartial('_ps', array(
    	'pageTitle'		=> Yii::t('app', 'Заказ на ввод средств через банк'),
    	'specAlias'		=> $finance->modelFinance->setSpecificationByAlias($this->getAliasForOperation('wallet_in_bank', $wallet->id)),
    	'purposeAlias'	=> 'bank'
    ))?>


<? endif; ?>

<? if (Yii::app()->isModuleInstall('PaymentsystemPerfect')) : ?>

	<?=$this->renderPartial('_ps', array(
		'pageTitle'		=> Yii::t('app', 'Заказ на ввод средств через платежную систему PerfectMoney'),
		'specAlias'		=> 'perfect_in',
		'purposeAlias'	=> 'perfect'
	))?>

<? endif; ?>


<? if (Yii::app()->isModuleInstall('PaymentSystemInterkassaNew')) : ?>

	<?=$this->renderPartial('_ps', array(
		'pageTitle'		=> Yii::t('app', 'Заказ на ввод средств через платежную систему Interkassa'),
		'specAlias'		=> 'interkassa_in',
		'purposeAlias'	=> 'interkassa_new'
	))?>

<? endif; ?>

<? if (Yii::app()->isModuleInstall('PaymentSystemLiqpay')) : ?>

	<?=$this->renderPartial('_ps', array(
		'pageTitle'		=> Yii::t('app', 'Заказ на ввод средств через платежную систему LiqPay'),
		'specAlias'		=> 'liqpay_in',
		'purposeAlias'	=> 'liqpay'
	))?>

<? endif; ?>


<? if (Yii::app()->isModuleInstall('PaymentsystemMoneyonline')) : ?>

	<?=$this->renderPartial('_ps', array(
		'pageTitle'		=> Yii::t('app', 'Заказ на ввод средств через платежную систему Деньги Online'),
		'specAlias'		=> 'moneyonline_in',
		'purposeAlias'	=> 'moneyonline'
	))?>

<? endif; ?>


<? if (Yii::app()->isModuleInstall('PaymentsystemOkpay')) : ?>

	<?=$this->renderPartial('_ps', array(
		'pageTitle'		=> Yii::t('app', 'Заказ на ввод средств через платежную систему OKPAY'),
		'specAlias'		=> 'okpay_in',
		'purposeAlias'	=> 'okpay'
	))?>

<? endif; ?>


<? if (Yii::app()->isModuleInstall('Payboutique')) : ?>

	<?=$this->renderPartial('_ps', array(
		'pageTitle'		=> Yii::t('app', 'Заказ на ввод средств через платежную систему Payboutique'),
		'specAlias'		=> 'payboutique_main_in',
		'purposeAlias'	=> 'payboutique'
	))?>

	<?=$this->renderPartial('_ps', array(
		'pageTitle'		=> Yii::t('app', 'Заказ на ввод средств через платежную систему Payboutique (Credit Card)'),
		'specAlias'		=> 'payboutique_card_in',
		'purposeAlias'	=> 'payboutique'
	))?>

	<?=$this->renderPartial('_ps', array(
		'pageTitle'		=> Yii::t('app', 'Заказ на ввод средств через платежную систему Payboutique (Webmoney)'),
		'specAlias'		=> 'payboutique_webmoney_in',
		'purposeAlias'	=> 'payboutique'
	))?>

	<?=$this->renderPartial('_ps', array(
		'pageTitle'		=> Yii::t('app', 'Заказ на ввод средств через платежную систему Payboutique (YandexMoney)'),
		'specAlias'		=> 'payboutique_yandex_in',
		'purposeAlias'	=> 'payboutique'
	))?>

<? endif; ?>

<? if (Yii::app()->isModuleInstall('PaymentsystemPayeer')) : ?>

	<?=$this->renderPartial('_ps', array(
		'pageTitle'		=> Yii::t('app', 'Заказ на ввод средств через платежную систему PAYEER'),
		'specAlias'		=> 'payeer_in',
		'purposeAlias'	=> 'payeer'
	))?>

<? endif; ?>

<? if (Yii::app()->isModuleInstall('PaymentsystemPaypal')) : ?>

	<?=$this->renderPartial('_ps', array(
		'pageTitle'		=> Yii::t('app', 'Заказ на ввод средств через платежную систему PayPal'),
		'specAlias'		=> 'paypal_in',
		'purposeAlias'	=> 'paypal'
	))?>

<? endif; ?>


<? if (Yii::app()->isModuleInstall('PaymentsystemPrivat')) : ?>

	<?=$this->renderPartial('_ps', array(
		'pageTitle'		=> Yii::t('app', 'Заказ на ввод средств через платежную систему Карта Приват'),
		'specAlias'		=> 'privat_in',
		'purposeAlias'	=> 'privat'
	))?>

<? endif; ?>

<? if (Yii::app()->isModuleInstall('PaymentsystemQiwi')) : ?>

	<?=$this->renderPartial('_ps', array(
		'pageTitle'		=> Yii::t('app', 'Заказ на ввод средств через платежную систему QIWI'),
		'specAlias'		=> 'qiwi_in',
		'purposeAlias'	=> 'qiwi'
	))?>

<? endif; ?>


<? if (Yii::app()->isModuleInstall('PaymentSystemRobokassa')) : ?>

	<?=$this->renderPartial('_ps', array(
		'pageTitle'		=> Yii::t('app', 'Заказ на ввод средств через платежную систему Robokassa'),
		'specAlias'		=> 'robokassa_in',
		'purposeAlias'	=> 'robokassa'
	))?>

<? endif; ?>


<? if (Yii::app()->isModuleInstall('PaymentsystemWalletone')) : ?>

	<?=$this->renderPartial('_ps', array(
		'pageTitle'		=> Yii::t('app', 'Заказ на ввод средств через платежную систему Walletone'),
		'specAlias'		=> 'walletone_in',
		'purposeAlias'	=> 'walletone'
	))?>

<? endif; ?>


<? if (Yii::app()->isModuleInstall('PaymentsystemWebmoney')) : ?>

	<?=$this->renderPartial('_ps', array(
		'pageTitle'		=> Yii::t('app', 'Заказ на ввод средств через платежную систему Webmoney'),
		'specAlias'		=> 'webmoney_in',
		'purposeAlias'	=> 'webmoney'
	))?>

<? endif; ?>

<? if (Yii::app()->isModuleInstall('PaymentsystemZpayment')) : ?>

	<?=$this->renderPartial('_ps', array(
		'pageTitle'		=> Yii::t('app', 'Заказ на ввод средств через платежную систему Z-payment'),
		'specAlias'		=> 'zpayment_in',
		'purposeAlias'	=> 'zpayment'
	))?>
	
<? endif; ?>

<? if (Yii::app()->isModuleInstall('PaymentsystemGiftcertificates')) : ?>
    <div style="background: #eef; margin-top: 2px; border: 10px #c5dbec solid; padding: 5px;">
        <table style="width:100%" cellspacing="0" border="0">
            <tr>
                <td><?=Yii::t('app', 'Пополнение кошелька подарочным сертификатом')?></td>
            </tr>    
            <tr style="background: #eef; margin-top: 2px; border: 10px #c5dbec solid; padding: 5px;">    
                <td>
					<?php $this->widget('application.modules.paymentsystem.modules.giftcertificates.widgets.giftcertificateswidget', array(
							'spec_alias' => 'wallet_in_by_certificate_activate_' . $wallet->currency_alias,
							'template' => 'wallet',
							'params' => array(
								'modelsTransactionsObjects' => array(
									'redirect_confirm_after_paymentsystem' => '/office/giftcertificates/default/testps',
									'redirect_decline_after_paymentsystem' => '/office/giftcertificates/default/testps',
									'redirect_open_after_paymentsystem' => '/office/giftcertificates/default/testps',
									'users__id' => Yii::app()->user->id
								)
							)
						)); ?>
                </td>
            </tr>
        </table>
    </div>				
<? endif; ?>