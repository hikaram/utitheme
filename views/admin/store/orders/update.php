<?php
/**
 * @var CActiveForm $form
 */
$form = $this->beginWidget('CActiveForm', array());
?>

<?php echo $form->errorSummary($model); ?>

<div class="portlet green box">
	<div class="portlet-title">
		<div class="caption">
				<i class="glyphicon glyphicon-pencil"></i> <?=Yii::t('app', 'Редактирование заказа')?>
		</div>
	</div>
	<div class="portlet-body form form-horizontal">
		<div class="form-body">
			<div class="form-group" style="margin-top: 20px;">
				<?=$form->labelEx($model, 'num', array('class' => 'col-md-2 control-label'))?>
				<div class="col-md-9">
					<?=$form->textField($model, 'num', array('class' => 'form-control input-inline input-large', 'readonly' => 'readonly'))?>
				</div>
			</div>
			<? if (!(bool)$model->is_unregistered_customer) : ?>
				<div class="form-group" style="margin-top: 20px;">
					<?=$form->labelEx($model->user, 'username', array('class' => 'col-md-2 control-label'))?>
					<div class="col-md-9">
						<?=$form->textField($model->user, 'username', array('class' => 'form-control input-inline input-large', 'readonly' => 'readonly'))?>
					</div>
				</div>
			<? endif; ?>
			<div class="form-group" style="margin-top: 20px;">
				<?=$form->labelEx($model->user, 'email', array('class' => 'col-md-2 control-label'))?>
				<div class="col-md-9">
					<?=$form->textField($model->user, 'email', array('class' => 'form-control input-inline input-large', 'readonly' => 'readonly'))?>
				</div>
			</div>
			<div class="form-group" style="margin-top: 20px;">
				<label class = "col-md-2 control-label"><?=Yii::t('app', 'ФИО')?></label>
				<div class="col-md-9">
				<?php if (!empty($model->user->profile_lang)):?>
					<label class = "form-control input-inline input-large" readonly><?=trim($model->user->profile_lang->last_name.' '.$model->user->profile_lang->first_name.' '.$model->user->profile_lang->second_name)?></label>
					
				<?php else:?>
					<label class = "form-control input-inline input-large" readonly><?=Yii::t('app', 'н/д')?></label>
				<?php endif; ?>
				</div>
			</div>
			<div class="form-group" style="margin-top: 20px;">
				<?=$form->labelEx($model, 'created_at', array('class' => 'col-md-2 control-label'))?>
				<div class="col-md-9">
					<label class = "form-control input-inline input-large" readonly><?php echo date('d.m.Y H:i:s', strtotime($model->created_at)); ?></label>
				</div>
			</div>
			<? if ($model->is_payed) : ?>
				<div class="form-group" style="margin-top: 20px;">
					<?=$form->labelEx($model, 'closed_at', array('class' => 'col-md-2 control-label'))?>
					<div class="col-md-9">
						<label class = "form-control input-inline input-large" readonly><?php echo date('d.m.Y H:i:s', strtotime($model->closed_at)); ?></label>
					</div>
				</div>
			<? endif; ?>
			<div class="form-group" style="margin-top: 20px;">
				<?=$form->labelEx($model, 'is_payed', array('class' => 'col-md-2 control-label'))?>
				<div class="col-md-9">
					<label class = "form-control input-inline input-large" readonly><?php echo Horders::gridIsPayedItem($model->is_payed)?></label>
				</div>
			</div>
			<div class="form-group" style="margin-top: 20px;">
				<?=$form->labelEx($model, 'status', array('class' => 'col-md-2 control-label'))?>
				<div class="col-md-9">
					<?=$form->dropDownList($model, 'status', Horders::gridStatusItems(),  array('class' => 'form-control input-inline input-large'))?>
				</div>
			</div>
			<div class="form-group" style="margin-top: 20px;">
				<?=$form->labelEx($model, 'is_unregistered_customer', array('class' => 'col-md-2 control-label'))?>
				<div class="col-md-9">
					<label class = "form-control input-inline input-large" readonly><?php echo Horders::gridIsUnregisteredItem($model->is_unregistered_customer)?></label>
				</div>
			</div>
			<div class="form-group" style="margin-top: 20px;">
				<?=$form->labelEx($model, 'store_delivery_types__id', array('class' => 'col-md-2 control-label'))?>
				<div class="col-md-9">
					<?=$form->textField($model->deliveryType, 'name', array('class' => 'form-control input-inline input-large', 'readonly' => 'readonly'))?>
				</div>
			</div>
			<div class="form-group" style="margin-top: 20px;">
				<?=$form->labelEx($model, 'store_pay_types__id', array('class' => 'col-md-2 control-label'))?>
				<div class="col-md-9">
					<?=$form->textArea($model->payType, 'name', array('class' => 'form-control input-inline input-large', 'readonly' => 'readonly'))?>
				</div>
			</div>
			<div class="form-group" style="margin-top: 20px;">
				<label class = "col-md-2 control-label"><?=Yii::t('app', 'Итоговая сумма у.е.'); ?></label>
				<div class="col-md-9">
					<label class = "form-control input-inline input-large" readonly><?php echo number_format($model->total_price, 2, '.', ''); ?></label>
				</div>
			</div>
			<? if (ProductsConfig::model()->_checkSwitchedPoints()) : ?>
				<div class="form-group" style="margin-top: 20px;">
					<label class = "col-md-2 control-label"><?=Yii::t('app', 'Итоговая сумма баллов'); ?></label>
					<div class="col-md-9">
						<label class = "form-control input-inline input-large" readonly><?php echo number_format($model->total_points, 2, '.', ''); ?></label>
					</div>
				</div>
			<?endif;?>
			<div class="form-group" style="margin-top: 20px;">
				<?=$form->labelEx($model, 'commentary', array('class' => 'col-md-2 control-label'))?>
				<div class="col-md-9">
					<?=$form->textArea($model, 'commentary', array('class' => 'form-control input-inline input-large', 'readonly' => 'readonly'))?>
				</div>
			</div>
			<h3><?php echo CHtml::encode($model->getAttributeLabel('orders')); ?></h3>
			<table class="table table-hover">
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
				<?php foreach ($model->orders as $i => $order):?>
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
				<tbody>
			</table>
		</div>
		<div class="form-actions">
			<?php echo CHtml::submitButton(Yii::t('app', 'Сохранить'), array('class' => 'btn green')); ?></td>

			<?=Chtml::link(Yii::t('app', 'Отмена'), $this->createUrl('index'), ['class' => 'btn green'])?>
		</div>
	</div>
</div>
<?php $this->endWidget();?>