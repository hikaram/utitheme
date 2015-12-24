<td><?=$modelTransaction->id?></td>
<td>

<? if ($modelTransaction->debit_wallet_type_alias == FinanceWallets::type_active) : ?>
    <span class="amount-increase">+</span>&nbsp;
<? elseif ($modelTransaction->debit_wallet_type_alias == FinanceWallets::type_passive) : ?>
    <span class="amount-reduce">-</span>&nbsp;
<? endif; ?>
<? if ($modelTransaction->debit_object_alias == 'users') : ?>
    <? if (is_array($modelTransaction->debitObjectInfo) && array_key_exists('username', $modelTransaction->debitObjectInfo)) : ?>
        <span class="user-login">
            <?=MSmarty::truncate(CHtml::encode($modelTransaction->debitObjectInfo['username']), 15)?>
            <span class="user-login-full"><?=CHtml::encode($modelTransaction->debitObjectInfo['username'])?></span>
        </span>
    <? else:?>
        <span class="user-login">
            <? vg($modelTransaction->debitObjectInfo)?>
            <span style = "color:red;font-size: 13px;"><?= Yii::t('app','Пользователь удален')?></span>
        </span>
    <? endif; ?>
    <? elseif ($modelTransaction->debit_object_alias == 'warehouses') : ?>
        <? if (!empty($modelTransaction->debitObjectInfo->lang->name)) : ?>
            <span class="user-login">
                <?=MSmarty::truncate(CHtml::encode($modelTransaction->debitObjectInfo->lang->name), 15)?>
                <span class="user-login-full"><?=CHtml::encode($modelTransaction->debitObjectInfo->lang->name)?></span>
            </span>
        <? else:?>
            <span class="user-login">
                <span style = "color:red;font-size: 13px;"><?= Yii::t('app','Склад удален')?></span>
            </span>
        <? endif; ?>        
    <? else : ?>
    <?=Yii::t('app', 'Компания')?>
<? endif; ?>
</td>
<td>
    <? if ($modelTransaction->credit_wallet_type_alias == FinanceWallets::type_active) : ?>
        <span class="amount-reduce">-</span>&nbsp;
    <? elseif ($modelTransaction->credit_wallet_type_alias == FinanceWallets::type_passive) : ?>
        <span class="amount-increase">+</span>&nbsp;
    <? endif; ?>
    <? if ($modelTransaction->credit_object_alias == 'users') : ?>
        <? if (is_array($modelTransaction->creditObjectInfo) && array_key_exists('username', $modelTransaction->creditObjectInfo)) : ?>
            <span class="user-login">
                <?=MSmarty::truncate(CHtml::encode($modelTransaction->creditObjectInfo['username']), 15)?>
                <span class="user-login-full"><?=CHtml::encode($modelTransaction->creditObjectInfo['username'])?></span>
            </span>
        <? else:?>
            <span class="user-login">
                <span style = "color:red;font-size: 13px;"><?= Yii::t('app','Пользователь удален')?></span>
            </span>
        <? endif; ?>
    <? elseif ($modelTransaction->credit_object_alias == 'warehouses') : ?>
        <? if (!empty($modelTransaction->creditObjectInfo->lang->name)) : ?>
            <span class="user-login">
                <?=MSmarty::truncate(CHtml::encode($modelTransaction->creditObjectInfo->lang->name), 15)?>
                <span class="user-login-full"><?=CHtml::encode($modelTransaction->creditObjectInfo->lang->name)?></span>
            </span>
        <? else:?>
            <span class="user-login">
                <span style = "color:red;font-size: 13px;"><?= Yii::t('app','Склад удален')?></span>
            </span>
        <? endif; ?>        
    <? else : ?>
        <?=Yii::t('app', 'Компания')?>
    <? endif; ?>
</td>
<td><?=CHtml::encode($modelTransaction->spec->title)?></td>
<td><?=sprintf('%.2f', CHtml::encode($modelTransaction->amount))?> <?=$modelTransaction->currency->abbreviation?></td>
<td><?=CHtml::encode($modelTransaction->status->title)?></td>
<td>
    <? if ($modelTransaction->spec->paysystem != NULL) : ?>
        <?=CHtml::encode($modelTransaction->spec->paysystem->brif_text)?>
    <? endif; ?>
</td>
<td><?=MSmarty::date_format($modelTransaction->date_open, 'd.m.Y')?> <?=MSmarty::date_format($modelTransaction->date_open, 'H:i:s')?></td>
<td class="more-td">

    <? if (($modelTransaction->status_alias == FinanceTransactions::status_open) || ($modelTransaction->status_alias == FinanceTransactions::status_pending)) : ?>

        <? if (($modelTransaction->status_alias == FinanceTransactions::status_open) && (Yii::app()->user->checkAccess('AdminFinanceTransactionsPending'))) : ?>
            <?=CHtml::linkButton('<i class="fa fa-refresh"></i>', array(
                'submit'=>array(
                    'pending',
                    'id' => $modelTransaction->id,
                ),
                'params'=>array(
                    Yii::app()->request->csrfTokenName => Yii::app()->request->csrfToken
                ),
                'confirm' => Yii::t('app', 'Обновить статус финансовой операции ?'),
				'class' => 'btn btn-xs btn-icon blue-madison tooltips',
				'data-placement' => 'top',
				'data-original-title' => Yii::t('app', 'В процессе'),
            ))?>        
        <? endif; ?>    
    
        <? if (Yii::app()->user->checkAccess('AdminFinanceTransactionsConfirm')) : ?>
            <?=CHtml::linkButton('<i class="fa fa-check"></i>', array(
                'submit'=>array(
                    'confirm',
                    'id' => $modelTransaction->id,
                ),
                'params'=>array(
                    Yii::app()->request->csrfTokenName => Yii::app()->request->csrfToken
                ),
                'confirm' => Yii::t('app', 'Подтвердить операцию? Отмена будет невозможна') . '.',
				'class' => 'btn btn-xs btn-icon green tooltips',
				'data-placement' => 'top',
				'data-original-title' => Yii::t('app', 'Подтвердить'),
            ))?>
        <? endif; ?>
        
        <? if (Yii::app()->user->checkAccess('AdminFinanceTransactionsDecline')) : ?>
            <?=CHtml::linkButton('<i class="fa fa-times"></i>', array(
                'submit'=>array(
                    'decline',
                    'id' => $modelTransaction->id,
                ),
                'params'=>array(
                    Yii::app()->request->csrfTokenName => Yii::app()->request->csrfToken
                ),
                'confirm' => Yii::t('app', 'Отклонить операцию? Отмена будет невозможна') . '.',
				'class' => 'btn btn-xs btn-icon red tooltips',
				'data-placement' => 'top',
				'data-original-title' => Yii::t('app', 'Отклонить'),				
            ))?>  
        <? endif; ?>        

    <? elseif($modelTransaction->status_alias == FinanceTransactions::status_closed) : ?>
        <?=Yii::t('app', 'Проведена')?>.
    <? elseif ($modelTransaction->status_alias == FinanceTransactions::status_decline) : ?>
        <?=Yii::t('app', 'Отклонена')?>.
    <? endif; ?>
</td>
<td align="center" style="width: 100px;">
	<span class="btn blue-steel more more-hide"><i class="fa fa-info"></i></span>
</td>