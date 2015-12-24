<?php
    $this->breadcrumbs[Yii::t('app', 'Панель управления')] = array('/admin');
    $this->breadcrumbs[Yii::t('app', 'Управление продукцией')] = array('index');
?>
<?php if (ProductsConfig::model()->_checkSwitchedPoints()) : ?>
<?php $switch = Yii::t('app', '(включены)'); ?>
<?php else : ?>
<?php $switch = Yii::t('app', '(выключены)'); ?>
<?php endif; ?>

<div class="portlet box yellow">
	<div class="portlet-title">
		<h3 class="caption"><i class="fa fa-folder"></i> <?=Yii::t('app', 'Каталог магазина')?></h3>
	</div>
		<div class="portlet-body">
		<h4 class="block"><i class="fa fa-folder"></i> <?=Yii::t('app', 'Каталоги')?></h4>
			<ul class="list-group">
				<? if (Yii::app()->user->checkAccess('AdminCatalogCataloguesIndex')) : ?>
					<li class="list-group-item"><a href="<?=$this->createUrl('catalogues/index')?>"><?=Yii::t('app', 'Дерево каталогов')?></a></li>
				<? endif; ?>
				<? if (Yii::app()->user->checkAccess('AdminCatalogCataloguesCreate')) : ?>
					<li class="list-group-item"><a href="<?=$this->createUrl('catalogues/create')?>"><?=Yii::t('app', 'Создать новый каталог')?></a></li>
				<? endif; ?>
			</ul>
		<h4 class="block"><i class="fa fa-cubes"></i> <?=Yii::t('app', 'Продукты')?></h4>
			<ul class="list-group">
				<? if (Yii::app()->user->checkAccess('AdminCatalogProductsIndex')) : ?>
					<li class="list-group-item"><a href="<?=$this->createUrl('product/index')?>"><?=Yii::t('app', 'Список продуктов')?></a></li>
				<? endif; ?>
				<? if (Yii::app()->user->checkAccess('AdminCatalogProductsSort')) : ?>
					<li class="list-group-item"><a href="<?=$this->createUrl('products/sort')?>"><?=Yii::t('app', 'Управление списком продуктов')?></a></li>
				<? endif; ?>
				<? if (Yii::app()->user->checkAccess('AdminCatalogProductsCreate')) : ?>
                	<li class="list-group-item"><a href="<?=$this->createUrl('product/create')?>"><?=Yii::t('app', 'Создать новый продукт')?></a></li>
                <? endif; ?>
			</ul>
		<h4 class="block"><i class="fa fa-gear"></i> <?=Yii::t('app', 'Параметры продуктов')?></h4>
			<ul class="list-group">
				<? if (Yii::app()->user->checkAccess('AdminCatalogCustomfieldsIndex')) : ?>
					<li class="list-group-item"><a href="<?=$this->createUrl('customfields/index')?>"><?=Yii::t('app', 'Список параметров')?></a></li>
				<? endif; ?>
				<? if (Yii::app()->user->checkAccess('AdminCatalogCustomfieldsCreate')) : ?>
                	<li class="list-group-item"><a href="<?=$this->createUrl('customfields/create')?>"><?=Yii::t('app', 'Создать новый параметр')?></a></li>
                <? endif; ?>
			</ul>
		
		<h4 class="block"><i class="fa fa-money"></i> <?=Yii::t('app', 'Валюты')?></h4>
			<ul class="list-group">
				<? if (Yii::app()->user->checkAccess('AdminCatalogCurrenciesIndex')) : ?>
					<li class="list-group-item"><a href="<?=$this->createUrl('currencies/index')?>"><?=Yii::t('app', 'Список валют')?></a></li>
				<? endif; ?>
				<? if ((Yii::app()->user->checkAccess('AdminCatalogCurrenciesCreate')) && (empty($currencies))) : ?>
                	<li class="list-group-item"><a href="<?=$this->createUrl('currencies/create')?>"><?=Yii::t('app', 'Создать новую валюту')?></a></li>
                <? endif; ?>
			</ul>
		<h4 class="block"><i class="fa fa-btc"></i> <?=Yii::t('app', 'Баллы '.$switch)?></h4>
			<ul class="list-group">
				<li class="list-group-item"><a href="<?= $this->createUrl('products/points') ?>"><?= Yii::t('app', 'Включение/отключение баллов продукции') ?></a></li>
				<li class="list-group-item"><a href="<?= $this->createUrl('products/rate') ?>"><?= Yii::t('app', 'Настройка курса баллов по отношению к валюте') ?></a></li>
			</ul>
		</div>
</div>