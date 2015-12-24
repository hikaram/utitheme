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

<?=CHtml::beginForm($this->createUrl(''), 'POST', array('id' => 'filterform'))?>
<div class="panel panel-default">
	<div class="panel-heading" id="content_filter_header" style="cursor: pointer">
		<i class="fa fa-filter mr5"></i> <?=Yii::t('app', 'Настройка фильтра')?>
		<div class="tools pull-right">
			<i class="fa fa-angle-down"></i>
		</div>
	</div>
	<div class="panel-body form form-horizontal" style="display: none;" id="content_filter_body">
		<div class="form-body">
			<h4><?=Yii::t('app', 'Настройки отображения списка')?></h4>
			<hr class="mt5 mb30" />
			<div class="form-group">
				<div class="col-md-3 text-right"><?=Yii::t('app', 'Показывать контекст')?></div>
				<div class="col-md-9">
					<?=CHtml::checkBox('filter-switch-context', array_key_exists('filter-switch-context', $filter) ? $filter['filter-switch-context'] : $checkBoxDefaultOn, array('id' => 'filter-switch-context', 'class' => 'filter-switch-checkbox'))?>
				</div>
			</div>
			<div class="form-group">
				<? foreach ($langs as $lang) : ?>
				<div class="mb5 clearfix">
					<div class="col-md-3 text-right"><?=Yii::t('app', 'Показывать')?> <?=CHtml::encode($lang->lang->title)?></div>
					<div class="col-md-9">
						<?=CHtml::checkBox('filter-switch-lang-' . $lang->alias, array_key_exists('filter-switch-lang-' . $lang->alias, $filter) ? $filter['filter-switch-lang-' . $lang->alias] : $checkBoxDefaultOn, array('langalias' => $lang->alias, 'onChange' => 'switchLang(this, "' . $lang->alias . '")', 'class' => 'filter-switch-checkbox'))?>
					</div>
				</div>
				<? endforeach; ?>
			</div>
			<div class="form-group">
				<div class="col-md-12">
					<?=CHtml::link(Yii::t('app', 'Отметить все'), 'javascript: void(0)', array('onClick' => 'fliterSwitchAll()', 'class' => 'mr20'))?>
					<?=CHtml::link(Yii::t('app', 'Убрать отметку со всех'), 'javascript: void(0)', array('onClick' => 'fliterSwitchNone()'))?>
				</div>
			</div>
		</div>
		<div class="form-body">
			<h4><?=Yii::t('app', 'Настройки фильтрации')?></h4>
			<hr class="mt5 mb30" />
			<div class="form-group">
				<?=CHtml::label(Yii::t('app', 'Текст'),'body', array('class' => 'col-md-3 control-label')); ?>
				<div class="col-md-9">
					<?=CHtml::textField('filtertext', array_key_exists('filtertext', $filter) ? $filter['filtertext'] : (string)FALSE, array('class' => 'form-control input-large'))?>
				</div>
			</div>
			<div class="form-group">
				<?=CHtml::label(Yii::t('app', 'Контекст'),'body', array('class' => 'col-md-3 control-label')); ?>
				<div class="col-md-9">
					<?=CHtml::textField('filtercontext', array_key_exists('filtercontext', $filter) ? $filter['filtercontext'] : (string)FALSE, array('class' => 'form-control input-large'))?>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-3"></div>
				<div class="col-md-9">
					<?=CHtml::listBox('filter-lang-type', array_key_exists('filter-lang-type', $filter) ? $filter['filter-lang-type'] : Translate::FILTER_TYPE_ALL, Translate::getFilterArray(), array('size' => (int)TRUE, 'class' => 'form-control input-large', 'id' => 'filter-lang-type'))?>
				</div>
			</div>
			<div class="form-group" style="display: none" id="filter-langs">
				<div class="mb15">
					<? foreach ($langs as $lang) : ?>
					<div class="mb5 clearfix">
						<div class="col-md-3 text-right"><?=CHtml::encode($lang->lang->title)?></div>
						<div class="col-md-9">
							<?=CHtml::checkBox('filter-lang-alias-' . $lang->alias, array_key_exists('filter-lang-alias-' . $lang->alias, $filter) ? $filter['filter-lang-alias-' . $lang->alias] : FALSE, array('class' => 'filter-lang-checkbox'))?>
						</div>
					</div>
					<? endforeach; ?>
				</div>
				<div class="col-md-12">
					<?=CHtml::link(Yii::t('app', 'Отметить все'), 'javascript: void(0)', array('onClick' => 'fliterLangAll()', 'class' => 'mr20'))?>
					<?=CHtml::link(Yii::t('app', 'Убрать отметку со всех'), 'javascript: void(0)', array('onClick' => 'fliterLangNone()'))?>
				</div>
			</div>
		</div>
		<div class="form-actions">
			<?php echo CHtml::button(Yii::t('app', 'Применить'), array('name'=>'btn_filter', 'class' => 'btn green', 'onClick' => 'saveFilter()')); ?>
			<?php echo CHtml::button(Yii::t('app', 'Сбросить фильтр'), array('name'=>'btn_filter', 'class' => 'btn red', 'onClick' => 'location.href="' . substr($this->createUrl('/admin/translate/default/index'), 0, strpos($this->createUrl('/admin/translate/default/index'), '/subsession/')) . '"')); ?>
		</div>
	</div>
</div>
<?=CHtml::endForm()?>
