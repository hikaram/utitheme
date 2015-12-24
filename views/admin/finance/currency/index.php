<?php
$this->breadcrumbs['Финансы'] = $this->createUrl('default/index');
$this->breadcrumbs['Валюты'] = $this->createUrl('index');
?>
<?php if(count($modelsFinanceCurrency) == 0) : ?>
<div class="note note-success">
	Валюты еще не созданы. Вы можете <a href="<?=$this->createUrl('create')?>">создать</a> сейчас.
</div>
<?php else : ?>
<div class="portlet box yellow">
	<div class="portlet-title">
		<h3 class="caption"><i class="fa fa-usd" style="margin-right: 10px;"></i> Список валют</h3>
	</div>
	<div class="portlet-body">
		<div class="table-scrollable">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Ун.№</th>
						<th>Псевдоним валюты</th>
						<th>Название</th>
						<th>Сокращение</th>
						<th>Основная</th>
						<th>Действия</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($modelsFinanceCurrency as $modelCurrency) :?>
					<tr>
						<td><?=$modelCurrency->id?></td>
						<td style="text-transform: uppercase;"><?=$modelCurrency->alias?></td>
						<td><?=$modelCurrency->title?></td>
						<td><?=$modelCurrency->abbreviation?></td>
						<td>
							<?php if ((boolean)$modelCurrency->is_main == true) : ?>
							<span title="Основная" class="true" style="color: #35aa47;">
								<i class="fa fa-check"></i>
							</span>
							<?php else : ?>
							<span title="Не основная" class="false" style="color: #d84a38;">
								<i class="fa fa-times"></i>
							</span>
							<?php endif; ?>
						</td>
						<td>
							<a href="<?=$this->createUrl('view', array('id' => $modelCurrency->id)) ?>" class="btn blue-steel">
								<i class="glyphicon glyphicon-eye-open"></i>
							</a>
							<a href="<?=$this->createUrl('update', array('id' => $modelCurrency->id)) ?>" class="btn green-seagreen">
								<i class="glyphicon glyphicon-pencil"></i>
							</a>
							<?=CHtml::form('', 'post', array('class'=>'btn', 'style'=>'padding: 0;'))?>
								<?=CHtml::linkButton('<button class="btn red"><i class="glyphicon glyphicon-remove"></i></button>', array(
									'submit'=>array(
										'delete',
										'id' => $modelCurrency->id,
									),
									'params'=>array(
										Yii::app()->request->csrfTokenName => Yii::app()->request->csrfToken
									),
									'confirm'=>"Удалить данную валюту? Данное действие может привести к невозможности выполнять финаносовые операции."
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
<a href="<?=$this->createUrl('create')?>">Создать валюту</a>
<?php endif; ?>