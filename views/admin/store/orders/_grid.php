<?php

$dateisOn = $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                    'model'=>$modelSearch,
                                    'name' => 'Horders[date_first]',
                                    'attribute'=>'date_first',
                                    'language' => 'ru',
                                    'i18nScriptFile' => 'jquery-ui-i18n.min.js',
                                    'value' => $modelSearch->date_first,
                                    // additional javascript options for the date picker plugin
                                    'options'=>array(
                                        'showOn' => 'focus',
                                        'dateFormat'=>'dd.mm.yy',
                                        'showOtherMonths' => true,
                                        'selectOtherMonths' => true,
                                        'changeMonth' => true,
                                        'changeYear' => true,
                                        'showButtonPanel' => true,
                                    ),
                                    'htmlOptions'=>array(
                                        'style'=>'height:25px;width:100px;',
                                        //'class'=>'datepicker',
                                        'data-date-format' => 'dd.mm.yyyy',
                                    ),
                                ),true) . ' - ' . $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                    'model'=>$modelSearch,
                                    'name' => 'Horders[date_last]',
                                    'attribute'=>'date_last',
                                    'language' => 'ru',
                                    'i18nScriptFile' => 'jquery-ui-i18n.min.js',
                                    'value' => $modelSearch->date_last,
                                    // additional javascript options for the date picker plugin
                                    'options'=>array(
                                        'showOn' => 'focus',
                                        'dateFormat'=>'dd.mm.yy',
                                        'showOtherMonths' => true,
                                        'selectOtherMonths' => true,
                                        'changeMonth' => true,
                                        'changeYear' => true,
                                        'showButtonPanel' => true,
                                    ),
                                    'htmlOptions'=>array(
                                        'style'=>'height:25px;width:100px',
                                        'class'=>'datepicker',
                                        'data-date-format' => 'dd.mm.yyyy',
                                    ),
                                ),true);


$dataProvider = $modelSearch->search();    

$this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'orders-grid',
    'dataProvider'=> $dataProvider,
    'filter'=>$modelSearch,
    'ajaxUpdate' => true,
    'ajaxUrl' => '/admin/store/orders/index',
    'afterAjaxUpdate' => 'reinstallDatePicker',
    'enableSorting' => array('id', 'num'),
    'htmlOptions' => array(
        'class' => 'table table-hover'
    ),
    'columns'=>array(
        'id',
        'num',
        array(
            'name' => 'searchUsername',
            'value' => '($data->user instanceof Users) ? $data->user->username : "н/д"'
        ),

        array(
            'name' => 'total_price',
            'value' => '$data->total_price'
        ),
        array(
            'name' => 'total_points',
            'value' => '$data->total_points'
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
            'filter' => $dateisOn,

             
        ),

        array(
            'header' => Yii::t('app', 'Операции'),
            'class' => 'CButtonColumn',
            'template' => '{view} {update}',
            'viewButtonUrl' => 'Yii::app()->createUrl("/admin/store/orders/view", array("id"=>$data->id, "page"=>isset($_GET["Horders_page"]) ? $_GET["Horders_page"] : 1))',
            'updateButtonUrl' => 'Yii::app()->createUrl("/admin/store/orders/update", array("id"=>$data->id, "page"=>isset($_GET["Horders_page"]) ? $_GET["Horders_page"] : 1))',
        ),

    ),
));    


