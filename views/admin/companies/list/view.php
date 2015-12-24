<div class="portlet box blue-steel">
	<div class="portlet-title">
		<h3 class="caption">
			<i class="glyphicon glyphicon-eye-open" style="margin-right: 10px;"></i> <?=Yii::t('app', 'Компания')?> "<?=CHtml::encode($model->title)?>"
		</h3>
	</div>
	<div class="portlet-body form form-horizontal">
		<div class="form-body">
			<div class="row mt20">
				<div class="col-md-3 text-right">
					<h4 class="h4-label"><?=Yii::t('app', 'Название компании')?>:</h4>
				</div>
				<div class="col-md-9">
					<h4><?=CHtml::encode($model->title)?></h4>
				</div>
			</div>
			<? if (Yii::app()->user->username == Yii::app()->params['superAdminInfo']['username']) : ?>
			<div class="row mt20">
				<div class="col-md-3 text-right">
					<h4 class="h4-label"><?=Yii::t('app', 'Псевдоним')?>:</h4>
				</div>
				<div class="col-md-9">
					<h4><?=CHtml::encode($model->alias)?></h4>
				</div>
			</div>
			<? endif; ?>
			<div class="row mt20">
				<div class="col-md-3 text-right">
					<h4 class="h4-label"><?=Yii::t('app', 'Описание компании')?>:</h4>
				</div>
				<div class="col-md-9">
					<h4><?=CHtml::encode($model_lang->description)?></h4>
				</div>
			</div>
			<div class="row mt20">
				<div class="col-md-3 text-right">
					<h4 class="h4-label"><?=Yii::t('app', 'Адрес компании')?>:</h4>
				</div>
				<div class="col-md-9">
					<?foreach($model_address as $address):?>
					<h4><?=CHtml::encode($address->value)?></h4>
					<?endforeach;?>
				</div>
			</div>
			<div class="row mt20">
				<div class="col-md-3 text-right">
					<h4 class="h4-label"><?=Yii::t('app', 'Телефон компании')?>:</h4>
				</div>
				<div class="col-md-9">
					<h4>
						<? foreach($model->phones as $key => $phone) : ?>
							<?=CHtml::encode($phone->value)?>
							<? if (array_key_exists($key + 1, $model->phones)) : ?>
								<div class="margin-bottom-10"></div>
							<? endif; ?>
						<? endforeach ;?>
					</h4>
				</div>
			</div>
			<div class="row mt20">
				<div class="col-md-3 text-right">
					<h4 class="h4-label"><?=Yii::t('app', 'Скайп компании')?>:</h4>
				</div>
				<div class="col-md-9">
					<h4>
						<? foreach($model->skypes as $key => $skype) : ?>
						<?=CHtml::encode($skype->value)?>
						<? if (array_key_exists($key + 1, $model->skypes)) : ?>
							<div class="margin-bottom-10"></div>
						<? endif; ?>
					<? endforeach ;?>
					</h4>
				</div>
			</div>
		</div>
		<div class="form-actions">
		<?=CHtml::beginForm($this->createUrl('list/create/action/edit/id/' . $model->id)) ?>
			<? if (Yii::app()->user->checkAccess('AdminCompaniesListEdit')) : ?>
				<?=CHtml::submitButton(Yii::t('app', 'Редактировать компанию'), array('class' => 'btn green'))?>
			<? endif; ?>
			<? if (Yii::app()->user->checkAccess('AdminCompaniesListIndex')) : ?>
				<?=CHtml::link(Yii::t('app', 'К списку компаний'), $this->createUrl('index'), array('class' => 'btn grey'))?>
			<? endif; ?>
		<?=CHtml::endForm(); ?>
		</div>
	</div>
</div>