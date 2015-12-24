<?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'roles-form',
        'enableAjaxValidation'=>false,
));
        $options = array();
        
        foreach ($list as $key => $modelParent)  
        {
            $options[$modelParent['id']] = array('class' => 'tree-level-' . $modelParent['tree_level']);
        }
        $selected = array ('selected' => 'selected');
        
        if (Yii::app()->user->checkAccess('AdminRolesAuthmanagerAddrole'))
        {
            $types[Authitem::TYPE_ROLE] = 'Роль';
        }
        
        if (Yii::app()->user->checkAccess('AdminRolesAuthmanagerAddtask'))
        {
            $types[Authitem::TYPE_TASK] = 'Задача';
        }

        if (Yii::app()->user->checkAccess('AdminRolesAuthmanagerAddoperation'))
        {
            $types[Authitem::TYPE_OPERATION] = 'Операция';
        }        
?>

<?php echo $form->errorSummary(array($authitem, $authitemchild)); ?>

<div class="portlet green box">
	<div class="portlet-title">
		<div class="caption">
			<? if ((boolean)$authitem->isNewRecord == TRUE) : ?>
				<i class="glyphicon glyphicon-plus"></i> <?=Yii::t('app', 'Добавление')?>
			<? else : ?>
				<i class="glyphicon glyphicon-pencil"></i> <?=Yii::t('app', 'Редактирование')?>
			<? endif;?>
			<? if($authitem->attributes['type'] == 0) : ?> 
				<?=Yii::t('app', 'операции')?>
			<? elseif($authitem->attributes['type'] == 1) : ?>
				<?=Yii::t('app', 'задачи')?>
			<? elseif($authitem->attributes['type'] == 2) : ?>
				<?=Yii::t('app', 'роли')?>
			<? endif; ?>
		</div>
	</div>
	<div class="portlet-body form form-horizontal">
		<div class="form-body">
			<div class="form-group mt20">
				<?=$form->labelEx($authitem, 'name', array('class' => 'col-md-3 control-label'))?>
				<div class="col-md-9">
					<?=$form->textField($authitem, 'name', array('class' => 'form-control input-large'))?>
					<? if($form->error($authitem, 'name') != "") : ?>
						<div class="help-block font-red">
							<?=$form->error($authitem, 'name')?>
						</div>
					<? endif; ?>
				</div>
			</div>
			<div class="form-group">
				<?=$form->labelEx($authitem, 'type', array('class' => 'col-md-3 control-label'))?>
				<div class="col-md-9">
					<?=$form->ListBox($authitem,'type', $types, array('class' => 'form-control input-large', 'size' => 0, 'id' => 'itemselect')); ?>
					<? if($form->error($authitem, 'type') != "") : ?>
						<div class="help-block font-red">
							<?=$form->error($authitem, 'type')?>
						</div>
					<? endif; ?>
				</div>
			</div>
			<div class="form-group" id="tr_default" style="display: none;">
				<div class="col-md-3"></div>
				<div class="col-md-9">
					<?=CHtml::checkBox('default_role')?>
				</div>
			</div>
			<div class="form-group">
				<?=$form->labelEx($authitem, 'description', array('class' => 'col-md-3 control-label'))?>
				<div class="col-md-9">
					<?=$form->textField($authitem, 'description', array('class' => 'form-control input-large'))?>
					<? if($form->error($authitem, 'description') != "") : ?>
						<div class="help-block font-red">
							<?=$form->error($authitem, 'description')?>
						</div>
					<? endif; ?>
				</div>
			</div>
			<div class="form-group">
				<?=$form->labelEx($authitem, 'parent', array('class' => 'col-md-3 control-label'))?>
				<div class="col-md-9">
					<?=$form->ListBox($authitemchild,'parent', CHtml::listData($list, 'id', 'child'), array('class' => 'form-control input-large', 'size' => 0, 'options' => $options, 'id' => 'select_parent', 'onChange' => 'attr()')); ?>
					<?=$form->hiddenField($authitemchild, 'parent', array('id' => 'auth_parent'))?>
					<? if($form->error($authitem, 'parent') != "") : ?>
						<div class="help-block font-red">
							<?=$form->error($authitem, 'parent')?>
						</div>
					<? endif; ?>
				</div>
			</div>
		</div>
		<div class="form-actions">
			<?=CHtml::submitButton($authitem->isNewRecord ? 'Создать' : 'Сохранить', array('class' => 'btn green')); ?>
			<?=CHtml::link('Отмена', $this->createUrl('index'), array ('class' => 'btn grey'));?>
		</div>
	</div>
</div>

<?php $this->endWidget(); ?>
