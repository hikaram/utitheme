/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
 function jquery_settings(){	
	$.ajaxSetup({
		type 		: "POST",
		async		: false,
		dataType	: 'json'
	});
}

function Block()
{     
    this.page__id = '0';
    this.position = 'content';
    this.is_preview = false;
    this.redact_content__id = false;
    this.redact_current_content = false;
    this.redact_position = false;
    this.redact_sort_no = false;
    this.refresh_button = false;
    this.other_content = false;
    this.is_edit = false;
    this.content = '';
    this.show = function(position, page__id, is_edit) 
    {
        this.position = position;
        this.page__id = page__id;
        this.is_edit = is_edit;
        $('#block_edit').show();
        this.get_content();
        scroll(0,0);
    }
    
    this.hide = function() 
    {
        this.is_edit = false;
        if (this.is_preview)
        {
            $('#block_preview').remove();
            this.is_preview = false;
        }
        $('#content_preview').html(null);
        $("select#PagesWidgets_object_id").val($("select#PagesWidgets_object_id option:first").val());
        $('#block_edit').hide();
    }
    
    this.preview = function()
    {
        if (this.is_preview)
        {
            $('#block_preview').remove();
            this.is_preview = false;
        }
        this.is_preview = true;
        var html = '<div id="block_preview">' + $('#content_preview').html() + '</div>';
        $('#block_' + this.position).append(html);
    }
    
    this.show_edit_block = function(position, sort_no, event)
    {

        if (event == 'show')
        {
            $('#show_block_button_' + position + '_' + sort_no).hide();
            $('#hide_block_button_' + position + '_' + sort_no).show();
            $('#block_button_' + position + '_' + sort_no).find('span').show();
            $('#block_button_' + position + '_' + sort_no).animate({right : 10}, 300, function(){});
        }
        if (event == 'hide')
        {
            $('#block_button_' + position + '_' + sort_no).find('span.edit, span.up, span.down, span.delete').hide();
            $('#block_button_' + position + '_' + sort_no).animate({right : 0}, 300, function(){
                $('#hide_block_button_' + position + '_' + sort_no).hide();            
                $('#show_block_button_' + position + '_' + sort_no).show();                
            });
        }       
    }
    
    this.save = function()
    {
        $.ajax({
            url	: app.createAbsoluteUrl('admin/page/Ajaxlite/Save_widget'),
            error	: function ()
            {
                alert(T('Ошибка запроса'));
            },
            success	: function(data)
            {
                if (block.is_preview)
                {
                    $('#block_preview').remove();
                    block.is_preview = false;
                }
                $('#block_edit').hide();
                var html = '<div id="block_' + block.position + '_' + data.sort_no + '" class="block"><div id="block_text_' + block.position + '_' + data.sort_no + '" class="block_text">' + $('#content_preview').html() + '</div></div>';
                $('#block_' + block.position).append(html);
                block.get_button(data.sort_no, data.content__id, block.position, block.page__id);
                $('#block_' + block.position + '_' + data.sort_no).append('<div id="block_button_' + block.position + '_' + data.sort_no + '" class="block_button">' + block.refresh_button + '</div>');
                block.show_edit_block(block.position, data.sort_no, 'hide');
                block.refresh_button = false;
                $('#content_preview').html(null);
                $("select#PagesWidgets_object_id").val($("select#PagesWidgets_object_id option:first").val());
                this.is_edit = false;
            },
            data	: 
            {  
                YII_CSRF_TOKEN   : app.csrfToken,
                page__id : $("input#PagesWidgets_page__id").val(),
                object_alias : $("select#PagesWidgets_object_alias").val(),
                object_id : $("select#PagesWidgets_object_id").val(),
                position : this.position                              
            },
            async		: false,
            cache		: false
        });       
    }

    this.delete_widget = function(content__id, position, sort_no, page__id)
    {
        if (confirm(T('Удалить этот текстовый блок ?')))
        {
            $.ajax({
                url	: app.createAbsoluteUrl('admin/page/Ajaxlite/Delete_widget'),
                error	: function ()
                {
                    alert(T('Ошибка запроса'));
                },
                success	: function()
                {
                    $('#block_' + position + '_' + sort_no).remove();
                },
                data	: 
                {  
                    YII_CSRF_TOKEN   : app.csrfToken,
                    content__id : content__id,
                    position : position,
                    sort_no : sort_no,
                    page__id : page__id                
                },
                async		: false,
                cache		: false
            }); 
        }       
    }    

    this.get_content = function()
    {
        
        $.ajax({
        	url	: app.createAbsoluteUrl('admin/page/Ajaxlite/Get_content'),
            error	: function ()
            {
                alert(T('Ошибка запроса'));
            },
            success	: function(data)
            {
                $('#content_preview').html(data.content);
            },
			data	: 
            {  
                YII_CSRF_TOKEN   : app.csrfToken,
                id : $("select#PagesWidgets_object_id").val()
			},
			async		: false,
			cache		: false
        });
    }
    
    this.create_content = function()
    {
        $('#content_create').show();
    }
    
    this.content_hide = function() 
    {
        $('#content_create').hide();
        this.redact_content__id = false;
        this.redact_current_content = false;
        this.redact_position = false;
        this.redact_sort_no = false;
        this.other_content = false;
        CKEDITOR.instances['textareackeditor'].setData('');
        $('input#Contents_name').val(null);
        $('input#Contents_lang').val(null);
    }
    
    this.content_save = function() 
    {
        if (block.redact_current_content != false)
        {
            block.redact_content__id = block.redact_current_content;
        }
        
        if ($('input#Contents_name').val() == '')
        {
            alert(T('Введите имя блока!'));
            return;
        }
        
        var resultText = '';
        
        if ($('input#showEditorBox').val() != true)
        {
            resultText = CKEDITOR.instances['textareackeditor'].getData();
        }        
        else
        {
            if ($('input#showEditorBox').is(':checked'))
            {
                resultText = CKEDITOR.instances['textareackeditor'].getData();
            }
            else
            {
                resultText = $('textarea#textareablock').val();
            }            
        }
        
        $.ajax({
            url	: app.createAbsoluteUrl('admin/page/Ajaxlite/Save_content'),
            error	: function ()
            {
                alert(T('Ошибка запроса'));
            },
            success	: function(data)
            {
                if ((data.success != undefined) && (data.success == false))
                {
                    if ((data.errors != undefined) && (data.errors.text != undefined))
                    {
                        $('div#texterror').html(data.errors.text);
                        $('div#texterror').show();
                    }
                    if ((data.errors != undefined) && (data.errors.name != undefined))
                    {
                        $('div#nameerror').html(data.errors.name);
                        $('div#nameerror').show();
                    }                    
                    return;
                }
                $('div.contenterrors').html('');
                $('div.contenterrors').hide();
                $('#content_create').hide();
                $('#PagesWidgets_object_id').html(data.content);
                $('#content_preview').html(data.preview);
                if (block.redact_content__id != false)
                {
                    $('#block_text_' + block.redact_position + '_' + block.redact_sort_no).html(data.preview); 
                    if (block.other_content != false)
                    {
                        for (i = 0; i < block.other_content.length; i++)
                        {
                            $('#block_text_' + block.other_content[i]['position'] + '_' + block.other_content[i]['sort_no']).html(data.preview); 
                        }
                    }
                    block.redact_content__id = false;
                    block.redact_position = false;
                    block.redact_sort_no = false;
                }               
                CKEDITOR.instances['textareackeditor'].setData('');
                $('input#Contents_name').val(null);
                $('input#Contents_lang').val(null);
                block.redact_current_content = false;
            },
            data	: 
            {  
                YII_CSRF_TOKEN   : app.csrfToken,
                name : $("input#Contents_name").val(),
                lang : $("input#Content_lang").val(),
                text : resultText,
                id : block.redact_content__id
			},
			async		: false,
			cache		: false
		});
    }
    
    this.edit_content = function(content__id, position, sort_no, page__id)
    {
        if (content__id == 'false')
        {
            content__id = $('select#PagesWidgets_object_id').val();
            block.redact_current_content = $('select#PagesWidgets_object_id').val();
        }
 
        $.ajax({
        	url	: app.createAbsoluteUrl('admin/page/Ajaxlite/Edit_content'),
            error	: function ()
            {
                alert(T('Ошибка запроса'));
            },
            success	: function(data)
            {
                $('#content_create').show();
                $('#Contents_name').val(data.name);
                $('#Contents_lang').val(data.lang);
                CKEDITOR.instances['textareackeditor'].setData(data.text);
                $('textarea#textareablock').val(data.text);
                if (position != null)
                {
                    block.redact_content__id = data.id;
                    block.redact_position = position;
                    block.redact_sort_no = sort_no;
                    if (data.other)
                    {
                        block.other_content = data.other;
                    }
                }
                
                scroll(0,0);
            },
            data	: 
            {  
                YII_CSRF_TOKEN   : app.csrfToken,
                content__id : content__id,
                page__id : page__id
            },
            async		: false,
            cache		: false
        });
    }
    
    this.content_move = function(content__id, destination, page__id, sort_no, pos)
    {
        
        $.ajax({
        	url	: app.createAbsoluteUrl('admin/page/Ajaxlite/Move_content'),
            error	: function ()
            {
                alert(T('Ошибка запроса'));
            },
            success	: function(data)
            {
                if (data.error)
                {
                    alert(T('Уже на месте'));
                    return;
                }
                var temp = null;
                var i = -1;
                if (destination == 'up')
                {
                    while (temp == null)
                    {
                        i++;
                        temp = $('#block_text_' + pos + '_' + (sort_no - 1 - i)).html();                            
                    }
                    $('#block_text_' + pos + '_' + (sort_no - 1 - i)).html($('#block_text_' + pos + '_' + (sort_no)).html());
                    $('#block_text_' + pos + '_' + (sort_no)).html(temp);
                    block.get_button(sort_no - 1 - i, content__id, pos, page__id);
                    $('#block_button_' + pos + '_' + (sort_no - 1 - i)).html(block.refresh_button);
                    block.show_edit_block(pos, sort_no - 1 - i, 'hide');
                    block.refresh_button = false;
                    block.get_button(sort_no, data.contents_remove, pos, page__id);
                    $('#block_button_' + pos + '_' + (sort_no)).html(block.refresh_button);
                    block.show_edit_block(pos, sort_no, 'hide');
                    block.refresh_button = false;                    
                }                
                if (destination == 'down')
                {
                    while (temp == null)
                    {
                        i++;
                        temp = $('#block_text_' + pos + '_' + (sort_no + 1 + i)).html();                            
                    }
                    $('#block_text_' + pos + '_' + (sort_no + 1 + i)).html($('#block_text_' + pos + '_' + (sort_no)).html());
                    $('#block_text_' + pos + '_' + (sort_no)).html(temp);
                    block.get_button(sort_no + 1 + i, content__id, pos, page__id);
                    $('#block_button_' + pos + '_' + (sort_no + 1 + i)).html(block.refresh_button);
                    block.show_edit_block(pos, sort_no + 1 + i, 'hide');
                    block.refresh_button = false;
                    block.get_button(sort_no, data.contents_remove, pos, page__id);
                    $('#block_button_' + pos + '_' + (sort_no)).html(block.refresh_button);
                    block.show_edit_block(pos, sort_no, 'hide');
                    block.refresh_button = false;
                }                
            },
            data	: 
            {  
                YII_CSRF_TOKEN   : app.csrfToken,
                c_id : content__id,
                des : destination,
                p_id : page__id,
                position : pos,
                sort_no : sort_no
            },
            async		: false,
            cache		: false
	});
    }
    
    this.get_button = function(sort_no, content__id, position, page__id)
    {        
        $.ajax({
        	url	: app.createAbsoluteUrl('admin/page/Ajaxlite/Get_button'),
            error	: function ()
            {
                alert(T('Ошибка запроса'));
            },
            success	: function(data)
            {
                block.refresh_button = data.buttons;
            },
            data	: 
            {
                YII_CSRF_TOKEN   : app.csrfToken,
                position : position,
                sort_no : sort_no,
                content__id : content__id,
                page__id : page__id                
            },
            async		: false,
            cache		: false
        });       
    }
}

