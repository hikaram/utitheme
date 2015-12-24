<?php
    $this->breadcrumbs[Yii::t('app', 'Панель управления')] = array('/admin');
    $this->breadcrumbs[Yii::t('app', 'Управление продукцией')] = array('/admin/catalog');
    $this->breadcrumbs[Yii::t('app', 'Продукты')] = array('products/index');
    
    if (empty($catalogue_id))
    {
        $this->breadcrumbs[Yii::t('app', 'Создание продукта')] = array('create');
    }
    else
    {
        $this->breadcrumbs[Yii::t('app', 'Создание продукта')] = array('create', 'catalogue_id' => $catalogue_id);
    }
    
   
?>
<div class="portlet box green">
	<div class="portlet-title">
		<h3 class="caption"><i class="fa fa-cubes" style="margin-right: 10px;"></i> <?=Yii::t('app', 'Создание продукта')?></h3>
	</div>
	<div class="portlet-body">

		<div style="clear: both;"></div>
		<?php echo $this->renderPartial('_form_empty', array('model'=>$model, 'rate' => $rate)); ?>
	</div>
</div>