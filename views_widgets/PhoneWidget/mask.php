<? if (!(bool)$this->includeStyle) : ?>
	<style>
		.regionBackground { background: url(<?=$path?>/img/icons/sprite.png) no-repeat top left; }
		<? foreach ($countriesList as $country) : ?>
			.region<?=CHtml::encode(ucfirst($country->alias))?> { background-position: 0px -<?=(int)($country->sprite_position)?>px; width: 16px; height: 11px; }
		<? endforeach; ?>
		<? $this->includeStyle = TRUE ?>
	</style>
<? endif; ?>

<div id="phoneWrapper_<?=$this->key?>" style="position: relative; vertical-align: top;" keyattr=<?=$this->key?>>
    <div id="countryFlagWrapper_<?=$this->key?>" class="countryFlagWrapper" keyattr=<?=$this->key?>>
		<div class="countryFlag" keyattr=<?=$this->key?>>&nbsp;</div>
    </div>
    <div class="plusInput">+</div>

        <ul class="form-control countriesList heightBlock" style="position: absolute; z-index: 20; top: 33px; display: none;" keyattr=<?=$this->key?>>
            <? foreach ($countriesList as $country) : ?>
                <li class="countryList hideCountry<?if ($country->alias == $this->defaultAlias) :?> defaultRegion<? endif; ?>" paramCode="<?=CHtml::encode($country->code)?>" paramClass="region<?=CHtml::encode(ucfirst($country->alias))?>" keyattr=<?=$this->key?>>
                    <span class="dataFlag regionBackground region<?=CHtml::encode(ucfirst($country->alias))?>"></span>
                    <span class="dataName"><?=CHtml::encode($country->lang->name)?></span>
                    <span class="dataCode">+<?=CHtml::encode($country->code)?></span>
                </li>
            <? endforeach; ?>
        </ul>

    <input
        id="<?=CHtml::encode($this->id)?>"
        name="<?=CHtml::encode($this->name)?>"
        type="text"
		autocomplete="off"
        class="<?=CHtml::encode($this->class)?> form-control phoneWidgetClass"
        value="<?=CHtml::encode($this->value)?>"
		keyattr = <?=$this->key?>
        style="<?=CHtml::encode($this->style)?>; padding-left: 35px;" />
</div>
