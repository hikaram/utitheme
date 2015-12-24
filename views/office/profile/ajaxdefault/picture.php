<? if (($profile->attachment != NULL) && ($profile->attachment->secret_name != null)) : ?>
    <?=CHtml::image(MSmarty::attachment_get_file_name($profile->attachment->secret_name, $profile->attachment->raw_name, $profile->attachment->file_ext, '_office_profile', 'office_photo'), '', array('style' => 'margin:0 15px 0 0;')); ?>
<? else : ?>
    <?=CHtml::image(Yii::app()->assetManager->getPublishedUrl(Yii::getPathOfAlias('office.modules.profile.css')) . '/img/o.jpg', 'nophoto', array('height' => '200px', 'width' => '200px'));?>
<? endif; ?>