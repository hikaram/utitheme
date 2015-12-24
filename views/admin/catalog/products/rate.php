<?php
$this->breadcrumbs[Yii::t('app', 'Панель управления')] = array('/admin');
$this->breadcrumbs[Yii::t('app', 'Управление продукцией')] = array('/admin/catalog');
$this->breadcrumbs[Yii::t('app', 'Настройка курса баллов по отношению к валюте')] = array('update', 'id' => $model->id);

$path = Yii::app()->assetManager->publish($this->module->getBasePath() . DIRECTORY_SEPARATOR . 'css') . '/';

Yii::app()->clientScript->registerCssFile(
    $path . 'style.css', 'screen'
);
?>

<?php $form = $this->beginWidget('CActiveForm', array('enableAjaxValidation' => false)); ?>
<div class="portlet box green">
	<div class="portlet-title">
		<h3 class="caption"><i class="fa fa-btc"></i> <?=Yii::t('app', 'Настройка курса баллов по отношению к валюте')?></h3>
	</div>
	
	<div class="portlet-body  form form-horizontal">
		<div class="form-body">
				<div class="form-group" style="margin-top: 20px;">
					<div class = "col-md-3 control-label"><?= Yii::t('app', 'Стоимость одного балла в валюте проекта'); ?></div>
					<div class="col-md-9">
						<?=$form->textField($model, 'config_value', array('class' => 'form-control input-inline input-large'))?>
						<span class="help-block text-danger"><?=$form->error($model, 'config_value')?></span>
					</div>
				</div>
		</div>
	
		<div class="form-actions">
			<?= CHtml::submitButton(Yii::t('app', 'Сохранить'), array('name' => 'btn_rate', 'class' => 'btn green')); ?>
		</div>
	</div>
</div>
<?php $this->endWidget(); ?>
