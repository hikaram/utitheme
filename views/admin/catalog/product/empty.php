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

        <h3><?=Yii::t('app', 'Не хватает данных для создания продуктов')?></h3>

        <?=Yii::t('app', 'Чтобы добавить новый продукт создайте')?> <?=CHtml::link(Yii::t('app', 'валюту товара'), $this->createUrl('/admin/catalog/currencies/create'))?> <br />
        <?=Yii::t('app', 'и как минимум один')?> <?=CHtml::link(Yii::t('app', 'каталог продукции'), $this->createUrl('/admin/catalog/catalogues/create'))?>.
        <br /><br />
        
	</div>
</div>