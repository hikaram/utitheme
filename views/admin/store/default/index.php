<div class="row">
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 margin-bottom-10">
        <div class="dashboard-stat blue-madison">
            <div class="visual">
                <i class="fa fa-briefcase fa-icon-medium"></i>
            </div>
            <div class="details">
                <div class="number">
                    <?=$mainCurrencyAbbr?> <?=number_format($totalSum, 2, '.', ' ' )?> (<?=(int)$totalCount?>)
                </div>
                <div class="desc">
                    <?=Yii::t('app', 'Совершено заказов на сумму')?>
                </div>
            </div>
            <a class="more" href="<?=$this->createUrl('/admin/store/orders')?>">
            <?=Yii::t('app', 'Просмотреть')?> <i class="m-icon-swapright m-icon-white"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <div class="dashboard-stat red-intense">
            <div class="visual">
                <i class="fa fa-shopping-cart"></i>
            </div>
            <div class="details">
                <div class="number">
                    <?=$mainCurrencyAbbr?> <?=number_format($totalSumConfirm, 2, '.', ' ' )?> (<?=(int)$totalCountConfirm?>)
                </div>
                <div class="desc">
                    <?=Yii::t('app', 'Подтвержденных заказов на сумму')?>
                </div>
            </div>
            <a class="more" href="<?=$this->createUrl('/admin/store/orders')?>">
            <?=Yii::t('app', 'Просмотреть')?> <i class="m-icon-swapright m-icon-white"></i>
            </a>
        </div>
    </div>
    <? if ((bool)$isSwitchedPoints) : ?>
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="dashboard-stat green-haze">
                <div class="visual">
                    <i class="fa fa-group fa-icon-medium"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <?=sprintf('%.0f', $totalPointsConfirm)?> (<?=(int)$totalCountConfirm?>)
                    </div>
                    <div class="desc">
                        <?=Yii::t('app', 'Баллообъем подтвержденных заказов')?>
                    </div>
                </div>
                <a class="more" href="<?=$this->createUrl('/admin/store/orders')?>">
                <?=Yii::t('app', 'Просмотреть')?> <i class="m-icon-swapright m-icon-white"></i>
                </a>
            </div>
        </div>
    <? endif; ?>
