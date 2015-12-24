<?php $this->breadcrumbs=array(
    'Панель управления' => array('/admin'),
    'Рубрики блога' => array('')
);?>
<?//vg($rubrics);die;?>

<?php if (count($rubrics) == 0) : ?>
	<? if (Yii::app()->user->checkAccess('AdminBlogPosts')) : ?>	
		<?=CHtml::link(Yii::t('app', 'Статьи'), $this->createUrl('index'),array('class' => "btn green-seagreen"))?>
	<? endif; ?>	
	<div class="note note-success" style="margin-top:25px">
		<?=Yii::t('app', 'Еще не создано ни одной рубрики. Вы можете')?> <?=CHtml::link(Yii::t('app', 'создать'), $this->createUrl('/admin/blog/index/createrubrics'))?> <?=Yii::t('app', 'сейчас')?>.
	</div>
<?php else : ?>
	<? if (Yii::app()->user->checkAccess('AdminBlogAddRubric')) : ?>
		 <?=CHtml::link(Yii::t('app', 'Добавить рубрику'), $this->createUrl('/admin/blog/index/createrubrics'),array('class' => "btn green-seagreen"))?>	
	<? endif; ?>	
	<? if (Yii::app()->user->checkAccess('AdminBlogPosts')) : ?>	
		<?=CHtml::link(Yii::t('app', 'Статьи'), $this->createUrl('index'),array('class' => "btn green-seagreen",'style' => 'margin-left:15px'))?>
	<? endif; ?>	
    <div class="portlet box yellow" style=" margin-top: 25px;">
    <div class="portlet-title">
        <h3 class="caption"><i class="fa fa-book" style="margin-right: 10px;"></i><?=Yii::t('app','Рубрики') ?></h3>
    </div>
		<div class="portlet-body">
                <table class="nav-list table-hover" id="rubrics" style="width: 100%;">
					<tbody>	
						<?php foreach($rubrics as $rubric) : ?>
							<tr class="tn-container" node="<?=$rubric->id?>" parent="<?=$rubric->parent_id?>" children_count="<?=$rubric->getChild()?>" level="<?=$rubric->tree_level?>">
                                <td class="tn-manager" style="width: 50%;">
                                    <div class="tnm-children">
                                        <span class="fa fa-plus-square-o tnm-toggle-fa" mode="firstline" action="expand"></span>
                                        <span class="fa fa-minus-square-o tnm-toggle-fa" mode="firstline" action="expand"></span>
                                    </div>
                                    <div class="tnm-content">
                                        <? if ($rubric->tree_level == (int)TRUE) : ?>
                                            <i class="fa fa-folder"></i>
                                            <i class="fa fa-folder-open"></i>
                                        <? else : ?>
                                            <i class="fa fa-link"></i>
                                        <? endif; ?>
                                        <?=$rubric->lang->name?>
                                    </div>
                                    <div class="floater"></div>
                                </td>                            
								<td class="text-center">
									<div>
										<a href="<?=$this->createUrl('index/editrubric', array('id' => $rubric->id))?>" data-container = "body" data-placement = "top" data-original-title = "<?=Yii::t('app','Редактировать')?>"><i class="glyphicon glyphicon-pencil"></i><?=Yii::t('app','Редактировать')?></a>
										
                                            <? if ($rubric->checkDel()) : ?>
                                                <a href="<?=$this->createUrl('index/deleterubric', array('id' => $rubric->id))?>" onClick="if (!confirm('<?=Yii::t('app','Вы действительно хотите удалить рубрику?')?>')){return false;}" data-container = "body" data-placement = "top" data-original-title = "<?=Yii::t('app','Удалить')?>"><i class="glyphicon glyphicon-remove"></i><?=Yii::t('app','Удалить')?></a>
                                            <? endif; ?>
										
									</div>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>	
				</table>
			
    </div>
</div>
<? 
    //$this->widget('CLinkPager', array(
    //    'pages' => $pages                
    //    )
    //);
            
?>  
	
<?php endif?>