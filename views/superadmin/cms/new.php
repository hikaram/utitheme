<?php
    $this->breadcrumbs['Доступные для загрузки обновления'] = array('index');
    $i = 1;
?>
<? if (count($cms) == 0) : ?>
Новые модули не найдены.
<? else: ?>
<table class="tablesorter line-small">
    <tr>
        <th>№</th>
        <th>Краткое описание</th>
        <th colspan="3" style="border-bottom: 1px solid #cccccc;">Версия</th>
        <th>Действия</th>
    </tr>
    <tr>
        <th width="30"></th>
        <th></th>
        <th width="50">Текущая</th>
        <th width="50">Стабильная</th>
        <th width="50">Последняя</th>
        <th width="80"></th>
    </tr>
    <?php foreach($cms as $application) :?>
    <tr>
        <td><?=$i++?></td>
        <td><?=CHtml::encode($application['info']['brief_description'])?></td>
        <td><?=CHtml::encode($application['info']['version'])?></td>
        <td><?=CHtml::encode($application['info']['version_stable'])?></td>
        <td><?=CHtml::encode($application['info']['version_last'])?></td>
        <td>
            <?=CHtml::form('', 'post')?>
                <?=CHtml::linkButton('Загрузить', array(
                    'submit'=>array(
                        'cms/download/'
                    ),
                    'params'=>array(
                        Yii::app()->request->csrfTokenName => Yii::app()->request->csrfToken,
                        'btnDownload' => 'download',
                        'version' => $application['info']['version']
                    ),
                    'confirm'=>"Загрузить обновления?"
                ))?>
            <?=CHtml::endForm() ?>
            <a href="<?=$this->createUrl('newfullinfo', array('version' => $application['info']['version']))?>">Подробно</a><br />
        </td>
    </tr>
    <?php endforeach; ?>
</table>
<?php endif;?>