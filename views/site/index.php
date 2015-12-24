<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name;
$this->layout = 'wide_home';
?>

<? if (Yii::app()->isModuleInstall('AdminSlidebar')) : ?>
    <? $this->widget('application.modules.admin.modules.slidebar.widgets.SlidebarWidget')->getCarousel(); ?>
<? endif; ?>

<div class="container">

</div>