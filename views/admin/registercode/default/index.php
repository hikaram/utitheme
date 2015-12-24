<?php
$this->breadcrumbs = array(
    Yii::t('app', 'Панель управления') => array('/admin'),
    Yii::t('app', 'Добавление кода') => array('index'),
);
?>
<? if(empty($dataProvider)) :?>
	<div class="note note-success">
		<?=Yii::t('app', 'Коды еще не созданы')?>.
		Вы можете <?=CHtml::link(Yii::t('app', 'добавить код'), $this->createUrl('create'))?>.
	</div>
<? else : ?>
<div class="portlet box yellow">
	<div class="portlet-title">
		<h3 class="caption"><i class="fa fa-code" style="margin-right: 10px;"></i> <?=Yii::t('app', 'Список кодов')?></h3>
	</div>
	<div class="portlet-body">
		<div class="table-scrollable">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Id</th>
						<th><?=Yii::t('app', 'Описание')?></th>
						<th><?=Yii::t('app', 'Позиция')?></th>
						<th><?=Yii::t('app', 'Активен')?></th>
						<th><?=Yii::t('app', 'Действия')?></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($dataProvider as $item):?>
						<tr>
							<td><?=CHtml::encode($item->id); ?></td>
							<td><?=CHtml::encode($item->description); ?></td>
							<td><?=CHtml::encode($this->printData('position_alias', $item->position_alias)); ?></td>
							<td><?= CHtml::encode($this->printData('is_active', $item->is_active)) ?></td>
							<td>
							 	<?=CHtml::link('<i class="glyphicon glyphicon-eye-open"></i>', '/admin/registercode/default/view/id/'. $item->id, array('class' => 'btn blue-steel'))?>
								<?=CHtml::link('<i class="glyphicon glyphicon-pencil"></i>', '/admin/registercode/default/update/id/' . $item->id, array('class' => 'btn green-seagreen')); ?>
								<?=CHtml::link('<i class="glyphicon glyphicon-remove"></i>', 'javascript:void(0)', array('class' => 'btn red', 'onclick' => 'if (confirm("Удалить код?")) location.href = "/admin/registercode/default/delete/id/' . $item->id . '"; else return false;')); ?>
							</td>
						</tr>
					<? endforeach; ?>
				</tbody>
			</table>
		</div>
		<? $this->widget('CLinkPager', array(
			'pages' => $pages,
			'nextPageLabel' => '<i class="fa fa-angle-double-right"></i>', 
			'prevPageLabel' => '<i class="fa fa-angle-double-left"></i>', 
			'header' => '', 
			'htmlOptions' => array(
				'class' => 'pagination'
			)
		)) ?>
	</div>
</div>
<?=CHtml::link(Yii::t('app', 'Добавить код'), $this->createUrl('create'));?>
<? endif; ?>