<?php 
$this->breadcrumbs = array(); //clear
$this->breadcrumbs[] = Yii::t('app', 'Новости') ;
?>
<? $this->widget('NewsWidget', array('newstype' => $type))->getLastNews(); ?>