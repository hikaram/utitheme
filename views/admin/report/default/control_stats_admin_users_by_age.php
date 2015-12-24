<h2><?=Yii::t('app', 'По возрасту')?></h2>
<table class="table table-hover">
    <thead>
        <tr>
            <th width="200"><?=Yii::t('app', 'Возраст')?></th>
            <th class="text-right"><?=Yii::t('app', 'Пользователи')?></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="text-left">
                <?=Yii::t('app', 'от 18 до 25')?>
            </td>
            <td class="text-right">
                <?=$report['from_18_to_25']['from_18_to_25']?>&nbsp;<?=Yii::t('app', 'чел.')?>
            </td>
        </tr>
        <tr>
            <td class="text-left">
                <?=Yii::t('app', 'от 26 до 30')?>
            </td>
            <td class="text-right">
                <?=$report['from_26_to_30']['from_26_to_30']?>&nbsp;<?=Yii::t('app', 'чел.')?>
            </td>
        </tr>
        <tr>
            <td class="text-left">
                <?=Yii::t('app', 'от 31 до 35')?>
            </td>
            <td class="text-right">
                <?=$report['from_31_to_35']['from_31_to_35']?>&nbsp;<?=Yii::t('app', 'чел.')?>
            </td>
        </tr>
        <tr>
            <td class="text-left">
                <?=Yii::t('app', 'от 36 до 40')?>
            </td>
            <td class="text-right">
                <?=$report['from_36_to_40']['from_36_to_40']?>&nbsp;<?=Yii::t('app', 'чел.')?>
            </td>
        </tr>
        <tr>
            <td class="text-left">
                <?=Yii::t('app', 'от 41 до 45')?>
            </td>
            <td class="text-right">
                <?=$report['from_41_to_45']['from_41_to_45']?>&nbsp;<?=Yii::t('app', 'чел.')?>
            </td>
        </tr>
        <tr>
            <td class="text-left">
                <?=Yii::t('app', 'от 46 до 50')?>
            </td>
            <td class="text-right">
                <?=$report['from_46_to_50']['from_46_to_50']?>&nbsp;<?=Yii::t('app', 'чел.')?>
            </td>
        </tr>
        <tr>
            <td class="text-left">
                <?=Yii::t('app', 'от 50')?>
            </td>
            <td class="text-right">
                <?=$report['more_then_50']['more_then_50']?>&nbsp;<?=Yii::t('app', 'чел.')?>
            </td>
        </tr>
    </tbody>
</table>
<hr>
<div class="right"><?=CHtml::link(Yii::t('app', 'Всего партнёров') . ': ' . $report['all']['all'], $this->createUrl('/admin/user/user'), array('title' => Yii::t('app', 'Перейти к списку пользователей')))?></div>
