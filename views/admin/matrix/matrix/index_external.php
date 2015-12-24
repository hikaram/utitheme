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
                                <th>Алиас</th>
                                <th>Название</th>
                                <th>Описание</th>
                                <th>Статус</th>
                                <th>Доступность пользователям после регистрации</th>
                                <th>Статус глубины</th>
                                <th>Ширина матрицы</th>
                                <th>Глубина матрицы</th>
                                <th>Возможность пользователям иметь несколько активных позиций</th>
                                <th>Возможность нескольким пользователям находиться в одной ячейке</th>
                                <th>Деление после закрытия</th>
                                <th>Тип заполнения</th>
                                <th>Приоритет заполнения заполнения</th>
                                <th>Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            <? foreach($matrix as $key => $value) :?>
                                <tr>
                                    <td><?=CHtml::encode($value->alias)?></td>
                                    <td><?=CHtml::encode($value->lang->name)?></td>
                                    <td><?=CHtml::encode($value->lang->description)?></td>
                                    <td>
                                        <? if ($value->is_active) : ?><span title="Включена" class="true">&nbsp;</span>
                                        <? else : ?><span title="Отключена" class="false">&nbsp;</span>
                                        <? endif; ?>
                                    </td>
                                    <td>
                                        <? if ($value->is_allowed_after_register) : ?><span title="Включена" class="true">&nbsp;</span>
                                        <? else : ?><span title="Отключена" class="false">&nbsp;</span>
                                        <? endif; ?>
                                    </td>
                                    <td>
                                        <? if ($value->is_depth) : ?><span title="Включена" class="true">&nbsp;</span>
                                        <? else : ?><span title="Отключена" class="false">&nbsp;</span>
                                        <? endif; ?>
                                    </td>
                                    <td><?=$value->width_level?></td>
                                    <td><?=$value->depth_level?></td>
                                    <td>
                                        <? if ($value->is_allowed_multiple_active_for_user) : ?><span title="Включена" class="true">&nbsp;</span>
                                        <? else : ?><span title="Отключена" class="false">&nbsp;</span>
                                        <? endif; ?>
                                    </td>
                                    <td>
                                        <? if ($value->is_allowed_multiple_owners_for_token) : ?><span title="Включена" class="true">&nbsp;</span>
                                        <? else : ?><span title="Отключена" class="false">&nbsp;</span>
                                        <? endif; ?>
                                    </td>
                                    <td>
                                        <? if ($value->is_branches_after_close) : ?><span title="Включена" class="true">&nbsp;</span>
                                        <? else : ?><span title="Отключена" class="false">&nbsp;</span>
                                        <? endif; ?>
                                    </td>
                                    <td><?=CHtml::encode($value->matrix_filltype->lang->name)?></td>
                                    <td><? if ($value->matrix_fillpriority != NULL) :?> <?=CHtml::encode($value->matrix_fillpriority->lang->name)?><?endif; ?></td>
                                    <td>
                                        <? if (Yii::app()->user->username == Yii::app()->params['superAdminInfo']['username']) : ?>
                                            <a href="<?=$this->createUrl('matrix/view/id/' . $value->id)?>">Просмотреть</a>
                                        <? endif; ?>
                                        <a href="<?=$this->createUrl('matrix/structure/id/' . $value->id)?>">Структура</a>
                                        <? if (Yii::app()->user->username == Yii::app()->params['superAdminInfo']['username']) : ?>
                                            <a href="<?=$this->createUrl('matrix/create/action/edit/id/' . $value->id)?>">Редактировать</a>
                                            <?=CHtml::linkButton('Удалить',array(
                                                'submit' => array('matrix/delete', 'id' => $value->id),
                                                'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
                                                'confirm' => "Удалить матрицу?"));  ?>
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
<? /*


        <h1><span class="wrapper-3">Матрицы</span></h1>
        
		<div style="overflow: hidden; margin-bottom: 20px;">
		
			<table class="list" id="news">
				<tbody>
					<tr class="top-table" >
						<th class="photo">Алиас</th>
						<th class="photo">Название</th>
						<th class="photo">Описание</th>
						<th class="photo">Статус</th>
						<th class="action">Доступность пользователям после регистрации</th>
						<th class="photo">Статус глубины</th>
						<th class="photo">Ширина матрицы</th>
						<th class="photo">Глубина матрицы</th>
						<th class="photo">Возможность пользователям иметь несколько активных позиций</th>
						<th class="photo">Возможность нескольким пользователям находиться в одной ячейке</th>
						<th class="photo">Деление после закрытия</th>
						<th class="photo">Тип заполнения</th>
						<th class="photo">Приоритет заполнения заполнения</th>
						<th class="action">Действия</th>
					</tr>
					<? if(empty($matrix)) :?>
						<tr><td colspan="18">Не найдено ни одной матрицы</td></tr>
					<? else : ?>                
						<? foreach($matrix as $key => $value) :?>  
							<tr>
								<td style="padding-left: 15px; padding-right: 5px;"><?=CHtml::encode($value->alias)?></td>
								<td style="padding-left: 15px; padding-right: 5px;"><?=CHtml::encode($value->lang->name)?></td>
								<td style="padding-left: 15px; padding-right: 5px;"><?=CHtml::encode($value->lang->description)?></td>
								<td style="text-align: center;">
									<? if ($value->is_active) : ?><span title="Включена" class="true">&nbsp;</span>
									<? else : ?><span title="Отключена" class="false">&nbsp;</span>
									<? endif; ?>
								</td>
								<td style="text-align: center;">
									<? if ($value->is_allowed_after_register) : ?><span title="Включена" class="true">&nbsp;</span>
									<? else : ?><span title="Отключена" class="false">&nbsp;</span>
									<? endif; ?>
								</td>
								<td style="text-align: center;">
									<? if ($value->is_depth) : ?><span title="Включена" class="true">&nbsp;</span>
									<? else : ?><span title="Отключена" class="false">&nbsp;</span>
									<? endif; ?>
								</td>
								<td style="padding-left: 15px; padding-right: 5px;"><?=$value->width_level?></td>
								<td style="padding-left: 15px; padding-right: 5px;"><?=$value->depth_level?></td>
								<td style="text-align: center;">
									<? if ($value->is_allowed_multiple_active_for_user) : ?><span title="Включена" class="true">&nbsp;</span>
									<? else : ?><span title="Отключена" class="false">&nbsp;</span>
									<? endif; ?>
								</td>
								<td style="text-align: center;">
									<? if ($value->is_allowed_multiple_owners_for_token) : ?><span title="Включена" class="true">&nbsp;</span>
									<? else : ?><span title="Отключена" class="false">&nbsp;</span>
									<? endif; ?>
								</td>
								<td style="text-align: center;">
									<? if ($value->is_branches_after_close) : ?><span title="Включена" class="true">&nbsp;</span>
									<? else : ?><span title="Отключена" class="false">&nbsp;</span>
									<? endif; ?>
								</td>
								<td style="padding-left: 15px; padding-right: 5px;"><?=CHtml::encode($value->matrix_filltype->lang->name)?></td>
								<td style="padding-left: 15px; padding-right: 5px;"><? if ($value->matrix_fillpriority != NULL) :?> <?=CHtml::encode($value->matrix_fillpriority->lang->name)?><?endif; ?></td>
								<td style="padding-left: 15px; padding-right: 5px;">
									<? if (Yii::app()->user->username == Yii::app()->params['superAdminInfo']['username']) : ?>
										<a href="<?=$this->createUrl('matrix/view/id/' . $value->id)?>">Просмотреть</a>
									<? endif; ?>
									<a href="<?=$this->createUrl('matrix/structure/id/' . $value->id)?>">Структура</a>
									<? if (Yii::app()->user->username == Yii::app()->params['superAdminInfo']['username']) : ?>
										<a href="<?=$this->createUrl('matrix/create/action/edit/id/' . $value->id)?>">Редактировать</a>
										<?=CHtml::linkButton('Удалить',array(
											'submit' => array('matrix/delete', 'id' => $value->id),
											'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
											'confirm' => "Удалить матрицу?"));  ?>
									<? endif; ?>                                
								</td>
							</tr>
						<? endforeach; ?> 
							
					<? endif; ?>
				</tbody>
			</table>

		</div>
        
        
        <? $this->widget('CLinkPager', array('pages' => $pages))?>
        <br /><br />
        
		
        <? if (Yii::app()->user->username == Yii::app()->params['superAdminInfo']['username']) : ?>
            <?=CHtml::beginForm($this->createUrl('create'))?>
                <?=CHtml::submitButton(Yii::t('app', 'Добавить матрицу'), array('class' => 'btn100'))?>
            <?=CHtml::endForm()?>
        <? endif; ?>
*/ ?>