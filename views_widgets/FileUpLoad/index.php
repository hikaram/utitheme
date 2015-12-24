<script type="text/javascript">
	
	var globalcsrfToken = '<?= Yii::app()->request->csrfToken ?>';
    //Избавляем себя от лишнего стука по клаве и сокрашяем код
	/*function ge(id) 
	{
		return document.getElementById(id);
	}*/
	// Как только страничка загрузилась
	window.onload = function () 
	{
		// проверяем поддерживает ли браузер FormData
		if(!window.FormData) 
		{
			
			/*
			 * если не поддерживает, то выводим
			 * то выводим предупреждение вместо формы
			 */
			 var div = $('form#<?= $key; ?> .block_load_file');
			 div.innerHTML = "Ваш браузер не поддерживает объект FormData";
			 div.className = 'notSupport';
			}
		}
		
		
		
		function sendForm(form,key) 
		{
			$('form#'+key+' .status').html('');
			$('form#'+key+' .status').hide();
			var data = new FormData(form),
			
        /*
         * Использовать кроссбраузерный способ создания
         * не имеет смысла т.к. браузеры для для которых,
         * XMLHttpRequest (xhr) создаётся по-другому, не поддерживают FormData
         */
         
         xhr = new XMLHttpRequest(),
         
         progressBar = document.querySelector('form#'+key+' progress'),
         goBtn = $('form#'+key+' .go'),
         fileInp = $('form#'+key+' .file'),
         nameInp = $('form#'+key+' .YII_CSRF_TOKEN');
         if(nameInp.value == '' && fileInp.value == '') 
         {
         	$('form#'+key+' .status').innerHTML = 'Заполните поля!';
         	return false;
         } 
         else 
         	if(nameInp.value == '') 
         	{
         		$('form#'+key+' .status').innerHTML = 'CSRF_TOKEN!';
         		return false
         	} 
         	else 
         		if(fileInp.value == '') 
         		{
         			$('form#'+key+' .status').innerHTML = 'Выберите файл!';
         			return false;
         		}

         		$('form#'+key+' .status').innerHTML = '';
         		xhr.open('POST', form.action);
         		xhr.onload = function (e) {
         			<?
         			if (!empty($after_loading_js_code))
         			{
         				echo $after_loading_js_code;
         			}
         			?>
         			$('form#'+key+' .progress-bar').addClass('no-transition');
         			$('form#'+key+' .proccent').html('0%');
         			$('form#'+key+' .progress-bar').width(0);
         			
         			if(e.currentTarget.responseText)
         			{
         				$('form#'+key+' .status').html(e.currentTarget.responseText);
         				$('form#'+key+' .status').show();
         			}
         			<?
         			if (!empty($callback_after_upload))
         			{
         				echo $callback_after_upload;
         			}
         			?>
         		}
         		xhr.upload.onprogress = function (e) {
         			<? if ($progressbar == TRUE): ?>
				//progressBar.value = Math.round(e.loaded / e.total * 100);
				$('form#'+key+' .progress-bar').removeClass('no-transition');
				$('form#'+key+' .proccent').html((Math.round(e.loaded / e.total * 100)) + '%');
				$('form#'+key+' .pBar').html((Math.round(e.loaded / e.total * 100)) + '%');
				
				$('form#'+key+' .progress-bar').width((Math.round(e.loaded / e.total * 100)) + '%');
			<? endif; ?>
			
			<? if (!empty($upload_js_function)): ?>
			<? echo $upload_js_function . "(e.loaded / e.total * 100).toFixed(2);"; ?>
		<? else: ?>    
		
	<? endif; ?>
}
xhr.error = function (e){
}
xhr.send(data);
return false;
}

</script>

<div class="block_load_file">
	<form 
	id="<?= $key; ?>" 
	action="<?= Yii::app()->createUrl($action) ?>" 
	method="post" 
	class="load_file_form register" 
	enctype="multipart/form-data" 
	onsubmit="return sendForm(this,'<?= $key; ?>')"
	>
	<input type="hidden" name="YII_CSRF_TOKEN" value='<?= Yii::app()->request->csrfToken ?>' />
	<div class="input-group input-large fileUpload mb20">
		<input type="text" class="form-control file-path" readonly />
		<span class="input-group-btn">
			<span class="btn blue-chambray"><?=Yii::t('app', 'Обзор')?></span>
		</span>
		<input type="file" name="file" min="1" max="10" class="hidden file load_file_file" multiple="true" 
		<?
		if (!empty($accept))
		{
			echo "accept='" . $accept . "'";
		}
		?>>
	</div>
	<? if ($progressbar == TRUE): ?>
        <!--<div style="position: relative; vertical-align: bottom;">
			<progress class="pBar" min="0" max="100" value="0"  style="height: 19px; width: 226px;"></progress>
			
			<span style="position: absolute; top: -4px; left: 49%;" class="proccent">0%</span>
		</div>-->
		<div style="position: relative;" class="input-large">
			<div class="progress input-large">
				<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
			</div>
			<span style="position: absolute; top: 0; left: 330px;" class="proccent">0%</span>
		</div>
	<? endif; ?>
	<div class="status text-error mb20 help-block font-red"></div>
	<input type="submit" name="go" value="<?=Yii::t('app', 'Загрузить')?>" class="btn green" />
	<?=Chtml::link(Yii::t('app', 'Отмена'), 'javascript: void(0)', array('onClick' => 'hidePhoto()', 'class' => 'btn red'));?>
</form>
</div>

<script>
	$('.fileUpload .btn').click(function(){
		$(this).closest('.fileUpload').find('input[type="file"]').click();
	})
	
	$('.fileUpload input[type="file"]').change(function(){
		val = $(this).val().split("\\");
		$(this).closest('.fileUpload').find('.file-path').val(val[val.length-1]);
	})
</script>