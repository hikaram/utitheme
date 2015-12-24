<?php
$this->breadcrumbs=array(
	'Панель управления' => array('index'),
	'Загруженные' => array('uploaded'),
    'Подготовка к установке' => array('prepare', 'name' => $module['info']['name'], 'version' => $module['info']['version'])
);
?>


<div class="row">
	<div class="col-md-6">
		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'packages-form',
			'enableAjaxValidation'=>false,
		)); ?>

		<? if ($modelModules->hasErrors()) : ?>
		<div class="alert alert-danger">
		<?php echo $form->errorSummary($modelModules); ?>
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
						<div class="form-group <? if($modelModules->hasErrors('name')) : ?>has-error<? endif; ?>">
							<?=$form->labelEx($modelModules, 'name')?>
							<?=$form->textField($modelModules, 'name', array('class' => 'form-control', 'readonly' => 'readonly'))?>
						</div>
						
						<div class="form-group <? if($modelModules->hasErrors('version')) : ?>has-error<? endif; ?>">
							<?=$form->labelEx($modelModules, 'version')?>
							<?=$form->textField($modelModules, 'version', array('class' => 'form-control', 'readonly' => 'readonly'))?>
						</div>
						
						
						<div class="form-group <? if($modelModules->hasErrors('is_active')) : ?>has-error<? endif; ?>">
							<div class="checkbox-list">
								<label>
									<?=$form->checkBox($modelModules, 'is_active')?>
									<?=$modelModules->getAttributeLabel('is_active')?>
								</label>
							</div>
						</div>
						
						<div class="form-group <? if($modelModules->hasErrors('path')) : ?>has-error<? endif; ?>">
							<?=$form->labelEx($modelModules, 'path')?>
							<?=$form->textField($modelModules, 'path', array('class' => 'form-control'))?>
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



