<link rel="stylesheet" href="<?=Yii::app()->assetManager->getPublishedUrl(Yii::getPathOfAlias('uploads.css')); ?>/css/style.css" type="text/css" media="screen, projection" />
<?php
 $options = array();
        foreach ($modelsCategories as $key => $modelParent)  
        {
            $options[$modelParent->id] = array('class' => 'tree-level-' . $modelParent['tree_level']);
        }
     
?>
<style>
   <?php for($i = 0; $i < 10; $i++) : ?>
    .tree-level-<?=$i+1?> { padding-left : <?=$i * 20?>px }
    <?php endfor; ?> 
</style>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'uploads-admin-form', 'htmlOptions'=>array('enctype'=>'multipart/form-data', 'class'=>'reg-form'),
	'enableAjaxValidation'=>TRUE,
)); ?>

<?php if($model->isNewRecord) :?>
  <p class="note">Разрешенные типы файлов для загрузки в библиотеку: <?=Yii::app()->controller->module->params->file_list?></p>
<?php endif;?>
  <p class="note">Разрешенные типы файлов для загрузки превью: <?=Yii::app()->controller->module->params->ava_list?></p>
  <p class="note">При загрузке картинки учитывайте, что максимальная ширина или высота загружаемого файла не должна превышать 3000px</p>
<p class="note">Поля с <span class="required">*</span> обязательно должны быть заполнены.</p>

    <div class="error-summary"><?=CHtml::errorSummary(array($model)); ?></div>
    <div class="error-summary"><?=CHtml::errorSummary(array($preview)); ?></div>
    <div class="pad"></div>

<table class="form">
    <tbody>
        <tr>
                <td width="120" style="padding-top: 10px;"><?=CHtml::activeLabelEx($model,'name'); ?></td>
                <td><?=CHtml::activeTextField($model,'name', array('class' => 'normal', 'size' => '0', 'style' => 'width: 250px;')); ?></td>
        </tr>
        
        <tr>
                <td style="padding-top: 10px;"><?=CHtml::activeLabelEx($model,'category__id'); ?></td>
                <td>
                <!--Вывод дерева категорий-->
                <input type="text" value="<?php echo isset($model->categories) ? $model->categories->category : ''?>" readonly="readonly" id="cat_text" style="width: 250px;">
                <a href="#" id="tree_category">Показать дерево категорий</a>
                <table id="cats" style="display: none;">
                <?php foreach($cats as $key => $tree) :?>  
                     <tr class="tn-container" node="<?=$tree->id?>" parent="<?=$tree->parent_id?>" children_count="<?=count($tree->childs)?>" level="<?=$tree->tree_level?>">
                          <td class="tn-manager"  width="500">
                            <div class="tnm-children"></div>
                            <div class="tnm-content"><?=CHtml::encode($tree->category)?></div>
                            
                          </td>
                          <td>
                              <div class="choice" id="<?=CHtml::encode($tree->id)?>" style='float:left;'>
                            +
                            </div>
                          </td>


                    </tr>
                <?php endforeach; ?> 
                </table>
                
               
                <?php if($model->isNewRecord) :?>
                    <?php echo CHtml::activeHiddenField($model,'category__id', array('id' => 'choosed_category_id')); ?>
                <?php else:?>
                    <?php echo CHtml::activeHiddenField($model,'current_category__id', array('id' => 'choosed_category_id')); ?>
                <?php endif;?>
                
                
                </td>
                
        </tr>
        
        <tr>
                <td width="120" style="padding-top: 10px;"><?php echo $form->labelEx($model,'is_paid', array('style'=>'width:300px;')); ?></td>
                <td><?php echo $form->checkBox($model,'is_paid', array()); ?></td>
        </tr>
        
         <tr>
                <td width="120" style="padding-top: 10px;"><?=CHtml::activeLabel($model,'comments'); ?></td>
                <td><?=CHtml::activeTextArea($model,'comments', array('class' => 'normal', 'size' => '6', 'style' => 'width: 143px;')); ?></td>
        </tr>
         <tr>
                <td width="120" style="padding-top: 10px;"><?=CHtml::activeLabel($model_lang,'key_words'); ?></td>
                <td><?=CHtml::activeTextArea($model_lang,'key_words', array('class' => 'normal', 'size' => '6', 'style' => 'width: 143px;')); ?></td>
        </tr>
        <?php if(isset($all_roles)):?>
            <tr>
                    <td width="120" style="padding-top: 10px;"><?=CHtml::activeLabel($model,'role'); ?></td>
                    <td><?php echo $form->dropDownList($model,'role', $all_roles, array());?></td>
            </tr>
        <?php endif;?>
        
        <?php if($model->isNewRecord) :?>
        <tr>
            <td width="120" style="padding-top: 10px;"><label>Файл для загрузки *</label></td>
            <td><?php echo CHtml::activeFileField($model, 'image', array('title'=>'Допустимые типы файлов - pdf, flv, png, jpg, jpeg, gif, tif, mp3, zip, rar, txt')); ?></td>
        </tr>
        <? endif;?>
       <!--Загрузка превью--> 
        <?php if(!isset($thumb)) :?>
        <tr>
            <td width="120" style="padding-top: 10px;"><?php echo $form->labelEx($preview,'preview'); ?></td>
            
            <td style="position:relative;">
            <?php echo CHtml::activeFileField($preview,'preview', array('title'=>'Допустимые типы файлов - png, jpg, jpeg, gif, tif', 'style'=>'display:none;', 'id' => 'preview_hid')); ?>
            <?php echo CHtml::button('Обзор...', array('id'=>'sel_but', 'style'=>'position:relative;')); ?>
            <span  id="target_text">Файл не выбран</span>
            </td>
        </tr>
        <? else:?>
        
        <tr>
            <td width="120" style="padding-top: 10px;"><?php if(isset($thumb)) : ?>Сменить preview<?else:?><?php echo $form->labelEx($preview,'preview'); ?><?  endif;?></td>
            <td width="120">
                <?php echo CHtml::activeFileField($preview,'preview', array('title'=>'Допустимые типы файлов - png, jpg, jpeg, gif, tif', 'style'=>'display:none;', 'id' => 'preview_hid')); ?>
                <?php echo CHtml::button('Обзор...', array('id'=>'sel_but')); ?>
                <span id="target_text"></span>                       
                      
            </td>
            <td>
                <?=CHtml::image($thumb, '')?>    
            </td>
             
        </tr>
        
        
        <? endif;?>
        <tr>
                <td width="120" style="padding-top: 10px;"><?=CHtml::activeLabelEx($model_lang,'author'); ?></td>
                <td><?=CHtml::activeTextField($model_lang,'author', array('class' => 'normal', 'size' => '0', 'style' => 'width: 250px;')); ?></td>
        </tr>
        
        
        
	
</tbody>
</table><!-- form -->



		<?php echo CHtml::submitButton($model->isNewRecord ? 'Сохранить' : 'Сохранить'); ?>


<?php $this->endWidget(); ?>
