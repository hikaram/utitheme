<style>
#reviews>thead>tr>th
{
	text-align: center !important;
}
</style>
<?php $colspan = 9; ?>
<? if(count($reviews)>(int)FALSE):?>
<div class="row">
    <div class="col-md-12">
		<div class="portlet box yellow">
			<div class="portlet-title">
				<div class="caption">
					<i class="glyphicon glyphicon-list-alt"></i><?=Yii::t('app', 'Отзывы')?>
				</div>
			</div>
			<div class="portlet-body">
                    <div class="table-scrollable">
						<table id="reviews" class="table table-hover" style="text-align:center;">
							<thead>
								<tr class="top-table" >
									<th width="5%"><?=Yii::t('app', 'Номер')?></th>
									<th width="10%"><?=Yii::t('app', 'От кого')?></th>
									<th width="30%"><?=Yii::t('app', 'Сокращенный текст')?></th>
									<th width="10%"><?=Yii::t('app', 'Статус')?></th>
									<? if ($is_reviews_show_at_home) : ?><th><? $colspan++; ?><?=Yii::t('app', 'Отображать на главной')?></th><? endif; ?>
									<? if ($is_reviews_show_at_office) : ?><th><? $colspan++; ?><?=Yii::t('app', 'Отображать в кабинете')?></th><? endif; ?>
									<th><?=Yii::t('app', 'Дата создания')?></th>
									<? if (Yii::app()->user->username == Yii::app()->params['superAdminInfo']['username']) : ?>
										<th><?=Yii::t('app', 'Автор')?></th>
										<th><?=Yii::t('app', 'Дата редактирования')?></th>
										<th><?=Yii::t('app', 'Редактор')?></th>
									<? endif; ?>
									<th><?=Yii::t('app', 'Действия')?></th>
								</tr>
								<?php $i = ((array_key_exists('page', $_GET) ? $_GET['page'] : (int)TRUE) - 1) * REVIEWS_PER_PAGE + 1; ?>
							</thead>
							<tbody>	
									<? foreach($reviews as $key => $review) :?>  
										<tr>
											<td><?=$i++?></td>
											<td><?=CHtml::encode($review->lang->reviews_sender)?></td>
											<td><?=CHtml::encode($review->lang->brief_text)?></td>
											<td><?= (bool)$review->is_active ? Yii::t('app', 'Активен') : Yii::t('app', 'Не активен')?></td>
											<? if ($is_reviews_show_at_home) : ?>
												<td>
													<? if ($review->show_at_home) : ?><span class="true">&nbsp;</span>
													<? else : ?><span class="false">&nbsp;</span>
													<? endif; ?>
												</td>
											<? endif; ?>
											<? if ($is_reviews_show_at_office) : ?>
												<td>
													<? if ($review->show_at_office) : ?><span class="true">&nbsp;</span>
													<? else : ?><span class="false">&nbsp;</span>
													<? endif; ?>
												</td>
											<? endif; ?>                            
											<td><?=MSmarty::date_format($review->created_at, 'd.m.Y')?></td>
											<? if (Yii::app()->user->username == Yii::app()->params['superAdminInfo']['username']) : ?>
												<td><? if ($review->creator != NULL):?><?=$review->creator->username?><? endif; ?></td>
												<td><?=MSmarty::date_format($review->modified_at, 'd.m.Y')?></td>
												<td><? if ($review->redactor != NULL):?><?=$review->redactor->username?><? endif; ?></td>
											<? endif; ?>
											<td>
												<? if (Yii::app()->user->checkAccess('AdminReviewsReviewsViewreviews')) : ?>
													<?=CHtml::link('<button class="btn blue-steel"><i class="glyphicon glyphicon-eye-open"></i></button>', $this->createUrl('reviews/viewreviews', array('id' => $review->id)))?>
												<? endif; ?>
												<? if (Yii::app()->user->checkAccess('AdminReviewsReviewsEdit')) : ?>
													<?=CHtml::link('<button class="btn green-seagreen"><i class="glyphicon glyphicon-pencil"></i></button>', $this->createUrl('reviews/create', array('action' => 'edit', 'id' => $review->id)))?>
												<? endif; ?>
												<? if (Yii::app()->user->checkAccess('AdminReviewsReviewsDeletereviews')) : ?>
												<?=CHtml::linkButton('<button class="btn red"><i class="glyphicon glyphicon-remove"></i></button>',array(
													'submit' => array('reviews/deletereviews', 'id' => $review->id),
													'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
													'confirm' => Yii::t('app', 'Удалить отзыв?')));  ?>
												<? endif; ?>
											</td>
										</tr>
									<? endforeach; ?> 
							
							</tbody>
						</table>
					</div>
				<? $this->widget('CLinkPager', array('pages' => $pages,
						'nextPageLabel' => '<i class="fa fa-angle-double-right"></i>', 
                        'prevPageLabel' => '<i class="fa fa-angle-double-left"></i>', 
                        'header' => '',
                        'selectedPageCssClass' => 'active',
                        'htmlOptions' => array(
                            'class' => 'pagination'
                        )
				))?>	
			</div>
		</div>
	</div>
</div>
<?else:?>
<p class="note note-danger">
	<i class="fa fa-warning" style="margin-right: 10px;"></i><?=Yii::t('app', 'Не создано ни одного отзыва')?>
</p>
<?endif;?>
<br/>
<? if (Yii::app()->user->checkAccess('AdminReviewsReviewsCreate')) : ?>
    <?=CHtml::beginForm($this->createUrl('create'))?>
        <?=CHtml::submitButton(Yii::t('app', 'Создать отзыв'), array('class' => 'btn green'))?>
    <?=CHtml::endForm()?>
<? endif; ?>

