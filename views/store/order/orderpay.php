<?php
/**
 * @var Horders $horder
 */
$finance = $this->widget('application.modules.finance.widgets.FinanceWidget', array(
	'scenario' => 'debit',
	'is_password_require' => TRUE,
	'is_show_objects' => TRUE,
    'template' => Yii::app()->theme->basePath. DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'office' . DIRECTORY_SEPARATOR . 'wallets' . DIRECTORY_SEPARATOR . 'widget_forms' . DIRECTORY_SEPARATOR . 'form_store.php',
	'objects_safe' => array('horders__id'),
	'is_amount_change' => FALSE
));

$finance->modelFinance->initMainCurrency();

$finance->modelFinance->setSpecificationByAlias($specAlias);

$finance->modelFinance->initProperties();
$finance->modelFinance->modelSpecification->title = $this->pageTitle;
$finance->modelFinance->amount = $horder->total_price;
$finance->modelFinance->modelsTransactionsObjects['horders__id']->value = $horder->getPrimaryKey();
$finance->modelFinance->modelsTransactionsObjects['redirect_confirm_after_paymentsystem']->value = $this->createUrl('/store/order/complete', ['id' => sha1($horder->getPrimaryKey())]);
$finance->modelFinance->modelsTransactionsObjects['redirect_decline_after_paymentsystem']->value = $this->createUrl('/store/order/payfail', ['id' => sha1($horder->getPrimaryKey())]);
$finance->modelFinance->modelsTransactionsObjects['redirect_open_after_paymentsystem']->value = $this->createUrl('/store/order/payprocess', ['id' => sha1($horder->getPrimaryKey())]);
$finance->modelFinance->initDebitMainWalletByObjectAndId('users', $horder->user->getPrimaryKey());
$finance->modelFinance->initCreditWalletByObjectAndIdAndPurpose('company', 1, $companyPurposeAlias);
$finance->form();