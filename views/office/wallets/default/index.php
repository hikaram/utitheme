<?php $this->layout = 'office'; ?>

<div class="row profile-account">
	<div class="col-md-4">
		<ul class="ver-inline-menu tabbable margin-bottom-10">
			<? $counter = 0; ?>
			<?foreach ($wallets as $item => $model_list):?>
				<li <?if($counter == 0) { ?>class="active"<? }?>>
					<a data-toggle="tab" href="#<?=$model_list->currency_alias?>_<?=$model_list->id?>">
						<i class="fa fa-credit-card"></i>
						<?=Yii::t('app', $model_list->purpose->title)?>
						<? $title = FinanceWalletsViewAdditional::getTitle($model_list->id) ?>
						<? if($title !== false):?>
							<?= ' '. $title ?> 
						<? endif;?>
						-
						<span class="text-uppercase"><?=$model_list->currency_alias?></span>
						<?if($counter == 0) { ?>
							<span class="after"></span>
						<? }?>
					</a>
				</li>
				<? $counter++; ?>
			<? endforeach;?>
			<? if (Yii::app()->user->checkAccess('OfficeWalletsDefaultSettings')) : ?>
				<li>
					<?=CHtml::link('<i class="fa fa-cog"></i>' . Yii::t('app', 'Настройки операций для кошельков'), $this->createUrl('settings'));?>
				</li>
			<? endif; ?>
			<? if (Yii::app()->user->checkAccess('OfficeWalletsManageWallets')) : ?>
				<li>
					<?=CHtml::link('<i class="fa fa-sitemap"></i>' . Yii::t('app', 'Управление кошельками пользователей'), $this->createUrl('manage/wallets'));?>
				</li>
			<? endif; ?>
		</ul>
	</div>
	<div class="col-md-8">
		<div class="tab-content">
			<? $counter = 0; ?>
			<?foreach ($wallets as $item => $model_list):?>
				<div id="<?=$model_list->currency_alias?>_<?=$model_list->id?>" class="tab-pane <?if($counter == 0) { ?>active<? }?>">
					<? if ($model_list->status->alias == 'delete') : ?>
						<div class="portlet sale-summary">
							<div class="portlet-title">
								<div class="caption font-red">
									<?=Yii::t('app', 'Кошелек удален')?>
								</div>
							</div>
						</div>
					<? else : ?>
						<div class="portlet sale-summary">
							<div class="portlet-title">
								<div class="caption">
									<?=Yii::t('app', 'Статус')?> - <?=Yii::t('app', CHtml::encode($model_list->status->title))?>
								</div>
							</div>
							<div class="portlet-body">
								<ul class="list-unstyled">
									<li>
										<span class="sale-info">
											<?=Yii::t('app', 'Баланс к поступлению')?>
										</span>
										<span class="sale-num">
											<?=sprintf('%.2f', $model_list->balance_unapproved)?>
										</span>
									</li>
									<li>
										<span class="sale-info">
											<?=Yii::t('app', 'Баланс к выводу')?>
										</span>
										<span class="sale-num">
											<?=sprintf('%.2f', $model_list->balance_blocked)?>
										</span>
									</li>
									<li>
										<span class="sale-info">
											<?=Yii::t('app', 'Баланс доступный')?>
										</span>
										<span class="sale-num">
											<?=sprintf('%.2f', $model_list->balance)?>
										</span>
									</li>
								</ul>
							</div>
						</div>
						<div>
							<?=CHtml::button(Yii::t('app', 'Список операций по данному кошельку'), array('class' => 'btn blue', 'onClick' => 'location.href = "' . $this->createUrl('/office/wallets/transactions/index/wallet/' . $model_list->id) . '"'))?>
							<? if ((array_key_exists($item, $access)) && ((bool)$access[$item]['out'])) : ?>
								<?=CHtml::button(Yii::t('app', 'Финансы на вывод'), array('class' => 'btn green', 'onClick' => 'location.href = "' . $this->createUrl('/office/wallets/outmoney/index/wallet/' . $model_list->id) . '"'))?>
							<? endif; ?>
							<? if ((array_key_exists($item, $access)) && ((bool)$access[$item]['in'])) : ?>
								<?=CHtml::button(Yii::t('app', 'Финансы на ввод'), array('class' => 'btn green', 'onClick' => 'location.href = "' . $this->createUrl('/office/wallets/inmoney/index/wallet/' . $model_list->id) . '"'))?>
							<? endif; ?>
						</div>
					<? endif; ?>
				</div>
				<? $counter++; ?>
			<? endforeach;?>
		</div>
	</div>
	<!--end col-md-9-->
</div>
