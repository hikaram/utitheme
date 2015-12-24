<?php $this->breadcrumbs=array(
    Yii::t('app', 'Панель управления') => array('/admin'),
    Yii::t('app', 'Рубрики блога') => array('rubrics'),
    Yii::t('app', "$title") => array('index/editrubric/id/'.$rubriclang->id),
    
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
            <i class="glyphicon glyphicon-plus"></i> <h4><?=$title?> </h4>
        </div>
    </div>
    <div class="portlet-body form form-horizontal">
        <div class="form-body">
            <div class="mt20"></div>
            <div class="form-group">
                <?=CHtml::activeLabelEx($rubriclang, $activeLabel,array('class'=>'col-md-3 control-label','style'=>'float:left;padding:5px;width:15%')); ?>
                <div class="col-md-9">
                    <div class="input-icon right">
                        <i class="fa fa-exclamation tooltips" style="color:#f3565d; display:none;" data-original-title="<?=$rubriclang->getError('name');?>" data-container="body"></i>
                        <?=CHtml::decode(CHtml::activeTextField($rubriclang, 'name', array('class' => 'form-control input-large'))); ?>
                    </div>
                    <p class="help-block text-error" style="color:red"><?=$rubriclang->getError('name');?></p>
                </div>
            </div>            
        </div>  
        <div class="form-actions">
            <?=CHtml::submitButton(Yii::t('app', 'Изменить'), array ('class' => 'btn green')); ?>
            <? if (Yii::app()->user->checkAccess('AdminBlogRubrics')) : ?>
            <?=CHtml::link(Yii::t('app', 'Назад'), $this->createUrl('rubrics'), array('class' => 'btn grey'))?>
        <? endif; ?>
    </div>  
</div>  
</div>    
<?php $this->endWidget(); ?>