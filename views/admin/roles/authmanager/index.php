<div class="portlet box yellow">
	<div class="portlet-title">
		<h3 class="caption"><i class="fa fa-users" style="margin-right: 10px;"></i> <?=Yii::t('app', 'Управление ролями')?></h3>
	</div>
	<div class="portlet-body form form-horizontal">
		<div class="form-body">
			<div class="table-scrollable">
				<table class="table table-hover" id="roles">
					<thead>
						<tr>
							<th><?=Yii::t('app', 'Название')?></th>
							<th><?=Yii::t('app', 'Описание')?></th>
							<th><?=Yii::t('app', 'Тип')?></th>
							<th><?=Yii::t('app', 'Действия')?></th>
						</tr>
					</thead>
					<tbody>
					<?foreach($list as $key => $item) :?>
					<tr class="tn-container" node="<?=$item['id']?>" parent="<?=$item['parent_id']?>" children_count="<?=$item['children_count']?>" level="<?=$item['tree_level']?>">
							<td class="tn-manager">
								<div class="tnm-children"></div>
								<div class="tnm-content"><?=$item['child']?></div>
							</td>
							<td>
								<?=$item['description']?>
							</td>
							<td>
								<? if ($item['type'] == Authitem::TYPE_ROOT) : ?>Корень
								<? elseif ($item['type'] == Authitem::TYPE_ROLE) : ?>Роль
								<? elseif ($item['type'] == Authitem::TYPE_TASK) : ?>Задача
								<? elseif ($item['type'] == Authitem::TYPE_OPERATION) : ?>Операция
								<? endif; ?>
							</td>
							<td class="action">
								<? if ($item['type'] < Authitem::TYPE_ROOT) : ?>
								
									<?  if ((($item['type'] == Authitem::TYPE_ROLE) && (Yii::app()->user->checkAccess('AdminRolesAuthmanagerEditrole'))) || 
										(($item['type'] == Authitem::TYPE_TASK) && (Yii::app()->user->checkAccess('AdminRolesAuthmanagerEdittask'))) ||
										(($item['type'] == Authitem::TYPE_OPERATION) && (Yii::app()->user->checkAccess('AdminRolesAuthmanagerEditoperation')))) : ?>
											<a class="btn green-seagreen" href="<?=$this->createUrl('authmanager/edititem/name/' . $item['child'])?>">
												<i class="glyphicon glyphicon-pencil"></i>
											</a>
									<? endif; ?>
											
									<? if (($item['allowed_to_delete_relation']) && (Yii::app()->user->checkAccess('AdminRolesAuthmanagerDeleterelation'))) : ?>
										<?=CHtml::form('', 'post', array('style' => 'display: inline-block;'))?>
										<?=CHtml::linkButton('<i class="fa fa-exchange"></i>', array(
											'submit'=>array(
												'authmanager/deleterelation',
												'id' => $item['child'],
												'parent' => empty($item['parent']) ? 'root' : $item['parent']
											),
											'params'=>array(
												Yii::app()->request->csrfTokenName => Yii::app()->request->csrfToken
											),
											'confirm'=>"Удалить зависимость?",
											'class' => 'btn red tooltips',
											'data-container' => 'body',
											'data-placement' => 'top', 
											'data-original-title' => 'Удалить зависимость',
										))?>
										<?=CHtml::endForm() ?>
									<? endif; ?>                        

									<?  if ((($item['type'] == Authitem::TYPE_ROLE) && (Yii::app()->user->checkAccess('AdminRolesAuthmanagerDeleterole'))) || 
										(($item['type'] == Authitem::TYPE_TASK) && (Yii::app()->user->checkAccess('AdminRolesAuthmanagerDeletetask'))) ||
										(($item['type'] == Authitem::TYPE_OPERATION) && (Yii::app()->user->checkAccess('AdminRolesAuthmanagerDeleteoperation')))) : ?>
											
										<?=CHtml::linkButton('<i class="glyphicon glyphicon-remove"></i>', array(
											'submit'=>array(
												'authmanager/deleteitem',
												'id' => $item['child'],
												'action' => ($item['type'] == Authitem::TYPE_ROLE ? "role" : ($item['type'] == Authitem::TYPE_TASK ? "task" : ($item['type'] == Authitem::TYPE_OPERATION ? "operation" : "")))
											),
											'params'=>array(
												Yii::app()->request->csrfTokenName => Yii::app()->request->csrfToken
											),
											'confirm'=>"Удалить " . ($item['type'] == Authitem::TYPE_ROLE ? "роль" : ($item['type'] == Authitem::TYPE_TASK ? "задачу" : ($item['type'] == Authitem::TYPE_OPERATION ? "операцию" : ""))) . "?",
											'class' => 'btn red tooltips',
											'data-container' => 'body',
											'data-placement' => 'top', 
											'data-original-title' => 'Удалить ' . ($item['type'] == Authitem::TYPE_ROLE ? "роль" : ($item['type'] == Authitem::TYPE_TASK ? "задачу" : ($item['type'] == Authitem::TYPE_OPERATION ? "операцию" : ""))),
										))?>
										<?=CHtml::endForm() ?>

								   <? endif; ?>
											
								<? endif; ?>                            
							</td>
						</tr>
					<?endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="form-actions">
			<? if (Yii::app()->user->checkAccess('AdminRolesAuthmanagerAddrole')) : ?>
				<?=CHtml::link(Yii::t('app', 'Добавить роль'), $this->createUrl('authmanager/add/action/role'), array('class' => 'btn green'));?>
			<? endif; ?>

			<? if (Yii::app()->user->checkAccess('AdminRolesAuthmanagerAddtask')) : ?>
				<?=CHtml::link(Yii::t('app', 'Добавить задачу'), $this->createUrl('authmanager/add/action/task'), array('class' => 'btn green'));?>
			<? endif; ?>
				
			<? if (Yii::app()->user->checkAccess('AdminRolesAuthmanagerAddoperation')) : ?>    
				<?=CHtml::link(Yii::t('app', 'Добавить операцию'), $this->createUrl('authmanager/add/action/operation'), array('class' => 'btn green'));?>
			<? endif; ?>
			
			<? if (Yii::app()->user->checkAccess('AdminRolesAuthmanagerAssignment')) : ?>
				<?=CHtml::link(Yii::t('app', 'Назначение ролей пользователям'), $this->createUrl('authmanager/assignment'), array('class' => 'btn yellow'));?>
			<? endif; ?>
		</div>
	</div>
