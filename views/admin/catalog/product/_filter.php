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
				<? if ((array_key_exists('price_from', $filter)) && ($filter['price_from'] != NULL)) : ?> <?=(int)$filter['price_from']?> <? else : ?> <?=(int)$min_sum?> <? endif; ?>, 
				<? if ((array_key_exists('price_to', $filter)) && ($filter['price_to'] != NULL)) : ?> <?=(int)$filter['price_to']?> <? else : ?> <?=(int)$max_sum?> <? endif; ?> ],
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

		<?php $form = $this->beginWidget('CActiveForm', array(
			'enableAjaxValidation'  => false, 
			'method'                => 'POST', 
			'action'                => $this->createUrl('index'),
			'htmlOptions'           => array('id' => 'filterform', 'class' => 'form-horizontal')
		)); ?>
		
			<div class="form-body">

				<div class="row">
					<div class="col-md-6">
						<h4 class="form-section"> <?=Yii::t('app', 'Наименование товара')?></h4>
						<div class="form-group" style="margin-left: 0; margin-right: 0;">
							<?=CHtml::textField('name', array_key_exists('name', $filter) ? $filter['name'] : (string)FALSE, ['class' => 'form-control input-inline input-large'])?>
						</div>
					</div>
					<div class="col-md-6">
						<h4 class="form-section"> <?=Yii::t('app', 'Артикул')?></h4>
						<div class="form-group" style="margin-left: 0; margin-right: 0;">
							<?=CHtml::textField('article', array_key_exists('article', $filter) ? $filter['article'] : (string)FALSE, ['class' => 'form-control input-inline input-large'])?>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<h4 class="form-section"><?=Yii::t('app', 'Цена')?></h4>
						<div class="form-group" style="margin-left: 0; margin-right: 0;">
							<div id="slider-range" class=""></div>
							<br/>
							<div class="form-group">
								<label class="control-label col-md-3"><?=Yii::t('app', 'ОТ')?>:</label>
								<div class="col-md-9">
									<?=CHtml::textField('price_from', array_key_exists('price_from', $filter) ? $filter['price_from'] : (string)FALSE, ['id' => 'amount_from', 'class' => 'form-control input-inline input-small'])?>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"><?=Yii::t('app', 'ДО')?>:</label>
								<div class="col-md-9">
									<?=CHtml::textField('price_to', array_key_exists('price_to', $filter) ? $filter['price_to'] : (string)FALSE, ['id' => 'amount_to', 'class' => 'form-control input-inline input-small'])?>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<h4 class="form-section"><?=Yii::t('app', 'Валюта')?></h4>
						<div class="form-group" style="margin-left: 0; margin-right: 0;">
							<?=CHtml::dropDownList('currency__id', array_key_exists('currency__id', $filter) ? $filter['currency__id'] : (string)FALSE, Products::gridCurrencyItems(TRUE), ['class' => 'input-inline input-large form-control'])?>
						</div>					
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<h4 class="form-section"> <?=Yii::t('app', 'Статус')?></h4>
						<div class="form-group" style="margin-left: 0; margin-right: 0;">
							<?=CHtml::dropDownList('status', array_key_exists('status', $filter) ? $filter['status'] : (string)FALSE, Products::gridStatusItems(TRUE), ['class' => 'input-inline input-large form-control'])?>
						</div>
					</div>
					<? if (!empty($specialStatuses)) : ?>
						<div class="col-md-6">
							<h4 class="form-section"> <?=Yii::t('app', 'Особый статус')?></h4>
							<div class="form-group" style="margin-left: 0; margin-right: 0;">
								<?=CHtml::dropDownList('product_special_statuses__id', array_key_exists('product_special_statuses__id', $filter) ? $filter['product_special_statuses__id'] : (string)FALSE, ProductSpecialStatuses::getListForSelector(), ['class' => 'input-inline input-large form-control'])?>
							</div>
						</div>		
					<? endif; ?>				
				</div>

				<div class="row">
					<div class="col-md-6">
						<h4 class="form-section"><?=Yii::t('app', 'Наличие')?></h4>
						<div class="form-group" style="margin-left: 0; margin-right: 0;">
							<?=CHtml::dropDownList('available', array_key_exists('available', $filter) ? $filter['available'] : (string)FALSE, Products::gridAvailableItems(TRUE), ['class' => 'input-inline input-large form-control'])?>
						</div>					
					</div>
					<div class="col-md-6">
						<h4 class="form-section"><?=Yii::t('app', 'Дата создания продукта')?></h4>
						<div class="row" style="margin: 0 15px 0;">
							<div class="form-group">
								<label class="сontrol-label col-md-3"><?=Yii::t('app', 'ОТ')?>:</label>
								<div class="col-md-9">
									<div class="input-group input-large">
										<?=CHtml::textField('created_at_from', array_key_exists('created_at_from', $filter) ? $filter['created_at_from'] : (string)FALSE, array('class' => 'form-control storedatepicker', 'readonly' => 'readonly', 'data-date-format' => 'dd.mm.yyyy'))?>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="сontrol-label col-md-3"><?=Yii::t('app', 'ДО')?>:</label>
								<div class="col-md-9">
									<div class="input-group input-large">
										<?=CHtml::textField('created_at_to', array_key_exists('created_at_to', $filter) ? $filter['created_at_to'] : (string)FALSE, array('class' => 'form-control storedatepicker', 'readonly' => 'readonly', 'data-date-format' => 'dd.mm.yyyy'))?>
									</div>
								</div>
							</div>
						</div>						
					</div>
				</div>				
			</div>				

			<div class="form-actions">
				<?php echo CHtml::submitButton(Yii::t('app', 'Применить'), array('name'=>'btn_filter', 'class' => 'btn green')); ?>
				<?php echo CHtml::button(Yii::t('app', 'Сбросить'), array('name'=>'btn_cancel', 'class' => 'btn red', 'onClick' => 'location.href="' . substr($this->createUrl('/admin/catalog/product/index'), 0, strpos($this->createUrl('/admin/catalog/product/index'), '/subsession/')) . '"')); ?>
			</div>
		<?php $this->endWidget(); ?>
	</div>
</div>
