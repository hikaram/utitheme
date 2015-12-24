<?php
$this->breadcrumbs=array(
	'Панель управления' => array('index'),
	'Список модулей' => array('Modules/index'),
);
?>

<?php if (empty($modulesNewUpdates)) : ?>
<div class="alert alert-info">
	Доступные для загрузки обновления не найдены
</div>
<?php else : ?>
<div class="row">
	<div class="col-md-12">
		<!-- BEGIN SAMPLE TABLE PORTLET-->
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="icon-cloud-download"></i>Доступные для загрузки обновления
				</div>
			</div>
			<div class="portlet-body">
				<div class="table-scrollable">
					<table class="table table-hover">
					<thead>
					<tr>
						<th>Версия</th>
						<th>Дата публикации</th>
						<th>Автор</th>
						<th>Email</th>
						<th>Действия</th>
					</tr>
					</thead>
					<tbody>
						<?php foreach($modulesNewUpdates as $moduleNewUpdate) : ?>
						<tr>
							<td><?=$moduleNewUpdate['info']['version']?></td>
							<td><?=$moduleNewUpdate['info']['publication_date']?></td>
							<td><?=$moduleNewUpdate['info']['author']?></td>
							<td><?=$moduleNewUpdate['info']['email']?></td>
							<td>
								<?php if ((bool)$modelModule->is_active) : ?>
								<?=CHtml::form('', 'post')?>
									<?=CHtml::linkButton('Загрузить', array(
										'submit'=>array(
											'download',
										),
										'params'=>array(
											Yii::app()->request->csrfTokenName => Yii::app()->request->csrfToken,
											'btnDownload' => 'download',
											'name' => $moduleNewUpdate['info']['name'],
											'version' => $moduleNewUpdate['info']['version'],
										),
										'confirm'=>"Загрузить модуль?"
									))?>
									<?=CHtml::linkButton('Загрузить и обновить', array(
										'submit'=>array(
											'modules/download/isAuto/' . ModulesController::installTypeUpdate . '/updatedModule/' . $modelModule->id,
										),
										'params'=>array(
											Yii::app()->request->csrfTokenName => Yii::app()->request->csrfToken,
											'btnDownload' => 'download',
											'name' => $moduleNewUpdate['info']['name'],
											'version' => $moduleNewUpdate['info']['version'],
										),
										'confirm'=>"Загрузить и обновить модуль?"
									))?>
								<?=CHtml::endForm() ?>
								<?php endif; ?>            
							</td>
						</tr>
						<?php endforeach; ?>
					</tbody>
					</table>
				</div>
			</div>
		</div>
		<!-- END SAMPLE TABLE PORTLET-->
	</div>
</div>
<?php endif; ?>

<?php if (empty($modulesUpdates)) : ?>
Загруженные обновления не найдены
<?php else : ?>
<div class="row">
	<div class="col-md-12">
		<!-- BEGIN SAMPLE TABLE PORTLET-->
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="icon-drawer"></i>Загруженные обновления
				</div>
			</div>
			<div class="portlet-body">
				<div class="table-scrollable">
					<table class="table table-hover">
					<thead>
					<tr>
						<th>Версия</th>
						<th>Дата публикации</th>
						<th>Автор</th>
						<th>Email</th>
						<th>Действия</th>
					</tr>
					</thead>
					<tbody>
					    <?php foreach($modulesUpdates as $moduleUpdate) : ?>
						<tr>
							<td>
								<?=$moduleUpdate['info']['version']?>
								<? if ($moduleUpdate['info']['name'] !== $modelModule->name) : ?>&nbsp;&nbsp;- Адаптивный модуль (<?=$moduleUpdate['info']['name']?>)<? endif; ?>
							</td>
							<td><?=$moduleUpdate['info']['publication_date']?></td>
							<td><?=$moduleUpdate['info']['author']?></td>
							<td><?=$moduleUpdate['info']['email']?></td>
							<td>
								<?php if ((bool)$modelModule->is_active) : ?>
								<?=CHtml::form('', 'post')?>
									<?=CHtml::linkButton('Обновить', array(
										'submit'=>array(
											'modules/prepareupdate/',
											'id' => $modelModule->id,
										),
										'params'=>array(
											Yii::app()->request->csrfTokenName => Yii::app()->request->csrfToken,
											'version' => $moduleUpdate['info']['version'],
											'name' => $moduleUpdate['info']['name'],
											'btnUpdate' => 'update'
										),
										'confirm'=>"Обновить модуль?"
									))?>
								<?=CHtml::endForm() ?>
								<?php endif; ?>            
							</td>
						</tr>
						<?php endforeach; ?>
					</tbody>
					</table>
				</div>
			</div>
		</div>
		<!-- END SAMPLE TABLE PORTLET-->
	</div>
</div>
<?php endif; ?>