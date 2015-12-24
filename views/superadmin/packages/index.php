<div class="row">
	<div class="col-md-12">
		<!-- BEGIN EXAMPLE TABLE PORTLET-->
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-folder"></i>Пакеты
				</div>
			</div>
			<div class="portlet-body">
				<table class="table table-striped table-bordered table-hover" id="objects">
				<thead>
					<tr>
						<th>Ун.№</th>
						<th>Название</th>
						<th>Краткое описание</th>
						<th>Версия</th>
						<th>Действия</th>
					</tr>
				</thead>
				<tbody>
<?php foreach($modelsPackages as $modelPackage) :?>
			<tr class="odd gradeX">
								<td><?=$modelPackage->id?></td>
								<td><?=$modelPackage->name?></td>
								<td><?=$modelPackage->brief_description?></td>
								<td><?=$modelPackage->version?></td>
								<td>
								<a  class="glyphicon glyphicon-info-sign" href="<?=$this->createUrl('view', array('id' => $modelPackage->id))?>"></a>
								<a class="fa  fa-cloud" href="<?=$this->createUrl('updates', array('id' => $modelPackage->id))?>"></a>
								<a class="fa  fa-times" href="<?=$this->createUrl('preparedelete', array('id' => $modelPackage->id))?>"></a>
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
        Yii::getPathOfAlias('application.modules.superadmin.js') . DIRECTORY_SEPARATOR . 'packages_installed.js'
    ),
CClientScript::POS_END);


Yii::app()->clientScript->registerCssFile(Yii::app()->params['hostMetronikStatic'] . '/public/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css');

?>

<script>
$(function(){
	TableManaged.init();
})	
</script>