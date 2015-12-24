<?php $form = $this->beginWidget('CActiveForm', array(
    'enableAjaxValidation' => false
    )
)
?>
    <?php $form->errorSummary($post); ?>
    <table clas="list">
        <tr>
            <td>
                <div style="padding: 15px 0;"><b><?=Yii::t('app', 'Тема')?></b></div>
                <?=CHtml::activeTextField($post, 'title')?>
            </td>
            <td><?=$form->error($post, 'title')?></td>
        </tr>
        <tr>
            <td>
                <div style="padding: 15px 0;"><b><?=Yii::t('app', 'Статус')?></b></div>
                <?php if ($post->status_id == BlogPosts::STATUS_POST_MODERATE) : ?>
                    <span style="font-size: 17px;"><?=CHtml::label(CHtml::encode($post::LabelsStatus(BlogPosts::STATUS_POST_MODERATE)), 'status_id')?></span>
                <?php else : ?>
                    <?=CHtml::activeDropDownList($post, 'status_id', $post::LabelsStatus())?>
                <?php endif; ?>
            </td>
            <td><?=$form->error($post, 'status_id')?></td>
        </tr>
        <tr>
            <td>
                <div style="padding: 15px 0;"><b><?=Yii::t('app', 'Могут читать')?></b></div>
                <?=CHtml::activeDropDownList($post, 'can_read', $post::LabelsRead())?>
            </td>
            <td><?=$form->error($post, 'can_read')?></td>
        </tr>
        <tr>
            <td>
                <div style="padding: 15px 0;"><b><?=Yii::t('app', 'Описание')?></b></div>
                <?=CHtml::activeTextField($post, 'description', array())?>
            </td>
            <td><?=$form->error($post, 'description')?></td>
        </tr>
        <tr>
            <td>
                <div style="padding: 15px 0;"><b><?=Yii::t('app', 'Краткий текст')?></b></div>
                <?=CkeditorHelper::init(array('name' => 'BlogPosts[short_text]', 'type' => 'content', 'ckfinder' => true, 'value' => $post->short_text)) ?>
            </td>
            <td><?=$form->error($post, 'short_text')?></td>
        </tr>
        <tr>
            <td>
                <div style="padding: 15px 0;"><b><?=Yii::t('app', 'Текст')?></b></div>
                <?=CkeditorHelper::init(array('name' => 'BlogPosts[text]', 'type' => 'content', 'ckfinder' => true, 'value' => $post->text)) ?></td>
            <td><?=$form->error($post, 'text')?></td>
        </tr>
        <tr>
            <td colspan="2">
                <?=CHtml::submitButton(Yii::t('app', 'изменить')); ?>
            </td>
        </tr>
    </table>
<?php $this->endWidget(); ?>