<style>
textarea.error {
    border: 1px solid red;
}
</style>
<?php $this->breadcrumbs=array(
    Yii::t('app', 'Панель управления') => array('/admin'),
    Yii::t('app', 'Список комментариев') => array('index'),
    Yii::t('app', 'Редактирвоание комментария') => array('comments/edit/id/' . $comment->id)
);?>
<?php $form = $this->beginWidget('CActiveForm', array(
    'enableAjaxValidation' => 'false'
    )
)
?> 
<p class="note note-danger">
        <i class="fa fa-warning" style="margin-right: 10px;"></i> <?=Yii::t('app', 'Поля помеченные')?> <span class="required">*</span> <?=Yii::t('app', 'обязательны к заполнению.')?>
    </p>   

    <div class="portlet green box"> 
        <div class="portlet-title">
            <div class="caption">
                <i class="glyphicon glyphicon-pencil"></i> <?=Yii::t('app','Редактирование статьи блога')?>
            </div>
        </div>
        <div class="portlet-body form form-horizontal">
            <div class="form-body">
                <div class="mt20"></div>
                <div class="form-group">
                    <label class ='col-md-3 control-label'><?=Yii::t('app','Название модуля'); ?></label>
                    <div class="col-md-9">
                        <div class="input-icon right">
                            <label class ='form-control input-large'><?=$comment->alias->object->module_name; ?></label>
                        </div>                       
                    </div>
                </div> 
                <div class="form-group">
                    <label class ='col-md-3 control-label'><?=Yii::t('app','Название статьи'); ?></label>
                    <div class="col-md-9">
                        <div class="input-icon right">
                            <label class ='form-control input-large'><? eval($comment->alias->object->commet_title_code) ?></label>
                        </div>                       
                    </div>
                </div>    
                <div class="form-group">
                    <label class ='col-md-3 control-label'><?=Yii::t('app','Ссылка на статью'); ?></label>
                    <div class="col-md-9">
                        <div class="input-icon right">
                            <label class ='form-control input-large'>
                             <a  href="<? eval($comment->alias->object->link_code)?>" target="_blank"> <?=Yii::t('app','ссылка')?> </a>
                            </label> 
                        </div>                       
                    </div>
                </div>                     
                <div class="form-group">
                    <?=CHtml::activeLabelEx($comment, 'comment_text',array('class'=>'col-md-3 control-label')); ?>
                    <div class="col-md-9">
                        <div class="input-icon right">
                            <i class="fa fa-exclamation tooltips" style="color:#f3565d; display:none;" data-original-title="<?=$comment->getError('comment_text');?>" data-container="body"></i>
                            <?=CHtml::activeTextArea($comment, 'comment_text', array('class' => 'form-control')); ?>
                        </div>
                        <p class="help-block text-error"><?=$comment->getError('comment_text');?></p>
                    </div>
                </div>
                <div class="form-group">
                    <?=CHtml::activeLabelEx($comment,'status_id',array('class'=>'col-md-3 control-label')); ?>
                    <div class="col-md-9">
                        <div class="input-icon right">
                            <i class="fa fa-exclamation tooltips" style="color:#f3565d; display:none;" data-original-title="<?=$comment->getError('status_id');?>" data-container="body"></i>
                            <?=CHtml::activeDropDownList($comment, 'status_id', $comment::LabelStatus(), array('class' => 'form-control input-large'))?>
                        </div>
                        <p class="help-block text-error"><?=$comment->getError('status_id');?></p>
                    </div>
                </div>  
                <div class="form-group">
                    <?=CHtml::activeLabelEx($comment, 'is_editable',array('class'=>'col-md-3 control-label')); ?>
                    <div class="col-md-9" style="padding-top:9px">
                        <?=CHtml::activeCheckBox($comment, 'is_editable'); ?>
                    </div> 
                </div>
            </div>  
            <div class="form-actions">
                <?=CHtml::submitButton(Yii::t('app', 'Изменить'), array ('class' => 'btn green')); ?>
                <? if (Yii::app()->user->checkAccess('AdminBlogPosts')) : ?>
                    <?=CHtml::link(Yii::t('app', 'Назад'), $this->createUrl('index'), array('class' => 'btn grey'))?>
                <? endif; ?>
            </div>  
        </div>  
    </div>

<?php $this->endWidget(); ?>