function content_manage()
{ 
    var layout = $("#Pages_layout").val();     
    $('.'+layout+'-icon-picture').addClass('selected');    
    switch (layout)
    {
        case 'wide':
            $('.select-layout').scrollTop(0)
            break
        case 'l_column':
            $('.select-layout').scrollTop(115)
            break
        case 'r_column':
            $('.select-layout').scrollTop(250)
            break
        case 'three_column':
            $('.select-layout').scrollTop(390)
            break
        case 'max_wide':
            $('.select-layout').scrollTop(530)
            break
        case 'max_l_column':
            $('.select-layout').scrollTop(670)
            break
        case 'max_r_column':
            $('.select-layout').scrollTop(800)
            break
        case 'max_three_column':
            $('.select-layout').scrollTop(1000)
            break
    }    
    
    
	$('.template').bind('click', function(){
        $('.template').removeClass('selected');
        $(this).addClass('selected');
        $('input[name="Pages[layout]"]').val($(this).attr('value'));
    }); 
	
    $('.toolbar .l-show').bind('click', function(){
        $('.toolbar .page-manager-content').show();
        $('.toolbar').animate({top : 0}, 800, function(){
            $('.toolbar .l-show').hide();
            $('.toolbar .l-hide').show();
        });
    });
    
    $('.toolbar .l-hide').bind('click', function(){
        $('.toolbar').animate({top : -585}, 800, function(){
            $('.toolbar .page-manager-content').hide();
            $('.toolbar .l-hide').hide();
            $('.toolbar .l-show').show();
        });
    });

    if ($('#Pages_is_visible').attr('checked') == 'checked')
    {
        $('.view_allowed').hide();
        $('.view_denied').show();
    }
    else
    {
        $('.view_allowed').show();
        $('.view_denied').hide();
    } 

    $('input#Pages_is_visible').bind('change', function(){
        after_is_visible_change(this);
    });  

    if ($('div.toolbar-inner').find('div').is('.errorMessage'))
    {
        $('.toolbar').animate({top : 0}, 800, function(){
            $('.toolbar .show').hide();
            $('.toolbar .hide').show();
        });
    }
}

