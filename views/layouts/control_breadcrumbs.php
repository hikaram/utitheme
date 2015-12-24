<?php if(isset($this->breadcrumbs)):?>
	<?php $this->widget('zii.widgets.CBreadcrumbs', array(
		'activeLinkTemplate' => '<li><a href="{url}">{label}</a></li>',
		'inactiveLinkTemplate' => '<li class="active">{label}</li>',
		'links' => $this->breadcrumbs,
		'homeLink' => '<li>' . CHtml::link(Yii::t('app', 'Главная'), $this->createAbsoluteUrl('/')) . '</li>',
		'tagName' => 'ul',
		'separator' => '',
		'htmlOptions' => array('class' => 'breadcrumb')
	)); ?>
<?php endif?>