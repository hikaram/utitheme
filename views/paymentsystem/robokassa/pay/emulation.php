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
				<form target="result_iframe" action="<?=$this->createUrl('result')?>" method="POST" class="notredirect-form">
					<input type="hidden" name="OutSum" value="<?=$fields_result['OutSum']?>">
					<input type="hidden" name="InvId" value="<?=$fields_result['InvId']?>">
					<input type="hidden" name="SHP_guid" value="<?=$fields_result['SHP_guid']?>">
					<input type="hidden" name="SignatureValue" value="<?=$fields_result['SignatureValue']?>">
					<input type="submit" value="Эмулировать успешный ответ" title = 'Эмулировать успешный ответ робокассы нашему сайту' class = 'btn green tooltips' data-placement = 'top'	data-original-title = 'Эмулировать успешный ответ робокассы нашему сайту' onClick="$('.notredirect-form').hide();$('.redirect-form-success').show();">
				</form>
				<form target="result_iframe" action="<?=$this->createUrl('result')?>" method="POST" class="notredirect-form">
					<input type="hidden" name="OutSum" value="<?=$fields_result['OutSum']?>">
					<input type="hidden" name="InvId" value="<?=$fields_result['InvId']?>">
					<input type="hidden" name="SHP_guid" value="<?=$fields_result['SHP_guid']?>">
					<input type="hidden" name="SignatureValue" value="">
					<input type="submit" value="Эмулировать ошибочный ответ" title = 'Эмуляция ответа неудачной оплаты от сервера платежной системы' class = 'btn red tooltips' data-placement = 'top'	data-original-title = 'Эмуляция ответа неудачной оплаты от сервера платежной системы' onClick="$('.notredirect-form').hide();$('.redirect-form-fail').show();">
				</form>
				<form action="<?=$this->createUrl('success')?>" method="POST" style="display: none;" class="redirect-form-success">
					<input type="hidden" name="OutSum" value="<?=$fields_common['OutSum']?>">
					<input type="hidden" name="InvId" value="<?=$fields_common['InvId']?>">
					<input type="hidden" name="SHP_guid" value="<?=$fields_common['SHP_guid']?>">
					<input type="hidden" name="SignatureValue" value="<?=$fields_common['SignatureValue']?>">
					<input type="submit" value="Эмулировать успешную оплату" title = 'Эмулировать: браузер пользователя направляется на страницу успешной оплаты' class = 'btn green tooltips' data-placement = 'top'	data-original-title = 'Эмулировать: браузер пользователя направляется на страницу успешной оплаты'>
				</form>
				<form action="<?=$this->createUrl('fail')?>" method="POST" style="display: none;" class="redirect-form-fail">
					<input type="hidden" name="OutSum" value="<?=$fields_common['OutSum']?>">
					<input type="hidden" name="InvId" value="<?=$fields_common['InvId']?>">
					<input type="hidden" name="SHP_guid" value="<?=$fields_common['SHP_guid']?>">
					<input type="submit" value="Эмулировать отказ от оплаты" title = 'Эмулировать: браузер пользователя направляется на страницу с ошибкой оплаты' class = 'btn red tooltips' data-placement = 'top'	data-original-title = 'Эмулировать: браузер пользователя направляется на страницу с ошибкой оплаты' >
				</form>
         
       
 </div>
