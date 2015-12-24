<link rel="stylesheet" href="<?php echo Yii::app()->assetManager->getPublishedUrl(Yii::getPathOfAlias('page.css')); ?>/css/style.css" type="text/css" media="screen, projection" />
<div id="panel_manage_inner">
    <div class="toolbar">
		<?php
		$form = $this->beginWidget('CActiveForm', array(
			'id' => 'pages-form',
			'enableAjaxValidation' => false,
		));
		?>
		<?= CHtml::hiddenField('ajaxurl', $this->createUrl('ajaxpro/saveform'), array('id' => 'ajaxurl')) ?>
		<?= CHtml::hiddenField('page__id', $modelPages->id, array('id' => 'page__id')) ?>
		<?= CHtml::hiddenField('assetpath', Yii::app()->assetManager->getPublishedUrl(Yii::getPathOfAlias('page.css')), array('id' => 'assetpath')) ?>  

		<h2 style="color: #3f4c5c"><?=Yii::t('app', 'Параметры страницы')?> <a style="float: right; font-size: 14px;" class="l-hide"><?=Yii::t('app', 'Свернуть')?></a><a style="float: right; font-size: 14px;" class="l-show"><?=Yii::t('app', 'Развернуть')?></a></h2> 
		<?= $form->hiddenField($modelPages, 'layout'); ?>
		<?= $form->hiddenField($modelPagesLang, 'lang', array('value' => Yii::app()->language)); ?>
		<div class="page-manager-content" style="margin-top: 20px; ">
			<div style="float: left; width: 592px;">
				<h2 style="margin-top: 7px;"><small style="color: #b4b4b4;"><?= Yii::t('app', 'Выберите шаблон страницы') ?>:</small></h2>
				<div class="page-templates">
					<div class="page-template-select-layout">
						<div class="pt-layouts">
							<? if ((bool)$modelPagesTypes->wide) : ?><div class="template wide-icon-picture" style="margin-top: 10px;" value="wide"></div><? endif; ?>
							<? if ((bool)$modelPagesTypes->l_column) : ?><div class="template l_column-icon-picture" value="l_column"></div><? endif; ?>
							<? if ((bool)$modelPagesTypes->r_column) : ?><div class="template r_column-icon-picture" value="r_column"></div><? endif; ?>
							<? if ((bool)$modelPagesTypes->three_column) : ?><div class="template three_column-icon-picture" value="three_column"></div><? endif; ?>
							<? if ((bool)$modelPagesTypes->max_wide) : ?><div class="template max_wide-icon-picture" value="max_wide"></div><? endif; ?>
							<? if ((bool)$modelPagesTypes->max_l_column) : ?><div class="template max_l_column-icon-picture" value="max_l_column"></div><? endif; ?>
							<? if ((bool)$modelPagesTypes->max_r_column) : ?><div class="template max_r_column-icon-picture" value="max_r_column"></div><? endif; ?>
							<? if ((bool)$modelPagesTypes->max_three_column) : ?><div class="template max_three_column-icon-picture" value="max_three_column"></div><? endif; ?>
							<div style="clear: both;"></div>
						</div>
					</div>
					<div><?= $form->error($modelPages, 'layout') ?></div>
				</div>
				<h2><small style="color: #b4b4b4;"><?= Yii::t('app', 'Отображение для ролей') ?>:</small></h2>
				<? if (Yii::app()->user->checkAccess('superadmin')) : ?>
				<?= $form->labelEx($modelPages, 'is_visible_admin') ?>: <?= $form->checkBox($modelPages, 'is_visible_admin'); ?>&nbsp;&nbsp;&nbsp;
				<?= $form->labelEx($modelPages, 'is_edit_admin') ?>: <?= $form->checkBox($modelPages, 'is_edit_admin'); ?>&nbsp;&nbsp;&nbsp;
				<?= $form->labelEx($modelPages, 'is_visible') ?>: &nbsp;<?= $form->checkBox($modelPages, 'is_visible'); ?>
				<? endif; ?>
				<div class="page-roles-table-wrapper" style="height: 148px;margin-top: 10px;">
					<table class="pagetable" style="background: white; border: solid 1px #dbdbdb; width: 583px;
						   margin-bottom: 15px;">
						<tr style="border: solid 1px #dbdbdb;">
							<th class="th-style" align="center"><?= Yii::t('app', 'Роль') ?></th>
							<th class="view_allowed th-style" align="center"><?= Yii::t('app', 'Будет виден') ?></th>
							<th class="view_denied th-style" align="center"><?= Yii::t('app', 'Будет спрятан') ?></th>
						</tr>
						<? foreach($modelsPagesRoles as $key => $modelPagesRoles) : ?>
						<tr  style="border: solid 1px #dbdbdb; font-size: 14px; ">
							<td style="padding: 10px;">
								<?= Yii::t('app', $modelPagesRoles->description) ?>
								<?= $form->hiddenField($modelPagesRoles, 'pages__id', array('name' => get_class($modelPagesRoles) . "[$key]" . '[pages__id]')); ?>
								<?= $form->hiddenField($modelPagesRoles, 'authitem__name', array('name' => get_class($modelPagesRoles) . "[$key]" . '[authitem__name]')); ?>
							</td>
							<td class="view_allowed" align="center"><?= $form->checkBox($modelPagesRoles, 'is_view_allowed', array('name' => get_class($modelPagesRoles) . "[$key]" . '[is_view_allowed]')); ?></td>
							<td class="view_denied" align="center"><?= $form->checkBox($modelPagesRoles, 'is_view_denied', array('name' => get_class($modelPagesRoles) . "[$key]" . '[is_view_denied]')); ?></td>
						</tr>
						<? endforeach; ?>
					</table>
				</div>
				<div class="pages-form-info">
					<div>
						<?= Yii::t('app', 'Установленное значение "Будет виден" перекрывает не установленное значение "Показывать пользователям".') ?>
					</div>
					<div>
						<?= Yii::t('app', 'Установленное значение "Будет спрятан" перекрывает установленное значение "Показывать пользователям".') ?>
					</div>
				</div>
			</div>
			<div style="float: left; width: 575px;">
				<div class="form-group">
					<?= $form->labelEx($modelPagesLang, 'title', array('class' => 'control-label required')) ?>:
					<?= $form->textField($modelPagesLang, 'title', array('class' => 'form-control')); ?>
					<?= $form->error($modelPagesLang, 'title') ?>
				</div>
				<div class="form-group">
					<?= $form->labelEx($modelPagesLang, 'name', array('class' => 'control-label')) ?>:
					<?= $form->textField($modelPagesLang, 'name', array('class' => 'form-control')); ?>
					<?= $form->error($modelPagesLang, 'name') ?>
				</div>
				<div class="form-group">
					<div class="control-label"><?= Yii::t('app', 'Тема оформления') ?>:</div>
					<?= $form->listBox($modelPages, 'theme__id', $themes, array('class' => 'form-control', 'size' => 0)) ?>
					<?= $form->error($modelPages, 'theme__id') ?>
				</div>
				<div class="form-group">
					<div class="control-label"><?= Yii::t('app', 'Ключевые слова') ?>:</div>
					<?= $form->textField($modelPagesLang, 'keywords', array('class' => 'form-control')); ?><br />
					<?= $form->error($modelPagesLang, 'keywords') ?>
				</div>
				<div class="form-group">
					<div class="control-label"><?= Yii::t('app', 'Описание') ?>:</div>
					<?= $form->textArea($modelPagesLang, 'description', array('class' => 'form-control')); ?><br />
					<?= $form->error($modelPagesLang, 'description') ?>
					<?= CHtml::submitButton($modelPages->isNewRecord ? Yii::t('app', 'Создать страницу') : Yii::t('app', 'Применить'), array('class' => 'btn btn-primary', 'id' => 'submit_button', 'style' => 'float: right;')); ?>
				 <? if (Yii::app()->subSession->issetParamByKeys(array('page_pro_create', 'backurl'))) : ?>
                            <div id="backbutton">
                                <?=CHtml::button(Yii::t('app', 'Вернуться к навигации'), array ('onClick' => 'sendForm()', 'class' => 'btn btn-primary')); ?>
                            </div>
                        <? elseif (Yii::app()->user->checkAccess('AdminPagesPageIndex')) : ?>
                            <div id="backbutton">
                                <?=CHtml::button(Yii::t('app', 'К списку страниц'), array ('onClick' => 'window.location = "' . $this->createUrl('index') . '"', 'class' => 'btn btn-primary')); ?>
                            </div>
                        <? endif; ?>                 
				</div>

			</div>
			<div style="clear: both;"></div>
		</div>
		<?php $this->endWidget(); ?>
	</div>
</div>

<script>
			$('.page-template-select-layout').mCustomScrollbar({axis: "x", theme: "light-3"});
			$('.page-roles-table-wrapper').mCustomScrollbar({});
	</script>