<style>
.width_full {
    height: auto;   
}

textarea.error {
    border: 1px solid red;
}

.clear {
    clear: both;
}
</style>
<script>
$(function(){
	$('#td_upload_link_change').bind('click', function() {
		$('#td_upload_photo').hide();
		$('#td_upload_link_change').hide();
		$('#td_upload_form_block').show();
		$('#td_upload_link_cancel').show();
	});

	$('#td_upload_link_cancel').bind('click', function() {
		$('input#news').val(null);
		$('#td_upload_form_block').hide();
		$('#td_upload_link_cancel').hide();
		$('#td_upload_photo').show();
		$('#td_upload_link_change').show();
	})
})

function addRubrics()
{
	//erubric = document.getElementById('BlogPosts_blog_rubrics__id');
	//rubric =  erubric.options[erubric.selectedIndex].value;
	//can_comment = document.getElementById('BlogPosts_can_comment').value;
	//console.log(rubric +" "+can_comment);
	CKEDITOR.instances.short_text.updateElement();
	CKEDITOR.instances.text.updateElement();
	
	$.ajax({
        url	: app.createAbsoluteUrl('admin/blog/Ajaxdefault/addRubric'),
        error	: function ()
        {
            alert(T('Ошибка запроса'));
        },
        success	: function(data)
        {   
        	location.href = app.createAbsoluteUrl('admin/blog/index/createrubrics/subsession/' + data.subsession);
        },
        data	:
        {
            YII_CSRF_TOKEN      : app.csrfToken,
            alias               : 'admin_blog_add',
            form                : $('form#addform').serializeArray()
        },
        async		: false,
        cache		: false
    });
	
}
</script>
<?php $this->breadcrumbs=array(
	Yii::t('app', 'Панель управления') => array('/admin'),
	Yii::t('app', 'Статьи блога') => array('index'),
	Yii::t('app', 'Добавление статьи блога') . ' #' => array('add'),
	);?>
<?php $form = $this->beginWidget('CActiveForm', array(
	'enableAjaxValidation' => false,
	'id' => 'addform',
	'htmlOptions' => array('enctype' => 'multipart/form-data')
	)
)
?>
<p class="note note-danger" style="color:red">
	<i class="fa fa-warning" style="margin-right: 10px;"></i> <?=Yii::t('app', 'Поля помеченные')?> <span class="required">*</span> <?=Yii::t('app', 'обязательны к заполнению.')?>
</p>   

