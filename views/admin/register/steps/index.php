<? if ((boolean)$model_new->isNewRecord == FALSE) : ?>
	<script>
		$(document).ready(function(){
			$('#newstep').modal('show')
			
			$('#newstep').on('hidden.bs.modal', function (e) {
				location.href = '<?=$this->createUrl('index') ?>'
			})
		})
	</script>
<? endif;?>
<?php $form=$this->beginWidget('CActiveForm', array('id'=>'users-form','enableAjaxValidation'=>false,)); ?>
		
	<? if(count($model_list) == 0) : ?>
		<p class="note note-success">
			<?=Yii::t('app', 'Шаги еще не созданы. Вы можете ')?><a href="#newstep" id="newstepopen" data-toggle="modal"><?=Yii::t('app', 'создать новый шаг')?></a>.
		</p>
		<?=CHtml::link(Yii::t('app', 'Вернуться к списку полей'), $this->createUrl('admin/index'), array())?>
	<? else : ?>
		<div class="portlet box yellow">
			<div class="portlet-title">
				<h3 class="caption"><i class="icon icon-user-follow mr10"></i> <?=Yii::t('app', 'Управление регистрационными полями')?></h3>
			</div>
			<div class="portlet-body form form-horizontal">
				<div class="form-body">
					<div class="table-scrollable">
						<table class="table table-hover">
							<thead>
								<tr>
									<th><?=$form->label($model_new,'step_num', array('class' => 'text-semibold no-margin'))?></th>
									<th><?=$form->label($model_new,'step_alias', array('class' => 'text-semibold no-margin'))?></th>
									<th><?=$form->label($model_new,'step_name', array('class' => 'text-semibold no-margin'))?></th>
									<th><?=$form->label($model_new,'step_description', array('class' => 'text-semibold no-margin'))?></th>
									<th><?=$form->label($model_new,'step_action', array('class' => 'text-semibold no-margin'))?></th>
									<th><?=Yii::t('app', 'Действия')?></th>
								</tr>
							</thead>
							<tbody>
							<? foreach($model_list as $item => $step) :?>
								<tr>
									<td><?=CHtml::encode($step->step_num)?></td>
									<td><?=CHtml::encode($step->step_alias)?></td>
									<td><?=CHtml::encode($step->step_name)?></td>
									<td><?=CHtml::encode($step->step_description)?></td>
									<td><?=CHtml::encode($step->step_action)?></td>
									<td>
										<?=CHtml::link('<i class="glyphicon glyphicon-pencil"></i>', $this->createUrl('index', array('id' => $step->id)), array('class' => 'btn green-seagreen'))?>
										<?=CHtml::linkButton('<i class="glyphicon glyphicon-remove"></i>', array(
											'submit' => array($this->createUrl('/admin/register/steps/delete/'), 'id' => $step->id),
											'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
											'confirm' => Yii::t('app', 'Удалить шаг?'),
											'class' => 'btn red'
										)); ?>
									</td>
								</tr>
							<? endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
				<div class="form-actions">
					<a href="#newstep" data-toggle="modal" class="btn green"><?=Yii::t('app', 'Добавить шаг')?></a>
					<?=CHtml::link(Yii::t('app', 'Вернуться к списку полей'), $this->createUrl('admin/index'), array('class' => 'btn grey'))?>
				</div>
			</div>
		</div>
	<? endif; ?>
	
	<div id="newstep" class="modal fade" tabindex="-1" role="basic" aria-hidden="true" style="display: none;">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
					<h4 class="modal-title"><?=Yii::t('app', 'Добавить новый шаг')?></h4>
				</div>
				<div class="modal-body form form-horizontal">
					<? if($form->errorSummary($model_new) && $form->errorSummary($model_new) != "") : ?>
						<?=$form->errorSummary($model_new, '<div class="mb5">' . Yii::t('app', 'При добавлении были допущены следующие ошибки:') . '</div>', '', array('class' => 'note note-danger')); ?>
						<script>
							$(document).ready(function(){
								$('#newstep').modal('show')
							})
						</script>
					<? endif; ?>
					<div class="form-body">
						<div class="form-group mt15">
							<?=$form->labelEx($model_new,'step_alias', array('class' => 'col-md-5 control-label'))?>
							<div class="col-md-7">
								<?=$form->textField($model_new,'step_alias', array('class' => 'form-control'))?>
							</div>
						</div>
						<div class="form-group">
							<?=$form->labelEx($model_new,'step_name', array('class' => 'col-md-5 control-label'))?>
							<div class="col-md-7">
								<?=$form->textField($model_new,'step_name', array('class' => 'form-control'))?>
							</div>
						</div>
						<div class="form-group">
							<?=$form->labelEx($model_new,'step_description', array('class' => 'col-md-5 control-label'))?>
							<div class="col-md-7">
								<?=$form->textField($model_new,'step_description', array('class' => 'form-control'))?>
							</div>
						</div>
						<div class="form-group">
							<?=$form->labelEx($model_new,'step_action', array('class' => 'col-md-5 control-label'))?>
							<div class="col-md-7">
								<?=$form->textField($model_new,'step_action', array('class' => 'form-control'))?>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<?=CHtml::submitButton($model_new->isNewRecord ? Yii::t('app', 'Добавить') : Yii::t('app', 'Сохранить'), array('name' => 'btn_save', 'class' => 'btn green')); ?>
					<?=CHtml::link(Yii::t('app', 'Отмена'), 'javascript: void(0)', array('data-dismiss' => 'modal', 'class' => 'btn red'))?>
				</div>
			</div>
		</div>
	</div>
<?php $this->endWidget(); ?>
<script>
	
</script>