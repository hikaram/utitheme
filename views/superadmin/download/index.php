<?php
    $this->breadcrumbs['Загрузка по сценарию'] = array('index');
?>
<div class="row">
	<div class="col-md-12">
		<!-- BEGIN SAMPLE FORM PORTLET-->
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="glyphicon glyphicon-save"></i> Загрузка и установка
				</div>
			</div>
			<div class="portlet-body form">
			<?=CHtml::beginForm('', 'post', array('enctype' => 'multipart/form-data'))?>
				<div class="form-body">
					<div class="form-group">
						<label>Загрузить компоненты списком</label>
						<?=CHtml::fileField('upload_modules_xml')?>
					</div>
					<div class="form-group">
						<?=CHtml::submitButton('Загрузить', array('name' => 'upload_modules_xml_button', 'class' => 'btn blue'))?>
					</div>
				</div>
			<?=CHtml::endForm()?>
			</div>
		</div>
	</div>
</div>
