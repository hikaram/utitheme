<? if(empty($companies)) :?>
	<div class="note note-success">
		<?=Yii::t('app', 'Не найдено ни одной компании')?>.
		<? if (Yii::app()->user->checkAccess('AdminCompaniesListCreate')) : ?>
			<?=Yii::t('app', 'Вы можете')?> <?=CHtml::link(Yii::t('app', 'создать новую'), $this->createUrl('create'))?> <?=Yii::t('app', 'компанию')?>
		<? endif; ?>
	</div>
<? else : ?>
	<div class="portlet box yellow">
		<div class="portlet-title">
			<h3 class="caption"><i class="fa fa-usd" style="margin-right: 10px;"></i> <?=Yii::t('app', 'Список компаний')?></h3>
		</div>
		<div class="portlet-body">
			<div class="table-scrollable">
				<table class="table table-hover">
					<thead>
						<tr>
							<th><?=Yii::t('app', 'Название компании')?></th>
							<? if (Yii::app()->user->username == Yii::app()->params['superAdminInfo']['username']) : ?>
								<th class="photo"><?=Yii::t('app', 'Псевдоним')?></th>
							<? endif; ?>
							<th><?=Yii::t('app', 'Описание')?></th>
							<th><?=Yii::t('app', 'Адрес')?></th>
							<th><?=Yii::t('app', 'Телефон')?></th>
							<th><?=Yii::t('app', 'Skype')?></th>
							<th><?=Yii::t('app', 'Действия')?></th>
						</tr>
					</thead>
					<tbody>
						<? foreach($companies as $key => $company) :?>  
							<tr>
								<td><?=CHtml::encode($company->title)?></td>
								<? if (Yii::app()->user->username == Yii::app()->params['superAdminInfo']['username']) : ?>
									<td><?=CHtml::encode($company->alias)?></td>
								<? endif; ?>
								<td><?=CHtml::encode($company->lang->description)?></td>
								<td>
									<?foreach($company->addresses as $address):?>
										<?=CHtml::encode($address->value)?>
									<?endforeach;?>
								</td>
								<td>
									<? foreach($company->phones as $key => $phone) : ?>
										<?=CHtml::encode($phone->value)?> <?=CHtml::encode($phone->comment)?>                                    
										<? if (array_key_exists($key + 1, $company->phones)) : ?>
											<br />
										<? endif; ?>
									<? endforeach ;?>
								</td>
								<td>
									<? foreach($company->skypes as $key2 => $skype) : ?>
										<?=CHtml::encode($skype->value)?>
										<? if (array_key_exists($key2 + 1, $company->skypes)) : ?>
											<br />
										<? endif; ?>
									<? endforeach ;?>
								</td>
								<td style="white-space: nowrap; word-wrap: normal;">

                                    <? if (($company->created_at != NULL) || ($company->creator != NULL) || ($company->modified_at != NULL) || ($company->redactor != NULL)) : ?>
                                        <span type="button" class="btn blue-steel popovers"
                                            data-trigger="hover" 
                                            data-placement="left" 
                                            data-html="true"
                                            data-content="
                                                <? if ($company->created_at != NULL) : ?>
                                                    <span class='text-semibold'><?=Yii::t('app', 'Дата создания')?>:</span>
                                                    <?=MSmarty::date_format($company->created_at, 'd.m.Y')?> <?=MSmarty::date_format($company->created_at, 'H:i')?><br/>
                                                <? endif; ?>
                                                <? if ($company->creator != NULL) : ?>
                                                    <span class='text-semibold'><?=Yii::t('app', 'Автор')?>:</span>
                                                    <?=$company->creator->username?><br/>
                                                <? endif; ?>
                                                <? if ($company->modified_at != NULL) : ?>
                                                    <span class='text-semibold'><?=Yii::t('app', 'Дата редактирования')?>:</span>
                                                    <?=MSmarty::date_format($company->modified_at, 'd.m.Y')?> <?=MSmarty::date_format($company->modified_at, 'H:i')?><br/>
                                                <? endif; ?>
                                                <? if ($company->redactor != NULL) : ?>
                                                    <span class='text-semibold'><?=Yii::t('app', 'Логин редактировавшего')?>:</span>
                                                    <?=$company->redactor->username?><br/>
                                                <? endif; ?>
                                            " 
                                            data-original-title="<?=Yii::t('app', 'Дополнительная информация')?>"
                                        >
                                            <i class="fa fa-info"></i>
                                        </span>
                                    <? endif; ?>

									<? if (Yii::app()->user->checkAccess('AdminCompaniesListView')) : ?>
										<?=CHtml::link('<i class="glyphicon glyphicon-eye-open"></i>', $this->createUrl('list/view', array('id' => $company->id)), array(
											'class' => 'btn blue-steel tooltips',
											'data-container' => 'body', 
											'data-placement' => 'bottom',
											'data-original-title' => Yii::t('app', 'Просмотр')											
										))?>
									<? endif; ?>
									<? if (Yii::app()->user->checkAccess('AdminCompaniesListEdit')) : ?>
										<?=CHtml::link('<i class="glyphicon glyphicon-pencil"></i>', $this->createUrl('list/create', array('action' => 'edit', 'id' => $company->id)), array(
											'class' => 'btn green-seagreen tooltips',
											'data-container' => 'body', 
											'data-placement' => 'bottom',
											'data-original-title' => Yii::t('app', 'Редактировать')											
										))?>
									<? endif; ?>
									<? if ((Yii::app()->user->checkAccess('AdminCompaniesListDelete')) && ($company->alias == NULL)) : ?>
									<?=CHtml::linkButton('<i class="glyphicon glyphicon-remove"></i>',array(
										'submit' => array('list/delete', 'id' => $company->id),
										'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
										'confirm' => Yii::t('app', 'Удалить компанию?'),
										'class' => 'btn red tooltips',
										'data-container' => 'body', 
										'data-placement' => 'bottom',
										'data-original-title' => Yii::t('app', 'Удалить')
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
				'htmlOptions' => array(
					'class' => 'pagination'
				)
			)) ?>
		</div>
	</div>
<? endif; ?>