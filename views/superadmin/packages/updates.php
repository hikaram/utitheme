<?php
$this->breadcrumbs=array(
	'Панель управления' => array('index'),
	'Список пакетов' => array('Packages/index'),
);
?>

<h3>Доступные для загрузки обновления</h3>
<hr />
<?php if (empty($packagesNewUpdates)) : ?>
Не найдены
<?php else : ?>
<table>
    <tr>
        <th>Версия</th>
        <th>Дата публикации</th>
        <th>Автор</th>
        <th>Email</th>
        <td>Действия</td>
    </tr>

    <?php foreach($packagesNewUpdates as $packageNewUpdate) : ?>
    <tr>
        <td><?=$packageNewUpdate['info']['version']?></td>
        <td><?=$packageNewUpdate['info']['publication_date']?></td>
        <td><?=$packageNewUpdate['info']['author']?></td>
        <td><?=$packageNewUpdate['info']['email']?></td>
        <td>
            <?=CHtml::form('', 'post')?>
                <?=CHtml::linkButton('Загрузить', array(
                    'submit'=>array(
                        'download',
                    ),
                    'params'=>array(
                        Yii::app()->request->csrfTokenName => Yii::app()->request->csrfToken,
                        'btnDownload' => 'download',
                        'name' => $packageNewUpdate['info']['name'],
                        'version' => $packageNewUpdate['info']['version'],
                    ),
                    'confirm'=>"Загрузить пакет?"
                ))?>
                <br />
                <?=CHtml::linkButton('Загрузить и обновить', array(
                    'submit'=>array(
                        'packages/download/isAuto/' . PackagesController::installTypeUpdate . '/updatedPackage/' . $modelPackage->id,
                    ),
                    'params'=>array(
                        Yii::app()->request->csrfTokenName => Yii::app()->request->csrfToken,
                        'btnDownload' => 'download',
                        'name' => $packageNewUpdate['info']['name'],
                        'version' => $packageNewUpdate['info']['version'],
                    ),
                    'confirm'=>"Загрузить и обновить пакет?"
                ))?>
            <?=CHtml::endForm() ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
<?php endif; ?>
<br />
<h3>Загруженные обновления</h3>
<hr />
<?php if (empty($packagesUpdates)) : ?>
Не найдены
<?php else : ?>
<table>
    <tr>
        <th>Версия</th>
        <th>Дата публикации</th>
        <th>Автор</th>
        <th>Email</th>
        <td>Действия</td>
    </tr>

    <?php foreach($packagesUpdates as $packageUpdate) : ?>
    <tr>
        <td>
            <?=$packageUpdate['info']['version']?>
            <? if ($packageUpdate['info']['name'] !== $modelPackage->name) : ?>&nbsp;&nbsp;- Адаптивный пакет (<?=$packageUpdate['info']['name']?>)<? endif; ?>
        </td>
        <td><?=$packageUpdate['info']['publication_date']?></td>
        <td><?=$packageUpdate['info']['author']?></td>
        <td><?=$packageUpdate['info']['email']?></td>
        <td>
            <?=CHtml::form('', 'post')?>
                <?=CHtml::linkButton('Обновить', array(
                    'submit'=>array(
                        'Packages/prepareupdate/',
                        'id' => $modelPackage->id,
                    ),
                    'params'=>array(
                        Yii::app()->request->csrfTokenName => Yii::app()->request->csrfToken,
                        'version' => $packageUpdate['info']['version'],
                        'name' => $packageUpdate['info']['name'],
                        'btnUpdate' => 'update'
                    ),
                    'confirm'=>"Обновить модуль?"
                ))?>
            <?=CHtml::endForm() ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
<?php endif; ?>