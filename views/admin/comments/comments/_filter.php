<script>
	$(function(){
		$('#content_filter_header').click(function(){
			if($(this).find('.tools i').hasClass('fa-angle-down')) {
				$(this).find('.tools i').removeClass('fa-angle-down').addClass('fa-angle-up');
				$('#content_filter_body').slideDown('slow');
			} else {
				$(this).find('.tools i').removeClass('fa-angle-up').addClass('fa-angle-down');
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
<?//vg(CommentsObjects::LabelModule());die?>
<?=CHtml::beginForm($this->createUrl(''), 'GET', array('id' => 'filterform'))?>
<div class="panel panel-default">
	<div class="panel-heading" id="content_filter_header" style="cursor: pointer">
		<i class="fa fa-filter mr5"></i> <?=Yii::t('app', 'Настройка фильтра')?>
		<div class="tools pull-right">
			<i class="fa fa-angle-down"></i>
		</div>
	</div>
	<div class="panel-body form form-horizontal" style="display: none;" id="content_filter_body">
		<div class="form-body">
			<h4><?=Yii::t('app', 'Настройки фильтрации')?></h4>
			<hr class="mt5 mb30" />
			<div class="form-group">
				<?=CHtml::label(Yii::t('app', 'Модуль'),'body', array('class' => 'col-md-3 control-label')); ?>
				<div class="col-md-9">
					<?=CHtml::listBox('filtermodule', array_key_exists('filtermodule', $filter) ? $filter['filtermodule'] :  (string)FALSE,  CommentsObjects::LabelModule(), array('empty'=>'-', 'size' => (int)TRUE, 'class' => 'form-control input-large'))?>
				</div>
			</div>	
			<div class="form-group">
				<?=CHtml::label(Yii::t('app', 'Название статьи'),'body', array('class' => 'col-md-3 control-label')); ?>
				<div class="col-md-9">
					<?=CHtml::textField('filtertitle', array_key_exists('filtertitle', $filter) ? $filter['filtertitle'] : (string)FALSE, array('class' => 'form-control input-large'))?>
				</div>
			</div> 
			<div class="form-group">
				<?=CHtml::label(Yii::t('app', 'Пользователь'),'body', array('class' => 'col-md-3 control-label')); ?>
				<div class="col-md-9">
					<?=CHtml::textField('filteruser', array_key_exists('filteruser', $filter) ? $filter['filteruser'] : (string)FALSE, array('class' => 'form-control input-large'))?>
				</div>
			</div>
			<div class="form-group">
				<?=CHtml::label(Yii::t('app', 'Комментарий'),'body', array('class' => 'col-md-3 control-label')); ?>
				<div class="col-md-9">
					<?=CHtml::textField('filtercomment', array_key_exists('filtercomment', $filter) ? $filter['filtercomment'] : (string)FALSE, array('class' => 'form-control input-large'))?>
				</div>
			</div>
			<div class="form-group">
				<?=CHtml::label(Yii::t('app', 'Статус'),'body', array('class' => 'col-md-3 control-label')); ?>
				<div class="col-md-9">
					<?=CHtml::listBox('filterstatus', array_key_exists('filterstatus', $filter) ? $filter['filterstatus'] :  (string)FALSE,  Comments::LabelStatus(), array('empty'=>'-', 'size' => (int)TRUE, 'class' => 'form-control input-large'))?>
				</div>
			</div>				
		</div>
		<div class="form-actions">
			<?php echo CHtml::submitbutton(Yii::t('app', 'Применить'), array('name'=>'btn_filter', 'class' => 'btn green', 'onClick' => 'saveFilter()')); ?>
			<?php echo CHtml::button(Yii::t('app', 'Сбросить фильтр'), array('name'=>'btn_filter', 'class' => 'btn red', 'onClick' => 'location.href="' . $this->createUrl('/admin/comments/comments/index') . '"')); ?>
		</div>
	</div>
</div>
<?=CHtml::endForm()?>
