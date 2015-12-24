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
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>Панель управления сайтом</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport"/>
<meta content="" name="description"/>
<meta content="" name="author"/>

<script>
    var globalBaseUrl = '<?=Yii::app()->baseUrl?>'
    var globalHomeUrl = '<?=Yii::app()->homeUrl?>';
    var globalHostUrl = '<?=Yii::app()->createAbsoluteUrl('')?>';
    var globalLangUri = '<?=Yii::app()->language?>';
	var globalcsrfToken = '<?=Yii::app()->request->csrfToken?>';
</script>

<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<link href="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
<link href="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" type="text/css"/>
<link href="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css"/>
<link href="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/plugins/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css"/>
<link href="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE LEVEL PLUGIN STYLES -->
<!-- BEGIN PAGE STYLES -->
<link href="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/admin/pages/css/tasks.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/css/components.css" rel="stylesheet" type="text/css"/>
<link href="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
<link href="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/admin/layout/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="<?=Yii::app()->theme->baseUrl?>/public/superadmin/images/favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-fixed-mobile" and "page-footer-fixed-mobile" class to body element to force fixed header or footer in mobile devices -->
<!-- DOC: Apply "page-sidebar-closed" class to the body and "page-sidebar-menu-closed" class to the sidebar menu element to hide the sidebar by default -->
<!-- DOC: Apply "page-sidebar-hide" class to the body to make the sidebar completely hidden on toggle -->
<!-- DOC: Apply "page-sidebar-closed-hide-logo" class to the body element to make the logo hidden on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-hide" class to body element to completely hide the sidebar on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-fixed" class to have fixed sidebar -->
<!-- DOC: Apply "page-footer-fixed" class to the body element to have fixed footer -->
<!-- DOC: Apply "page-sidebar-reversed" class to put the sidebar on the right side -->
<!-- DOC: Apply "page-full-width" class to the body element to have full width page without the sidebar menu -->
<body class="page-header-fixed page-quick-sidebar-over-content">
<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
	<!-- BEGIN HEADER INNER -->
	<div class="page-header-inner">
		<!-- BEGIN LOGO -->
		<div class="page-logo">
			<a href="http://uticms.com">
			<img src="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/admin/layout/img/logo.png" alt="logo" class="logo-default"/>
			</a>
			<div class="menu-toggler sidebar-toggler hide">
				<!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
			</div>
		</div>
		<!-- END LOGO -->
		<!-- BEGIN RESPONSIVE MENU TOGGLER -->
		<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
		</a>
		<!-- END RESPONSIVE MENU TOGGLER -->
		<!-- BEGIN TOP NAVIGATION MENU -->
		<div class="top-menu">
			<ul class="nav navbar-nav pull-right">

				<!-- BEGIN USER LOGIN DROPDOWN -->
				<li class="dropdown dropdown-user">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<img alt="" class="img-circle" src="<?=Yii::app()->theme->baseUrl?>/public/img/superadmin.jpg"/>
					<span class="username"><?=Yii::app()->user->getState('username');?></span>
					<i class="fa fa-angle-down"></i>
					</a>
					<ul class="dropdown-menu">
						<li>
							<a href="/">
							<i class="icon-home"></i>Главная</a>
						</li>
						<li>
							<a href="<?=$this->createUrl('/admin')?>">
							<i class="icon-wrench"></i>Админ-панель</a>
						</li>
						<li class="divider">
						</li>
						<li>
							<a href="<?=$this->createUrl('/site/logout')?>">
							<i class="icon-key"></i>Выйти из панели</a>
						</li>
					</ul>
				</li>
				<!-- END USER LOGIN DROPDOWN -->
			</ul>
		</div>
		<!-- END TOP NAVIGATION MENU -->
	</div>
	<!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
	<div class="page-sidebar-wrapper">
		<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
		<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
		<div class="page-sidebar navbar-collapse collapse">
		<ul class="page-sidebar-menu" data-auto-scroll="true" data-slide-speed="200">
				<!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
				<li class="sidebar-toggler-wrapper">
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
					<div class="sidebar-toggler">
					</div>
					<!-- END SIDEBAR TOGGLER BUTTON -->
				</li>
				<!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
				<li <? if (($_SERVER['REQUEST_URI'] == '/superadmin/Scenario/index') || ($_SERVER['REQUEST_URI'] == '/superadmin/Download/index')) :?>
						class="active open"
					<? else :?>
						class="start"
					<? endif; ?>>
					<a href="javascript:;">
					<i class="fa fa-file-code-o"></i>
					<span class="title">Сценарии</span>
					<span class="selected"></span>
					<span class="arrow open"></span>
					</a>
					<ul class="sub-menu">
						<li <? if($_SERVER['REQUEST_URI'] == '/superadmin/Scenario/index') :?>class="active"<? endif; ?>>
							<a href="<?=$this->createUrl('/superadmin/Scenario/index');?>">
							<i class="glyphicon glyphicon-save"></i>
							Установка</a>
						</li>
						<li <? if($_SERVER['REQUEST_URI'] == '/superadmin/Download/index') :?>class="active"<? endif; ?>>
							<a href="<?=$this->createUrl('/superadmin/Download/index');?>">
							<i class="glyphicon glyphicon-cloud-download"></i>
							Загрузка</a>
						</li>
					</ul>
				</li>
				<li <? if (($_SERVER['REQUEST_URI'] == '/superadmin/Modules/index') || ($_SERVER['REQUEST_URI'] == '/superadmin/Modules/uploaded') || (strpos($_SERVER['REQUEST_URI'], 'superadmin/Objects/new/type/module'))) :?>
						class="active open"
					<? else :?>
						class="start"
					<? endif; ?>>
					<a href="javascript:;">
					<i class="icon-folder"></i>
					<span class="title">Модули</span>
					<span class="selected"></span>
					<span class="arrow open"></span>
					</a>
					<ul class="sub-menu">
						<li <? if($_SERVER['REQUEST_URI'] == '/superadmin/Modules/index') :?>class="active"<? endif; ?>>
							<a href="<?=$this->createUrl('/superadmin/Modules/index');?>">
							<i class="icon-check"></i>
							Установленные</a>
						</li>
						<li <? if($_SERVER['REQUEST_URI'] == '/superadmin/Modules/uploaded') :?>class="active"<? endif; ?>>
							<a href="<?=$this->createUrl('/superadmin/Modules/uploaded');?>">
							<i class="icon-drawer"></i>
							Загруженные</a>
						</li>
						<li <? if (strpos($_SERVER['REQUEST_URI'], 'superadmin/Objects/new/type/module')) :?>class="active"<? endif; ?>>
							<a href="<?=$this->createUrl('/superadmin/Objects/new/type/module/is_adapted/0/project_id/2/');?>">
							<i class="icon-cloud-download"></i>
							Новые</a>
						</li>
					</ul>
				</li>
				<li	<? if (($_SERVER['REQUEST_URI'] == '/superadmin/Packages/index') || ($_SERVER['REQUEST_URI'] == '/superadmin/Packages/uploaded') || (strpos($_SERVER['REQUEST_URI'], 'superadmin/Objects/new/type/package'))) :?>
						class="active open"
					<? else :?>
						class="start"
					<? endif; ?>>
					<a href="javascript:;">
					<i class="icon-puzzle"></i>
					<span class="title">Пакеты</span>
					<span class="selected"></span>
					<span class="arrow open"></span>
					</a>
					<ul class="sub-menu">
						<li <? if($_SERVER['REQUEST_URI'] == '/superadmin/Packages/index') :?>class="active"<? endif; ?>>
							<a href="<?=$this->createUrl('/superadmin/Packages/index');?>">
							<i class="icon-check"></i>
							Установленные</a>
						</li>
						<li <? if($_SERVER['REQUEST_URI'] == '/superadmin/Packages/uploaded') :?>class="active"<? endif; ?>>
							<a href="<?=$this->createUrl('/superadmin/Packages/uploaded');?>">
							<i class="icon-drawer"></i>
							Загруженные</a>
						</li>
						<li <? if(strpos($_SERVER['REQUEST_URI'], 'superadmin/Objects/new/type/package')) :?>class="active"<? endif; ?>>
							<a href="<?=$this->createUrl('/superadmin/Objects/new/type/package/is_adapted/0/project_id/2/');?>">
							<i class="icon-cloud-download"></i>
							Новые</a>
						</li>
					</ul>
				</li>
				<!--li class="start">
					<a href="javascript:;">
					<i class="icon-fire"></i>
					<span class="title">Патчи</span>
					<span class="selected"></span>
					<span class="arrow open"></span>
					</a>
					<ul class="sub-menu">
						<li class="active">
							<a href="<?=$this->createUrl('/superadmin/Patches/index');?>">
							<i class="icon-check"></i>
							Установленные</a>
						</li>
						<li>
							<a href="<?=$this->createUrl('/superadmin/Patches/uploaded');?>">
							<i class="icon-drawer"></i>
							Загруженные</a>
						</li>
						<li>
							<a href="<?=$this->createUrl('/superadmin/Patches/new');?>">
							<i class="icon-cloud-download"></i>
							Новые</a>
						</li>
					</ul>
				</li-->
				
				<!--li class="start">
					<a href="javascript:;">
					<i class="icon-rocket"></i>
					<span class="title">UTI.CMS</span>
					<span class="selected"></span>
					<span class="arrow open"></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="<?=$this->createUrl('/superadmin/Cms/uploaded');?>">
							<i class="icon-drawer"></i>
							Загруженные</a>
						</li>
						<li>
							<a href="<?=$this->createUrl('/superadmin/Cms/new');?>">
							<i class="icon-cloud-download"></i>
							Новые</a>
						</li>
					</ul>
				</li-->
				<li class="start">
					<a href="javascript:;">
					<i class="icon-equalizer"></i>
					<span class="title">Конфигурация</span>
					<span class="selected"></span>
					<span class="arrow open"></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="<?=$this->createUrl('/superadmin/config/lite/index');?>">
							<i class="icon-eye"></i>
							Просмотр</a>
						</li>
						<li>
							<a href="<?=$this->createUrl('/superadmin/config/lite/generate');?>">
							<i class="icon-bulb"></i>
							Генерация файла</a>
						</li>
					</ul>
				</li>
				<li class="start">
					<a href="javascript:;">
					<i class="icon-directions"></i>
					<span class="title">Карта сайта</span>
					<span class="selected"></span>
					<span class="arrow open"></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="<?=$this->createUrl('/superadmin/Navigation/index');?>">
							<i class="icon-eye"></i>
							Просмотр</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<!-- END SIDEBAR -->
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					<?php echo CHtml::encode($this->pageTitle); ?>
					</h3>
					<?php if(isset($this->breadcrumbs)):?>
							<?php $this->widget('zii.widgets.CBreadcrumbs', array(
								'tagName' => 'ul',
								'htmlOptions' => array('class' => 'page-breadcrumb breadcrumb'),
								'activeLinkTemplate' => '<li><a href="{url}">{label}</a></li>',
								'inactiveLinkTemplate' => '<li><a href="{url}">{label}</a></li>',
								'separator' => '<li><i class="fa fa-angle-right"></i></li>',
								'links' => $this->breadcrumbs,
								'homeLink' => '<li><i class="fa fa-home"></i><a href="' . Yii::app()->homeUrl . '">' . CHtml::link(Yii::t('superadmin','Главная')) . '</a></li>',
							)); ?><!-- breadcrumbs -->
					<?php endif?>
					<!-- END PAGE TITLE & BREADCRUMB-->
				</div>
			</div>
			
			<?php echo $content; ?>
			
		</div>
	</div>
	<!-- END CONTENT -->
	<!-- BEGIN QUICK SIDEBAR -->
	<a href="javascript:;" class="page-quick-sidebar-toggler"><i class="icon-close"></i></a>
	
	<!-- END QUICK SIDEBAR -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="page-footer">
	<div class="page-footer-inner">
		 <?=date('Y')?> &copy; <span style="color: #E13A3A;">UTI</span>.<span style="color: white;">CMS</span>.v.<?=Yii::app()->version?>
	</div>
	<div class="page-footer-tools">
		<span class="go-top">
		<i class="fa fa-angle-up"></i>
		</span>
	</div>
</div>
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/plugins/respond.min.js"></script>
<script src="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
<!--script src="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/plugins/jquery-1.11.0.min.js" type="text/javascript"></script-->

<script src="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
<script src="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
<script src="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
<script src="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
<script src="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
<script src="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
<script src="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
<script src="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>
<script src="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
<script src="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
<script src="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
<script src="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/plugins/jquery.pulsate.min.js" type="text/javascript"></script>
<script src="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/plugins/bootstrap-daterangepicker/moment.min.js" type="text/javascript"></script>
<script src="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
<!-- IMPORTANT! fullcalendar depends on jquery-ui-1.10.3.custom.min.js for drag & drop support -->
<script src="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/plugins/fullcalendar/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
<script src="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js" type="text/javascript"></script>
<script src="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
<script src="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/plugins/gritter/js/jquery.gritter.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/admin/pages/scripts/index.js" type="text/javascript"></script>
<script src="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/admin/pages/scripts/tasks.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {    
   Metronic.init(); // init metronic core componets
   Layout.init(); // init layout
   QuickSidebar.init() // init quick sidebar
});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>