<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'catalogues-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' => [
		'enctype' => 'multipart/form-data'
	]	
)); ?>

<style>
    .max { width: 100%; }
	.error {color: #a94442;}
	.text-danger{color: #a94442 !important;}
</style>

<div class="note note-info">
	<i class="fa fa-info" style="margin-right: 10px;"></i> <?=Yii::t('app', 'Поля помеченные')?> <span class="required">*</span> <?=Yii::t('app', 'обязательны к заполнению.')?>
</div>

<?=$form->errorSummary([$lang, $model], '<div class="note note-danger"><i class="fa fa-warning" style="margin-right: 10px;"></i> ' . Yii::t('app', 'Необходимо исправить следующие ошибки') . ':', '</div>', ['style' => 'display: inline-table;'])?>

<div class="portlet green box">
	<div class="portlet-title">
		<div class="caption">
		<? if ((boolean)$model->isNewRecord == TRUE) : ?>
				<i class="glyphicon glyphicon-plus"></i> <?=Yii::t('app', 'Создание нового')?>
			<? else : ?>
				<i class="glyphicon glyphicon-pencil"></i> <?=Yii::t('app', 'Редактирование')?>
			<? endif;?> <?=Yii::t('app', 'каталога')?>
		</div>
	</div>
	<div class="portlet-body form form-horizontal">
		<div class="form-body">
			<div class="form-group" style="margin-top: 20px;">
				<?=$form->labelEx($lang, 'name', array('class' => 'col-md-3 control-label'))?>
				<div class="col-md-9">
					<?=$form->textField($lang, 'name', array('class' => 'form-control input-inline input-large'))?>
					<span class="help-block text-danger"><?=$form->error($lang, 'name')?></span>
				</div>
			</div>
			<div class="form-group" style="margin-top: 20px;">
				<?=$form->labelEx($lang, 'meta_keywords', array('class' => 'col-md-3 control-label'))?>
				<div class="col-md-9">
					<?=$form->textArea($lang, 'meta_keywords', array('class' => 'form-control input-inline input-large'))?>
					<span class="help-block text-danger"><?=$form->error($lang, 'meta_keywords')?></span>
				</div>
			</div>
			<div class="form-group" style="margin-top: 20px;">
				<?=$form->labelEx($lang, 'meta_description', array('class' => 'col-md-3 control-label'))?>
				<div class="col-md-9">
					<?=$form->textArea($lang, 'meta_description', array('class' => 'form-control input-inline input-large'))?>
					<span class="help-block text-danger"><?=$form->error($lang, 'meta_description')?></span>
				</div>
			</div>
			<div class="form-group" style="margin-top: 20px;">
				<?=$form->labelEx($model, 'alias', array('class' => 'col-md-3 control-label'))?>
				<div class="col-md-9">
					<?=$form->textField($model, 'alias', array('class' => 'form-control input-inline input-large'))?>
					<span class="help-block text-danger"><?=$form->error($model, 'alias')?></span>
				</div>
			</div>
			<div class="form-group" style="margin-top: 20px;">
				<div class='col-md-3 control-label'><?=Yii::t('app', 'Поместить в')?></div>
				<div class="col-md-9">
					<?php if (empty($canBeParentItems)): ?>
						<?=Yii::t('app', 'К сожалению нет каталогов для перемещения')?>
					<?php else: ?>
						<?=CHtml::activeListBox($model, 'parent_id', array(1 => Yii::t('app', 'Корень')) + $canBeParentItems->list, array('options' => $canBeParentItems->listOptions, 'size' => 0, 'class' => 'form-control input-inline input-large'))?>
					<?php endif; ?>
					<span class="help-block text-danger"><?=$form->error($model, 'parent_id')?></span>
				</div>
			</div>
			<div class="form-group" style="margin-top: 20px;">
				<?=$form->labelEx($model, 'sort_no', array('class' => 'col-md-3 control-label'))?>
				<div class="col-md-9">
					<?=CHtml::activeListBox($model, 'sort_no', $neighborsItems, array('size' => 0, 'class' => 'form-control input-inline input-large'))?>
					<span class="help-block text-danger"><?=$form->error($model, 'sort_no')?></span>
				</div>
			</div>
			<div class="form-group" style="margin-top: 20px;">
				<?=$form->labelEx($model, 'is_content_page', array('class' => 'col-md-3 control-label'))?>
				<div class="col-md-9">
					<?php
						$accountStatus = array('0'=>'Товары подкатегорий', '1'=>'Контентную страницу');
						echo $form->radioButtonList($model,'is_content_page',$accountStatus,array('separator'=>' '));
					?>
					<span class="help-block text-danger"><?=$form->error($model, 'is_content_page')?></span>
				</div>
			</div>
			<div class="form-group" style="margin-top: 20px;">
				<?=$form->labelEx($model, 'is_new', array('class' => 'col-md-3 control-label'))?>
				<div class="col-md-9">
					<?php
						echo $form->checkBox($model, 'is_new', array());
					?>
					<span class="help-block text-danger"><?=$form->error($model, 'is_new')?></span>
				</div>
			</div>		
			<div class="form-group" style="margin-top: 20px;">
				<?=$form->labelEx($lang, 'description', array('class' => 'col-md-3 control-label'))?>
				<div class="col-md-9">
					<?=CkeditorHelper::init(array('name' => 'CataloguesLang[description]', 'type' => '', 'ckfinder' => true, 'value' => $lang->description)) ?>
					<span class="help-block text-danger"><?=$form->error($lang, 'description', array('class' => 'errorMessage errorMessageBlock'))?></span>
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
                                <?=CHtml::image(MSmarty::attachment_get_file_name($model->attachment->secret_name, $model->attachment->raw_name, $model->attachment->file_ext, '_admin_preview', 'catalogues'), ''); ?>
                            <? endif ; ?>
                        </div>

                        <div style="display: none;" id="td_upload_form_block">
                            <?=CHtml::fileField('catalogues', null, array('class' => 'normal'))?>
                        </div>
                        <?=CHtml::link(Yii::t('app', 'Отмена'), 'javascript:void(0)', array('id' => 'td_upload_link_cancel','class' => 'btn btn-xs grey-cascade', 'style' => 'margin-top:5px;display:none;'))?>
                    <? else : ?>
                        <div style="display: none;" id="td_upload_form_block">
                            <?=CHtml::fileField('catalogues', null, array('class' => 'normal loadfile'))?>
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
                                'submit' => array('catalogues/deletepicture', 'id' => $model->id),
                                'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
                                'confirm' => Yii::t('app', 'Удалить картинку?')),array('class' => 'btn red'));  ?>
                        <? endif; ?>
                    <? endif; ?>
                    
                    <p class="help-block text-danger" style="color: #a94442;"><?=$model->getError('attachment__id');?></p>
                </div> 

		</div>
		<div class="form-actions">
			<?=CHtml::submitButton($model->isNewRecord ? Yii::t('app', 'Создать') : Yii::t('app', 'Сохранить'), array('class' => 'btn green')); ?>
		</div>
	</div>
</div>	
<?php $this->endWidget(); ?>

<script type="text/javascript">
    $(function(){
        var currentId = <?= (!$model->getPrimaryKey() ? 'null' : $model->getPrimaryKey())?>;

        $('select[name="Catalogues[parent_id]"]').change(function(){

            $('select[name="Catalogues[sort_no]"]').attr('disabled', true);

            $.ajax({
                url: '/admin/catalog/ajaxcatalogues/getchildren/id/' + $(this).val() + '/without/' + currentId,
                data : {
                    YII_CSRF_TOKEN : app.csrfToken
                },
                dataType: 'json',
                success: function(result){
                    $('select[name="Catalogues[sort_no]"]').html(result).attr('disabled', false);
                },
                error: function(){
                    alert("<?=Yii::t('app', 'Ошибка передачи/принятия данных, обновите страницу')?>");
                }
            });
        });
    });
</script>
