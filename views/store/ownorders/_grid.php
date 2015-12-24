<?php
$dataProvider = $model->search();
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'orders-grid',
	'dataProvider'=> $dataProvider,
	'filter'=>$model,
	'ajaxUpdate' => true,
	'ajaxUrl' => '/store/ownorders/index',
	'afterAjaxUpdate' => 'reinstallDatePicker',
	'enableSorting' => array('id', 'num'),
	'htmlOptions' => array(
		//'class' => 'tablesorter'
	),
	'columns'=>array(
		'id',
		'num',
		array(
			'name' => 'total_price',
			'value' => 'Horders::getCompiledTotalPrice($data)'
		),
		array(
			'name' => 'status',
			'value' => 'Horders::gridStatusItem($data->status)',
			'filter' => Horders::gridStatusItems()
		),
		array(
			'name' => 'is_payed',
			'value' => 'Horders::gridIsPayedItem($data->is_payed)',
			'filter' => Horders::gridIsPayedItems()
		),
		array(
			'name' => 'created_at',
			'filter' => $this->widget('zii.widgets.jui.CJuiDatePicker', array(
					'model'=>$model,
					'attribute'=>'created_at',
					'language' => 'ru',
					'i18nScriptFile' => 'jquery-ui-i18n.min.js',
					'htmlOptions' => array(
						'class' => 'datepicker_for_due_date',
						'size' => '10',
					),
					'defaultOptions' => array(  // (#3)
						'showOn' => 'focus',
						'showOtherMonths' => true,
						'selectOtherMonths' => true,
						'changeMonth' => true,
						'changeYear' => true,
						'showButtonPanel' => true,
					)
				),
			true),
		),
		array(
			'header' => 'Операции',
			'class' => 'CButtonColumn',
			'template' => '{view}',
		),

	),
));