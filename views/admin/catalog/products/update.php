<?php
    $this->breadcrumbs[Yii::t('app', 'Панель управления')] = array('/admin');
    $this->breadcrumbs[Yii::t('app', 'Каталоги')] = array('catalogues/index');
    $this->breadcrumbs[Yii::t('app', 'Продукты')] = array('products/index');
    $this->breadcrumbs[Yii::t('app', 'Редактирование продукта')] = array('update', 'id' => $model->id);
    
    $path = Yii::app()->assetManager->publish($this->module->getBasePath() . DIRECTORY_SEPARATOR . 'css') . '/';

    Yii::app()->clientScript->registerCssFile(
        $path . 'style.css', 'screen' 
    );
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>