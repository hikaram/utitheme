<?php $this->layout = 'office'; ?>
<link href="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>

<script>

$(function() {

	$( "#slider-range" ).slider({
		range: true,
		min: <?=(int)$min_sum?>,
		max: <?=(int)$max_sum?>,
		values: [
		<? if ($filtermodel->amount_to != NULL) : ?> <?=(int)$filtermodel->amount_to;?> <? else : ?> <?=(int)$min_sum?> <? endif; ?>,
		<? if ($filtermodel->amount_from != NULL) : ?> <?=(int)$filtermodel->amount_from;?> <? else : ?> <?=(int)$max_sum?> <? endif; ?> ],
		slide: function( event, ui )
	{
		$( "#amount_to" ).val(ui.values[ 0 ]);
		$( "#amount_from" ).val(ui.values[ 1 ]);
	}});

	if($( "#amount_to" ).val() == '')
	{
		$( "#amount_to" ).val(<?=(int)$min_sum?>);
	}
	if($( "#amount_from" ).val() == '')
	{
		$( "#amount_from" ).val(<?=(int)$max_sum?>);
	}

});
//
$(function(){
	function setDatepicker()
{

	$.datepicker.setDefaults($.extend($.datepicker.regional["ru"]));
	$("input.datepicker").datepicker({
		changeMonth:       true,
		changeYear:        true,
		yearRange:         '-1:+10',
		showOn: 			'button',
		buttonImage:		$('#asseturl').val() + '/img/icons/calendar.png',
		buttonImageOnly:	true
	});
}

function direction()
{
	var value = $('#direction').val();

	if(value == 'balans_in')
	{
		$('#table_balans_in').show();
		$('#table_balans_out').hide();
		$('#debit_object_alias').val('users');
		$('#credit_object_alias').val('');
	}
	if(value == 'balans_out')
	{
		$('#table_balans_out').show();
		$('#table_balans_in').hide();
		$('#credit_object_alias').val('users');
		$('#debit_object_alias').val('');
	}
	if(value == 'all')
	{
		$('#table_balans_out').hide();
		$('#table_balans_in').hide();
		$('[name="filter[debit_object_alias]"]').val('');
		$('[name="filter[credit_object_alias]"]').val('');
	}
}

function addStyle()
{
	var key = parseInt($(this).attr('aliasKey'));

	if ($(this).attr('checked'))
	{
		$('div#specaliasCheckBox-' + key).addClass('selectedAlias');
	}
	else
	{
		$('div#specaliasCheckBox-' + key).removeClass('selectedAlias');
	}
}

$(function(){

	// $("#content_filter_header").click(function(){
	// 	$("#content_filter").toggle(500);
	// });


	$('#direction').change(function(){
		direction();
	});

	direction();

	$('input.specaliasCheckBoxClass').each(addStyle);

	$('input.specaliasCheckBoxClass').bind('change', addStyle);

	setDatepicker();

	$('div#widgetWrapper').find('a').find('span.find').hide();

	$('#filterform').on('fuck', function(e){

		e.preventDefault();

		$('input[type="button"]').attr('disabled', 'disabled');

		$.ajax({
			url	: app.createAbsoluteUrl('admin/finance/Ajaxtransactions/saveFilter'),
			type : 'POST',
			error	: function ()
		{
			$('input[type="button"]').removeAttr('disabled');
			alert(T('Ошибка запроса'));
		},
		success	: function(data)
	{
		location.href = '/' + app.langUri + '/admin/finance/transactions/index/subsession/' + data.subsession;
	},
	data	    : $('form#filterform').serialize() + '&YII_CSRF_TOKEN='+app.csrfToken+'&alias=admin_finance_transactions',
	async		: false,
	cache		: false
});
});

})


})
</script>
<script>
$(function(){
	$('#content_filter_header').click(function(){
		if($(this).find('.tools i').hasClass('fa-angle-down')) {
			$(this).find('.tools i').removeClass('fa-angle-down').addClass('fa-angle-up');
			$('#content_filter').slideDown('slow');
		} else {
			$(this).find('.tools i').removeClass('fa-angle-up').addClass('fa-angle-down');
			$('#content_filter').slideUp('slow');
		}
	})
})
</script>

<!--Откроем понель фильтров если фильтр не пусты-->
<? if (!empty($filter)) : ?>
<script>
$(function(){
	$("#content_filter").toggle(500);
})
</script>
<? endif?>

<!--//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->

