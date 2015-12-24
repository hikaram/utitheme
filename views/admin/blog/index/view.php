<style>

</style>

<?php
$this->breadcrumbs[Yii::t('app', 'Статьи блога')] = $this->createUrl('index');
$this->breadcrumbs[Yii::t('app', 'Просмотр статьи блога')] = $this->createUrl('view', array('post' => $post->id));
?>
<div class="portlet box blue-steel">
	<div class="portlet-title">
		<h3 class="caption">
			<i class="glyphicon glyphicon-eye-open" style="margin-right: 10px;"></i> <?=Yii::t('app','Просмотр статьи блога')?>
		</h3>
		<div class="tools">
			<?=CHtml::link(Yii::t('app', "<i class='fa fa-pencil'></i>"), $this->createUrl('edit', array('post' => $post->id)), array('class' => 'mr5'))?>
		</div>
	</div>
	<div class="portlet-body">
		<div class="row mt20">
			<div class="col-md-3">
				<h4 class="h4-label"><?=$post->getAttributeLabel('blog_rubrics__id')?></h4>
			</div>
			<div class="col-md-9">
				<h4><?=CHtml::encode(!empty($post->rubrics[0]->rubric->lang->name)?$post->rubrics[0]->rubric->lang->name:"") ?></h4>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-3">
				<h4 class="h4-label"><?=$post->getAttributeLabel('can_comment')?></h4>
			</div>
			<div class="col-md-9">
				<h4><?=CHtml::encode(($post->can_comment==1)?Yii::t('app','включен'):Yii::t('app','выключен')) ?></h4>
			</div>
		</div>	
		
		<div class="row">
			<div class="col-md-3">
				<h4 class="h4-label"><?=$post->lang->getAttributeLabel('title')?></h4>
			</div>
			<div class="col-md-9">
				<h4><?=CHtml::encode($post->lang->title) ?></h4>
			</div>
		</div>
		
        <div class="row">
			<div class="col-md-3">
				<h4 class="h4-label"><?=$post->getAttributeLabel('publication_post')?></h4>
			</div>
			<div class="col-md-9">
				<h4><?=MSmarty::date_format($post->publication_post, 'd.m.Y')?> <?=MSmarty::date_format($post->publication_post, '%H:%M')?></h4>
			</div>
		</div>
        
		<div class="row">
			<div class="col-md-3">
				<h4 class="h4-label"><?=$post->getAttributeLabel('status_id')?></h4>
			</div>
			<div class="col-md-9">
				<h4><?=CHtml::encode(BlogPosts::LabelsStatus($post->status_id)) ?></h4>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-3">
				<h4 class="h4-label"><?=$post->getAttributeLabel('can_read')?></h4>
			</div>
			<div class="col-md-9">
				<h4><?=CHtml::encode(BlogPosts::LabelsRead($post->can_read)) ?></h4>
			</div>
		</div>	
		
		<div class="row">
			<div class="col-md-3">
				<h4 class="h4-label"><?=$post->lang->getAttributeLabel('description')?></h4>
			</div>
			<div class="col-md-9">
				<h4><?=CHtml::encode($post->lang->description) ?></h4>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-3">
				<h4 class="h4-label"><?=$post->lang->getAttributeLabel('keywords')?></h4>
			</div>
			<div class="col-md-9">
				<h4><?=CHtml::encode($post->lang->keywords) ?></h4>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-3">
				<h4 class="h4-label"><?=$post->lang->getAttributeLabel('short_text')?></h4>
			</div>
			<div class="col-md-9">
				<h4><?=$post->lang->short_text ?></h4>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-3">
				<h4 class="h4-label"><?=$post->lang->getAttributeLabel('text')?></h4>
			</div>
			<div class="col-md-9">
				<h4><?=$post->lang->text ?></h4>
			</div>
		</div>	
		
		<div class="row">
			<div class="col-md-3" >
				<h4 class="h4-label"><?=Yii::t('app','Картинка')?></h4>
			</div>
			<div class="col-md-9">
				<? if (($post->attachment != NULL) && ($post->attachment->secret_name != null)) : ?><?= CHtml::image(MSmarty::attachment_get_file_name($post->attachment->secret_name, $post->attachment->raw_name, $post->attachment->file_ext, '_article_head', 'blog_picture'), ''); ?>
				<? else : ?> <h4><?= Yii::t('app', 'Отсутствует') ?></h4>
				<? endif ; ?>
			
			</div>
			
		</div>			

							
					<?/*	<div class="row">
			<div class="col-md-3 text-right">
				<h4 class="h4-label"><?=$model->getAttributeLabel('from')?></h4>
			</div>
			<div class="col-md-9">
				<h4><?=CHtml::encode($model->from)?></h4>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3 text-right">
				<h4 class="h4-label"><?=$model->getAttributeLabel('to')?></h4>
			</div>
			<div class="col-md-9">
				<h4><?=CHtml::encode($model->to)?></h4>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3 text-right">
				<h4 class="h4-label"><?=$model->getAttributeLabel('altbody')?></h4>
			</div>
			<div class="col-md-9">
				<h4><?=CHtml::encode($model->altbody)?></h4>
			</div>
		</div>
		<div class="row mb20">
			<div class="col-md-3 text-right">
				<h4 class="h4-label"><?=$model->getAttributeLabel('body')?></h4>
			</div>
			<div class="col-md-9">
				<h4><?=CHtml::encode($model->body)?></h4>
			</div>
		</div>*/?>
	</div> 
</div>
<a href="<?=$this->createUrl('index')?>" class="btn yellow btn-icon tooltips" data-container = "body" data-placement = "top" data-original-title = "<?=Yii::t('app',' Вернуться к списку статей')?>"><?=Yii::t('app',' Вернуться к списку статей')?></a>
<a href="<?=$this->createUrl('edit', array('post' => $post->id))?>" class="btn green-seagreen btn-icon tooltips" data-container = "body" data-placement = "top" data-original-title = "<?=Yii::t('app','Редактировать')?>"><?=Yii::t('app','Редактировать')?></a>