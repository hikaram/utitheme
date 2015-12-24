<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title><?=Yii::t('app', 'Отчет по периодам')?></title>
    <link rel="stylesheet" href="<?=Yii::app()->theme->baseUrl?>/public/site/css/style.css" type="text/css" media="screen, projection" />
	<script>
		var globalBaseUrl = '<?=Yii::app()->baseUrl?>'
		var globalHomeUrl = '<?=Yii::app()->homeUrl?>';
		var globalHostUrl = '<?=Yii::app()->createAbsoluteUrl('')?>';
		var globalLangUri = '<?=Yii::app()->params['lang_uri']?>';
		var globalcsrfToken = '<?=Yii::app()->request->csrfToken?>';
	</script>	
	
</head>

<body style="width: 210mm; background: none; padding: 10px;">
    <? if (isset($content)) : ?>
        <?=$content ?>
    <? endif; ?>
</body>
</html>