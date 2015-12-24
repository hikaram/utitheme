<?php
/* @var $this CataloguesController */
/* @var $model Catalogues */

$this->breadcrumbs=array(
	'Catalogues'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Catalogues', 'url'=>array('index')),
	array('label'=>'Create Catalogues', 'url'=>array('create')),
	array('label'=>'Update Catalogues', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Catalogues', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id), 'confirm' => Yii::t('app', 'Удалить данный каталог ?'))),
	array('label'=>'Manage Catalogues', 'url'=>array('admin')),
);
?>
<div class="portlet box blue-steel">
	<div class="portlet-title">
		<h3 class="caption">
			<i class="glyphicon glyphicon-eye-open" style="margin-right: 10px;"></i> <?=$this->pageTitle?>
		</h3>
		<div class="tools">
			<?=CHtml::form('', 'post', array('style'=>'padding: 0; display: inline;', 'class'=>'mr5'))?>
                <?=CHtml::linkButton('<i class="glyphicon glyphicon-folder-open"></i>', array(
                    'submit'=>array(
                        'create',
                    ),
                ))?>
            <?=CHtml::endForm() ?>
			<?=CHtml::link('<i class="fa fa-pencil"></i>', $this->createUrl('update', array('id' => $model->id)), array('class' => 'mr5'))?>
		</div>
	</div>
	<div class="portlet-body">

		<div class="row">
			<div class="col-md-2 text-right">
				<h4 class="h4-label">#<h4>
			</div>
			<div class="col-md-10">
				<h4><?=$model->id?></h4>
			</div>
		</div>
		<div class="row">
			<div class="col-md-2 text-right">
				<h4 class="h4-label"><?=$model->getAttributeLabel('alias')?><h4>
			</div>
			<div class="col-md-10">
				<h4><?=$model->alias?></h4>
			</div>
		</div>
		<div class="row">
			<div class="col-md-2 text-right">
				<h4 class="h4-label"><?=$model->getAttributeLabel('parent_id')?><h4>
			</div>
			<div class="col-md-10">
				<h4><?=Catalogues::item($model->parent_id)?></h4>
			</div>
		</div>
		<div class="row">
			<div class="col-md-2 text-right">
				<h4 class="h4-label"><?=$model->getAttributeLabel('tree_level')?><h4>
			</div>
			<div class="col-md-10">
				<h4><?=$model->tree_level?></h4>
			</div>
		</div>
        <?php if (count($model->products) > 0): ?>
            <h3><?=Yii::t('app', 'Продукты каталога')?></h3>
            <table class="table table-hover" >
                <thead>
                <tr class="top-table">
                    <th class="text-left"></th>
                    <th><?=ProductsLang::model()->getAttributeLabel('name')?></th>
                    <th><?=Products::model()->getAttributeLabel('currency__id')?></th>
                    <th><?=Products::model()->getAttributeLabel('price')?></th>
                    <th><?=Yii::t('app', 'Операции')?></th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach ($model->products as $i => $product): ?>
                        <tr data-product-id="<?=$product->getPrimaryKey()?>">
                            <td><?=($i+1)?></td>
                            <td><?=$product->lang->name?></td>
                            <td><?=$product->currency->symbol.' ('.$product->currency->lang->name.')'?></td>
                            <td><?=$product->price?></td>
                            <td>
                			<?=CHtml::link('<i class="glyphicon glyphicon-eye-open"></i>', array('products/view', 'id' => $product->id), array('style' => 'float: none;', 
                					'class' => 'btn blue-steel tooltips',
                								'data-container' => 'body', 
                								'data-placement' => 'bottom',
                								'data-original-title' => Yii::t('app', 'Просмотр'))).
                			CHtml::link('<i class="glyphicon glyphicon-pencil"></i>', array('products/update', 'id' => $product->id), array('style' => 'float: none;', 
                					'class'=>'btn green-seagreen tooltips',
                								'data-container' => 'body', 
                								'data-placement' => 'bottom',
                								'data-original-title' => Yii::t('app', 'Редактировать'))).
                			CHtml::link('<i class="glyphicon glyphicon-remove"></i>', '#', array(
                					'class'=>'btn tooltips red product-delete',
                								'data-container' => 'body', 
                								'data-placement' => 'bottom',
                								'data-original-title' => Yii::t('app', 'Удалить'), 'style' => 'float: none;'))?></td>
                        </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        <?php endif;?>
   </div>
</div>   

<script type="text/javascript">
    $(function(){
        // Удаление настраиваемого поля
        $('.product-delete').click(function(e){
            e.preventDefault();

            var id = $(this).closest('tr').data('product-id');
            var table = $(this).closest('table');

            if (confirm("<?=Yii::t('app', 'Вы действительно хотите удалить продукт?')?>")){
                $.ajax({
                    url: '/catalog/ajaxproducts/delete/id/' + id,
                    complete: function(){
                        // Удалить строку продукта
                        table.find('tr[data-product-id="' + id +  '"]').remove();

                        // Если больше не осталось каталогов для удаления
                        if (table.find('tbody tr:visible').length < 1){
                            table.hide().after("<?=Yii::t('app', 'Нет продуктов для отображения')?>");
                        }
                    }
                });
            }
        });
    });
</script>