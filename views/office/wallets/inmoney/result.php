<h2><?=$message?>   <b><span id="timespan"></span></b></h2>

<script type="text/javascript">
 
$(function(){
    timekj(5);
});


function timekj(i){
    $('#timespan').html(i);

//уменьшение счетчика
 if (i == 0)
 {
     location.href = "<?=Yii::app()->urlManager->createUrl('/office/wallets')?>";//редирект
 } 
 else
 {
     i=i-1;
        setTimeout(function(){timekj(i)}, 1000);
 }
  
}

</script>
