<div>
    <? if ($type == 'main') : ?>
        <div><?=Yii::t('app', 'На Ваш Email была отправлена инструкция по восстановлению пароля')?></div>
    <? else : ?>
        <div><?=Yii::t('app', 'На Ваш Email была отправлена инструкция по восстановлению финансового пароля')?></div>
    <? endif; ?>    
</div>