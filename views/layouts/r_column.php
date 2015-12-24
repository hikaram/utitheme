<?=$this->renderPartial('//layouts/base_begin')?>
<div class="main">
	<div class="container">
		<div class="col-md-12 col-sm-12">
			<h1><? if (isset($_blocks)) : ?><?=$_blocks['page']->lang->title;?><? else : ?><?=CHtml::encode($this->pageTitle);?><? endif; ?></h1>
		</div>
		<div class="col-md-9 col-sm-9">
			<div class="content-page">
				<? if (isset($_blocks)) : ?><?php $this->widget($_blocks['widget'], array('blocks'=>$_blocks, 'position'=>'content'))->block_show(); ?><? endif; ?>
			</div>
		</div>
		<div class="sidebar col-md-3 col-sm-3">
		<? if (isset($_blocks)) : ?><?php $this->widget($_blocks['widget'], array('blocks'=>$_blocks, 'position'=>'r_column'))->block_show(); ?><? endif; ?>
		</div>
	</div>
</div>
<?=$this->renderPartial('//layouts/base_end')?>