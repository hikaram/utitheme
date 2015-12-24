<div class="row">
	<div class="col-md-12">
		<!-- BEGIN EXAMPLE TABLE PORTLET-->
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-folder"></i>Модули
				</div>
			</div>
			<div class="portlet-body">
				<table class="table table-striped table-bordered table-hover" id="objects">
				<thead>
					<tr>
						<th>Ун.№</th>
						<th>Путь</th>
						<th>Название</th>
						<th>Активный</th>
						<th>Краткое описание</th>
						<th>Версия</th>
						<th>Действия</th>
					</tr>
				</thead>
				<tbody>
<?php foreach($modelsModules as $modelModule) :?>
			<tr class="odd gradeX">
								<td><?=$modelModule->id?></td>
								<td><?=$modelModule->path?></td>
								<td><?=$modelModule->name?></td>
								<td>
									<?php if ((boolean)$modelModule->is_active == true) : ?>
									<span title="включен" class="true">&nbsp;</span>
									<?php else : ?>
									<span title="Выключен" class="false">&nbsp;</span>
									<?php endif; ?>
								</td>
								<td><?=$modelModule->brief_description?></td>
								<td><?=$modelModule->version?></td>
								<td>
								<a  class="glyphicon glyphicon-info-sign" href="<?=$this->createUrl('view', array('id' => $modelModule->id))?>"></a>
								<?php if (!(bool)$modelModule->is_active) : ?>
									<?=CHtml::form('', 'post', array('style' => 'display: inline'))?>
										<?=CHtml::linkButton('', array(
											'submit'=>array(
												'modules/include/',
												'id' => $modelModule->id,
												'active' => '1'
											),
											'class' => 'fa fa-power-off',
											'title' => 'Включить модуль',
											'params'=>array(
												Yii::app()->request->csrfTokenName => Yii::app()->request->csrfToken,
											),
											'confirm'=>"Включить модуль?"
										))?>
									<?=CHtml::endForm() ?>
								<?php endif; ?>

								<?php if ((bool)$modelModule->is_active) : ?>
								<?=CHtml::form('', 'post', array('style' => 'display: inline'))?>
									<?=CHtml::linkButton('', array(
										'submit'=>array(
											'modules/include/',
											'id' => $modelModule->id,
											'active' => '0'
										),
										'class' => 'fa fa-circle-o-notch',
										'title' => 'Отключить модуль',
										'params'=>array(
											Yii::app()->request->csrfTokenName => Yii::app()->request->csrfToken
										),
										'confirm'=>"Отключить модуль? Данное действие не приведет к удалению разделов из навигации"
									))?>
								<?=CHtml::endForm() ?>
								<?php endif; ?>
								<a class="fa  fa-cloud" href="<?=$this->createUrl('updates', array('id' => $modelModule->id))?>"></a>
								<a class="fa  fa-times" href="<?=$this->createUrl('preparedelete', array('id' => $modelModule->id))?>"></a>
							</td>
			</tr>
			<?php endforeach; ?>
				</tbody>
				</table>
			</div>
		</div>
		<!-- END EXAMPLE TABLE PORTLET-->
	</div>
</div>
<?

Yii::app()->clientScript->registerScriptFile(Yii::app()->params['hostMetronikStatic'] . '/public/assets/global/plugins/datatables/media/js/jquery.dataTables.min.js', CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->params['hostMetronikStatic'] . '/public/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js', CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->assetManager->publish(
        Yii::getPathOfAlias('application.modules.superadmin.js') . DIRECTORY_SEPARATOR . 'modules_installed.js'
    ),
CClientScript::POS_END);


Yii::app()->clientScript->registerCssFile(Yii::app()->params['hostMetronikStatic'] . '/public/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css');

?>

<script>
$(function(){
	TableManaged.init();
})	
</script>