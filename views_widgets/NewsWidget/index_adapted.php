<? if ($news == null) : ?><?=Yii::t('app', 'Новостей нет')?>
<? else : ?>        
    <? foreach ($news as $key => $new) : ?>
        <div class="news-date"><?=MSmarty::date_format($new->publication_from, 'd.m.Y')?> <?=MSmarty::date_format($new->publication_from, '%H:%M')?>, <?=MSmarty::day_of_week($new->publication_from)?></div>
        <p><?=CHtml::encode($new->lang->brief_text)?></p>     
    <? endforeach; ?>
<? $this->widget('CLinkPager', array('pages' => $pages))?>
<? endif; ?>
