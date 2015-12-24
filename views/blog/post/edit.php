<script>
	$(function(){
		$('#td_upload_link_change').bind('click', function() {
          $('#td_upload_photo').hide();
          $('#td_upload_link_change').hide();
          $('#td_upload_form_block').show();
          $('#td_upload_link_cancel').show();
      });

     $('#td_upload_link_cancel').bind('click', function() {
      $('input#news').val(null);
      $('#td_upload_form_block').hide();
      $('#td_upload_link_cancel').hide();
      $('#td_upload_photo').show();
      $('#td_upload_link_change').show();
  })
 })
</script>
<?php
$this->breadcrumbs = []; //clear
$this->breadcrumbs = [Yii::t('app', 'Блог') => '/blog/view/index' , Yii::t('app', 'Добавить запись')] ;
?>
<div class="content-form-page">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="form">

                <?php $form = $this->beginWidget('CActiveForm', array(
                    'enableAjaxValidation' => false,
                    'htmlOptions' => array('class' => 'form-horizontal form-without-legend', 'enctype' => 'multipart/form-data')
                    )
                )
                ?>

                <?php if($blogPostsModel->hasErrors() || $blogPostsLangModel->hasErrors()){ ?>
                <div class="note note-danger">
                    <?php $form->errorSummary($blogPostsModel); ?>
                    <?php $form->errorSummary($blogPostsLangModel); ?>
                </div>
                <?php } ?>
				
				
				
				<div class="form-group">
                    <label class="col-lg-1 control-label"><?=Yii::t('app', 'Рубрика')?></label>                          
                    <div class="col-lg-8">
                        <?=CHtml::activeDropDownList($blogPostsModel, 'blog_rubrics__id', $blogPostsModel::LabelsRubrics(),['empty'=>'-'], array('class' => 'form-control'))?>
						<?=$form->error($blogPostsModel, 'blog_rubrics__id')?>
                    </div>
                </div>
				
				<div class="form-group">
                    <label class="col-lg-1 control-label"><?=Yii::t('app', 'Включить комментарии')?></label>                          
                    <div class="col-lg-8">
                        <?=CHtml::activeCheckBox($blogPostsModel, 'can_comment', array('class' => 'form-control'))?>
						<?=$form->error($blogPostsModel, 'can_comment')?>
                    </div>
                </div>
				
				<div class="form-group">
                    <label class="col-lg-1 control-label"><?=Yii::t('app', 'Тема')?></label>                          
                    <div class="col-lg-8">
                        <?=CHtml::activeTextField($blogPostsLangModel, 'title', array('class' => 'form-control'))?>
                        <?=$form->error($blogPostsLangModel, 'title')?>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-lg-1 control-label"><?=Yii::t('app', 'Статус')?></label>                          
                    <div class="col-lg-8">
                        <?=CHtml::activeDropDownList($blogPostsModel, 'status_id', $blogPostsModel::LabelsStatus(), array('class' => 'form-control'))?>
                        <?=$form->error($blogPostsModel, 'status_id')?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-1 control-label"><?=Yii::t('app', 'Могут читать')?></label>                          
                    <div class="col-lg-8">
                        <?=CHtml::activeDropDownList($blogPostsModel, 'can_read', $blogPostsModel::LabelsRead(), array('class' => 'form-control'))?>
                        <?=$form->error($blogPostsModel, 'can_read')?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-1 control-label"><?=Yii::t('app', 'Описание')?></label>                          
                    <div class="col-lg-8">
                        <?=CHtml::activeTextField($blogPostsLangModel, 'description', array('class' => 'form-control'))?>
                        <?=$form->error($blogPostsLangModel, 'description')?>
                    </div>
                </div>
					
				<div class="form-group">
                    <label class="col-lg-1 control-label"><?=Yii::t('app', 'Ключевые слова')?></label>                          
                    <div class="col-lg-8">
                        <?=CHtml::activeTextField($blogPostsLangModel, 'keywords', array('class' => 'form-control'))?>
                        <?=$form->error($blogPostsLangModel, 'keywords')?>
                    </div>
                </div>	
				

                <div class="form-group">
                    <label class="col-lg-1 control-label"><?=Yii::t('app', 'Краткий текст')?></label>                          
                    <div class="col-lg-10">
                        <?=CkeditorHelper::init(array('name' => 'BlogPostsLang[short_text]', 'type' => 'content', 'ckfinder' => true, 'value' => $blogPostsLangModel->short_text)) ?>
                        <?=$form->error($blogPostsLangModel, 'short_text')?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-1 control-label"><?=Yii::t('app', 'Текст')?></label>                          
                    <div class="col-lg-10">
                        <?=CkeditorHelper::init(array('name' => 'BlogPostsLang[text]', 'type' => 'content', 'ckfinder' => true, 'value' => $blogPostsLangModel->text)) ?>
                        <?=$form->error($blogPostsLangModel, 'text')?>
                    </div>
                </div>
                <div class="form-group">
                   <label class="col-lg-1 control-label"><?=Yii::t('app', 'Загрузить картинку')?></label>          
                   <? if (!$blogPostsModel->isNewRecord) : ?>
                   <div id="td_upload_photo">
                    <? if (($blogPostsModel->attachment != NULL) && ($blogPostsModel->attachment->secret_name != null)) : ?><?= CHtml::image(MSmarty::attachment_get_file_name($blogPostsModel->attachment->secret_name, $blogPostsModel->attachment->raw_name, $blogPostsModel->attachment->file_ext, '_article_head', 'blog_picture'), ''); ?>
                <? else : ?><?= Yii::t('app', 'Отсутствует') ?>
            <? endif ; ?>
        </div>
        <div style="margin-left: 205px;
margin-top: 15px;">
        <?= CHtml::link(Yii::t('app', 'Изменить'), 'javascript:void(0)', array('id' => 'td_upload_link_change', 'style' => 'display: block; float: left;
margin-right: 15px;')) ?>
        <? if (($blogPostsModel->attachment != NULL) && ($blogPostsModel->attachment->secret_name != null)) : ?>
        <?=
        CHtml::linkButton(Yii::t('app', 'Удалить'), array(
            'submit' => array('deletepicture', 'id' => $blogPostsModel->id),
            'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
            'confirm' => Yii::t('app', 'Удалить картинку?')));
            ?>
        <? endif; ?>
        <div style="display: none;" id="td_upload_form_block">
            <?= CHtml::fileField('blog', null, array('class' => 'normal')) ?>
        </div>
        <?= CHtml::link(Yii::t('app', 'Отмена'), 'javascript:void(0)', array('id' => 'td_upload_link_cancel', 'style' => 'display: none;')) ?>
        </div>
    <? else : ?>
    <div style="display: block;" id="td_upload_form_block">
        <?= CHtml::fileField('blog', null, array('class' => 'normal')) ?>
    </div>
<? endif; ?>  

</div>


<p>
    <?=CHtml::submitButton(Yii::t('app', 'Сохранить'), array('class' => 'btn btn-primary')); ?>
</p>
<?php $this->endWidget(); ?>
</div>
</div>
</div>
</div>