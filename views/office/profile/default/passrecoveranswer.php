<div class="content-form-page">
    <div class="row">
        <div class="col-md-7 col-sm-7">
            <?=CHtml::beginForm('', 'post', array('class'=> 'form-horizontal form-without-legend', 'role'=>'form'))?>
            <div class="form-group">
                <label class="col-lg-4 control-label">
                    <?=CHtml::encode($answer->description)?>:
                </label>
                <div class="col-lg-8">
                    <?=CHtml::activeTextField($answer, 'answer', array('value' => '', 'class'=>'form-control'));?>
                    <?  if ((bool)$error) : ?>
                    <div style="color: red; font-size: 12px;"><?=CHtml::encode($error)?></div>
                </div>
            </div>
        <? endif; ?>
        <div class="row padding-top-20">
            <div class="col-lg-2 col-xs-3 padding-left-0 col-md-offset-4 ">
                <?=CHtml::submitButton(Yii::t('app', 'Далее'), array('class' => 'btn btn-primary', 'name' => 'btn_save'))?>
            </div>
        </div>
        <?=CHtml::endForm()?>
    </div>
</div>
</div>