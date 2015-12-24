<div class="row">
	<div class="col-md-6">
		<div class="portlet sale-summary">
			<div class="portlet-title">
				<div class="caption">
					<?#=Yii::t('app', 'Информация');?>
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
							<?=sprintf('%.2f', $model->amount);?>
						</span>
					</li>
					<li>
						<span class="sale-info">
							<?=Yii::t('app', 'Комиссия')?>
						</span>
						<span class="sale-num">
							<?=isset($commission) ? sprintf('%.2f', $commission) : '0.00';?>
						</span>
					</li>
					<li>
						<span class="sale-info">
							<?=Yii::t('app', 'Сумма к оплате')?>
						</span>
						<span class="sale-num">
							<?=isset($commission) ? sprintf('%.2f', ($model->amount + $commission)) : sprintf('%.2f', $model->amount);?>
						</span>
					</li>
				</ul>
				<form action="<?=$form_walletone['action']?>" method="POST" accept-charset="UTF-8">
					<?=$form_walletone['form']?> 
					<input type="submit" value="<?=Yii::t('app', 'Оплатить')?>" class="btn green" style="margin-top:10px;" />					
				</form>
			</div>
		</div>
	</div>
</div>