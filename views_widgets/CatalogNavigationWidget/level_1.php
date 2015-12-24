<?php if ($level < 5 && isset($modelsCatalogues) && is_array($modelsCatalogues)) : ?>
<ul class="list-group margin-bottom-25 sidebar-menu store-left-menu">
    <?php foreach($modelsCatalogues as $modelCatalog) : ?>
    <? if ($modelCatalog->parent_id == $parent_id) : ?>
        <li class="list-group-item clearfix <? if ($this->isActive($modelCatalog->url)) : ?>active<? endif; ?>">
            <a href="<?=$modelCatalog->url?>"><i class="fa fa-angle-right"></i> <?=CHtml::encode($modelCatalog->lang->name)?></a>
            <?=$this->render('level_1', array('modelsCatalogues' => $modelsCatalogues, 'parent_id' => $modelCatalog->id, 'level' => ++$level), true);?>
        </li>
    <? endif ?>
    <?php endforeach; ?>
</ul>
<?php endif; ?>
