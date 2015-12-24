<?php
$this->breadcrumbs['Финансы'] = $this->createUrl('default/index');
$this->breadcrumbs['Статусы новых кошельков'] = $this->createUrl('index');
?>

<?php if (count($models) == 0) : ?>
<div class="note note-success">
	Статусы еще не созданы, вы можете <a href="<?=$this->createUrl('create')?>">создать</a> его сейчас.
</div>
<?php else : ?>
<div class="portlet box yellow">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa fa-refresh"></i> Назначения кошельков
		</div>
	</div>
	<div class="portlet-body">
		<div class="table-scrollable">
			<table class="table table-hover">
				<thead>
					<tr>
						<th><?=$modelEmpty->getAttributeLabel('id')?></th>
						<th><?=$modelEmpty->getAttributeLabel('alias')?></th>
						<th><?=$modelEmpty->getAttributeLabel('title')?></th>
						<th>Действия</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($models as $model) : ?>
					<tr>
						<td><?=CHtml::encode($model->id)?></td>
						<td><?=CHtml::encode($model->alias)?></td>
						<td><?=CHtml::encode($model->title)?></td>
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
									'confirm'=>"Удалить данный статус кошелька?"
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
<a href="<?=$this->createUrl('create')?>">Cоздать новый статус</a>
<?php endif; ?>

