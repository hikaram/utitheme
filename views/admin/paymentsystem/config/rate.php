<div class="portlet box yellow">
    <div class="portlet-title">
        <h3 class="caption"><i class="fa fa-money"></i> <?=Yii::t('app', 'Курсы валют')?></h3>
    </div>
    <div class="portlet-body form form-horizontal">
        <div class="form-body">
            <div class="table-scrollable">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th><?=Yii::t('app', 'Дата')?></th>
                            <th><?=Yii::t('app', 'Валюта')?></th>
                            <th><?=Yii::t('app', 'Значение')?></th>
                        </tr>
                    </thead>
                    <tbody>
                    <? foreach($model_history as $model) :?>
                        <tr>
                            <td><?=$model['created_at']?></td>
                            <td><?=$model['currency_into']?></td>
                            <td><?=$model['rate']?></td>
                        </tr>
                    <? endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="form-actions">
            <a href="#newrate" data-toggle="modal" class="btn green"><?=Yii::t('app', 'Добавить значение')?></a>
        </div>
    </div>
</div>

<div id="newrate" class="modal fade" tabindex="-1" role="basic" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title"><?=Yii::t('app', 'Добавить новый курс')?></h4>
            </div>
            
            <?php $form=$this->beginWidget('CActiveForm', array('enableAjaxValidation'=>false)); ?>
            
                <div class="modal-body form form-horizontal">
                
                    <?php foreach ($model_list as $key => $model_new):?>
                
                    <? if($form->errorSummary($model_new) && $form->errorSummary($model_new) != "") : ?>
                        <?=$form->errorSummary($model_new, '<div class="mb5">' . Yii::t('app', 'При добавлении были допущены следующие ошибки:') . '</div>', '', array('class' => 'note note-danger')); ?>
                        <script>
                            $(document).ready(function(){
                                $('#newstep').modal('show')
                            })
                        </script>
                    <? endif; ?>
                    
                    <div class="form-body">
                        
                        <div class="form-group mt15">
                        
                            <label for="PaymentsSystemExchangeRate_0_rate" class="col-md-5 control-label required" style="margin-top: -8px;">
                        
                                <?=Yii::t('app', 'Курс валюты')?> <? if($model_new->finance_name_with) : ?><?=$model_new->finance_name_with->title?><? else : ?><?=$model_new->currency_width?><? endif; ?> <?=Yii::t('app', 'к валюте')?> 
                                            <? if($model_new->finance_name_into) : ?><?=$model_new->finance_name_into->title?><? else : ?><?=$model_new->currency_into?><? endif; ?>
                                            
                            </label>
                            <div class="col-md-7">
                                <?php echo $form->textField($model_new,'[' . $key . ']rate', array('class'=>'form-control date')); ?>
                            </div>
                        </div>                        

                    </div>
                    
                    <? endforeach; ?>
                    
                </div>
                <div class="modal-footer">
                    <?=CHtml::submitButton($model_new->isNewRecord ? Yii::t('app', 'Добавить') : Yii::t('app', 'Сохранить'), array('name' => 'btn_save', 'class' => 'btn green')); ?>
                    <?=CHtml::link(Yii::t('app', 'Отмена'), 'javascript: void(0)', array('data-dismiss' => 'modal', 'class' => 'btn red'))?>
                </div>
            
            <?php $this->endWidget(); ?>  
            
        </div>
    </div>
</div>




<? /*
<?php $this->breadcrumbs['Курсы валют'] = $this->createUrl('rate'); ?>

<?php $form=$this->beginWidget('CActiveForm', array('enableAjaxValidation'=>false)); ?>
    
    <?php foreach ($model_list as $key => $model):?>
    
    <p>Курс валюты <?php
    if($model->finance_name_with)
        {echo $model->finance_name_with->title;}
    else
        {echo $model->currency_width;}?>
    к валюте 
    <?php if($model->finance_name_into)
        {echo $model->finance_name_into->title;}
    else
        {echo $model->currency_into;}?>
    </p>
    <?php echo $form->textField($model,'[' . $key . ']rate', array('class'=>'date')); ?>
    <?php echo $form->error($model,'rate'); ?>
    <?php endforeach;?>
    <div style="clear: both;height: 30px;"></div>
    <?php echo CHtml::submitButton('Сохранить'); ?>	
	
<?php $this->endWidget(); ?>   
<table>
	<tr>
		<th><?=Yii::t('app','Дата')?></th>
		<th><?=Yii::t('app','Валюта')?></th>
		<th><?=Yii::t('app','Значение')?></th>
	</tr>
	<?foreach($model_history as $model) :?>  
		<tr>
			<td><?=$model['created_at']?></td>
			<td><?=$model['currency_into']?></td>
			<td><?=$model['rate']?></td>
		</tr>	   
	<?endforeach?>
</table>*/ ?>