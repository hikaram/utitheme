<?php
/**
 * @var Horders $horder
 */
?>
<div class="note note-danger">
    <?=Yii::t('app', 'Финансовая операция заказа №')?> <?=CHtml::encode($horder->num)?> <?=Yii::t('app', 'была отклонена. Заказ не оплачен.')?>
</div>
<br />
<?=CHtml::link(Yii::t('app', 'Оформить новый заказ'), $this->createUrl('/store/catalog'), ['class' => 'btn green'])?><br />

<? if (Yii::app()->user->checkAccess('OfficeOrdersDefaultIndex')) : ?>
    <?=CHtml::link(Yii::t('app', 'К списку заказов'), $this->createUrl('/office/orders'), ['class' => 'btn green'])?>
<? endif; ?>