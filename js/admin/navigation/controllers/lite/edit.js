$(function(){
    after_object_alias_change();
    after_parent_id_change();
    
    $('#Navigation_parent_id').change(function(){
        after_parent_id_change(1);
    });
    
    var http = document.location.protocol + '//';
    var http_host = http + document.location.host;
    
    $('#Navigation_object_alias').change(function(){
        after_object_alias_change();
    })
    
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
                alert(T('Ошибка запроса'));
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
    
    function after_object_alias_change()
    {
		if ($('#Navigation_object_alias').val()) {
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
				$('#Navigation_url_prefix').html('');
				if ($('#Navigation_url').val() == '')
				{
					$('#Navigation_url').val(http);
				}
				else
				{
					if ($('#Navigation_url').val().indexOf(http, 0) == -1)
					{
						$('#Navigation_url').val(http + $('#Navigation_url').val());
					}
					if ($('#Navigation_url').val().indexOf(http_host, 0) == 0)
					{
						$('#Navigation_url').val(
							$('#Navigation_url').val().replace(http_host, http)
						)
					}
				}
			}
			
			if ($('#Navigation_object_alias').val() == 'link' || $('#Navigation_object_alias').val() == 'pages')
			{
				$('#Navigation_url_prefix').html(http_host);
				
				if ($('#Navigation_url').val() !== '')
				{
					if ($('#Navigation_url').val().indexOf(http, 0) == 0)
					{
						$('#Navigation_url').val(
							$('#Navigation_url').val().replace(http, '')
						);
					}
					
				}
			}
		}
    }
    
})


