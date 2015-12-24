<?php
$this->breadcrumbs = []; //clear
$this->breadcrumbs[Yii::t('app', 'Блог')] = '/blog/view/index/id/1' ;
$this->breadcrumbs[Yii::t('app', 'Добавить запись')] ;
?>
<?php $form = $this->beginWidget('CActiveForm', array(
    'enableAjaxValidation' => false
    )
)
?>
    <?php $form->errorSummary($blogModel); ?>
    <?php $form->errorSummary($blogPostsModel); ?>
    <table clas="list">
        <tr>
            <td>
                <div style="padding: 15px 0;"><b><?=Yii::t('app', 'Тема')?></b></div>
                <?=CHtml::activeTextField($blogPostsModel, 'title')?>
            </td>
            <td><?=$form->error($blogPostsModel, 'title')?></td>
        </tr>
        <tr>
            <td>
                <div style="padding: 15px 0;"><b><?=Yii::t('app', 'Статус')?></b></div>
                <?=CHtml::activeDropDownList($blogPostsModel, 'status_id', $blogPostsModel::LabelsStatus())?>
            </td>
            <td><?=$form->error($blogPostsModel, 'status_id')?></td>
        </tr>
        <tr>
            <td>
                <div style="padding: 15px 0;"><b><?=Yii::t('app', 'Могут читать')?></b></div>
                <?=CHtml::activeDropDownList($blogPostsModel, 'can_read', $blogPostsModel::LabelsRead())?>
            </td>
            <td><?=$form->error($blogPostsModel, 'can_read')?></td>
        </tr>
        <tr>
            <td>
                <div style="padding: 15px 0;"><b><?=Yii::t('app', 'Описание')?></b></div>
                <?=CHtml::activeTextField($blogPostsModel, 'description', array())?>
            </td>
            <td><?=$form->error($blogPostsModel, 'description')?></td>
        </tr>
        <tr>
            <td>
                <div style="padding: 15px 0;"><b><?=Yii::t('app', 'Краткий текст')?></b></div>
                <?=CkeditorHelper::init(array('name' => 'BlogPosts[short_text]', 'type' => 'content', 'ckfinder' => true, 'value' => $blogPostsModel->short_text)) ?>
            </td>
            <td><?=$form->error($blogPostsModel, 'short_text')?></td>
        </tr>
        <tr>
            <td>
                <div style="padding: 15px 0;"><b><?=Yii::t('app', 'Текст')?></b></div>
                <?=CkeditorHelper::init(array('name' => 'BlogPosts[text]', 'type' => 'content', 'ckfinder' => true, 'value' => $blogPostsModel->text)) ?></td>
            <td><?=$form->error($blogPostsModel, 'text')?></td>
        </tr>
        <tr>
            <td colspan="2">
                <?=CHtml::submitButton(Yii::t('app', 'Добавить'), array('class' => 'btn100')); ?>
            </td>
        </tr>
    </table>
<?php $this->endWidget(); ?>