function Getting_content(layout, title, name, keywords, description, id, url, theme_id, is_visible, rolesData, lang)
{    
    roles = JSON.parse(rolesData);

	$('#panel_manage').load('/' + lang + '/admin/page/lite/create/isEdit/1' + ' #panel_manage_inner', function(){
        $('input[name="Pages[layout]"]').val(layout);
        $('input[name="PagesLang[title]"]').val(title);
        $('input[name="PagesLang[name]"]').val(name);
        $('input[name="PagesLang[keywords]"]').val(keywords);
        $('textarea[name="PagesLang[description]"]').val(description);
        $('#pages-form').attr('action', app.createAbsoluteUrl('admin/page/lite/edit/id/' + id));
        $('#submit_button').attr('value', T('Применить'));
        $('input#url').val(url);
        $('#backbutton').hide();
		$('l-hide').hide();
        $('l-show').hide();
        if (is_visible == 1)
        {
            $('input#Pages_is_visible').attr('checked', 'checked');
        }
        else
        {
            $('input#Pages_is_visible').removeAttr('checked');
        }

        $.each(roles.allowed, function(){
            $('input#PagesRoles_' + this + '_is_view_allowed').attr('checked', 'checked');
        });

        $.each(roles.denied, function(){
            $('input#PagesRoles_' + this + '_is_view_denied').attr('checked', 'checked');
        });
        
        after_is_visible_change($('input#Pages_is_visible'));
        
        content_manage();      
		$('.page-template-select-layout').mCustomScrollbar({axis: "x", theme: "light-3"});
			$('.page-roles-table-wrapper').mCustomScrollbar({});
    }); 
}

