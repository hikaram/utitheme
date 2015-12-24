<div id="phoneWrapper_<?=$this->key?>" style="position: relative; vertical-align: top;" keyattr=<?=$this->key?>>
	<div class="plusInputNoMask">+</div>
	<input
		id="<?=CHtml::encode($this->id)?>"
		name="<?=CHtml::encode($this->name)?>"
		type="text"
		autocomplete="off"
		class="<?=CHtml::encode($this->class)?> form-control phoneWidgetClassNoMask"
		value="<?=CHtml::encode($this->value)?>"
		keyattr = <?=$this->key?>
		style="<?=CHtml::encode($this->style)?>; padding-left: 10px;" />
</div>