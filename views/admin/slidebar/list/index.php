<? if(empty($slides)) :?>
	<div class="note note-success">
		<?=Yii::t('app', 'Не найдено ни одного слайд-бара')?>
		<? if (Yii::app()->user->checkAccess('AdminSlidebarListCreate')) : ?>
			Вы можете 
			<?=CHtml::link(Yii::t('app', 'добавить слайд-бар'), $this->createUrl('create'))?>
		<? endif; ?>
	</div>
<? else : ?>
<div class="portlet box yellow">
	<div class="portlet-title">
		<h3 class="caption"><i class="fa fa-usd" style="margin-right: 10px;"></i> Список валют</h3>
	</div>
	<div class="portlet-body">
		<div class="table-scrollable">
			<table class="table table-hover">
				<thead>
					<tr class="top-table" >
						<th><?=Yii::t('app', 'Номер')?></th>
						<th><?=CHtml::encode(SlidebarsLang::model()->getAttributeLabel('name')); ?></th>
						<th><?=CHtml::encode(Slidebars::model()->getAttributeLabel('is_active')); ?></th>
						<th><?=Yii::t('app', 'Количество фреймов') ?></th>
						<th><?=Yii::t('app', 'Количество активных фреймов') ?></th>
						<th><?=CHtml::encode(Slidebars::model()->getAttributeLabel('created_at')); ?></th>
						<th><?=Yii::t('app', 'Действия')?></th>
					</tr>
				</thead>
				<tbody>
					<?php $i = ((array_key_exists('page', $_GET) ? $_GET['page'] : (int)TRUE) - 1) * SLIDEBARS_PER_PAGE + 1; ?>
					<? foreach($slides as $key => $slide) :?>  
						<tr>
							<td><?=$i++?></td>
							<td><?=CHtml::encode($slide->lang->name)?></td>
							<td>
								<? if ((bool)$slide->is_active) : ?>
									<span class="true">&nbsp;</span>
								<? else : ?>
									<span class="false">&nbsp;</span>
								<? endif; ?>
							</td>
							<td><?=count($slide->frames)?></td>
							<td><?=count($slide->active_frames)?></td>
							<td><?=MSmarty::date_format($slide->created_at, 'd.m.Y')?></td>
							<td>
								<? if (Yii::app()->user->checkAccess('AdminSlidebarListIndex')) : ?>
									<?=CHtml::link(Yii::t('app', 'Параметры карусели'), $this->createUrl('params', array('id' => sha1($slide->id))))?><br />
								<? endif; ?>
								<? if (Yii::app()->user->checkAccess('AdminSlidebarListEdit')) : ?>
									<?=CHtml::link(Yii::t('app', 'Настройки'), $this->createUrl('create', array('action' => 'edit', 'id' => sha1($slide->id))))?><br />
								<? endif; ?>
								<? if ((Yii::app()->user->checkAccess('AdminSlidebarListPreview')) && (count($slide->active_frames) > 0)) : ?>
									<?=CHtml::link(Yii::t('app', 'Предпросмотр'), $this->createUrl('preview', array('id' => sha1($slide->id))))?><br />
								<? endif; ?>
								<? if ((Yii::app()->user->checkAccess('AdminSlidebarListEdit')) && (!(bool)$slide->is_active)) : ?>
									<?=CHtml::linkButton(Yii::t('app', 'Сделать слайдер-баром по умолчанию'),array(
										'submit' => array('setdefault', 'id' => sha1($slide->id)),
										'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken)));  ?><br />
								<? endif; ?>
								<? if (Yii::app()->user->checkAccess('AdminSlidebarListDelete')) : ?>
									<?=CHtml::linkButton(Yii::t('app', 'Удалить'),array(
										'submit' => array('delete', 'id' => sha1($slide->id)),
										'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
										'confirm' => Yii::t('app', 'Удалить слайд-бар?')));  ?>
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
<? if (Yii::app()->user->checkAccess('AdminSlidebarListCreate')) : ?>
    <?=CHtml::link(Yii::t('app', 'Добавить слайд-бар'), $this->createUrl('create'));?>
<? endif; ?>

<? endif; ?>