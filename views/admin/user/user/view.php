<div class="portlet box blue-steel h5">
	<div class="portlet-title">
		<h3 class="caption">
			<i class="glyphicon glyphicon-eye-open mr10"></i>
			<?=Yii::t('app', 'Пользователь')?> <?=CHtml::encode($model->username)?>
		</h3>
	</div>
	<div class="portlet-body form form-horizontal">
		<div class="form-body">
			<? if((array_key_exists('attachment__id', $list)) && (Yii::app()->isModuleInstall('Attachment', '1.0.5'))): ?>
			<div class="form-group">
				<div class="col-md-4"><?=$model->profile->getAttributeLabel('attachment__id')?></div>
				<div class="col-md-8 text-light">
					<? if (($model->profile->attachment != NULL) && ($model->profile->attachment->secret_name != null)) : ?>
						<?=CHtml::image(MSmarty::attachment_get_file_name($model->profile->attachment->secret_name, $model->profile->attachment->raw_name, $model->profile->attachment->file_ext, '_office_profile', 'office_photo'), '', array('align' => 'left', 'style' => 'margin:0 15px 0 0;')); ?>
					<? else : ?>
						<?=CHtml::image(Yii::app()->assetManager->getPublishedUrl(Yii::getPathOfAlias('admin.modules.user.css')) . '/img/o.jpg', 'nophoto', array('height' => '200px', 'width' => '200px'));?>
					<? endif; ?>
				</div>
			</div>
			<? endif; ?>
			<div class="form-group">
				<div class="col-md-12">
					<h4>Личные данные</h4>
					<hr/>
				</div>
			</div>
			<? if(array_key_exists('username', $list)): ?>
			<div class="form-group">
				<div class="col-md-4 text-right">
					<?=$model->getAttributeLabel('username')?>
				</div>
				<div class="col-md-8 text-light"><?=CHtml::encode($model->username)?></div>
			</div>
			<? endif; ?>
			<? if((array_key_exists('password', $list)) && ((bool)$modelSecurity->is_allowed_view_password)): ?>
			<div class="form-group">
				<div class="col-md-4 text-right">
					<?=$model->getAttributeLabel('password')?>
				</div>
				<div class="col-md-8 text-light">
					<?=CHtml::encode($model->password)?>
				</div>
			</div>
			<? endif; ?>
			<? if((array_key_exists('finpassword', $list)) && ((bool)$modelSecurity->is_allowed_view_finpassword)): ?>
			<div class="form-group">
				<div class="col-md-4 text-right">
					<?=$model->getAttributeLabel('finpassword')?>
				</div>
				<div class="col-md-8 text-light"><?=CHtml::encode($model->finpassword)?></div>
			</div>
			<? endif; ?>
			<? if(array_key_exists('last_name', $list)): ?>
			<div class="form-group">
				<div class="col-md-4 text-right">
					<?=$model->lang->getAttributeLabel('last_name')?>
				</div>
				<div class="col-md-8 text-light"><?=CHtml::encode($model->profile->lang->last_name)?></div>
			</div>
			<? endif; ?>
			<? if(array_key_exists('first_name', $list)): ?>
			<div class="form-group">
				<div class="col-md-4 text-right">
					<?=$model->lang->getAttributeLabel('first_name')?>
				</div>
				<div class="col-md-8 text-light"><?=CHtml::encode($model->profile->lang->first_name)?></div>
			</div>
			<? endif; ?>
			<? if(array_key_exists('second_name', $list)): ?>
			<div class="form-group">
				<div class="col-md-4 text-right">
					<?=$model->lang->getAttributeLabel('second_name')?>
				</div>
				<div class="col-md-8 text-light"><?=CHtml::encode($model->profile->lang->second_name)?></div>
			</div>
			<? endif; ?>
			<? if(array_key_exists('sex', $list)): ?>
			<div class="form-group">
				<div class="col-md-4 text-right">
					<?=$model->profile->getAttributeLabel('sex')?>
				</div>
				<div class="col-md-8 text-light">
					<? if ($model->profile->sex == Profile::SEX_MALE) : ?><?=Yii::t('app', 'Мужской')?>
					<? elseif ($model->profile->sex == Profile::SEX_FEMALE) : ?><?=Yii::t('app', 'Женский')?>
					<? endif; ?>
				</div>
			</div>
			<? endif; ?>
			<? if(array_key_exists('birthday', $list)): ?>
			<div class="form-group">
				<div class="col-md-4 text-right">
					<?=$model->profile->getAttributeLabel('birthday')?>
				</div>
				<div class="col-md-8 text-light"><?=MSmarty::date_format($model->profile->birthday, 'd.m.Y')?></div>
			</div>
			<? endif; ?>
			<div class="form-group">
				<div class="col-md-12">
					<h4><?=Yii::t('app', 'Контактные данные')?></h4>
					<hr/>
				</div>
			</div>
			<? if(array_key_exists('email', $list)): ?>
			<div class="form-group">
				<div class="col-md-4 text-right">
					<?=$model->getAttributeLabel('email')?>
				</div>
				<div class="col-md-8 text-light">
					<?=CHtml::encode($model->email)?>
				</div>
			</div>
			<? endif; ?>
			<? if(array_key_exists('phone', $list)): ?>
			<div class="form-group">
				<div class="col-md-4 text-right">
					<?=$model->profile->getAttributeLabel('phone')?>
				</div>
				<div class="col-md-8 text-light">
					<?=CHtml::encode($model->profile->phone)?>
				</div>
			</div>
			<? endif; ?>
			<? if(array_key_exists('skype', $list)): ?>
			<div class="form-group">
				<div class="col-md-4 text-right">
					<?=$model->profile->getAttributeLabel('skype')?>
				</div>
				<div class="col-md-8 text-light">
					<?=CHtml::encode($model->profile->skype)?>
				</div>
			</div>
			<? endif; ?>
			<div class="form-group">
				<div class="col-md-12">
					<h4><?=Yii::t('app', 'Местонахождение')?></h4>
					<hr/>
				</div>
			</div>
			<?php $cities = $this->beginWidget('CitiesWidget', array()); ?>
				<? if(array_key_exists('country_name', $list)): ?>
					<div class="form-group">
						<div class="col-md-4 text-right">
							<?=$model->lang->getAttributeLabel('country_name')?>
						</div>
						<div class="col-md-8 text-light">
							<? if (empty($model->profile->country__id)) : ?>
								<?=CHtml::encode($model->lang->country_name)?>
							<? else : ?>
								<?php $cities->get_country($model->profile->country__id); ?>
							<? endif; ?>
						</div>
					</div>
				<? endif; ?>
				<? if(array_key_exists('region_name', $list)): ?>
					<div class="form-group">
						<div class="col-md-4 text-right">
							<?=$model->lang->getAttributeLabel('region_name')?>
						</div>
						<div class="col-md-8 text-light">
							<? if (empty($model->profile->region__id)) : ?>
								<?=CHtml::encode($model->lang->region_name)?>
							<? else : ?>
								<?php $cities->get_region($model->profile->region__id); ?>
							<? endif; ?>
						</div>
					</div>
				<? endif; ?>
				<? if(array_key_exists('city_name', $list)): ?>
					<div class="form-group">
						<div class="col-md-4 text-right">
							<?=$model->lang->getAttributeLabel('city_name')?>
						</div>
						<div class="col-md-8 text-light">
							<? if (empty($model->profile->city__id)) : ?>
								<?=CHtml::encode($model->lang->city_name)?>
							<? else : ?>
								<?php $cities->get_city($model->profile->city__id); ?>
							<? endif; ?>
						</div>
					</div>
				<? endif; ?>
			<?php $this->endWidget(); ?> 
			<? if(array_key_exists('address', $list)): ?>
				<div class="form-group">
					<div class="col-md-4 text-right">
						<?=$model->profile->lang->getAttributeLabel('address')?>
					</div>
					<div class="col-md-8 text-light">
						<?=CHtml::encode($model->profile->lang->address)?>
					</div>
				</div>
			<? endif; ?>
			<? if(array_key_exists('zip_code', $list)): ?>
				<div class="form-group">
					<div class="col-md-4 text-right">
						<?=$model->profile->getAttributeLabel('zip_code')?>
					</div>
					<div class="col-md-8 text-light">
						<?=CHtml::encode($model->profile->zip_code)?>
					</div>
				</div>
			<? endif; ?>
			<? if ($model->profile->sponsor != NULL) : ?>
				<div class="form-group">
					<div class="col-md-12">
						<h4><?=Yii::t('app', 'Спонсор')?></h4>
						<hr/>
					</div>
				</div>
				<? if(array_key_exists('sponsor__id', $list)): ?>
					<div class="form-group">
						<div class="col-md-4 text-right">
							<?=Yii::t('app', 'Спонсор')?>
						</div>
						<div class="col-md-8 text-light">
							<? if ($model->profile->sponsor != NULL) : ?>
								<?=CHtml::encode($model->profile->sponsor->username)?>
							<? else : ?>
								<small class="text-muted">(отсутствует)</small>
							<? endif; ?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-4 text-right">
							<?=Yii::t('app', 'Фамилия')?>
						</div>
						<div class="col-md-8 text-light">
							<?=CHtml::encode($model->profile->sponsor->profile->lang->last_name)?> 
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-4 text-right">
							<?=Yii::t('app', 'Имя')?>
						</div>
						<div class="col-md-8 text-light">
							<?=CHtml::encode($model->profile->sponsor->profile->lang->first_name)?> 
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-4 text-right">
							<?=Yii::t('app', 'Отчество')?>
						</div>
						<div class="col-md-8 text-light">
							<?=CHtml::encode($model->profile->sponsor->profile->lang->second_name)?> 
						</div>
					</div>
				<? endif; ?>
			<? endif; ?>
			<div class="form-group">
				<div class="col-md-12">
					<h4><?=Yii::t('app', 'Дополнительная информация')?></h4>
					<hr/>
				</div>
			</div>
			<? if(array_key_exists('series_passport', $list)): ?>
				<div class="form-group">
					<div class="col-md-4 text-right">
						<?=$model->profile->getAttributeLabel('series_passport')?>
					</div>
					<div class="col-md-8 text-light">
						<?= CHtml::encode($model->profile->series_passport); ?>
					</div>
				</div>
			<? endif; ?>            
			<? if ($model->profile->register_status != NULL) : ?>
				<div class="form-group">
					<div class="col-md-4 text-right">
						<?=Yii::t('app', 'Тип регистрации')?>
					</div>
					<div class="col-md-8 text-light">
						<?=CHtml::encode($model->profile->register_status->lang->description)?>
					</div>
				</div>
			<? endif; ?>
		</div>
		<div class="form-actions">
			<?=CHtml::beginForm($this->createUrl('user/create', array('action' => 'edit', 'id' => sha1($model->id))))?>
				<? if (Yii::app()->user->checkAccess('AdminUserUserEdit')) : ?>
					<?=CHtml::submitButton(Yii::t('app', 'Редактировать данные пользователя'), array('class' => 'btn green'))?>
				<? endif; ?>
				<? if (Yii::app()->user->checkAccess('AdminUserUserIndex')) : ?>
					<a href="<?=$this->createUrl('index')?>" class="btn grey"><?=Yii::t('app', 'Вернуться к списку пользователей')?></a>
				<? endif; ?>
			<?=CHtml::endForm()?>
		</div>
	</div>
</div>