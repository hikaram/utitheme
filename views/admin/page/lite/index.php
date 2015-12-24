<? if ((Yii::app()->user->checkAccess('AdminPagesPageChangeMode')) && ((bool)PagesSettings::isAllowedChangeByAdmin())) : ?>
    <? if (PagesSettings::getEditMode() == PagesSettings::EDIT_MODE_LITE) : ?>
        <div class="alert alert-warning">
			<i class="fa fa-info mr10"></i>
			<?=Yii::t('app', 'Включен упрощенный режим редактора страниц. Вы можете включить профессиональный режим редактора')?>
            <?=CHtml::link(Yii::t('app', 'Перейти в pro-режим'), $this->createUrl('changemode'), array('class' => 'alert-link'))?>
		</div>
    <? endif; ?>
<? endif; ?>

<? if ((empty($all_pages)) && (empty($filter))) :?>
	<div class="note note-success">
		<?=Yii::t('app', 'Не найдено ни одной страницы')?>.
		<? if (Yii::app()->user->checkAccess('AdminPagesPageCreate')) : ?>
			<?=Yii::t('app', 'Вы можете')?> <?=CHtml::link(Yii::t('app', 'создать новую'), $this->createUrl('create'))?> <?=Yii::t('app', 'страницу')?>
		<? endif; ?>
	</div>
