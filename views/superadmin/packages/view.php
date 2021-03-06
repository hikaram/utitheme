<?php
$this->breadcrumbs['Пакеты'] = '/superadmin/packages/index';
$this->breadcrumbs[$modelPackage->name] = '/superadmin/packages/view/id/' . $modelPackage->id;
?>

<table>
    <tr>
        <td><?=$modelPackage->getAttributeLabel('id')?></td>
        <td><?=$modelPackage->id?></td>
    </tr>
    <tr>
        <td><?=$modelPackage->getAttributeLabel('path')?></td>
        <td><?=$modelPackage->path?></td>
    </tr>
    <tr>
        <td><?=$modelPackage->getAttributeLabel('name')?></td>
        <td><?=$modelPackage->name?></td>
    </tr>
    <tr>
        <td><?=$modelPackage->getAttributeLabel('brief_description')?></td>
        <td><?=$modelPackage->brief_description?></td>
    </tr>
    <tr>
        <td><?=$modelPackage->getAttributeLabel('description')?></td>
        <td><?=$modelPackage->description?></td>
    </tr>
    <tr>
        <td><?=$modelPackage->getAttributeLabel('version')?></td>
        <td><?=$modelPackage->version?></td>
    </tr>
    <tr>
        <td><?=$modelPackage->getAttributeLabel('version_last')?></td>
        <td><?=$modelPackage->version_last?></td>
    </tr>
    <tr>
        <td><?=$modelPackage->getAttributeLabel('version_stable')?></td>
        <td><?=$modelPackage->version_stable?></td>
    </tr>
    <tr>
        <td><?=$modelPackage->getAttributeLabel('autor')?></td>
        <td><a href="mailto:<?=$modelPackage->email?>"><?=$modelPackage->email?></a></td>
    </tr>
    <tr>
        <td><?=$modelPackage->getAttributeLabel('site')?></td>
        <td><a href="<?=$modelPackage->site?>"><?=$modelPackage->site?></a></td>
    </tr>
    <tr>
        <td><?=$modelPackage->getAttributeLabel('created_at')?></td>
        <td><?=$modelPackage->created_at?></td>
    </tr>
    <tr>
        <td><?=$modelPackage->getAttributeLabel('created_by')?></td>
        <td><?=$modelPackage->created_user->username?></td>
    </tr>
    <tr>
        <td><?=$modelPackage->getAttributeLabel('modified_at')?></td>
        <td><?=$modelPackage->modified_at?></td>
    </tr>
    <tr>
        <td><?=$modelPackage->getAttributeLabel('modified_by')?></td>
        <td><?=$modelPackage->modified_user->username?></td>
    </tr>
</table>