function sendForm()
{
    $.ajax({
        url	: $('#ajaxurl').val(),
        error	: function ()
        {
            alert(T('Ошибка запроса'));
        },
        success	: function(data)
        {
            if (data.backurl != '')
            {
                location.href = data.backurl;
            }            
        },
        data	: 
        {
            YII_CSRF_TOKEN  : app.csrfToken,
            page__id        : $('#page__id').val()
        },
        async		: false,
        cache		: false
    });
}

function after_is_visible_change(object)
{
    if ($(object).attr('checked') == 'checked')
    {
        $('.view_allowed').hide();
        $('.view_denied').show();
    }
    else
    {
        $('.view_allowed').show();
        $('.view_denied').hide();
    }
}

function showEditor()
{
    if ($('input#showEditorBox').val() != true)
    {
        return;
    }
    
    if ($('input#showEditorBox').is(':checked'))
    {
        $('textarea#textareablock').css('display', 'none');
        $('textarea#textareablock').css('width', '97%');
        $('textarea#textareablock').css('height', '390px');
        $('textarea#textareablock').css('visibility', 'hidden');
        $('div#cke_textareackeditor').show();
        
    }
    else
    {
        $('textarea#textareablock').css('display', 'block');
        $('textarea#textareablock').css('visibility', 'visible');
        $('textarea#textareablock').css('width', '97%');
        $('textarea#textareablock').css('height', '390px');
        $('div#cke_textareackeditor').hide();
    }
}

var block;

$(function(){
    jquery_settings();

    if ($('#Pages_is_visible').attr('checked') == 'checked')
    {
        $('.view_allowed').hide();
        $('.view_denied').show();
    }
    else
    {
        $('.view_allowed').show();
        $('.view_denied').hide();
    }
    
    $('input#Pages_is_visible').bind('change', function(){
        after_is_visible_change(this);
    });
    
    block = new Block();
    $('#PagesWidgets_object_id').change(block.get_content);
    content_manage();
    
    $('.hide_block_button').hide();
    $('span.edit').hide();
    $('span.up').hide();
    $('span.down').hide();
    $('span.delete').hide();
})


