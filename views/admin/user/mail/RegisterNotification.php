<p><?=Yii::t('app', 'Уважаемый')?> <?=CHtml::encode($user->profile->lang->last_name)?> <?=CHtml::encode($user->profile->lang->first_name)?></p>
<p><?=Yii::t('app', 'Вы зарегистрировались на сайте')?> <?=$_SERVER['HTTP_HOST']?></p>
<p> <?=Yii::t('app', 'Ваш логин')?>: <?=CHtml::encode($user->username)?><br />
    <?=Yii::t('app', 'Ваш пароль')?>: <?=CHtml::encode($user->password)?></p>

<p><?=Yii::t('app', 'С Уважением, Администрация сайта')?> <a href="<?=$_SERVER['HTTP_HOST']?>"><?=$_SERVER['HTTP_HOST']?></a></p>