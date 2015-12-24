<?php

$this->breadcrumbs=array(
    'Панель управления' => array('/superadmin'),
    'Модули' => array('Modules/index'),
    'Загруженные' => array('uploaded'),
);

?>

<div class="row">
<div class="col-md-12 col-sm-12">

<?php $i = 1; ?>
<?php if(count($modules) == 0) : ?>
<div class="alert alert-info">
	Загруженные модули не найдены.
</div>
<?php else : ?>
<!-- BEGIN EXAMPLE TABLE PORTLET-->
<div class="portlet box blue">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa icon-folder"></i>Модули.
		</div>
	</div>
	<div class="portlet-body">
		<table class="table table-striped table-bordered table-hover" id="sample_2">
		<thead>
		<tr>
			<th>п.№</th>
			<th>Название</th>
			<th>Версия</th>
			<th>Путь</th>
			<th>Краткое описание</th>
			<th>Действия</th>
		</tr>
		</thead>
		<tbody>
		<?php foreach($modules as $module) : ?>
        <?php $info = $module['info'] ?>
        <tr class="odd gradeX">
            <td><?=$i++?></td>
            <td><?=$info['name']?></td>
            <td><?=CHtml::encode($info['version'])?></td>
			<td><?=$info['path']?></td>
			<td><?=$info['brief_description']?></td>
            <td>
				<a title="Описание" class="glyphicon glyphicon-info-sign" href="<?=$this->createUrl('description', array('name' => $info['name'], 'version' => $info['version']))?>"></a>
				<a title="Установить" class="glyphicon glyphicon-save" href="<?=$this->createUrl('install', array('name' => $info['name'], 'version' => $info['version'], 'step' => '0', 'token' => $this->getToken()))?>"></a>
			</td>
        </tr>
        <?php endforeach; ?>
		</tbody>
		</table>
	</div>
</div>
<!-- END EXAMPLE TABLE PORTLET-->
<?php endif;?>
</div>
</div>