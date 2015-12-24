<div class="row">
	<div class="col-md-6">
		<div class="portlet sale-summary">
			<div class="portlet-title">
				<div class="caption">
					<?=CHtml::encode($model->getModelSpecification()->title)?>
				</div>
			</div>
			<div class="portlet-body">
				<ul class="list-unstyled">
					<li>
						<span class="sale-info">
							<?=Yii::t('app', 'Сумма операции')?>
						</span>
						<span class="sale-num">
							<?=sprintf('%.2f', $model->amount).$abbreviation?>
						</span>
					</li>
					<li>
						<span class="sale-info">
							<?=Yii::t('app', 'Комиссия')?>
						</span>
						<span class="sale-num">
							0.00
						</span>
					</li>
					<li>
						<span class="sale-info">
							<?=Yii::t('app', 'Сумма к оплате')?>
						</span>
						<span class="sale-num">
							<?=sprintf('%.2f', $model->amount).$abbreviation?>
						</span>
					</li>
				<form action="<?=$form_moneyonline['action']?>" method="POST">
					<?=$form_moneyonline['form1']?> 
					<li>
						<span class="sale-info">
							<?=Yii::t('app', 'Метод оплаты')?>
						</span>	
						<span class="sale-num">
							<?php echo CHtml::dropDownList('mode_type',@$form_moneyonline['mode_type'] , $type, array('empty' => '',  'style'=>'height : 40px' ))?>
						</span>
					</li>
				</ul>	
					<?=$form_moneyonline['form2']?>
						<input type="hidden" name = "paymentCurrency" value="<?php echo strtoupper($paymentCurrency)?>">                                                  
						<input class="btn green" type="submit" value="<?=Yii::t('app', 'Оплатить')?>" >
				</form>
			</div>	
		</div>
	</div>
</div>