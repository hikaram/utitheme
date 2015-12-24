<?php $this->layout = 'catalogue'; ?>

<?php
/**
 * @var OrderController $this
 * @var Horders $horder
 * @var CActiveForm $form
 * @var OrderLimitedRegistrationForm $limitedRegistrationForm
 * @var OrderHiddenRegistrationForm $hiddenRegistrationForm
 * @var LoginForm $loginForm
 * @var FinanceForm $financeForm
 * @var array $deliveryTypes
 * @var array $payTypes
 */

$form=$this->beginWidget('CActiveForm', array(
	'enableAjaxValidation'=>false,
	'htmlOptions' => array(
		'autocomplete' => 'off'
	)
));
?>
<script>
	var payMainWalletId = <?=$payFromMainWalletId?>;
    var payBonusWalletId = <?=$payFromBonusWalletId?>;
    var selfDelivery = 3;
	
	$(document).ready(function(){
		$('.date-picker').datepicker({
			format: "dd-mm-yyyy",
			language: "ru"
		});
	});
</script>


<h1><?=Yii::t('app', 'Оформление заказа')?></h1>
<div class="goods-page">
	<div class="goods-data">
		<? $this->renderPartial('_basket_products');?>
	</div>
</div>

<h1><?=Yii::t('app', 'Детали заказа')?></h1>
<div class="panel-group checkout-page accordion scrollable" id="checkout-page">
	<div id="checkout" class="panel panel-default">
		<div class="panel-heading">
			<h2 class="panel-title">
				<a id="logging" data-toggle="collapse" data-parent="#checkout-page" href="#checkout-content" class="accordion-toggle">
					<?=Yii::t('app', 'Данные пользователя');?>
				</a>
			</h2>
		</div>
		<div id="checkout-content" class="panel-collapse collapse in">
			<div class="panel-body content-form-page">
				<? if (Yii::app()->user->isGuest === TRUE): ?>
					<? $this->renderPartial('_unauthorized_user_controls', array(
						'form' => $form,
						'horder' => $horder,
						'loginForm' => $loginForm,
						'limitedRegistrationForm' => $limitedRegistrationForm,
						'hiddenRegistrationForm' => $hiddenRegistrationForm,
					));
					?>
				<? else: ?>
					<? $this->renderPartial('_user_info');?>
				<? endif; ?>
			</div>
		</div>
	</div>
	
	<? if (Yii::app()->user->isGuest === TRUE): ?>
	<div id="register" class="panel panel-default">
		<div class="panel-heading">
			<h2 class="panel-title">
				<a id="registering" data-toggle="collapse" data-parent="#checkout-page" href="#register-content" class="accordion-toggle">
					<?=Yii::t('app', 'Регистрация');?>
				</a>
			</h2>
		</div>
		<div id="register-content" class="panel-collapse collapse">
			<div class="panel-body content-form-page">
				<? $this->renderPartial('_unauthorized_user_register', array(
					'form' => $form,
					'horder' => $horder,
					'loginForm' => $loginForm,
					'limitedRegistrationForm' => $limitedRegistrationForm,
					'hiddenRegistrationForm' => $hiddenRegistrationForm,
				)); ?>
			</div>
		</div>
	</div>
	<? endif; ?>
	
	<? if (Yii::app()->user->isGuest === TRUE): ?>
	<div id="no-register" class="panel panel-default">
		<div class="panel-heading">
			<h2 class="panel-title">
				<a id="no-registering" data-toggle="collapse" data-parent="#checkout-page" href="#no-register-content" class="accordion-toggle">
					<?=Yii::t('app', 'Без регистрации');?>
				</a>
			</h2>
		</div>
		<div id="no-register-content" class="panel-collapse collapse">
			<div class="panel-body content-form-page">
				<? $this->renderPartial('_unauthorized_user_no_register', array(
					'form' => $form,
					'horder' => $horder,
					'loginForm' => $loginForm,
					'limitedRegistrationForm' => $limitedRegistrationForm,
					'hiddenRegistrationForm' => $hiddenRegistrationForm,
				)); ?>
			</div>
		</div>
	</div>
	<? endif; ?>
	
	<div id="payment" class="panel panel-default no-actions">
		<div class="panel-heading no-actions">
			<h2 class="panel-title">
				<a data-toggle="collapse" data-parent="#checkout-page" href="#payment-content" class="accordion-toggle">
					<?=Yii::t('app', 'Способы оплаты');?>
				</a>
			</h2>
		</div>
		<div id="payment-content" class="panel-collapse collapse">
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-6 col-md-6">
						<div class="payment-methods-block radiolist-wrapper">
							<? if (empty($payTypes)) : ?>
								<div class="basket-error-info-wrapper">
									<?=Yii::t('app', 'В настоящий момент у Вас нет возможности оплатить данный заказ')?>.<br />
									<? if ((!Yii::app()->user->isGuest) && (Yii::app()->isModuleInstall('OfficeWallets'))) : ?>
										<?=CHtml::link(Yii::t('app', 'Перейдите в кошелек'), $this->createUrl('/office/wallets'))?> <?=Yii::t('app', 'и пополните счет или оставьте нам сообщение на')?> <?=CHtml::link(Yii::t('app', ' форме обратной связи'), $this->createUrl('/site/contact'))?>
									<? elseif (Yii::app()->user->isGuest) : ?>
										<?=CHtml::link(Yii::t('app', 'Авторизируйтесь'), $this->createUrl('/site/login'))?> <?=Yii::t('app', 'на сайте для возможности оформить Ваш заказ')?>.
									<? else : ?>
										<?=Yii::t('app', 'Оставьте нам сообщение на')?> <?=CHtml::link(Yii::t('app', ' форме обратной связи'), $this->createUrl('/site/contact'))?>.
									<? endif; ?>									
								</div>								
							<? else : ?>
								<?php foreach ($payTypes as $payType):?>
									<div class="radio">
										<span <? if ($horder->store_pay_types__id == $payType->id) : ?> class="checked" <? endif; ?>>
											<?=$form->radioButton($horder, 'store_pay_types__id', array('uncheckValue' => null, 'value' => $payType->id, 'class' => 'radio-input-normal'))?>
										</span>
									</div> 
									<?=CHtml::encode($payType->name)?>
									<? if ($payType->alias == PayTypes::PAY_WALLET_BONUS) : ?>
										<div class="help-block">(<?=Yii::t('app', 'для авторизованных пользователей, у которых остаток на бонусном кошельке больше или равен сумме заказа')?>)</div>
									<? elseif ($payType->alias == PayTypes::PAY_WALLET_MAIN) : ?>
										<div class="help-block">(<?=Yii::t('app', 'для авторизованных пользователей, у которых остаток на основном кошельке больше или равен сумме заказа')?>)</div>
									<? endif; ?>	
									<br />
								<?php endforeach; ?>
								<?=$form->error($horder, 'store_pay_types__id')?>
							<? endif; ?>
							
							<div class="form-group margin-top-20 finpassord-container none">
								<label>Введите <?=$form->labelEx($financeForm, 'finpassword')?></label>
								<?=$form->passwordField($financeForm, 'finpassword', array('class' => 'form-control'))?>
								<?=$form->error($financeForm, 'finpassword').
								   $form->error($financeForm, 'amount')?>
							</div>
						</div>
					</div>
					<div class="col-sm-6 col-md-6">
						<div class="delivery-type-block radiolist-wrapper">
							<? if (empty($deliveryTypes)) : ?>
								<div class="basket-error-info-wrapper">
									<?=Yii::t('app', 'На текущий момент способы доставки отсутствуют')?>.<br />
									<?=Yii::t('app', 'Оставьте нам сообщение на')?> <?=CHtml::link(Yii::t('app', ' форме обратной связи'), $this->createUrl('/site/contact'))?> <?=Yii::t('app', 'для решения этой проблемы')?>.
								</div>	
							<? else : ?>
								<? foreach ($deliveryTypes as $deliveryType):?>
									<div class="radio">
										<span <? if ($horder->store_delivery_types__id == $deliveryType->id) : ?> class="checked" <? endif; ?>>
											<?=$form->radioButton($horder, 'store_delivery_types__id', array('uncheckValue' => null, 'value' => $deliveryType->id, 'class' => 'radio-input-normal'))?>
										</span>
									</div> 
									<?=CHtml::encode($deliveryType->name)?>
									<br />
								<? endforeach;?>
								<?=$form->error($horder, 'store_delivery_types__id')?>
							<? endif; ?>
						</div>
							
						<? if(isset($wh_list)) : ?>       
							<div class="warehouses">

								<h4><?=Yii::t('app', 'Выберите склад')?></h4>

								<?

								$model=new WarWarehouse;
								$data=CHtml::listData($wh_list,'id',function($model){ //passing the anonymous function as a parameter.
								return WarWarehouse::model()->findByPk($model->id)->lang->name;
								});
								echo CHtml::activeDropDownList($horder,'war_warehouse__id',$data);
								?>
							</div>
						<? endif;?>
					</div>
				</div>
				
				<hr />
				
				<h4><?=Yii::t('app', 'Дополнительная информация');?>:</h4>
				<div class="form-group">
					<?=$form->textArea($horder, 'commentary', array('class' => 'form-control'))?>
				</div>
			</div>
		</div>
	</div>

</div>


<div class="goods-page clearfix margin-top-30">
	<?=CHtml::link(Yii::t('app', 'продолжить покупки').' <i class="fa fa-shopping-cart"></i>', $this->createUrl('/store/catalog'), array('class' => 'btn btn-default'))?>
	<button class="btn btn-primary" type="submit" name="btn-buy"><?=Yii::t('app', 'Оплатить');?> <i class="fa fa-check"></i></button>
</div>

<?php $this->endWidget(); ?>