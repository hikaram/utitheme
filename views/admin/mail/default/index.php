<?
function crop_str($string, $limit)
{

    if (strlen($string) >= $limit ) {
        $substring_limited = substr($string,0, $limit);
        $short = strip_tags(substr($substring_limited, 0, strrpos($substring_limited, ' ' ))).'...';
		return $short;
    } else {
		return strip_tags($string);
    }
}
?>

<?php
$this->breadcrumbs[Yii::t('app', 'Управление почтой')] = $this->createUrl('index');

?>

<? if ((empty($models)) && (empty($filter))) : ?>
    <div class="note note-success"><?=Yii::t('app', 'Письма не созданы')?>.</div>
    <? if (Yii::app()->user->checkAccess('AdminMailDefaultCreate')) : ?>
        <?=Yii::t('app', 'Вы можете')?> <?=CHtml::link(Yii::t('app', 'создать новое'), $this->createUrl('create'))?> <?=Yii::t('app', 'письмо')?>
    <? endif; ?>
<? else : ?>

	<div class="portlet box yellow">
		<div class="portlet-title">
			<h3 class="caption"><i class="fa fa-envelope-o" style="margin-right: 10px;"></i> <?=Yii::t('app', 'Управление почтой')?></h3>
		</div>
		<div class="portlet-body">
            <div class="note note-info">
                <h4 style="margin-bottom: 0;">
                    <?=Yii::t('app', 'Всего писем: ')?><?=$totalCount?>.
                    <? if (!empty($filter)) : ?>
                        <?=Yii::t('app', 'По запросу найдено: ')?><?=$count?>
                    <? endif; ?>
                </h4>
            </div>

            <div class="form-actions" style="margin-bottom: 20px;">
                <? if (Yii::app()->user->checkAccess('AdminMailDefaultCreate')) : ?>
                    <?=CHtml::link(Yii::t('app', 'Создать новое письмо'), $this->createUrl('create'), array('class' => 'btn green'));?>
                <? endif; ?>
            </div>             

            <?php echo $this->renderPartial('_filter', [
                'filter'	=> $filter
            ]); ?>

            <? if (empty($models)) : ?>
            
                <div class="note note-danger" style="margin-top: 20px;">
                    <p>
                        <?=Yii::t('app', 'Не найдено ни одного письма, удовлетворяющего условиям фильтрации. Сбросьте фильтр или измените поисковые данные')?>
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
								<th><?=$models[0]->getAttributeLabel('from_name')?></th>
								<th><?=$models[0]->getAttributeLabel('from')?></th>
								<th><?=$models[0]->getAttributeLabel('to')?></th>
								<th><?=$models[0]->getAttributeLabel('subject')?></th>
								<th><?=$models[0]->getAttributeLabel('body')?></th>
								<th><?=$models[0]->getAttributeLabel('posted_at')?></th>
								<th><?=$models[0]->getAttributeLabel('status_alias')?></th>
								<th><?=Yii::t('app', 'Действия')?></th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($models as $model) : ?>
							<tr>
								<td><?=CHtml::encode($model->from_name)?></td>
								<td><?=CHtml::encode($model->from)?></td>
								<td><?=CHtml::encode($model->to)?></td>
								<td><?=CHtml::encode($model->subject)?></td>
								<td><p style="word-wrap: break-word; max-width: 550px;">
									<?#=crop_str(CHtml::encode($model->body), 200)?>
									<?#=CHtml::encode($model->body)?>
									<?#=MSmarty::truncate(CHtml::encode($model->body), 10, '...', true)?>
		                            <?=strip_tags(mb_substr($model->body, 0, 50, 'UTF-8'))?>...
								</p></td>
								<td>
									<? if ($model->posted_at == NULL) : ?>
										- - 
									<? else : ?>
										<?=MSmarty::date_format($model->posted_at, 'd.m.Y')?> <?=MSmarty::date_format($model->posted_at, 'H:i')?>
									<? endif; ?>
								</td>
								<td>
		                            <? if ($model->status_alias == MailLetters::status_new) : ?>
		                                <?=Yii::t('app', 'Новое')?>
		                            <? elseif ($model->status_alias == MailLetters::status_posted) : ?>
		                                <?=Yii::t('app', 'Отправлено')?>
		                            <? elseif ($model->status_alias == MailLetters::status_decline) : ?>
		                                <?=Yii::t('app', 'Отменено')?>
		                            <? endif; ?>
		                        </td>
								<td style="white-space: nowrap; word-wrap: normal;">

                                    <? if (($model->created_at != NULL) || ($model->creator != NULL) || ($model->modified_at != NULL) || ($model->redactor != NULL)) : ?>
                                        <span type="button" class="btn blue-steel popovers"
                                            data-trigger="hover" 
                                            data-placement="left" 
                                            data-html="true"
                                            data-content="
                                                <? if ($model->created_at != NULL) : ?>
                                                    <span class='text-semibold'><?=Yii::t('app', 'Дата создания')?>:</span>
                                                    <?=MSmarty::date_format($model->created_at, 'd.m.Y')?> <?=MSmarty::date_format($model->created_at, 'H:i')?><br/>
                                                <? endif; ?>
                                                <? if ($model->creator != NULL) : ?>
                                                    <span class='text-semibold'><?=Yii::t('app', 'Автор')?>:</span>
                                                    <?=$model->creator->username?><br/>
                                                <? endif; ?>
                                                <? if ($model->modified_at != NULL) : ?>
                                                    <span class='text-semibold'><?=Yii::t('app', 'Дата редактирования')?>:</span>
                                                    <?=MSmarty::date_format($model->modified_at, 'd.m.Y')?> <?=MSmarty::date_format($model->modified_at, 'H:i')?><br/>
                                                <? endif; ?>
                                                <? if ($model->redactor != NULL) : ?>
                                                    <span class='text-semibold'><?=Yii::t('app', 'Логин редактировавшего')?>:</span>
                                                    <?=$model->redactor->username?><br/>
                                                <? endif; ?>
                                            " 
                                            data-original-title="<?=Yii::t('app', 'Дополнительная информация')?>"
                                        >
                                            <i class="fa fa-info"></i>
                                        </span>
                                    <? endif; ?>

									<?=CHtml::link('<i class="glyphicon glyphicon-eye-open"></i>', $this->createUrl('view', array('id' => $model->id)), array(
										'class' => 'btn blue-steel tooltips',
										'data-container' => 'body', 
										'data-placement' => 'bottom',
										'data-original-title' => Yii::t('app', 'Просмотр'),
									))?>

									<?=CHtml::link('<i class="glyphicon glyphicon-eye-open"></i>', $this->createUrl('html', array('id' => $model->id)), array(
										'class' => 'btn blue-steel tooltips',
										'target' => '_blank',
										'data-container' => 'body', 
										'data-placement' => 'bottom',
										'data-original-title' => Yii::t('app', 'Просмотр HTML'),
									))?>

									<?=CHtml::form('', 'post', array(
										'class'=>'btn tooltips', 
										'style'=>'padding: 0;',
										'data-container' => 'body', 
										'data-placement' => 'bottom',
										'data-original-title' => Yii::t('app', 'Отправить'),
									))?>
										<?=CHtml::linkButton('<i class="fa fa-send"></i>', array(
											'submit'=>array(
												'send',
												'id' => $model->id,
											),
											'params'=>array(
												Yii::app()->request->csrfTokenName => Yii::app()->request->csrfToken
											),
											'confirm' => Yii::t('app', 'Отправить письмо ?'),
											'class' => 'btn yellow'
										))?>
									<?=CHtml::endForm() ?>
									
									<?=CHtml::link('<i class="glyphicon glyphicon-pencil"></i>', $this->createUrl('update', array('id' => $model->id)), array(
										'class'=>'btn green-seagreen tooltips',
										'data-container' => 'body', 
										'data-placement' => 'bottom',
										'data-original-title' => Yii::t('app', 'Редактировать'),
									))?>

									<? if (Yii::app()->user->username == Yii::app()->params['superAdminInfo']['username']) : ?>
									<?=CHtml::form('', 'post', array(
										'class'=>'btn tooltips',
										'data-container' => 'body', 
										'data-placement' => 'bottom',
										'data-original-title' => Yii::t('app', 'Удалить'),
										'style'=>'padding: 0;'
									))?>
										<?=CHtml::linkButton('<button class="btn red"><i class="glyphicon glyphicon-remove"></i></button>', array(
											'submit'=>array(
												'delete',
												'id' => $model->id,
											),
											'params'=>array(
												Yii::app()->request->csrfTokenName => Yii::app()->request->csrfToken
											),
											'confirm' => Yii::t('app', 'Удалить письмо ?')
										))?>
									<?=CHtml::endForm() ?>
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
                <? if (Yii::app()->user->checkAccess('AdminMailDefaultCreate')) : ?>
                    <?=CHtml::link(Yii::t('app', 'Создать новое письмо'), $this->createUrl('create'), array('class' => 'btn green'));?>
                <? endif; ?>
            </div> 

		</div>
	</div>

<?php endif; ?>