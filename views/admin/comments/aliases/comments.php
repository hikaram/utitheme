<?php $this->breadcrumbs=array(
    Yii::t('app', 'Панель управления') => array('/admin'),
    Yii::t('app', 'Комментарии') => array('/admin/comments'),
    Yii::t('app', 'Алиасы') => array('index'),
    Yii::t('app', 'Комментарии алиаса') => array('aliases/comments/id/' . $alias->id)
);?>
<script type="text/template" id="comment">
    <div class="comments_comment-block" data-message-id="<%- id %>" style="margin: 5px; margin-bottom: 20px; clear: both; padding-left: 10px; border-left:0px solid black; margin-left: <%- padding_left %>px;">
        <div style="padding: 10px 0;">
            <table>
                <tr>
                    <td style="text-align: left; color: #b1b1b1;"><?=Yii::t('app', 'статус')?>:</td>
                    <td><%- statusLabel %></td>
                </tr>
                <tr>
                    <td style="text-align: left; color: #b1b1b1;"><?=Yii::t('app', 'автор')?>:</td>
                    <td><%- username %></td>
                </tr>
                <tr>
                    <td style="text-align: left; color: #b1b1b1;"><?=Yii::t('app', 'создан')?>:</td>
                    <td><%- created_at %></td>
                </tr>
                <tr>
                    <td style="text-align: left; color: #b1b1b1;"><?=Yii::t('app', 'изменен')?>:</td>
                    <td><%- modified_at %></td>
                </tr>
            </table>
        </div>
        <div style="border-left: 2px solid black;">
            <div style="text-indent: 15px; padding: 5px 0;" class="comments_comment-text"><%- comment_text %></div>
            <div class="pad-10"></div>
            <div style="border-top: 1px solid black; padding: 5px 0px 0px 5px;">
                <a style="" href="#" class="comment_delete-comment"><?=Yii::t('app', 'пометить на удаление')?></a> | 
                <a style="" href="#" class="comment_restore-comment"><?=Yii::t('app', 'восстановить')?></a> | 
                <a style="" href="#" class="comment_moderate-comment"><?=Yii::t('app', 'на модерации')?></a> | 
                <a style="" href="#" class="comment_edit-comment"><?=Yii::t('app', 'редактировать')?></a>| 
				<a style="" href="#" class="comment_deletefull-comment"><?=Yii::t('app', 'удалить')?></a> 
            </div>
        </div>
    </div>
</script>
<script type="text/template" id="text_edit_block">
    <div class="text_edit_block">
        <div>
            <textarea><%- text %></textarea>
        </div>
        <div>
            <button class="text_edit_block-button"><?=Yii::t('app', 'Изменить')?></button>
        </div>
    </div>
</script>
<script type="text/javascript">
    var comments = {
        aliasId : "<?=CHtml::encode($alias->id)?>",
        leftMultiplier : 20
    };
</script>

<div id="list_comments"></div>