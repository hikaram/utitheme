<?php
$this->breadcrumbs=array(
	'Панель управления' => array('index'),
	'Загруженные' => array('uploaded'),
    'Подготовка к установке' => array('prepare', 'name' => $package['info']['name'], 'version' => $package['info']['version'])
);
?>

<?php foreach($errors as $error) : ?>
    <div class="alert alert-danger"><?=CHtml::encode($error)?></div>
<?php endforeach; ?>