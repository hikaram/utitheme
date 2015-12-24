<div class="portlet box yellow">
	<div class="portlet-title">
		<h3 class="caption"><?=Yii::t('app', 'Названия типов складов')?></h3>
	</div>
		<div class="portlet-body">
			<div class="table-scrollable">
				<table class="table table-hover" id="user">
					<tbody>
						<tr class="top-table" >
							<th class="name"><?=CHtml::encode(WarWarehouseType::model()->getAttributeLabel('id')); ?></th>
							<? foreach ($langs as $lang) : ?>
								<th class="name"><?=CHtml::encode($lang->lang->title); ?></th>
							<? endforeach?>
							<th class="action"><?=Yii::t('app', 'Действия')?></th>
						</tr>

						<? if(empty($types)) :?>
							<tr><td colspan="<?=count($langs) + 3?>"><?=Yii::t('app', 'Не найдено ни одного типа склада')?></td></tr>
						<? else : ?>      
							<?php $i = 1; ?>
							<? foreach($types as $type) :?>  
								<tr>
									<td style="padding-left: 15px; padding-right: 5px;"><?=$i++?></td>
									<? foreach($typesLang[$type->alias] as $typeLang) :?>
										<td style="padding-left: 15px; padding-right: 5px;">
											<? if ($typeLang != NULL) : ?>  
												<?=CHtml::encode($typeLang->name)?>
											<? else : ?>
												&nbsp;&nbsp;-&nbsp;&nbsp;-&nbsp;&nbsp;
											<? endif; ?>                                
										</td>
									<? endforeach; ?> 
									<td style="padding-left: 15px; padding-right: 5px;">
										<? if (Yii::app()->user->checkAccess('AdminWarehouseWarehouseEdit')) : ?>
											<?=CHtml::link(Yii::t('app', 'Редактировать'), $this->createUrl('edit', array('id' => sha1($type->id))))?>
										<? endif; ?>
									</td>                        
								</tr>
							<? endforeach; ?> 
						<? endif; ?>
					</tbody>
				</table>
			</div>
		</div>
</div>