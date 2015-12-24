<?php $this->layout = 'office'; ?>
<div class="note note-success">
	<h3 class="block"><?=$message?></h3>
	<p>
		<?=Yii::t('app', 'Автоматическая передаресация произойдет через')?> <strong><span id="timespan">5</span> <?=Yii::t('app', 'секунд')?></strong>.<br/>
	</p>
	<p>
		<?=Yii::t('app', 'Если передаресация не произошлa, перейдите')?> <?=CHtml::link(Yii::t('app', 'по этой ссылке'), Yii::app()->urlManager->createUrl('/office/wallets'))?>.
	</p>
</div>
<script type="text/javascript">

$(function(){
    timekj(5);
});

function timekj(i){
    $('#timespan').html(i); //уменьшение счетчика
	if (i == 0)
	{
		location.href = "<?=Yii::app()->urlManager->createUrl('/office/wallets')?>";
	} 
	else
	{
		i = i - 1;
		setTimeout(function(){timekj(i)}, 1000);
		$('#timespan').text(i);
	}
}

</script>