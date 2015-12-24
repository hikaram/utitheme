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
					<div class="col-md-4">
						<h4 class="form-section"> <?=$user->getAttributeLabel('username')?></h4>
						<div class="form-group" style="margin-left: 0; margin-right: 0;">
							<?=Chtml::textField('filter[username]', array_key_exists('username', $filter) ? $filter['username'] : '', array('class' => 'form-control input-inline input-large'));?>
						</div>
					</div>
					<div class="col-md-4">
						<h4 class="form-section"> <?=$user->getAttributeLabel('email')?></h4>
						<div class="form-group" style="margin-left: 0; margin-right: 0;">
							<?=Chtml::textField('filter[email]', array_key_exists('email', $filter) ? $filter['email'] : '', array('class' => 'form-control input-inline input-large'));?>
						</div>
					</div>
					<div class="col-md-4">
						<h4 class="form-section"> <?=Yii::t('app', 'Логин спонсора')?></h4>
						<div class="form-group" style="margin-left: 0; margin-right: 0;">
							<?=Chtml::textField('filter[sponsor_username]', array_key_exists('sponsor_username', $filter) ? $filter['sponsor_username'] : '', array('class' => 'form-control input-inline input-large'));?>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<h4 class="form-section"> <?=$profileLang->getAttributeLabel('last_name')?></h4>
						<div class="form-group" style="margin-left: 0; margin-right: 0;">
							<?=Chtml::textField('filter[last_name]', array_key_exists('last_name', $filter) ? $filter['last_name'] : '', array('class' => 'form-control input-inline input-large'));?>
						</div>
					</div>
					<div class="col-md-4">
						<h4 class="form-section"> <?=$profileLang->getAttributeLabel('first_name')?></h4>
						<div class="form-group" style="margin-left: 0; margin-right: 0;">
							<?=Chtml::textField('filter[first_name]', array_key_exists('first_name', $filter) ? $filter['first_name'] : '', array('class' => 'form-control input-inline input-large'));?>
						</div>
					</div>
					<div class="col-md-4">
						<h4 class="form-section"> <?=$profileLang->getAttributeLabel('second_name')?></h4>
						<div class="form-group" style="margin-left: 0; margin-right: 0;">
							<?=Chtml::textField('filter[second_name]', array_key_exists('second_name', $filter) ? $filter['second_name'] : '', array('class' => 'form-control input-inline input-large'));?>
						</div>
					</div>
				</div>				
				<div class="row">
					<div class="col-md-12">
						<h4 class="form-section"><?=Yii::t('app', 'Дата регистрации')?></h4>
						<div class="row" style="margin: 0 15px 0;">
							<div class="form-group">
								<label class="сontrol-label col-md-3"><?=Yii::t('app', 'ОТ')?>:</label>
								<div class="col-md-9">
									<div class="input-group input-large">
										<?=CHtml::textField('filter[created_at_from]', array_key_exists('created_at_from', $filter) ? $filter['created_at_from'] : (string)FALSE, array('class' => 'form-control storedatepicker', 'readonly' => 'readonly', 'data-date-format' => 'dd.mm.yyyy'))?>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="сontrol-label col-md-3"><?=Yii::t('app', 'ДО')?>:</label>
								<div class="col-md-9">
									<div class="input-group input-large">
										<?=CHtml::textField('filter[created_at_to]', array_key_exists('created_at_to', $filter) ? $filter['created_at_to'] : (string)FALSE, array('class' => 'form-control storedatepicker', 'readonly' => 'readonly', 'data-date-format' => 'dd.mm.yyyy'))?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>				
				
			</div>				

			<div class="form-actions">
				<?php echo CHtml::button(Yii::t('app', 'Применить'), array('name'=>'btn_filter', 'class' => 'btn green')); ?>
				<?php echo CHtml::button(Yii::t('app', 'Сбросить'), array('name'=>'btn_cancel', 'class' => 'btn red', 'onClick' => 'location.href="' . $url . '"')); ?>
			</div>
		<?php $this->endWidget(); ?>
	</div>
</div>


<? /*
<div class="panel panel-default filter">
	<div class="panel-heading pointer">
		<i class="fa fa-filter" style="margin-right: 5px;"></i> <?=Yii::t('app', 'Настройка фильтра	')?>	
		<div class="tools" style="float: right;">
			<i class="fa fa-angle-down toggler"></i>
		</div>
	</div>
	<div class="panel-body form form-horizontal none">
		<?=CHtml::beginForm()?>
			<div class="form-body">
				<div class="form-group mt20">
					<div class="col-md-3 control-label">
						<label><?=$user->getAttributeLabel('username')?></label>
					</div>
					<div class="col-md-9">
						<?=Chtml::textField('filter[username]', array_key_exists('username', $filter) ? $filter['username'] : '', array('class' => 'form-control input-large'));?>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-3 control-label">
						<label><?=$profileLang->getAttributeLabel('last_name')?></label>
					</div>
					<div class="col-md-9">
						<?=Chtml::textField('filter[last_name]', array_key_exists('last_name', $filter) ? $filter['last_name'] : '', array('class' => 'form-control input-large'));?>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-3 control-label">
						<label><?=$profileLang->getAttributeLabel('second_name')?></label>
					</div>
					<div class="col-md-9">
						<?=Chtml::textField('filter[second_name]', array_key_exists('second_name', $filter) ? $filter['second_name'] : '', array('class' => 'form-control input-large'));?>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-3 control-label">
						<label><?=$profileLang->getAttributeLabel('email')?></label>
					</div>
					<div class="col-md-9">
						<?=Chtml::textField('filter[email]', array_key_exists('email', $filter) ? $filter['email'] : '', array('class' => 'form-control input-large'));?>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-3 control-label">
						<label><?=Yii::t('app', 'Логин спонсора')?></label>
					</div>
					<div class="col-md-9">
						<?=Chtml::textField('filter[sponsor_username]', array_key_exists('sponsor_username', $filter) ? $filter['sponsor_username'] : '', array('class' => 'form-control input-large'));?>
					</div>
				</div>
			</div>
			<div class="form-actions">
				<?=Chtml::button(Yii::t('app', 'Найти'), array('name' => 'btn_filter', 'class' => 'btn green'));?>
				<a href="javascript: void(0)" onClick="location.href='<?=$url?>'" class="btn red"><?=Yii::t('app', 'Сбросить фильтр')?></a>
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
*/ ?>