<? $path = Yii::app()->assetManager->getPublishedUrl(Yii::getPathOfAlias('application.modules.admin.modules.catalog.css')); ?>

<div class="form-group custom-field-form-loading format-field">
    <div class="col-md-12">
        <?=CHtml::image(Yii::app()->urlManager->createUrl($path . '/preloaders/circular_gray.gif'))?>
    </div>
</div>