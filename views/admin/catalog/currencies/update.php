<?php
    $this->breadcrumbs[Yii::t('app', 'Панель управления')] = array('/admin');
    $this->breadcrumbs[Yii::t('app', 'Каталоги')] = array('catalogues/index');
    $this->breadcrumbs[Yii::t('app', 'Валюты')] = array('index');
    $this->breadcrumbs[Yii::t('app', 'Редактирование валюты') . ' №' . $model->id] = array('update', 'id' => $model->id);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>