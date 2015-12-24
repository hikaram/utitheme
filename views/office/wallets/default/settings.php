<?php $this->layout = 'office'; ?>

<div class="table-scrollable profile" style="border: 0;">
<?=CHtml::beginForm('', 'POST', array('id' => 'formSwitching'))?>
	<?=CHtml::hiddenField('typeSwitching', null, array('id' => 'forminput_typeSwitching'))?>
	<?=CHtml::hiddenField('walletId', null, array('id' => 'forminput_walletId'))?>
	<?=CHtml::hiddenField('operationSpec', null, array('id' => 'forminput_operationSpec'))?>
	<? if (empty($settings)) : ?>
        <div class="note note-info">
			<?=Yii::t('app', 'Настройки финансовых операций для кошельков отсутствуют')?>
		</div>
    <? else : ?>
		<table class="table table-striped table-bordered table-advance table-hover">
			<thead>
				<tr>
					<th><?=Yii::t('app', '№ п/п')?></th>
					<th><?=Yii::t('app', 'Тип кошелька')?></th>
					<? foreach ($settingOperations as $spec_alias => $title) : ?>
						<th><?=$title?></th>
					<? endforeach; ?> 
					<th><?=Yii::t('app', 'Действия')?></th>
				</tr>
			</thead>
			<tbody>
				<? $i = 0; ?>
				<? foreach ($settingWallets as $walletId => $walletOperations):?>
					<tr>
						<? $i++ ?>
						<td><?=$i?></td>
						<td><?=CHtml::encode($walletOperations['title'])?></td>
						<? foreach ($settingOperations as $spec_alias => $title) : ?>
							<td>
								<? if ((array_key_exists($spec_alias, $walletOperations['operations'])) && ((bool)$walletOperations['operations'][$spec_alias])) : ?>
									<div class="btn-group btn-group-sm btn-group-solid toggler-btns">
										<span class="btn green no-margin">Вкл</span>
										<?=CHtml::button(Yii::t('app', 'Откл'), array('class' => 'btn grey no-margin', 'onClick' => 'operationOff("' . $spec_alias . '", ' . $walletId . ')'))?>
									</div>
								<? else : ?>
									<div class="btn-group btn-group-sm btn-group-solid toggler-btns">
										<?=CHtml::button(Yii::t('app', 'Вкл'), array('class' => 'btn grey no-margin', 'onClick' => 'operationOn("' . $spec_alias . '", ' . $walletId . ')'))?>
										<span class="btn red">Выкл</span>
									</div>
								<? endif; ?>
							</td>
						<? endforeach; ?> 
						<td>
							<?=CHtml::linkButton('<i class="fa fa-times"></i>',array(
								'submit' => array('deletewallet', 'wallet' => $walletId),
								'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
								'confirm' => Yii::t('app', 'Удалить все операции для данного кошелька ?'),
								'class' => 'btn btn-sm btn-icon red tooltips',
								'data-placement' => 'top',
								'data-original-title' => Yii::t('app', 'Удалить кошелек'),
							));  ?>                        
						</td>
					</tr>
				<? endforeach;?>
				<? if ((bool)$errorSwitching) : ?>
					<tr>
						<td colspan="<?=count($settingOperations) + 2?>" id="tdErrorMessageSwitching" style="color: red; text-align: left;"><?=$errorMessageSwitching?></td>
					</tr>                        
				<? endif; ?>
			</tbody>
		</table>
		
		<? if (!empty($operations)) : ?>
			<div class="mt15">
				<?=CHtml::link(Yii::t('app', 'Добавить операцию'), '#addOperationBlock', array('data-toggle' => 'modal'))?>
			</div>
        <? endif; ?>
		
	<? endif; ?>
<?=CHtml::endForm()?>
</div>
<? if (!empty($wallets)) : ?>
<div>
	<?=CHtml::link(Yii::t('app', 'Добавить кошелек'), '#addWalletBlock', array('data-toggle' => 'modal'))?>
</div>
<div class="modal fade" id="addWalletBlock">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title"><?=Yii::t('app', 'Добавить кошелек')?></h4>
			</div>
			<?=CHtml::beginForm()?>
			<div class="modal-body">
				<? if ((bool)$errorWallet) : ?>
					<script>
						$('#addWalletBlock').modal('show');
					</script>
					<div class="row mb20">
						<div class="col-md-12 font-red" id="tdErrorMessageWallet"><?=$errorMessageWallet?></div>
					</div>
				<? endif; ?>
				<div class="row">
					<label class="col-md-5 mt10 text-right">
						<?=Yii::t('app', 'Выберите кошелек')?>:
					</label>
					<div class="col-md-7">
						<?=Chtml::listBox('walletName', null, $wallets, array('size' => '1', 'class' => 'form-control'))?>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<span class="btn grey" data-dismiss="modal"><?=Yii::t('app', 'Отмена')?></span>
				<?=CHtml::submitButton(Yii::t('app', 'Добавить'), array('class' => 'btn blue', 'name' => 'addWallet'))?>
			</div>
			<?=CHtml::endForm()?>
		</div>
	</div>
</div>
<? endif; ?>
<hr/>
<?=CHtml::link(Yii::t('app', 'Назад в кошельки'), $this->createUrl('index'))?>
<? if (!empty($settings) && !empty($operations)) :?>
<div class="modal fade" id="addOperationBlock">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title"><?=Yii::t('app', 'Добавить операцию')?></h4>
			</div>
			<?=CHtml::beginForm()?>
			<div class="modal-body">
				<? if ((bool)$errorOperation) : ?>
					<script>
						$('#addOperationBlock').modal('show');
					</script>
					<div class="row mb20">
						<div class="col-md-12 font-red" id="tdErrorMessageOperation"><?=$errorMessageOperation?></div>
					</div>
				<? endif; ?>
				<div class="row mb20">
					<label class="col-md-5 mt10 text-right">
						<?=Yii::t('app', 'Выберите операцию')?>:
					</label>
					<div class="col-md-7">
						<?=Chtml::listBox('operationName', null, $operations, array('size' => '1', 'class' => 'form-control'))?>
					</div>
				</div>
				<div class="row mb20">
					<label class="col-md-5 mt10 text-right">
						<?=Yii::t('app', 'Для каких кошельков')?>:
					</label>
					<div class="col-md-7">
						<? if (count($walletListForOperation) == 1) : ?>
							<?=Chtml::listBox('walletListForOperation', null, $walletListForOperation, array('size' => count($settingWallets), 'class' => 'form-control'))?>
						<? elseif (count($walletListForOperation) > 1) : ?>
							<?=Chtml::listBox('walletListForOperation', null, $walletListForOperation, array('multiple' => TRUE, 'size' => count($settingWallets), 'style' => 'height: ' . 21 * count($settingWallets) . 'px;', 'class' => 'form-control'))?>
						<? endif; ?>
					</div>
				</div>
				<div class="row">
					<label class="col-md-5 mt10 text-right">
						<?=Yii::t('app', 'Направление операции')?>:
					</label>
					<div class="col-md-7">
						<?=Chtml::listBox('directionType', null, array(), array('size' => '1', 'class' => 'form-control'))?>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<span class="btn grey" data-dismiss="modal"><?=Yii::t('app', 'Отмена')?></span>
				<?=CHtml::submitButton(Yii::t('app', 'Добавить'), array('class' => 'btn blue', 'name' => 'addOperation'))?>
			</div>
			<?=CHtml::endForm()?>
		</div>
	</div>
</div>
<? endif; ?>