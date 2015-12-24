<div class="portlet box grey">
	<div class="portlet-title">
		<h3 class="caption"><i class="fa fa-cogs mr10"></i> <?=Yii::t('app', 'Конфигурация регистрации')?></h3>
	</div>
	<div class="portlet-body form form-horizontal">
	<?=CHtml::beginForm(); ?>
		<div class="form-body">
		<? $i = true; ?>
		<? foreach($model_comfig as $item => $model) :?> 
			<? if ((in_array($model->name, array('end_url', 'register', 'mail', 'is_question'))) || (Yii::app()->user->username == Yii::app()->params['superAdminInfo']['username'])) : ?>
                <div class="form-group <?if($i):?>mt20<?endif;?>">
                    <div class="col-md-4 control-label" title="<?=CHtml::encode($model->description)?>" id="desc_<?=CHtml::encode($model->name)?>">
                        <?=CHtml::encode($model->title)?>:
                    </div>
                    <div class="col-md-8" id="value_<?=CHtml::encode($model->name)?>">
                        <? if (in_array($model->name, array('end_url', 'form_agree', 'question_step'))) : ?>
                            <?=CHtml::activeTextField($model, 'value', array('name'=>'form_config['. $model->id .']' , 'class' => 'form-control input-large')); ?>
                        <? else : ?>
                            <?=CHtml::activeCheckBox($model, 'value', array('name'=>'form_config['. $model->id .']' , 'class' => 'normal', 'id' => 'CheckBox_' . $model->name))?>
                        <? endif; ?>			
                    </div>
                </div>
                <? $i = false;?>
            <? endif; ?>
		<? endforeach; ?> 
		</div>
		<div class="form-actions">
			<?=CHtml::submitButton(Yii::t('app', 'Сохранить'), array ('class' => 'btn green', 'name' => 'btn_save')); ?>
			<a href="<?=$this->createUrl('admin/index')?>" class="btn red"><?=Yii::t('app', 'Отмена')?></a>
		</div>
	<?=CHtml::endForm(); ?>
	</div>
</div>
<? /*

<?=CHtml::beginForm(); ?>
	<? foreach($model_comfig as $item => $model) :?> 
        <? if ((in_array($model->name, array('end_url', 'register', 'mail', 'is_question'))) || (Yii::app()->user->username == Yii::app()->params['superAdminInfo']['username'])) : ?>
            <div style="float: left; width: 450px; margin-top: 3px;" title="<?=CHtml::encode($model->description)?>" id="desc_<?=CHtml::encode($model->name)?>">
                <?=CHtml::encode($model->title)?>:&nbsp;&nbsp;&nbsp;
            </div>
            <div style="width: 170px; display: inline-block;" id="value_<?=CHtml::encode($model->name)?>">
                <? if (in_array($model->name, array('end_url', 'form_agree', 'question_step'))) : ?>
                    <?=CHtml::activeTextField($model, 'value', array('name'=>'form_config['. $model->id .']' , 'class' => 'normal', 'style'=>'width:150px')); ?>
                <? else : ?>
                    <?=CHtml::activeCheckBox($model, 'value', array('name'=>'form_config['. $model->id .']' , 'class' => 'normal', 'id' => 'CheckBox_' . $model->name))?>
                <? endif; ?>			
            </div>
            <hr id="hr_<?=CHtml::encode($model->name)?>" />
        <? endif; ?>
	<? endforeach; ?> 
	<br />
	<?=CHtml::submitButton('Сохранить', array ('class' => 'btn150', 'name' => 'btn_save')); ?>
	
<?=CHtml::endForm(); ?> */ ?>