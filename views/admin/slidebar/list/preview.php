<? if (Yii::app()->isModuleInstall('AdminSlidebar')) : ?>

<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|PT+Sans+Narrow|Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css">
<link href="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<link href="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/plugins/slider-revolution-slider/rs-plugin/css/settings.css" rel="stylesheet">
<link href="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/frontend/pages/css/style-revolution-slider.css" rel="stylesheet">

    <? $this->widget('application.modules.admin.modules.slidebar.widgets.SlidebarWidget')->getCarousel(); ?>

<script src="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/plugins/carousel-owl-carousel/owl-carousel/owl.carousel.min.js" type="text/javascript"></script><!-- slider for products -->
<script src="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/plugins/slider-revolution-slider/rs-plugin/js/jquery.themepunch.plugins.min.js" type="text/javascript"></script>
<script src="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/plugins/slider-revolution-slider/rs-plugin/js/jquery.themepunch.revolution.min.js" type="text/javascript"></script> 
<script src="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/frontend/pages/scripts/revo-slider-init.js" type="text/javascript"></script>
<script type="text/javascript">
	jQuery(document).ready(function() {
		RevosliderInit.initRevoSlider();
		
	});
</script>

<? endif; ?>