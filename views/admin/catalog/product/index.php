<?=CHtml::hiddenField('asseturl', Yii::app()->assetManager->getPublishedUrl(Yii::getPathOfAlias('store.css')), array('id' => 'asseturl'))?>

<? if ((empty($list)) && (empty($filter))) : ?>
    <div class="note note-success"><?=Yii::t('app', 'Продукты не созданы')?>.</div>
    <? if (Yii::app()->user->checkAccess('AdminCatalogProductsCreate')) : ?>
        <? if ((bool)$allowedCreateProduct) : ?>
            <?=Yii::t('app', 'Вы можете')?> <a href="<?=$this->createUrl('create')?>"><?=Yii::t('app', 'добавить новый')?></a> <?=Yii::t('app', 'продукт')?>
        <? else : ?>
            <div class="note note-warning">
                <?=Yii::t('app', 'Чтобы добавить новый продукт создайте')?> <?=CHtml::link(Yii::t('app', 'валюту товара'), $this->createUrl('/admin/catalog/currencies/create'))?> <br />
                <?=Yii::t('app', 'и как минимум один')?> <?=CHtml::link(Yii::t('app', 'каталог продукции'), $this->createUrl('/admin/catalog/catalogues/create'))?>.
            </div>
        <? endif; ?>    
    <? endif; ?>
