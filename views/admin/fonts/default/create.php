<p class="note note-danger">
	<i style="margin-right: 10px;" class="fa fa-warning"></i><?=Yii::t('app', 'Поля с')?> <span class="required">*</span> <?=Yii::t('app', 'обязательно должны быть заполнены.')?></p>

<div class="error-summary" style="color:#a94442;"><?=CHtml::errorSummary(array($model)); ?></div>

<div class="pad"></div>
<div class="row">
    <div class="col-md-6">
		<div class="portlet box green-meadow">
			<div class="portlet-title">
				<div class="caption">
				<? if ($action_page == 1) : ?>
					<i class="fa fa-plus"></i>Добавление шрифта
				<? elseif ($action_page == 0) : ?>
					<i class="fa fa-pencil"></i>Редактирование шрифта
				<? endif; ?>
				</div>
			</div>
			<div class="portlet-body form">
				
				<?=CHtml::beginForm('', 'post', array('enctype' => 'multipart/form-data')) ?>
						<div class="form-body ">
							<div class="form-group ">
							<? $fontswriting_array = array();
										$fontswriting_object = FontsWriting::model()->findAll();
										foreach ($fontswriting_object as $key => $value)
										{
											$fontswriting_array[$value->id] = $value->lang->title;
										} ?>
								<?=CHtml::activeLabelEx($model,'fonts_writing__id'); ?>
								<?=CHtml::activeListBox($model,'fonts_writing__id', $fontswriting_array, array('class' => 'normal form-control', 'size' => '0', 'style' => 'width: 250px;')); ?>                           
								<span class="help-block"></span>
							</div>
						</div>
						<div class="form-body ">
							<div class="form-group ">
							<? $fontscategory_array = array();
										$fontscategory_object = FontsCategory::model()->findAll();
										foreach ($fontscategory_object as $key => $value)
										{
											$fontscategory_array[$value->id] = $value->lang->title;
										} ?>
								<?=CHtml::activeLabelEx($model,'fonts_category__id'); ?>
								<?=CHtml::activeListBox($model,'fonts_category__id', $fontscategory_array, array('class' => 'normal form-control', 'size' => '0', 'style' => 'width: 250px;')); ?>                
								<span class="help-block"></span>
							</div>
						</div>
						<div class="form-body ">
							<div class="form-group ">
								<?=CHtml::activeLabelEx($model,'title'); ?>
								<?=CHtml::activeTextField($model,'title', array('class' => 'normal form-control', 'style' => 'width: 50%;')); ?>                
								<span class="help-block"></span>
							</div>
						</div>
						<div class="form-body ">
							<div class="form-group ">
								<?=CHtml::activeLabelEx($model,'path'); ?>
								<script>
										$(function(){

											$('#td_upload_link_change').bind('click', function(){
												$('#td_upload_photo').hide();
												$('#td_upload_link_change').hide();
												$('#td_upload_form_block').show();
												$('#td_upload_link_cancel').show();
											});
											
											$('#td_upload_link_cancel').bind('click', function(){
												$('input#news').val(null);
												$('#td_upload_form_block').hide();
												$('#td_upload_link_cancel').hide();
												$('#td_upload_photo').show();
												$('#td_upload_link_change').show();
											})
										})
								</script>
								<? if (!$model->isNewRecord) : ?>
								<div id="td_upload_photo">
								<? if (!empty($model->path)) : ?>
									<p>Файл шрифта уже загружен</p>
								<? endif ; ?>
								</div>
								<?=CHtml::link(Yii::t('app', 'Изменить'), 'javascript:void(0)', array('id' => 'td_upload_link_change'))?>
								<div style="display: none;" id="td_upload_form_block">
									<div data-provides="fileinput" class="fileinput fileinput-new">
									<input type="hidden" value="" name="">
									<div class="input-group">
										<div data-trigger="fileinput" class="form-control uneditable-input span3">
											<i class="fa fa-file fileinput-exists"></i>&nbsp; <span class="fileinput-filename"></span>
										</div>
										<span class="input-group-addon btn default btn-file">
										<span class="fileinput-new">
										Выбрать файл </span>
										<span class="fileinput-exists">
										Изменить </span>
										
										<?=CHtml::activeFileField($model, 'path');?>
										
										</span>
										<a data-dismiss="fileinput" class="input-group-addon btn red fileinput-exists" href="#"> Удалить </a>
									</div>
								</div>
								</div>
								<?=CHtml::link(Yii::t('app', 'Отмена'), 'javascript:void(0)', array('id' => 'td_upload_link_cancel', 'style' => 'display: none;'))?>
								<? else : ?>
								<div style="display: block;" id="td_upload_form_block">
									<div data-provides="fileinput" class="fileinput fileinput-new">
									<input type="hidden" value="" name="">
									<div class="input-group">
										<div data-trigger="fileinput" class="form-control uneditable-input span3">
											<i class="fa fa-file fileinput-exists"></i>&nbsp; <span class="fileinput-filename"></span>
										</div>
										<span class="input-group-addon btn default btn-file">
										<span class="fileinput-new">
										Выбрать файл </span>
										<span class="fileinput-exists">
										Изменить </span>
										<?=CHtml::activeFileField($model, 'path');?>									
										</span>
										<a data-dismiss="fileinput" class="input-group-addon btn red fileinput-exists" href="#"> Удалить </a>

									</div>
								</div>
								</div>
								<? endif ; ?>								
								<span class="help-block"></span>
							</div>
						</div>
						<div class="form-body">
						<div class="form-group">
						  
						 <?=CHtml::activeCheckBox($model, 'is_used', array('class' => 'make-switch', 'data-on-text' => Yii::t('app', 'ВКЛ.'), 'data-off-text' => Yii::t('app', 'ВЫКЛ.'), 'data-on-color' => 'success', 'data-off-color' => 'danger'))?>
							</div>
						</div>
					
					<div class="form-actions right">
						<? if (Yii::app()->user->checkAccess('AdminFontsDefaultIndex')) : ?>
						<?=CHtml::link(Yii::t('app', 'К списку шрифтов'), $this->createUrl('index'), array('class' => 'btn default'))?>
						<? endif; ?>
						<?=CHtml::submitButton($model->isNewRecord ? Yii::t('app', 'Сохранить') : Yii::t('app', 'Изменить'), array ('class' => 'btn green-meadow', 'name' => 'btn_save')); ?>
					</div>
				<?=CHtml::endForm(); ?>
			</div>
		</div>
	</div>
</div>
