<?
	$operationType = "right";
    if(empty($modelTransaction->creditWallet) || empty($modelTransaction->debitWallet)) {
        $operationType = 'right';
    } else {
        if ($modelTransaction->debitWallet->type_alias == FinanceWallets::type_active && $modelTransaction->creditWallet->type_alias == FinanceWallets::type_active){
            $operationType = 'right';
        } elseif ($modelTransaction->debitWallet->type_alias == FinanceWallets::type_passive && $modelTransaction->creditWallet->type_alias == FinanceWallets::type_passive) {
            $operationType = 'left';
        } elseif ($modelTransaction->debitWallet->type_alias == FinanceWallets::type_active && $modelTransaction->creditWallet->type_alias == FinanceWallets::type_passive) {
            $operationType = 'in';
        } elseif ($modelTransaction->debitWallet->type_alias == FinanceWallets::type_passive && $modelTransaction->creditWallet->type_alias == FinanceWallets::type_active) {
            $operationType = 'out';
        }
    }
?>
<div class="operation-list">
	<div class="more-info">
		<table style="width: 100%;">
			<tr>
				<td style="width: 50%;">
					<div class="operation <?=$operationType;?>">
						<table style="width: 100%;">
							<tr>
								<td style="text-align: center;" class="operation-column">
									<h4 class="user">
										<? if ($modelTransaction->debit_object_alias == 'users') : ?>
											<? if (is_array($modelTransaction->debitObjectInfo) && array_key_exists('username', $modelTransaction->debitObjectInfo)) : ?>
												<?=MSmarty::truncate(CHtml::encode($modelTransaction->debitObjectInfo['username']), 15)?>
											<? endif; ?>
										<? elseif ($modelTransaction->debit_object_alias == 'warehouses') : ?>
											<? if (!empty($modelTransaction->debitObjectInfo->lang->name)) : ?>
												<?=MSmarty::truncate(CHtml::encode($modelTransaction->debitObjectInfo->lang->name), 15)?>
											<? endif; ?>
										<? else : ?>
											<?=Yii::t('app', 'Компания')?>
										<? endif; ?>
									</h4>
									<div class="wallet">
										<? if ($modelTransaction->debit_wallet_type_alias == FinanceWallets::type_active): ?>
											<i class="fa fa-check text-success"></i>
										<? endif; ?>
										<? if ($modelTransaction->debit_wallet_type_alias == FinanceWallets::type_passive): ?>
											<i class="fa fa-times text-danger"></i>
										<? endif; ?>
										<? if(empty($modelTransaction->creditWallet) || empty($modelTransaction->debitWallet)): ?>
											<span class="label label-danger"><?=Yii::t('app', 'удален')?></span>
										<? else: ?>
											<span class="label label-success"><?=$modelTransaction->debitWallet->purposeInfo->title?></span>
										<? endif;?>
									</div>
									<h4>
										<? if ($modelTransaction->debit_wallet_type_alias == FinanceWallets::type_active) : ?>
											<span class="text-success">+<?=sprintf('%.2f', $modelTransaction->amount)?> <?=$modelTransaction->currency->abbreviation?></span>
										<? elseif ($modelTransaction->debit_wallet_type_alias == FinanceWallets::type_passive) : ?>
											<span class="text-danger">-<?=sprintf('%.2f', $modelTransaction->amount)?> <?=$modelTransaction->currency->abbreviation?></span>
										<? endif; ?>
									</h4>
								</td>
								<td class="operation-type">
									<? if($operationType == "right") :?>
										<i class="fa fa-angle-left"></i>
									<? elseif ($operationType == "left") : ?>
										<i class="fa fa-angle-right"></i>
									<? elseif ($operationType == "in") : ?>
										<i class="fa fa-angle-right"></i>
										<i class="fa fa-angle-left"></i>
									<? elseif ($operationType == "out") : ?>
										<i class="fa fa-angle-left"></i>
										<i class="fa fa-angle-right"></i>
									<? endif; ?>
								</td>
								<td style="text-align: center;" class="operation-column">
									<h4 class="user">
										<? if ($modelTransaction->credit_object_alias == 'users') : ?>
											<? if (is_array($modelTransaction->creditObjectInfo) && array_key_exists('username', $modelTransaction->creditObjectInfo)) : ?>
												<?=MSmarty::truncate(CHtml::encode($modelTransaction->creditObjectInfo['username']), 15)?>
											<? endif; ?>
										<? elseif ($modelTransaction->credit_object_alias == 'warehouses') : ?>
											<? if (!empty($modelTransaction->creditObjectInfo->lang->name)) : ?>
												<?=MSmarty::truncate(CHtml::encode($modelTransaction->creditObjectInfo->lang->name), 15)?>
											<? endif; ?>
										<? else : ?>
											<?=Yii::t('app', 'Компания')?>
										<? endif; ?>
									</h4>
									<div class="wallet">
										<? if ($modelTransaction->credit_wallet_type_alias == FinanceWallets::type_active): ?>
											<i class="fa fa-check text-success"></i>
										<? endif; ?>
										<? if ($modelTransaction->credit_wallet_type_alias == FinanceWallets::type_passive): ?>
											<i class="fa fa-times text-danger"></i>
										<? endif; ?>
										<? if(empty($modelTransaction->creditWallet) || empty($modelTransaction->creditWallet)): ?>
											<span class="label label-danger"><?=Yii::t('app', 'удален')?></span>
										<? else: ?>
											<span class="label label-success"><?=$modelTransaction->creditWallet->purposeInfo->title?></span>
										<? endif;?>
									</div>
									<h4>
										<? if ($modelTransaction->credit_wallet_type_alias == FinanceWallets::type_active) : ?>
											<span class="text-success">+<?=sprintf('%.2f', $modelTransaction->amount)?> <?=$modelTransaction->currency->abbreviation?></span>
										<? elseif ($modelTransaction->credit_wallet_type_alias == FinanceWallets::type_passive) : ?>
											<span class="text-danger">-<?=sprintf('%.2f', $modelTransaction->amount)?> <?=$modelTransaction->currency->abbreviation?></span>
										<? endif; ?>
									</h4>
								</td>
							</tr>
						</table>
					</div>
				</td>
				<td style="width: 50%;">
					<div class="portlet">
						<div class="portlet-body">
							<ul class="list-inline" style="margin-bottom: 20px;">
								<li style="width: 33%;">
									<? if ($modelTransaction->status_alias == FinanceTransactions::status_open) : ?>
									<span class="text-primary">
										<i class="fa fa-clock-o"></i> <?=Yii::t('app', 'Операция открыта')?>
									</span>
									<? endif; ?>
									<? if ($modelTransaction->status_alias == FinanceTransactions::status_closed) : ?>
									<span class="text-success">
										<i class="fa fa-check"></i> <?=Yii::t('app', 'Операция проведена')?>
									</span>
									<? endif; ?>
									<? if ($modelTransaction->status_alias == FinanceTransactions::status_decline) : ?>
									<span class="text-danger">
										<i class="fa fa-times"></i> <?=Yii::t('app', 'Операция отклонена')?>
									</span>
									<? endif; ?>
								</li>
								<li style="width: 33%;">
									<?=Yii::t('app', 'Создан')?>: <?=MSmarty::date_format($modelTransaction->date_open, '%d.%m.%Y %H:%M:%S');?>
								</li>
								<li style="width: 33%;">
									<? if ($modelTransaction->status_alias == FinanceTransactions::status_closed) : ?><?=Yii::t('app', 'Проведен')?>: <?=MSmarty::date_format($modelTransaction->date_closed, '%d.%m.%Y %H:%M:%S');?><? endif; ?>
									<? if ($modelTransaction->status_alias == FinanceTransactions::status_decline) : ?><?=Yii::t('app', 'Отклонен')?>: <?=MSmarty::date_format($modelTransaction->date_decline, '%d.%m.%Y %H:%M:%S');?><? endif; ?>
								</li>
							</ul>
							<div class="well">
								<?=$modelTransaction->description?>
							</div>
						</div>
					</div>
				</td>
			</tr>
		</table>
	</div>
</div><!--.table-operationlist-second-->