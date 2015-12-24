<?php $this->breadcrumbs[Yii::t('app', 'Список созданных SEO тегов')] = $this->createUrl('index'); ?>

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box yellow">
            <div class="portlet-title">
                <div class="caption">
                    <i class="glyphicon glyphicon-list-alt"></i><?=Yii::t('app', 'Список созданных SEO тегов')?>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-hover">
                        <thead>
                            <tr class="top-table" >
                                <th>URL</th>
                                <th>SEO Title</th>
                                <th>SEO description</th>
                                <th>SEO keywords</th>                                
                                <th><?=Yii::t('app', 'Действия')?></th>
                            </tr>
                        </thead>
                    <?php if(empty($models)) :?>
                        <tr><td colspan="5"><?=Yii::t('app', 'Нет данных')?></td></tr>
                    <?php else : ?>                
                    <?php foreach($models as $key => $value) :?>  
                        <tr>
                            <td><?=$value->url?></td>
                            <td><?=$value->lang->title ?></td>
                            <td><?=$value->lang->description ?></td>
                            <td><?=$value->lang->keywords;?></td>
                            
                            
                            <td>
                            <?=CHtml::link('<i class="glyphicon glyphicon-pencil"></i>', $this->createUrl('default/update', array('id' => $value->id, 'page' => $pages->currentPage + 1)), array(
								'class'=>'btn green-seagreen tooltips',
								'data-container' => 'body', 
								'data-placement' => 'bottom',
								'data-original-title' => Yii::t('app', 'Редактировать'),
							))?>
                            
                            <?=CHtml::linkButton('<button class="btn red tooltips" data-original-title="' . Yii::t('app', 'Удалить') . '" data-placement="bottom"><i class="glyphicon glyphicon-remove"></i></button>',array(
                                'submit' => array('default/delete', 'id' => $value->id),
                                'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
                                'confirm' => Yii::t('app', 'Удалить данные?'),
                                ));?>
                                
                            </td>
                        </tr>
                    <?php endforeach; ?> 
                    <?php $this->widget('CLinkPager', array('pages' => $pages))?>
                    <?php endif; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo CHtml::link(CHtml::encode(Yii::t('app', 'Добавить SEO данные')), array('create'))  ?></br>
