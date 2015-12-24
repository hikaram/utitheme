<?php $this->breadcrumbs=array(
    Yii::t('app','Панель управления') => array('/admin'),
    Yii::t('app','Рубрики блога') => array('/admin/blog/index/rubrics'),
    Yii::t('app','Создание рубрики') => array('')
    );?>
<?php $form = $this->beginWidget('CActiveForm', array(
    'enableAjaxValidation' => 'false'
    )
)
?>
<p class="note note-danger" style="color:red">
    <i class="fa fa-warning" style="margin-right: 10px;"></i> <?=Yii::t('app', 'Поля помеченные')?> <span class="required">*</span> <?=Yii::t('app', 'обязательны к заполнению.')?>
</p>
<div class="portlet green box"> 
    <div class="portlet-title">
        <div class="caption" style='margin: 10px; display: block; float: none;'>
            <i class="glyphicon glyphicon-plus"></i> <h4> <?=Yii::t('app','Создание новой рубрики блога')?> </h4>
        </div>
    </div>
    <div class="portlet-body form form-horizontal">
        <div class="form-body">
        
            <div class="mt20"></div>
            <div class="form-group">
                <?=CHtml::activeLabelEx($rubriclang, 'name',array('class'=>'col-md-3 control-label','style'=>'float:left;padding:5px;width:15%')); ?>
                <div class="col-md-9">
                    <div class="input-icon right">
                        <i class="fa fa-exclamation tooltips" style="color:#f3565d; display:none;" data-original-title="<?=$rubriclang->getError('name');?>" data-container="body"></i>
                        <?=CHtml::activeTextField($rubriclang, 'name', array('class' => 'form-control input-large')); ?>
                    </div>
                    <p class="help-block text-error" style="color:red"><?=$rubriclang->getError('name');?></p>
                </div>
            </div>            
            <div class="mt20"></div>
            <div class="form-group">
                <?=CHtml::activeLabelEx($rubriclang, 'name_group',array('class'=>'col-md-3 control-label','style'=>'float:left;padding:5px;width:15%')); ?>
                <div class="col-md-9">
                    <div class="input-icon right">
                        <i class="fa fa-exclamation tooltips" style="color:#f3565d; display:none;" data-original-title="<?=$rubriclang->getError('name');?>" data-container="body"></i>
                        <?=CHtml::activeDropDownList($rubric, 'parent_id', $rubric::LabelsGroups(), array('class' => 'form-control input-large', 'style' =>'width:255px'))?>
                    </div>
                    <p class="help-block text-error" style="color:red"><?=$rubric->getError('parent_id');?></p>
                </div>
            </div>
            
            
        </div>  
        <div class="form-actions">
            <?=CHtml::submitButton(Yii::t('app', 'Создать'), array ('class' => 'btn green', 'name' => 'btn_save')); ?>
            <? if (Yii::app()->user->checkAccess('AdminBlogRubrics')) : ?>
				<a href="javascript:void(0)" onclick="history.back()" class="btn grey">Назад</a>
        <? endif; ?>
    </div>  
</div>  
</div>    
<?php $this->endWidget(); ?>