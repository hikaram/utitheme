<?php
/* @var $this UploadsAdminController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Категории'=>array('index'),
);

?>
<link rel="stylesheet" href="<?=Yii::app()->assetManager->getPublishedUrl(Yii::getPathOfAlias('admin.modules.uploads.css')); ?>/css/style.css" type="text/css" media="screen, projection" />

<h1>Категории файлов</h1>
<?php echo CHtml::link(CHtml::encode('Добавить категорию'), array('categories/create'))  ?></br>
<?php echo CHtml::link(CHtml::encode('Вернуться к списку файлов'), array('default/index'))  ?></br>
<div class="pad"></div>
<table class="CSSTableGenerator">
        <tbody>
            <tr>
                <td>Номер</td>
                <td>Категория</td>
                <td>Картинка</td>
                <td>Действия</td>
            </tr>
               
                <?php foreach($modelsCategories as $modelsCategory) : ?>
                
                <tr>
                    <td>
                            <?php echo CHtml::link(CHtml::encode($modelsCategory->id), array('view', 'id'=>$modelsCategory->id)); ?>
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
						<?php echo CHtml::link(CHtml::encode('Перейти в категорию'), array('/admin/uploads/default/index', 'id'=>$modelsCategory->id)); echo '</br>'  ?>
                        
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
