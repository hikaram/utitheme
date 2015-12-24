<? Yii::app()->clientScript->scriptMap['jquery.js'] = Yii::app()->theme->baseUrl . '/public/assets/global/plugins/jquery-1.11.0.min.js';?>
<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.2.0
Version: 3.1.2
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest (the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<!-- Head BEGIN -->
<head>


<? /*
	<meta charset="utf-8">
	<title><? if (isset($_blocks)) : ?><?=$_blocks['page']->lang->title;?><? else : ?><?=CHtml::encode($this->pageTitle);?><? endif; ?></title>

	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<meta content="<?=$this->pageDescription?>" name="description">
	<meta content="<?=$this->pageKeywords?>" name="keywords">
	
	<link rel="shortcut icon" href="favicon.ico">

	<!-- Fonts START -->
	
	<!-- Fonts END -->

	<!-- Global styles START -->          
	<link href="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<link href="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<!-- Global styles END --> 

	<!-- Page level plugin styles START -->
	<link href="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet">
	<link href="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/plugins/carousel-owl-carousel/owl-carousel/owl.carousel.css" rel="stylesheet">
	<link href="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/plugins/slider-layer-slider/css/layerslider.css" rel="stylesheet">
	<link href="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet">
	<!-- Page level plugin styles END -->

	<!-- Theme styles START -->
	<link href="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/css/components.css" rel="stylesheet">
    <link href="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/frontend/layout/css/style.css" rel="stylesheet">

	<link href="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/frontend/pages/css/style-layer-slider.css" rel="stylesheet">
	<link href="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/frontend/layout/css/style-responsive.css" rel="stylesheet">
	<link href="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/frontend/layout/css/themes/red.css" rel="stylesheet" id="style-color">
	<link href="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/frontend/layout/css/custom.css" rel="stylesheet">
	<link href="<?=Yii::app()->theme->baseUrl?>/public/css/uti_metronic.css" rel="stylesheet">
	<!-- Theme styles END -->
    */ ?>
    <?$this->renderPartial('//layouts/control_head')?>
    <?$this->renderPartial('//layouts/control_js_set_global_var')?>
	<script type="text/javascript" src="<?=Yii::app()->theme->baseUrl?>/js/store/index.js"></script>

</head>
<!-- Head END -->

<!-- Body BEGIN -->
<body class="ecommerce">
<div class="super-wrapper">
	<!-- BEGIN TOP BAR -->
    <div class="pre-header">
        <div class="container">
            <div class="row">
                <!-- BEGIN TOP BAR LEFT PART -->
                <div class="col-md-6 col-sm-6 additional-shop-info">
                    <ul class="list-unstyled list-inline">
                        <? if ((isset($_company)) && (!empty($_company->phones))) : ?>
                            <? foreach ($_company->phones as $key => $phone) : ?>
                                <li><i class="fa fa-phone"></i><span><?=CHtml::encode($phone->value)?></span></li>
                            <? endforeach; ?>
                        <? endif; ?>
                        <li><i class="fa fa-envelope-o"></i><span><a href="mailto:<?=Yii::app()->params['adminEmail']?>"><?=Yii::app()->params['adminEmail'];?></a></span></li>
                        <? if ((isset($_company)) && (!empty($_company->skypes))) : ?>
                            <? foreach ($_company->skypes as $key => $skype) : ?>
                                <li><i class="fa fa-skype"></i><span><a href="skype:<?=CHtml::encode($skype->value)?>"><?=CHtml::encode($skype->value)?></a></span></li>
                            <? endforeach; ?>
                        <? endif; ?>
                    </ul>
                </div>
                <!-- END TOP BAR LEFT PART -->
                <!-- BEGIN TOP BAR MENU -->
                <div class="col-md-6 col-sm-6 additional-nav">
                    <ul class="list-unstyled list-inline pull-right">
						<?php if(Yii::app()->user->isGuest){ ?>
							<li><a href="<?=$this->createUrl('/site/login')?>"><?=Yii::t('home', 'Войти')?></a></li>
							<li><a href="<?=$this->createUrl('/register')?>"><?=Yii::t('home', 'Регистрация')?></a></li>
						<?php } ?>
                    </ul>
                </div>
                <!-- END TOP BAR MENU -->
            </div>
        </div>        
    </div>
    <!-- END TOP BAR -->
	
	<!-- BEGIN HEADER -->
    <div class="header">
      <div class="container">
		<a class="site-logo" href="/"><img src="<?=Yii::app()->theme->baseUrl?>/public/layouts/ukrtech.png" alt="UTI.CMS"></a>

        <a href="javascript:void(0);" class="mobi-toggler"><i class="fa fa-bars"></i></a>

        <? if (Yii::app()->isModuleInstall('Store')) : ?>
            <!-- BEGIN CART -->
            <div class="top-cart-block">
                <?php $this->widget('application.modules.store.widgets.BasketWidget', array()) ?>
            </div>
            <!--END CART -->        
        <? endif; ?>

        <!-- BEGIN NAVIGATION -->
        <div class="header-navigation pull-right font-transform-inherit">
			<?php $this->widget('NavigationWidget');?>
		</div>
        <!-- END NAVIGATION -->
      </div>
    </div>
    <!-- Header END -->
	<!-- Content BEGIN -->
	<div class="content-wrap">