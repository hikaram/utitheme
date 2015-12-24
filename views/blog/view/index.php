<?php
$this->breadcrumbs = array(); //clear
$this->breadcrumbs[] = Yii::t('app', 'Блог');
?>
<div class="row">
	<div class="col-md-9 col-sm-9 blog-posts">

		<!-- /// -->
		<?php if (empty($posts)) : ?>
			<?= Yii::t('app', 'Нет записей в боге') ?>
			<?/*<?php if (!empty(Yii::app()->user->id)) : ?>
				<div>
					<?php if (Yii::app()->user->checkAccess('BlogAddpost')) : ?>
						<a style="float: right; position: relative; top: -45px;" href="<?= $this->createUrl('post/add') ?>"><button type="button" class="btn green"><i class="fa fa-plus"></i> <?= Yii::t('app', 'Добавить запись') ?></button></a>
					<?php endif; ?>
				</div> 
			<?php endif; ?>*/ ?>
		<?php else : ?>
			<?/*<?php if (!empty(Yii::app()->user->id)) : ?>
				<?php if (Yii::app()->user->checkAccess('AdminBlogAddPost')) : ?>
					<a style="float: right; position: relative; top: -45px;" href="<?= $this->createUrl('post/add') ?>"><button type="button" class="btn green"><i class="fa fa-plus"></i> <?= Yii::t('app', 'Добавить запись') ?></button></a>
				<?php endif; ?>
			<?php endif; ?>*/ ?>
			<div class="pad-20"></div>
			<?php foreach ($posts as $key => $post) : ?>
				<?php if (($post->can_read == '1')or(Yii::app()->user->checkAccess('Admin')) or(Yii::app()->user->checkAccess('Admin')) ) : ?>
					<div class="row">
						<? if (($post->attachment != NULL) && ($post->attachment->secret_name != null)) : ?>
						<div class="col-md-4 col-sm-4 col-xs-4">
							<?= CHtml::image(MSmarty::attachment_get_file_name($post->attachment->secret_name, $post->attachment->raw_name, $post->attachment->file_ext, '_article_head', 'blog_picture'), '', array('align' => 'left', 'class' => 'img-responsive')); ?>
						</div>
						   <? endif; ?>
						<? if (($post->attachment != NULL) && ($post->attachment->secret_name != null)) : ?>
						<div class="col-md-8 col-sm-8 col-xs-8">
							<? else : ?>
							<div class="col-md-12 col-sm-12">
								<? endif; ?>

								<!-- /// -->
								<?php if ($post->status_id == BlogPosts::STATUS_POST_BLOCKED) : ?>
									<a href="<?= $this->createUrl('view/index', array('id' => $post->blog->id, 'post' => $post->id)) ?>" class="blog_h1"><?= CHtml::encode($post->lang->title) ?></a>
									<p><?= Yii::t('app', 'Запись заблокирована') ?></p>
								<?php else : ?>
									<h2><a href="<?= $this->createUrl('view/index', array('post' => $post->id)) ?>"><?= CHtml::encode($post->lang->title) ?></a></h2>
									<ul class="blog-info">
										<li><i class="fa fa-calendar"></i> <?= BlogPosts::DateHuman($post->created_at) ?></li>
										<li><i class="fa fa-comments"></i> 
											<?php if (empty($post->commentsobject->commentsCount)) : ?>
												<span>Комментариев не добавлено</span>
											<?php else : ?>
												<span>Комментариев:&nbsp;<?= $post->commentsobject->commentsCount ?></span>
											<?php endif; ?>
										</li>
									</ul>
									<p><?= $post->lang->short_text ?></p>
								<?php endif; ?>
								<? if (empty($rubric_id)):?>
	                                <a class="link-underline" href="<?=$this->createUrl('view/index', array('post' => $post->id, ))?>" class="blog_next"><?=Yii::t('app', 'Читать далее...')?></a>
	                            <? else :?>
	                                <a class="link-underline" href="<?=$this->createUrl('view/index', array('rubric' => $rubric_id,'post' => $post->id, ))?>" class="blog_next"><?=Yii::t('app', 'Читать далее...')?></a>
	                            <?endif ?>
	                            <?// vg(Yii::app()->user->checkAccess('BlogEditAuthorpost',array('post'=>$post)));die?>
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
								<!-- /// -->

							</div>
							<!-- col -->
						</div>
						<!-- row -->
					<?php endif; ?>
				<?php endforeach; ?>
			<?php endif; ?>
			<div>
				<?php if ($pages->pageCount > 1) : ?>
					<?php
					$this->widget('CLinkPager', array(
						'pages' => $pages,
						'nextPageLabel' => '<i class="fa fa-angle-double-right"></i>',
						'prevPageLabel' => '<i class="fa fa-angle-double-left"></i>',
						'header' => '',
						'htmlOptions' => array(
							'class' => 'pagination'
						)
					))
					?>
					<div class="pad-20"></div>
				<?php endif; ?>
			</div>
			<!-- ///
	
		</div>
			<!-- col -->
		</div>
		<? if(!empty($rubrics)) : ?>
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
		<? endif ?>	
	</div>
</div>			 
		<!-- row -->
		<!-- <div class="blog_right_side">
			<div class="blog_plugins">
				<script type="text/javascript" src="//vk.com/js/api/openapi.js?105"></script>
				<div id="vk_groups"></div>
			</div> -->
		<!--  <div class="blog_plugins" id="blog_right_side">
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
		 </div> -->
		<!-- </div> -->