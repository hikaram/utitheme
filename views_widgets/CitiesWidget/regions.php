<select id="<? if (!$id) : ?>Profile_region__id<? else : ?><?=CHtml::encode($id)?><? endif; ?>" class="form-control cities-widget-region" name="<? if (!$name) : ?>Profile[region__id]<? else : ?><?=CHtml::encode($name)?><? endif; ?>" <? if ((bool)$style) : ?>style="<?=CHtml::encode($style)?>"<?endif; ?>>
    <?=$regions; ?>
</select>