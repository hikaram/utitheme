<?=$this->renderPartial('//layouts/store_begin')?>

<div class="main">
	<div class="container">
		<?=$this->renderPartial('//layouts/control_breadcrumbs')?>
		<div class="row margin-bottom-40">
			<div class="col-md-12">
				<?php echo $content ?>
				<? if (isset($_blocks)) : ?><?php $this->widget($_blocks['widget'], array('blocks'=>$_blocks, 'position'=>'content'))->block_show(); ?><? endif; ?>
			</div>
		</div>
	</div>
</div>

<?=$this->renderPartial('//layouts/store_end')?>
