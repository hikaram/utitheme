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
    this.moving = false;
    
    this.movingTop = 0;
    this.movingLeft = 0;
    this.movingRight = 0;
    this.movingBottom = 0;
    
    this.parent_id = '';
    
    this.content = '';
    this.html = '';
    this.style = '';
    
    this.is_show_edit_panel = false;
    this.is_low_edit_panel  = false;
    this.is_show_description_block = false;
    
    this.minheight_for_parent = 0;
    
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
        $('select#PagesWidgets_object_id').val(null);
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
            $('#block_button_' + position + '_' + sort_no).find('span.edit, span.up, span.down, span.delete, span.rudimentary-picker').hide();
            $('#block_button_' + position + '_' + sort_no).animate({right : 0}, 300, function(){
                $('#hide_block_button_' + position + '_' + sort_no).hide();            
                $('#show_block_button_' + position + '_' + sort_no).show();                
            });
        }       
    }
    
    this.save = function()
    {      
        if (block.page__id == 0)
        {
            block.page__id = $('input#PagesWidgets_page__id').val();
        }

        $.ajax({
            url	: app.createAbsoluteUrl('admin/page/Ajaxpro/Save_widget'),
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
                
                if (block.html != '')
                {
                    if (data.text != undefined)
                    {
                        $('#content_preview').html(data.text);
                    }
                    else
                    {
                        $('#content_preview').html(block.html);
                    }
                }
                block.html = '';
                
                if (data.is_moving == false)
                {
                    var html = '<div id="block_' + block.position + '_' + data.sort_no + '" class="block"><div id="block_text_' + block.position + '_' + data.sort_no + '" class="block_text">' + $('#content_preview').html() + '</div></div>';
                    $('#block_' + block.position).append(html);
                    block.get_button(data.sort_no, data.content__id, block.position, block.page__id);
                    $('#block_' + block.position + '_' + data.sort_no).append('<div id="block_button_' + block.position + '_' + data.sort_no + '" class="block_button">' + block.refresh_button + '</div>');
                }
                else
                {
                    var html = '<div id="resizable_' + data.page_widget_id + '" class="jqueryon resizable ui-widget-content border-static" style="' + block.style + '"><input type="hidden" value="' + data.sort_no + '" id="sort_no_resizable_' + data.page_widget_id + '" /><input type="hidden" value="' + data.content__id + '" id="content__id_resizable_' + data.page_widget_id + '" /><div id="block_' + block.position + '_' + data.sort_no + '" class="block"><div id="block_text_' + block.position + '_' + data.sort_no + '" class="block_text">' + $('#content_preview').html() + '</div></div></div>';
                    block.style = '';
                    $('#block_' + block.position).append(html);
                    block.get_short_button(data.sort_no, data.content__id, block.position, block.page__id);
                    $('#block_' + block.position + '_' + data.sort_no).append('<div id="block_button_' + block.position + '_' + data.sort_no + '" class="block_button">' + block.refresh_button + '</div>');                    
                  
                    block.minheight_for_parent = 0;
                    $.each($('.jqueryon'), function(){
                        block.is_out_of_border(this, false);
                        block.recalculate_min_height_for_parent(this);
                    }); 

                    $(".jqueryon").draggable({
                        start: function(event, ui) {
                            block.before_position_save(this)
                        },
                        stop: function(event, ui) {
                            block.save_position(this, false)
                        } 
                    });
                    $(".jqueryon").resizable({
                        containment:'parent',
                        handles: 's, w, n, e, se, sw, ne, nw',
                        start: function(event, ui) {
                            block.before_position_save(this)
                        },                        
                        stop: function(event, ui) {
                            block.save_position_after_resizable(this, true)
                        } 
                    });

                    $(".jqueryon").mousemove(block.changebordertoactive);
                    $(".jqueryon").mouseout(block.changebordertostatic);                    
                    
                    $('.ColorBlotch').bind('click', block.colordivsave);
                    
                    if (block.is_show_edit_panel)
                    {
                        block.is_show_edit_panel = false;
                        block.hide_edit_panel();
                    }
                    
                }
                block.show_edit_block(block.position, data.sort_no, 'hide');
                block.refresh_button = false;
                $('#content_preview').html(null);
                $('select#PagesWidgets_object_id').val(null);
                this.is_edit = false;
                
                $(".jqueryonparent").resizable({
                    handles: 's',
                    minHeight: block.minheight_for_parent,
                    stop: function(event, ui) {
                        block.save_position_for_parent(this)
                    }         
                });                 
                
            },
            data	: 
            {  
                YII_CSRF_TOKEN  : app.csrfToken,
                page__id        : $("input#PagesWidgets_page__id").val(),
                object_alias    : $("select#PagesWidgets_object_alias").val(),
                object_id       : $("select#PagesWidgets_object_id").val(),
                position        : this.position,
                style_css       : block.style
            },
            async		: false,
            cache		: false
        });       
    }

    this.delete_widget = function(content__id, position, sort_no, page__id)
    {
        $.ajax({
            url	: app.createAbsoluteUrl('admin/page/Ajaxpro/Delete_widget'),
            error	: function ()
            {
                alert(T('Ошибка запроса'));
            },
            success	: function(data)
            {
                $('#block_' + position + '_' + sort_no).remove();
                if ($('#resizable_' + data.widget_id).html() != undefined)
                {
                    $('#resizable_' + data.widget_id).remove();
                }
                block.minheight_for_parent = 0;
                $.each($('.jqueryon'), function(){
                    block.recalculate_min_height_for_parent(this);
                }); 
                
                $(".jqueryonparent").resizable({
                    handles: 's',
                    minHeight: block.minheight_for_parent,
                    stop: function(event, ui) {
                        block.save_position_for_parent(this)
                    }         
                });                
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

    this.get_content = function()
    {
        
        $.ajax({
        	url	: app.createAbsoluteUrl('admin/page/Ajaxpro/Get_content'),
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
    
    this.create_content_wrapper = function()
    {
        block.hide_edit_panel();
        block.is_show_edit_panel = true;
        block.create_content();
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
        if (block.is_show_edit_panel)
        {
            block.is_show_edit_panel = false;
            block.show_edit_panel();
        }
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
            url	: app.createAbsoluteUrl('admin/page/Ajaxpro/Save_content'),
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
                if (block.is_show_edit_panel)
                {
                    block.is_show_edit_panel = false;
                    block.get_edit_panel_content();
                    block.show_edit_panel();
                }                
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
        	url	: app.createAbsoluteUrl('admin/page/Ajaxpro/Edit_content'),
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
        	url	: app.createAbsoluteUrl('admin/page/Ajaxpro/Move_content'),
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
        	url	: app.createAbsoluteUrl('admin/page/Ajaxpro/Get_button'),
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
    
    this.get_short_button = function(sort_no, content__id, position, page__id)
    {     
        if (page__id == 0)
        {
            page__id = $('input#page__id').val();
        }

        $.ajax({
        	url	: app.createAbsoluteUrl('admin/page/Ajaxpro/Get_short_button'),
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


    this.before_position_save = function(obj)
    {
        if (block.is_show_description_block == true)
        {
            block.hide_all_description_for_blocks();
        }
        
        block.hide_edit_panel();        
        
        style_object = obj.style;
        block.movingTop = style_object.top;
        block.movingLeft = style_object.left;
        block.parent_id = $(obj).parent().attr('id');
    }

    this.save_position = function(obj, res)
    {   
        if (!block.moving && !res)
        {
            $(obj).animate({
                top: block.movingTop,
                left: block.movingLeft
                }, 100);
            
            return;
        }        

        if ($('#' + obj.id).parent().attr('id') != block.parent_id)
        {
            block.changeparent(obj, $('#' + obj.id).parent().attr('id'), block.parent_id);
        }
        else
        {
            block.is_out_of_border(obj, true);
            block.moving = false;        
        }
    }
    
    this.save_position_after_resizable = function(obj, res)
    {  
//        var style_check_for_resizable = obj.style;
//        alert(obj.clientHeight);
//        alert(obj.scrollHeight);
        block.save_position(obj, res);
    }    
    
    this.save_new_block = function(e, obj)
    {
        $('.edit_page_toolbar-inner').css('overflow', 'auto');
        if (block.is_low_edit_panel == true)
        {
            $('.edit_page_toolbar').css('opacity', '1');
            $('.edit_page_toolbar').css('z-index', '102');
            block.is_low_edit_panel = false;
        }
        
        var elem_id = $(obj).attr('id');
        if (!block.moving)
        {
            $('#temp_' + elem_id).css('marginTop', '5px');
            $(obj).remove();
            $('#temp_' + elem_id).attr('id', elem_id);
            block.moving = false;
            return;
        }        

        var style_new_object = obj.style;

        var top = parseInt(e.pageY) - parseInt($('#' + block.parent_id).offset().top);

        block.style = "position: absolute; top: " + top + "px; width: " + $('#' + block.parent_id).width() + "px;";        

        $(obj).remove();
        $('#temp_' + $(obj).attr('id')).css('marginTop', '5px');
        $('#temp_' + elem_id).attr('id', elem_id);
        $("input#PagesWidgets_page__id").val($('input#page__id').val());
        $("select#PagesWidgets_object_alias").val('moving_contents');
        $("select#PagesWidgets_object_id").val($(obj).attr('id').substr(19));
        block.position = block.parent_id.substr(6);

        block.html = $('div#' + $(obj).attr('id') + '_full').html();

        block.is_show_edit_panel = true;

        block.save();

        block.moving = false;
    }    
    
    this.save_position_db = function(obj)
    {
        parent_width = $('#' + obj.id).parent().width();        
        
        left_percent = (parseInt(style_object.left) / parent_width) * 100;

        style = "position: " + style_object.position + "; top: " + style_object.top + "; left: " + left_percent + "%; width: " + obj.clientWidth + "px; height: " + obj.clientHeight + "px;";
        
        var background_color = $(obj).css('background-color');
        
        if (background_color != 'transparent')
        {
            style = style + ' background-color: ' + background_color;
        }

        $.ajax({
                url	: app.createAbsoluteUrl('admin/page/Ajaxpro/Save_block_position'),
                error	: function ()
                {
                    alert(T('Ошибка запроса'));
                },
                success	: function()
                {
                    block.minheight_for_parent = 0;
                    $.each($('.jqueryon'), function(){
                        block.recalculate_min_height_for_parent(this);
                    });
                },
                data	: 
                {
                    YII_CSRF_TOKEN  : app.csrfToken,
                    page_widget_id  : obj.id.substr(10),
                    style           : style
                },
                async		: false,
                cache		: false
            });        
    }

    this.save_position_for_parent = function(obj)
    {
        $.ajax({
                url	: app.createAbsoluteUrl('admin/page/Ajaxpro/Save_parent_height'),
                error	: function ()
                {
                    alert(T('Ошибка запроса'));
                },
                success	: function()
                {
                    $('.jqueryonparent').css('height', obj.clientHeight - parseInt($(obj).css('padding-bottom')));
                },
                data	: 
                {
                    YII_CSRF_TOKEN  : app.csrfToken,
                    page__id        : $('input#page__id').val(),
                    height          : obj.clientHeight - parseInt($(obj).css('padding-bottom'))
                },
                async		: false,
                cache		: false
            });     

    }
    
    this.is_out_of_border = function(obj, is_save)
    {
        var parent_height_less = false;
        var parent_width_less = false;
        style_object = obj.style;
        
        parent_width = $('#' + obj.id).parent().width();
        parent_height = $('#' + obj.id).parent().height();

        
        if (style_object.left.indexOf('%') == -1)
        {
            left = style_object.left;
        }
        else
        {
            left = ((parent_width * parseInt(style_object.left)) / 100) + 'px';
        }

        var border_is_moving = false;
        border_width    = obj.clientWidth + 'px';
        border_height   = obj.clientHeight + 'px';
        border_top      = style_object.top;
        border_left     = left;

        if (obj.clientWidth > parent_width)
        {
            border_is_moving = true;
            border_width = parent_width - 2 + 'px';
            border_left = 0;
            left = 0;
            parent_width_less = true;
        }

        if (obj.clientHeight > parent_height)
        {
            border_is_moving = true;
//            border_height = parent_height + 'px';            
            border_top = 0;
            parent_height_less = true;
        }

        if ((parseInt(style_object.top) < 0) && (parseInt(left) < 0))
        {
            border_is_moving = true;
            border_top = 0;
            border_left = 0;
        }

        if ((parseInt(style_object.top) < 0) && (parseInt(left) + parseInt(border_width) > parent_width))
        {
            border_is_moving = true;
            border_top = 0;
            border_left = (parent_width - parseInt(border_width)) + 'px';            
        }

        if ((parseInt(style_object.top) + parseInt(border_height) > parent_height) && (parseInt(left) < 0))
        {
            border_is_moving = true;
            border_top = (parent_height - parseInt(border_height)) + 'px';
            border_left = 0;            
        }        

        if ((parseInt(style_object.top) + parseInt(border_height) > parent_height) && (parseInt(left) + parseInt(border_width) > parent_width))
        {
            border_is_moving = true;
            border_top = (parent_height - parseInt(border_height)) + 'px';
            border_left = (parent_width - parseInt(border_width)) + 'px';            
        }

        if (parseInt(style_object.top) < 0)
        {
            border_is_moving = true;
            border_top = 0;
        }

        if (parseInt(style_object.left) < 0)
        {
            border_is_moving = true;
            border_left = 0;            
        }
        if (parseInt(left) + parseInt(border_width) > parent_width)
        {
            border_is_moving = true;
            border_left = (parent_width - parseInt(border_width)) + 'px';            
        }
        if (parseInt(style_object.top) + parseInt(border_height) > parent_height)
        {
            border_is_moving = true;
            if (parent_height_less == false)
            {
                border_top = (parent_height - parseInt(border_height)) + 'px';
            }            
        }

        if ((parent_height_less == true) && ($(obj).attr('id').substr(-$(obj).attr('id').length, 9) == 'resizable'))
        {
            
            parent_height_less = false;

            $(obj).parent().animate({
                height: border_height
                }, 300, 'linear', function(){
                    block.save_position_for_parent(this);
                });             
        }

        if (border_is_moving)
        {
            if (parent_width_less)
            {
                $(obj).animate({
                    width: border_width,
                    top: border_top,
                    left: border_left
                    }, 300, 'linear', function(){
                        block.save_position_db(this);
                        parent_width_less = false;
                        block.is_out_of_border(obj, is_save);                        
                    });
            }
            else
            {
                $(obj).animate({
                    width: border_width,
                    height: border_height,
                    top: border_top,
                    left: border_left
                    }, 300, 'linear', function(){
                        block.save_position_db(this)
                    });
            }
            
        }
        else if (is_save)
        {
            block.save_position_db(obj);
        }
    }

    this.recalculate_min_height_for_parent = function(obj)
    {
        if (obj.id.substr(-12, 9) != 'resizable')
        {
            return
        }
        style_cur_object    = obj.style;
        border_height       = obj.clientHeight;
        border_top          = style_cur_object.top;

        var total_top = parseInt(border_top) + border_height;

        if (total_top > (block.minheight_for_parent - parseInt($(obj).parent().css('padding-bottom'))))
        {
            
            block.minheight_for_parent = total_top;
            $(".jqueryonparent").resizable({
                handles: 's',
                minHeight: block.minheight_for_parent,
                stop: function(event, ui) {
                    block.save_position_for_parent(this)
                }         
            });            
        }        
    }

    this.changeparent = function(obj, from, to)
    {        
        block.html = $(obj).find('.block_text').html();
        content__id = $('input#content__id_' + $(obj).attr('id')).val();
        sort_no = $('input#sort_no_' + $(obj).attr('id')).val();
        position = from.substr(6);
        page__id = $('input#page__id').val();
        block.delete_widget(content__id, position, sort_no, page__id);
        $("input#PagesWidgets_page__id").val($('input#page__id').val());
        $("select#PagesWidgets_object_alias").val('moving_contents');
        $("select#PagesWidgets_object_id").val(content__id);
        block.position = to.substr(6);
        
        left = $('#' + from).offset().left - $('#' + to).offset().left;
        
        left = left + parseInt(style_object.left);
        
        if (obj.clientWidth != 0)
        {
            width = obj.clientWidth + 'px';
        }
        else
        {
            width = style_object.width;
        }
        
        if (obj.clientHeight != 0)
        {
            height = obj.clientHeight + 'px';
        }
        else
        {
            height = style_object.height;
        }        

        block.style = "position: " + style_object.position + ";";
        if (top != '')
        {
            block.style = block.style + " top: " + style_object.top + ";";
        }
        if (left != '')
        {
            block.style = block.style + " left: " + left + "px;";
        }
        if (width != '')
        {
            block.style = block.style + " width: " + width + ";";
        }
        if (height != '')
        {
//            block.style = block.style + " height: " + height + ";";
        }

//        block.style = "position: " + style_object.position + "; top: " + style_object.top + "; left: " + left + "px; width: " + width + "; height: " + height + ";";        

        var background_color = $(obj).css('background-color');
        
        if (background_color != 'transparent')
        {
            block.style = block.style + ' background-color: ' + background_color;
        }        
        
        block.save();
    }

    this.changebordertoactive = function()
    {    
        $('div#' + this.id).removeClass('border-static');
        $('div#' + this.id).addClass('border-move');
    }

    this.enablemoving = function(obj)
    {    
        block.parent_id = $(obj).attr('id');
        block.moving = true;
    }

    this.changebordertostatic = function()
    {    
        $('div#' + this.id).removeClass('border-move');
        $('div#' + this.id).addClass('border-static');
    }
    
    this.show_edit_panel = function()
    {
        $(".edit_content_block").draggable({
            start: function(event, ui) {
                block.start_moving_new_block(this);
            },
            stop: function(event, ui) {
                block.save_new_block(event, this)
            }
        });         
        $('.edit_page_toolbar a.l-show').hide();
        $('.edit_page_toolbar a.l-hide').show();        
        $('.edit_page_toolbar').animate({right : 0}, 800, function(){
        });
    }
    
    this.hide_edit_panel = function()
    {
        $('.edit_page_toolbar a.l-hide').hide();        
        $('.edit_page_toolbar a.l-show').show();
        $('.edit_page_toolbar').animate({right : '-196px'}, 800, function(){
        });
    } 
    
    this.edit_panel_low = function(id)
    {
        if (block.is_low_edit_panel == true)
        {
            $('.edit_page_toolbar').css('opacity', '0.3');
            $('.edit_page_toolbar').css('z-index', '1');
            $('.ui-draggable-dragging').css('opacity', '1');
        }
    }    
    
    this.get_edit_panel_content = function()
    {
        $.ajax({
                url	: app.createAbsoluteUrl('admin/page/Ajaxpro/getEditPanelContentByAlias'),
                error	: function ()
                {
                    alert(T('Ошибка запроса'));
                },
                success	: function(data)
                {
                    $('.all_description').find('div').hide();
                    $('#desc_content').show();
                    $('#edit_page_content').html(data.html);
                    $(".edit_content_block").draggable({
                        start: function(event, ui) {
                            block.start_moving_new_block(this)
                        },
                        stop: function(event, ui) {
                            block.save_new_block(event, this)
                        }
                    }); 
                },
                data	: 
                {
                    YII_CSRF_TOKEN  : app.csrfToken,
                    alias           : $('select#object_aliases').val()
                },
                async		: false,
                cache		: false
            });
    }

    this.start_moving_new_block = function(obj)
    {
        
        if (block.is_show_description_block == true)
        {
            block.hide_all_description_for_blocks();
        }        
        block.is_low_edit_panel = true;
        
        $('.edit_page_toolbar-inner').css('overflow', 'visible');
        
        setTimeout('block.edit_panel_low(' + $(obj).attr('id') + ')', 500);
        
        $(obj).addClass('moving-div');
        var new_block_html = $(obj).html();

        $('#edit_content_block_wrapper_' + $(obj).attr('id').substr(19)).append('<div class="edit_content_block jqueryon" id="temp_edit_content_block_' + $(obj).attr('id').substr(19) + '" title="' + $(obj).attr('title') + '" style="position: relative; margin-top: ' + (0 - obj.clientHeight - 2) + 'px">' + new_block_html + '</div>');
        $(".edit_content_block").draggable({
            start: function(event, ui) {
                block.start_moving_new_block(this)
            },
            stop: function(event, ui) {
                block.save_new_block(event, this)
            }
        });
        $(".jqueryonparent").droppable({ 
            accept: '.jqueryon,.edit_content_block', 
            hoverClass: 'hoverline', 
            drop: function(event, ui) {
              block.enablemoving(this)
            }       
        });

    }
    
    this.show_description_for_block = function(content_id)
    {
        if (block.is_show_description_block == true)
        {
            block.hide_all_description_for_blocks();
        }
        block.is_show_description_block = true;
        $('#show_description_for_block_' + content_id).hide();
        $('#hide_description_for_block_' + content_id).show();
        
        $.ajax({
            url	: app.createAbsoluteUrl('admin/page/Ajaxpro/getEditPanelBlockText'),
            error	: function ()
            {
                alert(T('Ошибка запроса'));
            },
            success	: function(data)
            {
                var html = '<a href="javascript: void(0)" class="hide_description_for_block_class" style="float: right; margin-top: -15px; margin-right: -15px;" id="hide_description_for_block_' + content_id + '_2" onClick="block.hide_description_for_block(' + content_id + ');"><span class="close">&nbsp;</span></a>' + data.html;
                $('#block_text_description').html(html);
                $('#block_text_description').animate({left : -491}, 1000, function(){});
            },
            data	: 
            {
                YII_CSRF_TOKEN  : app.csrfToken,
                content_id      : content_id
            },
            async		: false,
            cache		: false
        });        
 
    } 
    
    this.hide_description_for_block = function(content_id)
    {
        block.is_show_description_block = false;
        $('#hide_description_for_block_' + content_id).hide();
        $('#hide_description_for_block_' + content_id + '_2').hide();
        $('#show_description_for_block_' + content_id).show();
        $('#block_text_description').html('');
        $('#block_text_description').animate({left : 220}, 1, function(){});
    }

    this.hide_all_description_for_blocks = function()
    {
        block.is_show_description_block = false;
        $('.hide_description_for_block_class').hide();
        $('.show_description_for_block_class').show();
        $('#block_text_description').html('');
        $('#block_text_description').animate({left : 220}, 1, function(){});        
    }
    
    this.show_color_picker = function(content_id)
    {
        if ($('#color_picker_block_' + content_id).css('display') == 'block')
        {
            $('#color_picker_block_' + content_id).hide();
            $('#color_picker_block_' + content_id).css('float', 'right');
            $('#color_picker_block_' + content_id).css('height', 0);
        }
        else
        {
            if ($('span#rudimentary-picker_' + content_id).offset().left < 465)
            {
                $('#color_picker_block_' + content_id).css('float', 'left');
            }
            $('#color_picker_block_' + content_id).show();
            $('#color_picker_block_' + content_id).animate({height : "109px"}, 300, function(){});
        }
        
    } 

    this.colordivsave = function()
    {
        var color = $(this).css('background-color');
        var parent_id = parseInt($(this).parent().attr('id').substr(19));
        
        $.ajax({
            url	: app.createAbsoluteUrl('admin/page/Ajaxpro/saveBackgroundColor'),
            error	: function ()
            {
                alert(T('Ошибка запроса'));
            },
            success	: function(data)
            {
                $('#resizable_' + parent_id).css('background-color', color);
            },
            data	: 
            {
                YII_CSRF_TOKEN  : app.csrfToken,
                page_widget_id  : parent_id,
                color           : color
            },
            async		: false,
            cache		: false
        });        
    }
    
    this.open_descrotion_for_block = function(content_id)
    {
         var newWin = window.open("/admin/content/contents/view/id/" + content_id + "/layout/empty", "Preview", "width=1030,height=800,resizable=0,scrollbars=1,status=0,toolbar=0,menubar=0");        
         newWin.focus();
    }
    
    this.show_grid = function()
    {
        if ($('#show_grid').is(':checked'))
        {
            $('.jqueryonparent').addClass('block-grid');
        }
        else
        {
            $('.jqueryonparent').removeClass('block-grid');
        }
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
        $('.toolbar').animate({height : 590}, 800, function(){
            $('.toolbar .l-show').hide();
            $('.toolbar .l-hide').show();
            $('.toolbar .page-manager-content').show();
        });
    });
    
    $('.toolbar .l-hide').bind('click', function(){
        $('.toolbar').animate({height : 50}, 800, function(){
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

    $('#panel_manage').load('/' + lang + '/admin/page/pro/create/isEdit/1' + ' #panel_manage_inner', function(){
        $('input[name="Pages[layout]"]').val(layout);
        $('input[name="PagesLang[title]"]').val(title);
        $('input[name="PagesLang[name]"]').val(name);
        $('input[name="PagesLang[keywords]"]').val(keywords);
        $('textarea[name="PagesLang[description]"]').val(description);
        $('select#Pages_theme__id').val(theme_id);
        $('#pages-form').attr('action', app.createAbsoluteUrl('admin/page/pro/edit/id/' + id));
        $('#submit_button').attr('value', T('Применить'));
        $('input#url').val(url);
        $('input#page__id').val(id);
        $('input#PagesWidgets_page__id').val(id);
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
		
		/*$(function() {
			$('.page-template-select-layout').mCustomScrollbar({axis: "x", theme: "light-3"});
			$('.page-roles-table-wrapper').mCustomScrollbar({axis: "x", theme: "light-3"});
		});*/
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
    
	$('.page-template-select-layout').mCustomScrollbar({/*axis: "x", */theme: "light-3"});
    $('.page-roles-table-wrapper').mCustomScrollbar({/*axis: "x", */theme: "light-3"});
	
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
    
    content_manage();
    
    $('.hide_block_button').hide();
    $('span.edit').hide();
    $('span.up').hide();
    $('span.down').hide();
    $('span.delete').hide();    
    $('span.rudimentary-picker').hide();
    
    block = new Block();    

    $.each($('.jqueryon'), function(){
        block.is_out_of_border(this, false);
        block.recalculate_min_height_for_parent(this);
    });

    $(".jqueryonparent").resizable({
        handles: 's',
        minHeight: block.minheight_for_parent,
        stop: function(event, ui) {
            block.save_position_for_parent(this)
        }         
    });

    $(".jqueryonparent").droppable({ 
        accept: '.jqueryon,.edit_content_block',
        hoverClass: 'hoverline', 
        drop: function(event, ui) {
          block.enablemoving(this)
        }       
    });   
    
    $(".jqueryon").draggable({
        start: function(event, ui) {
            block.before_position_save(this)
        },
        stop: function(event, ui) {
            block.save_position(this, false)
        } 
    });
    
    $(".jqueryon").resizable({
        containment:'parent',
        handles: 's, w, n, e, se, sw, ne, nw',
        start: function(event, ui) {
            block.before_position_save(this)
        },        
        stop: function(event, ui) {
            block.save_position_after_resizable(this, true)
        } 
    });
 
    $('.ColorBlotch').bind('click', block.colordivsave);
    $(".jqueryon").mousemove(block.changebordertoactive);
    $(".jqueryon").mouseout(block.changebordertostatic);
    
    block.get_edit_panel_content();
    
    $('#PagesWidgets_object_id').change(block.get_content);
    
})


