<link href="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" id="locale"></script>
<?=Chtml::hiddenField(FALSE, Yii::app()->params['hostMetronikStatic'] . '/public/assets/global/plugins/bootstrap-datepicker/js/locales/bootstrap-datepicker.' . Yii::app()->language . '.js', array('id' => 'scriptSrc'))?>


<script>

	$(function() {

		$('div#widgetWrapper').find('a').hide();

		$( "#slider-range" ).slider({
			range: true,
			min: <?=(int)$min_sum?>,
			max: <?=(int)$max_sum?>,
			values: [ 
				<? if ((array_key_exists('filtertotal_priceot', $filter)) && ($filter['filtertotal_priceot'] != NULL)) : ?> <?=(int)$filter['filtertotal_priceot']?> <? else : ?> <?=(int)$min_sum?> <? endif; ?>, 
				<? if ((array_key_exists('filtertotal_pricedo', $filter)) && ($filter['filtertotal_pricedo'] != NULL)) : ?> <?=(int)$filter['filtertotal_pricedo']?> <? else : ?> <?=(int)$max_sum?> <? endif; ?> ],
			slide: function( event, ui ) 
			{
				$( "#amount_from" ).val(ui.values[ 0 ]); 
				$( "#amount_to" ).val(ui.values[ 1 ]);
				
			}});
		
		if($( "#amount_to" ).val() == '')
		{
			$( "#amount_to" ).val(<?=(int)$max_sum?>);
		}
		if($( "#amount_from" ).val() == '')
		{
			$( "#amount_from" ).val(<?=(int)$min_sum?>);
		}
			
	});

</script>

<!--Откроем понель фильтров если фильтр не пусты-->
<? if (!empty($filter)) : ?>
	<script>
		$(function(){
			$("#content_filter").show();
		})
	</script>
<? endif?>
<script>
	$(function(){
		$('#content_filter_header').click(function(){

			if($(this).find('.tools i').hasClass('fa-angle-down')) {
				$(this).find('.tools i').removeClass('fa-angle-down').addClass('fa-angle-up')
			} else {
				$(this).find('.tools i').removeClass('fa-angle-up').addClass('fa-angle-down')
			}
		})
	})
</script>
<!--//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->

