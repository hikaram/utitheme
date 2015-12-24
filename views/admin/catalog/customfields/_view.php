<?php
/* @var $this CustomFieldsController */
/* @var $data CustomFields */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('field_format')); ?>:</b>
	<?php echo CHtml::encode($data->field_format); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('possible_values')); ?>:</b>
	<?php echo CHtml::encode($data->possible_values); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('regexp')); ?>:</b>
	<?php echo CHtml::encode($data->regexp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('min_length')); ?>:</b>
	<?php echo CHtml::encode($data->min_length); ?>
	<br />

	
</div>