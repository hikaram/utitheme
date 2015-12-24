<?php
/* @var $this UploadsAdminController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(Yii::t('app', 'Загруженные файлы') => array('index'));
?>

<div class="portlet box yellow">
        <div class="portlet-title">
            <h3 class="caption"><i class="fa fa-users"></i> <?=Yii::t('app', 'Список файлов библиотеки')?></h3>
        </div>
        <div class="portlet-body form form-horizontal">
            <div class="form-body">
				<div class="form-actions">
					<? if (Yii::app()->user->checkAccess('AdminUploadsCategoriesCreate')) : ?>
						<?=CHtml::link(Yii::t('app', 'Добавить категорию'), $this->createUrl('categories/create'), array('class' => 'btn green'));?>
					<? endif; ?>
					
					<? if (Yii::app()->user->checkAccess('AdminUploadsCategoriesView')) : ?>
						<?=CHtml::link(Yii::t('app', 'Просмотр категорий'), $this->createUrl('categories/index'), array('class' => 'btn green'));?>
					<? endif; ?>
				</div>
				<div class="form-actions">
					<? if (Yii::app()->user->checkAccess('AdminUploadsDefaultCreate')) : ?>
						<?=CHtml::link(Yii::t('app', 'Добавить файл'), $this->createUrl('create'), array('class' => 'btn green-seagreen'));?>
					<? endif; ?>
					
					<? if (Yii::app()->user->checkAccess('AdminUploadsShopfilesCreatebig')) : ?>
						<?=CHtml::link(Yii::t('app', 'Добавить файл большого размера'), $this->createUrl('createbig'), array('class' => 'btn green-seagreen'));?>
					<? endif; ?>

					<? if (Yii::app()->user->checkAccess('AdminUploadsShopfilesCreatebig')) : ?>
						<?=CHtml::link(Yii::t('app', 'Добавить несколько файлов'), $this->createUrl('createmany'), array('class' => 'btn green-seagreen'));?>
					<? endif; ?>
				</div>
				<div class="form-actions">
					<? if (Yii::app()->user->checkAccess('AdminUploadsShopfilesCreatebig')) : ?>
						<?=CHtml::link(Yii::t('app', 'Добавить несколько картинок'), $this->createUrl('createmany', array('photo'=>1)), array('class' => 'btn yellow'));?>
					<? endif; ?>
				</div>
			
				<?if(isset($subcat)) :?>
				<?php echo CHtml::link(CHtml::encode('Вернуться в начало'), array('index'))  ?></br>
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
								array('index', 'id'=>$category->id), array('name'=>$category->category, 'style' => 'color:#666666;')); ?>
						
						</td>
						<td style="width: 200px;">
							 <?php echo CHtml::link(
								'Посмотреть',
								array('index', 'id'=>$category->id), array('name'=>$category->category)); ?>
						</td>
					</tr> 
					<?php endforeach;?>
				</table>
				<?php  endif;?>
				<div class="separator"></div>
				<?php if(!empty($category_files)):?>
					<?php echo $this->renderPartial('view_files', array('category_files'=>$category_files)); ?>    
				<? endif;?>


            </div>
        </div>
</div>

<link rel="stylesheet" href="<?=Yii::app()->assetManager->getPublishedUrl(Yii::getPathOfAlias('uploads.css')); ?>/css/style.css" type="text/css" media="screen, projection" />

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