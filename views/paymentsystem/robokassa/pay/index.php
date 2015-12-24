<div class="row">
	<div class="col-md-6">
		<div class="portlet sale-summary">
			<div class="portlet-title">
				<div class="caption">
					<?=CHtml::encode($transaction_model->getModelSpecification()->title)?>
				</div>
			</div>
			<div class="portlet-body">
				<ul class="list-unstyled">
					<li>
						<span class="sale-info">
							<?=Yii::t('app', 'Сумма операции')?>
						</span>
						<span class="sale-num">
							<?=sprintf('%.2f', $transaction_model->amount)." ".$abbreviation;?>
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
							<?=sprintf('%.2f', $transaction_model->amount)." ".$abbreviation;?>
						</span>
					</li>
				</ul>			
				<? $fields=$form['fields'] ?>
					<form action="<?=$form['action']?>" method=POST>
						 <input type=hidden name=MrchLogin value="<?=$fields['MrchLogin']?>">
						 <input type=hidden name=OutSum value="<?=$fields['OutSum']?>">
						 <input type=hidden name=InvId value="<?=$fields['InvId']?>">
						 <input type=hidden name=SignatureValue value="<?=$fields['crc']?>">
						 <input type=hidden name=Desc value="<?=$fields['Desc']?>">
						 <input type=hidden name=IncCurrLabel value=<?=$fields['IncCurrLabel']?>>
						 <input type=hidden name=Culture value=<?=$fields['Culture']?>>
						 <input type=hidden name=Encoding value=<?=$fields['Encoding']?>>
						 <input type=hidden name=SHP_guid value="<?=$fields['SHP_guid']?>">
						<input type="submit" value="<?=Yii::t('app', 'Оплатить')?>" class="btn green">
										
					</form>
            </div>
		</div>
	</div>
</div>