<select id="<? if (!$id) : ?>Profile_city__id<? else : ?><?=CHtml::encode($id)?><? endif; ?>" class="form-control cities-widget-city" name="<? if (!$name) : ?>Profile[city__id]<? else : ?><?=CHtml::encode($name)?><? endif; ?>" <? if ((bool)$style) : ?>style="<?=CHtml::encode($style)?>"<?endif; ?>>
    <?=$cities; ?>
</select>
