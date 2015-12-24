<?php $this->layout = 'office'; ?>
<? if(FinanceWallets::WALLETS_USERS == $object_alias) : ?>
    <div class="portlet box green">
        <div class="portlet-title">
            <h3 class="caption">
                <i class="fa fa-money"></i>
                <?= Yii::t('app', 'Перевод денег другому пользователю') ?></a>
            </h3>
        </div>
        <div class="portlet-body form-horizontal form form-bordered">


            <?php $form=$this->beginWidget('CActiveForm', array('action' => $this->createUrl('manage/moneyouttransfer/wallet/' . $wallet->id . '/user/' . $user . '/page/' . $page))); ?>
            
                <div class="form-body">
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?=Yii::t('app', 'Логин получателя')?></label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </span>
                                <input type="text" name="Form[login_to_user]" value="" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?=Yii::t('app', 'Сумма которую хотите перевести')?></label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-check"></i>
                                </span>
                                <input type="text" name="Form[transfer_amount]" value="" class="form-control tt-hint" />
                            </div>
                        </div>
                    </div>
                    <?if(isset($error) && !empty($error)):?> 
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?= Yii::t('app', 'Не удалось выполнить перевод'); ?></label>
                        <div class="col-sm-4"><div class="help-block font-red"><?= $error ?></div></div>
                    </div>
                    <?  endif;?>    
                </div>
                <div class="buttons form-actions" style="margin-top: 10px;">
                    <?php echo CHtml::submitButton(Yii::t('app', 'Перевести'), array('name'=>'btn_start_transaction_user_to_user', 'class' => 'btn green')); ?>
                </div>            
            <?php $this->endWidget(); ?>
        </div>
    </div>
<? endif; ?>


<? if(FinanceWallets::WALLETS_WAREHOUSES == $object_alias && $nameWarehouse != NULL) : ?>

    <div class="portlet box green">
        <div class="portlet-title">
            <h3 class="caption">
                <i class="fa fa-money"></i>
                <?= Yii::t('app', 'Перевод денег на другой склад') ?></a>
            </h3>
        </div>
        <div class="portlet-body form-horizontal form form-bordered">
            <?php $form=$this->beginWidget('CActiveForm', array('action'=>$this->createUrl('outmoney/outtowarehouse/wallet/' . $wallet->id))); ?>
                <div class="form-body">
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?=Yii::t('app', 'Название склад')?></label>
                        <div class="col-sm-4">
                            <?=CHtml::listBox('Form[warehouse]',array(), $nameWarehouse, array('size' => (int)TRUE))?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?=Yii::t('app', 'Сумма которую хотите перевести')?></label>
                        <div class="col-sm-4">
                            <input type="text" name="Form[transfer_amount]" value="" />
                        </div>
                    </div>
                    <?if(isset($error) && !empty($error)):?> 
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?= Yii::t('app', 'Не удалось выполнить перевод'); ?></label>
                        <div class="col-sm-4"><div class="help-block font-red"><?= $error ?></div></div>
                    </div>
                    <?  endif;?>             
                </div>
                <div class="buttons form-actions" style="margin-top: 10px;">
                    <?php echo CHtml::submitButton(Yii::t('app', 'Перевести'), array('name'=>'btn_start_transaction_user_to_user', 'class' => 'btn150')); ?>
                </div>            
            <?php $this->endWidget(); ?>
        </div>
    </div>
<? endif; ?>


   
<? if ((bool)$accessToWalletOut) : ?>

                <? 
                    $finance = $this->widget('application.modules.finance.widgets.FinanceWidget', array(
                        'scenario' => 'debit',
                        'pageTitle' => 'Вывод денег',
                        'is_show_objects'=>TRUE,
                        'template' => Yii::app()->theme->basePath. DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'office' . DIRECTORY_SEPARATOR . 'wallets' . DIRECTORY_SEPARATOR . 'widget_forms' . DIRECTORY_SEPARATOR . 'form_out.php',
                            ));

	                $finance->modelFinance->initCurrencyByAlias($wallet->currency_alias);
	                if ($object_alias == 'users') 
	                {
	                    $finance->modelFinance->setSpecificationByAlias($this->getAliasForAdminOperation('wallet_out', $wallet->id));
	                }
	                else
	                {
	                   $finance->modelFinance->setSpecificationByAlias($this->getAliasForAdminOperation('wallet_out_'.$object_alias, $wallet->id));
	                }  
                    $finance->modelFinance->initProperties();
                    $finance->modelFinance->initDebitWalletByObjectAndIdAndPurpose('company', 1, 'money_out');
                    $finance->modelFinance->initCreditWalletByObjectAndIdAndPurpose($object_alias, $object_id, $wallet->purpose_alias);


                    $finance->modelFinance->modelsTransactionsObjects['comments_money_out']->value = "";
                    $finance->modelFinance->objectsAttributes = array('comments_money_out' => 
                                                                           array(  'alias' => 'comments_money_out',
                                                                                   'value' => ""),);


                    $finance->modelFinance->modelsTransactionsObjects['redirect_confirm_after_paymentsystem']->value = Yii::app()->urlManager->createUrl('/office/wallets/outmoney/result');
                    $finance->modelFinance->objectsAttributes = array('redirect_confirm_after_paymentsystem' => 
                                                                           array(  'alias' => 'redirect_confirm_after_paymentsystem',
                                                                                   'value' => Yii::app()->urlManager->createUrl('/office/wallets/outmoney/result')),);

                    $finance->modelFinance->modelsTransactionsObjects['redirect_decline_after_paymentsystem']->value = Yii::app()->urlManager->createUrl('/office/wallets/outmoney/result');
                    $finance->modelFinance->objectsAttributes = array('redirect_decline_after_paymentsystem' => 
                                                                           array(  'alias' => 'redirect_decline_after_paymentsystem',
                                                                                   'value' => Yii::app()->urlManager->createUrl('/office/wallets/outmoney/result')),);

                    $finance->modelFinance->modelsTransactionsObjects['redirect_open_after_paymentsystem']->value = Yii::app()->urlManager->createUrl('/office/wallets/outmoney/result');
                    $finance->modelFinance->objectsAttributes = array('redirect_open_after_paymentsystem' => 
                                                                           array(  'alias' => 'redirect_open_after_paymentsystem',
                                                                                   'value' => Yii::app()->urlManager->createUrl('/office/wallets/outmoney/result')),);
                    $finance->form(); 
                    ?>
<? endif; ?>


<?=CHtml::link(Yii::t('app', 'Назад в управление кошельками'), $this->createUrl('manage/wallets/id/' . sha1($user) . '/page/' . $page))?>
