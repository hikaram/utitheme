<style>
.list-group
{
	margin-bottom: 0 !important;
}
</style>
<?php $this->layout = 'catalogue'; ?>
<div class="row margin-bottom-40">
	<div class="sidebar col-md-3 col-sm-4">
		<?php $this->widget('application.modules.store.widgets.CatalogNavigationWidget');?>
	</div>


	<div class="col-md-9 col-sm-7">
		<div class="product-page">
			<div class="row">
				<? if ($this->modelProducts->getMainPicture() != NULL) : ?>
					<? $imgUrl = MSmarty::attachment_get_file_name($this->modelProducts->getMainPicture()->secret_name, $this->modelProducts->getMainPicture()->raw_name, $this->modelProducts->getMainPicture()->file_ext, '', 'products'); ?>
					<div class="col-md-6 col-sm-6">
						<div class="product-main-image">
							<img src="<?=$imgUrl?>" alt="<?=CHtml::encode($this->modelProducts->lang->name)?>" class="img-responsive" data-BigImgsrc="<?=$imgUrl?>">
						</div>
						<div class="product-other-images">
							<? foreach ($this->modelProducts->pictures as $picture) : ?>
								<? $imgUrl = MSmarty::attachment_get_file_name($picture->secret_name, $picture->raw_name, $picture->file_ext, '', 'products'); ?>
								<?=CHtml::link(CHtml::image($imgUrl, CHtml::encode($this->modelProducts->lang->name)), $imgUrl, ['class' => 'fancybox-button', 'rel' => 'photos-lib'])?>	
							<? endforeach; ?>
						</div>
					</div>
				<? else : ?>
					<div class="col-md-6 col-sm-6">
						<div class="product-main-image">
							<?=Chtml::image(Yii::app()->theme->baseUrl . '/public/store/default-no-image.png', 'no-image')?>
						</div>
					</div>
				<? endif; ?>

				<div class="col-md-6 col-sm-6">
					<h1><?=CHtml::encode($this->modelProducts->lang->name)?></h1>
					<div class="price-availability-block clearfix">
						<div class="price">
							<strong><span><?=$this->modelProducts->currency->symbol?></span> <?=number_format($this->modelProducts->price, 2, '.', '')?></strong>
							<? if ((bool)$isSwitchedPoints) : ?>
								<br />
								<em><span style="text-decoration: none;"><?=CHtml::encode(sprintf("%.2f", $this->modelProducts->points))?></span> <?= Yii::t('app', 'баллов'); ?></em>
							<? endif; ?>
						</div>
						<div class="availability">
							<?=Yii::t('app', 'Наличие')?>: 
							<strong>
								<? if ($this->modelProducts->available == Products::AVAILABLE_EXIST) : ?>
									<?=Yii::t('app', 'На складе')?>
								<? elseif ($this->modelProducts->available == Products::AVAILABLE_OUT_OF_STOCK) : ?>
									<?=Yii::t('app', 'Нет на складе')?>
								<? elseif ($this->modelProducts->available == Products::AVAILABLE_IS_EXPECTED) :?>
									<?=Yii::t('app', 'Ожидается поступление')?>
								<? endif; ?>
							</strong>
							<? if ((bool)$settings->is_set_points) : ?>
								<br />
								<?=Yii::t('app', 'Оценка')?>: 
								<div class="rateit" id="total-rateit" data-rateit-value="<?=sprintf('%.1f', $this->modelProducts->rating)?>" data-rateit-ispreset="true" data-rateit-readonly="true"></div>
							<? endif; ?>
						</div>
					</div>
					<div class="description">
						<?=$this->modelProducts->lang->brief_text?>
					</div>
					<? if ($this->modelProducts->available == Products::AVAILABLE_EXIST) : ?><br><br>
						<div class="product-page-cart">
							<div class="product-quantity">
								<input id="product-quantity" type="text" value="1" readonly class="form-control input-sm">
							</div>

							<input type="hidden" data-product-id="<?=$this->modelProducts->getPrimaryKey()?>" id="Prodid" />
							<button class="btn btn-primary" type="submit" onclick="add(<?=$this->modelProducts->getPrimaryKey()?>, $('#product-quantity').val(), $(this))"><?=Yii::t('app', 'Купить')?></button>
						</div>
					<? endif; ?>
					<? if (((bool)$settings->is_reviews) || ((bool)$settings->is_set_points)) : ?>
						<div class="review">
							<? if (((bool)$settings->is_set_points_for_guest) || (((bool)$settings->is_set_points) && (!Yii::app()->user->isGuest))) : ?>
								<? if ((Yii::app()->request->cookies['setProductRatio'] == NULL) || (!is_array(json_decode(Yii::app()->request->cookies['setProductRatio']->value))) || (!in_array($this->modelProducts->id, json_decode(Yii::app()->request->cookies['setProductRatio']->value)))) : ?>
									<div class="header-review-inner" style="display: inline-block;">
										<input type="range" value="<?=sprintf('%.1f', $this->modelProducts->rating)?>" step="0.5" id="backing">
										<div class="rateit" id="rateit" data-rateit-backingfld="#backing" data-rateit-resetable="false"  data-rateit-ispreset="true" data-rateit-min="0" data-rateit-max="5">
										</div>
									</div>
								<? endif; ?>
							<? endif; ?>
							<? if (((bool)$settings->is_reviews_for_guest) || (((bool)$settings->is_reviews) && (!Yii::app()->user->isGuest))) : ?>
								<a href="javascript: void(0)" onClick="comment_form_show()"><?=Yii::t('app', 'Оставить отзыв')?></a>
							<? endif; ?>
						</div>
					<? endif; ?>
					<? /*
					<ul class="social-icons">
						<li><a class="facebook" data-original-title="facebook" href="#"></a></li>
						<li><a class="twitter" data-original-title="twitter" href="#"></a></li>
						<li><a class="googleplus" data-original-title="googleplus" href="#"></a></li>
						<li><a class="evernote" data-original-title="evernote" href="#"></a></li>
						<li><a class="tumblr" data-original-title="tumblr" href="#"></a></li>
					</ul>
					*/ ?>
				</div>

				<div class="product-page-content">
					<ul id="myTab" class="nav nav-tabs">
						<li class="active active-store-tab"><a href="#Description" data-toggle="tab"><?=Yii::t('app', 'Описание')?></a></li>
						<? if ((bool)$settings->is_reviews) : ?>
							<li><a href="#Reviews" data-toggle="tab"><?=Yii::t('app', 'Отзывы')?></a></li>
						<? endif; ?>
					</ul>
					<div id="myTabContent" class="tab-content">
						<div class="tab-pane fade in active" id="Description">
							<?=$this->modelProducts->lang->description?>
						</div>
						<div class="tab-pane fade" id="Reviews">
						<!--<p>There are no reviews for this product.</p>-->

							<? if ((bool)$settings->is_reviews) : ?>

								<?php echo $this->renderPartial('_reviews', [
                                    'dataset'   => [],
                                    'settings'	=> $settings,
                                    'product' 	=> $this->modelProducts
                                ]); ?>							

							<? endif; ?>

						</div>
					</div>
				</div>

				<? if ($this->modelProducts->specialStatus != NULL) : ?>
					<div class="sticker sticker-<?=CHtml::encode($this->modelProducts->specialStatus->alias)?>"></div>
				<? endif; ?>
				
			</div>
		</div>
	</div>