<? else : ?>
    <div class="portlet box yellow">
        <div class="portlet-title">
            <h3 class="caption">
                <i class="fa fa-exchange"></i><?=Yii::t('app', 'Продукты')?>
            </h3>
        </div>
        <div class="portlet-body">

            <div class="note note-info">
                <h4 style="margin-bottom: 0;">
                    <?=Yii::t('app', 'Всего товаров: ')?><?=$totalCount?>. <?=Yii::t('app', 'На сумму: ')?><?=sprintf('%.2f', $totalSumGeneral)?> <?=$mainCurrencyAbbr?>
                    <? if (!empty($filter)) : ?>
                        <br />
                        <?=Yii::t('app', 'По запросу найдено: ')?><?=$count?> <?=Yii::t('app', 'на сумму: ')?><?=sprintf('%.2f', $totalSum)?> <?=$mainCurrencyAbbr?>
                    <? endif; ?>
                </h4>
            </div>        

            <?php echo $this->renderPartial('_filter', [
                'filter'            => $filter,
                'min_sum'           => $min_sum,
                'max_sum'           => $max_sum,
                'specialStatuses'   => $specialStatuses
            ]); ?>

            <? if (empty($list)) : ?>
            
                <div class="note note-danger" style="margin-top: 20px;">
                    <p>
                        <?=Yii::t('app', 'Не найдено ни одного продукта, удовлетворяющего условиям фильтрации. Сбросьте фильтр или измените поисковые данные')?>
                    </p>
                </div>             

            <? else : ?>

                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="dataTables_length" id="objects_length">
                            <label>  
                                <select id="pageSizeSeletor" name="objects_length" aria-controls="objects" class="form-control input-xsmall input-inline" onChange="changePageSize()">
                                    <option value="25" <? if ($unit == 25) : ?>selected="selected"<? endif; ?>>25</option>
                                    <option value="50" <? if ($unit == 50) : ?>selected="selected"<? endif; ?>>50</option>
                                    <option value="100" <? if ($unit == 100) : ?>selected="selected"<? endif; ?>>100</option>
                                </select> <?=Yii::t('app', 'записей на странице')?>
                            </label>
                        </div>
                        <div id="objects_filter" class="dataTables_filter">
                            <?= CHtml::beginForm() ?>
                                <label><?=Yii::t('app','Введите свое значение')?>:
                                    <?= CHtml::textField('unit', '', array('size' => '5', 'class' => 'form-control input-xsmall input-inline'))?>
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
                                <th><?=CHtml::encode(ProductsLang::model()->getAttributeLabel('name')); ?></th>
                                <th><?=CHtml::encode(Products::model()->getAttributeLabel('article')); ?></th>
                                <th><?=CHtml::encode(Products::model()->getAttributeLabel('catalogues')); ?></th>
                                <th><?=CHtml::encode(Products::model()->getAttributeLabel('price')); ?></th>                                
                                <th><?=CHtml::encode(Products::model()->getAttributeLabel('status')); ?></th>
                                <? if ((bool)$isPoints) : ?>
                                    <th><?=CHtml::encode(Products::model()->getAttributeLabel('points')); ?></th>    
                                <? endif; ?>
                                <th><?=CHtml::encode(Products::model()->getAttributeLabel('available')); ?></th>
                                <? if (!empty($specialStatuses)) : ?>
                                    <th><?=CHtml::encode(Products::model()->getAttributeLabel('product_special_statuses__id')); ?></th>
                                <? endif; ?>
                                <th><?=Yii::t('app','Операции');?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <? foreach ($list as $product) : ?>
                                <tr>
                                    <td><?=CHtml::encode($product->lang->name);?></td>
                                    <td><?=CHtml::encode($product->article);?></td>
                                    <td>
                                        <? foreach ($product->catalogues as $key => $catalogues) : ?>
                                            <?=CHtml::encode($catalogues->lang->name)?><br />
                                        <? endforeach ?>
                                    </td>
                                    <td>
                                        <?=sprintf('%.2f', $product->price)?> <?=$product->currency->symbol?>
                                    </td>
                                    <td>
                                        <? if ($product->status == Products::STATUS_ACTIVE) : ?>
                                            <span class="label label-sm label-success"><?=Yii::t('app', 'Активен')?></span>
                                        <? elseif ($product->status == Products::STATUS_UNACTIVE) : ?>
                                            <span class="label label-sm label-info"><?=Yii::t('app', 'Неактивен')?></span>
                                        <? elseif ($product->status == Products::STATUS_DELETE) : ?>
                                            <span class="label label-sm label-danger"><?=Yii::t('app', 'Удален')?></span>
                                        <? endif; ?>
                                    </td>
                                    <? if ((bool)$isPoints) : ?>
                                        <td><?=(int)$product->points?></td>
                                    <? endif; ?>
                                    <td>
                                        <? if ($product->available == Products::AVAILABLE_EXIST) : ?>
                                            <?=CHtml::link('<i class="fa fa-check"></i>', 'javascript: void(0)', ['style' => 'cursor: default;', 'class' => 'btn btn-xs btn-icon green tooltips', 'data-placement' => 'top', 'data-original-title' => Yii::t('app', 'В наличии')])?>
                                        <? elseif ($product->available == Products::AVAILABLE_IS_EXPECTED) : ?>
                                            <?=CHtml::link('<i class="fa fa-refresh"></i>', 'javascript: void(0)', ['style' => 'cursor: default;', 'class' => 'btn btn-xs btn-icon blue-madison tooltips', 'data-placement' => 'top', 'data-original-title' => Yii::t('app', 'Ожидается поступление')])?>
                                        <? elseif ($product->available == Products::AVAILABLE_OUT_OF_STOCK) : ?>
                                            <?=CHtml::link('<i class="fa fa-times"></i>', 'javascript: void(0)', ['style' => 'cursor: default;', 'class' => 'btn btn-xs btn-icon blue-madison tooltips', 'data-placement' => 'top', 'data-original-title' => Yii::t('app', 'Нет на складе')])?>
                                        <? endif; ?>
                                    </td>
                                    <? if (!empty($specialStatuses)) : ?>
                                        <td>
                                            <? if ($product->specialStatus != NULL) : ?>
                                                <?=CHtml::encode($product->specialStatus->lang->name)?>
                                            <? endif; ?>
                                        </td>
                                    <? endif; ?>
                                    <td style="white-space: nowrap; word-wrap: normal;">

                                        <? if (($product->created_at != NULL) || ($product->creator != NULL) || ($product->modified_at != NULL) || ($product->redactor != NULL)) : ?>
                                            <span type="button" class="btn blue-steel popovers"
                                                data-trigger="hover" 
                                                data-placement="left" 
                                                data-html="true"
                                                data-content="
                                                    <? if ($product->created_at != NULL) : ?>
                                                        <span class='text-semibold'><?=Yii::t('app', 'Дата создания')?>:</span>
                                                        <?=MSmarty::date_format($product->created_at, 'd.m.Y')?> <?=MSmarty::date_format($product->created_at, 'H:i')?><br/>
                                                    <? endif; ?>
                                                    <? if ($product->creator != NULL) : ?>
                                                        <span class='text-semibold'><?=Yii::t('app', 'Автор')?>:</span>
                                                        <?=$product->creator->username?><br/>
                                                    <? endif; ?>
                                                    <? if ($product->modified_at != NULL) : ?>
                                                        <span class='text-semibold'><?=Yii::t('app', 'Дата редактирования')?>:</span>
                                                        <?=MSmarty::date_format($product->modified_at, 'd.m.Y')?> <?=MSmarty::date_format($product->modified_at, 'H:i')?><br/>
                                                    <? endif; ?>
                                                    <? if ($product->redactor != NULL) : ?>
                                                        <span class='text-semibold'><?=Yii::t('app', 'Логин редактировавшего')?>:</span>
                                                        <?=$product->redactor->username?><br/>
                                                    <? endif; ?>
                                                " 
                                                data-original-title="<?=Yii::t('app', 'Дополнительная информация')?>"
                                            >
                                                <i class="fa fa-info"></i>
                                            </span>
                                        <? endif; ?>

                                        <? if (Yii::app()->user->checkAccess('AdminCatalogProductsUpdate')) : ?>
                                            <?=CHtml::link('<button class="btn green-seagreen"><i class="glyphicon glyphicon-pencil"></i></button>', $this->createUrl('/admin/catalog/product/create', ['action' => 'edit', 'id' => sha1($product->id)])); ?>

                                            <? if ($product->status != Products::STATUS_DELETE) : ?>
                                                <?=CHtml::linkButton('<i class="glyphicon glyphicon-remove"></i>',array(
                                                    'submit' => array('product/delete', 'id' => sha1($product->id)),
                                                    'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
                                                    'confirm' => Yii::t('app', 'Удалить продукт ?'),
                                                    'class' => 'btn red',
                                                ));  ?>
                                            <? endif; ?>
                                        <? endif; ?>
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

            <div class="form-actions">
                <? if (Yii::app()->user->checkAccess('AdminCatalogProductsCreate')) : ?>
                    <?=CHtml::link(Yii::t('app', 'Добавить продукт'), $this->createUrl('create'), array('class' => 'btn green'));?>
                <? endif; ?>
            </div> 

        </div>

               
        
    </div>
        
<? endif; ?>