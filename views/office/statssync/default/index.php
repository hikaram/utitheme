<?php $this->layout = 'office'; ?>
	<div class="portlet box blue">
		<div class="portlet-title">
			<div class="caption">
				<i class="fa fa-table"></i>Отчеты
			</div>
		</div>

		<div class="portlet-body" style=" overflow: hidden;">
			<? if (Yii::app()->user->checkAccess('OfficeStatsSyncSettingsIndex')) : ?>
				<table class="table table-striped table-hover table-bordered dataTable no-footer" style="width: 100%" style="width: 100%;">
					<tbody>
						<tr>
							<th><?=Yii::t('app', 'Настройки отображения отчетов')?></th>
						</tr>

						<tr>
							<td style="text-align: left; padding-left: 20px;"><?=CHtml::link(Yii::t('app', 'Настройки отображения отчетов'), $this->createUrl('settings/index'))?></td>
						</tr>

					</tbody>
				</table>
			<? endif;?>
			<table class="table table-striped table-hover table-bordered dataTable no-footer" style="width: 100%" style="width: 100%;">
				<tbody>
					<tr>
						<th><?=Yii::t('app', 'Структура')?></th>
					</tr>
					<? if ((Yii::app()->user->checkAccess('OfficeStatsSyncDefaultFirstline')) &&
							(array_key_exists(SettingsControllerBase::ReportAliasFirstline, $params)) &&
							($params[SettingsControllerBase::ReportAliasFirstline] != NULL) &&
							(((bool)$params[SettingsControllerBase::ReportAliasFirstline]->is_active) ||
							(((bool)$params[SettingsControllerBase::ReportAliasFirstline]->is_on) && (Yii::app()->user->checkAccess('OfficeStatsSyncSettingsIndex'))) ||
							(Yii::app()->user->username == Yii::app()->params['superAdminInfo']['username']))) : ?>
						<tr>
							<td style="text-align: left; padding-left: 20px;"><?=CHtml::link(Yii::t('app', 'Первая линия'), $this->createUrl('firstline'))?></td>
						</tr>
					<? endif;?>

					<? if ((Yii::app()->user->checkAccess('OfficeStatsSyncDefaultBirthday')) &&
							(array_key_exists(SettingsControllerBase::ReportAliasBirthday, $params)) &&
							($params[SettingsControllerBase::ReportAliasBirthday] != NULL) &&
							(((bool)$params[SettingsControllerBase::ReportAliasBirthday]->is_active) ||
							(((bool)$params[SettingsControllerBase::ReportAliasBirthday]->is_on) && (Yii::app()->user->checkAccess('OfficeStatsSyncSettingsIndex'))) ||
							(Yii::app()->user->username == Yii::app()->params['superAdminInfo']['username']))) : ?>
						<tr>
							<td style="text-align: left; padding-left: 20px;"><?=CHtml::link(Yii::t('app', 'Дни рождения в структуре'), $this->createUrl('birthday'))?></td>
						</tr>
					<? endif;?>

					<? if ((Yii::app()->user->checkAccess('OfficeStatsSyncDefaultTree')) &&
							(array_key_exists(SettingsControllerBase::ReportAliasTree, $params)) &&
							($params[SettingsControllerBase::ReportAliasTree] != NULL) &&
							(((bool)$params[SettingsControllerBase::ReportAliasTree]->is_active) ||
							(((bool)$params[SettingsControllerBase::ReportAliasTree]->is_on) && (Yii::app()->user->checkAccess('OfficeStatsSyncSettingsIndex'))) ||
							(Yii::app()->user->username == Yii::app()->params['superAdminInfo']['username']))) : ?>
						<tr>
							<td style="text-align: left; padding-left: 20px;"><?=CHtml::link(Yii::t('app', 'Дерево дистрибьюторов'), $this->createUrl('tree'))?></td>
						</tr>
					<? endif;?>
					<? if ((Yii::app()->user->checkAccess('OfficeStatsSyncDefaultBonusesbyperiods')) &&
							(array_key_exists(SettingsControllerBase::ReportAliasBonusesbyperiods, $params)) &&
							($params[SettingsControllerBase::ReportAliasBonusesbyperiods] != NULL) &&
							(((bool)$params[SettingsControllerBase::ReportAliasBonusesbyperiods]->is_active) ||
							(((bool)$params[SettingsControllerBase::ReportAliasBonusesbyperiods]->is_on) && (Yii::app()->user->checkAccess('OfficeStatsSyncSettingsIndex'))) ||
							(Yii::app()->user->username == Yii::app()->params['superAdminInfo']['username']))) : ?>
						<tr>
							<td style="text-align: left; padding-left: 20px;"><?=CHtml::link(Yii::t('app', 'Бонусы по периодам'), $this->createUrl('bonusesbyperiods'))?></td>
						</tr>
					<? endif;?>
					
					<? if ((Yii::app()->user->checkAccess('OfficeStatsSyncDefaultPersonalbonusbyperiods')) &&
							(array_key_exists(SettingsControllerBase::ReportAliasPersonalbonus, $params)) &&
							($params[SettingsControllerBase::ReportAliasPersonalbonus] != NULL) &&
							(((bool)$params[SettingsControllerBase::ReportAliasPersonalbonus]->is_active) ||
							(((bool)$params[SettingsControllerBase::ReportAliasPersonalbonus]->is_on) && (Yii::app()->user->checkAccess('OfficeStatsSyncSettingsIndex'))) ||
							(Yii::app()->user->username == Yii::app()->params['superAdminInfo']['username']))) : ?>
						<tr>
							<td style="text-align: left; padding-left: 20px;"><?=CHtml::link(Yii::t('app', 'Персональный бонус за период'), $this->createUrl('personalbonusbyperiods'))?></td>
						</tr>
					<? endif;?>

				</tbody>
			</table>
		</div>
	</div>