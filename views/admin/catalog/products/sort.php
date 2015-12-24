<?php
    $this->breadcrumbs[Yii::t('app', 'Панель управления')] = array('/admin');
    $this->breadcrumbs[Yii::t('app', 'Управление продукцией')] = array('/admin/catalog');
    $this->breadcrumbs[Yii::t('app', 'Продукты')] = array('product/index');
    $this->breadcrumbs[Yii::t('app', 'Управление списком продукции')] = array('sort');
?>

<div class="portlet box green">
	<div class="portlet-title">
		<h3 class="caption"><i class="fa fa-cubes"></i> <?= $this->pageTitle ?></h3>
	</div>
	<div class="portlet-body form form-horizontal">
	<?php
		$form = $this->beginWidget('CActiveForm', array(
		    'id' => 'catalogues-form',
		    'enableAjaxValidation' => false,
		    ));
		?>	
			<div class="form-body">
				<? /*
				<div class="form-group" style="margin-top: 20px;">
					<?= $form->labelEx($model, 'sort_by_catalogues', array('class' => 'col-md-3 control-label'))?>
					<div class="col-md-9">
						<?php
							echo $form->checkBox($model, 'sort_by_catalogues', array());
						?>
						<span class="help-block text-danger"><?=$form->error($model, 'sort_by_catalogues')?></span>
					</div>
				</div>
				<div class="form-group" style="margin-top: 20px;">
					<?= $form->labelEx($model, 'sort_by_price', array('class' => 'col-md-3 control-label'))?>
					<div class="col-md-9">
						<?php
							$accountStatus = array('1'=>'Возрастание', '2'=>'Убывание', '0'=>'Не сортировать');
							echo $form->radioButtonList($model,'sort_by_price',$accountStatus,array('separator'=>' '));
						?>
						<span class="help-block text-danger"><?=$form->error($model, 'sort_by_price')?></span>
					</div>
				</div>
				*/ ?>

				<div class="form-group" style="margin-top: 20px;">
					<?= $form->labelEx($model, 'is_reviews', array('class' => 'col-md-3 control-label'))?>
					<div class="col-md-9">
						<?=CHtml::activeCheckBox($model, 'is_reviews', array('class' => 'make-switch', 'data-on-text' => Yii::t('app', 'ВКЛ.'), 'data-off-text' => Yii::t('app', 'ВЫКЛ.'), 'data-on-color' => 'success', 'data-off-color' => 'danger'))?>
					</div>
				</div>

				<div class="form-group" style="margin-top: 20px;">
					<?= $form->labelEx($model, 'is_reviews_for_guest', array('class' => 'col-md-3 control-label'))?>
					<div class="col-md-9">
						<?=CHtml::activeCheckBox($model, 'is_reviews_for_guest', array('class' => 'make-switch', 'data-on-text' => Yii::t('app', 'ВКЛ.'), 'data-off-text' => Yii::t('app', 'ВЫКЛ.'), 'data-on-color' => 'success', 'data-off-color' => 'danger'))?>
					</div>
				</div>

				<div class="form-group" style="margin-top: 20px;">
					<?= $form->labelEx($model, 'is_set_points', array('class' => 'col-md-3 control-label'))?>
					<div class="col-md-9">
						<?=CHtml::activeCheckBox($model, 'is_set_points', array('class' => 'make-switch', 'data-on-text' => Yii::t('app', 'ВКЛ.'), 'data-off-text' => Yii::t('app', 'ВЫКЛ.'), 'data-on-color' => 'success', 'data-off-color' => 'danger'))?>
					</div>
				</div>

				<div class="form-group" style="margin-top: 20px;">
					<?= $form->labelEx($model, 'is_set_points_for_guest', array('class' => 'col-md-3 control-label'))?>
					<div class="col-md-9">
						<?=CHtml::activeCheckBox($model, 'is_set_points_for_guest', array('class' => 'make-switch', 'data-on-text' => Yii::t('app', 'ВКЛ.'), 'data-off-text' => Yii::t('app', 'ВЫКЛ.'), 'data-on-color' => 'success', 'data-off-color' => 'danger'))?>
					</div>
				</div>

				<div class="form-actions">
					<?=CHtml::submitButton(Yii::t('app', 'Сохранить'), array('class' => 'btn green')); ?>
				</div>
			</div>
		<?php $this->endWidget(); ?>
	</div>
</div>
  