<? /*
	<div class="col-md-9 col-sm-8">
		<div class="product-page">
			<div class="row">
				<div class="col-md-6 col-sm-6">
					<? if ($this->modelProducts->title_picture != NULL) : ?>
						<?=CHtml::link(CHtml::image($this->modelProducts->title_picture->getThumbUrl(), CHtml::encode($this->modelProducts->title_picture->lang->description), array('title' => CHtml::encode($this->modelProducts->title_picture->lang->description), 'class' => 'img-responsive')), $this->modelProducts->title_picture->getFullUrl(), array('class' => '', 'target' => '_blank'))?>
					<? elseif(!empty($this->modelProducts->attachments[0]) && $this->modelProducts->attachments[0] != NULL) : ?>
						<?=CHtml::link(CHtml::image($this->modelProducts->attachments[0]->getThumbUrl(), CHtml::encode($this->modelProducts->attachments[0]->lang->description), array('title' => $this->modelProducts->attachments[0]->lang->description, 'class' => 'img-responsive')), $this->modelProducts->attachments[0]->getFullUrl())?>
					<?elseif(empty($this->modelProducts->attachments[0])):?>
						<img src="<?=Yii::app()->theme->baseUrl?>/public/store/default-no-image.png" alt="no-image" width="100%">
					<? endif; ?>
					<div class="product-other-images">
						<? foreach ($this->modelProducts->attachments as $modelAttachment) : ?>
							<a href="<?=$modelAttachment->getThumbUrl('_products')?>" class="fancybox-button" rel="photos-lib"><?=CHtml::image($modelAttachment->getThumbUrl('_products_small'), $modelAttachment->lang->description, array('title' => $modelAttachment->lang->description, 'value' => $modelAttachment->getFullUrl()))?></a>
						<? endforeach; ?>
					</div>
				</div>
				<div class="col-md-6 col-sm-6">
					<h1><?=CHtml::encode($this->modelProducts->lang->name)?></h1>
					<div class="price-availability-block clearfix">
						<div class="price">
							<strong><span><?=$this->modelProducts->currency->symbol?></span> <?=number_format($this->modelProducts->price, 2, '.', '')?></strong><br/>
							<? if ((bool)$isSwitchedPoints) : ?>
								<em><span style="text-decoration: none;"><?=CHtml::encode(sprintf("%.2f", $this->modelProducts->points))?></span> <?= Yii::t('app', 'баллов'); ?></em>
							<? endif; ?>
						</div>
						<div class="availability">
							<?=Yii::t('app', 'Наличие')?>: 
							<strong>
							<? if ($this->modelProducts->available == Products::AVAILABLE_EXIST) : ?>
								<?=Yii::t('app', 'На складе')?>
							<? elseif ($this->modelProducts->available == Products::AVAILABLE_OUT_OF_STOCK) : ?>
								<?=Yii::t('app', 'Нет на складе')?>
							<? elseif ($this->modelProducts->available == Products::AVAILABLE_IS_EXPECTED) :?>
								<?=Yii::t('app', 'Ожидается поступление')?>
							<? endif; ?>
							</strong>
							<? if ($this->modelProducts->available == Products::AVAILABLE_EXIST) : ?><br><br>
								<input type="hidden" data-product-id="<?=$this->modelProducts->getPrimaryKey()?>" id="Prodid" />
								<button class="btn btn-primary" type="submit" onclick="add(<?=$this->modelProducts->getPrimaryKey()?>, 1, $(this))">Купить</button>
							<? endif; ?>
						</div>
					</div>
					
					<ul class="social-icons">
						<li><a class="vk" data-original-title="vk" href="javascript:void(0)"></a></li>
						<li><a class="facebook" style="border: 0;" data-original-title="facebook" href="javascript:void(0)"></a></li>
						<li><a class="twitter" style="border: 0;" data-original-title="twitter" href="javascript:void(0)"></a></li>
						<li><a class="linkedin" style="border: 0;" data-original-title="linkedin" href="javascript:void(0)"></a></li>
						<li><a class="googleplus" data-original-title="googleplus" href="javascript:void(0)"></a></li>
						<li><a class="pintrest" data-original-title="pintrest" href="javascript:void(0)"></a></li>
					</ul>
				</div>
			</div>
			<div class="product-page-content">
				<ul id="myTab" class="nav nav-tabs">
					<li class="active"><a href="#Description" data-toggle="tab" style="color: black;"><?= Yii::t('app', 'Описание'); ?>:</a></li>
				</ul>
				<div id="myTabContent" class="tab-content">
					<div class="tab-pane fade in active" id="Description">
						<?=$this->modelProducts->lang->description?>
					</div>
				</div>
			</div>
		</div>
	</div>
	*/ ?>
</div>