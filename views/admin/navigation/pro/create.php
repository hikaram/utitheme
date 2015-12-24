<?=CHtml::hiddenField('ajaxurl', $this->createUrl('/admin/navigation/ajaxpro/save'), array('id' => 'ajaxurl'))?>
<?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'navigation-form',
        'enableAjaxValidation'=>false,
        'htmlOptions'=>array('enctype'=>'multipart/form-data')
));
        $listNavigation = array();
        foreach ($modelsNavigations as $key => $modelParent)  
        {
            $listNavigation[$modelParent->id] = str_repeat('&#183;&nbsp;&#183;&nbsp;', $modelParent->tree_level - 1)  . $modelParent->label;
        }
        
        $selected = array ('selected' => 'selected');
        if (!empty ($options) && is_array($options[$parent_id]))
        {
            $options[$parent_id] = array_merge($options[$parent_id], $selected);
        }
        
        $options_alias = array();
		
        if ($modelNavigation->isNewRecord && $modelNavigation->object_alias == '')
        {
            $options_alias = array('catalog' => array('selected' => 'selected'));
        }

?>

<?=$form->hiddenField($modelNavigationLang, 'navigation__id')?>
<?=$form->hiddenField($modelNavigationLang, 'lang')?>

<style>
    .max { width: 100%; }
    <?php for($i = 0; $i < 10; $i++) : ?>
    .tree-level-<?=$i+1?> { padding-left : <?=$i * 20?>px }
    <?php endfor; ?>
</style>
<p class="note note-danger">
	<i class="fa fa-warning" style="margin-right: 10px;"></i> <?=Yii::t('app', 'Поля отмеченные * обязательно должны быть заполнены.')?>
</p>

