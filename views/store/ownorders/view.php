<?php
$this->breadcrumbs['/store/ownorders'] = Yii::t('app', 'Мои заказы');
$this->breadcrumbs['/store/ownorders'] = $this->pageTitle;
?>
<table class="view">
	<tr>
		<th><?=$horder->getAttributeLabel('num')?></th>
		<td>
			<?=$horder->num?>
		</td>
	</tr>
	<tr>
		<th><?=$horder->user->getAttributeLabel('username')?></th>
		<td>
			<?=$horder->user->username?>
		</td>
	</tr>
	<tr>
		<th><?=$horder->user->getAttributeLabel('email')?></th>
		<td>
			<?=$horder->user->email?>
		</td>
	</tr>
	<tr>
		<th>ФИО</th>
		<td>
			<?php if (!empty($horder->user->profile_lang)):?>
				<?=trim($horder->user->profile_lang->last_name.' '.$horder->user->profile_lang->first_name.' '.$horder->user->profile_lang->second_name)?>
			<?php else:?>
				н/д
			<?php endif; ?>
		</td>
	</tr>
	<tr>
		<th><?php echo CHtml::encode($horder->getAttributeLabel('created_at')); ?></th>
		<td><?php echo date('d.m.Y H:i:s', strtotime($horder->created_at)); ?></td>
	</tr>
	<tr>
		<th><?php echo CHtml::encode($horder->getAttributeLabel('closed_at')); ?></th>
		<td><?php echo date('d.m.Y H:i:s', strtotime($horder->closed_at)); ?></td>
	</tr>
	<tr>
		<th><?php echo CHtml::encode($horder->getAttributeLabel('is_payed')); ?></th>
		<td><?php echo Horders::gridIsPayedItem($horder->is_payed)?></td>
	</tr>
	<tr>
		<th><?php echo CHtml::encode($horder->getAttributeLabel('status')); ?></th>
		<td><?php echo Horders::gridStatusItem($horder->status)?></td>
	</tr>
	<tr>
		<th><?php echo CHtml::encode($horder->getAttributeLabel('store_delivery_types__id')); ?></th>
		<td><?php echo $horder->deliveryType->name; ?></td>
	</tr>
	<tr>
		<th><?php echo CHtml::encode($horder->getAttributeLabel('store_pay_types__id')); ?></th>
		<td><?php echo $horder->payType->name; ?></td>
	</tr>
	<tr>
		<th><?php echo CHtml::encode($horder->getAttributeLabel('total_price')); ?></th>
		<td><?php echo number_format($horder->total_price, 2, '.', ''); ?></td>
	</tr>
	<tr>
		<th><?php echo CHtml::encode($horder->getAttributeLabel('commentary')); ?></th>
		<td><?php echo $horder->commentary; ?></td>
	</tr>
	<tr>
		<th><?php echo CHtml::encode($horder->getAttributeLabel('orders')); ?></th>
		<td>
			<table class="tablesorter line-small">
				<thead>
				<tr>
					<th><?=Orders::model()->getAttributeLabel('id')?></th>
					<th><?=Orders::model()->getAttributeLabel('catalogues_products__id')?></th>
					<th><?=Orders::model()->getAttributeLabel('count')?></th>
					<th><?=Orders::model()->getAttributeLabel('price')?></th>
				</tr>
				</thead>
				<tbody>
				<?php foreach ($horder->orders as $i => $order):?>
					<tr>
						<td><?=$i + 1?></td>
						<td><?=($order->product instanceof Products) ? $order->product->lang->name : Yii::t('app', 'продукт #') . $order->catalogues_products__id . Yii::t('app', ' не найден')?></td>
						<td><?=$order->count?></td>
						<td><?=number_format($order->price, 2, '.', '')?></td>
					</tr>
				<?php endforeach;?>
				<tbody>
			</table>
		</td>
	</tr>
</table>