<h2><?=Yii::t('app','Комментарии')?></h2>
<div class="comments">
    <?php $multiplier = 20 ?>
    <?php $max = 200 ?>

    <?php foreach($listComments as $comment) : ?>
         
        <?php if(((int)$comment->status_id !== Comments::COMMENT_STATUS_NOT_ACTIVE) and ((int)$comment->status_id !== Comments::COMMENT_STATUS_MODERATE)) : ?>
        <?php $padding_left = (count(explode('.', $comment->upline)) - 1) * $multiplier; ?>
        <?php if ($padding_left > $max) { $padding_left = $max; } ?>
       
        <!-- comment -->
        <div class="media comments_comment-block" data-message-id="<?= $comment->id ?>" style="margin: 5px; margin-bottom: 20px; clear: both; margin-left: <?=$padding_left?>px;">
            <span class="pull-left">
			<? 
			Yii::import('application.modules.admin.modules.user.models.Profile');
			Yii::import('application.modules.attachment.models.Attachments');
			if(!empty($comment->user->id)):
            
                $profile =Profile::model()->find('user__id =:user__id', array('user__id'=>$comment->user->id));	
			
            //vg($profile->attachment->secret_name);die 			?>
                <? if (($profile->attachment != NULL) && ($profile->attachment->secret_name != null)) : ?>
				<?= CHtml::image(MSmarty::attachment_get_file_name($profile->attachment->secret_name, $profile->attachment->raw_name, $profile->attachment->file_ext, '_office_profile', 'office_photo'), '', array('class'=>"media-object")); ?>
				<? else : ?>
					<img src="<?=Yii::app()->theme->baseUrl?>/public/comments/member-photo.png" alt="" class="media-object">
				<? endif; ?>	
            
            <? else : ?>
                    <img src="<?=Yii::app()->theme->baseUrl?>/public/comments/member-photo.png" alt="" class="media-object">
              <? endif; ?>        			
            </span>
            <?php $created_date = date_create(CHtml::encode($comment->created_at)); ?><a name="<?=$comment->id?>"></a> 
            <div class="media-body">
                <h4 class="media-heading"> <?=CHtml::encode(!empty($comment->user->username)?$comment->user->username:Yii::t('app','Гость')) ?> <span>
                    <?=$created_date->format('H:i')?>, <?=$created_date->format('d.m.Y') ?> /  
                    <?php if (Yii::app()->user->checkAccess('CommentsAnswer')) : ?>
                        <a style="" href="#" class="comment_answer-comment"><?=Yii::t('app', 'ответить')?></a>
                    <?php endif; ?>
                    <?php if($comment->is_editable && $modelComments->modelObjectAlias->comments_is_editable && Yii::app()->user->checkAccess('CommentsEdit')) : ?>
                        / <a style="" href="#" class="comment_edit-comment"><?=Yii::t('app', 'редактировать')?></a>
                    <?php endif; ?>
                </span>
            </h4>

            <?php if ((int)$comment->status_id === Comments::COMMENT_STATUS_ACTIVE) : ?>
                <div class="comments_comment-text">
                    <p>
                        <?= CHtml::encode($comment->comment_text) ?>
                    </p>
                </div>
            <?php endif; ?>

            <?php if((int)$comment->status_id === Comments::COMMENT_STATUS_DELETED) : ?>
                <div class="note note-info">
                    <p><?=Yii::t('app', 'Комментарий удален')?></p>
                </div>
            <?php endif; ?>

            <br>
        </div>
        <!-- body -->

    </div>
    <?endif?>
    <!-- comment media -->

<?php endforeach; ?>
</div>
