<? if (Yii::app()->user->username == Yii::app()->params['superAdminInfo']['username']) : ?>
	<h3><?=Yii::t('app', 'Включена пошаговая регистрация и не создано ни одного шага.')?></h3>
	

	<?=Yii::t('app', 'Отключите')?>&nbsp;&nbsp;<?=CHtml::link(Yii::t('app', 'пошаговую регистрацию'), $this->createUrl('/admin/register/config'))?>&nbsp,&nbsp&nbsp&nbsp
	<?=Yii::t('app', 'или создайте')?>&nbsp;&nbsp;<?=CHtml::link(Yii::t('app', 'шаги регистрации'), $this->createUrl('/admin/register/steps'))?>
	<br /><br />
<? else : ?>
	<?=Yii::t('app', 'В настоящее время управление регистрацией недоступно')?>
<? endif; ?>