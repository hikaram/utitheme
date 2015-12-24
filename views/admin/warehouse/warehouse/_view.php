<?php
/* @var $this WarehouseController */
/* @var $data Warehouse */
?>



<tbody>
	<tr>
		<td><?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id' => $data->id)); ?></td>
		<td><?php echo CHtml::encode($data->name); ?></td>
		<td>
			<?php echo CHtml::link(Yii::t('app', 'Редактировать'), array('update', 'id' => $data->id)); ?>
			<?php echo CHtml::link(Yii::t('app', 'Удалить'), '#', array('class' => 'warehouse-delete', 'onClick' => 'warehouse_delete(' . $data->id . ')')); ?>
		</td>

	</tr>			

</tbody>


