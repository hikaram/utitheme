<? if(empty($questions)) :?>
	<p class="note note-success">
		<?=Yii::t('app', 'Еще не создани ни один вопрос. Вы можете')?> <a href="<?=$this->createUrl('questions/create');?>"><?=Yii::t('app', 'создать новый')?></a> <?=Yii::t('app', 'вопрос')?>
	</p>
	<a href="<?=$this->createUrl('admin/index');?>"><?=Yii::t('app', 'Вернуться к списку полей')?></a>
<? else : ?>
	<div class="portlet box yellow">
		<div class="portlet-title">
			<h3 class="caption"><i class="icon icon-question mr10"></i> <?=Yii::t('app', 'Контрольные вопросы')?></h3>
		</div>
		<div class="portlet-body form form-horizontal">
			<div class="form-body">
				<div class="table-scrollable">
					<table class="table table-hover">
						<thead>
							<tr>
								<th><?=Yii::t('app', 'Текст вопроса')?></th>
								<th><?=Yii::t('app', 'Описание вопроса')?></th>
								<th><?=Yii::t('app', 'Количество пользователей')?></th>
								<th><?=Yii::t('app', 'Действия')?></th>
							</tr>
						</thead>
						<tbody>
							<? foreach($questions as $key => $value) :?>  
								<tr>
									<td><?=CHtml::encode($value->lang->text)?></td>
									<td><?=CHtml::encode($value->lang->description)?></td>
									<td><?=count($value->users)?></td>
									<td>
										<?=CHtml::link('<i class="glyphicon glyphicon-eye-open"></i>', $this->createUrl('questions/view', array('id' => $value->id)), array('class' => 'btn blue-steel'))?>
										<?=CHtml::link('<i class="glyphicon glyphicon-pencil"></i>', $this->createUrl('questions/create', array('action' => 'edit', 'id' => $value->id)), array('class' => 'btn green-seagreen'))?>
                                        <? if (empty($value->users)) : ?>
                                            <?=CHtml::linkButton('<i class="glyphicon glyphicon-remove"></i>',array(
                                                'submit' => array('questions/delete', 'id' => $value->id),
                                                'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
                                                'confirm' => Yii::t('app', 'Удалить вопрос ?'),
                                                'class' => 'btn red',
                                            ));  ?>
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
                    'selectedPageCssClass' => 'active',
                    'htmlOptions' => array(
                        'class' => 'pagination'
                    )
                )) ?> 
			</div>
			<div class="form-actions">
				<?=CHtml::beginForm($this->createUrl('questions/create'), '', array('style' => 'display: inline; padding: 0;'))?>
					<?=CHtml::submitButton(Yii::t('app', 'Добавить вопрос'), array('class' => 'btn green'))?>
				<?=CHtml::endForm()?>
				<a href="<?=$this->createUrl('admin/index');?>" class="btn grey"><?=Yii::t('app', 'Вернуться к списку полей')?></a>
			</div>
		</div>
	</div>
<? endif;?>