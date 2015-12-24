<?php
    $this->breadcrumbs[Yii::t('app', 'Панель управления')] = array('/admin');
    $this->breadcrumbs[Yii::t('app', 'Управление продукцией')] = array('/admin/catalog');
    $this->breadcrumbs[Yii::t('app', 'Настраиваемые поля продуктов')] = array('index');
    $this->breadcrumbs[Yii::t('app', 'Редактирование поля') . ' №' . $model->id] = array('update', 'id' => $model->id);

    $form=$this->beginWidget('CActiveForm', array(
        'id'=>'custom-fields-form',
        'enableAjaxValidation'=>false,
    ));     
?>

    <div class="note note-info">
        <i class="fa fa-info" style="margin-right: 10px;"></i> <?=Yii::t('app', 'Поля помеченные')?> <span class="required">*</span> <?=Yii::t('app', 'обязательны к заполнению.')?>
        <? if ($model->productCount() > (int)FALSE) : ?>
            <br />
            <?=Yii::t('app', 'Данное поле назначено определенным товарам (количество товаров')?>: <?=$model->productCount()?>). 
            <?=Yii::t('app', 'Для того, чтобы иметь возможность полностью редактировать данное настраиваемое поле, необходимо убрать данное поле у всех назначенных товаров')?>.
        <? endif; ?>
    </div>

    <?=$form->errorSummary($model, '<div class="note note-danger"><i class="fa fa-warning" style="margin-right: 10px;"></i> ' . Yii::t('app', 'Необходимо исправить следующие ошибки') . ':', '</div>', ['style' => 'display: inline-table;'])?>


    <div class="portlet box green">
    	<div class="portlet-title">
    		<h3 class="caption"><i class="fa fa-gear" style="margin-right: 10px;"></i> <?=Yii::t('app', 'Редактирование поля')?></h3>
    	</div>

    	<div class="portlet-body form form-horizontal">
    		<?php echo $this->renderPartial('_form', array('model'=>$model, 'form' => $form)); ?>
    </div>

<?php $this->endWidget(); ?>