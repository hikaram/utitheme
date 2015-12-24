<?php $this->widget('application.modules.comments.widgets.commentswidget', array(
	'object_alias' 		=> 'product', 
	'object_id' 		=> $product->id,
	'template'			=> 'store',
	'allowedAdd'		=> (((bool)$settings->is_reviews_for_guest) || (((bool)$settings->is_reviews) && (!Yii::app()->user->isGuest))),
	'isRatio'			=> ((bool)$settings->is_set_points),
	'allowedSetRatio'	=> (((bool)$settings->is_set_points_for_guest) || (((bool)$settings->is_set_points) && (!Yii::app()->user->isGuest))),
	'jsAfterAdd'		=> (((bool)$settings->is_set_points_for_guest) || (((bool)$settings->is_set_points) && (!Yii::app()->user->isGuest))) ? 'recalcProductRatio' : (string)FALSE
)); ?>