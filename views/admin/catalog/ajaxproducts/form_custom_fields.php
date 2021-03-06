<?php
$form=$this->beginWidget('CActiveForm', array(
    'id'=>'products_form_custom_fields',
    'enableAjaxValidation'=>false,
    'htmlOptions' => array(
        'enctype' => 'multipart/form-data'
    )
));
echo $form->hiddenField($model, 'id', array('name' => 'product_id'));
?>

<style>
    li { list-style: none; }
	.ui-widget-content
	{
		background: #FFFFFF !important;
	}
	#custom_field_modal_form
	{
		background: #FFFFFF !important;
	}
	.error, .errorMessage
{
	color: #a94442;
}
</style>
<p class="note note-danger">
	<i class="fa fa-warning" style="margin-right: 10px;"></i> <?=Yii::t('app', 'Поля помеченные')?> <span class="required">*</span> <?=Yii::t('app', 'обязательны к заполнению.')?>
</p>
<div class="note note-danger error" style="display: none;">
	<?=$form->errorSummary($model->customFields)?>
</div>
<p class="note note-success" style="display: none;">
	<i class="fa fa-check" style="margin-right: 10px;"></i> <?=Yii::t('app', 'Продукт успешно сохранен')?>
	<p id="flash-messages"></p>
</p>
<div class="form-horizontal form-row-seperated">
	<div class="tab-pane active">
		<ul class="vertical-form">
			<?php
			$this->widget('application.modules.admin.modules.catalog.widgets.CustomFieldWidget', array(
				'customFields' => $model->customFields
			));
			?>

		</ul>
			<div class="form-actions custom-field-operation">
				<?=CHtml::submitButton(Yii::t('app', 'Сохранить'), array('class' => 'btn green')); ?>
				<?=CHtml::link('<i class="fa fa-plus"></i>', '#', array('style' => 'float: none', 'id' => 'add_custom_field',
					'class'=>'btn green tooltips',
								'data-container' => 'body', 
								'data-placement' => 'bottom',
								'data-original-title' => Yii::t('app', 'Управление параметрами продукта')))?> 
				 <?=CHtml::link('<i class="glyphicon glyphicon-pencil"></i>', array('/admin/catalog/customfields'), array('style' => 'float: none;', 'target' => '_blank',
					'class'=>'btn green-seagreen tooltips',
								'data-container' => 'body', 
								'data-placement' => 'bottom',
								'data-original-title' => Yii::t('app', 'Редактировать свойства параметров продукта')))?> 
			</div>
		<?php $this->endWidget();?>

	</div>
</div>
<div id="custom_field_modal_form" title="<?=Yii::t('app', 'Добавление настраиваемых полей')?>">
    <div id="custom_fields_categories">

    </div>
    <div id="sort_letters">
        <?=Yii::t('app', 'Алфавитный фильтр')?>:
        <?php foreach (CustomFields::getSortLetters() as $range): ?>
        <a href="#" data-sort-range="<?=$range?>"><?=$range?></a>
        <?php endforeach; ?>
        <a href="#" id="range_all" class="active"><?=Yii::t('app', 'Все')?></a>
    </div>
    <div id="custom_fields_body" class="loading">
	
    </div>
</div>

<div id="custom_field_modal_form_repair" title="<?=Yii::t('app', 'Замена шаблона поля')?>">
    <?=Yii::t('app', 'Поле')?> <select id="alternate_custom_field" name="custom_field" class="wide"></select>
    <input type="hidden" name="replaced_field_id"/>
    <p style="margin-top: 10px; margin-left: 45px;">
        <input type="submit" class="btn150" value="<?=Yii::t('app', 'Выбрать')?>"/>
    </p>
</div>

