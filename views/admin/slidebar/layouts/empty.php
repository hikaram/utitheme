<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title><?=$this->pageTitle?></title>
    <script>
        var globalBaseUrl = '<?=Yii::app()->baseUrl?>'
        var globalHomeUrl = '<?=Yii::app()->homeUrl?>';
        var globalHostUrl = '<?=Yii::app()->createAbsoluteUrl('')?>';
        var globalLangUri = '<?=Yii::app()->language?>';
        var globalcsrfToken = '<?=Yii::app()->request->csrfToken;?>';
    </script>    
</head>

<body>
    <div style="width: 1242px;">
        <? if (isset($content)) : ?>
            <?=$content ?>
        <? endif; ?>
    </div>
</body>
</html>