<?php $this->breadcrumbs=array(
    Yii::t('app', 'Панель управления') => array('/admin'),
    Yii::t('app', 'Комментарии') => array('/admin/comments'),
    Yii::t('app', 'Алиасы') => array('index'),
    Yii::t('app', 'Редактирвоание алиаса') => array('aliases/edit/id/' . $alias->id)
);?>
<?php $form = $this->beginWidget('CActiveForm', array(
    'enableAjaxValidation' => 'false'
    )
)
?>
    <?php $form->errorSummary($alias); ?>
    <table clas="list">
        <tr>
            <td><?=Yii::t('app', 'Название')?> <span style="color: #c0c0c0;text-decoration: underline;">(news)</span></td>
            <td><?=CHtml::activeTextField($alias, 'object_alias')?></td>
            <td><?=$form->error($alias, 'object_alias')?></td>
        </tr>
        <tr>
            <td><?=Yii::t('app', 'Описание')?></td>
            <td><?=CHtml::activeTextArea($alias, 'description')?></td>
            <td><?=$form->error($alias, 'description')?></td>
        </tr>
        <tr>
            <td><?=Yii::t('app', 'Статус комментария по умолчанию')?></td>
            <td><?=CHtml::activeDropDownList($alias, 'default_comment_status_id', $alias->commentsStatusesLabels())?></td>
            <td><?=$form->error($alias, 'default_comment_status_id')?></td>
        </tr>
        <tr>
            <td><?=Yii::t('app', 'Комментарий можно редактировать по умолчнию')?></td>
            <td><?=CHtml::activeCheckBox($alias, 'default_comment_is_editable', array('id' => 'ID'))?></td>
            <td><?=$form->error($alias, 'default_comment_is_editable')?></td>
        </tr>
        <tr>
            <td><?=Yii::t('app', 'Можно изменять комментарии (глобально)')?></td>
            <td><?=CHtml::activeCheckBox($alias, 'comments_is_editable', array('id' => 'ID'))?></td>
            <td><?=$form->error($alias, 'comments_is_editable')?></td>
        </tr>
        <tr>
            <td colspan="3">
                <?=CHtml::submitButton(Yii::t('app', 'Изменить')); ?>
            </td>
        </tr>
    </table>
<?php $this->endWidget(); ?>