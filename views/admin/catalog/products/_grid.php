<?php

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'products-grid',
	'dataProvider'=> $model->search(),
	'filter'=>$model,
	'ajaxUpdate' => true,
	'ajaxUrl' => Yii::app()->createUrl('/admin/catalog/products/index'),
	'pager'=>array(
		'class'=>'CLinkPager',
		'header' => '',
		'maxButtonCount' => 10,
		'htmlOptions' => array(
			'class' => 'pagination'
		),  
	),
	'htmlOptions' => array(
		'class' => 'table table-hover'
	),
	'columns'=>array(
		array(
			'name' => 'id',
			'value' => '$data->id'
		),        
		'article',
		array(
			'name' => 'productName',
			'value' => '$data->lang->name'
		),
		array(
			'name' => 'currency__id',
			'value' => 'Products::gridCurrencyItem($data->currency__id)',
			'filter' => Products::gridCurrencyItems()
		),
		'price',
		'points',
		array(
			'name' => 'status',
			'value' => 'Products::gridStatusItem($data->status)',
			'filter' => Products::gridStatusItems()
		),
		
		array(
			'name' => 'available',
			'value' => 'Products::gridAvailableItem($data->available)',
			'filter' => Products::gridAvailableItems()
		),

		array(
			'header' => 'Операции',
			'class' => 'CButtonColumn',
			'template' => '{view} {update} {delete}',
			'deleteButtonUrl' => 'Yii::app()->controller->createUrl("ajaxproducts/delete", array("id" => $data->primaryKey))'
		),

	),
));