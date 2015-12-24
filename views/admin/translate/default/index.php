<? if((empty($translates)) && (empty($filter))) :?>
	<div class="note note-success">
		<?=Yii::t('app', 'Не найдено ни одного перевода')?>.
	</div>
<? else : ?>
<div class="portlet box yellow">
	<div class="portlet-title">
		<h3 class="caption"><i class="fa fa-book" style="margin-right: 10px;"></i> <?=Yii::t('app', 'Список переводов')?></h3>
	</div>
	<div class="portlet-body">
		<?php echo $this->renderPartial('_filter', array('filter' => $filter, 'langs' => $langs, 'checkBoxDefaultOn' => $checkBoxDefaultOn)); ?>
        
        <? if (empty($translates)) : ?>
        
            <div class="note note-danger" style="margin-top: 20px;">
                <p>
                    <?=Yii::t('app', 'Не найдено ни одного текста, удовлетворяющего условиям фильтрации. Сбросьте фильтр или измените поисковые данные')?>
                </p>
            </div>             

        <? else : ?>        
        
        
            <div class="table-scrollable">
                <table class="table table-hover" id="langs">
                    <thead>
                        <tr>
                            <th><?=Yii::t('app', '№ п/п')?></th>
                            <th><?=$model->getAttributeLabel('text')?></th>
                            <th class="table-context"><?=$model->getAttributeLabel('context')?></th>
                            <? foreach ($langs as $lang) : ?>
                                <th class="table-lang table-lang-<?=$lang->alias?>"><?=CHtml::encode($lang->lang->title)?></th>
                            <? endforeach; ?>
                            <? //<th class="action"><?=Yii::t('app', 'Действия')?></th>
                            <th class="action"><?=Yii::t('app', 'Действия')?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = ((array_key_exists('page', $_GET) ? $_GET['page'] : (int)TRUE) - 1) * TRANSLATES_PER_PAGE + 1; ?>
                    
                        <? foreach($translates as $key => $translate) :?>  
                            <tr>
                                <td><?=$i++?></td>
                                <td id="orig-text-table-<?=$translate->id?>" style="text-align: left; padding-left: 15px;"><?=CHtml::encode($translate->text)?></td>
                                <td id="orig-context-table-<?=$translate->id?>" class="table-context" style="text-align: left; padding-left: 15px;"><?=CHtml::encode($translate->context)?></td>
                                <? foreach ($langs as $lang) : ?>
                                    <td id="orig-switch-table-<?=$translate->id?>-<?=$lang->alias?>" class="photo table-lang table-lang-<?=$lang->alias?>"">
                                        <? if ((array_key_exists($translate->id, $translatesLang)) && (array_key_exists($lang->alias, $translatesLang[$translate->id])) && (empty($translatesLang[$translate->id][$lang->alias]))) : ?>
                                            <span class="no-translate"></span>
                                            <span id="translate-text-<?=$translate->id?>_<?=$lang->alias?>" langalias=<?=$lang->alias?> translateId = <?=$translate->id?> class="translate-text"></span>
                                        <? elseif ((array_key_exists($translate->id, $translatesLang)) && (array_key_exists($lang->alias, $translatesLang[$translate->id])) && (!empty($translatesLang[$translate->id][$lang->alias]))) : ?>
                                            <span class="translate"></span>
                                            <span id="translate-text-<?=$translate->id?>_<?=$lang->alias?>" langalias=<?=$lang->alias?> translateId = <?=$translate->id?> class="translate-text"><?=CHtml::encode($translatesLang[$translate->id][$lang->alias])?></span>
                                        <? endif; ?>
                                    </th>
                                <? endforeach; ?>                    
                                <td>
                                    <? if (Yii::app()->user->checkAccess('AdminTranslateDefaultEdit')) : ?>
                                        <?=CHtml::link('<i class="fa fa-retweet"></i>', 'javascript: void(0)', array(
                                            'class' => 'btn green btn-icon tooltips',
                                            'data-container' => 'body',
                                            'data-placement' => 'top', 
                                            'data-original-title' => Yii::t('app', 'Перевести'),
                                            'onClick' => 'editTranslate(' . $translate->id . ')',
                                            
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
        <? endif; ?>
	</div>
</div>

<? if (Yii::app()->user->checkAccess('AdminTranslateDefaultEdit')) : ?>
<div id="modalTranslate" class="modal fade" tabindex="-1" role="basic" aria-hidden="true" style="display: none;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
				<h4 class="modal-title"><?=Yii::t('app', 'Перевести')?></h4>
			</div>
			<?=CHtml::beginForm($this->createUrl('translate'), 'POST', array('id' => 'translate-from'))?>
				<?=CHtml::hiddenField('form[text_id]', (int)FALSE, array('id' => 'text_id'))?>
				<div class="modal-body form form-horizontal">
					<div class="form-body">
						<div class="form-group">
							<div class="col-md-5 text-right"><?=$model->getAttributeLabel('text')?>:</div>
							<div class="col-md-7" id="original-text"></div>
						</div>
						<div class="form-group">
							<div class="col-md-5 text-right"><?=Yii::t('app', 'Показать контекст')?>:</div>
							<div class="col-md-7">
								<?=CHtml::checkBox('modal-context-switch', (int)FALSE, array('id' => 'modal-context-switch'))?>
							</div>
						</div>
						<div class="form-group modal-context-wrapper" style="display: none;">
							<div class="col-md-5 text-right"><?=$model->getAttributeLabel('context')?>:</div>
							<div class="col-md-7" id="original-context"></div>
						</div>
						<div class="panel-group accordion" id="accordion1">
							<? $counter = 1;?>
							<? foreach ($langs as $lang) : ?>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<?=CHtml::link(CHtml::encode($lang->lang->title), '#'.CHtml::encode($lang->alias), array('class' => 'accordion-toggle', 'data-toggle' => 'collapse', 'data-parent' => '#accordion1'))?>
									</h4>
								</div>
								<div id="<?=CHtml::encode($lang->alias)?>" class="panel-collapse <? if($counter == 1) : ?>in<? else : ?>collapse<? endif;?>">
									<div class="panel-body">
										<?=CHtml::textArea('form[text_translate][' . $lang->alias . ']', '', array('class' => 'form-control', 'rows' => 5, 'id' => 'translate-form-' . $lang->alias))?>
									</div>
								</div>
							</div>
							<? $counter++; ?>
							<? endforeach ?>
						</div>
					</div>
					<div class="modal-footer">
						<span class="btn green" onclick="saveForm(); $('#modalTranslate').modal('hide')"><?=Yii::t('app', 'Сохранить')?></span>
						<a data-dismiss="modal" class="btn red" href="javascript: void(0)"><?=Yii::t('app', 'Отмена')?></a>
					</div>
				</div>
			<?=CHtml::endForm()?>
		</div>
	</div>
</div>
<? endif; ?>

<? endif; ?>