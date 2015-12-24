<?php
$this->breadcrumbs=array(
	'Панель управления' => array('index'),
	'Загруженные' => array('uploaded'),
    'Подготовка к установке' => array('prepare', 'name' => $package['info']['name'], 'version' => $package['info']['version'])
);
?>

<div class="row">
	<div class="col-md-6">
		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'packages-form',
			'enableAjaxValidation'=>false,
		)); ?>

		<? if ($modelPackages->hasErrors()) : ?>
		<div class="alert alert-danger">
		<?php echo $form->errorSummary($modelPackages); ?>
		</div>
		<? endif; ?>
		
		<!-- BEGIN SAMPLE FORM PORTLET-->
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="icon-puzzle"></i> Установка пакета
				</div>
			</div>
			<div class="portlet-body form">

					<div class="form-body">
						<div class="form-group <? if($modelPackages->hasErrors('name')) : ?>has-error<? endif; ?>">
							<?=$form->labelEx($modelPackages, 'name')?>
							<?=$form->textField($modelPackages, 'name', array('class' => 'form-control', 'readonly' => 'readonly'))?>
						</div>
						<div class="form-group <? if($modelPackages->hasErrors('version')) : ?>has-error<? endif; ?>">
							<?=$form->labelEx($modelPackages, 'version')?>
							<?=$form->textField($modelPackages, 'version', array('class' => 'form-control', 'readonly' => 'readonly'))?>
						</div>
					</div>
					<div class="form-actions">
						<?=CHtml::submitButton('Установить', array('class' => 'btn green'))?>
					</div>
			</div>
		</div>
	</div>
	<?php $this->endWidget(); ?>
</div>


