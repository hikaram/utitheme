<?php
    $this->breadcrumbs[Yii::t('app', 'Панель управления')] = array('/admin');
    $this->breadcrumbs[Yii::t('app', 'Каталоги')] = array('index');
    $this->breadcrumbs[Yii::t('app', 'Редактирование каталога') . ' №' . $model->id] = array('update', 'id' => $model->id);
?>

<?php echo $this->renderPartial('_form'); ?>
