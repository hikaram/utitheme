<?php
/**
 * @var Horders $horder
 */
?>
<div class="note note-warning">
    <?=Yii::t('app', 'Финансовая операция заказа №')?> <?=CHtml::encode($horder->num)?> <?=Yii::t('app', 'пока не подтверждена. Заказ не оплачен.')?><br />
    <?=Yii::t('app', 'Если Вы оплатили заказ')?> <?=CHtml::link(Yii::t('app', 'свяжитесь с нами'), $this->createUrl('/site/contact'))?> <?=Yii::t('app', 'для обновления статуса.')?>
</div>

<? if (Yii::app()->user->checkAccess('OfficeOrdersDefaultIndex')) : ?>
    <?=CHtml::link(Yii::t('app', 'К списку заказов'), $this->createUrl('/office/orders'), ['class' => 'btn green'])?>
<? endif; ?>