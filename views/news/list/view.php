<div class="row">
	<div class="col-md-9 col-sm-9 blog-item">
		<div class="blog-item-img">
		<? if (($model->attachment != NULL) && ($model->attachment->secret_name != null)) : ?>
			<?=CHtml::image(MSmarty::attachment_get_file_name($model->attachment->secret_name, $model->attachment->raw_name, $model->attachment->file_ext, '', 'news_picture'), '', array('class' => 'img-responsive'));?><br>
		<? endif; ?>
		</div>
		<div>
			<?=$model->lang->text?>
		</div>
		<ul class="blog-info">
			<li>
				<i class="fa fa-calendar"></i> <?=MSmarty::date_format($model->publication_from, 'd.m.Y')?> <?=MSmarty::date_format($model->publication_from, '%H:%M')?>
			</li>
			<li style="float: right;">
				<a href="javascript:void(0)" onClick="window.location = <? if (isset($backurl)) : ?>'<?=$backurl;?>'<?else : ?>app.createAbsoluteUrl('news/list/index')<? endif; ?>">Назад</a>
			</li>
		</ul>
	</div>
</div>