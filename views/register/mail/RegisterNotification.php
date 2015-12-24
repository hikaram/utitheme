<p><?=Yii::t('app', 'Уважаемый')?> <?=CHtml::encode($user->profile->lang->last_name)?> <?=CHtml::encode($user->profile->lang->first_name)?>!</p>

<p><?=Yii::t('app', 'Поздравляем Вас с регистрацией')?>.</p>

<p><?=Yii::t('app', 'Ваш логин и пароль для входа в кабинет')?> - <br />
	&nbsp;&nbsp;<?=Yii::t('app', 'логин')?>: <?=CHtml::encode($user->username)?><br />
    &nbsp;&nbsp;<?=Yii::t('app', 'пароль')?>: <?=CHtml::encode($user->password)?>
</p>
	
<p><?=Yii::t('app', 'Рады видеть Вас нашим партнером')?>!</p>

<p><?=Yii::t('app', 'Сохраните данное письмо')?>.</p>