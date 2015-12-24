<div class="portlet box blue-steel">
	<div class="portlet-title">
		<h3 class="caption">
			<i class="glyphicon glyphicon-eye-open" style="margin-right: 10px;"></i> Просмотр назначения кошелька
		</h3>
		<div class="tools">
			<a href="<?=$this->createUrl('update', array('id' => $data->id))?>"><i class="fa fa-pencil"></i></a>
			<?=CHtml::form('', 'post', array('style'=>'padding: 0; display: inline; margin-left: 5px;'))?>
				<?=CHtml::linkButton('<i class="fa fa-times"></i>', array(
					'submit'=>array(
						'delete',
						'id' => $data->id,
					),
					'params'=>array(
						Yii::app()->request->csrfTokenName => Yii::app()->request->csrfToken
					),
					'confirm'=>"Удалить данное назначение кошелька? Данное действие может привести к невозможности выполнять финаносовые операции."
				))?>
			<?=CHtml::endForm() ?>
		</div>
	</div>
	<div class="portlet-body">
		<div class="row">
			<div class="col-md-3" style="text-align: right">
				<h4 class="h4-label"><?php echo CHtml::encode($data->getAttributeLabel('id')); ?></h4>
			</div>
			<div class="col-md-9">
				<h4><?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?></h4>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3" style="text-align: right">
				<h4 class="h4-label"><?php echo CHtml::encode($data->getAttributeLabel('object_alias')); ?></h4>
			</div>
			<div class="col-md-9">
				<h4><?php echo CHtml::encode($data->object->title); ?></h4>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3" style="text-align: right">
				<h4 class="h4-label"><?php echo CHtml::encode($data->getAttributeLabel('type_alias')); ?></h4>
			</div>
			<div class="col-md-9">
				<h4><?php $type = $data->getTypesAlias(); echo CHtml::encode($type[$data->type_alias]) ?></h4>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3" style="text-align: right">
				<h4 class="h4-label"><?php echo CHtml::encode($data->getAttributeLabel('purpose_alias')); ?></h4>
			</div>
			<div class="col-md-9">
				<h4><?php echo CHtml::encode($data->purpose->title); ?></h4>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3" style="text-align: right">
				<h4 class="h4-label"><?php echo CHtml::encode($data->getAttributeLabel('currency_alias')); ?></h4>
			</div>
			<div class="col-md-9">
				<h4><?php echo CHtml::encode($data->currency->title); ?></h4>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3" style="text-align: right">
				<h4 class="h4-label"><?php echo CHtml::encode($data->getAttributeLabel('status_alias')); ?></h4>
			</div>
			<div class="col-md-9">
				<h4><?php echo CHtml::encode($data->status->title); ?></h4>
			</div>
		</div>
		<div class="row" style="border-bottom: 1px solid #ddd; margin: 30px 0;"></div>
		<div class="row">
			<div class="col-md-3" style="text-align: right">
				<h4 class="h4-label"><?php echo CHtml::encode($data->getAttributeLabel('credit')); ?></h4>
			</div>
			<div class="col-md-9">
				<h4><?php echo CHtml::encode($data->credit); ?></h4>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3" style="text-align: right">
				<h4 class="h4-label"><?php echo CHtml::encode($data->getAttributeLabel('credit_unapproved')); ?></h4>
			</div>
			<div class="col-md-9">
				<h4><?php echo CHtml::encode($data->credit_unapproved); ?></h4>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3" style="text-align: right">
				<h4 class="h4-label"><?php echo CHtml::encode($data->getAttributeLabel('debit')); ?></h4>
			</div>
			<div class="col-md-9">
				<h4><?php echo CHtml::encode($data->debit); ?></h4>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3" style="text-align: right">
				<h4 class="h4-label"><?php echo CHtml::encode($data->getAttributeLabel('debit_unapproved')); ?></h4>
			</div>
			<div class="col-md-9">
				<h4><?php echo CHtml::encode($data->debit_unapproved); ?></h4>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3" style="text-align: right">
				<h4 class="h4-label"><?php echo CHtml::encode($data->getAttributeLabel('balance')); ?></h4>
			</div>
			<div class="col-md-9">
				<h4><?php echo CHtml::encode($data->balance); ?></h4>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3" style="text-align: right">
				<h4 class="h4-label"><?php echo CHtml::encode($data->getAttributeLabel('balance_unapproved')); ?></h4>
			</div>
			<div class="col-md-9">
				<h4><?php echo CHtml::encode($data->balance_unapproved); ?></h4>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3" style="text-align: right">
				<h4 class="h4-label"><?php echo CHtml::encode($data->getAttributeLabel('balance_blocked')); ?></h4>
			</div>
			<div class="col-md-9">
				<h4><?php echo CHtml::encode($data->balance_blocked); ?></h4>
			</div>
		</div>
		<div class="row">
		<div class="row" style="border-bottom: 1px solid #ddd; margin: 30px 0;"></div>
			<div class="col-md-3" style="text-align: right">
				<h4 class="h4-label"><?php echo CHtml::encode($data->getAttributeLabel('is_set_credit_balance_limit')); ?></h4>
			</div>
			<div class="col-md-9">
				<h4>
				<?php if ((boolean)$data->is_set_credit_balance_limit) : ?>
				<span title="Основная" class="true" style="color: #35aa47;">
					<i class="fa fa-check"></i>
				</span>
				<?php else : ?>
				<span title="Не основная" class="false" style="color: #d84a38;">
					<i class="fa fa-times"></i>
				</span>
				<?php endif; ?>
				</h4>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3" style="text-align: right">
				<h4 class="h4-label"><?php echo CHtml::encode($data->getAttributeLabel('credit_balance_limit')); ?></h4>
			</div>
			<div class="col-md-9">
				<h4><?php echo CHtml::encode($data->is_set_credit_balance_limit); ?></h4>
			</div>
		</div>
		<div class="row" style="border-bottom: 1px solid #ddd; margin: 30px 0;"></div>
		<div class="row">
			<div class="col-md-3" style="text-align: right">
				<h4 class="h4-label"><?php echo CHtml::encode($data->getAttributeLabel('is_set_debit_balance_limit')); ?></h4>
			</div>
			<div class="col-md-9">
				<h4>
				<?php if ((boolean)$data->is_set_debit_balance_limit) : ?>
				<span title="Основная" class="true" style="color: #35aa47;">
					<i class="fa fa-check"></i>
				</span>
				<?php else : ?>
				<span title="Не основная" class="false" style="color: #d84a38;">
					<i class="fa fa-times"></i>
				</span>
				<?php endif; ?>
				</h4>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3" style="text-align: right">
				<h4 class="h4-label"><?php echo CHtml::encode($data->getAttributeLabel('debit_balance_limit')); ?></h4>
			</div>
			<div class="col-md-9">
				<h4><?php echo CHtml::encode($data->is_set_debit_balance_limit); ?></h4>
			</div>
		</div>
		<!---->
		<div class="row" style="border-bottom: 1px solid #ddd; margin: 30px 0;"></div>
		<div class="row">
			<div class="col-md-3" style="text-align: right">
				<h4 class="h4-label"><?php echo CHtml::encode($data->getAttributeLabel('created_at')); ?></h4>
			</div>
			<div class="col-md-9">
				<h4><?php echo CHtml::encode($data->created_at); ?></h4>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3" style="text-align: right">
				<h4 class="h4-label"><?php echo CHtml::encode($data->getAttributeLabel('created_by')); ?></h4>
			</div>
			<div class="col-md-9">
				<h4><?php echo CHtml::encode($data->created_by); ?></h4>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3" style="text-align: right">
				<h4 class="h4-label"><?php echo CHtml::encode($data->getAttributeLabel('created_ip')); ?></h4>
			</div>
			<div class="col-md-9">
				<h4><?php echo CHtml::encode($data->created_ip); ?></h4>
			</div>
		</div>
		<div class="row" style="border-bottom: 1px solid #ddd; margin: 30px 0;"></div>
		<div class="row">
			<div class="col-md-3" style="text-align: right">
				<h4 class="h4-label"><?php echo CHtml::encode($data->getAttributeLabel('modified_at')); ?></h4>
			</div>
			<div class="col-md-9">
				<h4><?php echo CHtml::encode($data->modified_at); ?></h4>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3" style="text-align: right">
				<h4 class="h4-label"><?php echo CHtml::encode($data->getAttributeLabel('modified_by')); ?></h4>
			</div>
			<div class="col-md-9">
				<h4><?php echo CHtml::encode($data->modified_by); ?></h4>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3" style="text-align: right">
				<h4 class="h4-label"><?php echo CHtml::encode($data->getAttributeLabel('modified_ip')); ?></h4>
			</div>
			<div class="col-md-9">
				<h4><?php echo CHtml::encode($data->modified_ip); ?></h4>
			</div>
		</div>
	</div>
</div>