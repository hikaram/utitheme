<?php

    $path = Yii::app()->assetManager->publish($this->module->getBasePath() . DIRECTORY_SEPARATOR . 'js' . DIRECTORY_SEPARATOR . 'plugins' . DIRECTORY_SEPARATOR . 'jquery-ui-1.10.3.custom');

    Yii::app()->clientScript->registerCssFile(
        $path . '/css/ui-lightness/jquery-ui-1.10.3.custom.css', 'screen' 
    );
    Yii::app()->clientScript->registerScriptFile(
        $path . '/js/jquery-ui-1.10.3.custom.min.js', CClientScript::POS_HEAD 
    );
    Yii::app()->clientScript->registerScriptFile(
        $path . '/development-bundle/ui/jquery.ui.datepicker.js', CClientScript::POS_HEAD 
    );    
    Yii::app()->clientScript->registerScriptFile(
        $path . '/development-bundle/ui/i18n/jquery.ui.datepicker-ru.js', CClientScript::POS_HEAD 
    );

    echo $form->hiddenField($model, 'id');

?>
<style>
	.error {color: #a94442;}
	.text-danger{color: #a94442 !important;}
	.custom-field.form-body { list-style: outside none none;}
	.errorSummary p
		{
			margin-left: 28px;
			margin-top: 6px;
		}
</style>

<div class="portlet-body form form-horizontal">
    <div class="form-body">
        <?=CHtml::hiddenField('class', 'form-control')?>
    	<div class="form-group" style="margin-top: 20px;">
    		<?=$form->labelEx($model, 'name', array('class' => 'col-md-3 control-label'))?>
    		<div class="col-md-9">
    			<?=$form->textField($model, 'name', array('class' => 'form-control input-inline input-large'))?>
    			<span class="help-block text-danger"><?=$form->error($model, 'name')?></span>
    		</div>
    	</div>

        <? if ($model->productCount() == (int)FALSE) : ?>

            <div class="form-group" id="row_field_format">
                <?=$form->labelEx($model, 'field_format', array('class' => 'col-md-3 control-label'))?>
                <div class="col-md-9">
                    <?=$form->listBox($model, 'field_format', $fieldFormats, array('options' => $model->getFormatListOptions($fieldFormats), 'size' => 0, 'class' => 'form-control input-inline input-large'))?>
                    <span class="help-block text-danger"><?=$form->error($model, 'field_format')?></span>
                </div>
            </div>
            <div class="form-group" style="margin-left: -5px;">
                <?php
                    $this->widget('application.modules.admin.modules.catalog.widgets.CustomFieldFormWidget', array('model' => $model));
                ?>
            </div>
            <div class="form-group">
                <?=$form->labelEx($model, 'is_required', array('class' => 'col-md-3 control-label'))?>
                <div class="col-md-9">
                    <?=$form->checkBox($model, 'is_required')?>
                    <span class="help-block text-danger"><?=$form->error($model, 'is_required')?></span>
                </div>
            </div>
            <div class="form-group">
                <?=$form->labelEx($model, 'searchable', array('class' => 'col-md-3 control-label'))?>
                <div class="col-md-9">
                    <?=$form->checkBox($model, 'searchable')?>
                    <span class="help-block text-danger"><?=$form->error($model, 'searchable')?></span>
                </div>
            </div>

        <? else : ?>

            <div class="form-group">
                <?=$form->label($model, 'field_format', array('class' => 'col-md-3 control-label'))?>
                <div class="col-md-9 text-left" style="height: 30px; padding-top: 10px;">
                    <?=CHtml::encode(CustomFieldsFormats::item($model->field_format))?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label"><?=Yii::t('app', 'Регулярное выражение')?></label>
                <div class="col-md-9 text-left" style="height: 30px; padding-top: 10px;">
                    <?=CHtml::encode($model->regexp)?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label"><?=Yii::t('app', 'Минимальная длина')?></label>
                <div class="col-md-9 text-left" style="height: 30px; padding-top: 10px;">
                    <?=CHtml::encode($model->min_length)?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label"><?=Yii::t('app', 'Максимальная длина')?></label>
                <div class="col-md-9 text-left" style="height: 30px; padding-top: 10px;">
                    <?=CHtml::encode($model->max_length)?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label"><?=Yii::t('app', 'Обязательное')?></label>
                <div class="col-md-9 text-left" style="height: 30px; padding-top: 10px;">
                    <? if ($model->is_required) : ?><i class="fa fa-check font-green"></i>
                    <? else : ?><i class="fa fa-times font-red"></i>
                    <? endif; ?> 
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label"><?=Yii::t('app', 'Для всех')?></label>
                <div class="col-md-9 text-left" style="height: 30px; padding-top: 10px;">
                    <? if ($model->is_for_all) : ?><i class="fa fa-check font-green"></i>
                    <? else : ?><i class="fa fa-times font-red"></i>
                    <? endif; ?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label"><?=Yii::t('app', 'Является фильтром')?></label>
                <div class="col-md-9 text-left" style="height: 30px; padding-top: 10px;">
                    <? if ($model->is_filter) : ?><i class="fa fa-check font-green"></i>
                    <? else : ?><i class="fa fa-times font-red"></i>
                    <? endif; ?>  
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label"><?=Yii::t('app', 'Позиция')?></label>
                <div class="col-md-9 text-left" style="height: 30px; padding-top: 10px;">
                    <?=CHtml::encode($model->position)?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label"><?=Yii::t('app', 'Доступно для поиска')?></label>
                <div class="col-md-9 text-left" style="height: 30px; padding-top: 10px;">
                    <? if ($model->searchable) : ?><i class="fa fa-check font-green"></i>
                    <? else : ?><i class="fa fa-times font-red"></i>
                    <? endif; ?>  
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label"><?=Yii::t('app', 'Редактируемый')?></label>
                <div class="col-md-9 text-left" style="height: 30px; padding-top: 10px;">
                    <? if ($model->editable) : ?><i class="fa fa-check font-green"></i>
                    <? else : ?><i class="fa fa-times font-red"></i>
                    <? endif; ?>  
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label"><?=Yii::t('app', 'Видимый')?></label>
                <div class="col-md-9 text-left" style="height: 30px; padding-top: 10px;">
                    <? if ($model->visible) : ?><i class="fa fa-check font-green"></i>
                    <? else : ?><i class="fa fa-times font-red"></i>
                    <? endif; ?>  
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label"><?=Yii::t('app', 'Значения по умолчанию')?></label>
                <div class="col-md-9 text-left" style="height: 30px; padding-top: 10px;">
                    <? foreach ($model->possibleValuesDefault as $key => $defaultValue) : ?>
                        <?=CHtml::encode($defaultValue->value); ?>
                        <? if (array_key_exists($key + 1, $model->possibleValuesDefault)) : ?>
                            ,&nbsp;
                        <? endif; ?>
                    <? endforeach ?>
                </div>
            </div>            

        <? endif; ?>

    </div>
	<div class="form-actions">
		<?=CHtml::submitButton($model->isNewRecord ? Yii::t('app', 'Создать') : Yii::t('app', 'Сохранить'), array('class' => 'btn green'))?> 
        <?=CHtml::link(Yii::t('app', 'Предпросмотр'), '#viewCustomField', ['class' => 'btn blue', 'id' => 'open_custom_field_preview', 'data-toggle' => 'modal'])?>
        <? /* CHtml::button(Yii::t('app', 'Предпросмотр'), array('id' => 'open_custom_field_preview', 'class' => 'btn blue')) */ ?>
	</div>
</div>



<div class="modal fade" id="viewCustomField">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><?=Yii::t('app', 'Предпросмотр настраиваемого поля')?></h4>
            </div>
            <div class="modal-body">

                <ul class="vertical-form">

                </ul>
                <div id="modal_custom_field_loading">
                    <h1><?=Yii::t('app', 'Загрузка')?></h1>
                </div>

            </div>
            <div class="modal-footer">
                <span class="btn grey" data-dismiss="modal"><?=Yii::t('app', 'Закрыть')?></span>
            </div>
        </div>
    </div>
</div>

<? /*
<div id="modal_custom_field_preview" title="<?=Yii::t('app', 'Предпросмотр настраиваемого поля')?>">
    <ul class="vertical-form">

    </ul>
    <div id="modal_custom_field_loading">
        <h1><?=Yii::t('app', 'Загрузка')?></h1>
    </div>
    <?=CHtml::button(Yii::t('app', 'Закрыть'), array('id' => 'close_custom_field_preview', 'class' => 'btn150'))?>
</div>
*/ ?>
<script type="text/javascript">
    var customFieldFormWidget = {
        isSelect: <?=(in_array($model->field_format, array(CustomFields::SELECT, CustomFields::SELECT_RADIO)) ? 'true' : 'false')?>,
        isMultiSelect: <?=(in_array($model->field_format, array(CustomFields::MULTI_SELECT, CustomFields::MULTI_SELECT_CHECKBOX)) ? 'true' : 'false')?>,
        fieldId: $('input[name="CustomFields[id]"]').val(),
        uniqueIndex: 0,
        // Формируем состояние формы
        init: function(){
            this.changeFormat();
            this.addPossibleValue();
            this.deletePossibleValue();
            this.previewCustomField();
            this.changeDefaultValue();
            this.uniqueIndex = $('.custom-field-form-possible-value').length;
            $('.custom-field-form-loading').hide();
        },
        changeFormat: function(){
            var that = this;
            $('select[name="CustomFields[field_format]"]').change(function(){

                var that = this;
                $(this).closest('tr').nextAll('tr').hide();
                $('.custom-field-form-loading').show();
                // Убираем выделение с доп. форматов для списков (radio & checkbox)
                // иначе их значения затерут отправленные данные от данного селекта
                $('input[name="CustomFields[field_format]"]').prop('checked', false);
                $.ajax({
                    url: '/admin/catalog/ajaxcustomfields/custom_field_form',
                    type: 'post',
                    dataType: 'json',
                    data: $('form').serialize() ,
                    success: function(result){
                        $('div.format-field').remove();
                        $(that).closest('.form-group').after(result.form).show();
                        customFieldFormWidget.uniqueIndex = $('.custom-field-form-possible-value').length;
                        customFieldFormWidget.isSelect = result.isSelect;
                        customFieldFormWidget.isMultiSelect = result.isMultiSelect;
                        $('.custom-field-form-loading').hide();

                        var checkboxes = $("input[type=checkbox], input[type=radio]");
                        if (checkboxes.size() > 0) {
                            checkboxes.each(function () {
                                if ($(this).parents(".checker").size() == 0) {
                                    $(this).show();
                                    $(this).uniform();
                                }
                            });
                        }


                    }

                });
            });
        },
        addPossibleValue: function(){
            var that = this;
            $(document).on('click', '.custom-field-form-add-possible-value', function(e){
                e.preventDefault();
                var formRow = $('.custom-field-form-possible-value').first().clone();
                formRow.addClass('new').find('input').val(null);
				formRow.addClass('new').find('input[type="checkbox"]').val(1);

                formRow.find('input').each(function(key, val){
                    var oldName = $(val).prop('name');
					var oldId = $(val).prop('id');
                    $(val).prop('name', oldName.replace(/\d+/, customFieldFormWidget.uniqueIndex));
					$(val).prop('id', oldId.replace(/\d+/, customFieldFormWidget.uniqueIndex));
                });

                $(this).siblings('div.format-field-possible').first().before(formRow);
                customFieldFormWidget.uniqueIndex++;

            });


        },
        deletePossibleValue: function(){
            $(document).on('click', '.custom-field-form-remove-possible-value', function(e){
                e.preventDefault();

                var itsNew = $(this).parents('div.format-field-possible').first().hasClass('new');


                if ($('.custom-field-form-possible-value').length < 2)
                {
                    if ($('.custom-field-form-possible-value').hasClass('new')){
                        return;
                    }
                    else{
                        var formRow = $('.custom-field-form-possible-value').first().clone();
                        formRow.addClass('new').find('input').val(null);
                        $('.custom-field-form-add-possible-value').parents('div.format-field-possible').first().before(formRow);

                    }
                }
                $(this).parents('div.format-field-possible').first().remove();


            });
        },
        previewCustomField: function(){
            $('#open_custom_field_preview').click(function(e){
               // e.preventDefault();
				
                $('#viewCustomField .vertical-form').empty();
                $('#modal_custom_field_loading').show();
				
                $.ajax({
                    type: 'post',
                    dataType: 'json',
                    url: '/admin/catalog/ajaxcustomfields/preview_custom_field',
                    data: $('#custom-fields-form').serialize(),
                    success: function(result){
                        $('#viewCustomField .vertical-form').html(result);

                        var checkboxes = $("#viewCustomField input[type=checkbox], #viewCustomField input[type=radio]");
                        if (checkboxes.size() > 0) {
                            checkboxes.each(function () {
                                if ($(this).parents(".checker").size() == 0) {
                                    $(this).show();
                                    $(this).uniform();
                                    $(this).css('margin-left', '-10px');
                                }
                            });
                        } 

                        $('#modal_custom_field_loading').hide();
                    }

                });
            });
            /*
            $('#close_custom_field_preview').click(function(e){
                e.preventDefault();
                $('#modal_custom_field_preview').dialog('close');
            });
*/
        },
        changeDefaultValue: function(){
            $(document).on('click', '.is-default-checkbox', function(e){
				
				var id = $(this).attr('id');
                if (customFieldFormWidget.isSelect === true)
                {
                    $('.is-default-checkbox').each(function(key, val){
					
						if($(val).attr('id') != id)
						{
							$(val).removeAttr("checked");
						}
					});
                }
            });
        }
    };
    customFieldFormWidget.init();
</script>