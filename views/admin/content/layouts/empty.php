<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="<?=Yii::app()->theme->baseUrl?>/public/site/css/style.css" type="text/css" media="screen, projection" />
</head>

<body style="background: none; width: 940px; padding: 30px;">
    <? if (isset($content)) : ?>
        <?=$content ?>
    <? endif; ?>
</body>
</html>