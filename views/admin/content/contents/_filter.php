<link href="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" id="locale"></script>
<?=CHtml::hiddenField(FALSE, Yii::app()->params['hostMetronikStatic'] . '/public/assets/global/plugins/bootstrap-datepicker/js/locales/bootstrap-datepicker.' . Yii::app()->language . '.js', array('id' => 'scriptSrc'))?>

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
						<h4 class="form-section"> <?=Yii::t('app', 'Имя блока')?></h4>
						<div class="form-group" style="margin-left: 0; margin-right: 0;">
							<?=CHtml::textField('name', array_key_exists('name', $filter) ? $filter['name'] : (string)FALSE, ['class' => 'form-control input-inline input-large'])?>
						</div>
					</div>
					<div class="col-md-6">
						<h4 class="form-section"> <?=Yii::t('app', 'Поиск по тексту в блоке')?></h4>
						<div class="form-group" style="margin-left: 0; margin-right: 0;">
							<?=CHtml::textField('text', array_key_exists('text', $filter) ? $filter['text'] : (string)FALSE, ['class' => 'form-control input-inline input-large'])?>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<h4 class="form-section"><?=Yii::t('app', 'Дата создания текстового блока')?></h4>
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
				<?php echo CHtml::button(Yii::t('app', 'Сбросить'), array('name'=>'btn_cancel', 'class' => 'btn red', 'onClick' => 'location.href="' . substr($this->createUrl('/admin/content/contents/index'), 0, strpos($this->createUrl('/admin/content/contents/index'), '/subsession/')) . '"')); ?>
			</div>
		<?php $this->endWidget(); ?>
	</div>
</div>
