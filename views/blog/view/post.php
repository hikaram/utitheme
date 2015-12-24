<?php


$this->breadcrumbs[Yii::t('app', 'Блог')] = '/blog/view/index';
$this->breadcrumbs = array_merge($this->breadcrumbs, array($post->lang->title));
$this->pageDescription= $post->lang->description;
$this->pageKeywords= $post->lang->keywords;
?>
<div class="row">
	<?php if($post->status_id == BlogPosts::STATUS_POST_BLOCKED) : ?>
		<div class="col-md-9 col-sm-9 blog-item">
			<div style="padding:10px 0"><?=Yii::t('app', 'Запись заблокирована')?></div>
			<div class="author">
				<?php if (!empty(Yii::app()->user->id) && $post->blog->user__id === Yii::app()->user->id) : ?>
					<a href="<?=$this->createUrl('post/edit', array('id' => $post->blog->id, 'post' => $post->id))?>" class="action"><?=Yii::t('app', 'Редактировать') ?></a>
					&nbsp;&nbsp;<a href="#" onclick="if (confirm('<?=Yii::t('app', 'Удалить запись?')?>'))
					location.href = '<?=$this->createUrl('post/delete', array('id' => $post->blog->id, 'post' => $post->id))?>';" class="action"><?=Yii::t('app', 'удалить')?></a>
				<?php endif; ?>
			</div>
		</div>
	<?php else : ?>
		<!-- /// -->
		<div class="col-md-9 col-sm-9 blog-item">
			<h2><?=CHtml::encode($post->lang->title)?></h2>
			
			<!-- <div style="clear:both"></div>
			<div class="social_meters_div">    
				<script type="text/javascript" src="//yandex.st/share/share.js" charset="utf-8"></script>
				<div class="yashare-auto-init" data-yashareL10n="ru" data-yashareQuickServices="vkontakte,facebook,twitter,odnoklassniki,moimir" data-yashareTheme="counter" data-yashareImage="http://prob2b.biz/skins/ru/images/layout/header/logotip.png" data-yashareUrl="http://"></div> 
			</div>
			<div style="clear:both"></div> -->

			<?=$post->lang->text?>
			
			<!-- <div class="social_meters_div"> 
			<?php if (Yii::app()->user->checkAccess('BlogEditAuthorpost',array('post'=>$post)) or Yii::app()->user->checkAccess('BlogDeleteAuthorpost',array('post'=>$post)) ) : ?>
									<div class="blog-item">
										<ul class="blog-info">
											<?php if (Yii::app()->user->checkAccess('BlogEditAuthorpost',array('post'=>$post))) : ?>
												<li><i class="fa fa-edit"></i> <a href="<?= $this->createUrl('post/edit', array('post' => $post->id)) ?>"> <?= Yii::t('app', 'Редактировать') ?> </a> </li>
											<?endif?>
											<?php if (Yii::app()->user->checkAccess('BlogDeleteAuthorpost',array('post'=>$post))) : ?>
												<li><i class="fa fa-times"></i>  <a href="#" onclick="if (confirm('<?= Yii::t('app', 'Удалить запись?') ?>'))
																	location.href = '<?= $this->createUrl('post/delete', array('post' => $post->id)) ?>';
																return false;" class="action"><?= Yii::t('app', 'Удалить запись') ?></a></li>
											<?endif?>
										</ul>
									</div>
								<?php else : ?>
									<hr class="blog-post-sep">
								<?php endif; ?>   
				<script type="text/javascript" src="//yandex.st/share/share.js" charset="utf-8"></script>
				<div class="yashare-auto-init" data-yashareL10n="ru" data-yashareQuickServices="vkontakte,facebook,twitter,odnoklassniki,moimir" data-yashareTheme="counter" data-yashareImage="http://prob2b.biz/skins/ru/images/layout/header/logotip.png" data-yashareUrl="http://"></div> 
			</div> -->
			<?//vg(Yii::app()->user->id." ".$post->created_by);die?>
			<ul class="blog-info">
				<li><i class="fa fa-calendar"></i> <?= BlogPosts::DateHuman($post->created_at) ?></li>
				<?php if(!empty(Yii::app()->user->id)) : ?>
					<?php if(Yii::app()->user->checkAccess('BlogEditAuthorpost',array('post'=>$post))) : ?>
						<li><i class="fa fa-edit"></i> <a href="<?=$this->createUrl('post/edit', array('post' => $post->id))?>"> <?=Yii::t('app', 'Редактировать')?> </a> </li>
					<?php endif; ?>	
					<?php if (Yii::app()->user->checkAccess('BlogDeleteAuthorpost',array('post'=>$post))) : ?>
						<li><i class="fa fa-times"></i>  <a href="#" onclick="if (confirm('<?=Yii::t('app', 'Удалить запись?')?>'))location.href = '<?=$this->createUrl('post/delete', array('post' => $post->id))?>';" class="action"><?=Yii::t('app', 'Удалить запись')?></a></li>
					<?php endif; ?>
						<li style="float: right;"><a href="<?=$this->createUrl('view/index')?>"><?=Yii::t('app', 'назад к списку статей')?></a></li>					
				<?php endif; ?>
			</ul>

		<? if($post->can_comment) :?>
			<?php $this->widget('application.modules.comments.widgets.commentswidget', array('object_alias' => 'blog_posts','object_id' => $post->id)); ?>
		<?endif?>
		</div>
		<!-- post col -->
		<!-- /// -->

	<?php endif; ?>
	<? if (!empty($rubrics)):?>
		<div class="col-md-3 col-sm-3 blog-sidebar">
				  <!-- CATEGORIES START -->
				  <h2 class="no-top-space"><?=Yii::t('app','Рубрики')?></h2>
		          <ul class="nav sidebar-categories margin-bottom-40">
				   <? foreach($rubrics as $rubric): ?>
				   	<?
					    $command='select count(*) from blog_posts  bp left join blog_posts_lang bpl on bpl.blog_posts__id = bp.id where bp.status_id=1 and bp.blog_rubrics__id= :rubric__id';
						$countpost=Yii::app()->db->createCommand($command)
						->bindValue('rubric__id', $rubric->id)
						->queryScalar()	
					?>
					
		             <li <?=($rubric->id==$rubric_id)? 'class="active"': ""?>> <a href="<?=$this->createUrl('view/index', array('rubric' => $rubric->id))?>" class="blog_next"><?=Yii::t('app', $rubric->lang->name)?> (<?=$countpost?>)</a></li>
		               
		           <?endforeach?>
				   </ul>
		        </div>    
		
	<?endif?>	
