<?php
/* @var $this UploadsAdminController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Категории магазина'=>array('index'),
);

?>
<link rel="stylesheet" href="<?=Yii::app()->assetManager->getPublishedUrl(Yii::getPathOfAlias('admin.modules.uploads.css')); ?>/css/style.css" type="text/css" media="screen, projection" />

<h1>Категории файлов</h1>
<?php echo CHtml::link(CHtml::encode('Добавить категорию'), array('shopcategories/create'))  ?></br>
<?php echo CHtml::link(CHtml::encode('Вернуться к списку файлов магазина'), array('shopfiles/index'))  ?></br>
<div class="pad"></div>
<table class="CSSTableGenerator" id="shopcats">
        <tbody>
            <tr>
                <td>Номер</td>
                <td>Категория</td>
                <td>Картинка</td>
                <td>Действия</td>
            </tr>
               
                <?php foreach($modelsCategories as $modelsCategory) : ?>
                
                <tr class="tn-container" node="<?=$modelsCategory['id']?>" parent="<?=$modelsCategory['parent_id']?>" children_count="<?=count($modelsCategory->childs)?>" level="<?=$modelsCategory['tree_level']?>">
                    <td class="tn-manager">
                        <div class="tnm-children"></div>
                        <div class="tnm-content"><?php echo CHtml::link(CHtml::encode($modelsCategory->id), array('view', 'id'=>$modelsCategory->id)); ?></div>
                            
                    </td>
                    <td>
                            <?php echo CHtml::encode($modelsCategory->category); ?>
                    </td>
                    <td>
                        <?php if(isset($external_path)) :?>
                       
                           <?php echo CHtml::image($external_path . '/' . $modelsCategory->id.  '/' . 'ava_'.$modelsCategory->avatar, 'Не задана'); ?>
                        
                        <?php endif;?>
                    </td>
                    
                    <td>
                       
                        <?php echo CHtml::link(CHtml::encode('Просмотр'), array('view', 'id'=>$modelsCategory->id)); echo '</br>'  ?>
                        <?php echo CHtml::link(CHtml::encode('Редактирование'), array('update', 'id'=>$modelsCategory->id)); echo '</br>'  ?>
						<?php echo CHtml::link(CHtml::encode('Перейти в категорию'), array('/admin/uploads/shopfiles/index', 'id'=>$modelsCategory->id)); echo '</br>'  ?>
                        
                        <?=CHtml::linkButton('Удалить',array(
                                'submit' => array('delete', 'id' => $modelsCategory->id),
                                'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
                                'confirm' => "Удалить категорию ?"));  ?>
                        
                       </br>
                
                    </td>

                    
              
                </tr>
                
                <?php endforeach; ?>
    </tbody>
</table>
<?php echo CHtml::link(CHtml::encode('Добавить категорию'), array('create'))  ?></br>
<script>
$('#shopcats').Tree({
            
        });
</script>