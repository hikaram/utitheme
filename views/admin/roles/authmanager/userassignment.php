<?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'assignment-form',
        'enableAjaxValidation'=>false,
));
?>

<?php echo $form->errorSummary($assignment); ?>

<table>
    <tr>
        <td>Логин пользователя:</td>
        <td style="padding-left: 15px;"><?=$user['user']->username?></td>
    </tr>
    <tr>
        <td>Email пользователя:</td>
        <td style="padding-left: 15px;"><?=$user['user']->email?></td>
    </tr>
    <tr>
        <td>Дата регистрации:</td>
        <td style="padding-left: 15px;"><?=MSmarty::date_format($user['user']->created_at, 'd.m.Y')?></td>
    </tr>
</table>
<br /><br />
<table>
    <tr>
        <th>Роль</th>
        <th>Описание</th>
        <th>По умолчанию</th>
        <th>Действия</th>
    </tr>
    <? foreach ($user['default'] as $key => $value) : ?>
        <tr>
            <td><?=$value->name?></td>
            <td style="padding-left: 15px;"><?=$value->description?></td>
            <td style="text-align: center">Да</td>
            <td style="text-align: center">
                <? if (Yii::app()->user->checkAccess('AdminRolesAuthmanagerEditrole')) : ?>
                    <a href="<?=$this->createUrl('authmanager/edititem/name/' . $value->name)?>">Редактировать роль</a>
                <? endif; ?>
            </td>
        </tr>
    <? endforeach; ?>
    <? foreach ($user['assignment'] as $key => $value) : ?>
        <tr>
            <td><?=$value->itemname?></td>
            <td style="padding-left: 15px;"><?=$value->item->description?></td>
            <td style="text-align: center">Нет</td>
            <td style="text-align: center">
                <? if (Yii::app()->user->checkAccess('AdminRolesAuthmanagerEditrole')) : ?>
                    <a href="<?=$this->createUrl('authmanager/edititem/name/' . $value->itemname)?>">Редактировать роль</a>
                <? endif; ?>
                <?=CHtml::linkButton('Удалить', array(
                    'submit'=>array(
                        'authmanager/deleteassignment',
                        'item' => $value->itemname,
                        'user' => $value->userid
                    ),
                    'params'=>array(
                        Yii::app()->request->csrfTokenName => Yii::app()->request->csrfToken
                    ),
                    'confirm'=>'Убрать роль "' . $value->itemname . '" у пользователя "' . $value->user->username . '" ?'
                ))?>
            </td>
        </tr>
    <? endforeach; ?>
</table>
<br /><br />
<table>
    <tr>
        <th></th>
        <th>Добавить роль:</th>
    </tr>
    <? foreach ($list as $key => $value) : ?>
        <tr>
            <td></td>
            <? if ($value['type'] == Authitem::TYPE_ROLE) : ?>
                <td style="padding-left: <?=$value['tree_level'] * 20 - 20?>px;"><?=CHtml::checkBox('itemlist[' . $value['child'] .']', $value['checked'], array('id' => $value['child'], 'class' => $value['class'], 'disabled' => $value['default'], 'onClick' => 'setboxes("' . $value['child'] .'")'))?><?=$value['description']?>
                <?=CHtml::hiddenField('parent_itemlist[' . $value['child'] .']', '', array('id' => 'auth_parent_' . $value['child']))?></td>
            <? elseif (!empty($value['parent'])) : ?>
                <td style="padding-left: <?=$value['tree_level'] * 20 - 15?>px;"><?=$value['description']?></td>
            <? endif; ?>            
        </tr>
    <? endforeach; ?>
</table>
<br /><br />
<?=CHtml::submitButton('Сохранить'); ?>

<? if (Yii::app()->user->checkAccess('AdminRolesAuthmanagerAssignment')) : ?>
    <?=CHtml::Button('Отмена', array ('class' => 'btn100', 'onClick' => 'window.location = "' . $this->createUrl('assignment') . '"'));?>
<? endif;?>

<?php $this->endWidget(); ?>
