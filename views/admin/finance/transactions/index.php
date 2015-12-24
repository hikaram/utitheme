<?php
$this->breadcrumbs[Yii::t('app', 'Панель управления')] = $this->createUrl('/admin');
if (Yii::app()->user->username == Yii::app()->params['superAdminInfo']['username'])
{
	$this->breadcrumbs[Yii::t('app', 'Управление финансами')] = $this->createUrl('default/index');
}
$this->breadcrumbs[Yii::t('app', 'Список финансовых операций')] = $this->createUrl('transactions/index');

$path = Yii::app()->assetManager->publish(
    Yii::getPathOfAlias('application.modules.admin.modules.finance.img')
);

    Yii::app()->clientScript->registerCssFile($path . '/style.css');
?>

<link rel="stylesheet" href="<?=Yii::app()->assetManager->getPublishedUrl(Yii::getPathOfAlias('application.modules.admin.modules.finance.css'))?>/css/adminfinance.css" type="text/css" media="screen, projection" />
<?=CHtml::hiddenField('asseturl', Yii::app()->assetManager->getPublishedUrl(Yii::getPathOfAlias('application.modules.admin.modules.finance.css')), array('id' => 'asseturl'))?>



<? if (count($modelsTransactions) == 0) : ?>
	<? if (!empty($filter)) : ?>
		<?=Yii::t('app', 'По заданному фильтру финансовые операции не найдены')?>
	<? else : ?>
		<div class="note note-success"><?=Yii::t('app', 'Финансовые операции еще не созданы.')?></div>
	<? endif; ?>
<? else : ?>
<div class="note note-info">
    <h4 style="margin-bottom: 0;"><?=Yii::t('app', 'Всего финансовых операций: ')?><?=$totalCount?>. <?=Yii::t('app', 'На сумму: ')?><?=sprintf('%.2f', CHtml::encode($totalSum))?></h4>
    <? if (!empty($filter)) : ?>
        <h4 style="margin-bottom: 0;"><?=Yii::t('app', 'По запросу найдено: ')?><?=$count?>. <?=Yii::t('app', 'На сумму: ')?><?=sprintf('%.2f', CHtml::encode($sumTransactions->amount))?></h4>
    <? endif; ?>
</div>
<div class="portlet box yellow">
    <div class="portlet-title">
        <h3 class="caption">
			<i class="fa fa-exchange"></i><?=Yii::t('app', 'Финансовые операции')?>
		</h3>
    </div>
    <div class="portlet-body">
        <?php echo $this->renderPartial('_filter', array('criteria' 		=> $criteria,
                                                 'list_currency'	=> $list_currency, 
												 'list_groups'		=> $list_groups,
												 'filtermodel'		=> $filtermodel,
												 'min_sum' 			=> $min_sum,
												 'max_sum' 			=> $max_sum,
                                                 'modelsTransactions' => $modelsTransactions)); ?>

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="dataTables_length" id="objects_length" style="display: inline-block;">
                    <label>  
                        <select id="pageSizeSeletor" name="objects_length" aria-controls="objects" class="form-control input-xsmall input-inline" onChange="changePageSize()">
                            <? if (!in_array($unit, [25, 50, 100])) : ?>
                                <option value="" selected="selected"></option>
                            <? endif; ?>
                            <option value="25" <? if ($unit == 25) : ?>selected="selected"<? endif; ?>>25</option>
                            <option value="50" <? if ($unit == 50) : ?>selected="selected"<? endif; ?>>50</option>
                            <option value="100" <? if ($unit == 100) : ?>selected="selected"<? endif; ?>>100</option>
                        </select> <?=Yii::t('app', 'записей на странице')?>
                    </label>
                </div>
                <div id="objects_filter" class="dataTables_filter" style="display: inline-block; margin-left: 20px;">
                    <?= CHtml::beginForm() ?>
                        <label><?=Yii::t('app','Введите свое значение')?>:
                            <input type="number" min="1" max="500" value="<?=$unit?>" step="1" size="7" class="form-control input-xsmall input-inline" name="unit" />
                        </label>        
                        <?php echo CHtml::submitButton(Yii::t('app', 'Применить'), array('name' => 'btn-unit', 'class' => 'btn green', 'style' => 'float: none;')); ?>
                    <?= CHtml::endForm() ?>                                
                </div>
            </div>
            
            <div class="col-md-6 col-sm-12">

            </div>
        </div>

		<div class="table-scrollable">
			<table class="table table-hover">
				<thead>
					<tr>
						<th style="white-space:nowrap;"><?=$modelsTransactions[0]->getAttributeLabel('id')?></th>
						<th><?=Yii::t('app', 'Дебет')?></th>
						<th><?=Yii::t('app', 'Кредит')?></th>
						<th><?=Yii::t('app', 'Описание')?></th>
						<th><?=$modelsTransactions[0]->getAttributeLabel('amount')?></th>
						<th><?=$modelsTransactions[0]->getAttributeLabel('status_alias')?></th>
                        <th><?=Yii::t('app', 'Платежная система')?></th>
						<th><?=$modelsTransactions[0]->getAttributeLabel('date_open')?></th>
						<th><?=Yii::t('app', 'Операция')?></th>
						<th><?=Yii::t('app', 'Действия')?></th>
					</tr>
				</thead>
				<tbody>
					<? foreach ($modelsTransactions as $key => $modelTransaction) : ?>
					<tr class="status-closed">
						 <? include 'operation.php'; ?>
					</tr>
					<tr style="display: none;">
						<td class="operation-inner" colspan="12" style="padding: 0; background: #fff;">
							<? include 'more.php' ?>
						</td>
					</tr>
					<? endforeach; ?>
				</tbody>
			</table>
		</div>

        <? $this->widget('CLinkPager', array(
			'pages' => $pages, 
			'nextPageLabel' => '<i class="fa fa-angle-double-right"></i>', 
			'prevPageLabel' => '<i class="fa fa-angle-double-left"></i>', 
			'header' => '', 
			'htmlOptions' => array(
				'class' => 'pagination'
			)
		)) ?>
        
    </div>
    
</div>
        
<? endif; ?>
    
<script>

    $(function(){
        $('span.more').click(function(){
			$(this).closest('tr').next().toggle(500);
        });

        $('.user-login').mouseenter(function(){
            $(this).children('.user-login-full').show();
        });
        $('.user-login').mouseleave(function(){
            $(this).children('.user-login-full').hide();
        });
    })

</script>