<? if ($reviews == null) : ?>
	<div class="note note-success">
		<?=Yii::t('app', 'Пока нет ни одного отзыва.')?>
		<? if (Yii::app()->user->checkAccess('AdminFaqDefaultCreate')) : ?>
			<?=Yii::t('app', 'Вы можете')?> <a href="<?=Yii::app()->createUrl('admin/reviews/reviews/create')?>" style="color:#808bd5;")><?=Yii::t('app', 'создать')?></a> <?=Yii::t('app', 'новую запись.')?>
		<? endif; ?>
	</div>
	
<? else : ?>  
    <div class="content-page">
		<? foreach ($reviews as $key => $review) : ?>
			<div class="row">
				<!-- BEGIN LEFT SIDEBAR -->            
                <div class="col-md-12 col-sm-12 blog-posts">

					<div class="row">
						<? if (($review->attachment != NULL) && ($review->attachment->secret_name != null)) : ?>
						<div class="col-md-3 col-sm-3">
							<a href="<?= (Yii::app()->user->checkAccess('ReviewsListViewreviews')) ? Yii::app()->createUrl('reviews/list/viewreviews/id/' . $review->id) : "#"?>"><?=CHtml::image(MSmarty::attachment_get_file_name($review->attachment->secret_name, $review->attachment->raw_name, $review->attachment->file_ext, '_home_size_1', 'reviews_picture')); ?></a>
						</div>
						<div class="col-md-9 col-sm-9">
							<h2><a href="<?=Yii::app()->createUrl('reviews/list/viewreviews/id/' . $review->id)?>"><?= htmlentities(CHtml::encode($review->lang->reviews_sender), ENT_NOQUOTES)?></a></h2>
							<p><?=htmlentities(CHtml::encode($review->lang->brief_text), ENT_NOQUOTES)?></p>
							<a class="more" href="<?=Yii::app()->createUrl('reviews/list/viewreviews/id/' . $review->id)?>">Посмотреть отзыв <i class="icon-angle-right"></i></a>
						</div>
						<? else:?>
						<div class="col-md-12 col-sm-12">
							<h2><a href="<?=Yii::app()->createUrl('reviews/list/viewreviews/id/' . $review->id)?>"><?= htmlentities(CHtml::encode($review->lang->reviews_sender), ENT_NOQUOTES)?></a></h2>
						<p><?=htmlentities(CHtml::encode($review->lang->brief_text), ENT_NOQUOTES)?></p>
						<a class="more" href="<?=Yii::app()->createUrl('reviews/list/viewreviews/id/' . $review->id)?>">Посмотреть отзыв <i class="icon-angle-right"></i></a>
						</div>
						<? endif; ?>
					</div>
					<hr class="blog-post-sep">
				</div>
			</div>
			<?endforeach;?>
			  
			<? $this->widget('CLinkPager', array('pages' => $pages,
				'htmlOptions' => array(
					'class' => 'pagination'
			)))?>
	</div>	  
<? endif; ?>