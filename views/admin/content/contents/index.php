<? if ((empty($contents)) && (empty($filter))) : ?>
    <div class="note note-success"><?=Yii::t('app', 'Текстовые блоки не созданы')?>.
        <? if (Yii::app()->user->checkAccess('AdminContentContentsCreate')) : ?>
            <?=Yii::t('app', 'Вы можете')?> <?=CHtml::link(Yii::t('app', 'создать новый'), $this->createUrl('create'))?> <?=Yii::t('app', 'текстовый блок')?>
        <? endif; ?>
    </div>
<? else : ?>
	<div class="portlet box yellow">
		<div class="portlet-title">
			<h3 class="caption"><i class="fa fa-file-text" style="margin-right: 10px;"></i> <?=Yii::t('app', 'Текстовые блоки')?></h3>
		</div>
		<div class="portlet-body">
            <div class="note note-info">
                <h4 style="margin-bottom: 0;">
                    <?=Yii::t('app', 'Всего текстовых блоков: ')?><?=$count?>.
                    <? if (!empty($filter)) : ?>
                        <?=Yii::t('app', 'По запросу найдено: ')?><?=$totalCount?>
                    <? endif; ?>
                </h4>
            </div>

            <div class="form-actions" style="margin-bottom: 20px;">
                <? if (Yii::app()->user->checkAccess('AdminContentContentsCreate')) : ?>
                    <?=CHtml::link(Yii::t('app', 'Создать новый текстовый блок'), $this->createUrl('create'), array('class' => 'btn green'));?>
                <? endif; ?>
            </div>             

            <?php echo $this->renderPartial('_filter', [
                'filter'	=> $filter
            ]); ?>

            <? if (empty($contents)) : ?>
            
                <div class="note note-danger" style="margin-top: 20px;">
                    <p>
                        <?=Yii::t('app', 'Не найдено ни одного текстового блока, удовлетворяющего условиям фильтрации. Сбросьте фильтр или измените поисковые данные')?>
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
								<th class="photo"><?=Yii::t('app', 'Номер')?></th>
								<th class="photo"><?=Yii::t('app', 'Имя блока')?></th>
								<th class="action"><?=Yii::t('app', 'Действие')?></th>
							</tr>
						</thead>
						<tbody>
							<?php $i = ((array_key_exists('page', $_GET) ? $_GET['page'] : (int)TRUE) - 1) * $unit + 1; ?>
							
								<?php foreach($contents as $item => $content) :?>
								<tr>
									<td><?=$i++?></td>
									<td style="padding-left: 15px; padding-right: 5px;"><?=CHtml::encode($content->name)?></td>
									<td class="action" style="white-space: nowrap; word-wrap: normal;">

                                        <? if (($content->created_at != NULL) || ($content->creator != NULL) || ($content->modified_at != NULL) || ($content->redactor != NULL)) : ?>
                                            <span type="button" class="btn blue-steel popovers"
                                                data-trigger="hover" 
                                                data-placement="left" 
                                                data-html="true"
                                                data-content="
                                                    <? if ($content->created_at != NULL) : ?>
                                                        <span class='text-semibold'><?=Yii::t('app', 'Дата создания')?>:</span>
                                                        <?=MSmarty::date_format($content->created_at, 'd.m.Y')?> <?=MSmarty::date_format($content->created_at, 'H:i')?><br/>
                                                    <? endif; ?>
                                                    <? if ($content->creator != NULL) : ?>
                                                        <span class='text-semibold'><?=Yii::t('app', 'Автор')?>:</span>
                                                        <?=$content->creator->username?><br/>
                                                    <? endif; ?>
                                                    <? if ($content->modified_at != NULL) : ?>
                                                        <span class='text-semibold'><?=Yii::t('app', 'Дата редактирования')?>:</span>
                                                        <?=MSmarty::date_format($content->modified_at, 'd.m.Y')?> <?=MSmarty::date_format($content->modified_at, 'H:i')?><br/>
                                                    <? endif; ?>
                                                    <? if ($content->redactor != NULL) : ?>
                                                        <span class='text-semibold'><?=Yii::t('app', 'Логин редактировавшего')?>:</span>
                                                        <?=$content->redactor->username?><br/>
                                                    <? endif; ?>
                                                " 
                                                data-original-title="<?=Yii::t('app', 'Дополнительная информация')?>"
                                            >
                                                <i class="fa fa-info"></i>
                                            </span>
                                        <? endif; ?>

										<? if (Yii::app()->user->checkAccess('AdminContentContentsView')) : ?>
											<?=CHtml::link('<i class="glyphicon glyphicon-eye-open"></i>', $this->createUrl('contents/view', array('id' => $content->id)), array(
												'class' => 'btn blue-steel tooltips',
												'data-container' => 'body', 
												'data-placement' => 'bottom',
												'data-original-title' => Yii::t('app', 'Просмотр')
											))?>
										<? endif; ?>
											
										<? if (Yii::app()->user->checkAccess('AdminContentContentsUpdate')) : ?>
											<?=CHtml::link('<i class="glyphicon glyphicon-pencil"></i>', $this->createUrl('contents/update', array('id' => $content->id)), array(
												'class' => 'btn green-seagreen tooltips',
												'data-container' => 'body', 
												'data-placement' => 'bottom',
												'data-original-title' => Yii::t('app', 'Редактировать')
											))?>
										<? endif; ?>
											
										<? if (Yii::app()->user->checkAccess('AdminContentContentsDelete')) : ?>
											<?=CHtml::linkButton('<i class="glyphicon glyphicon-remove"></i>',array(
												'submit' => array('contents/delete', 
												'id' => $content->id), 
												'class' => 'btn red tooltips',
												'data-container' => 'body', 
												'data-placement' => 'bottom',
												'data-original-title' => Yii::t('app', 'Удалить'),
												'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
												'confirm' => Yii::t('app', 'Удалить текстовый блок ?')));  ?>
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
                <? if (Yii::app()->user->checkAccess('AdminContentContentsCreate')) : ?>
                    <?=CHtml::link(Yii::t('app', 'Создать новый текстовый блок'), $this->createUrl('create'), array('class' => 'btn green'));?>
                <? endif; ?>
            </div> 	        
    
		</div>
	</div>
	
<? endif; ?>

