<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'finance-transactions-specs-form',
	'enableAjaxValidation'=>false,
    'action' => Yii::app()->controller->createUrl('/finance/')
)); ?>
<? #var_dump($this->modelFinance->modelSpecification->credit_purpose_alias);?>
<div class="panel panel-default wallet-inmoney-blocks">
	<div class="panel-heading">
		<h3 class="panel-title"><?=$this->pageTitle;?></h3>
		
	</div>
	<div class="panel-body form form-horizontal">
		<div class="form-body">
			<div class="row mt15">
				<div class="col-md-2">
					<?/*
						***** ИНФОРМАЦИЯ ДЛЯ ПРОГРАММИСТОВ *****
						К сожалению функционал не был предусмотрен для лого, поэтому используем такой выход пока что. 
						
						Для того, чтобы логотип платежной системы отображался на странице, необходимо в папку
							/public/office/wallets/default/
						вставить изображение в формате png, при этом название изображения должно совпадать с этим значением.
							$this->modelFinance->modelSpecification->credit_purpose_alias
						В противном случае, будет просто выводиться картинка-заглушка, что у платежки нет лого. 
						Пожалуйста, не ленитесь вставлять логотипы, поскольку это повышает уровень странички в плане дизайна и юзабилити.
						Размер картинки в принципе не важен, подстраивается автоматом, но если ее ширина не меньше 400рх, то вообще красота.
					*/?>
					<? $img = Yii::app()->theme->baseUrl.'/public/office/wallets/default/'.$this->modelFinance->modelSpecification->credit_purpose_alias.'.png';?>
					<? if(file_exists('.'.$img)) : ?>
						<img src="<?=$img;?>" alt="<?=$this->pageTitle;?>" width="100%"/>
					<? else : ?>
						<img src="<?=Yii::app()->theme->baseUrl.'/public/office/wallets/default/no-pay-image.png'?>" alt="<?=$this->pageTitle;?>" width="100%" />
					<? endif; ?>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<div class="col-md-12">
							<?=$form->labelEx($modelFinance, 'amount', array('class' => ''))?>
							<div class="input-group input-large">
								<? if ($this->is_amount_change) : ?>
									<?=$form->textField($modelFinance, 'amount', array('class' => 'form-control'))?>
								<? else : ?>
									<?=$form->textField($modelFinance, 'amount', array('class' => 'form-control', 'readonly' => 'readonly'))?>
								<? endif; ?>
								<? if($this->modelFinance->currency_alias != "") : ?>
									<span class="input-group-addon"><?=$this->modelFinance->currency_alias?></span>
								<? endif; ?>
								<!--<span class="input-group-btn">
									<?=CHtml::submitButton($this->buttonCaption, array('name' => 'yt0', 'class' => 'btn green')); ?>
								</span>-->
							</div>
						</div>
					</div>
					
					<? if ($this->is_comment_form_show && $modelFinance->is_comment_form_show) : ?>
					<div class="form-group">
						<div class="col-md-12">
							<?=$form->labelEx($modelFinance, 'comment')?>
							<?=$form->textArea($modelFinance, 'comment', array('class' => 'form-control input-large'))?>
						</div>
					</div>
					<? endif; ?>
					
					<? if ($this->is_password_require && $modelFinance->is_password_require) : ?>
					<div class="form-group">
						<div class="col-md-12">
							<?=$form->labelEx($modelFinance, 'finpassword')?>
							<?=$form->textField($modelFinance, 'finpassword', array('class' => 'form-control input-large'))?>
						</div>
					</div>
					<? endif; ?>
					
					<? if ($this->is_show_objects && count($modelFinance->modelsTransactionsObjects) > 0) : ?>

						<?php foreach($modelFinance->modelsTransactionsObjects as $key => $object) : ?>
						<? $property = 'is_show_for_' . $this->scenario ?>
						
						<div class="form-group" <? if (!(bool)$object->$property) echo 'style="display:none"'; ?>>
							<div class="col-md-12">
								<label><?=Yii::t('app', $object->title)?> <? if($object->is_required) echo '*'?></label>
								<?=$form->hiddenField($object, "[$key]" . 'alias')?>
								<? if (in_array($key, $this->objects_safe)) : ?>
									<?=$form->textField($object, "[$key]" . 'value', array('class' => 'form-control input-large', 'readonly' => 'readonly'))?>
								<? else : ?>
									<?=$form->textField($object, "[$key]" . 'value', array('class' => 'form-control input-large', 'cols'=>"45"))?>
								<? endif;?>
							</div>
						</div>
						<?php endforeach; ?>

					<? endif; ?>
					<div class="form-group">
						<div class="col-md-12">
							<?=CHtml::submitButton($this->buttonCaption, array('name' => 'yt0', 'class' => 'btn green')); ?>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					
				</div>
			</div>
		</div>

		<?=CHtml::hiddenField('scenario', $this->scenario)?>
		<?=$form->hiddenField($modelFinance, 'currency_alias')?>
		<?=$form->hiddenField($modelFinance, 'spec_alias')?>
		<?=$form->hiddenField($modelFinance, 'redirect_open')?>
		<?=$form->hiddenField($modelFinance, 'redirect_decline')?>
		<?=$form->hiddenField($modelFinance, 'redirect_confirm')?>
		<?=CHtml::hiddenField('pageTitle', $this->pageTitle)?>
		<?=CHtml::hiddenField('text', $this->text)?>
		<?=CHtml::hiddenField('debit_object_alias', $this->modelFinance->getModelDebitWallet()->object_alias)?>
		<?=CHtml::hiddenField('credit_object_alias', $this->modelFinance->getModelCreditWallet()->object_alias)?>
		<?=CHtml::hiddenField('debit_wallet_id', $this->modelFinance->getModelDebitWallet()->id)?>
		<?=CHtml::hiddenField('credit_wallet_id', $this->modelFinance->getModelCreditWallet()->id)?>
		<?=CHtml::hiddenField('hash', $this->hash)?>
		<?=CHtml::hiddenField('is_widget', '1')?>
		<?=CHtml::hiddenField('is_show_objects', (int) $this->is_show_objects)?>
		<?=CHtml::hiddenField('is_amount_change', (int) $this->is_amount_change)?>


		<? foreach ($this->objects_safe as $object) : ?>
		<input type="hidden" value="<?=$object?>" name="objects_safe[]" />
		<? endforeach; ?>
	</div>
</div>
<?php $this->endWidget(); ?>