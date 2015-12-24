<link rel="stylesheet" href="<?=Yii::app()->assetManager->getPublishedUrl(Yii::getPathOfAlias('uploads.css')); ?>/css/style.css" type="text/css" media="screen, projection" />
<?$this->breadcrumbs=array(
	'Загрузка файлов'=>array('index'),
	'Правка нескольких файлов' => array('editmany'),
);?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'uploads-admin-form', 'htmlOptions'=>array('enctype'=>'multipart/form-data', 'class'=>'reg-form'),
	'enableAjaxValidation'=>TRUE,
)); ?>

<h1>Шаг 2. Внесите необходимые изменения</h1>
  <p class="note">При загрузке картинки учитывайте, что максимальная ширина или высота загружаемого файла не должна превышать 3000px</p>
  
  <p class="note">Разрешенные типы файлов для загрузки превью: png, jpg, jpeg, gif</p>
  
    <p class="note">Поля с <span class="required">*</span> обязательно должны быть заполнены.</p>

    <p class="need_to_fill" style="color: red; font-size: 16px;"></p>
    <div class="pad"></div>
    
<?php foreach($modelsUploadsAdmin as $key=>$model) :?>
    <p>
<table class="editmany">
    <tbody>
        <tr><td rowspan="10" width="20%" style="text-align: center;"><?if(file_exists($path . '/ava_' .$model->local_name)):?><?=  CHtml::image($path . '/ava_' .$model->local_name)?><?  endif;?></td></tr>
        <tr>
                <td width="120" style="padding-top: 10px;"><?=CHtml::activeLabelEx($model,'name'); ?></td>
                <td>
                    <?php 
					$a = explode('.', $model->local_name);
					
					echo CHtml::ajaxLink(CHtml::image(Yii::app()->assetManager->getPublishedUrl(Yii::getPathOfAlias('uploads.css')) . '/css/trash-26.png', 
                            'Удалить'), 
                            array('deletefs','localname' => $a[0], 'ext' => $a[1]), 
                            array('dataType'=>'html',
                                    'beforeSend'=>'js:function(){
                                     return confirm(\'Удалить файл?\');                                            
                                }',
                                'idOfLink'=>'js:$(this).attr("id")',
                                'error'=>'js:function(){
                                    alert(\'Ошибка выполнения запроса. Повторите после перезагрузки страницы.\');
                                }','success' => 'js:function(){location.reload();}'), array('style' => 'float:right;'))?>  
                    <p class="error_text"></p>
                    <?=CHtml::activeTextField($model,'name', array('name' => get_class($model) . '[' . $key . '][name]','class' => 'normal needed', 'size' => '0', 'style' => 'width: 143px;')); ?>
                </td>
                
        </tr>
        <tr>
            <td></td>
            <td colspan="2"><?php echo $form->error($model,'name'); ?></td>
        </tr>
        
        <tr>
                <td width="120" style="padding-top: 10px;"><?=CHtml::activeLabelEx($model,'category__id'); ?></td>
                <td>
                <!--Вывод дерева категорий-->
                <a href="#" class="tree_category" id="<?=$key;?>">Показать дерево категорий</a>
                <table class="cats" style="display: none;">
                <?php foreach($cats as $key2 => $tree) :?>  
                     <tr class="tn-container" node="<?=$tree->id?>" parent="<?=$tree->parent_id?>" children_count="<?=count($tree->childs)?>" level="<?=$tree->tree_level?>">
                          <td class="tn-manager"  width="500">
                            <div class="tnm-children"></div>
                            <div class="tnm-content"><?=CHtml::encode($tree->category)?></div>
                            
                          </td>
                          <td>
                              <div class="choice" id="<?=CHtml::encode($tree->id)?>" myattr="<?=$key?>" style='float:left;'>
                            +
                            </div>
                          </td>


                    </tr>
                    <?php endforeach; ?> 
                </table>
                <p id="choosed_category<?=$key?>"><?php if(isset($model['category__id']) && !empty($model['category__id'])) :?><?=  CHtml::encode(UploadsCategories::GetName($model['category__id']));?><?php endif;?></p>
               
                    <p class="error_text"></p>
                    <?php echo CHtml::activeHiddenField($model,'category__id', array('class' => 'needed', 'id' => 'choosed_category_id'.$key, 'name' => get_class($model) . '[' . $key . '][category__id]')); ?>
                    <?php echo CHtml::activeHiddenField($model,'local_name', array('name' => get_class($model) . '[' . $key . '][local_name]')); ?>
                
                </td>
                
        </tr>
        <tr>
            <td></td>
            <td colspan="2"><?php echo $form->error($model,'category__id'); ?></td>
        </tr>
        
        
        <tr>
                <td width="120" style="padding-top: 10px;"><?php echo $form->labelEx($model,'is_paid', array('style'=>'width:300px;')); ?></td>
                <td><?php echo $form->checkBox($model,'is_paid', array('name' => get_class($model) . '[' . $key . '][is_paid]')); ?></td>
        </tr>
        <tr>
            <td></td>
            <td colspan="2"><?php echo $form->error($model,'is_paid'); ?></td>
        </tr>
        
        
         <tr>
                <td width="120" style="padding-top: 10px;"><?=CHtml::activeLabel($model,'comments'); ?></td>
                <td><?=CHtml::activeTextArea($model,'comments', array('name' => get_class($model) . '[' . $key . '][comments]', 'class' => 'normal', 'size' => '6', 'style' => 'width: 143px;')); ?></td>
        </tr>
        <tr>
            <td></td>
            <td colspan="2"><?php echo $form->error($model,'comments'); ?></td>
        </tr>
        <?php if(isset($all_roles)):?>
            <tr>
                    <td width="120" style="padding-top: 10px;"><?=CHtml::activeLabel($model,'role'); ?></td>
                    <td><?php echo $form->dropDownList($model,'role', $all_roles, array('name' => get_class($model) . '[' . $key . '][role]'));?></td>
            </tr>
        <?php endif;?>
        
        <tr>
            <td width="120" style="padding-top: 10px;"><?=CHtml::activeLabel($modelsPreviewUploadsAdmin[$key],'preview'); ?></td>
            
            <td style="position:relative;">
                <p class="error_preview"></p>
                <?php echo CHtml::activeFileField($modelsPreviewUploadsAdmin[$key],'preview', array('title'=>'Допустимые типы файлов - png, jpg, jpeg, gif, tif', 
                'name' => get_class($modelsPreviewUploadsAdmin[$key]) . '[]',  'class' => 'check_preview')); ?>
            
            <!--span  id="target_text">Файл не выбран</span-->
            </td>
        </tr>
        <tr>
            <td></td>
            <td colspan="2"><?php echo $form->error($modelsPreviewUploadsAdmin[$key],'preview'); ?></td>
        </tr>
       
	
</tbody>
</table><!-- form -->

<?php endforeach;?>

<?php echo CHtml::submitButton( 'Сохранить', array('class'=>'btn200', 'id' => 'saveall')); ?>


<?php $this->endWidget(); ?>
<script>
    
    
    $(function(){ 
        
        $.each($('.cats'), function(index,val) {
            $(val).Tree({
                ajax : {
                    url 	: '/admin/uploads/Ajaxuser/getStructure',
                    data	: {
                        YII_CSRF_TOKEN      : app.csrfToken
                    },            
                    node_attributes : {
                        userid  : 'node',
                        level   : 'level'
                    }
                }

            });
        });
   
 
 $('.choice').click(function(event){
        var result;  
        var ind = $(this).attr('myattr');
        result = confirm('Выбрать категорию ' + $(this).parent().prev().children(".tnm-content").html() + '?');
        if(result)
            {
              $('#choosed_category'+ind).text($(this).parent().prev().children(".tnm-content").html());  
                   $(this).parents('.cats').prev('.tree_category').trigger('click'); ;
                  
              $('#choosed_category_id'+ind).val($(this).attr('id'));
            }
    });



 
 $(".tree_category").toggle(
      function () {
        $(this).html('Скрыть дерево категорий');        
        $(this).next(".cats").show();
      },
      function () {
        $(this).html('Показать дерево категорий');
        $(this).next(".cats").hide();
      }
    );
   
});

     
    $('#sel_but').click(function(event){        
        $('#preview_hid').trigger('click');        
    });
    
    $('#preview_hid').change(function(event){
    var test = ($(this).val()).split("\\");   
   
    $('#target_text').text(test[test.length-1]);
        
    });




</script>