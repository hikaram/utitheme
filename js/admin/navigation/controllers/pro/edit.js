function changeLoadType(object)
{
    $('div.loadType').hide();
    $('div#loadType_' + $(object).val()).show();
    
    if ($(object).val() == 'new')
    {
        $('div#picturePreview').hide();
    }
    else
    {
        $('div#picturePreview').show();
    }
    
}

$(function(){

    var http = document.location.protocol + '//';
    var http_host = http + document.location.host;
    
    after_is_visible_change();
    after_object_alias_change(true);
    after_parent_id_change();
    
    $('#td_upload_link_change').bind('click', function(){
        $('#td_upload_photo').hide();
        $('#td_upload_link_change').hide();
        $('#td_upload_link_delete').hide();
        $('#td_upload_form_block').show();
        $('#td_upload_link_cancel').show();
        $('input#isRewrite').val(1);
    });
    
    $('#td_upload_link_cancel').bind('click', function(){
        $('input#news').val(null);
        $('#td_upload_form_block').hide();
        $('#td_upload_link_cancel').hide();
        $('#td_upload_photo').show();
        $('#td_upload_link_change').show();
        $('#td_upload_link_delete').show();
        $('input#isRewrite').val(0);
    })    
    
    
    $('#Navigation_parent_id').change(function(){
        after_parent_id_change(1);
    });
    
    $('#Navigation_object_alias').change(function(){
        after_object_alias_change(false);
    })
    
    $('#Navigation_is_visible').change(function(){
        after_is_visible_change();
    });
    
    function after_is_visible_change()
    {
        if ($('#Navigation_is_visible').attr('checked') == 'checked')
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
    
    function after_parent_id_change(is_reset_sort_no)
    {
        if (is_reset_sort_no == undefined)
        {
            is_reset_sort_no = 0;
        }

        $.ajax({
        	url	: app.createAbsoluteUrl('admin/navigation/ajaxlite/children'),
            type : 'POST',
            error	: function ()
            {
                alert('Ошибка запроса');
            },
            success	: function(data)
            {
                $('#Navigation_sort_no').html(data.content);
            },
            data	:
            {  
                parent_id : $("#Navigation_parent_id").val(),
                id : $("#Navigation_id").val(),
                lang : $('#NavigationLang_lang').val(),
                YII_CSRF_TOKEN : $('input[name=YII_CSRF_TOKEN]').val(),
                is_reset_sort_no : is_reset_sort_no
            },
            async		: false,
            cache		: false
		});        
    }
    
    function after_object_alias_change(byUpload)
    {
        $('.urlExample').hide();
        
        if ($('#Navigation_object_alias').val() == 'catalog')
        {
            $('#Navigation_url').closest('.form-group').hide();
            $('#Navigation_object_id').closest('.form-group').hide();
            $('#Navigation_target').closest('.form-group').hide();
        }
        else
        {
            $('#Navigation_url').closest('.form-group').show();
            $('#Navigation_object_id').closest('.form-group').show();
            $('#Navigation_target').closest('.form-group').show();
        }
        
        if ($('#Navigation_object_alias').val() == 'pages')
        {
            $('#Navigation_object_id').closest('.form-group').show();
        }
        else
        {
            $('#Navigation_object_id').closest('.form-group').hide();
        }
        
        if ($('#Navigation_object_alias').val() == 'external_link')
        {
            $('#urlExampleExternal').show();
            $('#Navigation_url_prefix').html('');
            if ($('#Navigation_url').val() == '')
            {
                $('#Navigation_url').val(http);
            }
            else
            {
                if ($('#Navigation_url').val().indexOf(http) == -1)
                {
                    $('#Navigation_url').val(http + $('#Navigation_url').val());
                }
                /*
                if ($('#Navigation_url').val().indexOf(http_host, 0) == 0)
                {
                    $('#Navigation_url').val(
                        $('#Navigation_url').val().replace(http_host, http)
                    )
                }*/
            }
        }
        
        if ($('#Navigation_object_alias').val() == 'link' || $('#Navigation_object_alias').val() == 'pages')
        {
            $('#urlExampleInternal').show();
            $('#Navigation_url_prefix').html(http_host + '/');
            
            var widthBlock = parseInt($('#Navigation_url_prefix').css('width'));
            if(!byUpload)
            {
                $('#Navigation_url').css('paddingLeft', (widthBlock + 18) + 'px');
            }
            else
            {
                $('#Navigation_url').css('paddingLeft', (widthBlock + 28) + 'px');
            }
            
            if ($('#Navigation_url').val() !== '')
            {
                if ($('#Navigation_url').val().indexOf(http, 0) == 0)
                {
                    $('#Navigation_url').val(
                        $('#Navigation_url').val().replace(http, '')
                    );
                }
            }
            
            $('#Navigation_url').focus();
        }
        else
        {
            $('#Navigation_url').css('paddingLeft', '12px');
        }
    }

})

function sendForm()
{
    var form = $('#navigation-form');

    var term = form.find('input');
    
    var params = {};
    term.each(function(index){
        params[$(this).attr('name')] = $(this).val();
    })
    
    var term = form.find('select');
    
    term.each(function(index){
        params[$(this).attr('name')] = $(this).val();
    })
    
    params['backurl'] = location.href;

    $.post($('#ajaxurl').val(), params)
    .done(function(result){
        if (result.subsession)
        {
            location.href = '/admin/page/lite/create/subsession/' + result.subsession;
        }
        else
        {
            alert(T('Произошла ошибка, не найден subsession'));
        }
    });

}

