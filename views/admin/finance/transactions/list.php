<?php
$this->breadcrumbs[Yii::t('app', 'Финансы')] = $this->createUrl('default/index');
$this->breadcrumbs[Yii::t('app', 'Операции')] = $this->createUrl('transactions/index');
?>

<? if (count($modelsTransactions) == 0) : ?>
<?=Yii::t('app', 'Финансовые операции еще не созданы')?>.
<? else : ?>
<table class="list">
    <tr>
        <th><?=$modelsTransactions[0]->getAttributeLabel('id')?></th>
        <th><?=Yii::t('app', 'Дебет')?></th>
        <th><?=Yii::t('app', 'Кредит')?></th>
        <th><?=Yii::t('app', 'Описание')?></th>
        <th><?=$modelsTransactions[0]->getAttributeLabel('amount')?></th>
        <th><?=Yii::t('app', 'Вал')?>.</th>
        <th><?=$modelsTransactions[0]->getAttributeLabel('status_alias')?></th>
        <th><?=$modelsTransactions[0]->getAttributeLabel('date_open')?></th>
        <th><?=$modelsTransactions[0]->getAttributeLabel('date_closed')?></th>
        <th><?=Yii::t('app', 'Подробно')?></th>
        <th><?=Yii::t('app', 'Подтвердить')?></th>
        <th><?=Yii::t('app', 'Отклонить')?></th>
    </tr>
<? foreach ($modelsTransactions as $key => $modelTransaction) : ?>
    <tr>
        <td><?=$modelTransaction->id?></td>
        <td>
            <? if ($modelTransaction->debit_object_alias == 'users') : ?>
                <? if (is_array($modelTransaction->debitObjectInfo) && array_key_exists('username', $modelTransaction->debitObjectInfo)) : ?>
                <?=CHtml::encode($modelTransaction->debitObjectInfo['username'])?>
                <? endif; ?>
            <? else : ?>
            <?=Yii::t('app', 'Компания')?>
            <? endif; ?>
            <? if ($modelTransaction->debit_wallet_type_alias == FinanceWallets::type_active) : ?>
                <span class="amount-increase">+</span>
            <? elseif ($modelTransaction->debit_wallet_type_alias == FinanceWallets::type_passive) : ?>
                <span class="amount-reduce">-</span>
            <? endif; ?>
        </td>
        <td>
            <? if ($modelTransaction->credit_object_alias == 'users') : ?>
                <? if (is_array($modelTransaction->creditObjectInfo) && array_key_exists('username', $modelTransaction->creditObjectInfo)) : ?>
                <?=CHtml::encode($modelTransaction->creditObjectInfo['username'])?>
                <? endif; ?>
            <? else : ?>
            <?=Yii::t('app', 'Компания')?>
            <? endif; ?>
            <? if ($modelTransaction->credit_wallet_type_alias == FinanceWallets::type_active) : ?>
                <span class="amount-reduce">-</span>
            <? elseif ($modelTransaction->credit_wallet_type_alias == FinanceWallets::type_passive) : ?>
                <span class="amount-increase">+</span>
            <? endif; ?>
        </td>
        <td><?=CHtml::encode($modelTransaction->description)?></td>
        <td><?=CHtml::encode($modelTransaction->amount)?></td>
        <td><?=CHtml::encode($modelTransaction->currency->abbreviation)?></td>
        <td><?=CHtml::encode($modelTransaction->status->title)?></td>
        <td><?=CHtml::encode($modelTransaction->date_open)?></td>
        <td><?=CHtml::encode($modelTransaction->date_closed)?></td>
        <td><!--a href="<?=$this->createUrl('details')?>">Подробно</a--></td>
        <td>
            <? if ($modelTransaction->status_alias == FinanceTransactions::status_open) : ?>
            <?=CHtml::form('', 'post')?>
                <?=CHtml::linkButton(Yii::t('app', 'Подтвердить'), array(
                    'submit'=>array(
                        'confirm',
                        'id' => $modelTransaction->id,
                    ),
                    'params'=>array(
                        Yii::app()->request->csrfTokenName => Yii::app()->request->csrfToken
                    ),
                    'confirm' => "Подтвердить операцию. Отмена будет невозможна."
                ))?>
            <?=CHtml::endForm() ?>
            <? elseif($modelTransaction->status_alias == FinanceTransactions::status_closed) : ?>
            <?=Yii::t('app', 'Проведена')?>.
            <? endif; ?>
        </td>
        <td>
        <? if ($modelTransaction->status_alias == FinanceTransactions::status_open) : ?>
        <?=CHtml::form('', 'post')?>
                <?=CHtml::linkButton(Yii::t('app', 'Отклонить'), array(
                    'submit'=>array(
                        'decline',
                        'id' => $modelTransaction->id,
                    ),
                    'params'=>array(
                        Yii::app()->request->csrfTokenName => Yii::app()->request->csrfToken
                    ),
                    'confirm' => Yii::t('app', 'Отклонить операцию. Отмена будет невозможна.')
                ))?>
            <?=CHtml::endForm() ?>
        <? elseif ($modelTransaction->status_alias == FinanceTransactions::status_decline) : ?>
            <?=Yii::t('app', 'Отклонена')?>.
        <? endif; ?>
        </td>

    </tr>
<? endforeach; ?>
</table>
<br />
<?$this->widget('CLinkPager', array(
    'pages' => $pages,
))?>
<? endif; ?>