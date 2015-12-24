	<?php

		$finance = $this->widget('application.modules.finance.widgets.FinanceWidget', array(
			'scenario' => 'debit',
			'pageTitle' => $pageTitle,
			'template' => Yii::app()->theme->basePath. DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'office' . DIRECTORY_SEPARATOR . 'wallets' . DIRECTORY_SEPARATOR . 'widget_forms' . DIRECTORY_SEPARATOR . 'form_in.php',
			'is_show_objects' => true,		
		));

		$finance->modelFinance->initMainCurrency();
		$finance->modelFinance->setSpecificationByAlias($specAlias);
		$finance->modelFinance->initProperties();
		$finance->modelFinance->initDebitMainWalletByObjectAndId('users', Yii::app()->user->id);
		$finance->modelFinance->initCreditWalletByObjectAndIdAndPurpose('company', 1, $purposeAlias);

		$finance->modelFinance->modelsTransactionsObjects['redirect_confirm_after_paymentsystem']->value = Yii::app()->urlManager->createUrl('/office/wallets/inmoney/resultnew');
		$finance->modelFinance->objectsAttributes = array('redirect_confirm_after_paymentsystem' => 
															   array(  'alias' => 'redirect_confirm_after_paymentsystem',
																	   'value' => Yii::app()->urlManager->createUrl('/office/wallets/inmoney/resultnew')),);

		$finance->modelFinance->modelsTransactionsObjects['redirect_decline_after_paymentsystem']->value = Yii::app()->urlManager->createUrl('/office/wallets/inmoney/resultnew');
		$finance->modelFinance->objectsAttributes = array('redirect_decline_after_paymentsystem' => 
															   array(  'alias' => 'redirect_decline_after_paymentsystem',
																	   'value' => Yii::app()->urlManager->createUrl('/office/wallets/inmoney/resultnew')),);

		$finance->modelFinance->modelsTransactionsObjects['redirect_open_after_paymentsystem']->value = Yii::app()->urlManager->createUrl('/office/wallets/inmoney/resultnew');
		$finance->modelFinance->objectsAttributes = array('redirect_open_after_paymentsystem' => 
															   array(  'alias' => 'redirect_open_after_paymentsystem',
																	   'value' => Yii::app()->urlManager->createUrl('/office/wallets/inmoney/resultnew')),);

		
		$finance->form();
	
	?>	