<?php
    $this->breadcrumbs[Yii::t('app', 'Панель управления')] = array('/admin');
    $this->breadcrumbs[Yii::t('app', 'Управление продукцией')] = array('/admin/catalog');
    $this->breadcrumbs[Yii::t('app', 'Включение/отключение баллов продуктов')] = array('update', 'id' => $model->id);
    
    $path = Yii::app()->assetManager->publish($this->module->getBasePath() . DIRECTORY_SEPARATOR . 'css') . '/';

    Yii::app()->clientScript->registerCssFile(
        $path . 'style.css', 'screen' 
    );
?>
<div class="portlet box yellow">
	<div class="portlet-title">
		<h3 class="caption"><i class="fa fa-btc"></i> <?=Yii::t('app', 'Баллы для продуктов')?></h3>
	</div>
	
	<div class="portlet-body">
		<p class="note note-info">
			<?php if($model->config_value == (int)TRUE) : ?>
				<i class="fa fa-info" style="margin-right: 10px;"></i> <?=Yii::t('app', 'Баллы для продуктов включены')?>
			<?php else : ?>
				<i class="fa fa-info" style="margin-right: 10px;"></i> <?=Yii::t('app', 'Баллы для продуктов выключены')?>
			<?php endif; ?>
		</p>
		<?php $form=$this->beginWidget('CActiveForm', array('enableAjaxValidation'=>false)); ?>
		<div class="form-actions">
			<?=CHtml::submitButton(Yii::t('app', 'Включить баллы для продуктов'), array('name'=>'points_on', 'class' => 'btn green')); ?>
			<?=CHtml::submitButton(Yii::t('app', 'Выключить баллы для продуктов'), array('name'=>'points_off', 'class' => 'btn red')); ?>
		</div>
		<?php $this->endWidget(); ?>
	</div>
</div>