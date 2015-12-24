<?php

$this->breadcrumbs=array(
	'Панель управления' => array('index'),
	'Загруженные' => array('uploaded'),
);

?>
<?php $i = 1; ?>
<?php if(count($packages) == 0) : ?>
<div class="alert alert-info">
Загруженные пакеты не найдены.
</div>
<?php else : ?>
<!-- BEGIN EXAMPLE TABLE PORTLET-->
<div class="portlet box blue">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa icon-puzzle"></i>Пакеты.
		</div>
	</div>
	<div class="portlet-body">
		<table class="table table-striped table-bordered table-hover" id="sample_2">
		<thead>
		<tr>
			<th>п.№</th>
			<th>Название</th>
			<th>Версия</th>
			<th>Краткое описание</th>
			<th>Действия</th>
		</tr>
		</thead>
		<tbody>
		<?php foreach($packages as $package) : ?>
        <?php $info = $package['info'] ?>
        <tr class="odd gradeX">
            <td><?=$i++?></td>
            <td><?=$info['name']?></td>
            <td><?=CHtml::encode($info['version'])?></td>
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