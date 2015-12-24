<?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'navigation-form',
        'enableAjaxValidation'=>false,
));
        $listNavigation = array();
        foreach ($modelsNavigations as $key => $modelParent)
        {
            $listNavigation[$modelParent->id] = str_repeat('-', $modelParent->tree_level - 1)  . $modelParent->label;
        }

        $selected = array ('selected' => 'selected');
        if (!empty ($options) && is_array($options[$parent_id]))
        {
            $options[$parent_id] = array_merge($options[$parent_id], $selected);
        }
        
		$options_alias = array();
        if ($modelNavigation->isNewRecord)
        {
            $options_alias = array('catalog' => array('selected' => 'selected'));
        }
?>

<?php echo $form->errorSummary($modelNavigation); ?>
<?php echo $form->errorSummary($modelNavigationLang); ?>

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
				<i class="glyphicon glyphicon-plus"></i> <?=Yii::t('app', 'Создание нового')?>
			<? else : ?>
				<i class="glyphicon glyphicon-pencil"></i> <?=Yii::t('app', 'Редактирование')?>
			<? endif;?> <?=Yii::t('app', 'пункта меню')?>
		</div>
	</div>
	<div class="portlet-body form form-horizontal">
		<div class="form-body">
			<div class="form-group">
				<?=$form->labelEx($modelNavigation, 'label', array('class' => 'col-md-3 control-label'))?>
				<div class="col-md-9">
					<?=$form->textField($modelNavigation, 'label', array('class' => 'form-control input-inline input-large'))?>
					<span class="help-inline"><?=Yii::t('app', 'Выводится только на форме создания.')?></span>
					<span class="help-block"><?=$form->error($modelNavigationLang, 'label')?></span>
				</div>
			</div>
			<div class="form-group">
				<?=$form->labelEx($modelNavigationLang, 'title', array('class' => 'col-md-3 control-label'))?>
				<div class="col-md-9">
					<?=$form->textField($modelNavigationLang, 'title', array('class' => 'form-control input-inline input-large'))?>
					<span class="help-inline"><?=Yii::t('app', 'Выводится на сайте.')?></span>
					<span class="help-block"><?=$form->error($modelNavigationLang, 'title')?></span>
				</div>
			</div>
			<div class="form-group">
				<?=$form->labelEx($modelNavigation, 'alias', array('class' => 'col-md-3 control-label'))?>
				<div class="col-md-9">
					<?=$form->textField($modelNavigation, 'alias', array('class' => 'form-control input-inline input-large'))?>
					<span class="help-inline"><?=Yii::t('app', 'Для использования в других модулях. Не обязательно.')?></span>
					<span class="help-block"><?=$form->error($modelNavigation, 'alias')?></span>
				</div>
			</div>
			<div class="form-group">
				<?=$form->labelEx($modelNavigation, 'parent_id', array('class' => 'col-md-3 control-label'))?>
				<div class="col-md-9">
					<?=$form->ListBox($modelNavigation, 'parent_id', $listNavigation, array('class' => 'form-control input-inline input-large'))?>
					<span class="help-inline"><?=Yii::t('app', 'Блок в который будет помещен пункт.')?></span>
					<span class="help-block"><?=$form->error($modelNavigation, 'parent_id')?></span>
				</div>
			</div>
			<div class="form-group">
				<?=$form->labelEx($modelNavigation, 'sort_no', array('class' => 'col-md-3 control-label'))?>
				<div class="col-md-9">
					<?=$form->ListBox($modelNavigation, 'sort_no', CHtml::listData($modelsChildrens, 'sort_no', 'label'), array('class' => 'form-control input-inline input-large'))?>
					<span class="help-inline"><?=Yii::t('app', 'За каким пунктом будет размещен.')?></span>
					<span class="help-block"><?=$form->error($modelNavigation, 'sort_no')?></span>
				</div>
			</div>
			<div class="form-group">
				<?=$form->labelEx($modelNavigation, 'is_visible', array('class' => 'col-md-3 control-label', 'style' => 'padding-top: 0px;'))?>
				<div class="col-md-9">
					<?php echo $form->checkBox($modelNavigation, 'is_visible'); ?>
					<span class="help-block"><?=$form->error($modelNavigation, 'is_visible')?></span>
				</div>
			</div>
			<div class="form-group">
				<?=$form->labelEx($modelNavigation, 'object_alias', array('class' => 'col-md-3 control-label'))?>
				<div class="col-md-9">
					<?=$form->ListBox($modelNavigation, 'object_alias', CHtml::listData($modelsTypes, 'alias', 'label'), array('class' => 'form-control input-inline input-large'))?>
					<span class="help-block"><?=$form->error($modelNavigation, 'object_alias')?></span>
				</div>
			</div>
			<div class="form-group" style="display: none;">
				<?=$form->labelEx($modelNavigation, 'object_id', array('class' => 'col-md-3 control-label'))?>
				<div class="col-md-9">
					<?=$form->textField($modelNavigation, 'object_id', array('class' => 'form-control input-inline input-large'))?>
					<span class="help-inline"><?=Yii::t('app', 'Следует указывать для страниц.')?></span>
					<span class="help-block"><?=$form->error($modelNavigationLang, 'object_id')?></span>
				</div>
			</div>
			<div class="form-group" style="display: none;">
				<?=$form->labelEx($modelNavigation, 'url', array('class' => 'col-md-3 control-label'))?>
				<div class="col-md-9">
					<span id="Navigation_url_prefix"></span>
					<?=$form->textField($modelNavigation, 'url', array('class' => 'form-control input-inline input-large'))?>
					<span class="help-block"><?=$form->error($modelNavigationLang, 'url')?></span>
				</div>
			</div>
			<div class="form-group" style="display: none;">
				<?=$form->labelEx($modelNavigation, 'target', array('class' => 'col-md-3 control-label'))?>
				<div class="col-md-9">
					<?=$form->ListBox($modelNavigation, 'target', CHtml::listData($modelsTargets, 'alias', 'label'), array('class' => 'form-control input-inline input-large'))?>
					<span class="help-block"><?=$form->error($modelNavigation, 'target')?></span>
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