<script type="text/javascript">
//<![CDATA[
  $.ajaxSetup({
type : "POST",
async : false,
dataType : 'json'
});
    $(function(){
	
		
        $('#products_form_custom_fields').ajaxForm({
            data: {
                // Флаг указывает на то, что запрос нужно отработать на сохранение
                saveFields: true,
                YII_CSRF_TOKEN : app.csrfToken
            },
            cache: false,
            beforeSubmit: ProductTabsForm.ajaxFormBeforeSubmit,
            success: ProductTabsForm.ajaxFormSuccess
        });
		
		    /**
     * Получение коллекции выбранных полей
     * @return {Array}
     */
    function getAttachedFields()
    {
        var attachedFields = [];
        $('.custom-field').each(function(key, val){
            attachedFields.push($(val).data('field-id'));
        });
        return attachedFields;
    }

    $('#custom_field_modal_form').dialog({
        autoOpen: false,
        width: 750,
        height: 700,
        modal: true
    });

    var objectId = <?=($model->getPrimaryKey()) ? $model->getPrimaryKey() : 'null'?>;
    var objectAlias = '<?=get_class($model)?>';

    var uniqueFieldIndex = $('.custom-field').length;

    if (!$('.custom-field').length){
        $('.custom-field-operation').before('<li class="haventFields"><i><?=Yii::t('app', 'Нет уникальных параметров')?></i></li>')
    }

    $('#sort_letters a').click(function(e){
        e.preventDefault();

        $(this).addClass('active').siblings('a').removeClass('active');

        $('#custom_fields_body').html('<h1 class="loading"><?=Yii::t('app', 'Загрузка')?></h1>').addClass('loading');
        $.ajax({
            type: 'post',
            url: '/admin/catalog/ajaxcustomfields/get_custom_fields',
            data: {
                attached_fields: getAttachedFields(),
                range: $(this).data('sort-range'),
                YII_CSRF_TOKEN : app.csrfToken
            },
            success: function(result) {
                $('#custom_fields_body').removeClass('loading').html(result);
                rowClick();
                addEvent();
            }
        });


    });

    $('#add_custom_field').click(function(e){
        e.preventDefault();


        $('#custom_field_modal_form').dialog('open');
        $('#sort_letters').hide().find('a').removeClass('active').siblings('#range_all').addClass('active');
        $('#custom_fields_body').html('<h1 class="loading">Загрузка</h1>').addClass('loading');

        $.ajax({
            type: 'post',
            url: '/admin/catalog/ajaxcustomfields/get_custom_fields',
            dataType: 'json',
            data: {
                attached_fields: getAttachedFields(),
                YII_CSRF_TOKEN : app.csrfToken
            },
            success: function(result){
                $('#custom_fields_body').removeClass('loading').html(result);
                rowClick();
                addEvent();
                $('#sort_letters').show();
            }
        });
    });

    var addEvent = function(){
        $('#custom_fields_for_object input[type="checkbox"]').bind('change', function(){

            var fieldId = $(this).closest('tr').data('field-id');
            var that = $(this);

            if ($(this).is(':checked')) {
                // Если ставим галочку, а такое поле уже есть...
                if ($('.custom-field[data-field-id="' + fieldId + '"]').length)
                {
                    return false;
                }

                $(this).hide().after('<span class="field-loader"></span>');
				
                $.ajax({
                    url: '/admin/catalog/ajaxcustomfields/get_custom_field',
                    data: {
                        object_alias: objectAlias,
                        object_id: objectId,
                        field_id: fieldId,
                        fieldIndex: uniqueFieldIndex,
                        YII_CSRF_TOKEN : app.csrfToken
                    },
                    success: function(result){
                        $('.custom-field-operation').before(result);
                        that.show().next().remove();
                        uniqueFieldIndex++;
                    }
                });
            }
            else {
                $('.custom-field[data-field-id="' + fieldId + '"]').remove();
            }

            if ($('.custom-field').length){
                $('.haventFields').remove();
            }
            else{
                $('.custom-field-operation').before('<li class="haventFields"><i><?=Yii::t('app', 'Нет уникальных параметров')?></i></li>');
            }

        });
    };



    var rowClick = function(){
        $('#custom_fields_for_object td').click(function(e){

            if(e.target != this) return;

            var checkbox = $(this).closest('tr').find('input[type="checkbox"]');
            checkbox.prop("checked", !checkbox.prop("checked")).change();

        });
    };



    $('#close_modal').live('click', function(){
        $('#custom_field_modal_form').dialog('close');
    });

    /**************************
     * REPLACE FIELD
     *************************/
    $('#custom_field_modal_form_repair').dialog({
        autoOpen: false,
        width: 450,
        height: 150,
        modal: true
    });

    $('.repair-custom-field').click(function(e){

        e.preventDefault();

        var that = this;
        var fieldId = $(this).closest('li').data('field-id');
        $('#custom_field_modal_form_repair').dialog('open');

        $.ajax({
            url: '/admin/catalog/ajaxcustomfields/get_alternate_fields',
            type: 'post',
            dataType: 'json',
            data: {
                attached_fields: getAttachedFields(),
                YII_CSRF_TOKEN : app.csrfToken
            },
            success: function(result){
                var optionsStr = '';
                console.log(result);
                $.each(result.options, function(key, value){
                    optionsStr += '<option value="' + key + '">' + value + '</option>';
                });
                $('#custom_field_modal_form_repair select').html(optionsStr);
                $('#custom_field_modal_form_repair input[name="replaced_field_id"]').val(fieldId)
            }
        });
    });
    $('#custom_field_modal_form_repair input[type="submit"]').click(function(e){

        e.preventDefault();

        var alternateFieldId = $('#custom_field_modal_form_repair select').val();
        var replacedFieldId = $('#custom_field_modal_form_repair input[name="replaced_field_id"]').val();

        $.ajax({
            url: 'admin/catalog/ajaxcustomfields/get_custom_field',
            data: {
                object_alias: objectAlias,
                object_id: objectId,
                field_id: alternateFieldId,
                fieldIndex: uniqueFieldIndex,
                YII_CSRF_TOKEN : app.csrfToken
            },
            success: function(result){
                $('.custom-field[data-field-id="' + replacedFieldId + '"]').replaceWith(result);
                $('#custom_field_modal_form_repair').dialog('close');
                uniqueFieldIndex++;
            }
        });
    });
    });
//]]> 
</script>