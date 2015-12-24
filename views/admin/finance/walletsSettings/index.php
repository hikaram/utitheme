<?php
$this->breadcrumbs['Финансы'] = $this->createUrl('default/index');
$this->breadcrumbs['Типы новых кошельков'] = $this->createUrl('index');
?>

<?php if (count($models) == 0) : ?>
<div class="note note-success">
	Нет созданных типов, вы можете <a href="<?=$this->createUrl('create')?>">создать</a> сейчас.
</div>
<? else : ?>
<div class="portlet box yellow">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa fa-tags" style="margin-right: 10px;"></i> Типы кошельков
		</div>
	</div>
	<div class="portlet-body">
		<div class="table-scrollable">
			<table class="table table-hover">
				<thead>
					<tr>
						<th><?=$modelEmpty->getAttributeLabel('id')?></th>
						<th><?=$modelEmpty->getAttributeLabel('type_alias')?></th>
						<th><?=$modelEmpty->getAttributeLabel('object_alias')?></th>
						<th><?=$modelEmpty->getAttributeLabel('purpose_alias')?></th>
						<th><?=$modelEmpty->getAttributeLabel('currency_alias')?></th>
						<th><?=$modelEmpty->getAttributeLabel('status_alias')?></th>
						<th><?=$modelEmpty->getAttributeLabel('balance')?></th>
						<th><?=$modelEmpty->getAttributeLabel('credit')?></th>
						<th><?=$modelEmpty->getAttributeLabel('credit_unapproved')?></th>
						<th><?=$modelEmpty->getAttributeLabel('debit')?></th>
						<th><?=$modelEmpty->getAttributeLabel('debit_unapproved')?></th>
						<th>Действия</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($models as $model) : ?>
					<tr>
						<td><?=CHtml::encode($model->id)?></td>
						<td><?php $type = $model->getTypesAlias(); echo CHtml::encode($type[$model->type_alias])?></td>
						<td><?=CHtml::encode($model->object->title)?></td>
						<td><?=CHtml::encode($model->purpose->title)?></td>
						<td><?=CHtml::encode($model->currency->title)?></td>
						<td><?=CHtml::encode($model->status->title)?></td>
						<td><?=CHtml::encode($model->balance)?></td>
						<td><?=CHtml::encode($model->credit)?></td>
						<td><?=CHtml::encode($model->credit_unapproved)?></td>
						<td><?=CHtml::encode($model->debit)?></td>
						<td><?=CHtml::encode($model->debit_unapproved)?></td>
						<td>
							<a href="<?=$this->createUrl('view', array('id' => $model->id))?>" class="btn blue-steel">
								<i class="glyphicon glyphicon-eye-open"></i>
							</a>
							<a href="<?=$this->createUrl('update', array('id' => $model->id))?>" class="btn green-seagreen">
								<i class="glyphicon glyphicon-pencil"></i>
							</a>
							<?=CHtml::form('', 'post', array('class'=>'btn', 'style'=>'padding: 0;'))?>
								<?=CHtml::linkButton('<button class="btn red"><i class="glyphicon glyphicon-remove"></i></button>', array(
									'submit'=>array(
										'delete',
										'id' => $model->id,
									),
									'params'=>array(
										Yii::app()->request->csrfTokenName => Yii::app()->request->csrfToken
									),
									'confirm'=>"Удалить данную тип кошелька? Данное действие может привести к невозможности выполнять финаносовые операции."
								))?>
							<?=CHtml::endForm() ?>
						</td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<a href="<?=$this->createUrl('create')?>">Cоздать новый тип</a>
<?php endif; ?>