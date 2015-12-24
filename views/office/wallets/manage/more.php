<? if (empty($profile->userwallets->wallets) && empty($profile->view_additional->wallets)) : ?>
    <?=Yii::t('app', 'Кошельки отсутствуют');?>
<? else : ?>
    <table class="table table-bordered table-advance">
        <thead>
            <tr>
                <th><?=Yii::t('app', '№ п/п')?></th>
                <th><?=Yii::t('app', 'Назначение кошелька')?></th>
                <th><?=Yii::t('app', 'Валюта кошелька')?></th>
                <th><?=Yii::t('app', 'Баланс')?></th>
                <th><?=Yii::t('app', 'Сумма к поступлению')?></th>
                <th><?=Yii::t('app', 'Сумма к выводу')?></th>
                <th><?=Yii::t('app', 'Статус кошелька')?></th>
                <th></th>
            </tr>
        </thead>        
        <tbody>

            <? $i = 0;?>
            <? if (!empty($profile->userwallets->wallets)):?>
                <? foreach ($profile->userwallets->wallets as $wallet) : ?>
                    <? $i++ ?>
                    <? echo $this->renderPartial('_more', array(
                            'i'         => $i,
                            'wallet'    => $wallet,
                            'profile'   => $profile,
                            ))?>
                <? endforeach;?>
            <? endif;?>     
            <? if ($profile->view_additional != NULL):?>
                <? foreach ($profile->view_additional as $wallet) : ?>

                    <? $i++ ?>
                    <? echo $this->renderPartial('_more', array(
                            'i'         => $i,
                            'wallet'    => $wallet->wallets,
                            'profile'   => $profile,
                            ))?>
                <? endforeach;?>
            <? endif;?>            
        </tbody>
    </table>
<? endif; ?>
