<? $this->breadcrumbs=array(
    Yii::t('app', 'Панель управления') => array('/admin'),
    Yii::t('app', 'Комментарии') => array('/admin/comments'),
    Yii::t('app', 'Алиасы') => array('index'),
    Yii::t('app', 'Добавить алиас') => array('add')
);?>
<?php $form = $this->beginWidget('CActiveForm', array(
    'enableAjaxValidation' => 'false'
    ))
?>
    <?php $form->errorSummary($modelObjectAliases); ?>
    <table clas="list">
        <tr>
            <td><?=Yii::t('app', 'Название')?> <span style="color: #c0c0c0;text-decoration: underline;">(news)</span></td>
            <td><?=CHtml::activeTextField($modelObjectAliases, 'object_alias')?></td>
            <td><?=$form->error($modelObjectAliases, 'object_alias')?></td>
        </tr>
        <tr>
            <td><?=Yii::t('app', 'Описание')?></td>
            <td><?=CHtml::activeTextArea($modelObjectAliases, 'description')?></td>
            <td><?=$form->error($modelObjectAliases, 'description')?></td>
        </tr>
        <tr>
            <td><?=Yii::t('app', 'Статус комментария по умолчанию')?></td>
            <td><?=CHtml::activeDropDownList($modelObjectAliases, 'default_comment_status_id', $modelObjectAliases->commentsStatusesLabels())?></td>
            <td><?=$form->error($modelObjectAliases, 'default_comment_status_id')?></td>
        </tr>
        <tr>
            <td><?=Yii::t('app', 'Комментарий можно редактировать по умолчнию')?></td>
            <td><?=CHtml::activeCheckBox($modelObjectAliases, 'default_comment_is_editable', array('id' => 'ID'))?></td>
            <td><?=$form->error($modelObjectAliases, 'default_comment_is_editable')?></td>
        </tr>
        <tr>
            <td><?=Yii::t('app', 'Можно изменять комментарии (глобально)')?></td>
            <td><?=CHtml::activeCheckBox($modelObjectAliases, 'comments_is_editable', array('id' => 'ID'))?></td>
            <td><?=$form->error($modelObjectAliases, 'comments_is_editable')?></td>
        </tr>
        <tr>
            <td colspan="3">
                <?=CHtml::submitButton(Yii::t('app', 'Добавить')); ?>
            </td>
        </tr>
    </table>
<?php $this->endWidget(); ?>