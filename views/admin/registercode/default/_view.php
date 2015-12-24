<?php
/* @var $this RegisterCodeController */
/* @var $data RegisterCode */
?>

    <div class="portlet-body">
        <div class="row mt20">
            <div class="col-md-3">
                <h4 class="h4-label"><?=Yii::t('app', 'Id')?></h4>
            </div>
            <div class="col-md-9">
                <h4><?=CHtml::encode($data->id); ?></h4>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-3">
                <h4 class="h4-label"><?=Yii::t('app', 'Описание')?></h4>
            </div>
            <div class="col-md-9">
                <h4><?=CHtml::encode($data->description); ?></h4>
            </div>
        </div>  
        
        <div class="row">
            <div class="col-md-3">
                <h4 class="h4-label"><?=Yii::t('app', 'Позиция')?></h4>
            </div>
            <div class="col-md-9">
                <h4><?=CHtml::encode($this->printData('position_alias', $data->position_alias)); ?></h4>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-3">
                <h4 class="h4-label"><?=Yii::t('app', 'Активен')?></h4>
            </div>
            <div class="col-md-9">
                <h4><?= CHtml::encode($this->printData('is_active', $data->is_active)) ?></h4>
            </div>
        </div>        
    </div>
    