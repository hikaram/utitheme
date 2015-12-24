<?php
/**
 * @var Horders $horder
 */
?>
<div class="note note-success">
    <?=Yii::t('app', 'Заказ успешно оплачен, номер заказа')?> <?=CHtml::encode($horder->num)?>
</div>

<? if (Yii::app()->user->checkAccess('OfficeOrdersDefaultIndex')) : ?>
    <?=CHtml::link(Yii::t('app', 'К списку заказов'), $this->createUrl('/office/orders'), ['class' => 'btn green'])?>
<? endif; ?>