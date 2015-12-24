<div class="row">
	<div class="col-md-12">
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="glyphicon glyphicon-save"></i> Загрузка и установка
				</div>
			</div>
			<div class="portlet-body">
				<div align="center">    
					<h2>
						<b><span id="time" style="display: none;"></span></b><br>
						Выполняется загруженный сценарий...<br />
						Не разрывайте соединение с Web-сервером.<br />
						По завершению выполнения сценария Вы будете перенаправлены с этой страницы<br /><br />
						Выполняется:<br />
						<? if (((bool)$countprocess['uploads']['package']) && ((bool)$countprocess['uploads']['module'])) : ?>
							&nbsp;&nbsp;Загрузка пакетов: <?=$countprocess['uploads']['package']?>,<br />
							&nbsp;&nbsp;Загрузка модулей: <?=$countprocess['uploads']['module']?><br />
						<? elseif ((bool)$countprocess['uploads']['package']) : ?>
							&nbsp;&nbsp;Загрузка пакетов: <?=$countprocess['uploads']['package']?><br />
						<? elseif ((bool)$countprocess['uploads']['module']) : ?>
							&nbsp;&nbsp;Загрузка модулей: <?=$countprocess['uploads']['module']?><br />
						<? endif; ?>
						
						<? if (((bool)$countprocess['installs']['package']) && ((bool)$countprocess['installs']['module'])) : ?>
							&nbsp;&nbsp;Установка пакетов: <?=$countprocess['installs']['package']?>, <br />
							&nbsp;&nbsp;Установка модулей: <?=$countprocess['installs']['module']?><br />
						<? elseif ((bool)$countprocess['installs']['package']) : ?>
							&nbsp;&nbsp;Установка пакетов: <?=$countprocess['installs']['package']?><br />
						<? elseif ((bool)$countprocess['installs']['module']) : ?>
							&nbsp;&nbsp;Установка модулей: <?=$countprocess['installs']['module']?><br />
						<? endif; ?>
						<br /><br />
						Всего позиций для обработки: <?=$countprocess['total']?><br />
						Обработано: <?=$countprocess['success']?><br />
						В ожидании: <?=$countprocess['total'] - $countprocess['success']?><br />
						
						<br /><br />
						Статус выполнения:
						<div class="progress">
							<div class="progress-bar progress-bar-info" style="width: <?=sprintf('%.1f', $countprocess['percent'])?>%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="20" role="progressbar">
								<span class="sr-only"> <?=sprintf('%.1f', $countprocess['percent'])?>% выполнено</span>
							</div>
						</div>
						
					</h2>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">

	var i = 1;
	
	function time()
	{
		document.getElementById("time").innerHTML = i;
		i--;
		if (i == 0)
		{
			location.href = '/superadmin/install/list'
		} 
	}
	
	$(function() {
		time();
		setInterval(time, 1000);

	});	
	
</script>
