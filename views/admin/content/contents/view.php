<div class="portlet box blue-steel">
	<div class="portlet-title">
		<h3 class="caption">
			<i class="glyphicon glyphicon-eye-open"></i>
			<?=Yii::t('app', 'Просмотр текстового блока')?> "<?=$model->name?>"
		</h3>
	</div>
    <div class="portlet-body">
        <?=$model->lang->text?>
    </div>
</div>

<a href="<?=$this->createUrl('index')?>"><?=Yii::t('app', 'Вернуться к списку блоков')?></a>