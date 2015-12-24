<style>
	
	.portlet.box > .portlet-body {
		padding: 30px 10px;
	}

	.portlet-body .row {
		font-size: 17px;
		padding-top: 10px;
		padding-bottom: 10px;
	}
	
	.portlet-body .row .col-md-9 {
		font-weight: 300;
	}
</style>
<div class="portlet box blue-steel">
	<div class="portlet-title">
		<h3 class="caption">
			<i class="glyphicon glyphicon-eye-open"></i>
			<?=Yii::t('app', 'Просмотр пункта')?>: <?=CHtml::encode($modelNavigationLang->title)?>
		</h3>
		<div class="tools">
			<a href="<?=$this->createUrl('update', array('id' => $modelNavigation->id))?>"><i class="fa fa-pencil"></i></a>
			<?=CHtml::form('', 'post', array('style'=>'padding: 0; display: inline; margin-left: 5px;'))?>
				<?=CHtml::linkButton('<i class="fa fa-times"></i>', array(
					'submit'=>array(
						'delete',
						'id' => $modelNavigation->id,
					),
					'params'=>array(
						Yii::app()->request->csrfTokenName => Yii::app()->request->csrfToken
					),
					'confirm'=>Yii::t('app', 'Удалить пункт меню? Если пункт имеет подпункты, то они также будут удалены.')
				))?>
			<?=CHtml::endForm() ?>
		</div>
	</div>
	<div class="portlet-body">
		<div class="row">
			<div class="col-md-3 text-right"><?=CHtml::encode($modelNavigation->getAttributeLabel('id'))?></div>
			<div class="col-md-9"><?=CHtml::encode($modelNavigation->id)?></div>
		</div>
		<div class="row">
			<div class="col-md-3 text-right"><?=CHtml::encode($modelNavigation->getAttributeLabel('label'))?></div>
			<div class="col-md-9"><?=CHtml::encode($modelNavigation->label)?></div>
		</div>
		<div class="row">
			<div class="col-md-3 text-right"><?=CHtml::encode($modelNavigationLang->getAttributeLabel('title'))?></div>
			<div class="col-md-9"><?=CHtml::encode($modelNavigationLang->title)?></div>
		</div>
		<div class="row">
			<div class="col-md-3 text-right"><?=CHtml::encode($modelNavigation->getAttributeLabel('url'))?></div>
			<div class="col-md-9"><?=CHtml::encode($modelNavigation->url)?></div>
		</div>
		<div class="row">
			<div class="col-md-3 text-right"><?=CHtml::encode($modelNavigation->getAttributeLabel('alias'))?></div>
			<div class="col-md-9"><?=CHtml::encode($modelNavigation->alias)?></div>
		</div>
		<div class="row">
			<div class="col-md-3 text-right"><?=CHtml::encode($modelNavigation->getAttributeLabel('object_alias'))?></div>
			<div class="col-md-9"><?=CHtml::encode($modelNavigationType->label)?></div>
		</div>
		<div class="row">
			<div class="col-md-3 text-right"><?=CHtml::encode($modelNavigation->getAttributeLabel('is_visible'))?></div>
			<div class="col-md-9">
				<?php if ((bool)$modelNavigation->is_visible) : ?>
					<?=Yii::t('app', 'Да')?>
				<?php else: ?>
					<?=Yii::t('app', 'Нет')?>
				<?php endif; ?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3 text-right"><?=CHtml::encode($modelNavigation->getAttributeLabel('target'))?></div>
			<div class="col-md-9"><?=CHtml::encode($modelNavigationTargets->label)?></div>
		</div>
	</div>
</div>
<a href="<?=$this->createUrl('index')?>"><?=Yii::t('app', 'Вернуться к навигации')?></a>