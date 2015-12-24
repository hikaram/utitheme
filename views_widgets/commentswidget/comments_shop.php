<div class="comments">
    <?php $multiplier = 20 ?>
    <?php $max = 200 ?>

    <?php foreach($listComments as $comment) : ?>
         
        <?php if(((int)$comment->status_id !== Comments::COMMENT_STATUS_NOT_ACTIVE) and ((int)$comment->status_id !== Comments::COMMENT_STATUS_MODERATE)) : ?>
            <?php $padding_left = (count(explode('.', $comment->upline)) - 1) * $multiplier; ?>
            <?php if ($padding_left > $max) { $padding_left = $max; } ?>
           
            <!-- comment -->
            <div class="media comments_comment-block" data-message-id="<?= $comment->id ?>" style="margin: 5px; margin-bottom: 20px; clear: both; margin-left: <?=$padding_left?>px;">

                <?php $created_date = date_create(CHtml::encode($comment->created_at)); ?><a name="<?=$comment->id?>"></a> 
                <div class="review-item clearfix">
                    <div class="review-item-submitted">
                        <strong><?=CHtml::encode($comment->name)?></strong>
                        <em><?=MSmarty::date_format($comment->created_at, 'd.m.Y')?> - <?=MSmarty::date_format($comment->created_at, 'H:i')?></em>
                        <? if (((bool)$this->isRatio) && ($comment->rating > 0)) : ?>
                            <div class="rateit" data-rateit-value="<?=sprintf('%.1f', $comment->rating)?>" data-rateit-ispreset="true" data-rateit-readonly="true"></div>
                        <? endif; ?>
                    </div>
                    <div class="review-item-content">
                        <?=$comment->comment_text?>
                    </div>
                </div>
                
            </div>
            <!-- body -->

        <?endif?>
        <!-- comment media -->

    <?php endforeach; ?>
</div>
