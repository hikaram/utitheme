<?
	$this->breadcrumbs[Yii::t('app', $this->pageTitle)] = '';
?>

<div class="note note-danger">    
    <h3 class="block"><?=$this->pageTitle;?></h3>
    <p><?=Yii::t('app', 'Платеж не принят.')?></p>
	<p>
		<?=Yii::t('app', 'Автоматическая передаресация произойдет через')?> <strong><span id="time">5</span> <?=Yii::t('app', 'секунд')?></strong>.<br/>
	</p>
	<p>
		<?=Yii::t('app', 'Если передаресация не произошлa, перейдите')?> <?=CHtml::link(Yii::t('app', 'по этой ссылке'), $url)?>.
	</p>
</div>
<script type="text/javascript">
var i = 5;//время в сек.
function time(){
	if (i > 0) {
		document.getElementById("time").innerHTML = i;
	}
	i--;//уменьшение счетчика
	if (i == 0)
	{
		location.href = "<?=$url?>";//редирект
	} 
}
time();
setInterval(time, 1000);
</script>