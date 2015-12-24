<? $this->layout = 'office'; ?>

<div id="accordion">
    <?=$this->renderPartial('_filter', array('list_alias_transaction'=>$list_alias_transaction, 
		'list_currency'=>$list_currency, 
		'list_groups'=>$list_groups,
		'filtermodel'=>$filtermodel,
		'min_sum' => $min_sum,
		'max_sum' => $max_sum
	)); ?>
</div>
<div class="row profile">
	<div class="col-md-9">
		<? if (count($modelsTransactions) == 0) : ?>
			<div class="note note-success">
				<?=Yii::t('app', 'Финансовые операции еще не созданы.')?>
			</div>
		<? else : ?>
		<table class="table table-striped table-bordered table-advance table-hover">
			<thead>
				<tr>
					<th><?=$modelsTransactions[0]->getAttributeLabel('id')?></th>
					<th><?=Yii::t('app', 'Дебет')?></th>
					<th><?=Yii::t('app', 'Кредит')?></th>
					<th><?=Yii::t('app', 'Описание')?></th>
					<th><?=$modelsTransactions[0]->getAttributeLabel('amount')?></th>
					<th><?=Yii::t('app', 'Вал.')?></th>
					<th><?=$modelsTransactions[0]->getAttributeLabel('status_alias')?></th>
					<th><?=$modelsTransactions[0]->getAttributeLabel('date_open')?></th>
					<th><?=$modelsTransactions[0]->getAttributeLabel('date_closed')?></th>
				</tr>
			</thead>
			<tbody>
				<? foreach ($modelsTransactions as $key => $modelTransaction) : ?>
					<tr>
						<td><?=$modelTransaction->id?></td>
						<td>
							<? if ($modelTransaction->debit_object_alias == 'users') : ?>
								<? if (is_array($modelTransaction->debitObjectInfo) && array_key_exists('username', $modelTransaction->debitObjectInfo)) : ?>
									<?=CHtml::encode($modelTransaction->debitObjectInfo['username'])?>
								<? endif; ?>
							<? elseif ($modelTransaction->debit_object_alias == 'company') : ?>
								<? if (is_array($modelTransaction->debitObjectInfo) && array_key_exists('title', $modelTransaction->debitObjectInfo)) : ?>
									<?=CHtml::encode($modelTransaction->debitObjectInfo['title'])?>
								<? endif; ?>
							<? endif; ?>
							<? if ($modelTransaction->debit_wallet_type_alias == FinanceWallets::type_active) : ?>
								<i class="fa fa-plus-square font-grey-cascade ml5"></i>
							<? elseif ($modelTransaction->debit_wallet_type_alias == FinanceWallets::type_passive) : ?>
								<i class="fa fa-minus-square font-grey-cascade ml5"></i>
							<? endif; ?>
						</td>
						<td>
							<? if ($modelTransaction->credit_object_alias == 'users') : ?>
								<? if (is_array($modelTransaction->creditObjectInfo) && array_key_exists('username', $modelTransaction->creditObjectInfo)) : ?>
								<?=CHtml::encode($modelTransaction->creditObjectInfo['username'])?>
								<? endif; ?>
							<? elseif ($modelTransaction->credit_object_alias == 'company') : ?>
								<? if (is_array($modelTransaction->creditObjectInfo) && array_key_exists('title', $modelTransaction->creditObjectInfo)) : ?>
									<?=CHtml::encode($modelTransaction->creditObjectInfo['title'])?>
								<? endif; ?>
							<? endif; ?>
							<? if ($modelTransaction->credit_wallet_type_alias == FinanceWallets::type_active) : ?>
								<i class="fa fa-minus-square font-grey-cascade ml5"></i>
							<? elseif ($modelTransaction->credit_wallet_type_alias == FinanceWallets::type_passive) : ?>
								<i class="fa fa-plus-square font-grey-cascade ml5"></i>
							<? endif; ?>
						</td>
						<td><?=CHtml::encode($modelTransaction->spec->title)?></td>
						<td><?=sprintf('%.2f', CHtml::encode($modelTransaction->amount))?></td>
						<td><?=$modelTransaction->currency->abbreviation?></td>
						<td class="wallets-transaction-statuses text-center">							
							<? if(CHtml::encode($modelTransaction->status->title) == "Открытая") : ?>
								<span class="fa fa-play fa-fw font-grey-cascade tooltips" data-toggle="tooltip" data-placement="top" data-original-title="<?=CHtml::encode($modelTransaction->status->title) ?>"></span>
							<? elseif(CHtml::encode($modelTransaction->status->title) == "В процессе") : ?>
								<span class="fa fa-refresh fa-fw font-grey-cascade tooltips" data-toggle="tooltip" data-placement="top" data-original-title="<?=CHtml::encode($modelTransaction->status->title) ?>"></span>
							<? elseif(CHtml::encode($modelTransaction->status->title) == "Закрытая") : ?>
								<span class="fa fa-check fa-fw font-grey-cascade tooltips" data-toggle="tooltip" data-placement="top" data-original-title="<?=CHtml::encode($modelTransaction->status->title) ?>"></span>
							<? elseif(CHtml::encode($modelTransaction->status->title) == "Отклоненная") : ?>
								<span class="fa fa-times fa-fw font-grey-cascade tooltips" data-toggle="tooltip" data-placement="top" data-original-title="<?=CHtml::encode($modelTransaction->status->title) ?>"></span>
							<? else : ?>
								<?=CHtml::encode($modelTransaction->status->title);?>
							<? endif; ?>
							
							<?#=CHtml::encode($modelTransaction->status->title);?>
						</td>
						<td><?=CHtml::encode($modelTransaction->date_open)?></td>
						<td><?=CHtml::encode($modelTransaction->date_closed)?></td>
					</tr>
				<? endforeach; ?>
			</tbody>
		</table>
		<? $this->widget('CLinkPager', array(
			'pages' => $pages, 
			'nextPageLabel' => '<i class="fa fa-angle-double-right"></i>', 
			'prevPageLabel' => '<i class="fa fa-angle-double-left"></i>', 
			'header' => '', 
			'htmlOptions' => array(
				'class' => 'pagination'
			)
		)) ?>
		<? endif; ?>
	</div>
	<div class="col-md-3">
		<div class="portlet sale-summary" >
			<div class="portlet-title">
				<div class="caption">
					<?=Yii::t('app', 'Статистика');?>
				</div>
			</div>
			<div class="portlet-body">
				<ul class="list-unstyled">
					<li>
						<span class="sale-info text-regular"><?=Yii::t('app', 'Всего операций')?></span>
						<span class="sale-num"><?=$statistic['count']?></span>
					</li>
					<li>
						<span class="sale-info"><small><?=Yii::t('app', 'на сумму')?></small></span>
						<span class="sale-num"><small><?=sprintf('%.2f', $statistic['summ_amount'])?></small></span>
					</li>
					<li>
						<span class="sale-info text-regular"><?=Yii::t('app', 'Открытых операций')?></span>
						<span class="sale-num"><?=$statistic['open_caunt']?></span>
					</li>
					<li>
						<span class="sale-info"><small><?=Yii::t('app', 'на сумму')?></small></span>
						<span class="sale-num"><small><?=sprintf('%.2f', $statistic['open_amount'])?></small></span>
					</li>
					<li>
						<span class="sale-info text-regular"><?=Yii::t('app', 'Закрытых операций')?></span>
						<span class="sale-num"><?=$statistic['closed_caunt']?></span>
					</li>
					<li>
						<span class="sale-info"><small><?=Yii::t('app', 'на сумму')?></small></span>
						<span class="sale-num"><small><?=sprintf('%.2f', $statistic['closed_amount'])?></small></span>
					</li>
					<li>
						<span class="sale-info text-regular"><?=Yii::t('app', 'Отклоненных операций')?></span>
						<span class="sale-num"><?=$statistic['decline_caunt']?></span>
					</li>
					<li>
						<span class="sale-info"><small><?=Yii::t('app', 'на сумму')?></small></span>
						<span class="sale-num"><small><?=sprintf('%.2f', $statistic['decline_amount'])?></small></span>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>