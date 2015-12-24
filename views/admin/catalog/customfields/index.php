<?php
    $this->breadcrumbs[Yii::t('app', 'Панель управления')] = array('/admin');
    $this->breadcrumbs[Yii::t('app', 'Управление продукцией')] = array('/admin/catalog');
    $this->breadcrumbs[Yii::t('app', 'Настраиваемые поля продуктов')] = array('index');
?>

<? if (empty($customFields)) :?>
    <div class="note note-success">
        <?=Yii::t('app', 'Не найдено ни одного настроиваемого поля')?>. 
        <? if (Yii::app()->user->checkAccess('AdminCatalogCustomfieldsCreate')) : ?>
            <?=Yii::t('app', 'Вы можете')?> <a href="<?=$this->createUrl('create')?>"><?=Yii::t('app', 'создать новое')?></a> <?=Yii::t('app', 'настраиваемое поле')?>
        <? endif; ?>
    </div>
<? else : ?>
    <div class="portlet box yellow">
        <div class="portlet-title">
            <h3 class="caption"><i class="fa fa-gear"></i> <?=Yii::t('app', 'Список настраиваемых полей')?></h3>
        </div>
        <div class="portlet-body form form-horizontal">
            <div class="form-body">
            
                <div class="note note-info" style="margin-top: 20px;">
                    <p>
                        <?=Yii::t('app', 'Всего настраиваемых полей')?>: <?=$count?></span>
                    </p>
                </div>         
                
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="dataTables_length" id="objects_length">
                            <label>  
                                <select id="pageSizeSeletor" name="objects_length" aria-controls="objects" class="form-control input-xsmall input-inline" onChange="changePageSize()">
                                    <option value="25" <? if ($unit == 25) : ?>selected="selected"<? endif; ?>>25</option>
                                    <option value="50" <? if ($unit == 50) : ?>selected="selected"<? endif; ?>>50</option>
                                    <option value="100" <? if ($unit == 100) : ?>selected="selected"<? endif; ?>>100</option>
                                </select> <?=Yii::t('app', 'записей на странице')?>
                            </label>
                        </div>
                        <div id="objects_filter" class="dataTables_filter">
                            <?= CHtml::beginForm() ?>
                                <label><?=Yii::t('app','Введите свое значение')?>:
                                    <?= CHtml::textField('unit', '', array('size' => '5', 'class' => 'form-control input-xsmall input-inline'))?>
                                </label>        
                                <?php echo CHtml::submitButton(Yii::t('app', 'Применить'), array('name' => 'btn-unit', 'class' => 'btn green', 'style' => 'float: none;')); ?>
                            <?= CHtml::endForm() ?>                                
                        </div>                            
                    </div>
                    
                    <div class="col-md-6 col-sm-12">

                    </div>
                </div>

                <div class="table-scrollable">
                    <table class="nav-list table table-hover" id="catalogues">
                        <thead>
                            <tr>
                                <th><?=CustomFields::model()->getAttributeLabel('id')?></th>
								<th><?=CustomFields::model()->getAttributeLabel('name')?></th>
								<th><?=CustomFields::model()->getAttributeLabel('field_format')?></th>
                                <th><?=Yii::t('app', 'Количество назначенных товаров')?></th>
								<th><?=Yii::t('app', 'Операции')?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = ((array_key_exists('page', $_GET) ? $_GET['page'] : (int)TRUE) - 1) * $unit + 1; ?>
                            <? foreach($customFields as $field): ?>
								<tr data-field-id="<?=$field->id?>">
									<td><?=$i++?></td>
									<td><?=CHtml::encode($field->name)?></td>
									<td><?=CustomFieldsFormats::item($field->field_format)?></td>
                                    <td><?=$field->productCount()?></td>
									<td>
										<? if (Yii::app()->user->checkAccess('AdminCatalogCustomfieldsView')) : ?>
											<?=CHtml::link('<i class="glyphicon glyphicon-eye-open"></i>', array('view', 'id' => $field->id), array(
												'style' => 'float: none;', 
												'class' => 'btn blue-steel tooltips',
												'data-container' => 'body', 
												'data-placement' => 'bottom',
												'data-original-title' => Yii::t('app', 'Просмотр')))?> 
										<? endif; ?>
										<? if (Yii::app()->user->checkAccess('AdminCatalogCustomfieldsUpdate')) : ?>
											<?=CHtml::link('<i class="glyphicon glyphicon-pencil"></i>', array('update', 'id' => $field->id), array(
												'style' => 'float: none;', 
												'class'=>'btn green-seagreen tooltips',
												'data-container' => 'body', 
												'data-placement' => 'bottom',
												'data-original-title' => Yii::t('app', 'Редактировать')))?> 
										<? endif; ?>
										<? if ((Yii::app()->user->checkAccess('AdminCatalogCustomfieldsDelete')) && ($field->productCount() == (int)FALSE)) : ?>
											<?=CHtml::link('<i class="glyphicon glyphicon-remove"></i>', '#', array(
												'class'=>'btn tooltips red field-delete',
												'data-container' => 'body', 
												'data-placement' => 'bottom',
												'data-original-title' => Yii::t('app', 'Удалить'), 'style' => 'float: none;'))?>
										<? endif; ?>
								</tr>
                            <? endforeach; ?>
                        </tbody>
                    </table>
                </div>

            </div>
            
            <div class="form-actions">
                <? if (Yii::app()->user->checkAccess('AdminCatalogCustomfieldsCreate')) : ?>
                    <?=CHtml::link(Yii::t('app', 'Создать новое настраиваемое поле'), $this->createUrl('create'), array('class' => 'btn green'));?>
                <? endif; ?>
            </div>        
            
        </div>
    </div>
<? endif; ?>