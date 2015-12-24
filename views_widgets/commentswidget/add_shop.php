<div class="post-comment padding-top-40">
    <?php if (Yii::app()->user->checkAccess('CommentsAdd')) : ?>
        <h3><?=Yii::t('app', 'Написать отзыв')?></h3>
        <?php $form = $this->beginWidget('CActiveForm', array(
            'enableAjaxValidation' => false
            )
        )
        ?>
        <? if (Yii::app()->user->isGuest) : ?>
            <div class="form-group">
                <label><?=Yii::t('app', 'Имя')?></label>
                <?php echo CHtml::activeTextField($modelComments, 'name', array('id' => 'comments_comment-name', 'class' => 'form-control')) ?>
            </div>
            <div class="form-group">
                <label>Email</label>
                <?php echo CHtml::activeTextField($modelComments, 'email', array('id' => 'comments_comment-email', 'class' => 'form-control')) ?>
            </div>
        <? else : ?>
            <div class="form-group">
                <label><?=Yii::t('app', 'Пользователь')?></label>
                <?php echo CHtml::textField(FALSE, Yii::app()->user->username, array('id' => 'comments_comment-login', 'class' => 'form-control', 'readonly' => 'readonly', 'disabled' => 'disabled')) ?>
            </div>
        <? endif; ?>
        <? if ((bool)$this->allowedSetRatio) : ?>
            <? if ((Yii::app()->request->cookies['setProductRatio'] == NULL) || (!is_array(json_decode(Yii::app()->request->cookies['setProductRatio']->value))) || (!in_array($object_id, json_decode(Yii::app()->request->cookies['setProductRatio']->value)))) : ?>
                <div class="form-group review-comment-wrapper">
                    <label for="email"><?=Yii::t('app', 'Оценка')?></label>
                    <input type="range" value="5" step="0.5" id="backing_review">
                    <div class="rateit" data-rateit-backingfld="#backing_review" data-rateit-resetable="false"  data-rateit-ispreset="true" data-rateit-min="0" data-rateit-max="5">
                    </div>
                </div>
            <? endif; ?>
        <? endif; ?>        
        <div class="form-group">
            <label><?=Yii::t('app', 'Сообщение')?></label>

            <? if (Yii::app()->isPackageInstall('Ckeditor', '1.1.4')) : ?>
                <? $ckeditorconfig = array('name' => 'area[textareackeditor]', 'type' => 'comment', 'ckfinder' => false, 'value' => empty($modelComments->comment_text) ? '' : $modelComments->comment_text); ?> 
                <?=CkeditorHelper::init($ckeditorconfig) ?>
                <?php echo CHtml::activeTextArea($modelComments, 'comment_text', array('id' => 'comments_comment-text', 'class' => 'form-control', 'rows' => 8, 'style' => 'display: none;')) ?>
            <? else : ?>
                <?php echo CHtml::activeTextArea($modelComments, 'comment_text', array('id' => 'comments_comment-text', 'class' => 'form-control', 'rows' => 8)) ?>
            <? endif; ?>

        </div>
        <p>
            <?php echo CHtml::submitButton(Yii::t('app', 'Добавить'), array('id' => 'comment_add-comment', 'class' => 'btn btn-primary')) ?>
        </p>
        <?php $this->endWidget(); ?>
    <?php endif; ?>
</div>