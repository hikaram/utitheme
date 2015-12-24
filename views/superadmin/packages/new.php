<script>
    $(function(){
        $('#packages').Tree();
    });
</script>
<?php
    $this->breadcrumbs['Новые пакеты'] = array('index');
    $i = 1;
?>
<? if (count($packages) == 0) : ?>
Новые модули не найдены.
<? else: ?>
<table id="packages" class="tablesorter line-small hovertable">
    <tr>
        <th>№</th>
        <th>Название</th>
        <th>Краткое описание</th>
        <th colspan="3" style="border-bottom: 1px solid #cccccc;">Версия</th>
        <th>Действия</th>
    </tr>
    <tr>
        <th width="30"></th>
        <th width="200"></th>
        <th></th>
        <th width="50">Текущая</th>
        <th width="50">Стабильная</th>
        <th width="50">Последняя</th>
        <th width="155"></th>
    </tr>
    <?php foreach($packages as $key => $package) :?>
    <tr class="tn-container" node="<?=CHtml::encode(str_replace('.', '', $key))?>" parent="<?=CHtml::encode($package['tree']['parent'])?>" children_count="<? if($package['tree']['treeLevel'] == 2) : ?>0<? else :?><?=$package['tree']['childrenCount']?><? endif; ?>" level="<?=$package['tree']['treeLevel']?>">
        <td class="tn-manager">
            <div class="tnm-children"></div>
            <? if($package['tree']['treeLevel'] == 1) : ?>
                <div class="tnm-content">
                    <?=$i++?>
                </div>
            <? endif ?>
        </td>
        <td><?=CHtml::encode($package['info']['name'])?></td>
        <td><?=CHtml::encode($package['info']['brief_description'])?></td>
        <td><?=CHtml::encode($package['info']['version'])?></td>
        <td><?=CHtml::encode($package['info']['version_stable'])?></td>
        <td><?=CHtml::encode($package['info']['version_last'])?></td>
        <td>
            <?=CHtml::form('', 'post')?>
                <?=CHtml::linkButton('Загрузить', array(
                    'submit'=>array(
                        'packages/download/'
                    ),
                    'params'=>array(
                        Yii::app()->request->csrfTokenName => Yii::app()->request->csrfToken,
                        'btnDownload' => 'download',
                        'name' => $package['info']['name'],
                        'version' => $package['info']['version']
                    ),
                    'confirm'=>"Загрузить пакет?"
                ))?>
            <?=CHtml::endForm() ?>
            <?=CHtml::form('', 'post')?>
            <?=CHtml::linkButton('Загрузить и установить', array(
                'submit'=>array(
                    'packages/download/isAuto/' . PackagesController::installTypeInstall
                ),
                'params'=>array(
                    Yii::app()->request->csrfTokenName => Yii::app()->request->csrfToken,
                    'btnDownload' => 'download',
                    'name' => $package['info']['name'],
                    'version' => $package['info']['version']
                ),
                'confirm'=>"Загрузить и установить пакет?"
            ))?>
            <?=CHtml::endForm() ?>
            <a href="<?=$this->createUrl('newfullinfo', array('name' => $package['info']['name'], 'version' => $package['info']['version']))?>">Подробно</a><br />
        </td>
    </tr>
    <?php endforeach; ?>
</table>
<?php endif;?>