            <div class="post-comment padding-top-40">
                <?php if (Yii::app()->user->checkAccess('CommentsAdd')) : ?>
                    <h3><?=Yii::t('app', 'Оставить комментарий')?></h3>
                    <?php $form = $this->beginWidget('CActiveForm', array(
                        'enableAjaxValidation' => false
                        )
                    )
                    ?>
                    <div class="form-group">
                        <label><?=Yii::t('app', 'Сообщение')?></label>
                        <?php echo CHtml::activeTextArea($modelComments, 'comment_text', array('id' => 'comments_comment-text', 'class' => 'form-control', 'rows' => 8)) ?>
                    </div>
                    <p>
                        <?php echo CHtml::submitButton(Yii::t('app', 'Добавить'), array('id' => 'comment_add-comment', 'class' => 'btn btn-primary')) ?>
                    </p>
                    <?php $this->endWidget(); ?>
                <?php endif; ?>
            </div>