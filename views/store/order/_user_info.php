<div class="margin-top-10">
	<h4><?=Yii::t('app', 'Личные данные');?>:</h4>

	<div class="row form-group">
		<div class="col-md-6 col-sm-6">
			<label><?=Yii::t('app', 'Логин');?>:</label>
			<div><?=CHtml::encode($horder->user->username)?></div>
		</div>
		<? if (($horder->user->profile != NULL) && ($horder->user->profile->lang != NULL)): ?>
			<div class="col-md-6 col-sm-6">
				<label><?=Yii::t('app', 'Фамилия');?>:</label>
				<div><?=CHtml::encode($horder->user->profile->lang->last_name)?></div>
			</div>
		<? endif;?>
	</div>

	<? if (($horder->user->profile != NULL) && ($horder->user->profile->lang != NULL)): ?>
	<div class="row form-group">
		
		<div class="col-md-6 col-sm-6">
			<label><?=Yii::t('app', 'Имя');?>:</label>
			<div><?=CHtml::encode($horder->user->profile->lang->first_name)?></div>
		</div>
		<div class="col-md-6 col-sm-6">
			<label><?=Yii::t('app', 'Отчество');?>:</label>
			<div><?=CHtml::encode($horder->user->profile->lang->second_name)?></div>
		</div>
	</div>
	<? endif;?>
	
	<hr/>
	
	<h4><?=Yii::t('app', 'Контакты');?>:</h4>
	
	<div class="row form-group">
		<div class="col-md-6 col-sm-6">
			<label><?=Yii::t('app', 'E-mail');?>:</label>
			<div><?=CHtml::encode($horder->user->email)?></div>
		</div>
	<? if (!empty($horder->user->profile->phone)):?>
		<div class="col-md-6 col-sm-6">
			<label><?=Yii::t('app', 'Телефон');?>:</label>
			<div><?=CHtml::encode($horder->user->profile->phone)?></div>
		</div>
	<? endif; ?>
	</div>

</div>