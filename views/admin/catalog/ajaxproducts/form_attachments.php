<?php
/**
 * @var AjaxProductsController $this
 * @var Products $model
 * @var CActiveForm $form
 * @var array $attachmentGroups
 * @var array $images
 * @var array $otherAttachments
 */
$form=$this->beginWidget('CActiveForm', array(
    'id'=>'products_form_attachments',
    'enableAjaxValidation'=>false,
    'htmlOptions' => array(
        'enctype' => 'multipart/form-data'
    )
));
echo $form->hiddenField($model, 'id', array('name' => 'product_id'));
?>
<p class="note note-danger">
	<i class="fa fa-warning" style="margin-right: 10px;"></i> <?=Yii::t('app', 'Поля помеченные')?> <span class="required">*</span> <?=Yii::t('app', 'обязательны к заполнению.')?>
</p>
<div class="note note-danger error" style="display: none;">
	<?=$form->errorSummary($model)?>
</div>
<p class="note note-success" style="display: none;">
	<i class="fa fa-check" style="margin-right: 10px;"></i> <?=Yii::t('app', 'Продукт успешно сохранен')?>
	<p id="flash-messages"></p>
</p>
<div class="row">
	<div class="col-md-6 col-sm-12" id="tab_images_uploader_filelist"></div>
</div>
<table class="table table-bordered table-hover">
	<thead>
		<tr class="heading" role="row">
			<th width="8%">
				 <?=Yii::t('app', 'Изображение')?>
			</th>
			<th width="25%">
				 <?=Yii::t('app', 'Описание')?>
			</th>
			<th width="10%">
				 <?=Yii::t('app', 'Главная картинка')?>
			</th>
			<th width="10%">
			</th>
		</tr>
	</thead>
	<tbody id="attachments">
	<?php foreach ($images as $i => $attachment): ?>
		<tr data-attachment-tr="<?=$attachment->id?>" class="attachment">
			<td>
				<a data-rel="fancybox-button" class="fancybox-button" href="<?=$attachment->getFullUrl()?>">
					<?=CHtml::image($attachment->getThumbUrl(), $attachment->lang->description, array('title' => $attachment->lang->description, 'class' => 'img-responsive'))?>
				</a>
			</td>
			<td>
				<?=$attachment->lang->description?>
			</td>
			
			<td>
				<label style="font-weight: normal;" for="loaded_attachment_<?=$attachment->getPrimaryKey()?>">
					<?=$form->radioButton($model, 'title_picture__id', array('uncheckValue'=>null, 'id' => 'loaded_attachment_'.$attachment->getPrimaryKey(), 'style' => 'margin-top: -2px;', 'value' => $attachment->getPrimaryKey())) ?>
				</label>
			</td>
			<td>
				<a class="btn default btn-sm delete-attachment" href="javascript:;" data-attachment-id="<?=$attachment->id?>" >
				<i class="fa fa-times"></i>  <?=Yii::t('app', 'Удалить')?></a>
			</td>
		</tr>
		<?endforeach;?>
	</tbody>
</table>
<hr>
<a class="btn blue" href="javascript:;" id="show_add_img"><i class="fa fa-plus"></i> <?=Yii::t('app', 'Загрузить еще файлы')?></a>
<div id="add_img" style="display: none;">
<div class="margin-bottom-10" id="tab_images_uploader_container" style="position: relative;">
	<?php foreach($model->getFormAttachments() as $i => $group): ?>
		<a class="btn yellow" href="javascript:;" id="tab_images_uploader_pickfiles" > 
		<i class="fa fa-plus"></i> <?=Yii::t('app', 'Выбрать файл')?> </a>
		</div>
		<div class="margin-bottom-10">
			<?=$form->labelEx($group->lang, 'description')?><?=$form->textArea($group->lang, '['.$i.']description', array('class' => 'form-control'))?>
			<?=$form->error($group->lang, '['.$i.']description')?>

			<?=$form->fileField($group->attachment, '['.$i.']file', array('class' => 'file', 'id' => 'tab_images_uploader_files', 'style' => 'display: none;'))?>
			<?=$form->error($group->attachment, '['.$i.']file', array('class' => 'errorMessage errorMessageBlock'))?>
			<?=$form->labelEx($group->attachment, 'remote_file_url')?>
			<?=$form->textField($group->attachment, '['.$i.']remote_file_url', array('class' => 'form-control remote-file-url', 'value' => '', 'placeholder' => 'Например: http://example.com/image.jpg'))?>
			<?=$form->error($group->attachment, '['.$i.']remote_file_url', array('class' => 'errorMessage errorMessageBlock'))?>
			<label style="font-weight: normal;" for="attachment_group_<?=$i?>">
			<?=$form->checkBox($group->attachment, '['.$i.']be_first', array('uncheckValue' => null, 'id' => 'attachment_group_'.$i, 'style' => 'margin-top: -2px;'))?>
			<?=Yii::t('app', 'Указать данное изображение как главное')?>
			</label>
    <?php endforeach; ?>
		</div>

