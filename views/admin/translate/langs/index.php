<? if(empty($langs)) :?>
	<div class="note note-success">
		<?=Yii::t('app', 'Не найдено ни одного языка')?>.
		<? if (Yii::app()->user->checkAccess('AdminTranslateLangsCreate')) : ?>
			<?=Yii::t('app', 'Вы можете')?>
			<?=CHtml::link(Yii::t('app', 'добавить язык'), $this->createUrl('create'));?>
		<? endif; ?>
	</div>
<? else : ?>
<div class="portlet box yellow">
	<div class="portlet-title">
		<h3 class="caption"><i class="fa fa-book" style="margin-right: 10px;"></i> <?=Yii::t('app', 'Список языков')?></h3>
	</div>
	<div class="portlet-body">
		<div class="table-scrollable">
			<table class="table table-hover" id="langs">
				<thead>
					<tr class="top-table">
						<th><?=Yii::t('app', '№ п/п')?></th>
						<th><?=$modelLang->getAttributeLabel('title')?></th>
						<th><?=$model->getAttributeLabel('alias')?></th>
						<th><?=$model->getAttributeLabel('attachment__id_active')?></th>
						<th><?=$model->getAttributeLabel('attachment__id_nonactive')?></th>
						<th><?=Yii::t('app', 'Статус')?></th>
						<th><?=Yii::t('app', 'По умолчанию')?></th>        
						<th><?=Yii::t('app', 'Действия')?></th>
					</tr>
				</thead>
				<tbody>
					<?php $i = ((array_key_exists('page', $_GET) ? $_GET['page'] : (int)TRUE) - 1) * LANGS_PER_PAGE + 1; ?>
					<? foreach($langs as $key => $lang) :?>  
					<tr>
						<td><?=$i++?></td>
						<td><?=CHtml::encode($lang->lang->title)?></td>
						<td><?=CHtml::encode($lang->alias)?></td>
						<td>
							<? if (($lang->attachment_active != NULL) && ($lang->attachment_active->secret_name != null)) :?>
								<?=CHtml::image(MSmarty::attachment_get_file_name($lang->attachment_active->secret_name, $lang->attachment_active->raw_name, $lang->attachment_active->file_ext, '_index', 'langs_flag'), ''); ?>
							<? else : ?>
								<span class="false">&nbsp;</span>
							<? endif; ?>
						</td>
						<td>
							<? if (($lang->attachment_nonactive != NULL) && ($lang->attachment_nonactive->secret_name != null)) :?>
								<?=CHtml::image(MSmarty::attachment_get_file_name($lang->attachment_nonactive->secret_name, $lang->attachment_nonactive->raw_name, $lang->attachment_nonactive->file_ext, '_index', 'langs_flag'), ''); ?>
							<? else : ?>
								<span class="false">&nbsp;</span>
							<? endif; ?>
						</td>                    
						<td class="table-with-img">
							<? if ((Yii::app()->user->checkAccess('AdminTranslateLangsTurnon')) && (!(bool)$lang->is_enabled)) : ?>
								<div class="btn-group btn-group-sm btn-group-solid toggler-btns">
									<?=CHtml::linkButton(Yii::t('app', 'Вкл'),array(
										'submit' => array('turnedit', 'id' => $lang->id, 'status' => (int)TRUE),
										'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
										'class' => 'btn grey no-margin'
									));  ?>
									<span class="btn red">Выкл</span>
								</div>
							<? elseif ((Yii::app()->user->checkAccess('AdminTranslateLangsTurnoff')) && ((bool)$lang->is_enabled) && (!(bool)$lang->is_default)) : ?>
								<div class="btn-group btn-group-sm btn-group-solid toggler-btns">
									<span class="btn green no-margin">Вкл</span>
									<?=CHtml::linkButton(Yii::t('app', 'Выкл'),array(
										'submit' => array('turnedit', 'id' => $lang->id, 'status' => (int)FALSE),
										'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
										'class' => 'btn grey',
									));  ?>
								</div>
							<? else : ?>
								<div class="toggler-btns">
								<? if ((bool)$lang->is_enabled) : ?>
									<span class="btn btn-sm green"><?=Yii::t('app', 'Включен')?></span>
								<? else : ?>
									<span class="btn btn-sm red"><?=Yii::t('app', 'Выключен')?></span>
								<? endif; ?>
								</div>
							<? endif; ?>
						</td>                    
						<td>
							<? if ((bool)$lang->is_default) : ?>
								<i class="fa fa-check font-green"></i>
							<? else : ?>
								<i class="fa fa-times font-red"></i>
							<? endif; ?>
						</td>
						<td>
							<span type="button" class="btn blue-steel popovers"
								data-trigger="hover" 
								data-placement="left" 
								data-html="true"
								data-content="
									<span class='text-semibold'><?=Yii::t('app', 'Дата создания')?>:</span>
									<?=MSmarty::date_format($lang->created_at, 'd.m.Y')?><br/>
									<? if (Yii::app()->user->username == Yii::app()->params['superAdminInfo']['username']) : ?>
										<span class='text-semibold'><?=Yii::t('app', 'Автор')?>:</span>
										<? if ($lang->creator != NULL):?><?=$lang->creator->username?><? endif; ?><br/>
										<span class='text-semibold'><?=Yii::t('app', 'Дата редактирования')?>:</span>
										<?=MSmarty::date_format($lang->modified_at, 'd.m.Y')?><br/>
										<span class='text-semibold'><?=Yii::t('app', 'Редактор')?>:</span>
										<? if ($lang->redactor != NULL):?><?=$lang->redactor->username?><? endif; ?>
									<? endif; ?>
								" 
								data-original-title="<?=Yii::t('app', 'Дополнительная информация')?>"
							>
								<i class="fa fa-info"></i>
							</span>
							
							<? if (Yii::app()->user->checkAccess('AdminTranslateLangsEdit')) : ?>
								<?=CHtml::link('<i class="glyphicon glyphicon-pencil"></i>', $this->createUrl('create', array('action' => 'edit', 'id' => $lang->id)), array('class' => 'btn green-seagreen'));  ?>
							<? endif; ?>                        
							
							<? if ((Yii::app()->user->checkAccess('AdminTranslateLangsDelete')) && (!(bool)$lang->is_enabled) && (!(bool)$lang->is_default)) : ?>
								<?=CHtml::linkButton('<i class="glyphicon glyphicon-remove"></i>',array(
									'submit' => array('deletelang', 'id' => $lang->id),
									'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
									'confirm' => Yii::t('app', 'Удалить язык ?'),
									'class' => 'btn red',
								));  ?>
							<? endif; ?>
						   
						   <? if ((Yii::app()->user->checkAccess('AdminTranslateLangsDefault')) && ((bool)$lang->is_enabled) && (!(bool)$lang->is_default)) : ?>
								<?=CHtml::linkButton('<i class="fa fa-star"></i>',array(
									'submit' => array('defaultedit', 'id' => $lang->id),
									'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
									'class' => 'btn purple tooltips',
									'data-container' => 'body',
									'data-placement' => 'top', 
									'data-original-title' => Yii::t('app', 'Сделать по умолчанию'),
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
			'htmlOptions' => array(
				'class' => 'pagination'
			)
		)) ?>
	</div>
