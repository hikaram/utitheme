<? if (($model->attachment != NULL) && ($model->attachment->secret_name != null)) : ?>
    <?=CHtml::image(MSmarty::attachment_get_file_name($model->attachment->secret_name, $model->attachment->raw_name, $model->attachment->file_ext, '_thumb_list', 'slidebar'), '', array('style' => 'max-width: 50%; border: 1px solid #d8d8d8;')); ?>
<? endif; ?>