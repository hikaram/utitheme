<?php
    $this->breadcrumbs[Yii::t('app', 'Панель управления')] = array('/admin');
    $this->breadcrumbs[Yii::t('app', 'Управление продукцией')] = array('/admin/catalog');
    $this->breadcrumbs[Yii::t('app', 'Продукты')] = array('products/index');
?>
<style>
th
{
	color: #428bca;
}
.page.selected>a
{
	background-color: #ddd !important;
}
</style>
<div class="portlet box yellow">
	<div class="portlet-title">
		<h3 class="caption"><i class="fa fa-cubes"></i> <?=$this->pageTitle?></h3>
	</div>

	<div class="portlet-body form form-horizontal">
    	<div style="clear: both;" class="operations">
			<?=CHtml::link(Yii::t('app', 'Создать продукт'), array('create'))?>
		</div>
		<div class="form-body">

			<?php $this->renderPartial('_grid', array(
				'model' => $model
			));
	?>	</div>
	</div>
	
<script>
  $(document).ready(function() {
		
		$('.form-body').ajaxStop(function(){
		
			$('.items').attr('class', 'table table-hover');
			$('.button-column a').empty();
		
			$('a.view').attr('class', 'btn green tooltips');
			$('a.green').html('<i class="glyphicon glyphicon-eye-open"></i>');
					
			$('.update').attr('class', 'btn green-seagreen tooltips');
			$('a.green-seagreen').html('<i class="glyphicon glyphicon-pencil"></i>');
			
			$('.delete').attr('class', 'btn tooltips red');
			$('a.red').html('<i class="glyphicon glyphicon-remove"></i>');
			
		});

		$('.items').attr('class', 'table table-hover');
		$('.button-column a').empty();
		
		$('a.view').attr('class', 'btn green tooltips');
		$('a.green').html('<i class="glyphicon glyphicon-eye-open"></i>');
				
		$('.update').attr('class', 'btn green-seagreen tooltips');
		$('a.green-seagreen').html('<i class="glyphicon glyphicon-pencil"></i>');
		
		$('.delete').attr('class', 'btn tooltips red');
		$('a.red').html('<i class="glyphicon glyphicon-remove"></i>');
	});
</script>