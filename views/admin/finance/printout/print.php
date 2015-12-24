<div style="text-align: center; width: 750px;">
    <?=Yii::t('app', 'Отчет за период с ') . $filter['date_from'] . Yii::t('app', ' по ') . $filter['date_end']?>
</div>

<table class="list stat" style="width: 750px; margin-top: 10px;" cellpadding="0" cellspacing="0">
    <tbody>
        <tr>
            <th colspan="2"><?=Yii::t('app', 'Поступления')?></th>
        </tr>
        <? foreach ($transactionsIncoming as $transactionIncoming) : ?>
            <tr<? if (empty($transactionIncoming['amount'])) : ?> class="zeroamount"<?endif; ?>>
                <td style="width: 90%;"><?=CHtml::encode($transactionIncoming['title'])?></td>
                <td style="width: 10%; text-align: right;"><?=sprintf('%.2f', $transactionIncoming['amount'])?></td>
            </tr>             
        <? endforeach ?>
        <tr>
            <td style="width: 90%; height: 30px; font-weight: 700;"><?=Yii::t('app', 'Сумма приходных операций')?></td>
            <td style="width: 10%; text-align: right; font-weight: 700;"><?=sprintf('%.2f', $transactionsIncomingTotal)?></td>
        </tr>
    </tbody>
</table>

<table class="list stat" style="width: 750px; margin-top: 10px;" cellpadding="0" cellspacing="0">
    <tbody>
        <tr>
            <th colspan="2"><?=Yii::t('app', 'Расходы')?></th>
        </tr>
        <? foreach ($transactionsOutgoing as $transactionOutgoing) : ?>
            <tr<? if (empty($transactionOutgoing['amount'])) : ?> class="zeroamount"<?endif; ?>>
                <td style="width: 90%;"><?=CHtml::encode($transactionOutgoing['title'])?></td>
                <td style="width: 10%; text-align: right;"><?=sprintf('%.2f', $transactionOutgoing['amount'])?></td>
            </tr>             
        <? endforeach ?>
        <tr>
            <td style="width: 90%; height: 30px; font-weight: 700;"><?=Yii::t('app', 'Сумма расходных операций')?></td>
            <td style="width: 10%; text-align: right; font-weight: 700;"><?=sprintf('%.2f', $transactionsOutgoingTotal)?></td>
        </tr>                
    </tbody>
</table>

<table class="list stat" style="width: 750px; margin-top: 10px;" cellpadding="0" cellspacing="0">
    <tbody>
        <tr>
            <th colspan="2"><?=Yii::t('app', 'Остаток')?></th>
        </tr>            
        <tr>
            <td style="width: 90%; height: 30px; font-weight: 700;"><?=Yii::t('app', 'Остаток')?></td>
            <td style="width: 10%; text-align: right; font-weight: 700;"><?=sprintf('%.2f', $transactionsIncomingTotal)?>&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;<?=sprintf('%.2f', $transactionsOutgoingTotal)?>&nbsp;&nbsp;&nbsp;=&nbsp;&nbsp;&nbsp;<?=sprintf('%.2f', $transactionsTotal)?></td>
        </tr>                 
    </tbody>
</table>        

