<?php
    $this->breadcrumbs['Загрузка по сценарию'] = array('index');
    
    //var_dump(Yii::getPathOfAlias('application.modules.superadmin.img'));
    $urlImg = Yii::app()->assetManager->publish(Yii::getPathOfAlias('application.modules.superadmin.img'));
    
    $style = <<<EOD
       tr span.result { display: none; padding: 3px; background: url($urlImg/001.gif) no-repeat 0px 6px; }
       tr span.stop { display: none; padding: 3px; background: url($urlImg/002.gif) no-repeat 0px 6px; cursor: pointer; }
       tr span.download { padding: 3px; background: url($urlImg/007.gif) no-repeat 0px 6px; cursor: pointer; }
       tr.download.aborted span.stop { display: none; }
       tr.success span.result { display: inline; }
       tr.download.success span.result { display: none; }
       tr.download span.stop { display: inline; }
EOD;
    
    Yii::app()->clientScript->registerCss('superadmin', $style)
?>
<div class="row">
	<div class="col-md-12">
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="glyphicon glyphicon-cloud-download"></i> Загрузка
				</div>
			</div>
			<div class="portlet-body">
				<div class="table-scrollable">
					<table class="table table-condensed table-hover">
						<tr>
							<th>п.№</th>
							<th>Тип объекта</th>
							<th>Название</th>
							<th>Версия</th>
							<th>Адрес</th>
							<th>Размер (Мб)</th>
							<th>Статус</th>
							<th></th>
							<th>Действия</th>
						</tr>
						<? $i=1; ?>
						<? foreach($this->ListUpload->rules['uploads'] as $rule) : ?>
							<? foreach($rule as $type => $info) : ?>
							<tr class="object">
								<td><?=$i++?></td>
								<td class="type"><?=$type?></td>
								<td class="name"><?=$info['name']?></td>
								<td class="version"><?=$info['version']?></td>
								<td class="url"><?=$info['path']?></td>
								<td class="size"></td>
								<td><progress value="0" max="100"></progress></td>
								<td><span class="result">&nbsp;</span></td>
								<td><span class="download">&nbsp;</span><span class="stop">&nbsp;</span></td>
							</tr>
							<? endforeach; ?>
						<? endforeach; ?>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
    
    max_count = 0;
    current_count = 0;
    
    $(function(){
        start();
        $('.stop').click(function(){
            stop(this);
        });
        $('.download').click(function(){
            object = $(this).closest('tr');
            download(object);
        });
    })
    
    function stop(object)
    {
        object = $(object).closest('tr');
        $.ajax({
            url: '/superadmin/ajaxdownload/stop',
            async: true,
            data: {
                url : $(object).children('.url').html(),
                key : $(object).attr('key'),
                YII_CSRF_TOKEN : app.csrfToken
            }
        });
    }
    
    function start()
    {
        $('.object:not(.download)').each(function(index, object){
            if (current_count <= max_count)
            {
                download(object);
                current_count++;
            }
        });
    }
    
    function download(object)
    {
        $(object).removeClass('aborted');
        
        $.ajax({
            url: '/superadmin/ajaxdownload/index',
            async: true,
            data: {
                url : $(object).children('.url').html(),
                YII_CSRF_TOKEN : app.csrfToken
            }
        }).success(function(data) {
            $(object).children('.size').html(((data.size / 1024 / 1024).toFixed(3))); 
            
            $(object).attr('key', data.key);
            
            $(object).addClass('download');
            
            progress(data, object);
        });
    }
    
    function progress(in_data, object)
    {
        $.ajax({
            url: '/superadmin/ajaxdownload/progress',
            async: true,
            data: {
                url : $(object).children('.url').html(),
                YII_CSRF_TOKEN : app.csrfToken,
                key: in_data.key
            }
        }).success(function(data) {
            
            data.size = data.size - 0;
            in_data.size = in_data.size - 0;
            
            if (data.stop == true)
            {
                current_count--;
                $(object).find('progress').attr('value', '0');
                $(object).addClass('aborted');
                $(object).removeClass('success');
                clear(in_data, object);
                start();
                return;
            }
            if (data.success == true)
            {
                current_count--;
                $(object).addClass('success');
                start();
                clear(in_data, object);
            }
            if (data.success == false && data.stop == false)
            {
                progress(in_data, object);
            }
            
            if (data.size > 0)
            {
                percent = (data.size / in_data.size) * 100;
                $(object).find('progress').attr('value', percent);
            }
        });
    }
    
    function clear(in_data, object)
    {
        $.ajax({
            url: '/superadmin/ajaxdownload/clear',
            async: true,
            data: {
                url : $(object).children('.url').html(),
                YII_CSRF_TOKEN : app.csrfToken,
                key: in_data.key
            }
        });
    }
    
</script>