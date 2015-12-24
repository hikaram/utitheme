<div class="portlet box blue-steel">
	<div class="portlet-title">
		<h3 class="caption"><i class="glyphicon glyphicon-eye-open"></i> <?=Yii::t('app', 'Просмотр вопроса')?></h3>
	</div>
	<div class="portlet-body form form-horizontal">
		<div class="form-body">
		<div class="note note-info">
			<h3><?=CHtml::encode($model->lang->text);?></h3>
			<?=CHtml::encode($model->lang->description)?>
		</div>
		
        <?=$this->renderPartial('_filter')?>        
        
        <? if(empty($users)) :?>
			<p class="note note-success">
				<?=Yii::t('app', 'Не найдено ни одного пользователя')?>
			</p>
		<? else : ?>
        
			<div class="table-scrollable">
				<table class="table table-hover">
					<thead>
						<tr>
							<th><?=Yii::t('app', 'Логин пользователя')?></th>
							<th><?=Yii::t('app', 'Текст вопроса')?></th>
							<th><?=Yii::t('app', 'Ответ')?></th>
						</tr>
					</thead>
					<tbody>
						<? foreach ($users as $user) : ?>
                            <tr>
                                <td>
									<? if ($user->user == NULL) : ?>
										<span class="text-danger"><?=Yii::t('app', 'Пользователь удален')?></span>
									<? else : ?>
										<?=CHtml::encode($user->user->username)?>
									<? endif; ?>
								</td>
                                <td><?=CHtml::encode($user->text)?></td>
                                <td><?=CHtml::encode($user->answer)?></td>
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
                    'selectedPageCssClass' => 'active',
                    'htmlOptions' => array(
                        'class' => 'pagination'
                    )
                )) ?>        
            
		<?  endif; ?>
		</div>
        
		<div class="form-actions">
			<?=CHtml::beginForm($this->createUrl('questions/create', array('action' => 'edit', 'id' => $model->id)))?>
				<?=CHtml::submitButton(Yii::t('app', 'Редактировать вопрос'), array('class' => 'btn green'))?>
				<?=CHtml::link(Yii::t('app', 'Вернуться к списку вопросов'), $this->createUrl('index'), array('class' => 'btn grey'))?>
			<?=CHtml::endForm()?>
		</div>
	</div>
</div>