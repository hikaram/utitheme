<? if ((isset($_blocks)) && ((bool)$_blocks['is_edit'])) : ?>
<?php $this->widget($_blocks['widget'], array('blocks' => $_blocks, 'contents_objects' => $_contents_objects))->block_edit_show(); ?>
<?php $this->widget($_blocks['widget'], array('blocks' => $_blocks))->create_content(); ?>   
<link rel="stylesheet" href="<?= Yii::app()->theme->baseUrl ?>/public/admin/page/css/jquery.mCustomScrollbar.min.css" type="text/css" media="screen, projection" />
<script src="<?= Yii::app()->theme->baseUrl ?>/public/admin/page/js/jquery.mCustomScrollbar.min.js"></script>

<? if ($_blocks['widget'] == 'Contentpro') : ?>
<?php $this->widget($_blocks['widget'], array('blocks' => $_blocks))->edit_content(); ?>
<? endif; ?>    
<? if($_blocks['is_edit']) :?>
<? if (!array_key_exists('edit', $_blocks)) : ?>
<?= $content; ?>
<? else : ?>
<div id="panel_manage" class="panel-manager l-panel-manager">
	<script>
		Getting_content('<?= $_blocks['page']->layout; ?>',
				'<?= $_blocks['page']->lang->title; ?>',
				'<?= $_blocks['page']->lang->name; ?>',
				'<?= $_blocks['page']->lang->keywords; ?>',
				'<?= $_blocks['page']->lang->description; ?>',
				'<?= $_blocks['page']->id; ?>',
				'<?= $_blocks['edit']; ?>',
				'<?= $_blocks['page']->theme__id; ?>',
				'<?= $_blocks['page']->is_visible; ?>',
				'<?= CJSON::encode($_blocks['roles']); ?>',
				'<?= Yii::app()->language; ?>');
	</script>
</div>
<? endif; ?>        
<? endif; ?>    
<? endif; ?> 