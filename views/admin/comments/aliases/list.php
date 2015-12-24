<?php $this->breadcrumbs=array(
    Yii::t('app', 'Панель управления') => array('/admin'),
    Yii::t('app', 'Комментарии') => array('/admin/comments'),
    Yii::t('app', 'Алиасы') => array('index')
);?>
<table class="list" cellpadding="5">
    <?php foreach($aliases as $alias) : ?>
    <? 
	$command='SELECT bpl.title FROM `blog_posts_lang` bpl left join `comments_object_aliases` coa on bpl.blog_posts__id=coa.object_id where coa.object_id=:object_alias';
	$title=Yii::app()->db->createCommand($command)
	->bindValue('object_alias',$alias->object_id)
	->queryScalar();
	//vg($alias->object->title_code);die;?>
	
	<tr>
        <td><?=$alias->id ?></td>
		<td><? eval($alias->object->alias_title_code) ?></td>
        <td><?=CHtml::encode($alias->description) ?></td>
        <td>
            <a href="/admin/comments/aliases/edit/id/<?=CHtml::encode($alias->id) ?>" style="margin:10px"><?=Yii::t('app', 'редактировать')?></a>
            <a href="/admin/comments/aliases/comments/id/<?=CHtml::encode($alias->id) ?>" style="margin:10px"><?=Yii::t('app', 'комментарии')?></a>
        </td>
    </tr>
    <?php endforeach; ?>    
</table>
<?php $this->widget('CLinkPager', array(
    'pages' => $pages
)) ?>