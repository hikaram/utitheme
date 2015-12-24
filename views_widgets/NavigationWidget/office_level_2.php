<?php if (isset($navigations['nodes'])) : ?>
<ul class="sub-menu">
    <?php foreach($navigations['nodes'] as $navigation) : ?>
    <?php if ($navigation['is_visible_current']) : ?>
        <li>
			<? if(isset($navigations['object_alias'])) : ?>
				<? if ($navigation['object_alias'] == "catalog") :?>
					<a href="javascript:void(0);">
						<i class="fa fa-folder-o"></i>
						<span class="title"><?=CHtml::encode($navigation['title'])?></span>
						<? if(isset($navigation['nodes'])) : ?>
							<span class="arrow"></span>
						<? endif; ?>
					</a>
					<?=$this->render('admin_level_3', array('navigations' => $navigation), true);?>
				<? else : ?>
					<a href="<? if ((!Yii::app()->urlManager->_defaultLang) && ($navigation['object_alias'] != 'external_link')) : ?>/<?=Yii::app()->language?><? endif; ?><?=$navigation['url']?>" target="<?=$navigation['target']?>">
						<? if ($navigation['object_alias'] == "pages") :?>
							<i class="fa fa-file-o"></i>
						<? elseif ($navigation['object_alias'] == "link") :?>
							<i class="fa fa-link"></i>
						<? elseif ($navigation['object_alias'] == "external_link") :?>
							<i class="fa fa-external-link"></i>
						<? endif; ?>
						<span class="title"><?=CHtml::encode($navigation['title'])?></span>
						<? if(isset($navigation['nodes'])) : ?>
							<span class="arrow"></span>
						<? endif; ?>
					</a>
				<? endif; ?>
			<? else : ?>
				<i class="fa fa-question-circle"></i> <?=CHtml::encode($navigation['title'])?>
			<? endif; ?>
		</li>
    <?php endif; ?>
    <?php endforeach; ?>
</ul>
<?php endif; ?>