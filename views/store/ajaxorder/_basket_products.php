<div id="basket">
	<div class="table-wrapper-responsive">
	<?
		#some php
		
		$points = 0;
		$counter = 1;
		$sum = 0;
	?>
		<table summary="Shopping cart" class="basket-table-products">
			<tr>
				<th class="goods-page-image"></th>
				<th class="goods-page-description"><?=Yii::t('app', 'Описание')?></th>
				<th class="goods-page-ref-no"><?=Yii::t('app', 'Артикул')?></th>
				<th class="goods-page-quantity"><?=Yii::t('app', 'Количество')?></th>
				<th class="goods-page-price"><?=Yii::t('app', 'Цена')?></th>
				<th class="goods-page-total" colspan="2"><?=Yii::t('app', 'Итоговая сумма')?></th>
			</tr>
			<? foreach ($baskets as $i => $basket): ?>
			<? Basket::addPriceToSummary($basket->product, $basket->count)?>
			<tr>
				
				<td class="goods-page-image">
				<a href="<?=$this->createUrl('/store/product/view/id/')?>/<?=$basket->product->id?>" class="fancybox-button" rel="photos-lib">
					<? $imgUrl = $basket->product->getMainPicture() != NULL ? MSmarty::attachment_get_file_name($basket->product->getMainPicture()->secret_name, $basket->product->getMainPicture()->raw_name, $basket->product->getMainPicture()->file_ext, '_main', 'products') : (Yii::app()->theme->baseUrl . '/public/store/default-no-image.png'); ?>
					<?=CHtml::image($imgUrl, $basket->product->lang->name, array('title' => $basket->product->lang->name, 'class' => 'cart-photo'))?>
				</a>
				</td>
				<td class="goods-page-description">
					<h3>
						<?=CHtml::link(CHtml::encode($basket->product->lang->name), 'javascript:void(0)')?>
					</h3>
					<? if (empty($basket->product->lang->order_description)) : ?>
						<?=$basket->product->lang->brief_text?>
					<? else : ?>
						<?=CHtml::encode($basket->product->lang->order_description)?>
					<? endif; ?>
				</td>
				<td class="goods-page-ref-no"><?=CHtml::encode($basket->product->article)?></td>
				<td class="goods-page-quantity">
					<div class="product-quantity" data-product-id="<?=$basket->product->id?>">
						<div class="input-group bootstrap-touchspin input-group-sm" >
							<span class="input-group-btn">
								<button type="button" class="btn quantity-down bootstrap-touchspin-down"><i class="fa fa-angle-down"></i></button>
							</span>
							<span class="input-group-addon bootstrap-touchspin-prefix" style="display: none;"></span>
							<input type="text" value="<?=$basket->count?>" readonly="" class="form-control input-sm input-product-count" style="display: block;" data-product-id="<?=$basket->product->id?>">
							<span class="input-group-addon bootstrap-touchspin-postfix" style="display: none;"></span>
							<span class="input-group-btn">
								<button type="button" class="btn quantity-up bootstrap-touchspin-up"><i class="fa fa-angle-up"></i></button>
							</span>
						</div>
					</div>
				</td>
<?/*				<td class="goods-page-quantity">
					<div class="product-quantity">
						<input class="form-control input-sm input-product-count" readonly type="text" value="<?=$basket->count?>" data-product-id="<?=$basket->product->id?>" />
					</div>
				</td>*/?>
				<td class="goods-page-price">
					<strong><span><?=$basket->product->currency->symbol?></span> <?=number_format($basket->product->price, 2, '.', '')?></strong><br/>
					<strong style="color: #bbb;"><?=number_format($basket->product->points, 2, '.', '')?> <span><?=Yii::t('app','баллов'); ?></span></strong><br/>
				</td>
				<td class="goods-page-total">
					<strong><span><?=$basket->product->currency->symbol?></span> <?=number_format($basket->product->price * $basket->count, 2, '.', '')?></strong><br/>
					<strong style="color: #bbb;"><?=number_format($basket->product->points * $basket->count, 2, '.', '')?> <span><?=Yii::t('app','баллов'); ?></span></strong><br/>
				</td>
				<td class="del-goods-col">
					<a class="del-goods delete" href="javascript:void(0)" data-product-id="<?=$basket->product->id?>">&nbsp;</a>
				</td>
			</tr>
			<? $points += number_format($basket->product->points * $basket->count, 2, '.', ''); ?>
			<? $sum += number_format($basket->product->price * $basket->count, 2, '.', ''); ?>
			<? $counter++; ?>
			<? endforeach; ?>
			
		</table>
	</div>
	<div class="shopping-total">
		<?if(isset($basket)):?>
		<ul>
			<li>
				<em><?=Yii::t('app', 'Итого')?></em>
				<strong class="price"><span><?=$basket->product->currency->symbol?></span> <?=$sum?></strong>
			</li>
			<li>
				<em><?=Yii::t('app', 'Баллов')?></em>
				<strong class="price" style="color: #bbb;"><?=$points?></strong>
			</li>
		</ul>
		<?endif;?>
	</div>
</div>