<?php
/* @var $this FinanceTransactionsController */
/* @var $data FinanceTransactions */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('parent_id')); ?>:</b>
	<?php echo CHtml::encode($data->parent_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('debit_wallet_id')); ?>:</b>
	<?php echo CHtml::encode($data->debit_wallet_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('debit_wallet_type_alias')); ?>:</b>
	<?php echo CHtml::encode($data->debit_wallet_type_alias); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('debit_object_alias')); ?>:</b>
	<?php echo CHtml::encode($data->debit_object_alias); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('debit_object_id')); ?>:</b>
	<?php echo CHtml::encode($data->debit_object_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('credit_wallet_id')); ?>:</b>
	<?php echo CHtml::encode($data->credit_wallet_id); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('credit_wallet_type_alias')); ?>:</b>
	<?php echo CHtml::encode($data->credit_wallet_type_alias); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('credit_object_alias')); ?>:</b>
	<?php echo CHtml::encode($data->credit_object_alias); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('credit_object_id')); ?>:</b>
	<?php echo CHtml::encode($data->credit_object_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('currency_alias')); ?>:</b>
	<?php echo CHtml::encode($data->currency_alias); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_open')); ?>:</b>
	<?php echo CHtml::encode($data->date_open); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_closed')); ?>:</b>
	<?php echo CHtml::encode($data->date_closed); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_decline')); ?>:</b>
	<?php echo CHtml::encode($data->date_decline); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('amount')); ?>:</b>
	<?php echo CHtml::encode($data->amount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('group_alias')); ?>:</b>
	<?php echo CHtml::encode($data->group_alias); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('spec_alias')); ?>:</b>
	<?php echo CHtml::encode($data->spec_alias); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status_alias')); ?>:</b>
	<?php echo CHtml::encode($data->status_alias); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_confirm_system')); ?>:</b>
	<?php echo CHtml::encode($data->is_confirm_system); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_confirm_debit_object')); ?>:</b>
	<?php echo CHtml::encode($data->is_confirm_debit_object); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_confirm_credit_object')); ?>:</b>
	<?php echo CHtml::encode($data->is_confirm_credit_object); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_confirm_admin')); ?>:</b>
	<?php echo CHtml::encode($data->is_confirm_admin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('debit_wallet_credit_before')); ?>:</b>
	<?php echo CHtml::encode($data->debit_wallet_credit_before); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('debit_wallet_credit_after')); ?>:</b>
	<?php echo CHtml::encode($data->debit_wallet_credit_after); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('debit_wallet_debit_before')); ?>:</b>
	<?php echo CHtml::encode($data->debit_wallet_debit_before); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('debit_wallet_debit_after')); ?>:</b>
	<?php echo CHtml::encode($data->debit_wallet_debit_after); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('debit_wallet_balance_before')); ?>:</b>
	<?php echo CHtml::encode($data->debit_wallet_balance_before); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('debit_wallet_balance_after')); ?>:</b>
	<?php echo CHtml::encode($data->debit_wallet_balance_after); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('credit_wallet_credit_before')); ?>:</b>
	<?php echo CHtml::encode($data->credit_wallet_credit_before); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('credit_wallet_credit_after')); ?>:</b>
	<?php echo CHtml::encode($data->credit_wallet_credit_after); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('credit_wallet_debit_before')); ?>:</b>
	<?php echo CHtml::encode($data->credit_wallet_debit_before); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('credit_wallet_debit_after')); ?>:</b>
	<?php echo CHtml::encode($data->credit_wallet_debit_after); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('credit_wallet_balance_before')); ?>:</b>
	<?php echo CHtml::encode($data->credit_wallet_balance_before); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('credit_wallet_balance_after')); ?>:</b>
	<?php echo CHtml::encode($data->credit_wallet_balance_after); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('guid')); ?>:</b>
	<?php echo CHtml::encode($data->guid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_at')); ?>:</b>
	<?php echo CHtml::encode($data->created_at); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_by')); ?>:</b>
	<?php echo CHtml::encode($data->created_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_ip')); ?>:</b>
	<?php echo CHtml::encode($data->created_ip); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modified_at')); ?>:</b>
	<?php echo CHtml::encode($data->modified_at); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modified_by')); ?>:</b>
	<?php echo CHtml::encode($data->modified_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modified_ip')); ?>:</b>
	<?php echo CHtml::encode($data->modified_ip); ?>
	<br />

	*/ ?>

</div>