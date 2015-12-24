<?php
    $this->breadcrumbs[Yii::t('app', 'Панель управления')] = array('/admin');
    $this->breadcrumbs[Yii::t('app', 'Управление продукцией')] = array('/admin/catalog');
    $this->breadcrumbs[Yii::t('app', 'Каталоги')] = array('index');
    $this->breadcrumbs[Yii::t('app', 'Создание нового каталога')] = array('create');
?>

<?php echo $this->renderPartial('_form'); ?>
