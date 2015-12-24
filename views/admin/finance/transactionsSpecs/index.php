<?php
$this->breadcrumbs['Финансы'] = $this->createUrl('default/index');
$this->breadcrumbs['Спецификации операции'] = $this->createUrl('index');
?>

<?php if(count($models) == 0) : ?>
<div class="note note-success">
	Спецификации операций еще не созданы. Вы можете <a href="<?=$this->createUrl('create')?>">создать</a> сейчас.
</div>
<?php else : ?>
<div class="portlet box yellow">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa fa-bookmark-o" style="margin-right: 10px;"></i> Спецификации операций
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
						<?php foreach($modelsCurrency as $modelCurrency) : ?>
						<th><?=$modelCurrency->abbreviation?></th>
						<?php endforeach; ?>
						<th>Действия</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($models as $model) : ?>
					<tr>
						<td><?=CHtml::encode($model->id)?></td>
						<td><?=CHtml::encode($model->alias)?></td>
						<td><?=CHtml::encode($model->title)?></td>
						<?php foreach($modelsCurrency as $modelCurrency) : ?>
						<td>
							<?php if (array_key_exists($modelCurrency->alias, $model->modelsSpecsCurrency)) : ?>
							<?=$model->modelsSpecsCurrency[$modelCurrency->alias]->amount?>
							<?php else : ?>
							-
							<?php endif; ?>
						</td>
						<?php endforeach; ?>
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
									'confirm'=>"Удалить данную группу операции? Данное действие может привести к невозможности выполнять финаносовые операции."
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
<a href="<?=$this->createUrl('create')?>">Создать новую спецификацию операции.</a>
<?php endif; ?>