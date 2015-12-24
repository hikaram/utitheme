<?php
    $url = Yii::app()->assetManager->publish(dirname($this->getModule()->getControllerPath()) . DIRECTORY_SEPARATOR . 'img');
?>

<div class="row">
    <div class="col-md-6">
        <div class="portlet sale-summary">
            <div class="portlet-title">
                <div class="caption">
                    <?=CHtml::encode($model->getModelSpecification()->title)?>
                </div>
            </div>
            <div class="portlet-body">
                
                <?php $form=$this->beginWidget('CActiveForm', array('enableAjaxValidation'=>false)); ?>
            
                    <ul class="list-unstyled">
                        <li>
                            <span class="sale-info">
                                <?=Yii::t('app', 'Сумма операции')?>
                            </span>
                            <span class="sale-num">
                                <?=sprintf('%.2f', $model->getModelTransactions()->amount)?> <?=$model->getModelTransactions()->currency->abbreviation?>
                            </span>
                        </li>
                        <li>
                            <span class="sale-info">
                                <?=Yii::t('app', 'Комиссия')?>
                            </span>
                            <span class="sale-num">
                                0.00 <?=$model->getModelTransactions()->currency->abbreviation?>
                            </span>
                        </li>
                        <li>
                            <span class="sale-info">
                                <?=Yii::t('app', 'Сумма к оплате')?>
                            </span>
                            <? //vg($form_qiwi);die;?>
                            <span class="sale-num">
                                <?=sprintf('%.2f', $amount)?> <?=$model->getModelTransactions()->currency->abbreviation?>
                            </span>
                        </li>
                        <li style="padding: 22px 0;">
                            <span style =" float: left;  padding: 1px 28px 10px; background: url(<?=$url?>/visa_logo.png) no-repeat;">&nbsp;</span> 
                            <span class="sale-info" style="font-size: 11px;">
                                <?=Yii::t('app', 'Введите номер телефона на который зарегистрирована Ваша кредитная карта.')?>
                            </span>
                            <br /><br />
                            <span class="sale-num">
                                <input id="phone" type="text" name="phone" value="" class="form-control" style="margin-top: -8px;" />
                            </span>
                        </li>
                    </ul>

                    <?php echo CHtml::submitButton(Yii::t('app', 'Оплатить'), array('class'=>'btn green', 'name'=>'pay')); ?>
                    
                <?php $this->endWidget(); ?>
                
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

document.getElementById("phone").onkeypress  = function(e) {

  e = e || event;

  if (e.ctrlKey || e.altKey || e.metaKey) return;

  var chr = getChar(e);

  // с null надо осторожно в неравенствах, т.к. например null >= '0' => true!
  // на всякий случай лучше вынести проверку chr == null отдельно
  if (chr == null) return;

  if ((chr < '0' || chr > '9')&& chr != '+') {
    return false;
  }

}



function getChar(event) {
  if (event.which == null) {
    if (event.keyCode < 32) return null;
    return String.fromCharCode(event.keyCode) // IE
  }

  if (event.which!=0 && event.charCode!=0) {
    if (event.which < 32) return null;
    return String.fromCharCode(event.which)   // остальные
  }

  return null; // специальная клавиша
}

    
</script>