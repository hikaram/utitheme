<?php
    $multiplier = 20;
    $max = 500;
?>
<?php foreach($listComments as $comment) : ?>
    <?php $padding_left = (count(explode('.', $comment->upline)) - 1) * $multiplier; ?>
    <?php if ($padding_left > $max) { $padding_left = $max; } ?>

    <div class="comments_comment-block" data-message-id="<?= $comment->id ?>" style="margin: 5px; margin-bottom: 20px; clear: both; margin-left: <?=$padding_left?>px;">
        <div><?=Yii::t('app', 'статус')?>: <?=$modelComments->LabelStatus($comment->status_id) ?></div>
        <div><?=Yii::t('app', 'создан')?>: <?=$comment->created_at ?></div>
        <div><?=Yii::t('app', 'изменен')?>: <?=$comment->modified_at ?></div>
        <div><?=Yii::t('app', 'автор')?>: <?=CHtml::encode($comment->user->username) ?></div>
        <div style="border-left: 2px solid black;">
            <div style="text-indent: 15px;"><?= CHtml::encode($comment->comment_text) ?></div>
            <div class="pad-10"></div>
            <div style="border-top: 1px solid black; padding: 5px 0px 0px 5px;">
                    <a style="" href="#" class="comment_delete-comment"><?=Yii::t('app', 'удалить')?></a>
                    <a style="" href="#" class="comment_restore-comment"><?=Yii::t('app', 'восстановить')?></a>
                    <a style="" href="#" class="comment_edit-comment"><?=Yii::t('app', 'редактировать')?></a>
            </div>
        </div>
    </div>
<?php endforeach; ?>