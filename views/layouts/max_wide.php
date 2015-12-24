<?=$this->renderPartial('//layouts/base_begin')?>
<div class="main">
	<div>
		<div class="container">
			<?=$this->renderPartial('//layouts/control_breadcrumbs')?>
			<div class="row margin-bottom-40">
				<div class="col-md-12">
					<h1><? if (isset($_blocks)) : ?><?=$_blocks['page']->lang->title;?><? else : ?><?=CHtml::encode($this->pageTitle);?><? endif; ?></h1>
					<div class="content-page">
						<? if (isset($_blocks)) : ?><?php $this->widget($_blocks['widget'], array('blocks'=>$_blocks, 'position'=>'content'))->block_show(); ?><? endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?=$this->renderPartial('//layouts/base_end')?>