<div class="panel panel-default">
	<div class="panel-heading" id="content_filter_header" style="cursor: pointer;">
		<i class="fa fa-filter" style="margin-right: 5px;"></i> <?=Yii::t('app', 'Настройка фильтра')?>
		<div class="tools" style="float: right;">
			<i class="fa fa-angle-down"></i>
		</div>
	</div>
	<div class="panel-body form" style="display: none;" id="content_filter">

		<? if ((Yii::app()->isModuleInstall('AdminUser')) && (Yii::app()->isPackageInstall('Alphabet')) && (Yii::app()->isPackageInstall('AjaxPagination'))) : ?>
		    <div id="widgetWrapperForm" style="display: inline-block; width: 39px; vertical-align: middle; margin-left: -8px;">
		    	<?php $this->widget('application.modules.admin.modules.user.widgets.UserSearchWidget', array('input_login'=>'filterusername'))->userSearch(); ?>
	    	</div>
		<? endif; ?>

		<?php $form = $this->beginWidget('CActiveForm', array(
			'enableAjaxValidation'  => false, 
			'method'                => 'POST', 
			'action'                => $this->createUrl('index'),
			'htmlOptions'           => array('id' => 'filterform', 'class' => 'form-horizontal')
		)); ?>
		
			<?=Chtml::hiddenField(FALSE, $sessionGuid, ['id' => 'sessionGuid']) ?>

			<div class="form-body">

				<div class="row">
					<div class="col-md-12">
						<h4 class="form-section"> <?=Yii::t('app', 'Номер заказа')?></h4>
						<div class="form-group" style="margin-left: 0; margin-right: 0;">
							<?=CHtml::textField('filternumber', array_key_exists('filternumber', $filter) ? $filter['filternumber'] : (string)FALSE, ['class' => 'form-control input-inline input-large'])?>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<h4 class="form-section"> <?=Yii::t('app', 'Заказы гостей')?></h4>
						<div class="form-group" style="margin-left: 0; margin-right: 0;">
							<?=CHtml::dropDownList('filteris_unregistered_customer', array_key_exists('filteris_unregistered_customer', $filter) ? $filter['filteris_unregistered_customer'] : (string)FALSE, Horders::gridIsUnregisteredItems(TRUE), ['class' => 'input-inline input-large form-control', 'onChange' => 'editUserBlock()'])?>
							<?=CHtml::hiddenField(FALSE, Horders::IS_UNREGISTERED_USER, ['id' => 'isGuest'])?>
						</div>
					</div>
					<div class="col-md-6" id="userBlock">
						<h4 class="form-section"><?=Yii::t('app', 'Пользователь')?></h4>
						<div class="form-group" style="margin-left: 0; margin-right: 0;">
							<label class="control-label"><?=Yii::t('app', 'Введите логин пользователя')?></label>
							<?=CHtml::textField('filterusername', array_key_exists('filterusername', $filter) ? $filter['filterusername'] : (string)FALSE, ['class' => 'form-control input-inline input-large'])?>
							<?=CHtml::hiddenField('showByUsername', array_key_exists('showByUsername', $filter) ? $filter['showByUsername'] : (string)FALSE, ['id' => 'showByUsername'])?>
							<? if (Yii::app()->isModuleInstall('AdminUser')) : ?>
								<div style="display: inline-block; width: 39px; vertical-align: middle; margin-left: -8px;">
									<a href="javascript:void(0)" style="height: 34px;" class="btn grey input-group-addon" data-toggle="modal" data-target="#userSearch"  onClick="show_table('users', null, null, null, 0)">
									    <i class="fa fa-user"></i>
									</a>								
								</div>
				            <? endif; ?>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<h4 class="form-section"> <?=Yii::t('app', 'Статус заказа')?></h4>
						<div class="form-group" style="margin-left: 0; margin-right: 0;">
							<?=CHtml::dropDownList('filterstatus', array_key_exists('filterstatus', $filter) ? $filter['filterstatus'] : (string)FALSE, Horders::gridStatusItems(TRUE), ['class' => 'input-inline input-large form-control'])?>
						</div>
					</div>
					<div class="col-md-6">
						<h4 class="form-section"> <?=Yii::t('app', 'Оплата заказа')?></h4>
						<div class="form-group" style="margin-left: 0; margin-right: 0;">
							<?=CHtml::dropDownList('filteris_payed', array_key_exists('filteris_payed', $filter) ? $filter['filteris_payed'] : (string)FALSE, Horders::gridIsPayedItems(TRUE), ['class' => 'input-inline input-large form-control'])?>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<h4 class="form-section"><?=Yii::t('app', 'Сумма')?></h4>
						<div class="form-group" style="margin-left: 0; margin-right: 0;">
							<div id="slider-range" class=""></div>
							<br/>
							<div class="form-group">
								<label class="control-label col-md-3"><?=Yii::t('app', 'ОТ')?>:</label>
								<div class="col-md-9">
									<?=CHtml::textField('filtertotal_priceot', array_key_exists('filtertotal_priceot', $filter) ? $filter['filtertotal_priceot'] : (string)FALSE, ['id' => 'amount_from', 'class' => 'form-control input-inline input-small'])?>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"><?=Yii::t('app', 'ДО')?>:</label>
								<div class="col-md-9">
									<?=CHtml::textField('filtertotal_pricedo', array_key_exists('filtertotal_pricedo', $filter) ? $filter['filtertotal_pricedo'] : (string)FALSE, ['id' => 'amount_to', 'class' => 'form-control input-inline input-small'])?>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<h4 class="form-section"><?=Yii::t('app', 'Дата совершения заказа')?></h4>
						<div class="row" style="margin: 0 15px 0;">
							<div class="form-group">
								<label class="сontrol-label col-md-3"><?=Yii::t('app', 'ОТ')?>:</label>
								<div class="col-md-9">
									<div class="input-group input-large">
										<?=CHtml::textField('filtercreated_atot', array_key_exists('filtercreated_atot', $filter) ? $filter['filtercreated_atot'] : (string)FALSE, array('class' => 'form-control storedatepicker', 'readonly' => 'readonly', 'data-date-format' => 'dd.mm.yyyy'))?>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="сontrol-label col-md-3"><?=Yii::t('app', 'ДО')?>:</label>
								<div class="col-md-9">
									<div class="input-group input-large">
										<?=CHtml::textField('filtercreated_atdo', array_key_exists('filtercreated_atdo', $filter) ? $filter['filtercreated_atdo'] : (string)FALSE, array('class' => 'form-control storedatepicker', 'readonly' => 'readonly', 'data-date-format' => 'dd.mm.yyyy'))?>
									</div>
								</div>
							</div>
						</div>						
					</div>
				</div>				
			</div>
			<div class="form-actions">
				<?php echo CHtml::submitButton(Yii::t('app', 'Применить'), array('name'=>'btn_filter', 'class' => 'btn green')); ?>
				<?php echo CHtml::button(Yii::t('app', 'Сбросить'), array('name'=>'btn_cancel', 'class' => 'btn red', 'onClick' => 'location.href="' . substr($this->createUrl('/admin/store/orders/index'), 0, strpos($this->createUrl('/admin/store/orders/index'), '/subsession/')) . '"')); ?>
			</div>
		<?php $this->endWidget(); ?>
	</div>
</div>
<script>
	
</script>
