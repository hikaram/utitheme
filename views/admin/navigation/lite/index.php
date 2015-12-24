<?php
$this->breadcrumbs[Yii::t('app', 'Легкая навигация')] = $this->module->id;
?> 

<style>
    .list .action form { display: inline; }
</style>
<div class="portlet box yellow">
	<div class="portlet-title">
		<h3 class="caption">
			<i class="fa fa-sitemap"></i>
			<?=Yii::t('app', 'Навигация сайта')?>
		</h3>
	</div>
	<div class="portlet-body">
		<table class="list table-hover" id="navigation" style="width: 100%;">
            <tbody>
                <?foreach($navigations as $item => $tree) :?>
                <tr class="tn-container" node="<?=$tree['id']?>" parent="<?=$tree['parent_id']?>" children_count="<?=$tree['children_count']?>" level="<?=$tree['tree_level']?>">
					<td class="tn-manager" style="width: 50%;">
						<div class="tnm-children">
							<span class="fa fa-plus-square-o"></span>
							<span class="fa fa-minus-square-o"></span>
						</div>
						<div class="tnm-content">
							<? if (isset($modelsTypes[$tree['object_alias']])) : ?>
								<? if ($modelsTypes[$tree['object_alias']]->label == "Раздел") :?>
									<i class="fa fa-folder"></i>
									<i class="fa fa-folder-open"></i>
								<? elseif ($modelsTypes[$tree['object_alias']]->label == "Страница") :?>
									<i class="fa fa-file-o"></i>
								<? elseif ($modelsTypes[$tree['object_alias']]->label == "Ссылка") :?>
									<i class="fa fa-link"></i>
								<? elseif ($modelsTypes[$tree['object_alias']]->label == "Внешняя ссылка") :?>
									<i class="fa fa-external-link"></i>
								<? else : ?>
									<i class="fa fa-question-circle"></i>
								<? endif; ?>
							<? else : ?>
								<i class="fa fa-question-circle"></i>
                            <? endif; ?>
							<?=$tree['label']?>
						</div>
						<div class="floater"></div>
					</td>
					<!--<td class="tn-manager">
						<div class="tnm-children"></div>
						<div class="tnm-content"><?=$tree['label']?></div>
					</td>-->
					<td style="width: 30%;">
						<? if($tree['parent_id'] == 0) :?><a href="<?=Yii::app()->baseUrl; ?>"><?=Yii::app()->baseUrl; ?></a>
						<? elseif ($modelsTypes[$tree['object_alias']]->label != "Раздел") : ?>
							<? if ($tree['object_alias'] == Navigation::NAVIGATION_TYPE_EXT_LINK) : ?>
								<a href="<?=CHtml::encode($tree['url'])?>" class="tooltips" data-container="body" data-placement="top" data-original-title="<?=$modelsTargets[$tree['target']]->label?>"><?=CHtml::encode($tree['url'])?></a>
								
							<? else : ?>
								<a href="<?=Yii::app()->createUrl($tree['url'])?>" class="tooltips" data-container="body" data-placement="top" data-original-title="<?=$modelsTargets[$tree['target']]->label?>"><?=CHtml::encode($tree['url'])?></a>
								
							<? endif; ?>
						<? endif; ?>
					</td>
					<td class="toolbar" style="width: 20%;">
						<div class="btn-group">
							<button class="btn btn-default btn-sm">
								<i class="glyphicon glyphicon-cog"></i> <?=Yii::t('app', 'Действия')?>
							</button>
							<button class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
								<i class="fa fa-angle-down"></i>
							</button>
							<ul class="dropdown-menu" role="menu">
								<li>
									<? if ((Yii::app()->user->checkAccess('AdminNavigationEdit')) && ($tree['tree_level'] != (int)TRUE)) : ?>
										<?=CHtml::link(Yii::t('app', 'Редактировать'), $this->createUrl('lite/edit', array('id' => $tree['id'])))?>
									<? endif; ?>
								</li>
								<li>
									<? if (Yii::app()->user->checkAccess('AdminNavigationCreate')) : ?>
										<?=CHtml::link(Yii::t('app', 'Добавить подпункт'), $this->createUrl('lite/create', array('parent_id' => $tree['id'])))?>
									<? endif; ?>
								</li>
								<li>
									<? if ((Yii::app()->user->checkAccess('AdminNavigationDelete')) && ($tree['tree_level'] != (int)TRUE)) : ?>
										<?=CHtml::linkButton(Yii::t('app', 'Удалить'), array(
											'submit'=>array(
												'lite/delete/',
												'id' => $tree['id']
											),
											'params'=>array(
												Yii::app()->request->csrfTokenName => Yii::app()->request->csrfToken
											),
											'confirm' => Yii::t('app', 'Удалить пункт? Если пункт имеет подпункты, то они также будут удалены')
										))?>
									<? endif; ?>
								</li>
							</ul>
						</div>
					</td>
				</tr>
				<?endforeach; ?>
            </tbody>
        </table>
	</div>
</div>
<? if (Yii::app()->user->checkAccess('AdminNavigationCreate')) : ?>
	<a href="<?=$this->createUrl('create')?>"><?=Yii::t('app', 'Создать новый пункт меню')?></a>
<? endif; ?>
