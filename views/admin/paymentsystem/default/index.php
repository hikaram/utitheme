<div class="portlet box yellow">
	<div class="portlet-title">
		<h3 class="caption"><i class="fa fa-folder"></i> <?=Yii::t('app', 'Управление платежными системами')?></h3>
	</div>
    <div class="portlet-body">
        <h4 class="block"><i class="fa fa-gear"></i> <?=Yii::t('app', 'Настройки атрибутов платежных систем')?></h4>
        <ul class="list-group">
            <li class="list-group-item"><a href="<?=$this->createUrl('config/index')?>"><?=Yii::t('app', 'Настройки атрибутов')?></a></li>
        </ul>
		
		<h4 class="block"><i class="fa fa-money"></i> <?=Yii::t('app', 'Настройка курса валют для платежных систем')?></h4>
        <ul class="list-group">
            <li class="list-group-item"><a href="<?=$this->createUrl('config/rate')?>"><?=Yii::t('app', 'Настройка курса')?></a></li>
        </ul>        
        
		<h4 class="block"><i class="fa fa-folder"></i> <?=Yii::t('app', 'Логирование платежных запросов')?></h4>
        <ul class="list-group">
            <li class="list-group-item"><a href="<?=$this->createUrl('log/index')?>"><?=Yii::t('app', 'Просмотр логирования')?></a></li>
        </ul>

    </div>
</div>