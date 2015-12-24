<?php $this->breadcrumbs[] = Yii::t('app', 'Контакты') ?>
<script src="https://maps.googleapis.com/maps/api/js?language=<?=Yii::app()->language?>"></script>

<script>
  $(function(){
    var mapCanvas = document.getElementById('map_canvas'),
    myLatlng = new google.maps.LatLng(47.096037, 37.548657),
    mapOptions = {
      center: myLatlng,
      zoom: 6,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    },
    map = new google.maps.Map(mapCanvas, mapOptions);

    // To add the marker to the map, use the 'map' property
    new google.maps.Marker({
      position: myLatlng,
      map: map,
      title:"УКРТЕХИНФО - Решения для бизнеса"
    }); 

    new google.maps.Marker({
      position: new google.maps.LatLng(46.969596,32.010555),
      map: map,
      title:"УКРТЕХИНФО - Решения для бизнеса"
    });
    
  });
</script>
<div class="row margin-bottom-40">
  <div class="col-md-12">
    <div id="map_canvas" style="height: 400px;"></div>
  </div>
</div>


<div class="row">
  <div class="col-md-9 col-sm-9">
    <h2><?=Yii::t('app', 'Контактная форма')?></h2>

<?php if(Yii::app()->user->hasFlash('contact')): ?>
<?php else: ?>
  <p>
    <?=Yii::t('app', 'Если у вас есть вопросы или предложения, то пожалуйста, заполните и отправьте нам форму. Спасибо!')?>
  </p>
<?php endif; ?>
    <?php $form=$this->beginWidget('CActiveForm', array(
     'id'=>'contact-form',
     'htmlOptions' => array(
      'class' => 'form-without-legend',
      'role'=> 'form'
      ),
     'enableClientValidation'=>false,
     'clientOptions'=>array(
      'validateOnSubmit'=>true,
      ),
      )); ?>
      <div class="note">
        <?=Yii::t('app', 'Поля помеченные')?> <span class="required">*</span> <?=Yii::t('app', 'обязательны к заполнению')?>.
      </div>
      <?php if($model->hasErrors()){ ?>
      <div class="note note-danger">
        <?php echo $form->errorSummary($model); ?>
      </div>
      <?php } ?>
      <div class="form-group">
        <?php echo $form->labelEx($model, 'name',  array('class'=>'control-label')); ?>
        <div class="input-group">
          <?php echo $form->textField($model, 'name', array('class' => 'form-control')); ?>
          <span class="input-group-addon">
            <i class="fa fa-user"></i>
          </span>
        </div>
        <?php echo $form->error($model, 'name'); ?>
      </div>

      <div class="form-group">
        <?php echo $form->labelEx($model, 'email',  array('class'=>'control-label')); ?>
        <div class="input-group">
          <?php echo $form->textField($model, 'email', array('class' => 'form-control')); ?>
          <span class="input-group-addon">
            <i class="fa fa fa-envelope"></i>
          </span>
        </div>
        <?php echo $form->error($model, 'email'); ?>

      </div>

      <div class="form-group">
        <?php echo $form->labelEx($model, 'subject',  array('class'=>'control-label')); ?>
        <?php echo $form->textField($model, 'subject',array('size'=>60, 'maxlength'=>128, 'class' => 'form-control')); ?>
        <?php echo $form->error($model, 'subject'); ?>
      </div>

      <div class="form-group">
        <?php echo $form->labelEx($model, 'body',  array('class'=>'control-label')); ?>
        <?php echo $form->textArea($model,'body', array('rows'=>6, 'cols'=>50, 'class' => 'form-control')); ?>
        <?php echo $form->error($model, 'body'); ?>
      </div>

      <? if ((Yii::app()->params['contactCaptcha'] != NULL) && ((bool)Yii::app()->params['contactCaptcha'])): ?>  
      <div class="form-group">
        <?php echo $form->labelEx($model,'verifyCode', array('class'=> 'control-label')); ?>
        <?php $this->widget('UTICaptcha', array('buttonLabel' => '<span class="refreshCaptcha"></span>', 'imageOptions' => array('style' => 'margin-bottom: -20px; margin-right: 10px; ')))?>
        <?=$form->textField($model, 'verifyCode', array('value' => '',  'class' => 'form-control margin-top-20')); ?>
        <div class="hint">
         <?=Yii::t('app', 'Пожалуйста, введите код с картинки')?>.<br/><?=Yii::t('app', 'Можно вводить без учета регистра')?>.
       </div>
       <?php echo $form->error($model,'verifyCode'); ?>
     </div>

   <?php endif; ?>
   <?php echo CHtml::submitButton('Отправить', array('class' => 'btn btn-primary')); ?>
   <?php $this->endWidget(); ?>
 </div>
  <?php
    Yii::import('application.modules.admin.modules.content.models.Contents');
        Yii::import('application.modules.admin.modules.content.models.ContentsLang');
        
        $criteria = new CDbCriteria(array(
            'condition' => 'name = :name',
            'params' => array(
                'name' => 'Контакты в контактах'
            ),
            'with' => array(
                'lang'
            )
        ));
        
        $content = Contents::model()->find($criteria);
        
        $text = '';
        
        if (!empty($content) && !empty($content->lang))
        {
            $text = $content->lang->text;
        }
        
        echo $text;
        
  ?>
</div>
