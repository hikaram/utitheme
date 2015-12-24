<?php $this->layout = 'office'; ?>
<div class="portlet box green">
	<div class="portlet-title">
		<h3 class="caption">
			<i class="fa fa-envelope-o"></i>
			<?= Yii::t('app', 'Ваш Email успешно подтвержден') ?></a>
		</h3>
	</div>
	<div class="portlet-body form form-horizontal">
		<div class=" form-body">
			<div class="note note-warning">
				<h4 class="block"><?=Yii::t('app', 'Дополнительная информация!')?></h4>
				<p>
					<?=Yii::t('app', 'Ваш Email успешно подтвержден')?>
				</p>
			</div>
		</div>
		<div class="buttons form-actions" style="margin-top: 10px;">
			<a href="/office" class="btn green"><?= Yii::t('app', 'Перейти в кабинет') ?></a>
		</div>
	</div>
</div>