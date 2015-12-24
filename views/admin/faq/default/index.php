<? if ((empty($faqs))&& (empty($filter))) :?>
	<div class="note note-success">
		<?=Yii::t('app', 'Не найдено ни одной записи.')?>
		<? if (Yii::app()->user->checkAccess('AdminFaqDefaultCreate')) : ?>
			<?=Yii::t('app', 'Вы можете')?> <a href="<?=$this->createUrl('create')?>"><?=Yii::t('app', 'создать новый')?></a> <?=Yii::t('app', 'вопрос')?>
		<? endif; ?>
	</div>
<? else : ?> 
    <div class="portlet box yellow">
        <div class="portlet-title">
            <h3 class="caption"><i class="fa fa-question-circle"></i> <?=Yii::t('app', 'Вопросы-ответы')?></h3>
        </div>
        <div class="portlet-body">
        
            <div class="note note-info">
                <h4 style="margin-bottom: 0;">
                    <?=Yii::t('app', 'Всего вопросов-ответов: ')?><?=$totalCount?>.
                    <? if (!empty($filter)) : ?>
                        <?=Yii::t('app', 'По запросу найдено: ')?><?=$count?>
                    <? endif; ?>
                </h4>
            </div>

            <div class="form-actions" style="margin-bottom: 20px;">
                <? if (Yii::app()->user->checkAccess('AdminFaqDefaultCreate')) : ?>
                    <?=CHtml::link(Yii::t('app', 'Создать новый вопрос'), $this->createUrl('create'), array('class' => 'btn green'));?>
                <? endif; ?>
            </div>             

            <?php echo $this->renderPartial('_filter', [
                'filter'    => $filter
            ]); ?>

            <? if (empty($faqs)) : ?>
            
                <div class="note note-danger" style="margin-top: 20px;">
                    <p>
                        <?=Yii::t('app', 'Не найдено ни одного вопроса-ответа, удовлетворяющей условиям фильтрации. Сбросьте фильтр или измените поисковые данные')?>
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
                                <th><?=CHtml::encode(Faq::model()->getAttributeLabel('id')); ?></th>
                                <th><?=Yii::t('app', 'Вопросы')?></th>
                                <th><?=CHtml::encode(Faq::model()->getAttributeLabel('show_type')); ?></th>
                                <th><?=Yii::t('app', 'Действия')?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = ((array_key_exists('page', $_GET) ? $_GET['page'] : (int)TRUE) - 1) * FAQ_PER_PAGE + 1; ?>   
                            <? foreach($faqs as $faq) :?>  
                                <tr>
                                    <td><?=$i++?></td>
                                    <td><?=CHtml::encode($faq->lang->text)?></td>
                                    <td><?=$faq->getShowType()?></td>
                                    <td style="white-space: nowrap; word-wrap: normal;">

                                        <? if (($faq->created_at != NULL) || ($faq->creator != NULL) || ($faq->modified_at != NULL) || ($faq->redactor != NULL)) : ?>
                                            <span type="button" class="btn blue-steel popovers"
                                                data-trigger="hover" 
                                                data-placement="left" 
                                                data-html="true"
                                                data-content="
                                                    <? if ($faq->created_at != NULL) : ?>
                                                        <span class='text-semibold'><?=Yii::t('app', 'Дата создания')?>:</span>
                                                        <?=MSmarty::date_format($faq->created_at, 'd.m.Y')?> <?=MSmarty::date_format($faq->created_at, 'H:i')?><br/>
                                                    <? endif; ?>
                                                    <? if ($faq->creator != NULL) : ?>
                                                        <span class='text-semibold'><?=Yii::t('app', 'Автор')?>:</span>
                                                        <?=$faq->creator->username?><br/>
                                                    <? endif; ?>
                                                    <? if ($faq->modified_at != NULL) : ?>
                                                        <span class='text-semibold'><?=Yii::t('app', 'Дата редактирования')?>:</span>
                                                        <?=MSmarty::date_format($faq->modified_at, 'd.m.Y')?> <?=MSmarty::date_format($faq->modified_at, 'H:i')?><br/>
                                                    <? endif; ?>
                                                    <? if ($faq->redactor != NULL) : ?>
                                                        <span class='text-semibold'><?=Yii::t('app', 'Логин редактировавшего')?>:</span>
                                                        <?=$faq->redactor->username?><br/>
                                                    <? endif; ?>
                                                " 
                                                data-original-title="<?=Yii::t('app', 'Дополнительная информация')?>"
                                            >
                                                <i class="fa fa-info"></i>
                                            </span>
                                        <? endif; ?>

                                        <? if (Yii::app()->user->checkAccess('AdminFaqDefaultEdit')) : ?>
                                            <?=CHtml::link('<i class="glyphicon glyphicon-pencil"></i>', $this->createUrl('default/create', array('action' => 'edit', 'id' => sha1($faq->id))), array(
                                                'class' => 'btn green-seagreen tooltips',
                                                'data-container' => 'body', 
                                                'data-placement' => 'bottom',
                                                'data-original-title' => Yii::t('app', 'Редактировать')
                                            ))?>
                                        <? endif; ?>
                                        <? if (Yii::app()->user->checkAccess('AdminFaqDefaultDelete')) : ?>
                                            <?=CHtml::linkButton('<i class="glyphicon glyphicon-remove"></i>',array(
                                                'submit' => array('default/delete', 'id' => sha1($faq->id)),
                                                'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
                                                'confirm' => Yii::t('app', 'Удалить запись?'),
                                                'class' => 'btn red tooltips',
                                                'data-container' => 'body', 
                                                'data-placement' => 'bottom',
                                                'data-original-title' => Yii::t('app', 'Удалить')
                                            ));  ?>
                                        <? endif; ?>
                                    </td>
                                </tr>
                            <? endforeach; ?>
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
                <? if (Yii::app()->user->checkAccess('AdminFaqDefaultCreate')) : ?>
                    <?=CHtml::link(Yii::t('app', 'Создать новый вопрос'), $this->createUrl('create'), array('class' => 'btn green'));?>
                <? endif; ?>
            </div>
        </div>
    </div>
<? endif; ?>