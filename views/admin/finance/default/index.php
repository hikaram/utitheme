<?php
$this->breadcrumbs['Финансы'] = $this->createUrl('default/index');
?>
<div class="portlet box yellow">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa fa-bank"></i> Управление финансами
		</div>
	</div>
	<div class="portlet-body">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><i class="fa fa-exchange" style="margin-right: 10px;"></i> Финансовые операции</h3>
			</div>
			<div class="panel-body" style="line-height: 2;">
				<a href="<?=$this->createUrl('transactions/index')?>">Список</a>
			</div>
		</div>

		<? if (Yii::app()->user->checkAccess('superadmin')) : ?>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><i class="fa fa-briefcase" style="margin-right: 10px;"></i> Бизнес-логика</h3>
			</div>
			<div class="panel-body" style="line-height: 2;">
				<a href="<?=$this->createUrl('transactionsTriggers/index')?>">Список триггеров</a><br/>
				<a href="<?=$this->createUrl('transactionsTriggers/create')?>">Создать новый триггер</a>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><i class="fa fa-bookmark-o" style="margin-right: 10px;"></i> Спецификации операций</h3>
			</div>
			<div class="panel-body" style="line-height: 2;">
				<a href="<?=$this->createUrl('transactionsSpecs/index')?>">Список спецификаций</a><br/>
                <a href="<?=$this->createUrl('transactionsSpecs/create')?>">Создать новую спецификацию</a>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><i class="fa fa-usd" style="margin-right: 10px;"></i> Типы валют</h3>
			</div>
			<div class="panel-body" style="line-height: 2;">
				<a href="<?=$this->createUrl('currency/index')?>">Список валют</a><br/>
				<a href="<?=$this->createUrl('currency/create')?>">Создать новую валюту</a>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><i class="fa fa-star" style="margin-right: 10px;"></i> Назначения кошельков</h3>
			</div>
			<div class="panel-body" style="line-height: 2;">
				<a href="<?=$this->createUrl('walletsPurpose/index')?>">Список назначений</a><br/>
				<a href="<?=$this->createUrl('walletsPurpose/create')?>">Создать новое назначение кошелька</a>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><i class="fa fa-tags" style="margin-right: 10px;"></i> Типы новых кошельков</h3>
			</div>
			<div class="panel-body" style="line-height: 2;">
				<a href="<?=$this->createUrl('walletsSettings/index')?>">Список типов</a><br/>
				<a href="<?=$this->createUrl('walletsSettings/create')?>">Создать новый тип кошельков</a>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><i class="fa fa-refresh" style="margin-right: 10px;"></i> Статусы кошельков</h3>
			</div>
			<div class="panel-body" style="line-height: 2;">
				<a href="<?=$this->createUrl('walletsStatuses/index')?>">Список статусов</a><br/>
				<a href="<?=$this->createUrl('walletsStatuses/create')?>">Создать новый статус кошелька</a>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><i class="fa fa-tasks" style="margin-right: 10px;"></i> Группы операций</h3>
			</div>
			<div class="panel-body" style="line-height: 2;">
				<a href="<?=$this->createUrl('transactionsGroups/index')?>">Список групп</a><br/>
				<a href="<?=$this->createUrl('transactionsGroups/create')?>">Создать новую группу</a>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><i class="fa fa-refresh" style="margin-right: 10px;"></i> Статусы операций</h3>
			</div>
			<div class="panel-body" style="line-height: 2;">
				<a href="<?=$this->createUrl('transactionsStatuses/index')?>">Список статусов</a><br/>
				<a href="<?=$this->createUrl('transactionsStatuses/create')?>">Создать новый статус операции</a>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><i class="fa fa-puzzle-piece" style="margin-right: 10px;"></i> Финансовые объекты</h3>
			</div>
			<div class="panel-body" style="line-height: 2;">
				<a href="<?=$this->createUrl('objects/index')?>">Список объектов</a><br/>
				<a href="<?=$this->createUrl('objects/create')?>">Создать новый объект</a>
			</div>
		</div>	
		<!--
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><i class="fa " style="margin-right: 10px;"></i> </h3>
			</div>
			<div class="panel-body" style="line-height: 2;">
				
			</div>
		</div>		
		-->
		<? endif; ?>
	</div>
</div>