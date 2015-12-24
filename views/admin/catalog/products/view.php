<?php
/* @var $this ProductsController */
/* @var $model Products */

?>
<h1><span class="wrapper-3"><?= CHtml::encode($this->pageTitle)?></span></h1>

<!-- Временно -->
<div style="clear: both;" class="operations">
    <?=CHtml::link(Yii::t('app', 'Создать продукт'), array('create'))?><br/>
    <?=CHtml::link(Yii::t('app', 'Редактировать продукт'), array('update', 'id' => $model->getPrimaryKey()))?>
</div>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
    'attributes'=> array_merge(array(
        'id',
        'lang.name',
//        'url',
        'price',
		'points',
        array(
            'name' => 'currency__id',
            'value' => (!empty($model->currency)) ? Currencies::item($model->currency__id) : Yii::t('app', 'Валюта отсутствует')
        ),
        array(
            'name' => 'catalogues',
            'value' => (!empty($model->catalogues)) ? implode(', ', CHtml::listData($model->catalogues, 'id', 'lang.name')) : Yii::t('app', 'не прикреплен к каталогам')
        ),
    ), $model->getCustomFieldsAsCDetailViewValues())
));
?>
<h3><?=Yii::t('app', 'Изображения')?></h3>
<?php if (count($model->attachments) > 0): ?>
    <ul>
        <?php foreach($model->attachments as $attachment): ?>
            <li><?=CHtml::link(CHtml::image($attachment->getThumbUrl(), $attachment->lang->description, array('title' => $attachment->lang->description)), $attachment->getFullUrl(), array('target' => '_blank'))?></li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <?=Yii::t('app', 'Нет ни одного прикрепленного изображения')?>
<?php endif; ?>
<p>
    <?=CHtml::link(Yii::t('app', 'Управление изображениями'), array('update', 'id' => $model->getPrimaryKey(), '#' => 'image_operations')) ?>
</p>

