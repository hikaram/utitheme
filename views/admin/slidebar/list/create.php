<?=CHtml::beginForm() ?>
<div class="portlet green box">
	<div class="portlet-title">
		<div class="caption">
			<i class="glyphicon glyphicon-pencil"></i> <?=Yii::t('app', 'Настройки слайд-бара')?>
		</div>
	</div>
	<div class="portlet-body form form-horizontal">
		<div class="form-body">
			<div class="mt20"></div>
		<? if ((bool)$settings->allowed_multiple_slidebars) : ?>
            <div class="form-group">
                <?=CHtml::activeLabelEx($modelLang, 'name', array('class' => 'col-md-3 control-label')); ?>
                <div class="col-md-9">
					<?=CHtml::activeTextField($modelLang, 'name', array('class' => 'form-control input-large')); ?>
                </div>
            </div>        
        <? endif; ?>
		<? if ((bool)$settings->allowed_multiple_slidebars && Yii::app()->user->username==Yii::app()->params['superAdminInfo']['username']) : ?>
            <div class="form-group">
                <?=CHtml::activeLabelEx($model, 'alias', array('class' => 'col-md-3 control-label')); ?>
                <div class="col-md-9">
					<?=CHtml::activeTextField($model, 'alias', array('class' => 'form-control input-large')); ?>
                </div>
            </div>        
        <? endif; ?>
		<? if ((bool)$settings->allowed_change_animation) : ?>
            <div class="form-group">
                <?=CHtml::activeLabelEx($model,'slidebar_animation_types__id', array('class' => 'control-label col-md-3')); ?>
				<div class="col-md-9">
					<?=CHtml::activeListBox($model, 'slidebar_animation_types__id', SlidebarAnimationTypes::getTypes(), array('class' => 'form-control input-large', 'size' => (int)TRUE, 'style' => 'width: 300px;')); ?>
					
					<div class="note note-info input-large mt15" id="animation_desc"></div>
                    <? foreach (SlidebarAnimationTypes::getDescriptions() as $id => $desc) : ?>
                        <div style="display: none;" id="desc_<?=$id?>"><?=CHtml::encode($desc)?></div>
                    <? endforeach; ?>
				</div>
			</div>
        <? endif; ?>
		<div class="form-group">
			<?=CHtml::activeLabelEx($model,'delay_time', array('class' => 'col-md-3 control-label')); ?>
            <div class="col-md-9">
                <div class="slider ml0 bg-purple input-large mb15"></div>
                <?=CHtml::activeTextField($model, 'delay_time', array('class' => 'form-control input-large', 'readonly' => 'readonly')); ?>
            </div>
        </div>
		</div>
		<div class="form-actions">
			<?=CHtml::submitButton($model->isNewRecord ? Yii::t('app', 'Сохранить') : Yii::t('app', 'Изменить'), array ('class' => 'btn green', 'name' => 'btn_send')); ?>
			<? if (!$model->isNewRecord) : ?>
				<?=CHtml::link(Yii::t('app', 'Отмена'), $this->createUrl('index'), array('class' => 'btn red'))?>
			<? endif; ?>
		</div>
	</div>
</div>
<?=CHtml::endForm(); ?>

<script>
    $(function(){
        $('.slider').slider({
			isRTL: Metronic.isRTL(),
            range: "min",
            animate:    true,
            value:      <?=$model->delay_time?>,
            min:        <?=Slidebars::MinDelayTime?>,
            max:        <?=Slidebars::MaxDelayTime?>,
            step:       <?=Slidebars::StepDelayTime?>,
     
            slide: function(event, ui) {
                $('#Slidebars_delay_time').attr('value', ui.value);
            }
     
         });
    });
</script>