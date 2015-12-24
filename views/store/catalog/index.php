<style>
.pagination > li > a:hover {
    background: #555 none repeat scroll 0 0;
    color: #fff;
}

.page.selected > a{
    background: #868c93 none repeat scroll 0 0;
    color: #fff;
}
.list-group
{
	margin-bottom: 0 !important;
}
</style>

<div class="row margin-bottom-40">
	<div class="sidebar col-md-3 col-sm-4">
		<?php $this->widget('application.modules.store.widgets.CatalogNavigationWidget');?>
	</div>
	<div class="col-md-9 col-sm-8">
		
		<? if ((bool)$modelCurrentCatalog->is_content_page): ?>
			<?=$modelCurrentCatalog->lang->description?>
		<? else: ?>
			<?=CHtml::hiddenField(FALSE, CHtml::encode($modelCurrentCatalog->url), ['id' => 'catalogUrl'])?>

            <? if (!empty($modelCatalogues)) : ?>
                <? foreach($modelCatalogues as $modelCatalog) : ?>
                    
                    <div class="col-md-4">
                        <a href="<?=$modelCatalog->url?>" style="text-decoration: none; color: #3e4d5c;">
                            <div class="service-box-v1 catalog-block-wrapper">
                                <div>
                                    <? if (($modelCatalog->attachment != NULL) && ($modelCatalog->attachment->secret_name != null)) : ?>
                                        <?=CHtml::image(MSmarty::attachment_get_file_name($modelCatalog->attachment->secret_name, $modelCatalog->attachment->raw_name, $modelCatalog->attachment->file_ext, '_main', 'catalogues'), ''); ?>
                                    <? endif ; ?>
                                </div>
                                <h2><?=CHtml::encode($modelCatalog->lang->name)?></h2>
                                <?=$modelCatalog->lang->description?>
                            </div>
                        </a>
                    </div>

                <? endforeach; ?>

                <div class="clearfix separator clear"></div>
                <br /><br /><br />

            <? endif; ?>

            <? if (!empty($modelsProducts)) : ?>

    			<div class="row list-view-sorting clearfix">
    				<div class="col-md-2 col-sm-2 list-view">
    					<a href="#"><i class="fa fa-th-large"></i></a>
    					<a href="#"><i class="fa fa-th-list"></i></a>
    				</div>
    				<div class="col-md-10 col-sm-10">
    					<div class="pull-right">
    					<label class="control-label"><?=Yii::t('app', 'Показывать')?>:</label>
    					<select id="pageSizeSeletor" class="form-control input-sm" onChange="changePageSizeAndSort()">
    						<option value="25" <? if ($unit == 25) : ?>selected="selected"<? endif; ?>>25</option>
    						<option value="50" <? if ($unit == 50) : ?>selected="selected"<? endif; ?>>50</option>
    						<option value="75" <? if ($unit == 75) : ?>selected="selected"<? endif; ?>>75</option>
    						<option value="100" <? if ($unit == 100) : ?>selected="selected"<? endif; ?>>100</option>
    					</select>
    					</div>
    					<div class="pull-right">
    						<label class="control-label"><?=Yii::t('app', 'Сортировать')?>:</label>
    						<select id="sortSizeSeletor" class="form-control input-sm" onChange="changePageSizeAndSort()">
    							<? foreach ($sortOptions as $sortOptionKey => $sortOptionName) : ?> ?>
    								<option value="<?=CHtml::encode($sortOptionKey)?>" <? if ($sort == CHtml::encode($sortOptionKey)) : ?>selected="selected"<? endif; ?>><?=CHtml::encode($sortOptionName)?></option>
    							<? endforeach; ?>
    						</select>
    					</div>
    				</div>
    			</div>

            <? endif; ?>
			<!-- BEGIN PRODUCT LIST -->
			<div class="row product-list">
			<!-- PRODUCT ITEM START -->

                <? if ((empty($modelsProducts)) && ($id > (int)FALSE)) : ?>

                    <div class="row quote-v1 margin-bottom-30">
                        <div class="col-md-8">
                            <span><?=Yii::t('app', 'Каталог наполняется товаром...')?></span>
                        </div>
                        <div class="col-md-4 text-right">
                            <?=CHtml::link('<i class="fa fa-rocket margin-right-10"></i>' . Yii::t('app', 'в Интернет-магазин'), $this->createUrl('/store/catalog'), ['class' => 'btn-transparent'])?>
                        </div>
                    </div>

                <? else : ?>

    				<? foreach ($modelsProducts as $products): ?>

    					<div class="col-md-4 col-sm-6 col-xs-12">
    						<div class="product-item">

                                <div class="product-item-preview-wrapper">

        							<? if ($products->getMainPicture() != NULL) : ?>
        								<div class="pi-img-wrapper">
        									<? $imgUrl = MSmarty::attachment_get_file_name($products->getMainPicture()->secret_name, $products->getMainPicture()->raw_name, $products->getMainPicture()->file_ext, '', 'products'); ?>
        									<img src="<?=$imgUrl?>" class="img-responsive" alt="<?=CHtml::encode($products->lang->name)?>">
        									<div>
        										<?=CHtml::link(Yii::t('app', 'Увеличить'), $imgUrl, ['class' => 'btn btn-default fancybox-button'])?>
        										<?=CHtml::link(Yii::t('app', 'Просмотреть'), ['product/view', 'id' => $products->id, 'catalog' => $modelCurrentCatalog->id], ['class' => 'btn btn-default'])?>
        									</div>
        								</div>							
        							<? else : ?>
        								<div class="pi-img-wrapper">
        									<img src="<?=Yii::app()->theme->baseUrl?>/public/store/default-no-image.png" class="img-responsive" alt="<?=CHtml::encode($products->lang->name)?>">
        								</div>							
        							<? endif; ?>

        							<h3>
        								<?=CHtml::link(CHtml::encode($products->lang->name), array('product/view', 'id' => $products->id, 'catalog' => $modelCurrentCatalog->id))?>
        							</h3>

                                </div>

                                <div class="product-item-buy-wrapper">
        							<div class="pi-price"><?=$products->currency->symbol?> <?=number_format($products->price, 2, '.', '')?></div>
        							<? if ($products->available == Products::AVAILABLE_EXIST) : ?>
        								<a href="javascript:void(0)" onclick="add(<?=$products->getPrimaryKey()?>, 1, $(this))" class="btn btn-default add2cart"><?=Yii::t('app', 'Купить')?></a>
        							<? endif; ?>
                                </div>
                                <? /*
                                <div class="clearfix separator clear"></div>
                                <span class="product-details">
                                    <?=$products->lang->brief_text?>
                                </span>
                                */ ?>

                                <? if ($products->specialStatus != NULL) : ?>
                                    <div class="sticker sticker-<?=CHtml::encode($products->specialStatus->alias)?>"></div>
                                <? endif; ?>

                                <br /><br />
    						</div>
    					</div>
    					
    				<? endforeach ?>

                <? endif; ?>
	
			<!-- PRODUCT ITEM END -->
			</div>
			<!-- END PRODUCT LIST -->
			<!-- BEGIN PAGINATOR -->
            <? if (!empty($modelsProducts)) : ?>
    			<div class="row">
    				<div class="col-md-4 col-sm-4 items-info"><?=Yii::t('app', 'Товары')?> <?=Yii::t('app', 'от')?> <?=($pages->offset + 1)?> <?=Yii::t('app', 'до')?> <? if (($pages->offset + $pages->limit) < $count) : ?><?=($pages->offset + $pages->limit)?><? else : ?><?=$count?><? endif; ?> <?=Yii::t('app', 'из')?> <?=$count?></div>
    				<div class="col-md-8 col-sm-8">
    					<? $this->widget('CLinkPager',
    						[	'pages' => $pages, 
    							'prevPageLabel' => '&laquo;',
    							'nextPageLabel' => '&raquo;',
    							'header' => '',
    							'maxButtonCount' => 5,
    							'htmlOptions' => array('class' => 'pagination pull-right')
    						])?>
    				</div>
    			</div>
            <? endif; ?>

		<? endif ?>
	</div>
</div>