<div class="note note-info">
	<?=Yii::t('app', 'Роль по умолчанию (данная роль будет присвоена пользователям, зарегистрировавшимся на сайте)')?>
</div>
<div class="portlet box yellow">
	<div class="portlet-title">
		<h3 class="caption"><i class="icon icon-users mr10"></i> <?=Yii::t('app', 'Роли по умолчанию')?></h3>
	</div>
	<div class="portlet-body form form-horizontal">
		<div class="form-body">
			<div class="table-scrollable">
				<table class="table table-hover">
					<thead>
						<tr>
							<th><?=Yii::t('app', 'Псевдоним')?></th>
							<th><?=Yii::t('app', 'Имя')?></th>
							<th><?=Yii::t('app', 'Действия')?></th>
						</tr>
					</thead>
					<? foreach ($list as $key => $role) : ?>
						<tr>
							<td><?=$role->role?></td>
							<td><?=$role->item->description?></td>
							<td>
								<? if (Yii::app()->user->checkAccess('AdminRolesAuthmanagerEditrole')) : ?>
									<a href="<?=$this->createUrl('/admin/roles/authmanager/edititem/name/' . $role->role)?>" class="btn green-seagreen">
										<i class="glyphicon glyphicon-pencil"></i>
									</a>
								<? endif; ?>
								<? if ((count($list) > 1) && (Yii::app()->user->checkAccess('AdminRegisterAdminDeletedefaultrole'))) : ?>
									<?=CHtml::linkButton('<i class="glyphicon glyphicon-remove"></i>',array(
									   'submit' => array('admin/deletedefaultrole', 'id' => $role->id),
									   'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
									   'confirm' => Yii::t('app', 'Убрать эту роль из списка ролей по умолчанию ?'),
									   'class' => 'btn red'));  ?> 
								<? endif; ?>
							</td>
						</tr>
					<? endforeach; ?>
				</table>
			</div>
		</div>
		<? if (!empty($modelsAuthitem)) : ?>
		<div class="form-actions">
			<?=CHtml::link('Добавить роль', '#addRole', array('data-toggle' => 'modal', 'id' => 'addFieldBlockLink', 'class' => 'btn green'))?>
		</div>
		<? endif; ?>
	</div>
</div>
<a href="<?=$this->createUrl('index')?>"><?=Yii::t('app', 'Вернуться к списку полей')?></a>

<? if (!empty($modelsAuthitem)) : ?>
<div id="addRole" class="modal fade" tabindex="-1" role="basic" aria-hidden="true" style="display: none;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
				<h4 class="modal-title"><?=Yii::t('app', 'Добавить новую роль')?></h4>
			</div>
			<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'add_role-form',
				'enableAjaxValidation'=>false,
			));
			?>
			<div class="modal-body">
				<?=$form->listBox($new_role, 'item', $modelsAuthitem, array('class' => 'form-control', 'size' => 0))?>
			</div>
			<div class="modal-footer">
				<?=CHtml::submitButton(Yii::t('app', 'Добавить'), array('class' => 'btn green','name' => 'btn_save')); ?>
				<?=CHtml::link(Yii::t('app', 'Отмена'), 'javascript: void(0)', array('data-dismiss' => 'modal', 'class' => 'btn red'))?>
			</div>
			<?php $this->endWidget(); ?>
		</div>
	</div>
</div>
<? endif; ?>