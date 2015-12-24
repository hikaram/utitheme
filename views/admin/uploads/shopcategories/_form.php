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
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'uploads-categories-form', 'htmlOptions'=>array('enctype'=>'multipart/form-data', 'class'=>'reg-form'),
	'enableAjaxValidation'=>false,
)); ?>

<p class="note">Поля с <span class="required">*</span> обязательно должны быть заполнены.</p>

    <div class="error-summary"><?=CHtml::errorSummary(array($model)); ?></div>
    
    <div class="pad"></div>

<table class="form">
    <tbody>
        <tr>
                <td style="padding-top: 10px;"><?=CHtml::activeLabelEx($model,'category'); ?></td>
                <td colspan="2"><?=CHtml::activeTextField($model,'category', array('class' => 'normal', 'size' => '0', 'style' => 'width: 143px;')); ?></td>
        </tr>
        
        <tr>
 
                <td style="padding-top: 10px;"><?=CHtml::activeLabelEx($model,'parent_id'); ?></td>
                <td>
                <!--Вывод дерева категорий-->
                <input type="text" value="<?php echo isset($model->parent_id) ? UploadsShopCategories::GetName($model->parent_id) : ''?>" readonly="readonly" id="cat_text" style="width: 250px;">
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
                <?php echo CHtml::activeHiddenField($model,'parent_id', array('id' => 'choosed_category_id')); ?>
                </td>
        </tr>
        <tr>
                <td width="180" style="padding-top: 10px;"><?=CHtml::activeLabelEx($model,'image'); ?>*</td>
                <td width="180"><?php echo CHtml::activeFileField($model, 'image'); ?></td>
                <td style="vertical-align:middle;">
                    <?php if(isset($external_path) && $model->avatar) :?>
                    <p>Текущая картинка:</p>
                    <?php echo CHtml::image($external_path . '/' . $model->id.  '/' . 'ava_'.$model->avatar, 'Не задана'); ?>
                <?php endif;?>
                </td>
                
        </tr>
        
        
        <tr>
                <td width="180" style="padding-top: 10px;"><?=CHtml::activeLabelEx($model_lang,'key_words'); ?></td>
                <td colspan="2"><?php echo CHtml::activeTextArea($model_lang, 'key_words'); ?></td>
        </tr>
        
        

	
	
</tbody>
</table><!-- form -->
	
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
	

<?php $this->endWidget(); ?>

</div><!-- form -->
<script>
 
 $("#tree_category").toggle(
      function () {
        $(this).html('Скрыть дерево категорий');
        $('#cats').show();
      },
      function () {
            $(this).html('Показать дерево категорий');
        $('#cats').hide();
      }
    );</script>