</div>

<? if (!empty($unrelatedlist)) : ?>
<div class="portlet box red-pink mt30">
	<div class="portlet-title">
		<h3 class="caption"><i class="fa fa-users" style="margin-right: 10px;"></i> <?=Yii::t('app', 'Неприсвоенные задачи / операции')?></h3>
	</div>
	<div class="portlet-body form form-horizontal">
		<div class="form-body">
			<div class="table-scrollable">
				<table class="table table-hover" id="roles">
					<thead>
						<tr>
							<th><?=Yii::t('app', 'Название')?></th>
							<th><?=Yii::t('app', 'Описание')?></th>
							<th><?=Yii::t('app', 'Тип')?></th>
							<th><?=Yii::t('app', 'Действия')?></th>
						</tr>
					</thead>
					<tbody>
					<?foreach($unrelatedlist as $key => $item) :?>
						<tr>
							<td>
								<div><?=$item['name']?></div>
							</td>
							<td>
								<?=$item['description']?>
							</td>
							<td>
								<? if ($item['type'] == Authitem::TYPE_ROOT) : ?>Корень
								<? elseif ($item['type'] == Authitem::TYPE_ROLE) : ?>Роль
								<? elseif ($item['type'] == Authitem::TYPE_TASK) : ?>Задача
								<? elseif ($item['type'] == Authitem::TYPE_OPERATION) : ?>Операция
								<? endif; ?>
							</td>
							<td>
							</td>
							<td class="action">
								<? if ($item['type'] < Authitem::TYPE_ROOT) : ?>
								
									<?  if ((($item['type'] == Authitem::TYPE_ROLE) && (Yii::app()->user->checkAccess('AdminRolesAuthmanagerDeleterole'))) || 
										(($item['type'] == Authitem::TYPE_TASK) && (Yii::app()->user->checkAccess('AdminRolesAuthmanagerDeletetask'))) ||
										(($item['type'] == Authitem::TYPE_OPERATION) && (Yii::app()->user->checkAccess('AdminRolesAuthmanagerDeleteoperation')))) : ?>                        
								
										<?=CHtml::linkButton('Удалить ' . ($item['type'] == Authitem::TYPE_ROLE ? "роль" : ($item['type'] == Authitem::TYPE_TASK ? "задачу" : ($item['type'] == Authitem::TYPE_OPERATION ? "операцию" : ""))), array(
											'submit'=>array(
												'authmanager/deleteitem',
												'id' => $item['name'],
												'action' => ($item['type'] == Authitem::TYPE_ROLE ? "role" : ($item['type'] == Authitem::TYPE_TASK ? "task" : ($item['type'] == Authitem::TYPE_OPERATION ? "operation" : "")))
											),
											'params'=>array(
												Yii::app()->request->csrfTokenName => Yii::app()->request->csrfToken
											),
											'confirm'=>"Удалить " . ($item['type'] == Authitem::TYPE_ROLE ? "роль" : ($item['type'] == Authitem::TYPE_TASK ? "задачу" : ($item['type'] == Authitem::TYPE_OPERATION ? "операцию" : ""))) . "?"
										))?>
										<?=CHtml::endForm() ?>
								
									<? endif; ?>                        
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