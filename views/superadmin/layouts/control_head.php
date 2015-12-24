<script>
    var globalBaseUrl = '<?=Yii::app()->baseUrl?>'
    var globalHomeUrl = '<?=Yii::app()->homeUrl?>';
    var globalHostUrl = '<?=Yii::app()->createAbsoluteUrl('')?>';
    var globalLangUri = '<?=Yii::app()->language?>';
	var globalcsrfToken = '<?=Yii::app()->request->csrfToken?>';
</script>

<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title><?=CHtml::encode($this->pageTitle);?></title>
<meta name="title" content="<?=CHtml::encode($this->pageTitle);?>" />
<meta name="keywords" content="<?=CHtml::encode($this->pageKeywords);?>" />
<meta name="description" content="<?=CHtml::encode($this->pageDescription);?>" />
<link rel="stylesheet" href="<?=Yii::app()->theme->baseUrl?>/public/admin/css/style.css" type="text/css" media="screen, projection" />