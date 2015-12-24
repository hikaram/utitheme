<? /* if (($profile->attachment != NULL) && ($profile->attachment->secret_name != null)) : ?>
    <?=CHtml::image(MSmarty::attachment_get_file_name($profile->attachment->secret_name, $profile->attachment->raw_name, $profile->attachment->file_ext, '_office_profile', 'office_photo'), '', array('align' => 'left')); ?>
<? else : ?>
    <?=CHtml::image(Yii::app()->assetManager->getPublishedUrl(Yii::getPathOfAlias('admin.modules.user.css')) . '/img/o.jpg', 'nophoto', array('height' => '200px', 'width' => '200px', 'align' => 'left'));?>
<? endif; */ ?>

<div style="display: inline;">
    <? if (($profile->attachment != NULL) && ($profile->attachment->secret_name != null)) : ?>
        <?=CHtml::image(MSmarty::attachment_get_file_name($profile->attachment->secret_name, $profile->attachment->raw_name, $profile->attachment->file_ext, '_office_profile', 'office_photo'), '', array('align' => 'left')); ?>
    <? else : ?>
        <?=CHtml::image(Yii::app()->assetManager->getPublishedUrl(Yii::getPathOfAlias('admin.modules.user.css')) . '/img/o.jpg', 'nophoto', array('height' => '200px', 'width' => '200px', 'align' => 'left'));?>
    <? endif; ?>
</div>

<div class="floater"></div>

<? if (($profile->attachment != NULL) && ($profile->attachment->secret_name != null)) : ?>
    <div id="link_edit" style="display: none;">
        <?=Chtml::link(Yii::t('app', 'Изменить'), 'javascript: void(0)', array('onClick' => 'editPhoto()', 'class' => 'btn green'));?>&nbsp;&nbsp;
        <?=Chtml::link(Yii::t('app', 'Удалить'), 'javascript: void(0)', array('onClick' => 'deletePhoto(' . $model->id . ', ' . $profile->attachment->id . ')', 'class' => 'btn red'));?>
    </div>
    <? else : ?>
    <div id="link_edit">
        <?=Chtml::link(Yii::t('app', 'Загрузить'), 'javascript: void(0)', array('onClick' => 'editPhoto()', 'style' => 'margin-right: 220px; margin-top: 10px;', 'class' => 'btn green'));?>
    </div>
<? endif; ?>                                
</div>