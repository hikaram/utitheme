<link href="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>

<script>

	$(function() {

		$('div#widgetWrapper').find('a').hide();

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
	<div class="panel-body form" style="display: none;"  id="content_filter">

		<? if ((Yii::app()->isModuleInstall('AdminUser')) && (Yii::app()->isPackageInstall('Alphabet')) && (Yii::app()->isPackageInstall('AjaxPagination'))) : ?>
		    <div id="widgetWrapper" style="display: inline-block; width: 39px; vertical-align: middle; margin-left: -8px;"><?php $this->widget('application.modules.admin.modules.user.widgets.UserSearchWidget', array('input_login'=>'filter_username'))->userSearch(); ?></div>
		<? endif; ?>

		<?php $form = $this->beginWidget('CActiveForm', array(
			'enableAjaxValidation'  => false, 
			'method'                => 'POST', 
			'action'                => $this->createUrl('index'),
			'htmlOptions'           => array('id' => 'filterform', 'class' => 'form-horizontal')
		)); ?>
			<div class="form-body">
				<h4 class="form-section"><?=Yii::t('app', 'Пользователь')?></h4>
				<div class="form-group" style="margin-left: 0; margin-right: 0;">
					<label class="control-label"><?=Yii::t('app', 'Введите логин пользователя')?></label>
					<?=$form->textField($filtermodel, 'username', array('name'=>'filter[username]', 'class' => 'form-control input-inline input-large'))?>
					
						<?# if (Yii::app()->isModuleInstall('AdminUser')) : ?>
							<?#=CHtml::link('<span class="btn default" data-toggle="modal" data-target="#userSearch" onClick="show_table(users, null, null, null, $key)"><i class="fa fa-search"></i></span>', 'javascript:void(0)', array('onClick'=> 'show_table("users", null, null, null, 0)'))?>
						<? #endif; ?>

						<? if (Yii::app()->isModuleInstall('AdminUser')) : ?>
							<div style="display: inline-block; width: 39px; vertical-align: middle; margin-left: -8px;">
								<a href="javascript:void(0)" style="height: 34px;" class="btn grey input-group-addon" data-toggle="modal" data-target="#userSearch"  onClick="show_table('users', null, null, null, 0)">
								    <i class="fa fa-user"></i>
								</a>								
							</div>
			            <? endif; ?>

						<? /* if (Yii::app()->isModuleInstall('AdminUser')) : ?>
							<div id="widgetWrapper" style="display: inline-block; width: 39px; vertical-align: middle; margin-left: -8px;"><?php $this->widget('application.modules.admin.modules.user.widgets.UserSearchWidget', array('input_login'=>'filter_username'))->userSearch(); ?></div>
						<? endif; */ ?>
					
					<span class="help-block"><?=$form->error($filtermodel, 'username')?></span>
				</div>
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
				<div class="form-group">
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
							<div class="form-group">
								<label class="control-label col-md-3"><?=Yii::t('app', 'ОТ')?>:</label>
								<div class="col-md-9">
									<?php echo $form->textField($filtermodel, 'amount_to', array('id'=>'amount_to','name'=>'filter[amount][amount_to]', 'class' => 'input-inline form-control input-small'))?>
								</div>
							</div>
							<div class="form-group">
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
							<div class="form-group">
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
							<div class="form-group">
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
				<?php echo CHtml::submitButton(Yii::t('app', 'Применить'), array('name'=>'btn_filter', 'class' => 'btn green')); ?>
				<?php echo CHtml::button(Yii::t('app', 'Сбросить'), array('name'=>'btn_cancel', 'class' => 'btn red', 'onClick' => 'location.href="' . substr($this->createUrl('/admin/finance/transactions/index'), 0, strpos($this->createUrl('/admin/finance/transactions/index'), '/subsession/')) . '"')); ?>
			</div>
		<?php $this->endWidget(); ?>
	</div>
</div>
<script>
	
</script>
