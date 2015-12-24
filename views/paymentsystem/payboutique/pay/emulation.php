<style>
form
{
    display: inline-block
}   
</style>    
<hr/>   
<div>
        <iframe name="result_iframe" style="width: 100%">
            
        </iframe>
 </div>  
<hr/> 
 <div>   
    <?php $form=$this->beginWidget('CActiveForm', array('enableAjaxValidation'=>false)); ?>     
                <input type="submit" value="Эмулировать успешный ответ" name="reply_confirmed" title = 'Эмуляция ответа удачной оплаты от сервера платежной системы' class = 'btn green tooltips' data-placement = 'top' data-original-title = 'Эмуляция ответа удачной оплаты от сервера платежной системы'>

                <input type="submit" value="Эмулировать отказ от оплаты" name="reply_canceled" title = 'Эмуляция ответа неудачной оплаты от сервера платежной системы и возврата к сайту' class = 'btn red tooltips' data-placement = 'top'    data-original-title = 'Эмуляция ответа неудачной оплаты от сервера платежной системы и возврата к сайту' >

    <?php $this->endWidget(); ?>     
       
 </div>

<? /*
<?php
    $url = Yii::app()->assetManager->publish(dirname($this->getModule()->getControllerPath()) . DIRECTORY_SEPARATOR . 'img');
?>

 <?php $form=$this->beginWidget('CActiveForm', array('enableAjaxValidation'=>false)); ?>
<style>
    hr{     background: #0066A4;
            height: 1px;
            width: 100%;
            margin: 0;
    }
</style>
<div class="pay_block" align="center">
                <h3>Эмуляция платежной системы PAYBOUTIQUE</h3>
    <table style="width:50%; font-size: 12px;">
        <tr>
            <td align="left" style="background-color:#ffffff;">
                <div style ="height: 100px; color: #05B2D2; overflow: auto; margin: 2px;">
                    <?=$message?>
                </div>    
            </td>
        </tr>
        <tr>
            <td align="center">
               <?php echo CHtml::submitButton('Ответ "оплачено"', array('style'=>'margin-top:10px;', 'name'=>'reply_confirmed')); ?>
                
               <?php echo CHtml::submitButton('Ответ "отменено"', array('style'=>'margin-top:10px; margin-left:50px;', 'name'=>'reply_canceled')); ?>
               
               <?php echo CHtml::submitButton('Назад', array('style'=>'margin-top:10px; margin-left:50px;', 'name'=>'cancel')); ?>
            </td>
       </tr>
    </table>
 </div>    
<?php $this->endWidget(); ?>
*/ ?>