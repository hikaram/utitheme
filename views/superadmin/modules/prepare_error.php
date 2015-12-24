<?php
$this->breadcrumbs=array(
	'Панель управления' => array('index'),
	'Загруженные' => array('uploaded'),
    'Подготовка к установке' => array('prepare', 'name' => $module['info']['name'], 'version' => $module['info']['version'])
);
?>

<?php foreach($errors as $error) : ?>
    <div class="alert alert-danger"><?=CHtml::encode($error)?></div>
<?php endforeach; ?>



