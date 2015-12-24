<?php
/* @var $this UploadsAdminController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(Yii::t('app', 'Загруженные файлы') => array('index'));
?>
<link rel="stylesheet" href="<?=Yii::app()->assetManager->getPublishedUrl(Yii::getPathOfAlias('uploads.css')); ?>/css/style.css" type="text/css" media="screen, projection" />

<button class='btn200' onclick="window.location.href='/admin/uploads/shopcategories/create'">Добавить категорию</button>

<div class="pad"></div>
<button class='btn200' onclick="window.location.href='/admin/uploads/shopcategories/index'">Просмотр категорий</button>

<div class="pad"></div>
<button class='btn200' onclick="window.location.href='/admin/uploads/shopfiles/create'">Добавить товар</button>
<button class='btn200' onclick="window.location.href='/admin/uploads/shopfiles/createbig'">Добавить товар-файл большого размера</button>
<button class='btn200' onclick="window.location.href='/admin/uploads/shopfiles/createmany'">Добавить товар из нескольких файлов</button>

<div class="pad"></div>

<div class="pad"></div>

<?if(isset($subcat)) :?>
<?php echo CHtml::link(CHtml::encode('Вернуться в начало'), array('shopfiles/index'))  ?></br>
<?  endif;?>

<?php if(!empty($modelsCategories)):?>
<?if(isset($subcat) && isset($category)) :?>
<h1>Список подкатегорий категории <?= CHtml::encode($category->category)?></h1>
<?  endif;?>
<table class="CSSTableGenerator">
    <tr>
        <td>Категория</td>
        <td>Действия</td>
    </tr>
<?php  foreach ($modelsCategories as $category) :?>
 <tr>
     <td style="text-align: left;">
        <?php echo CHtml::link(CHtml::encode($category->category),
            array('shopfiles/index', 'id'=>$category->id), array('name'=>$category->category, 'style' => 'color:#666666;')); ?>
    
    </td>
     <td style="width: 200px;">
         <?php echo CHtml::link(
            'Посмотреть',
            array('shopfiles/index', 'id'=>$category->id), array('name'=>$category->category)); ?>
    </td>
    
</tr> 
<?php endforeach;?>
</table>
<?php  endif;?>
<div class="separator"></div>
<?php if(!empty($category_files)):?>

    <?php echo $this->renderPartial('view_files', array('category_files'=>$category_files)); ?>    
    
<?  endif;?>

<div class="pad"></div>

<script>
       $('.toggle_play').toggle(
      function () {        
        $(this).parents('td').find('.player').show();
      },
      function () {
        $(this).parents('td').find('.player').hide();
       
      }
      );
  
</script>