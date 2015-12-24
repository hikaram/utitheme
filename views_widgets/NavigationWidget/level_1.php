<?php if (isset($navigations['nodes'])) : ?>
<ul id="nav" class="main">
    <?php foreach($navigations['nodes'] as $navigation) : ?>
    <?php if ($navigation['is_visible_current']) : ?>
    <li class=" <?php if(isset($navigation['active'])){echo 'active';} ?> <?php echo (isset($navigation['nodes'])) ? 'dropdown' : '' ?>">
        <? if ((!empty($navigation['secret_name'])) && (!empty($navigation['raw_name'])) && (!empty($navigation['file_ext']))) :?>
            <?=CHtml::image(MSmarty::attachment_get_file_name($navigation['secret_name'], $navigation['raw_name'], $navigation['file_ext'], '_menu', 'navigation_ico'), '', array('style' => 'display: inline-block; margin-bottom: 0;')); ?>
        <? else : ?>
        <? endif; ?>    
        <a href="<? if ((!Yii::app()->urlManager->_defaultLang) && ($navigation['object_alias'] != 'external_link')) : ?>/<?=Yii::app()->language?><? endif; ?><?=$navigation['url']?>" target="<?=$navigation['target']?>" style="display: inline-block;"><?=CHtml::encode($navigation['title'])?></a>
        <?=$this->render('level_2', array('navigations' => $navigation), true);?>
    </li>
    <?php endif; ?>
    <?php endforeach; ?>
</ul>
<?php endif; ?>