<?php
$this->breadcrumbs[Yii::t('app', 'Панель управления')] = $this->createUrl('/admin');
if (Yii::app()->user->username == Yii::app()->params['superAdminInfo']['username'])
{
	$this->breadcrumbs[Yii::t('app', 'Управление финансами')] = $this->createUrl('default/index');
}
$this->breadcrumbs[Yii::t('app', 'Отчет по периодам')] = $this->createUrl('printout/index');
?>

<link rel="stylesheet" href="<?=Yii::app()->assetManager->getPublishedUrl(Yii::getPathOfAlias('application.modules.admin.modules.finance.css'))?>/css/adminfinance.css" type="text/css" media="screen, projection" />
<?=CHtml::hiddenField('asseturl', Yii::app()->assetManager->getPublishedUrl(Yii::getPathOfAlias('application.modules.admin.modules.finance.css')), array('id' => 'asseturl'))?>

<?=CHtml::beginForm('', 'POST', array('id' => 'filterform', 'style' => 'margin-bottom: 30px;'))?>
    <table class="list">
        <tbody>
            <tr>
                <td style="padding-right: 20px;"><?=Yii::t('app', 'Выберите период')?>:</td>
                <td>
                    <?=Yii::t('app', 'от')?>&nbsp;&nbsp;<?=CHtml::textField('date_from', array_key_exists('date_from', $filter) ? $filter['date_from'] : '', array('class' => 'datepicker', 'readonly' => 'readonly',))?>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=Yii::t('app', 'до')?>&nbsp;&nbsp;<?=CHtml::textField('date_end', array_key_exists('date_end', $filter) ? $filter['date_end'] : '', array('class' => 'datepicker', 'readonly' => 'readonly',))?>
                </td>
                <td><?=CHtml::button(Yii::t('app', 'Сформировать отчет'), array('class' => 'btn150', 'name' => 'btn_filter'))?></td>
            </tr>
            <? if ((bool)$if_filter) : ?>
                <tr style="text-align: right; font-size: 11px;">
                    <td colspan="3"><?=CHtml::checkBox('hideZero', false, array('id' => 'hideZero'))?>&nbsp;&nbsp;<?=Yii::t('app', 'Скрыть нулевые операции')?></td>
                </tr>
            <? endif; ?>
        </tbody>
    </table>
<?=CHtml::endForm()?>		

<? if (!(bool)$if_filter) : ?>
    <div style="padding: 15px; background: none repeat scroll 0 0 #F2D516;"><?=Yii::t('app', 'Вы не выбрали период')?></div>
<? else : ?>

    <div style="padding-left: 10px;">
    
        <?=CHtml::button(Yii::t('app', 'Версия для печати'), array('style' => 'margin: 0 0 20px 10px;', 'onClick' => 'window.open("' . $this->createUrl('index', array('print' => (int)TRUE)) . '")'))?>
        
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
    
    
    </div>

<? endif; ?>