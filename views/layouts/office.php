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
<title><?=$this->pageTitle?></title>
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
<link href="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/plugins/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
<link href="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<link href="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
<link href="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" type="text/css"/>
<link href="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css"/>
<link href="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/plugins/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css"/>
<link href="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css"/>
<link href="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet" type="text/css"/>
<link href="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" type="text/css"/>
<link href="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css"/>
<link href="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/frontend/layout/css/inbox.css" rel="stylesheet">
<!-- END PAGE LEVEL PLUGIN STYLES -->
<!-- BEGIN PAGE STYLES -->
<link href="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/admin/pages/css/tasks.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/css/components.css" rel="stylesheet" type="text/css"/>
<link href="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
<link href="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/admin/layout/css/themes/light2.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
<link href="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/admin/layout/css/profile.css" rel="stylesheet" type="text/css"/>
<link href="<?=Yii::app()->theme->baseUrl?>/public/css/uti_metronic.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
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
			<a href="http://uticms.com" class="logo-wrap">
				<img src="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/admin/layout/img/uticms-logo-office.png" alt="logo" class="logo-default"/>
				<small class="logo-version">v.<?=Yii::app()->version?></small>
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
				<?php
                if (Yii::app()->isModuleInstall('OfficeMessageMetronik'))
                {
                    $this->widget('application.modules.office.modules.message.widgets.OfficeMailsWidgets');
                }				
                
				if(Yii::app()->user->username === Yii::app()->params->superAdminInfo['username']){ ?>
					<li class="dropdown dropdown-quick-sidebar-toggler">
						<a href="<?=$this->createUrl('/superadmin');?>"class="btn grey-gallery" style="height:inherit; padding-top:13px">Super Admin</a>
					</li>
				<?php } ?>
				<!-- BEGIN USER LOGIN DROPDOWN -->
				<li class="dropdown dropdown-user">
					<a href="#" class="dropdown-toggle office-user-dropdown" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<span class="username"> <?=Yii::app()->user->username ?> </span>
					<i class="fa fa-angle-down"></i>
					</a>
					<ul class="dropdown-menu">
                        <? if (Yii::app()->isModuleInstall('OfficeProfile')) : ?>
                            <li>
                                <a href="/office/profile">
                                <i class="icon-user"></i><?=Yii::t('app', 'Профиль')?></a>
                            </li>
                            <li class="divider">
                        <? endif; ?>						
						</li>
						<li>
							<a href="/site/logout">
							<i class="icon-key"></i><?=Yii::t('app', 'Выйти из панели')?></a>
						</li>
					</ul>
				</li>
				<!-- END USER LOGIN DROPDOWN -->
				<!-- BEGIN QUICK SIDEBAR TOGGLER -->
				<li class="dropdown dropdown-quick-sidebar-toggler">
					<a href="/site/logout" class="dropdown-toggle">
					<i class="icon-logout"></i>
					</a>
				</li>
				<!-- END QUICK SIDEBAR TOGGLER -->
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
				<li class="sidebar-toggler-wrapper" style="margin-bottom: 20px;">
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
					<div class="sidebar-toggler">
					</div>
					<!-- END SIDEBAR TOGGLER BUTTON -->
				</li>
                <? /*
				<!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
				<li class="sidebar-search-wrapper">
					<!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
					<!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
					<!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
					<form class="sidebar-search" action="extra_search.html" method="POST">
						<a href="javascript:;" class="remove">
						<i class="icon-close"></i>
						</a>
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Search...">
							<span class="input-group-btn">
							<a href="javascript:;" class="btn submit"><i class="icon-magnifier"></i></a>
							</span>
						</div>
					</form>
					<!-- END RESPONSIVE QUICK SEARCH FORM -->
				</li>
                */ ?>
				<?php $this->widget('NavigationWidget', array(
					'template' => 'office_level_1'
				));?> 
				
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
								'inactiveLinkTemplate' => '<li><span>{label}</span></li>',
								'separator' => '<li><i class="fa fa-angle-right"></i></li>',
								'links' => $this->breadcrumbs,
								'homeLink' => '<li><i class="fa fa-home"></i><a href="' . Yii::app()->createAbsoluteUrl('/') . '">' . Yii::t('app', 'Главная') . '</a></li>',
							)); ?><!-- breadcrumbs -->
					<?php endif?>
					<!-- END PAGE TITLE & BREADCRUMB-->
				</div>
			</div>
			
            <?php $this->widget('UTIFlashMessagesWidget'); ?>
            
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
		 <?=date('Y')?> &copy; <span style="color: #E13A3A;">UTI</span>.<span style="color: #555555;">CMS</span>.v.<?=Yii::app()->version?>
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
<!--<script src="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/plugins/jquery-1.11.0.min.js" type="text/javascript"></script>-->
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
<script src="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>
<script src="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<!-- IMPORTANT! fullcalendar depends on jquery-ui-1.10.3.custom.min.js for drag & drop support -->
<script src="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/plugins/fullcalendar/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
<script src="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js" type="text/javascript"></script>
<script src="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
<script src="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/plugins/gritter/js/jquery.gritter.js" type="text/javascript"></script>
<script src="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
<script src="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/admin/pages/scripts/index.js" type="text/javascript"></script>
<script src="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/admin/pages/scripts/tasks.js" type="text/javascript"></script>
<script src="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/admin/pages/scripts/components-pickers.js" type="text/javascript"></script>
    <link rel="stylesheet" href="<?=Yii::app()->theme->baseUrl?>/public/css/admin/page/css/style.css" type="text/css" media="screen, projection" />
<link rel="stylesheet" href="<?=Yii::app()->theme->baseUrl?>/public/admin/page/css/jquery.mCustomScrollbar.min.css" type="text/css" media="screen, projection" />
<script src="<?=Yii::app()->theme->baseUrl?>/public/admin/page/js/jquery.mCustomScrollbar.min.js"></script>
<!--<script src="../../assets/admin/pages/scripts/components-form-tools.js"></script>
<script src="../../"></script>--->


<!-- END PAGE LEVEL SCRIPTS -->
<script>
    jQuery(document).ready(function() {       
       // initiate layout and plugins
       	Metronic.init(); // init metronic core components
		Layout.init(); // init current layout
		QuickSidebar.init(); // init quick sidebar
       //	ComponentsPickers.init();
       	//ComponentsFormTools.init();
       	//$('.datepicker').datepicker()
    });   
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>