<script>
	$(function(){
		$('#content_filter_header').click(function(){
			if($(this).find('.tools i').hasClass('fa-angle-down')) {
				$(this).find('.tools i').removeClass('fa-angle-down').addClass('fa-angle-up');
				document.getElementById('turn').innerHTML ='-';
				$('#content_filter_body').slideDown('slow');
			} else {
				$(this).find('.tools i').removeClass('fa-angle-up').addClass('fa-angle-down');
				document.getElementById('turn').innerHTML ='+';
				$('#content_filter_body').slideUp('slow');
			}
		})
	})
</script>
<? if (!empty($filter)) : ?>
<script>
	$(function(){
		$("#content_filter_body").show();
	})
</script>
<? endif?>

<?=CHtml::beginForm($this->createUrl(''), 'GET', array('id' => 'filterform'))?>
<div class="panel panel-default">
	<div class="panel-heading" id="content_filter_header" style=" padding: 10px; border: 1px solid #e2e3e8;border-radius: 5px 5px 0 0 ;  background: linear-gradient(to top,#4D8B25 , #8CC872); color:#fff;cursor: pointer;">
		<i class="fa fa-filter mr5"></i><span style="font-size: 12px" id="turn">+</span> <?=Yii::t('app', 'Фильтр')?>
		<div class="tools pull-right">
			<i class="fa fa-angle-down"></i>
		</div>
	</div>
	<div style="margin-bottom:15px; border: 1px solid #e2e3e8; display: none;" id="content_filter_body">
		<div class="form-body">
			<div class="form-group">
				<?=CHtml::label(Yii::t('app', 'Тема'),'body', array('class' => 'col-md-3 control-label', 'style'=>'float:left; padding:10px; width: 8%;')); ?>
				<div class="col-md-9" style = "float:left; padding:10px">
					<?=CHtml::textField('filtertitle', array_key_exists('filtertitle', $filter) ? $filter['filtertitle'] : (string)FALSE, array('class' => 'form-control input-large','style'=>'width:250px'))?>
				</div>
			</div>
			<div class="clear"></div>
			<div class="form-group">
				<?=CHtml::label(Yii::t('app', 'Рубрика'),'body', array('class' => 'col-md-3 control-label', 'style'=>'float:left; padding:10px;  width: 8%;')); ?>
				<div class="col-md-9"  style = "float:left; padding:10px">
					<?=CHtml::listBox('filterrubric', array_key_exists('filterrubric', $filter) ? $filter['filterrubric'] :  (string)FALSE,  BlogPosts::LabelsRubrics(), array('empty'=>'-', 'size' => (int)TRUE, 'class' => 'form-control input-large' ,'style'=>'width:255px'))?>
				</div>
			</div>	
			<div class="clear"></div>
			<div class="form-group">
				<?=CHtml::label(Yii::t('app', 'Статус'),'body', array('class' => 'col-md-3 control-label', 'style'=>'float:left; padding:10px;  width: 8%;')); ?>
				<div class="col-md-9"  style = "float:left; padding:10px">
					<?=CHtml::listBox('filterstatus', array_key_exists('filterstatus', $filter) ? $filter['filterstatus'] :  (string)FALSE,  BlogPosts::LabelsStatus(), array('empty'=>'-', 'size' => (int)TRUE, 'class' => 'form-control input-large','style'=>'width:255px'))?>
				</div>
			</div>	
			<div class="clear"></div>
			<div class="form-group">
				<?=CHtml::label(Yii::t('app', 'Могут читать'),'body', array('class' => 'col-md-3 control-label', 'style'=>'float:left; padding:10px;  width: 8%;')); ?>
				<div class="col-md-9"  style = "float:left; padding:10px">
					<?=CHtml::listBox('filtercanread', array_key_exists('filtercanread', $filter) ? $filter['filtercanread'] :  (string)FALSE,  BlogPosts::LabelsRead(), array('empty'=>'-', 'size' => (int)TRUE, 'class' => 'form-control input-large','style'=>'width:255px'))?>
				</div>
			</div>				
		</div>
		<div class="clear"></div>
		<div class="form-actions" style = "padding:10px">
			<?php echo CHtml::submitbutton(Yii::t('app', 'Применить'), array('name'=>'btn_filter', 'class' => 'btn green', 'onClick' => 'saveFilter()')); ?>
			<?php echo CHtml::button(Yii::t('app', 'Сбросить фильтр'), array('name'=>'btn_filter', 'class' => 'btn red', 'onClick' => 'location.href="' . $this->createUrl('/admin/blog/index/index') . '"')); ?>
		</div>
	</div>
</div>
<?=CHtml::endForm()?>
