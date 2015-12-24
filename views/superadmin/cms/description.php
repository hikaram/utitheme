<?php

$this->breadcrumbs=array(
	'Панель управления' => array('index'),
	'Загруженные' => array('uploaded'),
    'Просмотр' => array('description', 'version' => $application['info']['version']),
);
?>

<?php
    if (empty($application))
    {
        return;
    }

?>

<table>

    <tr>
        <th>Версия</th>
        <td><?=CHtml::encode($application['info']['version'])?></td>
    </tr>

    <tr>
        <th>Страница в интернете</th>
        <td><?=CHtml::encode($application['info']['site'])?></td>
    </tr>

    <tr>
        <th>Дата публикации</th>
        <td><?=CHtml::encode($application['info']['publication_date'])?></td>
    </tr>

    <tr>
        <th>Лицензия</th>
        <td><?=CHtml::encode($application['info']['license'])?></td>
    </tr>

    <tr>
        <th>Обратная совместимость</th>
        <td><?=CHtml::encode($application['info']['is_backward_compatibility'])?></td>
    </tr>

    <tr>
        <th>Содержит обновления для предыдущих версий</th>
        <td><?=CHtml::encode($application['info']['is_update'])?></td>
    </tr>

    <tr>
        <th>Краткое описание</th>
        <td><?=CHtml::encode($application['info']['brief_description'])?></td>
    </tr>

    <tr>
        <th>Подробное описание</th>
        <td><?=CHtml::encode($application['info']['brief_description']); ?></td>
    </tr>

    <tr>
        <th>Скрипты для базы данных</th>
        <td>
            <?php if (array_keys_exists(array('database', 'import'), $application) && is_array($application['database']['import'])) : ?>
            <ul>
                <?php foreach($application['database']['import'] as $file) : ?>
                <li><?=CHtml::encode($file)?></li>
                <?php endforeach; ?>
            </ul>
            <?php endif; ?>
        </td>
    </tr>

    <tr>
        <th>Использование базы данных</th>
        <td>
            <table>
                <tr>
                    <th>Имя таблицы</th>
                    <th>Имя поля</th>
                    <th>Читает</th>
                    <th>Пишет</th>
                    <th>Владелец</th>
                </tr>
                <?php if (array_keys_exists(array('relations', 'database', 'fields'), $application) && is_array($application['relations']['database']['fields'])) : ?>
                <?php foreach($application['relations']['database']['fields'] as $field) : ?>
                <tr>
                    <td><?=CHtml::encode($field['table'])?></td>
                    <td><?=CHtml::encode($field['name'])?></td>
                    <td><?=CHtml::encode($field['is_read'])?></td>
                    <td><?=CHtml::encode($field['is_write'])?></td>
                    <td><?=CHtml::encode($field['is_owner'])?></td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </table>
        </td>
    </tr>

    <tr>
        <th>Обновления для предыдущих версий</th>
        <td>
            <table>
                <tr>
                    <th>Версия</th>
                    <th>Скрипты</th>
                </tr>
                <?php if (isset($application['updates']) && is_array($application['updates'])) : ?>
                <?php foreach($application['updates'] as $update) : ?>
                <tr>
                    <td><?=CHtml::encode($update['version'])?></td>
                    <td>
                        <?php if (array_keys_exists(array('database', 'import'), $update) && is_array($update['database']['import'])) : ?>
                        <ul>
                        <?php foreach($update['database']['import'] as $file) : ?>
                            <li><?=CHtml::encode($file)?></li>
                        <?php endforeach; ?>
                        </ul>
                        <?php endif;?>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </table>
        </td>
    </tr>

</table>