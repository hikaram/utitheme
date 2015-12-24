<div class="portlet green box">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa fa-shopping-cart"></i><?=Yii::t('app', 'Заказ')?> № <?=CHtml::encode($horder->num)?> 
			<span class="hidden-480"> | <?= MSmarty::date_format($horder->created_at, 'd.m.Y H:i'); ?> </span>
		</div>
	</div>
	<div class="portlet-body">
		
		<?php $cities = $this->beginWidget('CitiesWidget'); ?>

			<div class="row">
				<div class="col-md-6 col-sm-12">

					<div class="portlet yellow-crusta box">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-cogs"></i><?=Yii::t('app', 'Данные заказа')?>
							</div>
						</div>
						<div class="portlet-body">
							<div class="row static-info">
								<div class="col-md-5 name">
									<?=Yii::t('app', 'Заказ')?> №:
								</div>
								<div class="col-md-7 value">
									<?=CHtml::encode($horder->num)?>
									<span class="label label-info label-sm">
										<?if ((bool)$horder->is_unregistered_customer) : ?>
											<?=Yii::t('app', 'гость')?>
										<? elseif ($horder->user != NULL) : ?>
											<?=CHtml::encode($horder->user->username)?>
										<? endif; ?> 
									</span>
								</div>
							</div>
							<div class="row static-info">
								<div class="col-md-5 name">
									<?=Yii::t('app', 'Дата совершения заказа')?>
								</div>
								<div class="col-md-7 value">
									<?= MSmarty::date_format($horder->created_at, 'd.m.Y H:i'); ?>
								</div>
							</div>
							<div class="row static-info">
								<div class="col-md-5 name">
									 <?=Yii::t('app', 'Статус заказа')?>:
								</div>
								<div class="col-md-7 value">
                                    <? if ($horder->status == Horders::STATUS_NEW) : ?>
                                        <? $class = 'label-warning'; ?>
                                    <? elseif ($horder->status == Horders::STATUS_PROCESSING) : ?>
                                        <? $class = 'label-info'; ?>
                                    <? elseif ($horder->status == Horders::STATUS_DELIVERING) : ?>
                                        <? $class = 'label-info'; ?>
                                    <? elseif ($horder->status == Horders::STATUS_CLOSED) : ?>
                                        <? $class = 'label-success'; ?>
                                    <? else : ?>
                                        <? $class = 'label-danger'; ?>
                                    <? endif; ?>
									<span class="label <?=$class?>"> <?=CHtml::encode(Horders::gridStatusItem($horder->status));?> </span>
								</div>
							</div>
							<div class="row static-info">
								<div class="col-md-5 name">
									<?=Yii::t('app', 'Стоимость заказа')?>:
								</div>
								<div class="col-md-7 value">
									<?=$mainCurrencyAbbr?> <?=sprintf('%.2f', $horder->total_price)?>
								</div>
							</div>
							<div class="row static-info">
								<div class="col-md-5 name">
									<?=Yii::t('app', 'Способ оплаты')?>:
								</div>
								<div class="col-md-7 value">
									<? if ($horder->is_payed) : ?>
										<? $class = 'label-success'; ?>
									<? else : ?>
										<? $class = 'label-danger'; ?>
									<? endif; ?>
									<span class="label <?=$class?>"> <?=CHtml::encode($horder->payType->name) ?> </span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-sm-12">
					<div class="portlet blue-hoki box">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-cogs"></i><?=Yii::t('app', 'Данные покупателя')?>
							</div>
						</div>
						<div class="portlet-body">
							<?if ((!(bool)$horder->is_unregistered_customer) && ($horder->user != NULL)) : ?>
								<div class="row static-info">
									<div class="col-md-5 name">
										<?=Yii::t('app', 'Логин пользователя')?>:
									</div>
									<div class="col-md-7 value">
										<?=CHtml::encode($horder->user->username)?>
									</div>
								</div>
							<? endif; ?>
							<div class="row static-info">
								<div class="col-md-5 name">
									<?=Yii::t('app', 'ФИО покупателя')?>:
								</div>
								<div class="col-md-7 value">
									<?=CHtml::encode($horder->user->profile_lang->last_name.' '.$horder->user->profile_lang->first_name.' '.$horder->user->profile_lang->second_name)?>
								</div>
							</div>
							<div class="row static-info">
								<div class="col-md-5 name">
									Email
								</div>
								<div class="col-md-7 value">
									<?=CHtml::encode($horder->user->email)?>
								</div>
							</div>
							<?if ((!(bool)$horder->is_unregistered_customer) && ($horder->user != NULL)) : ?>
								<div class="row static-info">
									<div class="col-md-5 name">
										<?=Yii::t('app', 'Страна')?>:
									</div>
									<div class="col-md-7 value">
										<?php $cities->get_country($horder->user->profile->country__id); ?>
									</div>
								</div>
							<? endif; ?>
							<div class="row static-info">
								<div class="col-md-5 name">
									<?=Yii::t('app', 'Телефон')?>:
								</div>
								<div class="col-md-7 value">
									<?=CHtml::encode($horder->user->profile->phone)?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>



			<div class="row">
				<div class="col-md-<? if (!empty($horder->commentary)) : ?>6<? else : ?>12<? endif; ?> col-sm-12">
					<div class="portlet green-meadow box">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-cogs"></i><?=Yii::t('app', 'Данные доставки')?>
							</div>
						</div>
						<div class="portlet-body">
							<div class="row static-info">
								<div class="col-md-12 value">
									<?=CHtml::encode($horder->last_name)?> <?=CHtml::encode($horder->first_name)?> <?=CHtml::encode($horder->second_name)?>
									<span class="label label-success"><?=CHtml::encode($horder->deliveryType->name)?></span><br /><br />
									<?php $cities->get_country($horder->country__id); ?> <?php $cities->get_region($horder->region__id); ?> <?php $cities->get_city($horder->city__id); ?><br />
									<?=CHtml::encode($horder->district)?><? if ((!empty($horder->district)) && (!empty($horder->street))) : ?>, <?=CHtml::encode($horder->street)?><? endif; ?>
									<? if (!empty($horder->apartments)) : ?>, <?=CHtml::encode($horder->apartments)?><? endif; ?>
									<? if ((!empty($horder->district)) || (!empty($horder->street)) || (!empty($horder->apartments))) : ?><br /><? endif; ?>
									<? if (!empty($horder->address)) : ?><?=CHtml::encode($horder->address)?><br /><? endif; ?>
									<? if (!empty($horder->phone)) : ?>T: <?=CHtml::encode($horder->phone)?><? endif; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<? if (!empty($horder->commentary)) : ?>
					<div class="col-md-6 col-sm-12">
						<div class="portlet red-sunglo box">
							<div class="portlet-title">
								<div class="caption">
									<i class="fa fa-cogs"></i><?=Yii::t('app', 'Дополнительная информация')?>
								</div>
							</div>
							<div class="portlet-body">
								<div class="row static-info">
									<div class="col-md-12 value">
										<?=CHtml::encode($horder->commentary)?>
									</div>
								</div>
							</div>
						</div>
					</div>
				<? endif; ?>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12">
					<div class="portlet grey-cascade box">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-cogs"></i><?=Yii::t('app', 'Позиции заказа')?>
							</div>
						</div>
						<div class="portlet-body">
							<div class="table-responsive">
								<table class="table table-hover table-bordered table-striped">
									<thead>
										<tr>
											<th><?=Orders::model()->getAttributeLabel('id')?></th>
											<th><?=Orders::model()->getAttributeLabel('catalogues_products__id')?></th>
											<th><?=Orders::model()->getAttributeLabel('count')?></th>
											<th><?=Orders::model()->getAttributeLabel('price')?></th>
											<? if (ProductsConfig::model()->_checkSwitchedPoints()) : ?>
												<th><?=Yii::t('app', 'Баллы за единицу'); ?></th>
											<? endif; ?>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($horder->orders as $i => $order):?>
											<tr>
												<td><?=$i + 1?></td>
												<td><?=($order->product instanceof Products) ? $order->product->lang->name : Yii::t('app', 'продукт #') . $order->catalogues_products__id.Yii::t('app', ' не найден')?></td>
												<td><?=$order->count?></td>
												<td><?=number_format($order->price, 2, '.', '')?></td>
												<? if (ProductsConfig::model()->_checkSwitchedPoints()) : ?>
													<td><?=number_format($order->points, 2, '.', '')?></td>
												<? endif; ?>
											</tr>
										<?php endforeach;?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
				</div>
				<div class="col-md-6">
					<div class="well">
						<div class="row static-info align-reverse">
							<div class="col-md-8 name">
								<?=Yii::t('app', 'Суммарная стоимость заказа')?>:
							</div>
							<div class="col-md-3 value">
								<?=$mainCurrencyAbbr?> <?=sprintf('%.2f', $horder->total_price)?>
							</div>
						</div>
						<? if (ProductsConfig::model()->_checkSwitchedPoints()) : ?>
							<div class="row static-info align-reverse">
								<div class="col-md-8 name">
									<?=Yii::t('app', 'Суммарное количество баллов')?>:
								</div>
								<div class="col-md-3 value">
									<?=sprintf('%.2f', $horder->total_points)?>
								</div>
							</div>
						<? endif; ?>
						
						<div class="row static-info align-reverse">
							<div class="col-md-8 name"></div>
							<div class="col-md-3 value">
								<? if ($horder->is_payed) : ?>
									<span class="label label-success"><?=Yii::t('app', 'Оплачено') ?></span>
								<? else : ?>
									<span class="label label-danger"><?=Yii::t('app', 'Не оплачено') ?></span>
								<? endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>

		<?php $this->endWidget(); ?>

	</div>
</div>