</div>
<div class="row">
    <div class="col-md-6">
        <!-- Begin: life time stats -->
        <div class="portlet box blue-steel">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-thumb-tack"></i><?=Yii::t('app', 'Статистика по заказам')?>
                </div>
            </div>
            <div class="portlet-body">
                <div class="tabbable-line">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="#overview_1" data-toggle="tab">
                            <?=Yii::t('app', 'Топ продаж')?> </a>
                        </li>
                        <li>
                            <a href="#overview_2" data-toggle="tab">
                            <?=Yii::t('app', 'Наиболее просматриваемые')?> </a>
                        </li>
                        <? if (Yii::app()->isModuleInstall('AdminUser')) : ?>
                            <li>
                                <a href="#overview_3" data-toggle="tab">
                                <?=Yii::t('app', 'Заказы пользователей')?> </a>
                            </li>
                        <? endif; ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <?=Yii::t('app', 'Заказы')?> <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="#overview_4" tabindex="-1" data-toggle="tab" class="table-order-status-check" data-status="<?=Horders::EMPTY_VALUE?>">
                                    <?=Yii::t('app', 'Последние')?> <?=Horders::DEFAULT_MAIN_PAGE_COUNT?> <?=Yii::t('app', 'заказов')?> </a>
                                </li>
                                <? foreach ($lastOrders as $orderStatus => $lastOrder) : ?>
                                    <? if (!empty($lastOrder['title'])) : ?>
                                        <li>
                                            <a href="#overview_4" tabindex="-1" data-toggle="tab" class="table-order-status-check" data-status="<?=$orderStatus?>">
                                            <?=$lastOrder['title']?> </a>
                                        </li>
                                    <? endif; ?>
                                <? endforeach; ?>
                            </ul>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="overview_1">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th><?=Yii::t('app', 'Продукт')?></th>
                                            <th><?=Yii::t('app', 'Цена')?></th>
                                            <th><?=Yii::t('app', 'Количество продаж')?></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <? foreach ($topSellingProducts as $topSellingProduct) : ?>
                                            <tr>
                                                <td><?=CHtml::link(CHtml::encode($topSellingProduct->product->lang->name), $this->createUrl('/admin/catalog/products/view', ['id' => $topSellingProduct->product->id]), ['target' => '_blank'])?></td>
                                                <td><?=sprintf('%.2f', $topSellingProduct->product->price)?> <?=$topSellingProduct->product->currency->symbol?></td>
                                                <td><?=(int)$topSellingProduct->count?></td>
                                                <td><?=CHtml::link(Yii::t('app', 'Просмотреть'), $this->createUrl('/store/product/view', ['id' => $topSellingProduct->product->id]), ['target' => '_blank', 'class' => 'btn default btn-xs green-stripe'])?></td>
                                            </tr>
                                        <? endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="overview_2">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th><?=Yii::t('app', 'Продукт')?></th>
                                            <th><?=Yii::t('app', 'Цена')?></th>
                                            <th><?=Yii::t('app', 'Количество просмотров')?></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <? foreach ($topViewed as $topProduct) : ?>
                                            <tr>
                                                <td><?=CHtml::link(CHtml::encode($topProduct->product->lang->name), $this->createUrl('/admin/catalog/products/view', ['id' => $topProduct->product->id]), ['target' => '_blank'])?></td>
                                                <td><?=sprintf('%.2f', $topProduct->product->price)?> <?=$topProduct->product->currency->symbol?></td>
                                                <td><?=(int)$topProduct->view_count?></td>
                                                <td><?=CHtml::link(Yii::t('app', 'Просмотреть'), $this->createUrl('/store/product/view', ['id' => $topProduct->product->id]), ['target' => '_blank', 'class' => 'btn default btn-xs green-stripe'])?></td>
                                            </tr>
                                        <? endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <? if (Yii::app()->isModuleInstall('AdminUser')) : ?>
                            <div class="tab-pane" id="overview_3">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover table-bordered">
                                        <thead>
                                            <tr>
                                                <th><?=Yii::t('app', 'Логин пользователя')?></th>
                                                <th><?=Yii::t('app', 'Количество заказов')?></th>
                                                <th><?=Yii::t('app', 'Сумма заказов')?></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <? foreach ($topBuyers as $topBuyer) : ?>
                                                <tr>
                                                    <td>
                                                        <? if (Yii::app()->user->checkAccess('AdminUserUserView')) : ?>
                                                            <?=CHtml::link(CHtml::encode($topBuyer->user->username) . ' (' . CHtml::encode($topBuyer->user->profile->lang->last_name) . ' ' . CHtml::encode($topBuyer->user->profile->lang->first_name) . ')', $this->createUrl('/admin/user/user/view', ['id' => sha1($topBuyer->user->id)]), ['target' => '_blank'])?>
                                                        <? else : ?>
                                                            <?=CHtml::encode($topBuyer->user->username)?> (<?=CHtml::encode($topBuyer->user->profile->lang->last_name)?> <?=CHtml::encode($topBuyer->user->profile->lang->first_name)?>)
                                                        <? endif; ?>
                                                    </td>
                                                    <td><?=(int)$topBuyer->totalcount?></td>
                                                    <td><?=sprintf('%.2f', $topBuyer->total_price)?> <?=$mainCurrencyAbbr?></td>
                                                    <td><?=CHtml::link(Yii::t('app', 'Просмотреть'), 'javascript: void(0)', ['onClick' => 'saveFilterForOrder("' . CHtml::encode($topBuyer->user->username) . '")', 'class' => 'btn default btn-xs green-stripe'])?></td>
                                                </tr>  
                                            <? endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        <? endif; ?>
                        <div class="tab-pane" id="overview_4">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th><?=Yii::t('app', 'Покупатель')?></th>
                                            <th><?=Yii::t('app', 'Дата')?></th>
                                            <th><?=Yii::t('app', 'Сумма заказа')?></th>
                                            <th><?=Yii::t('app', 'Статус')?></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <? foreach ($lastOrders as $orderStatus => $lastOrder) : ?>
                                            <? foreach ($lastOrder['result'] as $lastOrderDataset) : ?>
                                                <tr style="display: none;" class="table-order-status table-order-status-<?=$orderStatus?>">
                                                    <td><?=CHtml::encode($lastOrderDataset->last_name)?> <?=CHtml::encode($lastOrderDataset->first_name)?></td>
                                                    <td><?=MSmarty::date_format($lastOrderDataset->created_at, 'd.m.Y H:i'); ?></td>
                                                    <td><?=sprintf('%.2f', $lastOrderDataset->total_price)?> <?=$mainCurrencyAbbr?></td>
                                                    <td>
                                                        <? if ($lastOrderDataset->status == Horders::STATUS_NEW) : ?>
                                                            <? $class = 'label-warning'; ?>
                                                        <? elseif ($lastOrderDataset->status == Horders::STATUS_PROCESSING) : ?>
                                                            <? $class = 'label-info'; ?>
                                                        <? elseif ($lastOrderDataset->status == Horders::STATUS_DELIVERING) : ?>
                                                            <? $class = 'label-info'; ?>
                                                        <? elseif ($lastOrderDataset->status == Horders::STATUS_CLOSED) : ?>
                                                            <? $class = 'label-success'; ?>
                                                        <? else : ?>
                                                            <? $class = 'label-danger'; ?>
                                                        <? endif; ?>
                                                        <span class="label label-sm <?=$class?>">
                                                        <?=CHtml::encode(Horders::gridStatusItem($lastOrderDataset->status));?> </span>
                                                    </td>
                                                    <td><?=CHtml::link(Yii::t('app', 'Просмотреть'), $this->createUrl('/admin/store/orders/view', ['id' => $lastOrderDataset->id]), ['target' => '_blank', 'class' => 'btn default btn-xs green-stripe'])?></td>
                                                </tr>
                                            <? endforeach; ?>
                                        <? endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End: life time stats -->
    </div>
    <div class="col-md-6">
        <!-- Begin: life time stats -->
        <div class="portlet box red-sunglo tabbable">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-bar-chart-o"></i><?=Yii::t('app', 'График заказов за пол года')?>
                </div>
            </div>
            <div class="portlet-body">
                <div class="portlet-tabs">
                    <ul class="nav nav-tabs" style="margin-right: 50px">
                        <? if ((bool)$isSwitchedPoints) : ?>
                            <li>
                                <a href="#portlet_tab3" data-toggle="tab" id="statistics_points_tab">
                                <?=Yii::t('app', 'Баллы')?> </a>
                            </li>
                        <? endif; ?>
                        <li>
                            <a href="#portlet_tab2" data-toggle="tab" id="statistics_amounts_tab">
                            <?=Yii::t('app', 'Суммы')?> </a>
                        </li>
                        <li class="active">
                            <a href="#portlet_tab1" data-toggle="tab">
                            <?=Yii::t('app', 'Заказы')?> </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="portlet_tab1">
                            <div id="statistics_1" class="chart">
                            </div>
                        </div>
                        <div class="tab-pane" id="portlet_tab2">
                            <div id="statistics_2" class="chart">
                            </div>
                        </div>
                        <div class="tab-pane" id="portlet_tab3">
                            <div id="statistics_3" class="chart">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="well no-margin no-border">
                    <div class="row">
                        <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
                            <span class="label label-success">
                            <?=Yii::t('app', 'Сумма')?>: </span>
                            <h3><?=$mainCurrencyAbbr?> <?=number_format($getWeekStat['totalSum'], 2, '.', ' ' )?></h3>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
                            <span class="label label-warning">
                            <?=Yii::t('app', 'Количество')?>: </span>
                            <h3><?=(int)$getWeekStat['totalCount']?></h3>
                        </div>
                        <? if ((bool)$isSwitchedPoints) : ?>
                            <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
                                <span class="label label-info">
                                <?=Yii::t('app', 'Баллы')?>: </span>
                                <h3><?=(int)$getWeekStat['totalPoints']?></h3>
                            </div>
                        <? endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- End: life time stats -->
    </div>
</div>

<?=CHtml::hiddenField(FALSE, $mainCurrencyAbbr, ['id' => 'mainCurrencyAbbr'])?>
<script>
    $(function(){
        graph.setDataCount('<?=Horders::getJsFormatForGraph($getGraphStat["count"])?>');
        graph.setDataAmount('<?=Horders::getJsFormatForGraph($getGraphStat["amount"])?>');
        graph.setDataPoints('<?=Horders::getJsFormatForGraph($getGraphStat["points"])?>');    
    });
</script>