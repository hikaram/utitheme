<div class="row margin-bottom-40">
  <div class="col-md-12 col-sm-12">
	<div class="content-page">
	  <div class="row">
		<div class="col-md-12 col-sm-12 blog-item">
			<div class="front-carousel" style="float: left; margin: 25px 25px 0 0;">
					<? if (($model->attachment != NULL) && ($model->attachment->secret_name != null)) : ?>
						<?=CHtml::image(MSmarty::attachment_get_file_name($model->attachment->secret_name, $model->attachment->raw_name, $model->attachment->file_ext, '_home_size_1', 'reviews_picture'));?>
					<? else : ?>
						<img src="" alt="">
					<? endif; ?>  
			</div>
		  <h2><a href="#"><?=CHtml::encode($model->lang->reviews_sender) ?></a></h2>
			<?=$model->lang->text ?>
		  <ul class="blog-info">
			<li><i class="fa fa-calendar"></i>  <?=date("d.m.Y H:i:s", strtotime($model->created_at))?></li>
		   </ul>
		</div>
	 </div>
	</div>
  </div>
</div>
<a href="javascript:void(0)" onClick="window.location = <? if (isset($backurl)) : ?>'<?=$backurl;?>'<?else : ?>app.createAbsoluteUrl('reviews/list/index')<? endif; ?>"><?=Yii::t('app', 'Вернуться к списку отзывов')?></a>