<? else : ?>
	<div class="portlet box yellow">
		<div class="portlet-title">
			<h3 class="caption"><i class="fa fa-file-text-o" style="margin-right: 10px;"></i> <?=Yii::t('app', 'Страницы')?></h3>
		</div>
		<div class="portlet-body">
            <div class="note note-info">
                <h4 style="margin-bottom: 0;">
                    <?=Yii::t('app', 'Всего страниц: ')?><?=$totalCount?>.
                    <? if (!empty($filter)) : ?>
                        <?=Yii::t('app', 'По запросу найдено: ')?><?=$count?>
                    <? endif; ?>
                </h4>
            </div>

            <div class="form-actions" style="margin-bottom: 20px;">
                <? if (Yii::app()->user->checkAccess('AdminPagesPageCreate')) : ?>
                    <?=CHtml::link(Yii::t('app', 'Создать новую страницу'), $this->createUrl('create'), array('class' => 'btn green'));?>
                <? endif; ?>
            </div>             

            <?php echo $this->renderPartial('_filter', [
                'filter'	=> $filter
            ]); ?>

            <? if (empty($all_pages)) : ?>
            
                <div class="note note-danger" style="margin-top: 20px;">
                    <p>
                        <?=Yii::t('app', 'Не найдено ни одной страницу, удовлетворяющей условиям фильтрации. Сбросьте фильтр или измените поисковые данные')?>
                    </p>
                </div>             

            <? else : ?>

                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="dataTables_length" id="objects_length" style="display: inline-block;">
                            <label>  
                                <select id="pageSizeSeletor" name="objects_length" aria-controls="objects" class="form-control input-xsmall input-inline" onChange="changePageSize()">
                                    <? if (!in_array($unit, [25, 50, 100])) : ?>
                                        <option value="" selected="selected"></option>
                                    <? endif; ?>
                                    <option value="25" <? if ($unit == 25) : ?>selected="selected"<? endif; ?>>25</option>
                                    <option value="50" <? if ($unit == 50) : ?>selected="selected"<? endif; ?>>50</option>
                                    <option value="100" <? if ($unit == 100) : ?>selected="selected"<? endif; ?>>100</option>
                                </select> <?=Yii::t('app', 'записей на странице')?>
                            </label>
                        </div>
                        <div id="objects_filter" class="dataTables_filter" style="display: inline-block; margin-left: 20px;">
                            <?= CHtml::beginForm() ?>
                                <label><?=Yii::t('app','Введите свое значение')?>:
                                    <input type="number" min="1" max="500" value="<?=$unit?>" step="1" size="7" class="form-control input-xsmall input-inline" name="unit" />
                                </label>        
                                <?php echo CHtml::submitButton(Yii::t('app', 'Применить'), array('name' => 'btn-unit', 'class' => 'btn green', 'style' => 'float: none;')); ?>
                            <?= CHtml::endForm() ?>                                
                        </div>
                    </div>
                    
                    <div class="col-md-6 col-sm-12">

                    </div>
                </div>
				<div class="table-scrollable">
					<table class="table table-hover">
						<thead>
							<tr>
								<th><?=Yii::t('app', 'Номер')?></th>
								<th><?=Yii::t('app', 'Название страницы')?></th>
								<th><?=Yii::t('app', 'Шаблон')?></th>
								<th><?=Yii::t('app', 'Ключевые слова')?></th>
								<th><?=Yii::t('app', 'Описание')?></th>
								<th><?=Yii::t('app', 'Действие')?></th>
							</tr>
						</thead>
						<tbody>
							<?php $i = ((array_key_exists('page', $_GET) ? $_GET['page'] : (int)TRUE) - 1) * $unit + 1; ?>
							<? foreach($all_pages as $item => $page) :?>
							<tr>
								<td><?=$i++?></td>
								<td><?=CHtml::encode($page->lang->title)?></td>
								<td>
									<? if ($page->layout == 'wide') : ?><?=Yii::t('app', 'Без колонок')?>
									<? elseif ($page->layout == 'l_column') : ?><?=Yii::t('app', 'С левой колонкой')?>
									<? elseif ($page->layout == 'r_column') : ?><?=Yii::t('app', 'С правой колонкой')?>
									<? elseif ($page->layout == 'three_column') : ?><?=Yii::t('app', 'С тремя колонками')?>
									<? elseif ($page->layout == 'max_wide') : ?><?=Yii::t('app', 'Без колонок - широкая')?>
									<? elseif ($page->layout == 'max_l_column') : ?><?=Yii::t('app', 'С левой колонкой - широкая')?>
									<? elseif ($page->layout == 'max_r_column') : ?><?=Yii::t('app', 'С правой колонкой - широкая')?>
									<? elseif ($page->layout == 'max_three_column') : ?><?=Yii::t('app', 'С тремя колонками - широкая')?>
									<? endif; ?>
								</td>
								<td><?=CHtml::encode($page->lang->keywords)?></td>
								<td><?=CHtml::encode($page->lang->description)?></td>
								<td style="white-space: nowrap; word-wrap: normal;">

                                    <? if (($page->created_at != NULL) || ($page->creator != NULL) || ($page->modified_at != NULL) || ($page->redactor != NULL)) : ?>
                                        <span type="button" class="btn blue-steel popovers"
                                            data-trigger="hover" 
                                            data-placement="left" 
                                            data-html="true"
                                            data-content="
                                                <? if ($page->created_at != NULL) : ?>
                                                    <span class='text-semibold'><?=Yii::t('app', 'Дата создания')?>:</span>
                                                    <?=MSmarty::date_format($page->created_at, 'd.m.Y')?> <?=MSmarty::date_format($page->created_at, 'H:i')?><br/>
                                                <? endif; ?>
                                                <? if ($page->creator != NULL) : ?>
                                                    <span class='text-semibold'><?=Yii::t('app', 'Автор')?>:</span>
                                                    <?=$page->creator->username?><br/>
                                                <? endif; ?>
                                                <? if ($page->modified_at != NULL) : ?>
                                                    <span class='text-semibold'><?=Yii::t('app', 'Дата редактирования')?>:</span>
                                                    <?=MSmarty::date_format($page->modified_at, 'd.m.Y')?> <?=MSmarty::date_format($page->modified_at, 'H:i')?><br/>
                                                <? endif; ?>
                                                <? if ($page->redactor != NULL) : ?>
                                                    <span class='text-semibold'><?=Yii::t('app', 'Логин редактировавшего')?>:</span>
                                                    <?=$page->redactor->username?><br/>
                                                <? endif; ?>
                                            " 
                                            data-original-title="<?=Yii::t('app', 'Дополнительная информация')?>"
                                        >
                                            <i class="fa fa-info"></i>
                                        </span>
                                    <? endif; ?>

									<? if ((Yii::app()->user->checkAccess('AdminPagesPageEdit')) && ((Yii::app()->user->username == Yii::app()->params['superAdminInfo']['username']) || ($page->is_edit_admin))) : ?>
										<?=CHtml::link('<i class="glyphicon glyphicon-pencil"></i>', $this->createUrl('lite/edit', array('id' => $page->id)), array(
											'class' => 'btn green-seagreen tooltips',
											'data-container' => 'body', 
											'data-placement' => 'bottom',
											'data-original-title' => Yii::t('app', 'Редактировать'),
										))?>
									<? endif; ?>
										
									<? if ((Yii::app()->user->checkAccess('AdminPagesPageDelete')) && ((Yii::app()->user->username == Yii::app()->params['superAdminInfo']['username']) || ($page->is_edit_admin))) : ?>
										<?=CHtml::linkButton('<i class="glyphicon glyphicon-remove"></i>',array(
											'submit' => array('lite/delete', 'id' => $page->id),
											'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
											'confirm' => Yii::t('app', 'Удалить страницу ?'),
											'class' => 'btn red tooltips',
											'data-container' => 'body', 
											'data-placement' => 'bottom',
											'data-original-title' => Yii::t('app', 'Удалить'),
										));  ?>
									<? endif; ?>
								</td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
	            <? $this->widget('CLinkPager', array(
	                'pages' => $pages,
	                'nextPageLabel' => '<i class="fa fa-angle-double-right"></i>', 
	                'prevPageLabel' => '<i class="fa fa-angle-double-left"></i>', 
	                'header' => '',
	                'selectedPageCssClass' => 'active',
	                'htmlOptions' => array(
	                    'class' => 'pagination'
	                )
	            )) ?>

            <? endif; ?>

            <div class="form-actions">
                <? if (Yii::app()->user->checkAccess('AdminPagesPageCreate')) : ?>
                    <?=CHtml::link(Yii::t('app', 'Создать новую страницу'), $this->createUrl('create'), array('class' => 'btn green'));?>
                <? endif; ?>
            </div> 

		</div>
	</div>

<? endif; ?>