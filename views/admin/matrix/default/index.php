<?php
$this->breadcrumbs['Управление марицами'] = $this->createUrl('default/index');
?>
    <article class="module width_full">
        <header><h3>Типы матриц</h3></header>
        <div class="module_content">
            <ul>
                <li><a href="<?=$this->createUrl('matrix/index')?>">Типы матриц</a></li>
                <li><a href="<?=$this->createUrl('matrix/create')?>">Создать новый тип матрицы</a></li>
            </ul>
        </div>
    </article>

    <? if (Yii::app()->user->username == Yii::app()->params['superAdminInfo']['username']) : ?>
		<article class="module width_full">
			<header><h3>Список действий</h3></header>
            <div class="module_content">
                <ul>
                    <li><a href="<?=$this->createUrl('actions/index')?>">Список действий</a></li>
                    <li><a href="<?=$this->createUrl('actions/create')?>">Создать новое действие</a></li>
                </ul>
            </div>
        </article>
    <? endif; ?>

    <? if (Yii::app()->user->username == Yii::app()->params['superAdminInfo']['username']) : ?>
		<article class="module width_full">
			<header><h3>Список условий</h3></header>
            <div class="module_content">
                <ul>
                    <li><a href="<?=$this->createUrl('conditions/index')?>">Список условий</a></li>
                    <li><a href="<?=$this->createUrl('conditions/create')?>">Создать новое условие</a></li>
                </ul>
            </div>
        </article>
    <? endif; ?>

    <? if (Yii::app()->user->username == Yii::app()->params['superAdminInfo']['username']) : ?>
		<article class="module width_full">
			<header><h3>Список параметров</h3></header>
            <div class="module_content">
                <ul>
                    <li><a href="<?=$this->createUrl('params/index')?>">Список параметров</a></li>
                    <li><a href="<?=$this->createUrl('params/create')?>">Создать новый параметр</a></li>
                </ul>
            </div>
        </article>
    <? endif; ?>

    <? if (Yii::app()->user->username == Yii::app()->params['superAdminInfo']['username']) : ?>
		<article class="module width_full">
			<header><h3>Список типов заполнений матриц</h3></header>
            <div class="module_content">
                <ul>
                    <li><a href="<?=$this->createUrl('filltypes/index')?>">Список типов заполнений матриц</a></li>
                    <li><a href="<?=$this->createUrl('filltypes/create')?>">Создать новый тип заполнения</a></li>
                </ul>
            </div>
        </article>
    <? endif; ?>

    <? if (Yii::app()->user->username == Yii::app()->params['superAdminInfo']['username']) : ?>
		<article class="module width_full">
			<header><h3>Список приоритетов заполнений матриц</h3></header>
            <div class="module_content">
                <ul>
                    <li><a href="<?=$this->createUrl('fillpriorities/index')?>">Список приоритетов заполнений матриц</a></li>
                    <li><a href="<?=$this->createUrl('fillpriorities/create')?>">Создать новый приоритет заполнения</a></li>
                </ul>
            </div>
        </article>
    <? endif; ?>

    <? if (Yii::app()->user->username == Yii::app()->params['superAdminInfo']['username']) : ?>
		<article class="module width_full">
			<header><h3>Список статусов матриц</h3></header>
            <div class="module_content">
                <ul>
                    <li><a href="<?=$this->createUrl('statuses/index')?>">Список статусов матриц</a></li>
                    <li><a href="<?=$this->createUrl('statuses/create')?>">Создать новый статус</a></li>
                </ul>
            </div>
        </article>
    <? endif; ?>
        