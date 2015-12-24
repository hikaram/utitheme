<tr>
    <td><?=$i?></td>
    <td>
        <? if($wallet->object_alias == 'users'):?>
            <?=Yii::t('app', CHtml::encode($wallet->purpose->title))?>
        <? else:?>
            <? echo FinanceWalletsViewAdditional::getTitle($wallet->id, $profile->user__id). ' "'.CHtml::encode($wallet->purpose->title).'"'?>
        <? endif;?>
    </td>
    <td><?=Yii::t('app', CHtml::encode($wallet->currency->title))?></td>
    <td><?=sprintf('%.2f', $wallet->balance)?></td>
    <td><?=sprintf('%.2f', $wallet->balance_unapproved)?></td>
    <td><?=sprintf('%.2f', $wallet->balance_blocked)?></td>
    <td><?=Yii::t('app', CHtml::encode($wallet->status->title))?></td>
    <td class="text-center h4">
        <? if ($wallet->status->alias == 'active') : ?>
       
            <? if (Yii::app()->user->checkAccess('OfficeWalletsManageMoneylist')) : ?>
        
                <?=CHtml::linkButton('<span class="fa fa-list"></span>',array(
                    'submit' => array('manage/moneylist', 'wallet' => $wallet->id, 'user' => $profile->user->id, 'page' => $currentPage),
                    'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
					'class' => 'wallets-action-icon font-grey-cascade tooltips mr5',
					'data-container' => 'body',
					'data-placement' => 'top', 
					'data-original-title' => Yii::t('app', 'Список финансовых операций'),
				));  ?>
        
            <? endif; ?>
       
            <? if (Yii::app()->user->checkAccess('OfficeWalletsManageMoneyIn')) : ?>
        
                <?=CHtml::linkButton('<span class="fa fa-plus-square money_in"></span>',array(
                    'submit' => array('manage/moneyin', 'wallet' => $wallet->id, 'user' => $profile->user->id, 'page' => $currentPage),
                    'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
					'class' => 'wallets-action-icon font-grey-cascade tooltips mr5',
					'data-container' => 'body',
					'data-placement' => 'top', 
					'data-original-title' => Yii::t('app', 'Пополнение кошелька'),
				));  ?>
        
            <? endif; ?>

            <? if (Yii::app()->user->checkAccess('OfficeWalletsManageMoneyOut')) : ?>
        
                <?=CHtml::linkButton('<span class="fa fa-minus-square money_out"></span>',array(
                    'submit' => array('manage/moneyout', 'wallet' => $wallet->id, 'user' => $profile->user->id, 'page' => $currentPage),
                    'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
					'class' => 'wallets-action-icon font-grey-cascade tooltips mr5',
					'data-container' => 'body',
					'data-placement' => 'top', 
					'data-original-title' => Yii::t('app', 'Вывод средств из кошелька'),
				));  ?>
        
            <? endif; ?>                            
       
            <? if (Yii::app()->user->checkAccess('OfficeWalletsManageBlock')) : ?>
        
                <?=CHtml::linkButton('<span class="fa fa-lock fa-lg"></span>',array(
                    'submit' => array('manage/block', 'wallet' => $wallet->id, 'user' => $profile->user->id, 'page' => $currentPage),
                    'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
                    'confirm' => Yii::t('app', 'Заблокировать кошелек пользователю') . ' ' . $profile->user->username . '?',
					'class' => 'wallets-action-icon font-grey-cascade tooltips mr5',
					'data-container' => 'body',
					'data-placement' => 'top', 
					'data-original-title' => Yii::t('app', 'Заблокировать'),
				));  ?>
        
            <? endif; ?>
        
            <? if (Yii::app()->user->checkAccess('OfficeWalletsManageDelete')) : ?>
        
                <?=CHtml::linkButton('<span class="fa fa-trash"></span>',array(
                    'submit' => array('manage/delete', 'wallet' => $wallet->id, 'user' => $profile->user->id, 'page' => $currentPage),
                    'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
                    'confirm' => Yii::t('app', 'Удалить кошелек пользователя') . ' ' . $profile->user->username . '?',
					'class' => 'wallets-action-icon font-grey-cascade tooltips mr5',
					'data-container' => 'body',
					'data-placement' => 'top', 
					'data-original-title' => Yii::t('app', 'Удалить'),
				));  ?>
        
            <? endif; ?>
        
        <? elseif ($wallet->status->alias == 'blocked') : ?>
        
            <? if (Yii::app()->user->checkAccess('OfficeWalletsManageMoneylist')) : ?>
        
                <?=CHtml::linkButton('<span class="fa fa-list"></span>',array(
                    'submit' => array('manage/moneylist', 'wallet' => $wallet->id, 'user' => $profile->user->id, 'page' => $currentPage),
                    'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
					'class' => 'wallets-action-icon font-grey-cascade tooltips mr5',
					'data-container' => 'body',
					'data-placement' => 'top', 
					'data-original-title' => Yii::t('app', 'Список финансовых операций'),
				));  ?>
        
            <? endif; ?>                        
        
            <? if (Yii::app()->user->checkAccess('OfficeWalletsManageUnblock')) : ?>
        
                <?=CHtml::linkButton('<span class="fa fa-unlock-alt fa-lg unblock"></span>',array(
                    'submit' => array('manage/unblock', 'wallet' => $wallet->id, 'user' => $profile->user->id, 'page' => $currentPage),
                    'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
                    'confirm' => Yii::t('app', 'Разблокировать кошелек пользователя') . ' ' . $profile->user->username . '?',
					'class' => 'wallets-action-icon font-grey-cascade tooltips mr5',
					'data-container' => 'body',
					'data-placement' => 'top', 
					'data-original-title' => Yii::t('app', 'Разблокировать'),
				));  ?>
        
            <? endif; ?>
        
            <? if (Yii::app()->user->checkAccess('OfficeWalletsManageDelete')) : ?>
        
                <?=CHtml::linkButton('<span class="fa fa-trash"></span>',array(
                    'submit' => array('manage/delete', 'wallet' => $wallet->id, 'user' => $profile->user->id, 'page' => $currentPage),
                    'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
                    'confirm' => Yii::t('app', 'Удалить кошелек пользователя') . ' ' . $profile->user->username . '?',
					'class' => 'wallets-action-icon font-grey-cascade tooltips mr5',
					'data-container' => 'body',
					'data-placement' => 'top', 
					'data-original-title' => Yii::t('app', 'Удалить'),
				));  ?>
        
            <? endif; ?>                        
        
        <? elseif ($wallet->status->alias == 'delete') : ?>
        
            <? if (Yii::app()->user->checkAccess('OfficeWalletsManageRestore')) : ?>
        
                <?=CHtml::linkButton('<span class="fa fa-share-square fa-flip-horizontal restore"></span>',array(
                    'submit' => array('manage/restore', 'wallet' => $wallet->id, 'user' => $profile->user->id, 'page' => $currentPage),
                    'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
                    'confirm' => Yii::t('app', 'Восстановить кошелек пользователя') . ' ' . $profile->user->username . '?',
					'class' => 'wallets-action-icon font-grey-cascade tooltips mr5',
					'data-container' => 'body',
					'data-placement' => 'top', 
					'data-original-title' => Yii::t('app', 'Восстановить'),
				));  ?>
        
            <? endif; ?>                                                
        
        <? endif; ?>
    </td>
</tr>