<?php

$this->breadcrumbs=array(
    'Панель управления' => array('/superadmin'),
    'Модули' => array('Modules/index'),
    'Новые' => array('new'),
    'Просмотр нового модуля' => array('newfullinfo', 'guid' => $module['guid']),
);
?>

<table>
    <tr>
        <th>Название</th>
        <td><?=CHtml::encode($module['info']['name'])?></td>
    </tr>
    
    <tr>
        <th>Версия</th>
        <td><?=CHtml::encode($module['info']['version'])?></td>
    </tr>
    
    <tr>
        <th>Псевдоним</th>
        <td><?=CHtml::encode($module['info']['path'])?></td>
    </tr>
    
    <tr>
        <th>Разрешается сменить псевдоним</th>
        <td><?=CHtml::encode($module['info']['is_allowed_path_change'])?></td>
    </tr>

    <tr>
        <th>Страница модуля в интернете</th>
        <td><?=CHtml::encode($module['info']['site'])?></td>
    </tr>
    
    <tr>
        <th>Автор</th>
        <td><?=CHtml::encode($module['info']['author'])?></td>
    </tr>
    
    <tr>
        <th>Email</th>
        <td><?=CHtml::encode($module['info']['email'])?></td>
    </tr>
    
    <tr>
        <th>Дата публикации</th>
        <td><?=CHtml::encode($module['info']['publication_date'])?></td>
    </tr>
    
    <tr>
        <th>Лицензия</th>
        <td><?=CHtml::encode($module['info']['license'])?></td>
    </tr>
    
    <tr>
        <th>Обратная совместимость</th>
        <td><?=CHtml::encode($module['info']['is_backward_compatibility'])?></td>
    </tr>
    
    <tr>
        <th>Содержит обновления для предыдущих версий</th>
        <td><?=CHtml::encode($module['info']['is_update'])?></td>
    </tr>
    
    <tr>
        <th>Краткое описание</th>
        <td><?=CHtml::encode($module['info']['brief_description'])?></td>
    </tr>
    
    <tr>
        <th>Подробное описание</th>
        <td><?=CHtml::encode($module['info']['brief_description'])?></td>
    </tr>
    
    <tr>
        <th>Скрипты для базы данных</th>
        <td>
            <ul>
			<?php if (array_keys_exists(array('database', 'import'), $module) && is_array($module['database']['import'])) : ?>
                <?php foreach($module['database']['import'] as $file) : ?>
                <li><?=CHtml::encode($file)?></li>
                <?php endforeach; ?>
			<? endif; ?>
            </ul>
        </td>
    </tr>
    
    <tr>
        <th>Требования</th>
        <td>
            <table>
                <tr>
                    <td>CMS</td>
                    <td>
                        <?=CHtml::encode($module['relations']['cms']['version'])?>
                    </td>
                </tr>
                <?php if (array_keys_exists(array('relations', 'modules'), $module) && is_array($module['relations']['modules'])) : ?>
                <?php foreach($module['relations']['modules'] as $parent_module) : ?>
                <tr>
                    <td>Модуль</td>
                    <td>
                        <?=CHtml::encode($parent_module['name'])?> <?=CHtml::encode($parent_module['version'])?> 
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
                
                <?php if (array_keys_exists(array('relations', 'packages'), $module) && is_array($module['relations']['packages'])) : ?>
                <?php foreach($module['relations']['packages'] as $package) : ?>
                <tr>
                    <td>Пакет</td>
                    <td>
                        <?=CHtml::encode($package['name'])?> <?=CHtml::encode($package['version'])?> 
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </table>
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
                <?php if (array_keys_exists(array('relations', 'database', 'fields'), $module) && is_array($module['relations']['database']['fields'])) : ?>
                <?php foreach($module['relations']['database']['fields'] as $field) : ?>
                <tr>
                    <td><?=CHtml::encode($field['table'])?></td>
                    <td><?=CHtml::encode($field['name'])?></td>
                    <td><?=CHtml::encode($field['is_read'])?></td>
                    <td><?=CHtml::encode($field['is_write'])?></td>
                    <td><?=CHtml::encode($field['is_owner'])?></td>
                </tr>
                <?php endforeach; ?>
                <?php endif;?>
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
                <?php if (array_keys_exists(array('relations', 'updates'), $module) && is_array($module['relations']['updates'])) : ?>
                <?php foreach($module['updates'] as $update) : ?>
                <tr>
                    <td><?=CHtml::encode($update['version'])?></td>
                    <td>
                        <?php if (array_keys_exists(array('database', 'import'), $update) && is_array($update['database']['import'])) : ?>
                        <ul>
                        <?php foreach($update['database']['import'] as $file) : ?>
                            <li><?=CHtml::encode($file)?></li>
                        <?php endforeach; ?>
                        </ul>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </table>
        </td>
    </tr>
    
</table>