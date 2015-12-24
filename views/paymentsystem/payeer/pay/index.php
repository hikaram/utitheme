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
							<?=sprintf('%.2f', $model->amount)." ".$abbreviation;?>
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
							<?=sprintf('%.2f', $model->amount)." ".$abbreviation;?>
						</span>
					</li>
				</ul>			
				<form action="<?=$form_payeer['action']?>" method="GET">
					<?=$form_payeer['form']?> 
					<input type="submit" name="m_process" value="<?=Yii::t('app', 'Оплатить')?>" class="btn green">
				</form>
			</div>
		</div>
	</div>
</div>