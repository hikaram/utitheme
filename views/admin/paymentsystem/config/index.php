<div class="portlet box yellow">
	<div class="portlet-title">
		<h3 class="caption"><i class="fa fa-gear" style="margin-right: 10px;"></i> <?=Yii::t('app', 'Атрибуты платежных систем')?></h3>
	</div>
	<div class="portlet-body">

        <div id="accordion" class="panel-group accordion">
            <?foreach ($model_list as $item => $page):?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a href="#collapse_<?=$item?>" data-parent="#accordion" data-toggle="collapse" class="accordion-toggle collapsed">
                                <?=CHtml::encode($page['description_help'])?>
                            </a>
                        </h4>
                    </div>   
                    <div class="panel-collapse collapse" id="collapse_<?=$item?>">
                        <div class="panel-body">

                        
                            <div class="form form-horizontal">
                            
                                <?php $form=$this->beginWidget('CActiveForm', array('enableAjaxValidation'=>false)); ?>
                            
                                    <div class="form-body">
                                        <hr />
                                        
                                        <? foreach ($config[$page['alias']] as $key => $value):?>
                                        
                                            <div class="form-group">
                                                <div class="col-md-2 text-right"><?=$key?>:</div>                    
                                                <div class="col-md-7">
                                                    <input type="text" name="form[<?=$key?>]" value="<?=$value?>" style="width: 430px;">
                                                </div>
                                            </div>                                    
                                        
                                        <? endforeach; ?>
                                      
                                        <hr />
                                    </div>
                                        
                                    <div class="form-actions">
                                        <input type="hidden" name="alias_config" value="<?=$page['alias']?>">
                                         <?php echo CHtml::submitButton(Yii::t('app', 'Сохранить'), array('name' => 'save', 'class' => 'btn green')); ?>
                                    </div>
                                
                                <?php $this->endWidget(); ?>              
                                
                            </div>                        

                        </div>
                    </div>            
                </div>                
            <? endforeach; ?>

        </div>    
    
		
	</div>
</div>

<? /*
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script>
$(function() {
    $( "#accordion" ).accordion({
        active: 100
    });
});
</script>

<style>
    h3{
        font-size:16px; 
        height: 20px;
        padding: 4px; 
        color:  #000; 
        cursor: pointer;  
        border: 1px solid black;
        -moz-box-shadow: 0 0 10px #000;
        -webkit-box-shadow: 0 0 10px #000;
        box-shadow: 0 0 10px #000;
        text-shadow: 0px 0px 0px white;
      }
    .h3:hover
    {
        background-color: #d3dfee;
        -moz-box-shadow: 0 0 10px #808080;
        -webkit-box-shadow: 0 0 10px #808080;
        box-shadow: 0 0 10px #808080;
    }
</style>
<div id="accordion">
    
    <?foreach ($model_list as $item => $page):?>
    <h3 class="h3">
        <div style="width: 100px; float: left;">
                <?=$page['name']?> 
        </div>    
        <div >
            <?=$page['description_help']?>
        </div>    
    </h3>
        <div>
            <?php $form=$this->beginWidget('CActiveForm', array('enableAjaxValidation'=>false)); ?>
                <table style="width:60%;">
                        <?foreach ($config[$page['alias']] as $key => $value):?>
                            <tr>
                                 <td style="background-color:#EEEEEE; padding:3px; width:200px"><?=$key?></td>      
                                 <td style="background-color:#FFFFFF; padding:3px; width: 430px;">
                                     <input type="text" name="form[<?=$key?>]" value="<?=$value?>" style="width: 430px;">
                                 </td>    
                            </tr>
                        <? endforeach;?>
                            <tr>
                                <td style="background-color:#EEEEEE; padding:3px; width: 200px;"></td>
                                <td style="background-color:#EEEEEE; padding:3px; width: 400px;" align="right">
                                     <input type="hidden" name="alias_config" value="<?=$page['alias']?>">
                                     <?php echo CHtml::submitButton('Сохранить', array('name'=>'save')); ?>
                                </td>
                            </tr>
                </table>   
            <?php $this->endWidget(); ?>              
        </div>
    <? endforeach;?>
</div>
*/ ?>