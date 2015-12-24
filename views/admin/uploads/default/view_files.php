<link rel="stylesheet" href="<?=Yii::app()->assetManager->getPublishedUrl(Yii::getPathOfAlias('uploads.css')); ?>/css/style.css" type="text/css" media="screen, projection" />

<?php if(isset($category)) :?>
<h1>Список файлов категории <?= CHtml::encode($category->category)?></h1>

<?php else:?>
<h1>Список файлов данной категории</h1>
<?php  endif;?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'deleting-form',
	'enableAjaxValidation'=>false,
    'action'=>Yii::app()->createUrl('/admin/uploads/default/deletemany'),
)); ?>
<table class="CSSTableGenerator">
        <tbody>
            <tr>
                <td>Номер</td>
                <td>Имя файла</td>
                <td>Платный</td>
                <td>Категория</td>                
                <td>Дата загрузки</td>
                <td>Действия</td>
                <td>Удалить файлы</td>
            </tr>
               
                <?php foreach($category_files as $key=>$category_file) : ?>
                
                <tr>
                    <td>
                            <?php echo CHtml::link(CHtml::encode($category_file->id), array('view', 'id'=>$category_file->id)); ?>
                    </td>
                    <td id="<?=$category_file->id?>">
                        <?php if(($category_file->type == 'application/octet-stream') || ($category_file->type == 'video/x-flv')) :?>
                            <?php echo CHtml::link(CHtml::encode($category_file->name), array('#'), array('class' => 'toggle_play', 'style' => 'color:#666666;')); ?>

                            <div class="player" style="display: none;">
                                <object type="application/x-shockwave-flash" data="<?=Yii::app()->assetManager->getPublishedUrl(Yii::getPathOfAlias('admin.modules.uploads.player')); ?>/player_flv_maxi.swf" width="505" height="307">
                                    <param name="movie" value="<?=Yii::app()->assetManager->getPublishedUrl(Yii::getPathOfAlias('admin.modules.uploads.player')); ?>/player_flv_maxi.swf" />
                                    <param name="allowFullScreen" value="true" />
                                    <param name="FlashVars" value="flv=<?=$external_path . '/' . $category_file->category__id . '/' . $category_file->local_name?>&amp;width=505&amp;height=307" />
                                </object>
                            </div>
                        <?  else :?>
                            <?php echo CHtml::link(CHtml::encode($category_file->name), $external_path . '/' . $category_file->category__id . '/' . $category_file->local_name, array('target' => '_blank', 'style' => 'color:#666666;'));?>
                        <?  endif;?>
                    </td> 
                    <td>
                            <?php echo ($category_file->is_paid)? "Да" : "Нет"; ?>
                    </td> 
                    <td>
                            <?php if(isset($category_file->categories->category))
                            {echo CHtml::encode($category_file->categories->category);}
                            else {echo 'Не задано';}?>
                    </td> 
                    <td>
                            <?php echo CHtml::encode($category_file->date); ?>
                    </td>
                    <td>
                       
                        <?php echo CHtml::link(CHtml::encode('Просмотр'), array('view', 'id'=>$category_file->id)); echo '</br>'  ?>
                        <?php echo CHtml::link(CHtml::encode('Редактирование'), array('update', 'id'=>$category_file->id)); echo '</br>'  ?>
                        
                        <?=CHtml::linkButton('Удалить',array(
                                'submit' => array('delete', 'id' => $category_file->id),
                                'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
                                'confirm' => "Удалить файл ?"));  ?>
                        
                        </br>
                
                    </td>
                    <td>
                        <?php echo $form->checkBox($category_file,'deleted', array('name' => get_class($category_file) . '[' . $key . '][deleted]')); ?>
                        <?php echo $form->hiddenField($category_file,'id',array('value' => $category_file->id, 'name' => get_class($category_file) . '[' . $key . '][id]')); ?>
                    </td>    
              </tr>
                
                <?php endforeach; ?>
              <tr>
                  
              </tr>
    </tbody>
</table>
<?php echo CHtml::submitButton('Удалить выбранные файлы', array(
                                'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
                                'confirm' => "Удалить выбранные файлы ?",
                                'class' => 'btn200',
                                'name' => 'delete_checked',
                                'style' => 'float:right; margin-right:250px;'
                  ))?>
<div class="pad"></div>

<input type="hidden" name="current_category__id" value="<?php echo $category->id;?>">
<?php echo CHtml::submitButton('Удалить все файлы данной категории', array(
                                'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
                                'confirm' => "Удалить все файлы данной категории?",
                                'class' => 'btn200',
                                'name' => 'delete_all',
                                'style' => 'float:right; margin-right:250px;'
                  ))?>
<div class="pad"></div>
<?php $this->endWidget(); ?>
<?php $this->widget('CLinkPager', array(
                        'pages' => $pages,
                    )) ?>