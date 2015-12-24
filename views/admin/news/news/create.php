<?= CHtml::hiddenField('asseturl', Yii::app()->assetManager->getPublishedUrl(Yii::getPathOfAlias('modules.admin.modules.news.css')), array('id' => 'asseturl')) ?>
<?=CHtml::beginForm(null, 'post', array('enctype' => 'multipart/form-data')) ?>

<div class="note note-info">
    <i class="fa fa-info" style="margin-right: 10px;"></i> <?=Yii::t('app', 'Поля помеченные')?> <span class="required">*</span> <?=Yii::t('app', 'обязательны к заполнению.')?>
</div>

<?=CHtml::errorSummary([$model, $model_lang], '<div class="note note-danger"><i class="fa fa-warning" style="margin-right: 10px;"></i> ' . Yii::t('app', 'Необходимо исправить следующие ошибки') . ':', '</div>', ['style' => 'display: inline-table;'])?>

<style>
    .error-new {
        border: 1px solid #a94442;
        box-shadow: none;
    }
</style>
<div class="portlet green box">
	<div class="portlet-title">
		<div class="caption">
			<? if ((boolean)$model->isNewRecord == TRUE) : ?>
				<i class="glyphicon glyphicon-plus"></i> <?=Yii::t('app', 'Создание новой новости')?>
			<? else : ?>
				<i class="glyphicon glyphicon-pencil"></i> <?=Yii::t('app', 'Редактирование новости')?>
			<? endif;?> 
		</div>
	</div>
	<div class="portlet-body form form-horizontal">
		<div class="form-body">
			<div class="mt20"></div>
			<div class="form-group <? if (count($newtypes) == 1) : ?>hidden<? endif; ?>">
				<?=CHtml::activeLabelEx($model,'news_types__id',array('class'=>'col-md-3 control-label')); ?>
				<div class="col-md-9">
					<?=CHtml::activeListBox($model,'news_types__id', $newtypes, array('class' => 'form-control input-large', 'size' => '0')); ?>
				</div>
			</div>
			<div class="form-group">
				<?=CHtml::activeLabelEx($model_lang,'title',array('class'=>'col-md-3 control-label')); ?>
				<div class="col-md-9">
					<div class="input-icon right">
						<i class="fa fa-exclamation tooltips" style="color:#f3565d; display:none;" data-original-title="<?=$model_lang->getError('title');?>" data-container="body"></i>
						<div style="width: 322px !important;" class="<? if($model_lang->hasErrors('title')) echo "error-new"; ?>"><?=CHtml::activeTextArea($model_lang,'title', array('class' => 'form-control input-large')); ?></div>
					</div>
					<p class="help-block text-danger" style="color: #a94442;"><?=$model_lang->getError('title');?></p>
				</div>
			</div>
			<div class="form-group">
				<?=CHtml::activeLabelEx($model_lang,'brief_text',array('class'=>'col-md-3 control-label')); ?>
				<div class="col-md-9 ckeditor <? if($model_lang->hasErrors('text')) echo "error"; ?> ">
                    <p class="help-block"><?=Yii::t('app', 'Внимание! Не вводите сокращенный текст более 5-6 строк. Если Вы добавляете в текст картинки они должны быть не шире 550 пикселей')?></p>
					<?=CkeditorHelper::init(array('name' => 'NewsLang[brief_text]', 'type' => 'content', 'ckfinder' => true, 'value' => $model_lang->brief_text)) ?>
					<p class="help-block text-danger" style="color: #a94442;"><?=$model_lang->getError('brief_text');?></p>
				</div>
			</div>
			<div class="form-group">
				<?=CHtml::activeLabelEx($model_lang,'text',array('class'=>'col-md-3 control-label')); ?>
				<div class="col-md-9 ckeditor <? if($model_lang->hasErrors('text')) echo "error"; ?> ">
					<?=CkeditorHelper::init(array('name' => 'NewsLang[text]', 'type' => 'content', 'ckfinder' => true, 'value' => $model_lang->text)) ?>
					<p class="help-block text-danger" style="color: #a94442;"><?=$model_lang->getError('text');?></p>
				</div>
			</div>

			<div class="form-group">
				<?=CHtml::activeLabelEx($model,'publication_from',array('class'=>'col-md-3 control-label')); ?>
				<div class="col-md-9">
					<div class="input-icon input-group date input-large right news-datepicker">
						<i class="fa fa-exclamation tooltips font-red" style="display:none;" data-original-title="<?=$model_lang->getError('title');?>" data-container="body"></i>
                        <?=CHtml::activeTextField($model,'publication_from', array('class' => 'form-control datepicker', 'readonly' => 'readonly', 'data-date-format' => 'dd.mm.yyyy hh:ii', 'value' => $model->publication_from != NULL ? $model->publication_from : app_date('d.m.Y H:i'))); ?>
                        <span class="input-group-btn" onClick="ShowDatetimepickerFrom()">
                            <button class="btn default" type="button" style="margin-right: 0;"><i class="fa fa-calendar"></i></button>
                        </span>
					</div>
					<p class="help-block text-danger" style="color: #a94442;"><?=$model->getError('publication_from');?></p>
				</div>
			</div>
			<div class="form-group">
				<?=CHtml::activeLabelEx($model,'publication_end',array('class'=>'col-md-3 control-label')); ?>
				<div class="col-md-9">
					<div class="input-icon input-group date input-large right news-datepicker">
						<i class="fa fa-exclamation tooltips font-red" style="display:none;" data-original-title="<?=$model_lang->getError('title');?>" data-container="body"></i>
						<?=CHtml::activeTextField($model,'publication_end', array('class' => 'form-control datepicker', 'readonly' => 'readonly', 'data-date-format' => 'dd.mm.yyyy hh:ii')); ?>
                        <span class="input-group-btn" onClick="ShowDatetimepickerEnd()">
                            <button class="btn default" type="button" style="margin-right: 0;"><i class="fa fa-calendar"></i></button>
                        </span>
					</div>
					<p class="help-block text-danger" style="color: #a94442;"><?=$model->getError('publication_end');?></p>
				</div>
			</div>

                <div class="form-group">
                    <label for="" class="col-md-3 control-label">
                        <?=Yii::t('app', 'Загрузить картинку')?>
                    </label>
                    <div class="col-md-4">
                        <? if (!$model->isNewRecord) : ?>
                            <div id="td_upload_photo">
                                <? if (($model->attachment != NULL) && ($model->attachment->secret_name != null)) : ?>
                                    <?=CHtml::image(MSmarty::attachment_get_file_name($model->attachment->secret_name, $model->attachment->raw_name, $model->attachment->file_ext, '_home_size_3', 'news_picture'), ''); ?>
                                <? endif ; ?>
                            </div>

                            <div style="display: none;" id="td_upload_form_block">
                                <?=CHtml::fileField('news', null, array('class' => 'normal'))?>
                            </div>
                            <?=CHtml::link(Yii::t('app', 'Отмена'), 'javascript:void(0)', array('id' => 'td_upload_link_cancel','class' => 'btn btn-xs grey-cascade', 'style' => 'margin-top:5px;display:none;'))?>
                        <? else : ?>
                            <div style="display: none;" id="td_upload_form_block">
                                <?=CHtml::fileField('news', null, array('class' => 'normal loadfile'))?>
                            </div>
                            <?=CHtml::link(Yii::t('app', 'Отмена'), 'javascript:void(0)', array('id' => 'td_upload_link_cancel','class' => 'btn btn-xs grey-cascade', 'style' => 'margin-top:5px;display:none;'))?>
                        <? endif; ?>
                        
                        <script>
                            $('.fileinput-new').click(function() {
                                $('.loadfile').trigger('click')
                            });
                        </script>
                        
                        <?=CHtml::link(Yii::t('app', 'Загрузить'), 'javascript:void(0)', array('id' => 'td_upload_link_change', 'class' => 'btn btn-xs grey-cascade', 'style' => 'margin-top:5px;'))?>

                        <? if (($model->attachment != NULL) && ($model->attachment->secret_name != null)) : ?>
                            <? if (Yii::app()->user->checkAccess('AdminNewsNewsDeletepicture')) : ?>
                                <?=CHtml::linkButton(Yii::t('app', 'Удалить'),array(
                                    'class' => 'btn btn-xs red',
                                    'style' => 'margin-top:5px;',
                                    'submit' => array('news/deletepicture', 'id' => $model->id),
                                    'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
                                    'confirm' => Yii::t('app', 'Удалить картинку?')),array('class' => 'btn red'));  ?>
                            <? endif; ?>
                        <? endif; ?>
                        <p style="padding-top: 10px;"><?= Yii::t('app','Допустимые форматы для загрузки картинки: jpg, jpeg, png, gif.') ?></p>
                        <p class="help-block text-danger" style="color: #a94442;"><?=$model->getError('attachment__id');?></p>
                    </div> 
                </div>
                <div class="form-group" id="tr_show_source">
                    <?=CHtml::activeLabelEx($model,'source',array('class'=>'col-md-3 control-label')); ?>
                    <div class="col-md-9">
                        <?=CHtml::activeTextField($model,'source', array('class' => 'form-control input-large')); ?>
                    </div> 
                </div>
                <div class="form-group" id="tr_show_source_title">
                    <?=CHtml::activeLabelEx($model,'source_title',array('class'=>'col-md-3 control-label')); ?>
                    <div class="col-md-9">
                        <?=CHtml::activeTextField($model,'source_title', array('class' => 'form-control input-large')); ?>
                    </div> 
                </div>
                <div class="form-group">
                    <?=CHtml::activeLabelEx($model_lang,'description',array('class'=>'col-md-3 control-label')); ?>
                    <div class="col-md-9">
                        <p class="help-block"><?=Yii::t('app', 'Для поисковых систем')?></p>
                        <?=CHtml::activeTextArea($model_lang,'description', array('class' => 'form-control input-large')); ?>
                        <p class="help-block text-danger" style="color: #a94442;"><?=$model_lang->getError('description');?></p>
                    </div> 
                </div>
                <div class="form-group">
                    <?=CHtml::activeLabelEx($model_lang,'keywords',array('class'=>'col-md-3 control-label')); ?>
                    <div class="col-md-9">
                        <p class="help-block"><?=Yii::t('app', 'Для поисковых систем')?></p>
                        <?=CHtml::activeTextArea($model_lang,'keywords', array('class' => 'form-control input-large')); ?>
                        <p class="help-block text-danger" style="color: #a94442;"><?=$model_lang->getError('keywords');?></p>
                    </div> 
                </div>


                <div class="form-group">
                    <?=CHtml::activeLabelEx($model,'is_visible',array('class'=>'col-md-3 control-label')); ?>
                    <div class="col-md-9" style="padding-top:9px">
                        <table style="width: auto;">
                            <tr>
                                <td align="left"><?=CHtml::activeCheckBox($model, 'is_visible'); ?></td>
                                <td align="left" colspan="2" style="font-size: 15px;">
                                    <div style="display: none;" id="visible"><?=Yii::t('app', 'Новость будет отображаться всем, кроме')?>: </div>
                                    <div style="display: none;" id="not_visible"><?=Yii::t('app', 'Новость не будет отображаться никому, кроме')?>: </div>                                
                                </td>
                            </tr>
                            <? foreach($modelsNewsRoles as $key => $modelNewsRoles) : ?>
                                <tr>
                                    <td class="view_allowed" align="center" style="padding-left: 10px;"><?=CHtml::activeCheckBox($modelNewsRoles, 'is_view_allowed', array('name' => get_class($modelNewsRoles) . "[$key]" . '[is_view_allowed]')); ?></td>
                                    <td class="view_denied" align="center" style="padding-left: 10px;"><?=CHtml::activeCheckBox($modelNewsRoles, 'is_view_denied', array('name' => get_class($modelNewsRoles) . "[$key]" . '[is_view_denied]')); ?></td>
                                    <td>
                                        <?=Yii::t('app', $modelNewsRoles->description)?>
                                        <?=CHtml::activeHiddenField($modelNewsRoles, 'news__id', array('name' => get_class($modelNewsRoles) . "[$key]" . '[news__id]')); ?>
                                        <?=CHtml::activeHiddenField($modelNewsRoles, 'authitem__name', array('name' => get_class($modelNewsRoles) . "[$key]" . '[authitem__name]')); ?>
                                    </td>
                                </tr>
                            <? endforeach; ?>
                        </table>
                    </div> 
                </div>

                <div class="form-group" id="tr_show_at_home">
                    <?=CHtml::activeLabelEx($model,'show_at_home',array('class'=>'col-md-3 control-label')); ?>
                    <div class="col-md-9" style="padding-top:9px">
                        <?=CHtml::activeCheckBox($model, 'show_at_home'); ?>
                    </div> 
                </div>
                <div class="form-group" id="tr_show_at_office">
                    <?=CHtml::activeLabelEx($model,'show_at_office',array('class'=>'col-md-3 control-label')); ?>
                    <div class="col-md-9" style="padding-top:9px">
                        <?=CHtml::activeCheckBox($model, 'show_at_office'); ?>
                    </div> 
                </div>
		</div>
		<div class="form-actions">
			<?=CHtml::submitButton($model->isNewRecord ? Yii::t('app', 'Сохранить') : Yii::t('app', 'Изменить'), array ('class' => 'btn green', 'name' => 'btn_save')); ?>
			<? if (Yii::app()->user->checkAccess('AdminNewsNewsIndex')) : ?>
				<?=CHtml::link(Yii::t('app', 'Назад'), $this->createUrl('index'), array('class' => 'btn grey'))?>
			<? endif; ?>
		</div>
	</div>
<?=CHtml::endForm(); ?>
<link href="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/plugins/bootstrap-datetimepicker/css/datetimepicker.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" id="locale"></script>
<?=Chtml::hiddenField(FALSE, Yii::app()->params['hostMetronikStatic'] . '/public/assets/global/plugins/bootstrap-datetimepicker/js/locales/bootstrap-datetimepicker.' . Yii::app()->language . '.js', array('id' => 'scriptSrc'))?>