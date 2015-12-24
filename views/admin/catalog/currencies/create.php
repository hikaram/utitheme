<?php
    $this->breadcrumbs[Yii::t('app', 'Панель управления')] = array('/admin');
    $this->breadcrumbs[Yii::t('app', 'Управление продукцией')] = array('/admin/catalog');
    $this->breadcrumbs[Yii::t('app', 'Валюты')] = array('index');
    $this->breadcrumbs[Yii::t('app', 'Создание новой валюты')] = array('create');
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>