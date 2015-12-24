<?php $this->layout = 'office'; ?>

<? if ((bool)$accessToWalletInBank) : ?>
        <? 
        $finance = $this->widget('application.modules.finance.widgets.FinanceWidget', array(
            'scenario' => 'debit',
            'pageTitle' => Yii::t('app', 'Заказ на ввод стредств'),
            'is_show_objects'=>TRUE,
			'template' => Yii::app()->theme->basePath. DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'office' . DIRECTORY_SEPARATOR . 'wallets' . DIRECTORY_SEPARATOR . 'widget_forms' . DIRECTORY_SEPARATOR . 'form_in.php',
            ));

        $finance->modelFinance->initCurrencyByAlias($wallet->currency_alias);

        if ($wallet->purpose_alias == 'main') 
        {
            $finance->modelFinance->setSpecificationByAlias($this->getAliasForAdminOperation('wallet_in_bank', $wallet->id));
        }
        else
        {
            $finance->modelFinance->setSpecificationByAlias($this->getAliasForAdminOperation('wallet_in_bank_'.$object_alias, $wallet->id));
        }       

        $finance->modelFinance->initProperties();
        $finance->modelFinance->initDebitWalletByObjectAndIdAndPurpose($object_alias, $object_id, $wallet->purpose_alias);
        $finance->modelFinance->initCreditWalletByObjectAndIdAndPurpose('company', 1, 'money_in');


        $finance->modelFinance->modelsTransactionsObjects['redirect_confirm_after_paymentsystem']->value = Yii::app()->urlManager->createUrl('/office/wallets/manage/result/wallet/' . $wallet->id . '/user/' . $user . '/page/' . $page);
        $finance->modelFinance->objectsAttributes = array('redirect_confirm_after_paymentsystem' => 
         array(  'alias' => 'redirect_confirm_after_paymentsystem',
             'value' => Yii::app()->urlManager->createUrl('/office/wallets/manage/result/wallet/' . $wallet->id . '/user/' . $user . '/page/' . $page)),);

        $finance->modelFinance->modelsTransactionsObjects['redirect_decline_after_paymentsystem']->value = Yii::app()->urlManager->createUrl('/office/wallets/manage/result/wallet/' . $wallet->id . '/user/' . $user . '/page/' . $page);
        $finance->modelFinance->objectsAttributes = array('redirect_decline_after_paymentsystem' => 
         array(  'alias' => 'redirect_decline_after_paymentsystem',
             'value' => Yii::app()->urlManager->createUrl('/office/wallets/manage/result/wallet/' . $wallet->id . '/user/' . $user . '/page/' . $page)),);

        $finance->modelFinance->modelsTransactionsObjects['redirect_open_after_paymentsystem']->value = Yii::app()->urlManager->createUrl('/office/wallets/manage/result/wallet/' . $wallet->id . '/user/' . $user . '/page/' . $page);
        $finance->modelFinance->objectsAttributes = array('redirect_open_after_paymentsystem' => 
         array(  'alias' => 'redirect_open_after_paymentsystem',
             'value' => Yii::app()->urlManager->createUrl('/office/wallets/manage/result/wallet/' . $wallet->id . '/user/' . $user . '/page/' . $page)),);
        $finance->form(); 
        ?>
<? else : ?>
<div class="note note-success">
	<?=Yii::t('app', 'У Вас нет прав для совершения данной операции')?>
</div>

<? endif; ?>

<?=CHtml::link(Yii::t('app', 'Назад в управление кошельками'), $this->createUrl('manage/wallets/id/' . sha1($user) . '/page/' . $page))?>