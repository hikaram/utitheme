<div class="portlet box blue-steel h5">
	<div class="portlet-title">
		<h3 class="caption">
			<i class="glyphicon glyphicon-eye-open mr10"></i>
			<?=Yii::t('app', 'Просмотр лога')?>
		</h3>
	</div>
	<div class="portlet-body form form-horizontal">
		<div class="form-body">
            <hr />
            <div class="form-group">
                <div class="col-md-2 text-right"><?=Yii::t('app', 'Идентификатор')?>:</div>                    
                <div class="col-md-7">
                    <?=CHtml::encode($model->id)?>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-2 text-right"><?=Yii::t('app', 'Алиас платежной системы')?>:</div>                    
                <div class="col-md-7">
                    <?=CHtml::encode($model->pay_system_alias)?>
                </div>
            </div>            
            <div class="form-group">
                <div class="col-md-2 text-right"><?=Yii::t('app', 'Дата создания')?>:</div>                    
                <div class="col-md-7">
                    <?=MSmarty::date_format($model['created_at'], 'd.m.Y')?> <?=MSmarty::date_format($model['created_at'], '%H:%M:%S')?>
                </div>
            </div>              
            <div class="form-group">
                <div class="col-md-2 text-right"><?=Yii::t('app', 'Тип')?>:</div>                    
                <div class="col-md-7">
                    <?  if($model['type'] == TYPE_PAYMENTSYSTEM_OUT):?>
                            <?=Yii::t('app', 'Ушло')?>
                    <?  elseif($model['type'] == TYPE_PAYMENTSYSTEM_IN):?>
                            <?=Yii::t('app', 'Пришло')?>
                    <?  else:?>
                            <?=Yii::t('app', 'Направления нет ')?>
                    <?  endif;?> 
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-2 text-right"><?=Yii::t('app', 'Запрос')?>:</div>                    
                <div class="col-md-7">
                    <pre style="white-space:pre-wrap; font-size: 12px; color: #298dcd"> <?=CHtml::encode($model->request)?></pre>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-2 text-right"><?=Yii::t('app', 'Тип запроса')?>:</div>                    
                <div class="col-md-7">
                    <?=CHtml::encode($model->type_request)?>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-2 text-right">URL:</div>                    
                <div class="col-md-7">
                    <?=CHtml::encode($model->url)?>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-2 text-right"><?=Yii::t('app', 'Финансовая операция')?>:</div>
                <div class="col-md-7">
                    <? if ($model->transaction != NULL) : ?>
                        <?=CHtml::encode($model->transaction->spec->title)?>
                    <? endif; ?>                    
                </div>
            </div>    
            <div class="form-group">
                <div class="col-md-2 text-right"><?=Yii::t('app', 'Шаг')?>:</div>                    
                <div class="col-md-7">
                    <?=CHtml::encode($model->step_alias)?>
                </div>
            </div>
          
            <hr>
        </div>

            
		<div class="form-actions">
			<a href="javascript:void(0)" onClick="window.location = '<?=$this->createUrl('log/index')?>'" class="margin-top-20 btn default"><?=Yii::t('app', 'Назад')?></a>
		</div>
	</div>
</div>