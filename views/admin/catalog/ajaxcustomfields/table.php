<?php
/**
 * Представление для выбора кастомных полей в форме редактирования продукта или каталога
 * @var array $fields
 */
?>
<?php if (count($fields) > 0): ?>
    <table id="custom_fields_for_object" class="table table-hover" style="margin-bottom: 10px;">
        <thead>
        <tr class="top-table">
            <th>#</th>
            <th><?=CustomFields::model()->getAttributeLabel('name')?></th>
            <th><?=CustomFields::model()->getAttributeLabel('field_format')?></th>
        </tr>
        </thead>
        <tbody>
            <?php foreach ($fields as $i => $field): ?>
                <tr data-field-id="<?=$field->id?>">
                    <td><?=CHtml::activeCheckBox($field, '['.$i.']attached')?></td>
                    <td><?=$field->name?></td>
                    <td><?=CustomFieldsFormats::item($field->field_format)?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p><?=Yii::t('app', 'Не найдено настраиваемых полей')?></p>
<?php endif; ?>
<hr/>

<script type="text/javascript">
$(function(){

    $('#check_all').click(function(e){
        e.preventDefault();
        $('#custom_fields_for_object input[type="checkbox"]').prop('checked', true);
    });
    $('#uncheck_all').click(function(e){
        e.preventDefault();
        $('#custom_fields_for_object input[type="checkbox"]').prop('checked', false);
    });

});
</script>