<div class="panel panel-default">
	<div class="panel-heading" id="content_filter_header" style="cursor: pointer;">
		<i class="fa fa-filter" style="margin-right: 5px;"></i> <?=Yii::t('app', 'Настройка фильтра')?>
		<div class="tools" style="float: right;">
			<i class="fa fa-angle-down"></i>
		</div>
	</div>
	<div class="panel-body form" style="display: none;"  id="content_filter">
		<?php $form = $this->beginWidget('CActiveForm', array(
			'enableAjaxValidation'=>false, 
			'method' => 'POST')
		); ?>
		<div class="form-body">

			<div class="row">
				<div class="col-md-6">
					<h4 class="form-section"> <?=Yii::t('app', 'Статус операции')?></h4>
					<div class="form-group" style="margin-left: 0; margin-right: 0;">
						<?=$form->checkBox($filtermodel,'closed', array('name'=>'filter[status][closed]', 'value'=>'closed')); ?>&nbsp;&nbsp;<?=Yii::t('app', 'Закрыта')?><br />
						<?=$form->checkBox($filtermodel,'open', array('name'=>'filter[status][open]', 'value'=>'open')); ?>&nbsp;&nbsp;<?=Yii::t('app', 'Открыта')?><br />
						<?=$form->checkBox($filtermodel,'decline', array('name'=>'filter[status][decline]', 'value'=>'decline')); ?>&nbsp;&nbsp;<?=Yii::t('app', 'Отклонена')?><br />
					</div>
				</div>
				<div class="col-md-6">
					<h4 class="form-section"><?=Yii::t('app', 'Направление операции')?></h4>
					<div class="form-group" style="margin-left: 0; margin-right: 0;">
						<?php echo $form->listBox($filtermodel, 'direction', array(
							'all' => Yii::t('app', 'Все'),
							'balans_in' => Yii::t('app', 'Кому'),
							'balans_out' => Yii::t('app', 'От кого')),
							array(
								'id' => 'direction',
								'class' => 'input-inline input-large form-control',
								'name' => 'filter[direction]',
								'style' => '',
								'size' => 0
							)); ?>
					</div>
					<div id="table_balans_in" class="filter_transaction" style="display: none;">
						<div class="fom-group">
							<?php echo $form->textField($filtermodel, 'debit_object_alias', array('class'=> 'form-control input-large', 'name'=>'filter[debit_object_alias]'))?>
							<span class="help-block"><?=Yii::t('app', 'ведите логин или название кампании')?></span>
						</div>
					</div>
					<div id="table_balans_out" class="filter_transaction" style="display: none;">
						<div>
							<?php echo $form->textField($filtermodel, 'credit_object_alias', array('class'=> 'form-control input-large', 'name'=>'filter[credit_object_alias]'))?>
							<span class="help-block"><?=Yii::t('app', 'ведите логин или название кампании')?></span>
						</div>
					</div>
				</div>
			</div>
			<h4 class="form-section"><?=Yii::t('app', 'Список операций')?></h4>
			<div class="row form-group">
				<?php foreach($filtermodel->transactions_specs_list as $key => $model) : ?>
					<div id="specaliasCheckBox-<?=$key?>" class="col-md-6">
						<?=$form->checkBox($model, 'is_checked', array('name' =>'filter[spec_alias_ch][' . $key . ']' . '[is_checked]', 'class' => 'specaliasCheckBoxClass', 'aliasKey' => $key))?>
						<?=CHtml::encode($model->title)?><br />
					</div>
				<? endforeach; ?>
			</div>
			<div class="row">
				<div class="col-md-6">
					<h4 class="form-section"><?=Yii::t('app', 'Сумма')?></h4>
					<div class="row" style="margin: 0 15px 0;">
						<div id="slider-range" class=""></div>
						<br/>
						<div class="form-group row">
							<label class="control-label col-md-3"><?=Yii::t('app', 'ОТ')?>:</label>
							<div class="col-md-9">
								<?php echo $form->textField($filtermodel, 'amount_to', array('id'=>'amount_to','name'=>'filter[amount][amount_to]', 'class' => 'input-inline form-control input-small'))?>
							</div>
						</div>
						<div class="form-group row">
							<label class="control-label col-md-3"><?=Yii::t('app', 'ДО')?>:</label>
							<div class="col-md-9">
								<?php echo $form->textField($filtermodel, 'amount_from', array('id'=>'amount_from','name'=>'filter[amount][amount_from]', 'class' => 'input-inline form-control input-small'))?>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<h4 class="form-section"><?=Yii::t('app', 'Дата')?></h4>
					<div class="row" style="margin: 0 15px 0;">
						<div class="form-group row">
							<label class="сontrol-label col-md-3"><?=Yii::t('app', 'ОТ')?>:</label>
							<div class="col-md-9">
								<div class="input-group input-large date date-picker" data-date-format="dd-mm-yyyy" >
									<?php echo $form->textField($filtermodel,'date_open', array('class'=>'form-control', 'name'=>'filter[date][date_open]', 'readonly' => 'readonly', 'style' => 'background: #fff;'))?>
									<span class="input-group-btn">
										<button class="btn default" onclick="return false;">
											<i class="fa fa-calendar"></i>
										</button>
									</span>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label class="сontrol-label col-md-3"><?=Yii::t('app', 'ДО')?>:</label>
							<div class="col-md-9">
								<div class="input-group input-large date date-picker" data-date-format="dd-mm-yyyy" >
									<?php echo $form->textField($filtermodel,'date_open', array('class'=>'form-control', 'name'=>'filter[date][date_closed]', 'readonly' => 'readonly', 'style' => 'background: #fff;'))?>
									<span class="input-group-btn">
										<button class="btn default" onclick="return false;">
											<i class="fa fa-calendar"></i>
										</button>
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="form-actions">
			<?=CHtml::submitButton(Yii::t('app', 'Применить'), array('name'=>'btn_filter', 'class' => 'btn green')); ?>
			<?=CHtml::submitButton(Yii::t('app', 'Сбросить'), array('name'=>'btn_cancel', 'class' => 'btn default')); ?>
		</div>
		<?php $this->endWidget(); ?>
	</div>
</div>