<!-- row -->
</div>
<!-- <div class="blog_right_side">
    <div class="blog_plugins">
        <script type="text/javascript" src="//vk.com/js/api/openapi.js?105"></script>
        <div id="vk_groups"></div>
    </div>
    <div class="blog_plugins" id="blog_right_side">
        <div id="ok_group_widget"></div>
        <script>
        VK.Widgets.Group("vk_groups", {mode: 0, width: "220", height: "400", color1: 'FFFFFF', color2: '2B587A', color3: '5B7FA6'}, 64042080);

        !function (d, id, did, st) {
          var js = d.createElement("script");
          js.src = "http://connect.ok.ru/connect.js";
          js.onload = js.onreadystatechange = function () {
          if (!this.readyState || this.readyState == "loaded" || this.readyState == "complete") {
            if (!this.executed) {
              this.executed = true;
              setTimeout(function () {
                OK.CONNECT.insertGroupWidget(id,did,st);
              }, 0);
            }
          }}
          d.documentElement.appendChild(js);
        }(document,"ok_group_widget","53036154552443","{width:220,height:400}");
        </script>
    </div>
    <div class="blog_plugins">
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/ru_RU/all.js#xfbml=1";
            fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>
        <div class="fb-like-box" data-href="https://www.facebook.com/pages/Prob2bbiz/466134276831947" data-width="220" data-height="400" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="false" data-show-border="true"></div>
    </div>
</div> -->