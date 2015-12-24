<meta charset="utf-8">
<? /* Вставка Seo-тегов из AdminRegisterCode */?>
<? $this->widget('application.modules.admin.modules.seodata.widgets.SeoTagsWidget',
	array('title' => CHtml::encode($this->pageTitle),
		'description' => CHtml::encode($this->pageDescription),
		'keywords' => CHtml::encode($this->pageKeywords)
	)
)?>
 
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<!--meta content="keenthemes" name="author"-->

<!--meta property="og:site_name" content="-CUSTOMER VALUE-">
<meta property="og:title" content="-CUSTOMER VALUE-">
<meta property="og:description" content="-CUSTOMER VALUE-">
<meta property="og:type" content="website">
<meta property="og:image" content="-CUSTOMER VALUE-"><!-- link to image for socio -->
<!--meta property="og:url" content="-CUSTOMER VALUE-"-->

<link rel="shortcut icon" href="<?=Yii::app()->theme->baseUrl?>/public/img/favicon.ico">

<script src="<?=Yii::app()->theme->baseUrl?>/public/assets/global/plugins/jquery-1.11.0.min.js" type="text/javascript"></script>

<!-- Fonts START -->
<!--<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|PT+Sans+Narrow|Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css">-->
<!-- Fonts END -->

<!-- Global styles START -->          
<link href="<?=Yii::app()->theme->baseUrl?>/public/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<link href="<?=Yii::app()->theme->baseUrl?>/public/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Global styles END --> 
   
<!-- Page level plugin styles START -->
<script src="<?=Yii::app()->theme->baseUrl?>/public/assets/global/plugins/owl-carousel/owl.carousel.min.js" type="text/javascript"></script>
<link href="<?=Yii::app()->theme->baseUrl?>/public/assets/global/plugins/owl-carousel/owl.carousel.css" rel="stylesheet">
<link href="<?=Yii::app()->theme->baseUrl?>/public/assets/global/plugins/owl-carousel/owl.theme.css" rel="stylesheet">
<!-- Page level plugin styles END -->

<!-- Theme styles START -->
<link href="<?=Yii::app()->theme->baseUrl?>/public/assets/frontend/layout/css/style.css" rel="stylesheet">
<!-- Theme styles END -->

<? if (isset($_blocks)) : ?>
    <link rel="stylesheet" href="<?=Yii::app()->theme->baseUrl?>/public/css/admin/page/css/style.css" type="text/css" media="screen, projection" />
<? endif; ?>

<? /* Вставка кода из AdminRegisterCode */?>
<? $this->widget('application.modules.admin.modules.registercode.widgets.registercodewidget', 
	array('position' => 'POS_HEAD')
)?>