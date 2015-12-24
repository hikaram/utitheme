<?php
/**
 * @var AjaxProductsController $this
 * @var Products $model
 * @var CActiveForm $form
 * @var array $attachmentGroups
 */
$form=$this->beginWidget('CActiveForm', array(
    'id'=>'products_form_grid',
    'enableAjaxValidation'=>false,
    'htmlOptions' => array(
        'enctype' => 'multipart/form-data'
    )
));
echo $form->hiddenField($model, 'id', array('name' => 'product_id'));
?>

<ul class="vertical-form">
    <li>
        <h3><?=Yii::t('app', 'Сетка цен')?></h3>
    </li>
    <li id="grids_body">
        <?php $this->widget('application.modules.catalog.widgets.PricesGridFormWidget', array('product' => $model)) ?>
    </li>
    <li style="display: <?=$model->priceGrid instanceof PricesGrids ? 'none' : 'list-item' ?>;">
        <a href="#" id="add_grid"><?=Yii::t('app', 'Добавить сетку цен')?></a>
    </li>
    <li>
        <p style="margin: 15px 0;"><span class="required">*</span> - <?=Yii::t('app', 'поля обязательные для заполнения')?></p>
        <p><?=CHtml::submitButton(Yii::t('app', 'Сохранить'), array('class' => 'btn150')); ?></p>
    </li>
</ul>
<?php $this->endWidget()?>

<div id="modal_form_grids" title="<?=Yii::t('app', 'Добавление сетки цен')?>">
    <table class="form">
        <tr>
            <td><?=Yii::t('app', 'Вертикальная группа')?></td>
            <td><?=CHtml::activeDropDownList(PricesGrids::model(), 'a_custom_field__id', array('' => Yii::t('app', 'выберите группу')) + CustomFields::items('multi_select'))?></td>
        </tr>
        <tr>
            <td><?=Yii::t('app', 'Горизонтальная группа')?></td>
            <td><?=CHtml::activeDropDownList(PricesGrids::model(), 'b_custom_field__id', array('' => Yii::t('app', 'выберите группу')) + CustomFields::items('multi_select'))?></td>
        </tr>
        <tr>
            <td><?=Yii::t('app', 'Группы категорий')?></td>
            <td><?=CHtml::activeDropDownList(PricesGrids::model(), 'c_custom_field__id', array('' => Yii::t('app', 'выберите группу')) + CustomFields::items('multi_select'))?></td>
        </tr>
        <tr>
            <td></td>
            <td><?=CHtml::submitButton(Yii::t('app', 'Сгенерировать сетку'), array('class' => 'btn250', 'id' => 'generate_grid'))?></td>
        </tr>
    </table>
</div>

<script type="text/javascript">
    $(function(){
        $('#products_form_grid').ajaxForm({
            data: {
                saveGrid: true
            },
            cache: false,
            beforeSubmit: ProductTabsForm.ajaxFormBeforeSubmit,
            success: ProductTabsForm.ajaxFormSuccess
        });
        $('#add_grid').click(function(e){
            e.preventDefault();
            $('#modal_form_grids').dialog('open');
        });


        $('#generate_grid').click(function(e){
            e.preventDefault();
            $.ajax({
                type: 'post',
                dataType: 'json',
                url: '/catalog/ajaxgrids/generategrid',
                data: {
                    a_field_id: $('#modal_form_grids select[name="PricesGrids[a_custom_field__id]"]').val(),
                    b_field_id: $('#modal_form_grids select[name="PricesGrids[b_custom_field__id]"]').val(),
                    c_field_id: $('#modal_form_grids select[name="PricesGrids[c_custom_field__id]"]').val()
                },
                success: function(result){
                    $('#grids_body').html(result);
                    $('#add_grid').closest('li').hide();
                    $('#modal_form_grids').dialog('close');
                }

            })
        });

        $(document).on('click', '.delete-grid', function(e){
            e.preventDefault();
            $(this).closest('div').remove();
            $('#add_grid').closest('li').show();
        });


        $('#modal_form_grids').dialog({
            autoOpen: false,
            width: 750,
            height: 700,
            modal: true
        });
    });
</script>