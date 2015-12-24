<?
    $this->breadcrumbs[Yii::t('app', $this->pageTitle)] = '';
?>

<div class="note note-warning" id="message-wrapper">
    <h3 class="block"><?=$this->pageTitle;?></h3>
    <div id="title">
        <p>
            <?=Yii::t('app', 'Платеж обрабатывается, ожидаем подтверждения.')?><br />
            <?=Yii::t('app', 'Время обработки платежа')?>: <span id="time"></span>
        </p>
    </div>
</div>

<script type="text/javascript">

var i = 120;
var start_saccess = true;

$.ajaxSetup({
           type     : "POST",
           async    : false,
           dataType : 'json'
           });
           
function time()
{
    if (i > 0) {
        document.getElementById("time").innerHTML = i;
    }
    i--;
    if (i == 0)
    {
        location.href = app.createAbsoluteUrl("<?=$url?>");
    }
}
function success_transaction ()
{
    $.ajax({
        type: "POST",
        dataType: 'html',
        url:    app.createAbsoluteUrl('paymentsystem/default/saccesstran'),
        data:{
            YII_CSRF_TOKEN: globalcsrfToken, 
            guid_success_transaction: "<?=$guid?>"
        },
        success: function(html){
            if(html == "closed")
            {
                document.getElementById("title").innerHTML = "<p><?=Yii::t('app', 'Платеж подтвержден')?></p><p><?=Yii::t('app', 'Спасибо за ожидание, вы будете перенаправлены через')?> <strong><span id='time'></span> секунд</strong></p><p><?=Yii::t('app', 'Если передаресация не произошлa, перейдите')?> <a href='<?=$url?>'> <?=Yii::t('app', 'по этой ссылке')?></a>.</p>";
                $('#message-wrapper').removeClass('note-warning');
                $('#message-wrapper').addClass('note-success');
                i = 5;
                start_saccess = false;
            }
        }
    });
}
function start_success()
{
    if(start_saccess == true)
    {
        success_transaction ();
    }
}
$(function(){
    time();
    start_success();
    setInterval(time, 1000);
    setInterval(start_success, 10000);
});
</script>