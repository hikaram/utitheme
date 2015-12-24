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
	<?$this->renderPartial('//layouts/control_head')?>
	<?$this->renderPartial('//layouts/control_js_set_global_var')?>
</head>
<!-- Head END -->

<!-- Body BEGIN -->
<body class="corporate">
	<?php echo $content ?>
	<?=$this->renderPartial('//layouts/control_js_after_footer')?>
</body>
<!-- END BODY -->
</html>