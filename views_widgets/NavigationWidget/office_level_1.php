<?php if (isset($navigations['nodes'])) : ?>
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
			<?=$this->render('office_level_2', array('navigations' => $navigation), true);?>
		</li>
    <?php endif; ?>
    <?php endforeach; ?>
<?php endif; ?>