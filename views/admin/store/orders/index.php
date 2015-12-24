<?=CHtml::hiddenField('asseturl', Yii::app()->assetManager->getPublishedUrl(Yii::getPathOfAlias('store.css')), array('id' => 'asseturl'))?>

<? if ((empty($model)) && (empty($filter))) : ?>
    <div class="note note-success"><?=Yii::t('app', 'Заказы еще не созданы')?>.</div>
<? else : ?>
    <div class="portlet box yellow">
        <div class="portlet-title">
            <h3 class="caption">
                <i class="fa fa-exchange"></i><?=Yii::t('app', 'Заказы')?>
            </h3>
        </div>
        <div class="portlet-body">

            <div class="note note-info">
                <h4 style="margin-bottom: 0;"><?=Yii::t('app', 'Всего заказов: ')?><?=$totalCount?>. <?=Yii::t('app', 'На сумму: ')?><?=sprintf('%.2f', $totalSum)?> <?=$mainCurrencyAbbr?></h4>
                <h4 style="margin-bottom: 0;"><?=Yii::t('app', 'Из них подтвержденных заказов: ')?><?=$totalCountConfirmed?>. <?=Yii::t('app', 'На сумму: ')?><?=sprintf('%.2f', $totalSumConfirmed)?> <?=$mainCurrencyAbbr?></h4>
                <? if (!empty($filter)) : ?>
                    <h4 style="margin-bottom: 0;"><?=Yii::t('app', 'По запросу найдено: ')?><?=$totalCriteriaCount?>. <?=Yii::t('app', 'На сумму: ')?><?=sprintf('%.2f', $totalCriteriaSum)?> <?=$mainCurrencyAbbr?></h4>
                <? endif; ?>
            </div>

            <?php echo $this->renderPartial('_filter', [
                'filter'        => $filter,
                'min_sum'       => $min_sum,
                'max_sum'       => $max_sum,
                'sessionGuid'   => $sessionGuid
            ]); ?>

            <? if (empty($model)) : ?>
            
                <div class="note note-danger" style="margin-top: 20px;">
                    <p>
                        <?=Yii::t('app', 'Не найдено ни одного заказа, удовлетворяющего условиям фильтрации. Сбросьте фильтр или измените поисковые данные')?>
                    </p>
                </div>             

            <? else : ?>

                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="dataTables_length" id="objects_length" style="display: inline-block;">
                            <label>  
                                <select id="pageSizeSeletor" name="objects_length" aria-controls="objects" class="form-control input-xsmall input-inline" onChange="changePageSize()">
                                    <? if (!in_array($unit, [25, 50, 100])) : ?>
                                        <option value="" selected="selected"></option>
                                    <? endif; ?>
                                    <option value="25" <? if ($unit == 25) : ?>selected="selected"<? endif; ?>>25</option>
                                    <option value="50" <? if ($unit == 50) : ?>selected="selected"<? endif; ?>>50</option>
                                    <option value="100" <? if ($unit == 100) : ?>selected="selected"<? endif; ?>>100</option>
                                </select> <?=Yii::t('app', 'записей на странице')?>
                            </label>
                        </div>
                        <div id="objects_filter" class="dataTables_filter" style="display: inline-block; margin-left: 20px;">
                            <?= CHtml::beginForm() ?>
                                <label><?=Yii::t('app','Введите свое значение')?>:
                                    <input type="number" min="1" max="500" value="<?=$unit?>" step="1" size="7" class="form-control input-xsmall input-inline" name="unit" />
                                </label>        
                                <?php echo CHtml::submitButton(Yii::t('app', 'Применить'), array('name' => 'btn-unit', 'class' => 'btn green', 'style' => 'float: none;')); ?>
                            <?= CHtml::endForm() ?>                                
                        </div>
                    </div>
                    
                    <div class="col-md-6 col-sm-12">

                    </div>
                </div>

                <div class="table-scrollable">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th><?=CHtml::encode(Horders::model()->getAttributeLabel('num')); ?></th>
                                <th><?=CHtml::encode(Users::model()->getAttributeLabel('username')); ?></th>
                                <th><?=CHtml::encode(Horders::model()->getAttributeLabel('total_price')); ?></th>
                                <? if ((bool)$isPoints) : ?>
                                    <th><?=CHtml::encode(Horders::model()->getAttributeLabel('total_points')); ?></th>
                                <? endif; ?>
                                <th><?=CHtml::encode(Horders::model()->getAttributeLabel('created_at')); ?></th>
                                <th><?=CHtml::encode(Horders::model()->getAttributeLabel('status')); ?></th>
                                <th><?=CHtml::encode(Horders::model()->getAttributeLabel('is_payed')); ?></th>
                                <th><?=Yii::t('app','Операции');?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <? foreach ($model as $order) : ?>
                                <tr>
                                    <td><?=CHtml::encode($order->num);?></td>
                                    <td>
                                        <? if ((bool)$order->is_unregistered_customer) : ?>
                                            <?=Yii::t('app', 'Гость')?>
                                        <? else : ?>
                                            <? if ($order->user == NULL) : ?>
                                                <span style="color: red;"><?=Yii::t('app', 'Пользователь не найден')?></span>
                                            <? else : ?>
                                                <?=CHtml::encode($order->user->username)?>
                                            <? endif; ?>
                                        <? endif; ?>
                                    </td>
                                    <td><?=sprintf('%.2f', $order->total_price)?> <?=$mainCurrencyAbbr?></td> 
                                    <? if ((bool)$isPoints) : ?>
                                        <td><?=CHtml::encode(round($order->total_points, 2));?></td> 
                                    <? endif; ?>
                                    <td>
                                        <?=MSmarty::date_format($order->created_at, 'd.m.Y')?> <?=MSmarty::date_format($order->created_at, '%H:%M')?>
                                    </td>
                                    <td>
                                        <? if ($order->status == Horders::STATUS_NEW) : ?>
                                            <? $class = 'label-warning'; ?>
                                        <? elseif ($order->status == Horders::STATUS_PROCESSING) : ?>
                                            <? $class = 'label-info'; ?>
                                        <? elseif ($order->status == Horders::STATUS_DELIVERING) : ?>
                                            <? $class = 'label-info'; ?>
                                        <? elseif ($order->status == Horders::STATUS_CLOSED) : ?>
                                            <? $class = 'label-success'; ?>
                                        <? else : ?>
                                            <? $class = 'label-danger'; ?>
                                        <? endif; ?>
                                        <span class="label label-sm <?=$class?>"><?=CHtml::encode(Horders::gridStatusItem($order->status));?></span>                                        
                                    </td>
                                    <td>
                                        <? if ((bool)$order->is_payed) : ?>
                                            <i class="fa fa-check font-green"></i>    
                                        <? else : ?>
                                            <i class="fa fa-times font-red"></i>
                                        <? endif; ?>
                                    </td> 
                                    <td>
                                        <?=CHtml::link('<button class="btn blue-steel"><i class="glyphicon glyphicon-eye-open"></i></button>', $this->createUrl('view', ['id' => $order->id]), [
                                            'class' => 'tooltips',
                                            'data-container' => 'body', 
                                            'data-placement' => 'bottom',
                                            'data-original-title' => Yii::t('app', 'Просмотр')
                                        ]); ?>
                                        <?=CHtml::link('<button class="btn green-seagreen"><i class="glyphicon glyphicon-pencil"></i></button>', $this->createUrl('update', ['id' => $order->id]), [
                                            'class' => 'tooltips',
                                            'data-container' => 'body', 
                                            'data-placement' => 'bottom',
                                            'data-original-title' => Yii::t('app', 'Редактировать')
                                        ]); ?>
                                    </td> 
                                </tr>
                            <? endforeach; ?>
                            
                        </tbody>
                    </table>
                </div>

                <? $this->widget('CLinkPager', array(
                    'pages' => $pages,
                    'nextPageLabel' => '<i class="fa fa-angle-double-right"></i>', 
                    'prevPageLabel' => '<i class="fa fa-angle-double-left"></i>', 
                    'header' => '',
                    'selectedPageCssClass' => 'active',
                    'htmlOptions' => array(
                        'class' => 'pagination'
                    )
                )) ?>
            
            <? endif; ?>

        </div>
        
    </div>
        
<? endif; ?>