</div>
<? if (Yii::app()->user->checkAccess('AdminTranslateLangsCreate')) : ?>
    <?=CHtml::link(Yii::t('app', 'Добавить язык'), $this->createUrl('create'));?>
<? endif; ?>

<? endif; ?>

<? if ((Yii::app()->user->username == Yii::app()->params['superAdminInfo']['username']) && (!empty($deletedLangs))) : ?>
<div class="portlet box red-pink mt30">
	<div class="portlet-title">
		<h3 class="caption"><i class="fa fa-trash" style="margin-right: 10px;"></i> <?=Yii::t('app', 'Список удаленных языков')?></h3>
	</div>
	<div class="portlet-body">
		<div class="table-scrollable">
			<table class="table table-hover" id="langs">
				<thead>
					<tr class="top-table">
						<th><?=Yii::t('app', '№ п/п')?></th>
						<th><?=$modelDeleted->getAttributeLabel('title')?></th>
						<th><?=$modelDeleted->getAttributeLabel('alias')?></th>
						<?/* <th><?=$modelDeleted->getAttributeLabel('attachment__id')?></th> */?>
						<th><?=$modelDeleted->getAttributeLabel('created_at')?></th>
						<th><?=Yii::t('app', 'Действия')?></th>
					</tr>
				</thead>
				<tbody>
					<?php $i = 1; ?>
					<? foreach($deletedLangs as $deletedLang) :?>  
						<tr>
							<td><?=$i++?></td>
							<td><?=CHtml::encode($deletedLang->title)?></td>
							<td><?=CHtml::encode($deletedLang->alias)?></td>
							<?/* <td>
								<? if (($deletedLang->attachment != NULL) && ($deletedLang->attachment->secret_name != null)) :?>
									<?=CHtml::image(MSmarty::attachment_get_file_name($deletedLang->attachment->secret_name, $deletedLang->attachment->raw_name, $deletedLang->attachment->file_ext, '_index', 'langs_flag'), ''); ?>
								<? else : ?>
									<span class="false">&nbsp;</span>
								<? endif; ?>
							</td>*/?>
							<td><?=MSmarty::date_format($lang->created_at, 'd.m.Y')?></td>
							<td>
								<?=CHtml::linkButton('<i class="fa fa-level-up"></i>',array(
									'submit' => array('restorelang', 'id' => $deletedLang->id),
									'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
									'class' => 'btn grey-cascade tooltips',
									'data-container' => 'body',
									'data-placement' => 'top', 
									'data-original-title' => Yii::t('app', 'Восстановить'),
								));  ?>
							</td>
						</tr>
					<? endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
    
<? endif; ?>
