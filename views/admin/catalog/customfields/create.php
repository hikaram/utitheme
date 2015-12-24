<?php
    $this->breadcrumbs[Yii::t('app', 'Панель управления')] = array('/admin');
    $this->breadcrumbs[Yii::t('app', 'Управление продукцией')] = array('/admin/catalog');
    $this->breadcrumbs[Yii::t('app', 'Настраиваемые поля продуктов')] = array('index');
    $this->breadcrumbs[Yii::t('app', 'Создание нового поля')] = array('create');

    $form=$this->beginWidget('CActiveForm', array(
        'id'=>'custom-fields-form',
        'enableAjaxValidation'=>false,
    ));    
?>

    <div class="note note-info">
        <i class="fa fa-info" style="margin-right: 10px;"></i> <?=Yii::t('app', 'Поля помеченные')?> <span class="required">*</span> <?=Yii::t('app', 'обязательны к заполнению.')?>
    </div>

    <?=$form->errorSummary($model, '<div class="note note-danger"><i class="fa fa-warning" style="margin-right: 10px;"></i> ' . Yii::t('app', 'Необходимо исправить следующие ошибки') . ':', '</div>', ['style' => 'display: inline-table;'])?>

    <div class="portlet box green">
    	<div class="portlet-title">
    		<h3 class="caption"><i class="fa fa-gear" style="margin-right: 10px;"></i> <?=Yii::t('app', 'Создание нового поля')?></h3>
    	</div>

    	<div class="portlet-body form form-horizontal">
    		<?php echo $this->renderPartial('_form', array('model'=>$model, 'form' => $form)); ?>
    	
    </div>

<?php $this->endWidget(); ?>