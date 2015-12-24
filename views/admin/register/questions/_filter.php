<div class="panel panel-default filter">
	<div class="panel-heading pointer">
		<i class="fa fa-filter" style="margin-right: 5px;"></i> <?=Yii::t('app', 'Настройка фильтра')?>		
		<div class="tools" style="float: right;">
			<i class="fa fa-angle-down toggler"></i>
		</div>
	</div>
	<div class="panel-body form form-horizontal none">
        <?=CHtml::hiddenField(FALSE, $model->id, array('id' => 'questionId'))?>
		<?=CHtml::beginForm(NULL, 'POST', array('id' => 'filterform'))?>
			<div class="form-body">
				<div class="form-group mt20">
					<div class="col-md-3 control-label">
						<label><?=Users::model()->getAttributeLabel('username')?></label>
					</div>
					<div class="col-md-9">
						<?=Chtml::textField('filter[username]', array_key_exists('username', $filter) ? $filter['username'] : '', array('class' => 'form-control input-large'));?>
					</div>
				</div>
			</div>
			<div class="form-actions">
				<?=Chtml::submitButton(Yii::t('app', 'Найти'), array('name' => 'btn_filter', 'class' => 'btn green'));?>
				<a href="javascript: void(0)" onClick="location.href=app.createAbsoluteUrl('admin/register/questions/view/id/<?=$model->id?>')" class="btn red"><?=Yii::t('app', 'Сбросить фильтр')?></a>
			</div>
		<?=CHtml::endForm()?>
	</div>
</div>
<? if(!empty($filter)) : ?>
<script>
	$('.filter .panel-body').removeClass('none');
	$('.filter .panel-heading .tools .toggler').removeClass('fa-angle-down').addClass('fa-angle-up')
</script>
<? endif; ?>
<script>
	$('.filter .panel-heading').click(function(){
		panel = $(this).closest('.filter');
		if(panel.find('.tools').find('.toggler').hasClass('fa-angle-up')) {
			panel.find('.panel-body').slideUp('slow');
			panel.find('.tools').find('.toggler').removeClass('fa-angle-up').addClass('fa-angle-down')
		} else {
			panel.find('.panel-body').slideDown('slow');
			panel.find('.tools').find('.toggler').removeClass('fa-angle-down').addClass('fa-angle-up')
		}
	})
</script>