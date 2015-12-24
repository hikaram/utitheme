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
							<?=sprintf('%.2f', $amount);?> <?=$currency?>
						</span>
					</li>
					<li>
						<span class="sale-info">
							<?=Yii::t('app', 'Комиссия')?>
						</span>
						<span class="sale-num">
							<?=sprintf('%.2f', $сommission);?> <?=$currency?>
						</span>
					</li>
					<li>
						<span class="sale-info">
							<?=Yii::t('app', 'Сумма к оплате')?>
						</span>
						<span class="sale-num">
							<?=sprintf('%.2f', $amount + $сommission);?> <?=$currency?>
						</span>
					</li>
				</ul>			
				<form method="post" action="<?=$form_paypal['action']?>" enctype="multipart/form-data">
					<?=$form_paypal['form']?> 
					<input type="submit" name="btn_test_paypal" value="<?=Yii::t('app', 'Оплатить')?>" class="btn100 btn green">                   
				</form>
			</div>
		</div>
	</div>
</div>
				
            <?/*</td>
       </tr>
    </table>
 </div>    */?>

