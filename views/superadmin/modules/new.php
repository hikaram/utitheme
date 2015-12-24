<?php

$this->breadcrumbs=array(
    'Панель управления' => array('/superadmin'),
    'Модули' => array('Modules/index'),
    'Новые' => array('new'),
);

?>

<script>
    $(function(){
        $('#modules').Tree({ });
    });
</script>

<?php
    $i = 1;
?>
<? if (count($modules) == 0) : ?>
<div class="alert alert-info">
Новые модули не найдены.
</div>
<? else: ?>
<table id="modules" class="tablesorter line-small hovertable">
    <tr>
        <th>№</th>
        <th>Путь</th>
        <th>Название</th>
        <th>Краткое описание</th>
        <th colspan="3" style="border-bottom: 1px solid #cccccc;">Версия</th>
        <th>Действия</th>
    </tr>
    <tr>
        <th width="30"></th>
        <th width="200"></th>
        <th width="50"></th>
        <th></th>
        <th width="50">Текущая</th>
        <th width="50">Стабильная</th>
        <th width="50">Последняя</th>
        <th width="155"></th>
    </tr>
    <?php foreach($modules as $key => $module) :?>
    <tr class="tn-container" node="<?=CHtml::encode(str_replace('.', '', $key))?>" parent="<?=CHtml::encode($module['tree']['parent'])?>" children_count="<? if($module['tree']['treeLevel'] == 2) : ?>0<? else :?><?=$module['tree']['childrenCount']?><? endif; ?>" level="<?=$module['tree']['treeLevel']?>">
        <td class="tn-manager">
            <div class="tnm-children"></div>
            <? if($module['tree']['treeLevel'] == 1) : ?>
                <div class="tnm-content">
                    <?=$i++?>
                </div>
            <? endif ?>
        </td>
        <td><?=CHtml::encode($module['info']['path'])?></td>
        <td><?=CHtml::encode($module['info']['name'])?></td>
        <td><?=CHtml::encode($module['info']['brief_description'])?></td>
        <td><?=CHtml::encode($module['info']['version'])?></td>
        <td><?=CHtml::encode($module['info']['version_stable'])?></td>
        <td><?=CHtml::encode($module['info']['version_last'])?></td>
        <td>
            <?=CHtml::form('', 'post')?>
                <?=CHtml::linkButton('Загрузить', array(
                    'submit'=>array(
                        'modules/download/'
                    ),
                    'params'=>array(
                        Yii::app()->request->csrfTokenName => Yii::app()->request->csrfToken,
                        'btnDownload' => 'download',
                        'name' => $module['info']['name'],
                        'version' => $module['info']['version']
                    ),
                    'confirm'=>"Загрузить модуль?"
                ))?>
            <?=CHtml::endForm() ?>
            <?=CHtml::form('', 'post')?>
            <?=CHtml::linkButton('Загрузить и установить', array(
                'submit'=>array(
                    'modules/download/isAuto/' . ModulesController::installTypeInstall
                ),
                'params'=>array(
                    Yii::app()->request->csrfTokenName => Yii::app()->request->csrfToken,
                    'btnDownload' => 'download',
                    'name' => $module['info']['name'],
                    'version' => $module['info']['version']
                ),
                'confirm'=>"Загрузить и установить модуль?\nМодуль будет установлен без возможности изменить путь."
            ))?>
            <?=CHtml::endForm() ?>
            <a href="<?=$this->createUrl('newfullinfo', array('name' => $module['info']['name'], 'version' => $module['info']['version']))?>">Подробно</a><br />
        </td>
    </tr>    
    <?php endforeach; ?>
</table>
<?php endif;?>