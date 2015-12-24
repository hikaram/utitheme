<style>
	.clear {
    clear: both;
}
</style>

<?php $this->breadcrumbs=array(
    Yii::t('app', 'Панель управления') => array('/admin'),
    Yii::t('app', 'Статьи блога') => array(''),
);?>

<?php if ((count($posts) == 0) and (empty($filter))) : ?>
	<? if (Yii::app()->user->checkAccess('AdminBlogRubrics')) : ?>	
		<?=CHtml::link(Yii::t('app', 'Рубрики'), $this->createUrl('rubrics'),array('class' => "btn green-seagreen"))?>
	<? endif; ?>	
	<div class="note note-success" style="margin-top:25px">
		<?=Yii::t('app', 'Еще не создано ни одной статьи. Вы можете')?> <?=CHtml::link(Yii::t('app', 'создать'), $this->createUrl('add'))?> <?=Yii::t('app', 'сейчас')?>.
	</div>
<?php else : ?>
	<? if (Yii::app()->user->checkAccess('AdminBlogAddPost')) : ?>
		<?=CHtml::link(Yii::t('app', 'Добавить статью'), $this->createUrl('add'),array('class' => "btn green-seagreen"))?>	
	<? endif; ?>	
	<? if (Yii::app()->user->checkAccess('AdminBlogRubrics')) : ?>	
		<?=CHtml::link(Yii::t('app', 'Рубрики'), $this->createUrl('rubrics'),array('class' => "btn green-seagreen",'style' => 'margin-left:15px'))?>
	<? endif; ?>	
		
	<div class="portlet box yellow" style=" margin-top: 25px;">
		<div class="portlet-title">
			<h3 class="caption"><i class="fa fa-book" style="margin-right: 10px;"></i><?=Yii::t('app','Статьи блога') ?></h3>
		</div>
		<div class="portlet-body">
			<?php echo $this->renderPartial('_filter', array('filter' => $filter, 'posts' => $posts )); ?>
			<div class="table-scrollable" style="margin-top:15px;margin-bottom:15px">
				<table class="table table-hover">
					<thead>
						<tr>
							<th class="text-center">id</th>
							<th class="text-center"><?=Yii::t('app', 'Тема')?></th>
							<th class="text-center"><?=Yii::t('app', 'Рубрика')?></th>
							<th class="text-center"><?=Yii::t('app', 'Статус')?></th>
                            <th class="text-center"><?=Yii::t('app', 'Дата публикации')?></th>
							<th class="text-center"><?=Yii::t('app', 'Могут читать')?></th>
							<th class="text-center"><?=Yii::t('app', 'Действия')?></th>
						</tr>
					</thead>
					<tbody>	
						<?php foreach($posts as $post) : ?>
							<?php if (!empty($post->lang)) : ?>
							<?//$commentsid=$post->commentsobject['id'];?>
							
							<tr>
								<td class="text-center"><?=$post->id ?></td>
								<td class="text-center" style="max-width: 400px;"><?=CHtml::encode($post->lang->title) ?></td>
								<td class="text-center" style="width: 400px;">
                                <? $str = ''; ?>
								<? foreach($post->rubrics as $value) :?>
                                    <? if(!empty($value->rubric->lang->name)): ?>
                                        <? $str .=($post->getFullAdress($value->rubric->upline).','); ?>
                                    <? endif; ?>
								<?endforeach?>
                                <?=rtrim($str,',');?>
								</td>
								<td class="text-center"><?=CHtml::encode(BlogPosts::LabelsStatus($post->status_id)) ?></td>
                                <td class="text-center"><?=MSmarty::date_format($post->publication_post, 'd.m.Y')?> <?=MSmarty::date_format($post->publication_post, '%H:%M')?></td>
								<td class="text-center"><?=CHtml::encode(BlogPosts::LabelsRead($post->can_read)) ?></td>
								<td class="text-center">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td><a href="<?=$this->createUrl('view', array('post' => $post->id))?>" class="btn blue-steel btn-icon tooltips" data-container = "body" data-placement = "top" data-original-title = "<?=Yii::t('app','Просмотр')?>"><i class="glyphicon glyphicon-eye-open"><span style="padding-left: 10px;"></span><?=Yii::t('app','Просмотр')?></i></a></td>
                                            <? if(Yii::app()->user->checkAccess('AdminBlogEditAuthorPost', array('post' => $post))):?>
                                                <td><a href="<?=$this->createUrl('edit', array('post' => $post->id))?>" class="btn green-seagreen btn-icon tooltips" data-container = "body" data-placement = "top" data-original-title = "<?=Yii::t('app','Редактировать')?>"><i class="glyphicon glyphicon-pencil"><span style="padding-left: 10px;"></span><?=Yii::t('app','Редактировать')?></i></a></td>
                                            <?endif?>
                                            <? if(Yii::app()->user->checkAccess('AdminBlogDeleteAuthorPost', array('post' => $post))):?>
                                                <td><a href="<?=$this->createUrl('delete', array('post' => $post->id))?>" onClick="if (!confirm('<?=Yii::t('app','Вы действительно хотите удалить статью?')?>')){return false;}" class="btn red btn-icon tooltips" data-container = "body" data-placement = "top" data-original-title = "<?=Yii::t('app','Удалить')?>"><i class="glyphicon glyphicon-remove"><span style="padding-left: 10px;"></span><?=Yii::t('app','Удалить')?></i></a></td>
                                            <?endif?>
                                            <td><a href="<?=$this->createUrl('/admin/comments/comments/index?filtertitle='. $post->lang->title)?>" class="btn yellow btn-icon tooltips" data-container = "body" data-placement = "top" data-original-title = "<?=Yii::t('app','Комментарии')?>" target="_blank"><i class="fa fa-comments"><span style="padding-left: 10px;"></span><?=Yii::t('app','Комментарии')?></i></a></td>
                                            <td><a href="<?=$this->createUrl('/blog/view/index/', array('post' => $post->id))?>" class="btn blue-steel btn-icon tooltips" data-container = "body" data-placement = "top" data-original-title = "<?=Yii::t('app','Просмотр в блоге')?>" target="_blank"><i class="fa fa-book"><span style="padding-left: 10px;"></span><?=Yii::t('app','В блоге')?></i></a></td>
                                            </tr>
                                        </tbody>
                                    </table>									
								</td>
							</tr>
							<?php endif; ?>
						<?php endforeach; ?>
					</tbody>	
				</table>
			</div>	

			<? 
            Yii::app()->urlManager->appendParams = false;
            $this->widget('CLinkPager', array(
                'pages' => $pages,                 
            ));
            Yii::app()->urlManager->appendParams = true; 
             ?>  
		</div>	
		<div class="clear"></div>
			
				
	</div>	
	<?php endif?>	
	