</div>
<div class="margin-bottom-10 margin-top-10">
	<?=CHtml::submitButton(Yii::t('app', 'Сохранить'), array('class' => 'btn green', 'id' => 'tab_images_uploader_uploadfiles')); ?>
</div>

<?php $this->endWidget();?>

<script type="text/javascript">

    $(function(){
	
		$("#tab_images_uploader_pickfiles").click(function(){
		
			$("#tab_images_uploader_files").click();
		});
		
		$("#show_add_img").click(function(){
			$("#add_img").fadeIn(1000);
			$("#show_add_img").fadeOut(100);
		});
        $('#products_form_attachments').ajaxForm({
            data: {
                saveAttachments: true
            },
            cache: false,
            beforeSubmit: ProductTabsForm.ajaxFormBeforeSubmit,
            success: ProductTabsForm.ajaxFormSuccess
        });

        var uniqueAttachmentGroupId = $('.attachment').length;

        if ($('.loaded-image').length > 0)
        {
            $('.empty-images').hide();
        }

        if ($('.loaded-attachment').length > 0)
        {
            $('.empty-attachments').hide();
        }

        $('.delete-attachment').click(function(e){
            e.preventDefault();
            if (confirm("<?=Yii::t('app', 'Удалить вложение?')?>"))
            {
                var that = this;
                $.ajax({
                    type: 'post',
                    url: '/admin/catalog/ajaxattachments/delete/id/' + $(this).data('attachment-id'),
                    data : {
                        YII_CSRF_TOKEN : app.csrfToken
                    },                    
                    complete: function(){
                        $(that).closest('td').closest('tr').remove();
                        if ($('.loaded-image').length < 1)
                        {
                            $('.empty-images').show();
                        }
                        if ($('.loaded-attachment').length < 1)
                        {
                            $('.empty-attachments').show();
                        }
                    }
                });
            }
        });
		
		$('.load_image').change(function(e){
		
			//e.preventDefault();
			var img = $('.load_image').val();
			
		   
		   //$('#attachments').append(form);
		   	var product_id = $('#product_id').val();
			$.ajax({
                    type: 'post',
                    url: '/admin/catalog/ajaxproducts/form_attachments',
                    data : {
                        YII_CSRF_TOKEN : app.csrfToken,
						'TAttachments[0][file]' : img,
						product_id : product_id,
						saveAttachments: true
						
                    },                    
                    complete: function(){
                       console.log(data);
					   if($('.attachment').last().length > 0)
						{
							var form = $('.attachment').last().clone();
						}
						else
						{
							var form ="<tr></tr>";
						}
                    }
                });
			
		});

        $('.add-image').click(function(e){
            e.preventDefault();

            var count = $('.attachment').length;
            var form = $('.attachment').first().clone();

            form.find('.description').attr('name', 'AttachmentsLang[' + uniqueAttachmentGroupId + '][description]').val('');
            form.find('input[id^="ytTAttachments_"]').attr('name', 'TAttachments[' + uniqueAttachmentGroupId + '][file]');
            form.find('.file').attr('name', 'TAttachments[' + uniqueAttachmentGroupId + '][file]').val('');
            form.find('.remote-file-url').attr('name', 'TAttachments[' + uniqueAttachmentGroupId + '][remote_file_url]').val('');

            form.find('label[for^="attachment_group_"], ').attr('for', 'attachment_group_' + uniqueAttachmentGroupId);

            form.find('input[id^="attachment_group_"]')
                .attr('id', 'attachment_group_' + uniqueAttachmentGroupId)
                .attr('name', 'TAttachments[' + uniqueAttachmentGroupId + '][be_first]')
                .attr('checked', false);


            form.find('.file-num').html(count  + 1+ '.');

            $('.file-operations').before(form);

            uniqueAttachmentGroupId ++;
            $('.remove-attachment-group').show();

        });
        $('.remove-attachment-group').live('click', function(e){
            e.preventDefault();

            $(this).closest('.attachment').remove();
            if ($('.attachment').length < 2)
            {
                $('.remove-attachment-group').hide();
            }

            $('.attachment').each(function(key, val){
                $(val).find('.file-num').html((key + 1) + '.');
            });
        });
       /* $('input[id^="attachment_group_"]').live('change', function(){
            $('input[id^="attachment_group_"]').not(this).attr('checked', false);
        });*/
    });
	

</script>