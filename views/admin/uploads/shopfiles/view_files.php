<link rel="stylesheet" href="<?=Yii::app()->assetManager->getPublishedUrl(Yii::getPathOfAlias('uploads.css')); ?>/css/style.css" type="text/css" media="screen, projection" />

<?php if(isset($category)) :?>
<h1>Список файлов категории <?= CHtml::encode($category->category)?></h1>

<?php else:?>
<h1>Список файлов данной категории</h1>
<?php  endif;?>
<div id='widgetWrapper'>
<?php $this->widget('application.modules.admin.modules.user.widgets.UserSearchAdminWidget', array('input_login'=>'filter_username'))->userSearch(); ?>
<input type="hidden" id="input_id_0" value="" />
</div>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'deleting-form',
	'enableAjaxValidation'=>false,
    'action'=>Yii::app()->createUrl('/admin/uploads/shopfiles/deletemany'),
)); ?>
<table class="CSSTableGenerator">
        <tbody>
            <tr>
                <td>Номер</td>
                <td>Имя файла</td>
                <td>Цена обычная</td>
                <td>Цена VIP</td>
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
                            <?php echo ($category_file->price_regular); ?>
                    </td> 
                    <td>
                            <?php echo ($category_file->price_vip); ?>
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
                        <?php echo CHtml::link(CHtml::encode('Редактирование'), array($category_file->has_childs ? 'updatemany':'update', 'id'=>$category_file->id)); echo '</br>'  ?>
                        
                        <?=CHtml::linkButton('Удалить',array(
                                'submit' => array('delete', 'id' => $category_file->id),
                                'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
                                'confirm' => "Удалить файл ?"));  ?>
                        
                        </br>
                        <?=CHtml::link('Подарить', 'javascript:void(0)', array('onClick' => 'start(this)', 'data-id' => $category_file->id))?>
                
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

<script type="text/javascript">

var shop_item;
$(function(){
    $('div#widgetWrapper').find('a').find('span.find').hide();
})
    function start(obj)
    {
        shop_item = $(obj).attr('data-id');
        show_table("users", null, null, null, 0);
    }
    
    function proceed(id, login, key)
    {
       if(confirm('Подарить пользователю ' + login + ' данный файл?'))
       {
        $.ajax({
            url : app.createAbsoluteUrl('admin/uploads/Shopfiles/Gift'),
            error   : function ()
            {
                alert('Ошибка запроса');
            },

            success : function(data)
            {
                if(data.error) alert(data.error);
                else
                alert('Файл передан в пользование.');
            },
            data    :
            {  
                YII_CSRF_TOKEN  : app.csrfToken,
                shop_item           : shop_item,
                user_id          : id,
                
            },
            async       : false,
            cache       : false
        });
       }
    }
</script>                    