<?= $this->renderPartial('//layouts/base_begin') ?>
<div class="main" style="margin-top: -23px;">
	<?= $this->renderPartial('//layouts/control_breadcrumbs') ?>
	<div class="margin-bottom-40">
		<?= $content ?>
		<? if (isset($_blocks)) : ?><?php $this->widget($_blocks['widget'], array('blocks' => $_blocks, 'position' => 'content'))->block_show(); ?><? endif; ?>
	</div>
</div>
<?=
$this->renderPartial('//layouts/base_end')?>