<?php
    $this->breadcrumbs[Yii::t('app', 'Панель управления')] = array('/admin');
    $this->breadcrumbs[Yii::t('app', 'Управление продукцией')] = array('/admin/catalog');
    $this->breadcrumbs[Yii::t('app', 'Каталоги')] = array('index');
?>

<script src="<?=Yii::app()->theme->baseUrl?>/js/admin/catalog/plugins/jquery.tree/jquery.tree.min.js"></script>

<? if (empty($list)) :?>
    <div class="note note-success">
        <?=Yii::t('app', 'Не найдено ни одного каталога')?>. 
        <? if (Yii::app()->user->checkAccess('AdminCatalogCataloguesCreate')) : ?>
            <?=Yii::t('app', 'Вы можете')?> <a href="<?=$this->createUrl('create')?>"><?=Yii::t('app', 'создать новый')?></a> <?=Yii::t('app', 'каталог')?>
        <? endif; ?>
    </div>
<? else : ?>
    <div class="portlet box yellow">
        <div class="portlet-title">
            <h3 class="caption"><i class="fa fa-folder"></i> <?=Yii::t('app', 'Список каталогов продукции')?></h3>
        </div>
        <div class="portlet-body form form-horizontal">
            <div class="form-body">
            
                <div class="note note-info" style="margin-top: 20px;">
                    <p>
                        <?=Yii::t('app', 'Всего создано каталогов')?>: <?=count($list);?></span>
                    </p>
                </div>         
                
                
                <? if (Yii::app()->user->checkAccess('AdminCatalogCataloguesCreate')) : ?>
                    <?=CHtml::link(Yii::t('app', 'Добавить новый каталог'), $this->createUrl('create'), array('class' => 'btn green'));?>
                <? endif; ?>
                

                <div class="table-scrollable">
                    <table class="nav-list table table-hover" id="catalogues">
                        <thead>
                            <tr>
                                <th><?=CataloguesLang::model()->getAttributeLabel('name')?></th>
                                <th><?=Catalogues::model()->getAttributeLabel('url')?></th>
                                <th><?=Yii::t('app', 'Количество подкаталогов')?></th>
                                <th><?=Yii::t('app', 'Количество продуктов')?></th>
                                <th><?=Yii::t('app', 'Действия')?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <? foreach($list as $key => $item): ?>
                            <tr class="tn-container" node="<?=$item['id']?>" parent="<?=$item['parent_id']?>" children_count="<?=$item['children_count']?>" level="<?=$item['tree_level'] - 1?>">
                                    <td class="tn-manager">
                                        <div class="tnm-children">
                                            <span class="fa fa-plus-square-o tnm-toggle-fa" mode="firstline" action="expand"></span>
                                            <span class="fa fa-minus-square-o tnm-toggle-fa" mode="firstline" action="expand"></span>
                                        </div>                                
                                        <div class="tnm-content">
                                            <?=CHtml::encode($item['name'])?>
                                        </div>
                                    </td>
                                    <td>
                                        <?=CHtml::link(CHtml::encode($item['url']), CHtml::encode($item['url']), ['target' => '_blank'])?>
                                    </td>
                                    <td><?=$item['children_count']?></td>
                                    <td><?=Catalogues::getTotalProducts($item['id'])?></td>
                                    <td style="white-space: nowrap; word-wrap: normal;">

                                        <? if (($item['created_at'] != NULL) || ($item['creator'] != NULL) || ($item['modified_at'] != NULL) || ($item['redactor'] != NULL)) : ?>
                                            <span type="button" class="btn blue-steel popovers"
                                                data-trigger="hover" 
                                                data-placement="left" 
                                                data-html="true"
                                                data-content="
                                                    <? if ($item['created_at'] != NULL) : ?>
                                                        <span class='text-semibold'><?=Yii::t('app', 'Дата создания')?>:</span>
                                                        <?=MSmarty::date_format($item['created_at'], 'd.m.Y')?> <?=MSmarty::date_format($item['created_at'], 'H:i')?><br/>
                                                    <? endif; ?>
                                                    <? if ($item['creator'] != NULL) : ?>
                                                        <span class='text-semibold'><?=Yii::t('app', 'Автор')?>:</span>
                                                        <?=$item['creator']?><br/>
                                                    <? endif; ?>
                                                    <? if ($item['modified_at'] != NULL) : ?>
                                                        <span class='text-semibold'><?=Yii::t('app', 'Дата редактирования')?>:</span>
                                                        <?=MSmarty::date_format($item['modified_at'], 'd.m.Y')?> <?=MSmarty::date_format($item['modified_at'], 'H:i')?><br/>
                                                    <? endif; ?>
                                                    <? if ($item['redactor'] != NULL) : ?>
                                                        <span class='text-semibold'><?=Yii::t('app', 'Логин редактировавшего')?>:</span>
                                                        <?=$item['redactor']?><br/>
                                                    <? endif; ?>
                                                " 
                                                data-original-title="<?=Yii::t('app', 'Дополнительная информация')?>"
                                            >
                                                <i class="fa fa-info"></i>
                                            </span>
                                        <? endif; ?>

                                        <? if (Yii::app()->user->checkAccess('AdminCatalogCataloguesView')) : ?>
                                            <?=CHtml::link('<i class="glyphicon glyphicon-eye-open"></i>', array('view', 'id' => $item['id']), array(
                                                'style' => 'float: none;', 
                                                'class' => 'btn blue-steel tooltips',
                                                'data-container' => 'body', 
                                                'data-placement' => 'bottom',
                                                'data-original-title' => Yii::t('app', 'Просмотр')))?> 
                                        <? endif; ?>

                                        <? if (Yii::app()->user->checkAccess('AdminCatalogCataloguesUpdate')) : ?>
                                            <?=CHtml::link('<i class="glyphicon glyphicon-pencil"></i>', array('update', 'id' => $item['id']), array(
                                                'style' => 'float: none;', 
                                                'class'=>'btn green-seagreen tooltips',
                                                'data-container' => 'body', 
                                                'data-placement' => 'bottom',
                                                'data-original-title' => Yii::t('app', 'Редактировать')))?> 
                                        <? endif; ?>

                                        <? if (Yii::app()->user->checkAccess('AdminCatalogCataloguesCreateSub')) : ?>
                                            <?=CHtml::link('<i class="fa fa-plus"></i>', array('create', 'parent_id' => $item['id']), array(
                                                'style' => 'float: none',
                                                'class'=>'btn green tooltips',
                                                'data-container' => 'body', 
                                                'data-placement' => 'bottom',
                                                'data-original-title' => Yii::t('app', 'Добавить подкаталог')))?> 
                                        <? endif; ?>

                                        <? if (Yii::app()->user->checkAccess('AdminCatalogProductsCreate')) : ?>
                                            <?=CHtml::link('<i class="glyphicon glyphicon-import"></i>', array('product/create', 'action' => 'new', 'id' => (int)FALSE, 'catalogue_id' => sha1($item['id'])), array(
                                                'style' => 'float: none',
                                                'class'=>'btn yellow tooltips',
                                                'data-container' => 'body', 
                                                'data-placement' => 'bottom',
                                                'data-original-title' => Yii::t('app', 'Добавить продукт')))?> 
                                        <? endif; ?>

                                        <?=CHtml::link('<i class="glyphicon glyphicon-remove"></i>', '#', array(
                                            'class'=>'btn tooltips red catalogue-delete',
                                            'data-container' => 'body', 
                                            'data-placement' => 'bottom',
                                            'data-original-title' => Yii::t('app', 'Удалить'), 'style' => 'float: none;'))?>
                                    </td>
                                
                            </tr>
                            <? endforeach; ?>
                        </tbody>
                    </table>
                </div>

            </div>
            
            <div class="form-actions">
                <? if (Yii::app()->user->checkAccess('AdminCatalogCataloguesCreate')) : ?>
                    <?=CHtml::link(Yii::t('app', 'Добавить новый каталог'), $this->createUrl('create'), array('class' => 'btn green'));?>
                <? endif; ?>
            </div>        
            
        </div>
    </div>
<? endif; ?>