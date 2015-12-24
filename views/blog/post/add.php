
<?php $form = $this->beginWidget('CActiveForm', array(
    'enableAjaxValidation' => false
    )
)
?>
    <?php $form->errorSummary($blogPostsModel); ?>
    <?php $form->errorSummary($blogPostsLangModel); ?>
    <table clas="list">
        <tr>
            <td>
                <div style="padding: 15px 0;"><b><?=Yii::t('app', 'Тема')?></b></div>
                <?=CHtml::activeTextField($blogPostsLangModel, 'title')?>
            </td>
            <td><?=$form->error($blogPostsLangModel, 'title')?></td>
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
                <?=CHtml::activeTextField($blogPostsLangModel, 'description', array())?>
            </td>
            <td><?=$form->error($blogPostsLangModel, 'description')?></td>
        </tr>
        <tr>
            <td>
                <div style="padding: 15px 0;"><b><?=Yii::t('app', 'Краткий текст')?></b></div>
                <?=CkeditorHelper::init(array('name' => 'BlogPostsLang[short_text]', 'type' => 'content', 'ckfinder' => true, 'value' => $blogPostsLangModel->short_text)) ?>
            </td>
            <td><?=$form->error($blogPostsLangModel, 'short_text')?></td>
        </tr>
        <tr>
            <td>
                <div style="padding: 15px 0;"><b><?=Yii::t('app', 'Текст')?></b></div>
                <?=CkeditorHelper::init(array('name' => 'BlogPostsLang[text]', 'type' => 'content', 'ckfinder' => true, 'value' => $blogPostsLangModel->text)) ?></td>
            <td><?=$form->error($blogPostsLangModel, 'text')?></td>
        </tr>
        <tr>
            <td colspan="2">
                <?=CHtml::submitButton(Yii::t('app', 'Добавить'), array('class' => 'btn100')); ?>
            </td>
        </tr>
    </table>
<?php $this->endWidget(); ?>