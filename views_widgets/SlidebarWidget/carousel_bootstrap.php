<!-- BEGIN SLIDER -->
<script type="text/javascript">
	$(document).ready(function() {
		$(".slider").owlCarousel({
			navigation : false,
			items : 1
		});
	});
</script>
<div class="fullwidthbaner-container">
	<div class="slider">
		<div>
			<img src="<?=Yii::app()->theme->baseUrl?>/public/assets/frontend/layout/img/slider_bg.png" alt="">
			<div class="slide-text">
				<h1>Начни зарабатывать прямо сейчас!</h1>
				<h2>Ваш путь к здоровой и богатой жизни</h2>
				<p>Откройте для себя путь к здоровой и богатой жизни! Получите уникальные возможности для создания бизнеса своей мечты, финансового благополучия и независимости, обогащения жизни окружающих Вас людей!</p>
				<form action="post">
					<input type="text" value="" />
					<input type="email" value="" />
					<input type="submit" value="" />
				</form>
			</div>
		</div>
		<div>
			<img src="<?=Yii::app()->theme->baseUrl?>/public/assets/frontend/layout/img/slider_bg.png" alt="">
			Slide 2</div>
		<div>
			<img src="<?=Yii::app()->theme->baseUrl?>/public/assets/frontend/layout/img/slider_bg.png" alt="">
			Slide 3</div>
	</div>
</div>
<!-- END SLIDER -->