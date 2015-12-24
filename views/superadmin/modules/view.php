<?php
$this->breadcrumbs['Модули'] = '/superadmin/modules/index';
$this->breadcrumbs[$modelModule->name] = '/superadmin/modules/view/id/' . $modelModule->id;
?>

<table>
    <tr>
        <td><?=$modelModule->getAttributeLabel('id')?></td>
        <td><?=$modelModule->id?></td>
    </tr>
    <tr>
        <td><?=$modelModule->getAttributeLabel('path')?></td>
        <td><?=$modelModule->path?></td>
    </tr>
    <tr>
        <td><?=$modelModule->getAttributeLabel('name')?></td>
        <td><?=$modelModule->name?></td>
    </tr>
    <tr>
        <td><?=$modelModule->getAttributeLabel('is_active')?></td>
        <td>
            <?php if ((bool) $modelModule->is_active) : ?>
            Включен
            <?php else : ?>
            Отключен
            <?php endif; ?>
        </td>
    </tr>
    <tr>
        <td><?=$modelModule->getAttributeLabel('brief_description')?></td>
        <td><?=$modelModule->brief_description?></td>
    </tr>
    <tr>
        <td><?=$modelModule->getAttributeLabel('description')?></td>
        <td><?=$modelModule->description?></td>
    </tr>
    <tr>
        <td><?=$modelModule->getAttributeLabel('version')?></td>
        <td><?=$modelModule->version?></td>
    </tr>
    <tr>
        <td><?=$modelModule->getAttributeLabel('version_last')?></td>
        <td><?=$modelModule->version_last?></td>
    </tr>
    <tr>
        <td><?=$modelModule->getAttributeLabel('version_stable')?></td>
        <td><?=$modelModule->version_stable?></td>
    </tr>
    <tr>
        <td><?=$modelModule->getAttributeLabel('autor')?></td>
        <td><a href="mailto:<?=$modelModule->email?>"><?=$modelModule->email?></a></td>
    </tr>
    <tr>
        <td><?=$modelModule->getAttributeLabel('site')?></td>
        <td><a href="<?=$modelModule->site?>"><?=$modelModule->site?></a></td>
    </tr>
    <tr>
        <td><?=$modelModule->getAttributeLabel('created_at')?></td>
        <td><?=$modelModule->created_at?></td>
    </tr>
    <tr>
        <td><?=$modelModule->getAttributeLabel('created_by')?></td>
        <td><?=$modelModule->created_user->username?></td>
    </tr>
    <tr>
        <td><?=$modelModule->getAttributeLabel('modified_at')?></td>
        <td><?=$modelModule->modified_at?></td>
    </tr>
    <tr>
        <td><?=$modelModule->getAttributeLabel('modified_by')?></td>
        <td><?=$modelModule->modified_user->username?></td>
    </tr>
</table>