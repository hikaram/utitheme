<div class="portlet box yellow">
	<div class="portlet-title">
		<h3 class="caption"><?=Yii::t('app','Склады')?></h3>
	</div>
		<div class="portlet-body">
			<div class="table-scrollable">
				<table class="table table-hover">
					<thead>
						<tr>
							<th><?=CHtml::encode(WarWarehouse::model()->getAttributeLabel('number')); ?></th>
							<th><?=CHtml::encode(WarWarehouseLang::model()->getAttributeLabel('name')); ?></th>
							<th><?=CHtml::encode(WarWarehouse::model()->getAttributeLabel('phone')); ?></th>
							<th><?=CHtml::encode(WarWarehouse::model()->getAttributeLabel('email')); ?></th>
							<th><?=CHtml::encode(WarWarehouse::model()->getAttributeLabel('country_id')); ?></th>
							<th><?=CHtml::encode(WarWarehouse::model()->getAttributeLabel('region_id')); ?></th>
							<th><?=CHtml::encode(WarWarehouse::model()->getAttributeLabel('city_id')); ?></th>
							<th><?=CHtml::encode(WarWarehouseTypeLang::model()->getAttributeLabel('name')); ?></th>
							<th><?=CHtml::encode(WarWarehouse::model()->getAttributeLabel('users__id')); ?></th>
							<th><?=CHtml::encode(WarWarehouseLang::model()->getAttributeLabel('adress')); ?></th>
							<th><?=CHtml::encode(WarWarehouse::model()->getAttributeLabel('created_at')); ?></th>
							<th><?=Yii::t('app', 'Действия')?></th>
						</tr>
					</thead>

					<tbody>
						<? if(empty($data)):?>
							<tr>
								<td colspan="12" style="text-align: center;"><?=Yii::t('app', 'Не найдено ни одного склада')?></td>
							</tr>
						<? else : ?>
						
							<?php $i = ((array_key_exists('page', $_GET) ? $_GET['page'] : (int)TRUE) - 1) * WH_PER_PAGE + 1; ?>
							
							<? foreach($data as $key=>$value): ?>
								<tr>
									<td style="text-align: center;">
										<? //CHtml::link($value->number, array('view', 'id' => $value->id))?>
										<?=CHtml::encode($value->number); ?>
									</td>
									<td style="text-align: center;"><?=CHtml::encode($value->lang->name); ?></td>
									<td style="text-align: center;"><?=CHtml::encode($value->phone); ?></td>
									<td style="text-align: center;"><?=CHtml::encode($value->email); ?></td>
									
									<?php $cities = $this->beginWidget('CitiesWidget', array()); ?>
									
										<td style="text-align: center;"><?php $cities->get_country($value->country_id); ?></td>
										<td style="text-align: center;"><?php $cities->get_region($value->region_id); ?></td>
										<td style="text-align: center;"><?php $cities->get_city($value->city_id); ?></td>
									
									<?php $this->endWidget(); ?>  
									<td style="text-align: center;">
										<? if ($value->war_type != NULL) : ?>
											<?=CHtml::encode($value->war_type->lang->name); ?>
										<? else : ?>
											<span style="color: red;"><?=Yii::t('app', 'Тип не найден')?></span>
										<? endif; ?>                    
									</td>
									<td style="text-align: center;">
										<? if ($value->war_type->alias == WarWarehouseType::WHTypeSupplier) : ?>
											&nbsp;&nbsp;-&nbsp;&nbsp;-&nbsp;&nbsp;
										<? else : ?>
											<? if ($value->users != NULL) : ?>
												<?=CHtml::encode($value->users->lang->last_name); ?>&nbsp;<?=CHtml::encode($value->users->lang->first_name); ?>
											<? else : ?>
												<span style="color: red;"><?=Yii::t('app', 'Держатель склада не найден')?></span>
											<? endif; ?>
										<? endif; ?>
									</td>
									<td style="text-align: center;"><?=CHtml::encode($value->lang->adress); ?></td>
									<td style="text-align: center;"><?=MSmarty::date_format($value->created_at, 'd.m.Y')?></td>
									<td style="text-align: center;">
										<? if (Yii::app()->user->checkAccess('AdminWarehouseWarehouseView')) : ?>
											<?=CHtml::link('<i class="glyphicon glyphicon-eye-open"></i>', array('view', 'id' => $value->id),array('class' => 'btn blue-steel')); ?>
										<? endif; ?>
										
										<? if (Yii::app()->user->checkAccess('AdminWarehouseWarehouseUpdate')) : ?>
											<?=CHtml::link('<i class="glyphicon glyphicon-pencil"></i>', array('update', 'id' => $value->id), array('class' => 'btn green-seagreen')); ?>
										<? endif; ?>
										
										<? if (Yii::app()->user->checkAccess('AdminWarehouseWarehouseDelete')) : ?>
											<?=CHtml::link('<i class="glyphicon glyphicon-remove"></i>', '#', array('class' => 'warehouse-delete btn red', 'onClick' => 'warehouse_delete(' . $value->id . ')')); ?>
										<? endif; ?>
									</td>
								</tr>	
							<? endforeach;?>
						
						<? endif;?>	

					</tbody>

				</table>
			</div>
		</div>
	
</div>
<? if (Yii::app()->user->checkAccess('AdminWarehouseWarehouseCreate')) : ?>
    <p><?=CHtml::link(Yii::t('app', 'Создать новый склад'), array('create')); ?></p>
<? endif; ?>
<? if ((Yii::app()->user->checkAccess('AdminWarehouseWarehouseTypes')) && (Yii::app()->isModuleInstall('AdminTranslate'))) : ?>
    <p><?=CHtml::link(Yii::t('app', 'Названия типов складов'), array('types')); ?></p>
<? endif; ?>
<script type="text/javascript">
	function warehouse_delete(id){
		if (confirm(T("Вы действительно хотите удалить склад?"))) {
			location.replace(app.createAbsoluteUrl("admin/warehouse/warehouse/delete/id/"+id));
		} else {
			location.replace("#");
		}
	};
</script>
