<div class="portlet box yellow">
	<div class="portlet-title">
		<h3 class="caption"><i class="fa fa-sitemap"></i> <?=Yii::t('app', 'Структуры')?></h3>
	</div>
	<div class="portlet-body form form-horizontal">
    
		<div class="form-body">
        
            <div class="note note-info" style="margin-top: 20px;">
                <p>
                    <?=Yii::t('app', 'Всего структур на проекте')?>: <span style="font-weight: 700;"><?=MatrixTypes::getTotalMatrixCount();?></span>
                </p>
                <p>
                    <?=Yii::t('app', 'Всего пользователей, участвующих в структурах')?>: <span style="font-weight: 700;"><?=MatrixTypes::getTotalUsersInMatrixCount();?></span>
                </p>
            </div>         
            
                <div class="table-scrollable">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th><?=Yii::t('app', '№ п/п')?></th>
                                <th><?=Yii::t('app', 'Название')?></th>
                                <th><?=Yii::t('app', 'Количество пользователей')?></th>
                                <th><?=Yii::t('app', 'Дата последней регистрации пользователя в структуре')?></th>
                                <th><?=Yii::t('app', 'Действия')?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = ((array_key_exists('page', $_GET) ? $_GET['page'] : (int)TRUE) - 1) * MATRIX_PER_PAGE + 1; ?>
                            <? foreach($matrix as $key => $value) :?>
                                <tr>
                                    <td><?=$i++?></td>
                                    <td><?=CHtml::encode($value->lang->name)?></td>
                                    <td><?=$value->getUserCount()?></td>
                                    <td>
                                        <? if ($value->last_user_token != NULL) : ?>
                                            <?=MSmarty::date_format($value->last_user_token->created_at, 'd.m.Y')?> <?=MSmarty::date_format($value->last_user_token->created_at, 'H:i')?>
                                        <? endif; ?>                                
                                    </td>
                                    <td>
                                        <? if (Yii::app()->user->checkAccess('AdminMatrixMatrixStructure')) : ?>
                                            <?=CHtml::link(Yii::t('app', 'Структура'), $this->createUrl('matrix/structure', array('id' => $value->id)))?>
                                        <? endif; ?>
                                    </td>
                                </tr>
                            <? endforeach; ?>
                        </tbody>
                    </table>
                </div>
                
                <? $this->widget('CLinkPager', array(
                    'pages' => $pages,
                    'nextPageLabel' => '<i class="fa fa-angle-double-right"></i>', 
                    'prevPageLabel' => '<i class="fa fa-angle-double-left"></i>', 
                    'header' => '',
                    'selectedPageCssClass' => 'disabled',
                    'htmlOptions' => array(
                        'class' => 'pagination'
                    )
                )) ?> 

            
		</div>

	</div>
</div>