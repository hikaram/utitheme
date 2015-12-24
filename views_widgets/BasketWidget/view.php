<?php
/**
 * @var string $basketButtonText надпись на кнопке
 */
?>
<div class="top-cart-info">
	<a href="javascript:void(0);" class="top-cart-info-count"><?=$basketCount?> шт.</a>
	<a href="javascript:void(0);" class="top-cart-info-value"><?if(count($baskets) > (int)FALSE):?><?=$baskets[0]->product->currency->symbol?><?endif;?> <?=$basketPrice?></a>
</div>
<i class="fa fa-shopping-cart"></i>
<div class="top-cart-content-wrapper">
	<div class="top-cart-content <? if(!empty($baskets)) : ?>top-cart-content-not-empty<? endif; ?>">
		<ul class="scroller" style="height: 250px;">
		<?foreach($baskets as $basket):?>
			<li>

				<? $imgUrl = $basket->product->getMainPicture() != NULL ? MSmarty::attachment_get_file_name($basket->product->getMainPicture()->secret_name, $basket->product->getMainPicture()->raw_name, $basket->product->getMainPicture()->file_ext, '_basket_preview', 'products') : (Yii::app()->theme->baseUrl . '/public/store/default-no-image.png'); ?>
				<?=CHtml::image($imgUrl, CHtml::encode($basket->product->lang->name), array('title' => $basket->product->lang->name, 'width'=>'37', 'height'=>'34'))?>

				<span class="cart-content-count">x <i id="<?=$basket->product->id?>"><?=$basket->count?></i></span>
				<strong><?=CHtml::link($basket->product->lang->name, '/store/product/view/id/' . $basket->product->id)?></strong>
				<em><?=$basket->product->currency->symbol?> <?=number_format($basket->product->price, 2, '.', '')?></em>
				<? /* <a class="del-goods" data-product-id="<?=$basket->product->id?>">&nbsp;</a> */ ?>
			</li>
		<? endforeach; ?>
		</ul>
		<div class="text-right">
			<a href="/store/order" class="btn btn-primary"><?=Yii::t('app','В корзину')?></a>
		</div>
	</div>
</div>