<?php
    $this->breadcrumbs[Yii::t('app', 'Панель управления')] = array('/admin');
    $this->breadcrumbs[Yii::t('app', 'Управление продукцией')] = array('/admin/catalog');
    $this->breadcrumbs[Yii::t('app', 'Валюты')] = array('index');
?>

<? if (empty($currencies)) :?>
    <div class="note note-success">
        <?=Yii::t('app', 'Не найдено ни одной валюты')?>. 
        <? if (Yii::app()->user->checkAccess('AdminCatalogCurrenciesCreate')) : ?>
            <?=Yii::t('app', 'Вы можете')?> <a href="<?=$this->createUrl('create')?>"><?=Yii::t('app', 'создать новую')?></a> <?=Yii::t('app', 'валюту')?>
        <? endif; ?>
    </div>
<? else : ?>
    <div class="portlet box yellow">
        <div class="portlet-title">
            <h3 class="caption"><i class="fa fa-money"></i> <?=Yii::t('app', 'Список валют')?></h3>
        </div>
        <div class="portlet-body form form-horizontal">
            <div class="form-body">
                
                <div class="table-scrollable">
                    <table class="nav-list table table-hover" id="currencies">
                        <thead>
                            <tr>
								<th><?=CurrenciesLang::model()->getAttributeLabel('name')?></th>
								<th><?=Currencies::model()->getAttributeLabel('symbol')?></th>				
								<th><?=Yii::t('app', 'Операции')?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <? foreach ($currencies as $currency): ?>
								<tr>
									<td><?=CHtml::encode($currency->lang->name)?></td>
									<td><?=CHtml::encode($currency->symbol)?></td>						
									<td>
									<? if (Yii::app()->user->checkAccess('AdminCatalogCurrenciesUpdate')) : ?>
										<?=CHtml::link('<i class="glyphicon glyphicon-pencil"></i>', array('update', 'id' => $currency->getPrimaryKey()), array(
											'style' => 'float: none;', 
											'class'=>'btn green-seagreen tooltips',
											'data-container' => 'body', 
											'data-placement' => 'bottom',
											'data-original-title' => Yii::t('app', 'Редактировать')))?> 
									<? endif; ?>
									<? if ((Yii::app()->user->checkAccess('AdminCatalogCurrenciesUpdate')) && ((bool)$currency->isProductExist())) : ?>
										<?=CHtml::link('<i class="glyphicon glyphicon-remove"></i>', '#', array(
											'class'=>'btn tooltips red currency-delete',
											'data-container' => 'body', 
											'data-placement' => 'bottom',
											'data-original-title' => Yii::t('app', 'Удалить'), 'style' => 'float: none;'))?>
									<? endif; ?>
									</td>
								</tr>
                            <? endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>            
        </div>
    </div>
<? endif; ?>