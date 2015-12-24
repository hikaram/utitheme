<div class="portlet box yellow">
	<div class="portlet-title">
		<h3 class="caption"><?=Yii::t('app','Просмотр склада')?></h3>
	</div>
		<div class="portlet-body">
			<div class="table-scrollable">
				<?php
				$cities = $this->beginWidget('CitiesWidget', array());

				$this->widget('zii.widgets.CDetailView', array(
					'data' => $model,
					'htmlOptions' => array(
						'class' => 'table table-striped table-bordered table-advance table-hover'
					),  
					'attributes' => array(
						'id',
						array(
							'name'=>CHtml::encode(WarWarehouseLang::model()->getAttributeLabel('name')),
							'value'=>CHtml::encode(@$model->lang->name),
						),
						'phone',
						'email',
						'skype',
						array(
							'name'=>'country_id',
							'value'=>CHtml::encode(@$model->country->lang->name),
						),
								array(
							'name'=>'region_id',
							'value'=>CHtml::encode(@$model->region->lang->name),
						),
						array(
							'name'=>'city_id',
							'value'=>CHtml::encode(@$model->city->lang->name),
						),		
						array(
							'name' => 'war_type__id',
							'value' => CHtml::encode(@$model->war_type->lang->name)
						),
						array(
							'name' => 'users__id',
							'value' => $model->war_type->alias != WarWarehouseType::WHTypeSupplier ? (CHtml::encode(@$model->users->profile->lang->first_name).' '.CHtml::encode(@$model->users->profile->lang->last_name).' '.CHtml::encode(@$model->users->profile->lang->second_name)) : (' - - '),
						),		
						array(
							'name'=>CHtml::encode(WarWarehouseLang::model()->getAttributeLabel('adress')),
							'value'=>CHtml::encode(@$model->lang->adress),
						)
					),
				));
						
						$this->endWidget();
				?>
				
			</div>
			<div class="form-actions fluid">
						<?php echo CHtml::button(Yii::t('app','Назад'), array('class' => 'btn default', 'onclick' => 'window.location = app.createAbsoluteUrl("admin/warehouse/warehouse")')); ?>
				</div>
		</div>
	</div>
