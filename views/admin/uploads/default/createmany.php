<link rel="stylesheet" href="<?=Yii::app()->assetManager->getPublishedUrl(Yii::getPathOfAlias('uploads.css')); ?>/css/style.css" type="text/css" media="screen, projection" />
<?php
/* @var $this UploadsAdminController */
/* @var $model UploadsAdmin */

$this->breadcrumbs=array(
	'Загрузка файлов'=>array('index'),
	'Добавить несколько файлов' => array('createmany'),
);

$this->menu=array(
	array('label'=>'List UploadsAdmin', 'url'=>array('index')),
	array('label'=>'Manage UploadsAdmin', 'url'=>array('admin')),
);
?>


<?php if(isset($photo)):?>
<h1>Выберите картинки</h1>
<p class="note">Разрешенные типы файлов для загрузки в библиотеку: png, jpg, jpeg, gif</p>
<p class="note">Максимальное количество загружаемых файлов - 20</p>
<?php else :?>
<h1>Шаг 1. Выберите файлы</h1>
<p class="note">Разрешенные типы файлов для загрузки в библиотеку: pdf, flv, png, jpg, jpeg, gif, mp3, zip, rar, txt</p>
<p class="note">Максимальное количество загружаемых файлов - 12</p>
<?php  endif;?><p class="note">Максимальный размер загружаемого файла 20 Мб. Для загрузки файлов большего размера используйте форму для загрузки единичного файла.</p>


<?php if(isset($cats)):?>
<div style="width: 500px; margin: 0 auto;">
    <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'uploads-admin-form', 'htmlOptions'=>array('enctype'=>'multipart/form-data', 'class'=>'reg-form'),
	'enableAjaxValidation'=>TRUE,
)); ?>
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
                <p id="choosed_category"></p>               
                
                <?php echo CHtml::activeHiddenField($model,'category__id', array('id' => 'choosed_category_id')); ?>
                
  
<?php $this->endWidget(); ?>
  
</div>
<?php  endif;?>

<!-- Область для перетаскивания -->	
<div id="drop-files" ondragover="return false">
		<p>Перетащите файлы сюда</p>
        <form id="frm">
        	<input type="file" id="uploadbtn" multiple />
        </form>
	</div>
    <!-- Область предпросмотра -->
	<div id="uploaded-holder"> 
		<div id="dropped-files">
        	<!-- Кнопки загрузить и удалить, а также количество файлов -->
        	<div id="upload-button">
            	<center>
                	<span>0 Файлов</span>
					<a href="#" class="upload" id="upload_all">Загрузить</a>
					<a href="#" class="delete">Удалить</a>
                    <!-- Прогресс бар загрузки -->
                	<div id="loading">
						<div id="loading-bar">
							<div class="loading-color"></div>
						</div>
						<div id="loading-content"></div>
					</div>
                </center>
			</div>  
        </div>
	</div>
	<!-- Список загруженных файлов -->
	<div id="file-name-holder">
		<ul id="uploaded-files">
			<h1>Загруженные файлы</h1>
		</ul>
	</div>
    
   

    