           <div class="content-form-page">
            <div class="row">
                <div class="col-md-7 col-sm-7">
                    <div class="form">
                        <?=CHtml::beginForm('', 'post', array('class'=>'form-horizontal form-without-legend', 'role'=> 'form'))?>
                        <div class="form-group">
                         <label class="col-lg-4 control-label"><?=Yii::t('app', 'Введите пароль')?>:</label>
                         <div class="col-lg-8">

                             <?=CHtml::activepasswordField($user, 'password', array('value' => '', 'class'=>'form-control'));?>
                             <?  if ($user->getError('password')) : ?>
                             <div class="errorMessage"><?=CHtml::encode($user->getError('password'))?></div>
                         <? endif; ?>
                     </div>
                 </div>
                 <div class="form-group">
                     <label class="col-lg-4 control-label"><?=Yii::t('app', 'Подтвердите пароль')?>:</label>
                     <div class="col-lg-8">
                         <?=CHtml::activepasswordField($user, 'password_confirm', array('value' => '', 'class'=>'form-control'));?>
                         <?  if ($user->getError('password_confirm')) : ?>
                         <div class="errorMessage"><?=CHtml::encode($user->getError('password_confirm'))?></div>
                     <? endif; ?>
                 </div>

             </div>
             <div class="row padding-top-20">
                <div class="col-lg-2 col-xs-3 padding-left-0 col-md-offset-4 ">
                 <?=CHtml::submitButton(Yii::t('app', 'Далее'), array('class' => 'btn btn-primary', 'name' => 'btn-send'))?>

                 <?=CHtml::endForm()?>   
             </div> 
         </div> 
     </div> 
 </div> 
</div> 
</div> 
