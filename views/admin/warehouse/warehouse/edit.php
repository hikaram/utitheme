<?=CHtml::beginForm() ?>
<div class="portlet green box">
	<div class="portlet-title">
		<h3 class="caption">
			<i class="glyphicon glyphicon-pencil" style="margin-right: 10px;"></i> 
				<?=Yii::t('app', 'Редактирование типа склада')?>
		</h3>
	</div>
	<div class="portlet-body form form-horizontal">
		<div class="form-body">
    
			 <? foreach ($typesLang as $typeLang) : ?>
					<div class="form-group"> 
						<?=$langs[$typeLang->lang] ?>
						<div class="col-md-2">
							<div class="input-inline input-medium">
								<?=CHtml::activeTextField($typeLang, 'name', array('class' => 'form-control', 'name' => 'WarWarehouseTypeLang[name][' . $typeLang->lang . ']')); ?>
							</div>
						
							<?=CHtml::error($typeLang, 'name')?>
						</div>
					</div>
				<? endforeach; ?>
    
		</div>
	
	<?php echo CHtml::submitButton(Yii::t('app','Сохранить'), array('class' => 'btn green','name' => 'btn_save')); ?>
	<?php echo CHtml::button(Yii::t('app','Отмена'), array('class' => 'btn default', 'onclick' => 'window.location = app.createAbsoluteUrl("admin/warehouse/warehouse/types")')); ?>
           
    <? if (Yii::app()->user->checkAccess('AdminWarehouseWarehouseTypes')) : ?>
        <?=CHtml::link(Yii::t('app', 'К списку типов складов'), $this->createUrl('types'), array('style' => 'position: relative; left: 40px; top: 7px;', 'name' => 'btn_save'))?>
    <? endif; ?>
	</div>
</div>
<?=CHtml::endForm(); ?>