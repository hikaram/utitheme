<?php
$this->breadcrumbs['Финансы'] = $this->createUrl('default/index');
$this->breadcrumbs['Назначения'] = $this->createUrl('index');
?>

<?php if(count($modelsWalletsPurpose) == 0) : ?>
<div class="note note-success">
	Назначения кошельков еще не созданы. Вы можете <a href="<?=$this->createUrl('create')?>">создать</a>.
</div>
<?php else : ?>
<div class="portlet box yellow">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa fa-credit-card" style="margin-right: 10px;"></i> Назначения кошельков
		</div>
	</div>
	<div class="portlet-body">
		<div class="table-scrollable">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Ун.№</th>
						<th>Псевдоним</th>
						<th>Название</th>
						<th>Основной</th>
						<th>Действия</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($modelsWalletsPurpose as $modelWalletsPurpose) : ?>
					<tr>
						<td><?=$modelWalletsPurpose->id?></td>
						<td><?=$modelWalletsPurpose->alias?></td>
						<td><?=$modelWalletsPurpose->title?></td>
						<td>
							<?php if ((boolean)$modelWalletsPurpose->is_main == true) : ?>
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
							<a href="<?=$this->createUrl('view', array('id' => $modelWalletsPurpose->id))?>" class="btn blue-steel">
								<i class="glyphicon glyphicon-eye-open"></i>
							</a>
							<a href="<?=$this->createUrl('update', array('id' => $modelWalletsPurpose->id))?>" class="btn green-seagreen">
								<i class="glyphicon glyphicon-pencil"></i>
							</a>
							<?=CHtml::form('', 'post', array('class'=>'btn', 'style'=>'padding: 0;'))?>
								<?=CHtml::linkButton('<button class="btn red"><i class="glyphicon glyphicon-remove"></i></button>', array(
									'submit'=>array(
										'delete',
										'id' => $modelWalletsPurpose->id,
									),
									'params'=>array(
										Yii::app()->request->csrfTokenName => Yii::app()->request->csrfToken
									),
									'confirm'=>"Удалить данное назначение кошелька? Данное действие может привести к невозможности выполнять финаносовые операции."
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
<a href="<?=$this->createUrl('create')?>">Создать новое назначение кошелька.</a>
<?php endif; ?>