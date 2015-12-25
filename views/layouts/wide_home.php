<?= $this->renderPartial('//layouts/base_begin') ?>
<div class="main">
	<?= $this->renderPartial('//layouts/control_breadcrumbs') ?>

	<div>
		<?= $content ?>
		<? if (isset($_blocks)) : ?><?php $this->widget($_blocks['widget'], array('blocks' => $_blocks, 'position' => 'content'))->block_show(); ?><? endif; ?>
		<div class="container">

		<div class="col-md-2">
			<div></div>
			<div>
				<ul>
					<li><a href="#">о компании</a></li>
					<li><a href="#">магазин</a></li>
					<li><a href="#">возможности</a></li>
					<li><a href="#">кабинет</a></li>
				</ul>
			</div>
		</div>
			<div class="col-md-10">
		<div class="col-md-6">
			<div>
				<a href=""><img src="<?=Yii::app()->theme->baseUrl?>/public/assets/frontend/layout/img/blago.png" alt=""></a>
				<a href=""><img src="<?=Yii::app()->theme->baseUrl?>/public/assets/frontend/layout/img/ezoteric.png" alt=""></a>
			</div>
			<div>
				<img src="<?=Yii::app()->theme->baseUrl?>/public/assets/frontend/layout/img/banner.png" alt="">
				<h3>Баннер с важным предложением</h3>
				<p>Краткое описание важного предложения на баннере.<br />
					Укажите важные достоинства и преимущества продукта или услуги</p>
			</div>
			<div>
				<ul>
					<li>
						Ближайшее мероприятие в компании
						Заголовок ближайшего мероприятия
					</li>
					<li>
						Состоится через:
						22:54:37
					</li>
				</ul>
			</div>
		</div>
		<div class="col-md-6">
			<div class="b-cart">
				<span>Корзина</span>
				Новых товаров: 2
				На сумму: 38,5$
				<a href="#" class="chackout">Оформить заказ</a>
			</div>
			<div class="b-video">
				<a href="#"><img src="<?=Yii::app()->theme->baseUrl?>/public/assets/frontend/layout/img/video.png" alt=""></a>
			</div>
			<div class="b-inter">
				<a href="#"><img src="<?=Yii::app()->theme->baseUrl?>/public/assets/frontend/layout/img/interv_prz.png" alt=""></a>
			</div>
		</div>
			</div>

			<?php
			Yii::import('application.modules.admin.modules.content.models.Contents');
			Yii::import('application.modules.admin.modules.content.models.ContentsLang');

			$criteria = new CDbCriteria(array(
					'condition' => 'name = :name',
					'params' => array(
							'name' => '3 блока на главной странице'
					)
			));

			$content = Contents::model()->find($criteria);

			$text = '';

			if (!empty($content))
			{
				$text = $content->lang->text;
			}

			echo $text;

			?>
	</div>
	</div>
	</div>
</div>
<?=
$this->renderPartial('//layouts/base_end')?>
