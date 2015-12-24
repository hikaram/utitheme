<div class="portlet box yellow">
	<div class="portlet-title">
		<h3 class="caption"><i class="fa fa-sitemap"></i> <?=Yii::t('app', 'Просмотр структуры')?></h3>
	</div>
	<div class="portlet-body form form-horizontal">

		<div class="form-body">
        
            <? if ($token) : ?>
                <? $this->widget('Matrix')->matrixTokenStructureForAdmin($matrix_type, $token, 'admin/matrix/matrix/structure/id/' . $matrix_type); ?>
            <? else : ?>
                <? $this->widget('Matrix')->matrixTypeStructureForAdmin($matrix_type, 'admin/matrix/matrix/structure/id/' . $matrix_type); ?>
            <? endif; ?>
            
		</div>

	</div>
</div>


