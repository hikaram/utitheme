<?php
$this->breadcrumbs['Панель управления'] = $this->module->id;

function setNamesForView($type, &$objectName, &$ObjectName, &$objectsName, &$ObjectsName, &$typesName)
{
	switch($type)
	{
		case 'module' : $objectName = 'модуль';  $ObjectName = 'Модуль'; $objectsName = 'модули'; $ObjectsName = 'Модули'; $typesName = $type . 's'; break;
		case 'package' : $objectName = 'пакет'; $ObjectName = 'Пакет'; $objectsName = 'пакеты'; $ObjectsName = 'Пакеты'; $typesName = $type . 's'; break;
		case 'patch' : $objectName = 'патч'; $ObjectName = 'Патч'; $objectsName = 'патчи'; $ObjectsName = 'Патчи'; $typesName = $type . 's'; break;
	}
}
?>
<? if ((bool)ALLOW_OFFSET_DB_DATE): ?>
<div class="row">
	<div class="note note-warning">
		<h4 class="block">Внимание! На сайте включено смещение даты и времени.</h4>
		<p>
			Текущая дата и время сервера на момент загрузки страницы: <?=app_date('d.m.Y H:i:s')?>.
			Обратите внимание, что смещение времени разрешается включать только на тестовом сайте. Иначе, это приведет к непредсказуемым последствиям.
			Настройки смещения, вы можете посмотреть <a href="/admin/default/timesettings">здесь</a>.
		</p>
	</div>
</div>
<? endif; ?>

<? if ($statistic == null) return; ?>

<div class="row">
	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
		<div class="dashboard-stat blue-madison">
			<div class="visual">
				<i class="fa icon-folder"></i>
			</div>
			<div class="details">
				<div class="number">
					 <?=$statistic['count']['modules']?>
				</div>
				<div class="desc">
					Модулей
				</div>
			</div>
			<a class="more" href="<?=$this->createUrl('/superadmin/Objects/new/type/module/is_adapted/0/project_id/2');?>">Перейти
			 <i class="m-icon-swapright m-icon-white"></i>
			</a>
		</div>
	</div>
	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
		<div class="dashboard-stat green-haze">
			<div class="visual">
				<i class="fa icon-puzzle"></i>
			</div>
			<div class="details">
				<div class="number">
					<?=$statistic['count']['packages']?>
				</div>
				<div class="desc">
					Пакетов
				</div>
			</div>
			<a class="more" href="<?=$this->createUrl('/superadmin/Objects/new/type/package/is_adapted/0/project_id/2');?>">
			Перейти <i class="m-icon-swapright m-icon-white"></i>
			</a>
		</div>
	</div>
	<!--div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
		<div class="dashboard-stat red-intense">
			<div class="visual">
				<i class="fa icon-fire"></i>
			</div>
			<div class="details">
				<div class="number">
					<?=$statistic['count']['patches']?>
				</div>
				<div class="desc">
					 Патчей
				</div>
			</div>
			<a class="more" href="<?=$this->createUrl('/superadmin/Patches/new');?>">
			Перейти <i class="m-icon-swapright m-icon-white"></i>
			</a>
		</div>
	</div-->
	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
		<div class="dashboard-stat purple-plum">
			<div class="visual">
				<i class="fa icon-rocket"></i>
			</div>
			<div class="details">
				<div class="number">
					<?=$statistic['uticms']['version']?>
				</div>
				<div class="desc">
					Последняя версия UTI.CMS
				</div>
			</div>
			<a class="more" href="<?=$this->createUrl('/superadmin/Cms/new');?>">
			Перейти <i class="m-icon-swapright m-icon-white"></i>
			</a>
		</div>
	</div>
</div>

<div class="row ">
	<div class="col-md-12 col-sm-12">
		<div class="portlet box yellow">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-bell-o"></i>Последние добавленные объекты в репозиторий UTI.CMS
				</div>
			</div>
			<div class="portlet-body">
				<div class="scroller" style="height: 150px;" data-always-visible="1" data-rail-visible="0">
					<ul class="feeds">
						<? foreach($statistic['objects'] as $object) : ?>
						<? $objectName=null; $ObjectName=null; $objectsName=null; $ObjectsName=null; $typesName=null;?>
						<? setNamesForView($object['type'], $objectName, $ObjectName, $objectsName, $ObjectsName, $typesName) ?>
						<li>
							<div class="col1">
								<div class="cont">
									<div class="cont-col1">
										<div class="label label-sm label-info">
											<i class="
											<? if ($object['type']=='package') echo 'icon-puzzle'; elseif ($object['type']=='module') echo 'fa fa-folder'; elseif($object['type']=='patch') echo 'icon-fire'; ?>
											"></i>
										</div>
									</div>
									<div class="cont-col2">
										<div class="desc">
											<?=$object['type']?> - <?=$object['name']?>.v.<?=$object['version']?>
											 <a title="Подробно" class="glyphicon glyphicon-info-sign" href="<?=$this->createUrl('/superadmin/' . $typesName . '/newfullinfo', array('name' => $object['name'], 'version' => $object['version']))?>"></a>
											<?=CHtml::form('', 'post', array('style' => 'display: inline'))?>
											<?=CHtml::linkButton('', array(
													'submit'=>array(
														$typesName . '/download/'
													),
													'class' => 'glyphicon glyphicon-cloud-download ',
													'title' => 'Загрузить ' . $objectName,
													'params'=>array(
														Yii::app()->request->csrfTokenName => Yii::app()->request->csrfToken,
														'btnDownload' => 'download',
														'name' => $object['name'],
														'version' => $object['version']
													),
													'confirm'=>"Загрузить " . $objectName . "?"
												))?>
											<?=CHtml::endForm() ?>
											
											<?=CHtml::form('', 'post', array('style' => 'display: inline'))?>
											<?=CHtml::linkButton('', array(
												'submit'=>array(
													$typesName .'/download/isAuto/' . DefaultController::installTypeInstall
												),
												'class' => 'glyphicon glyphicon-save',
												'title' => 'Загрузить и установить',
												'params'=>array(
													Yii::app()->request->csrfTokenName => Yii::app()->request->csrfToken,
													'btnDownload' => 'download',
													'name' => $object['name'],
													'version' => $object['version']
												),
												'confirm'=>"Загрузить и установить $objectName?\n" . $ObjectName . " будет установлен без возможности изменить путь.",
											))?>
											<?=CHtml::endForm() ?>
											<? if ($this->isInstalled($object['type'], $object['name'], $objectInstalled)) : ?>
												<? if ($objectInstalled['version'] == $object['version']) : ?>
												<span class="label label-sm label-success">Уже установлен</span>
												<? else :?>
												<span class="label label-sm label-success">Уже установлен версия <?=$objectInstalled['version']?></span>
												<? endif;?>
											<? endif;?>
										</div>
									</div>
								</div>
							</div>
							<div class="col2">
								<div class="date">
									<?=MSmarty::date_format($object['publication_date'], '%d.%m.%Y')?>
								</div>
							</div>
						</li>
						<? endforeach;?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="clearfix">