<div class="portlet green box">
	<div class="portlet-title">
		<div class="caption">
			<? if ((boolean)$modelNavigation->isNewRecord == TRUE) : ?>
				<i class="glyphicon glyphicon-plus"></i> <?=Yii::t('app', 'Создание нового пункта меню')?>
			<? else : ?>
				<i class="glyphicon glyphicon-pencil"></i> <?=Yii::t('app', 'Редактирование')?>
			<? endif;?>
		</div>
	</div>
	<div class="portlet-body form form-horizontal">
		<div class="form-body">
			<div class="form-group">
				<?=$form->labelEx($modelNavigationLang, 'title', array('class' => 'col-md-3 control-label'))?>
				<div class="col-md-9">
					<?=$form->textField($modelNavigationLang, 'title', array('class' => 'form-control input-inline input-large'))?>
					<span class="help-inline"><?=Yii::t('app', 'Выводится на сайте')?></span>
					<div class="help-block text-danger" style="color: #a94442;"><?=$form->error($modelNavigationLang, 'title')?></div>
				</div>
			</div>
			<? if ((Yii::app()->user->username == Yii::app()->params['superAdminInfo']['username']) || ((bool)$settings->allowed_admin_fill_alias)) : ?>
			<div class="form-group">
				<?=$form->labelEx($modelNavigation, 'alias', array('class' => 'col-md-3 control-label'))?>
				<div class="col-md-9">
					<?=$form->textField($modelNavigation, 'alias', array('class' => 'form-control input-inline input-large'))?>
					<span class="help-inline"><?=Yii::t('app', 'Для использования в других модулях')?></span>
					<div class="help-block text-danger" style="color: #a94442;"><?=$form->error($modelNavigation, 'alias')?></div>
				</div>
			</div>
			<? endif; ?>
			<div class="form-group">
				<?=$form->labelEx($modelNavigation, 'parent_id', array('class' => 'col-md-3 control-label'))?>
				<div class="col-md-9">
					<?php echo $form->ListBox($modelNavigation, 'parent_id', $listNavigation, array('class' => 'form-control input-inline input-large', 'size' => 0, 'encode' => false)); ?>
					<span class="help-inline"><?=Yii::t('app', 'Блок в который будет помещен пункт')?></span>
					<div class="help-block text-danger" style="color: #a94442;"><?=$form->error($modelNavigation, 'parent_id')?></div>
				</div>
			</div>
			<div class="form-group">
				<?=$form->labelEx($modelNavigation, 'sort_no', array('class' => 'col-md-3 control-label'))?>
				<div class="col-md-9">
					<?php echo $form->ListBox($modelNavigation,'sort_no', CHtml::listData($modelsChildrens, 'sort_no', 'label'), array('class' => 'form-control input-inline input-large', 'size' => 0)); ?>
					<span class="help-inline"><?=Yii::t('app', 'За каким пунктом будет размещен')?></span>
					<div class="help-block text-danger" style="color: #a94442;"><?=$form->error($modelNavigation, 'sort_no')?></div>
				</div>
			</div>
			<div class="form-group">
				<?=$form->labelEx($modelNavigation, 'object_alias', array('class' => 'col-md-3 control-label'))?>
				<div class="col-md-9">
					<?php echo $form->listBox($modelNavigation, 'object_alias', CHtml::listData($modelsTypes, 'alias', 'label'), array('class' => 'form-control input-inline input-large', 'size' => 0, 'options' => $options_alias)); ?>
					<span class="help-inline"><?=Yii::t('app', 'Тип добавляемого пункта')?></span>
					<div class="help-block text-danger" style="color: #a94442;"><?=$form->error($modelNavigation, 'object_alias')?></div>
				</div>
			</div>
			<div class="form-group" style="display: none">
				<label class="col-md-3 control-label"><?=Yii::t('app', 'Страница')?></label>
				<div class="col-md-9">
					<?php if (count($modelsPagesLang) > 0) : ?>
						<?php echo $form->listBox($modelNavigation, 'object_id', CHtml::listData($modelsPagesLang, 'page__id', 'title'), array('class' => 'form-control input-inline input-large', 'size' => 0, 'options' => $options_alias)); ?>
						<?=CHtml::link(Yii::t('app', 'Создать новую'), 'javascript:return void(0)', array('onClick' => 'sendForm()'))?>
					<?php else : ?>
						<div id="Navigation_object_id"><?=Yii::t('app', 'Созданных странице еще нет, Вы можете создать')?> <?=CHtml::link(Yii::t('app', 'новую'), 'javascript:return void(0)', array('onClick' => 'sendForm()'))?> .</div>
					<?php endif ; ?>
				</div>
			</div>
			<div class="form-group" style="display: none">
				<?=$form->labelEx($modelNavigation, 'url', array('class' => 'col-md-3 control-label'))?>
				<div class="col-md-9">
					<div id="Navigation_url_prefix" style="display: inline-block; position: absolute; left: 33px; top: 7px; font-size: 14px; color: #333333;"></div><?php echo $form->textField($modelNavigation, 'url', array('class' => 'form-control input-inline input-large')); ?>
					<div class="help-block text-danger" style="color: #a94442;"><?=$form->error($modelNavigation, 'url')?></div>
                    <div class="help-block urlExample" style="font-style: italic; font-size: 12px; display: none;" id="urlExampleExternal"><?=Yii::t('app', 'Например: http://ok.ru/')?></div>
                    <div class="help-block urlExample" style="font-style: italic; font-size: 12px; display: none;" id="urlExampleInternal">
                        <?=Yii::t('app', 'Например')?>: <? if ((bool)Yii::app()->request->isSecureConnection) : ?>https:://<? else : ?>http:://<? endif; ?><?=$_SERVER['HTTP_HOST']?>/testpage
                    </div>
				</div>
			</div>
			<div class="form-group" style="display: none">
				<?=$form->labelEx($modelNavigation, 'target', array('class' => 'col-md-3 control-label'))?>
				<div class="col-md-9">
					<?php echo $form->listBox($modelNavigation, 'target', CHtml::listData($modelsTargets, 'alias', 'label'), array('class' => 'form-control input-inline input-large', 'size' => 0)); ?></td>
					<div class="help-block text-danger" style="color: #a94442;"><?=$form->error($modelNavigation, 'target')?></div>
				</div>
			</div>				
			<div class="form-group">
				<?=$form->labelEx($modelNavigation, 'is_visible', array('class' => 'col-md-3 control-label'))?>
				<div class="col-md-9">
					<?php echo $form->checkBox($modelNavigation, 'is_visible'); ?>	
					<span class="help-inline"><?=Yii::t('app', 'Отображать пункт навигации в меню сайта')?></span>
					<div class="help-block text-danger" style="color: #a94442;"><?=$form->error($modelNavigation, 'is_visible')?></div>
				</div>
			</div>
            <div class="form-group">
                <div class="col-md-3 control-label">&nbsp;</div>
				<div class="col-md-9">
                    <span class="help-inline" style="margin-left: 10px;"><?=Yii::t('app', 'Установленное значение "Будет видеть" перекрывает не установленное значение "Показывать в меню". Установленное значение "Будет спрятан" перекрывает установленное значение "Показывать в меню".')?></span>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label"><?=Yii::t('app', 'Отображение для ролей')?></label>
				<div class="col-md-9">
					<table class="table table-hover" style="width: 600px;">
						<thead>
							<tr>
								<th style="width: 300px; text-align: center;"><?=Yii::t('app', 'Роль')?></th>
								<th class="view_allowed" style="width: 150px; text-align: center;"><?=Yii::t('app', 'Будет виден')?></th>
								<th class="view_denied" style="width: 150px; text-align: center;"><?=Yii::t('app', 'Будет спрятан')?></th>
								<? if (Yii::app()->user->checkAccess('superadmin')) : ?>
									<th style="width: 150px; text-align: center;"><?=Yii::t('app', 'Будет редактировать')?></th>
								<? endif; ?>
							</tr>
						</thead>
						<tbody>
						<? foreach($modelsNavigationRoles as $key => $modelNavigationRoles) : ?>
							<tr>
								<td>
									<?=$modelNavigationRoles->description?>
									<?=$form->hiddenField($modelNavigationRoles, 'navigation__id', array('name' => get_class($modelNavigationRoles) . "[$key]" . '[navigation__id]')); ?>
									<?=$form->hiddenField($modelNavigationRoles, 'authitem__name', array('name' => get_class($modelNavigationRoles) . "[$key]" . '[authitem__name]')); ?>
								</td>
								<td class="view_allowed" align="center">
									<?=$form->checkBox($modelNavigationRoles, 'is_view_allowed', array('name' => get_class($modelNavigationRoles) . "[$key]" . '[is_view_allowed]')); ?>
								</td>
								<td class="view_denied" align="center">
									<?=$form->checkBox($modelNavigationRoles, 'is_view_denied', array('name' => get_class($modelNavigationRoles) . "[$key]" . '[is_view_denied]')); ?>
								</td>
								<? if (Yii::app()->user->checkAccess('superadmin')) : ?>
									<td align="center">
										<?=$form->checkBox($modelNavigationRoles, 'is_edit', array('name' => get_class($modelNavigationRoles) . "[$key]" . '[is_edit]')); ?>
									</td>
								<? endif; ?>
							</tr>
						<? endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="form-actions">
			<?=CHtml::submitButton($modelNavigation->isNewRecord ? Yii::t('app', 'Создать') : Yii::t('app', 'Сохранить'), array('class' => 'btn green')); ?>
		</div>
	</div>
</div>

<?php $this->endWidget(); ?>
<?=$form->hiddenField($modelNavigation, 'children_count')?>
<?=$form->hiddenField($modelNavigation, 'id')?>