<div class="row">
    <div class="col-md-9 col-sm-9 blog-posts">
        <? if ($news == null) : ?>
        <div class="note note-info">
            <p>
                <?=Yii::t('app', 'Новостей нет')?>
            </p>
        </div>
    <? else : ?>        
    <? foreach ($news as $key => $new) : ?>
    <div class="row" id="message_<?=$new->id?>">
       <? if (($new->attachment != NULL) && ($new->attachment->secret_name != null)) : ?>
       <div class="col-md-4 col-sm-4 blog-item">
		   <div class="blog-item-img">
			  <?=CHtml::image(MSmarty::attachment_get_file_name($new->attachment->secret_name, $new->attachment->raw_name, $new->attachment->file_ext, '', 'news_picture'), '', array('class' => 'img-responsive'));?><br>
		   </div>
	   </div>
   <? endif; ?>

   <? if (($new->attachment != NULL) && ($new->attachment->secret_name != null)) : ?>
   <div class="col-md-8 col-sm-8 col-xs-8">
   <? else : ?>
   <div class="col-md-12 col-sm-12">
   <? endif; ?>
   <h2> 
      <? if (Yii::app()->user->checkAccess('NewsListViewnews')) : ?>
      <a href="<?=Yii::app()->createUrl('news/list/viewnews/id/' . $new->id)?>"><?=$new->lang->title?></a>
  <? else : ?>
  <?=CHtml::encode($new->lang->title)?>
<? endif; ?>
</h2>
<ul class="blog-info">
    <li><i class="fa fa-calendar"></i> <?=MSmarty::date_format($new->publication_from, 'd.m.Y')?> <?=MSmarty::date_format($new->publication_from, '%H:%M')?></li>
</ul>
<p><?=$new->lang->brief_text?></p>
<? if (Yii::app()->user->checkAccess('NewsListViewnews')) : ?>
<a href="<?=Yii::app()->createUrl('news/list/viewnews/id/' . $new->id)?>" class="more"><?=Yii::t('app', 'Читать полностью')?> <i class="icon-angle-right"></i></a>
<? endif; ?>
</div>
<!-- col-md8 -->
</div>
<!-- new's row -->
<hr class="blog-post-sep">
<? endforeach; ?>
<? $this->widget('CLinkPager', array(
        'pages' => $pages, 
        'nextPageLabel' => '<i class="fa fa-angle-double-right"></i>', 
        'prevPageLabel' => '<i class="fa fa-angle-double-left"></i>', 
        'header' => '', 
        'htmlOptions' => array(
          'class' => 'pagination'
        )
      ))?>
<? endif; ?>

</div>
<!-- col-md9 -->
</div>
<!-- row -->