<div class="portlet green box">	
	<div class="portlet-title">
		<div class="caption" style='margin: 10px; display: block; float: none;'>
			<i class="glyphicon glyphicon-plus"></i> <h4><?=Yii::t('app','Создание новой статьи блога')?></h4>
		</div>
	</div>
	<div class="portlet-body form form-horizontal">
		<div class="form-body">
			<div class="mt20"></div>
			<div class="form-group">
                <label for="BlogPostsLang_title" style="float:left;padding:5px;width:15%" class="col-md-3 control-label required"><?=Yii::t('app','Рубрика')?> <span class="required">*</span></label>
				<div class="col-md-9">
					<div class="input-icon right">
						<i class="fa fa-exclamation tooltips" style="color:#f3565d; display:none;" data-original-title="<?=$post->getError('blog_rubrics__id');?>" data-container="body"></i>
                        <? $rubrics = array(); ?>
                        <? foreach ($post->rubrics as $rubric) : ?>
                            <? $rubrics[] = $rubric['blog_rubrics__id']; ?>
                        <? endforeach; ?>
                        <? $post->rubrics = $rubrics; ?>
						
						<div class="input-icon right" style="overflow-y: scroll;overflow-x: hidden; height:150px; max-width:500px; border: 1px solid black">
                        
							<? echo CHtml::activecheckBoxList($post,'rubrics',$post::LabelsRubrics());?>
						</div>
						 <a onclick="addRubrics()" href="<?=$this->createUrl('/admin/blog/index/createrubrics')?>" ><?=Yii::t('app','Добавить рубрику')?></a>
					</div>
					<p class="help-block text-error" style="color:red"><?=$post->getError('blog_rubrics__id');?></p>
				</div>
			</div>	
			<div class='clear'></div>
			<div class="form-group">
				<?=CHtml::activeLabelEx($post, 'can_comment',array('class'=>'col-md-3 control-label', 'style'=>'float:left;padding:5px;width:15%')); ?>
				<div class="col-md-9">
					<?=CHtml::activeCheckBox($post, 'can_comment'); ?>
				</div> 
			</div>
			<div class='clear'></div>
			<div class="form-group">
				<?=CHtml::activeLabelEx($postLang, 'title',array('class'=>'col-md-3 control-label', 'style'=>'float:left;padding:5px;width:15%')); ?>
				<div class="col-md-9">
					<div class="input-icon right">
						<i class="fa fa-exclamation tooltips" style="color:#f3565d; display:none;" data-original-title="<?=$postLang->getError('title');?>" data-container="body"></i>
						<?=CHtml::activeTextArea($postLang, 'title', array('class' => 'form-control' , 'style' =>'width: 250px' )); ?>
					</div>
					<p class="help-block text-error" style="color:red"><?=$postLang->getError('title');?></p>
				</div>
			</div>
			<div class='clear'></div>
			<div class="form-group">
				<?=CHtml::activeLabelEx($post,'publication_post',array('class'=>'col-md-3 control-label', 'style'=>'float:left;padding:5px;width:15%')); ?>
				<div class="col-md-9">
					<div class="input-icon input-group date input-large right">
						<i class="fa fa-exclamation tooltips font-red" style="display:none;" data-original-title="<?=$post->getError('publication_post');?>" data-container="body"></i>
                        <?=CHtml::activeTextField($post,'publication_post', array('class' => 'form-control datepicker', 'readonly' => 'readonly', 'data-date-format' => 'dd.mm.yyyy hh:ii')); ?>
                        <span class="input-group-btn" onClick="ShowDatetimepickerPost()">
                            <button class="btn default" type="button" style="margin-right: 0;"><i class="fa fa-calendar"></i></button>
                        </span>
					</div>
					<p class="help-block text-danger" style="color: #a94442;"><?=$post->getError('publication_post');?></p>
				</div>
			</div>
			<div class='clear'></div>
			<div class="form-group">
				<?=CHtml::activeLabelEx($post, 'status_id',array('class'=>'col-md-3 control-label','style'=>'float:left;padding:5px;width:15%')); ?>
				<div class="col-md-9">
					<div class="input-icon right">
						<i class="fa fa-exclamation tooltips" style="color:#f3565d; display:none;" data-original-title="<?=$post->getError('status_id');?>" data-container="body"></i>
						<?=CHtml::activeDropDownList($post, 'status_id', $post::LabelsStatus(), array('class' => 'form-control input-large', 'style' =>'width:255px'))?>
					</div>
					<p class="help-block text-error" style="color:red"><?=$post->getError('status_id');?></p>
				</div>
			</div>
			<div class='clear'></div>
			<div class="form-group">
				<?=CHtml::activeLabelEx($post, 'can_read',array('class'=>'col-md-3 control-label','style'=>'float:left;padding:5px;width:15%')); ?>
				<div class="col-md-9">
					<div class="input-icon right">
						<i class="fa fa-exclamation tooltips" style="color:#f3565d; display:none;" data-original-title="<?=$post->getError('can_read');?>" data-container="body"></i>
						<?=CHtml::activeDropDownList($post, 'can_read', $post::LabelsRead(), array('class' => 'form-control input-large', 'style' =>'width:255px'))?>
					</div>
					<p class="help-block text-error" style="color:red"><?=$post->getError('can_read');?></p>
				</div>
			</div>
			<div class='clear'></div>
			<div class="form-group">
				<?=CHtml::activeLabelEx($postLang, 'description',array('class'=>'col-md-3 control-label','style'=>'float:left;padding:5px;width:15%')); ?>
				<div class="col-md-9">
					<div class="input-icon right">
						<i class="fa fa-exclamation tooltips" style="color:#f3565d; display:none;" data-original-title="<?=$postLang->getError('description');?>" data-container="body"></i>
						<?=CHtml::activeTextArea($postLang, 'description', array('class' => 'form-control input-large', 'style' =>'width:250px')); ?>
					</div>
					<p class="help-block text-error" style="color:red"><?=$postLang->getError('description');?></p>
				</div>
			</div>
			<div class='clear'></div>
			<div class="form-group">
				<?=CHtml::activeLabelEx($postLang, 'keywords',array('class'=>'col-md-3 control-label','style'=>'float:left;padding:5px;width:15%')); ?>
				<div class="col-md-9">
					<div class="input-icon right">
						<i class="fa fa-exclamation tooltips" style="color:#f3565d; display:none;" data-original-title="<?=$postLang->getError('keywords');?>" data-container="body"></i>
						<?=CHtml::activeTextArea($postLang, 'keywords', array('class' => 'form-control input-large', 'style' =>'width:255px')); ?>
					</div>
					<p class="help-block text-error" style="color:red"><?=$postLang->getError('keywords');?></p>
				</div>
			</div>
			<div class='clear'></div>
			<div class="form-group">
				<?=CHtml::activeLabelEx($postLang, 'short_text',array('class'=>'col-md-3 control-label','style'=>'float:left;padding:5px;width:15%')); ?>
				<div style='float:left;padding:5px' class="col-md-9 ckeditor <? if($postLang->hasErrors('short_text')) echo "error"; ?> ">
					<? $ckeditorconfig = array('name' => 'BlogPostsLang[short_text]', 'type' => 'content', 'ckfinder' => true, 'value' => $postLang->short_text); ?>
					<? if (Yii::app()->isPackageInstall('Ckeditor', '1.0.7')) : ?>
						<?=CkeditorHelper::init($ckeditorconfig) ?>
					<? else: ?>
						<?=FSmarty::ckeditor($ckeditorconfig) ?>
					<? endif; ?>					
					<p class="help-block text-error" style="color:red"><?=$postLang->getError('short_text');?></p>
				</div>
			</div>	
			<div class='clear'></div>
			<div class="form-group">
				<?=CHtml::activeLabelEx($postLang, 'text',array('class'=>'col-md-3 control-label','style'=>'float:left;padding:5px;width:15%')); ?>
				<div style='float:left;padding:5px' class="col-md-9 ckeditor <? if($postLang->hasErrors('text')) echo "error"; ?> ">
					<? $ckeditorconfigtext = array('name' => 'BlogPostsLang[text]', 'type' => 'content', 'ckfinder' => true, 'value' => $postLang->text); ?>
					<? if (Yii::app()->isPackageInstall('Ckeditor', '1.0.7')) : ?>
						<?=CkeditorHelper::init($ckeditorconfigtext) ?>
					<? else: ?>
						<?=FSmarty::ckeditor($ckeditorconfigtext) ?>
					<? endif; ?>					
					<p class="help-block text-error" style="color:red"><?=$postLang->getError('text');?></p>
				</div>
			</div>	
			<div class="clear"></div>			
			<div class="form-group">
				
				<label for="" class="col-md-3 control-label" style='float:left;padding:5px;width:15%' >
					<?=Yii::t('app', 'Загрузить картинку')?>
				</label>
				
				<div class="col-md-4" style='float:left;padding:5px'>
					<? if (!$post->isNewRecord) : ?>
					<div id="td_upload_photo">
						<? if (($post->attachment != NULL) && ($post->attachment->secret_name != null)) : ?><?= CHtml::image(MSmarty::attachment_get_file_name($post->attachment->secret_name, $post->attachment->raw_name, $post->attachment->file_ext, '_article_head', 'blog_picture'), ''); ?>
                        <? else : ?><?= Yii::t('app', 'Отсутствует') ?>
                    <? endif ; ?>
                    </div>
                    <?= CHtml::link(Yii::t('app', 'Изменить'), 'javascript:void(0)', array('id' => 'td_upload_link_change', 'style' => 'display: block;')) ?>
                    <? if (($post->attachment != NULL) && ($post->attachment->secret_name != null)) : ?>
                    <?=
                    CHtml::linkButton(Yii::t('app', 'Удалить'), array(
                        'submit' => array('deletepicture', 'id' => $post->id),
                        'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
                        'confirm' => Yii::t('app', 'Удалить картинку?')));
                        ?>
                    <? endif; ?>
                    <div style="display: none;" id="td_upload_form_block">
                        <?= CHtml::fileField('blog', null, array('class' => 'normal')) ?>
                    </div>
                    <?= CHtml::link(Yii::t('app', 'Отмена'), 'javascript:void(0)', array('id' => 'td_upload_link_cancel', 'style' => 'display: none;')) ?>
                <? else : ?>
                <div style="display: block;" id="td_upload_form_block">
                    <?= CHtml::fileField('blog', null, array('class' => 'normal')) ?>
                </div>
            <? endif; ?>
                <p style="padding-top: 10px;"><?= Yii::t('app','Допустимые форматы для загрузки картинки: jpg,png.') ?></p>
                <p class="help-block text-error" style="color:red"><?=$post->getError('attachment__id');?></p>    
                </div> 
            </div>								
        </div>	
<div class='clear'></div>
<div class="form-actions" style='padding:5px'>
	<?=CHtml::submitButton(Yii::t('app', 'Добавить'), array ('class' => 'btn green', 'name' => 'btn_save')); ?>
	<? if (Yii::app()->user->checkAccess('AdminBlogPosts')) : ?>
	<?=CHtml::link(Yii::t('app', 'Назад'), $this->createUrl('index'), array('class' => 'btn grey'))?>
<? endif; ?>
</div>	
</div>	
</div>
<link href="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/plugins/bootstrap-datetimepicker/css/datetimepicker.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" id="locale"></script>
<?=Chtml::hiddenField(FALSE, Yii::app()->params['hostMetronikStatic'] . '/public/assets/global/plugins/bootstrap-datetimepicker/js/locales/bootstrap-datetimepicker.' . Yii::app()->language . '.js', array('id' => 'scriptSrc'))?>
<?php $this->endWidget(); ?>