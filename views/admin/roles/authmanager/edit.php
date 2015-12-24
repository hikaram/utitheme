<?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'roles-form',
        'enableAjaxValidation'=>false,
));
        $options = array();
        
        foreach ($list as $key => $modelParent)  
        {
            $options[$modelParent['id']] = array('class' => 'tree-level-' . $modelParent['tree_level']);
        }
?>

<div class="portlet green box">
	<div class="portlet-title">
		<div class="caption">
			<? if ((boolean)$authitem->isNewRecord == TRUE) : ?>
				<i class="glyphicon glyphicon-plus"></i> <?=Yii::t('app', 'Добавление')?>
			<? else : ?>
				<i class="glyphicon glyphicon-pencil"></i> <?=Yii::t('app', 'Редактирование')?>
			<? endif;?>
			<?=($authitem->type == Authitem::TYPE_ROLE ? "роли" : ($authitem->type == Authitem::TYPE_TASK ? "задачм" : ($authitem->type == Authitem::TYPE_OPERATION ? "операции" : "")))?>
		</div>
	</div>
	<div class="portlet-body form form-horizontal">
		<div class="form-body">
			<div class="form-group mt20">
				<?=$form->labelEx($authitem, 'name', array('class' => 'control-label col-md-3 no-margin no-padding-top')); ?>
				<div class="col-md-9">
					<?=$authitem->name?>
				</div>
			</div>
			<div class="form-group">
				<?=$form->labelEx($authitem, 'type', array('class' => 'control-label col-md-3 no-margin no-padding-top'))?>
				<div class="col-md-9">
					<?=($authitem->type == Authitem::TYPE_ROLE ? "Роль" : ($authitem->type == Authitem::TYPE_TASK ? "Задача" : ($authitem->type == Authitem::TYPE_OPERATION ? "Операция" : "")))?>
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
				<label class="col-md-3 control-label"><?=Yii::t('app', 'Права')?></label>
				<div class="col-md-9">
					<? foreach ($list as $key => $value) : ?>
						<? if ($value['current']) : ?>
							<div class="mb5 text-muted" style="padding-left: <?=$value['tree_level'] * 20 - 20?>px;">
								<input type="checkbox" disabled checked />
								<?=$value['description']?>
							</div>
						<? else : ?>
							<div class="mb5" style="padding-left: <?=$value['tree_level'] * 20 - 20?>px;"><?=CHtml::checkBox('itemlist[' . $value['child'] .']', $value['checked'], array('id' => $value['child'], 'class' => $value['class'], 'onClick' => 'setboxes("' . $value['child'] .'")'))?><?=$value['description']?>
							<?=CHtml::hiddenField('parent_itemlist[' . $value['child'] .']', '', array('id' => 'auth_parent_' . $value['child']))?></div>
						<? endif; ?>
					<? endforeach; ?>
				</div>
			</div>
			<? if (!empty($unrelatedlist)) : ?>
				<div class="form-group">
					<label class="col-md-3 control-label"></label>
					<div class="col-md-9">
						<? foreach ($unrelatedlist as $key => $value) : ?>
							<div class="mb5">
								<?=CHtml::checkBox('itemlist[' . $value['name'] .']', false, array('id' => $value['name'], 'onClick' => 'setboxes("' . $value['name'] .'")'))?><?=$value['description']?>
								<?=CHtml::hiddenField('parent_itemlist[' . $value['name'] .']', '', array('id' => 'auth_parent_' . $value['name']))?></td>
							</div>
						<? endforeach; ?>  
					</div>
				</div>
			<? endif; ?>
		</div>
		<div class="form-actions">
			<?=CHtml::submitButton($authitem->isNewRecord ? 'Создать' : 'Сохранить', array('class' => 'btn green')); ?>
			<? if (isset($backurl)) : ?>
				<?=CHtml::link('Отмена', $backurl, array('class' => 'btn grey'));?>
			<? endif; ?>
		</div>
	</div>
</div>

<?php $this->endWidget(); ?>