<select id="<? if (!$id) : ?>Profile_country__id<? else : ?><?=CHtml::encode($id)?><? endif; ?>" name="<? if (!$name) : ?>Profile[country__id]<? else : ?><?=CHtml::encode($name)?><? endif; ?>" class="form-control cities-widget-country" <? if ((bool)$style) : ?>style="<?=CHtml::encode($style)?>"<?endif; ?>>
    <option value="">--</option>
    <?foreach($countries as $key => $country) :?>
        <? if (($country_id != NULL) && ($country_id == $country->id)) : ?>
            <option value="<?=$country->id;?>" selected="selected"><?=$country->lang->name;?></option>
        <? else : ?>    
            <option value="<?=$country->id;?>"><?=$country->lang->name;?></option>
        <? endif; ?>
    <?endforeach;?>
</select>