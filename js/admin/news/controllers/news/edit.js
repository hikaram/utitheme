function getSkinsConfig()
{
	$('#tr_show_at_home').hide();
	$('#tr_show_at_office').hide();
    $('#tr_show_source').hide();
    $('#tr_show_source_title').hide();
	
    $.ajax({
        url	: app.createAbsoluteUrl('admin/news/Ajaxnews/getSkinsConfig'),
        error	: function ()
        {
            alert(T('Ошибка запроса'));
        },
        success	: function(data)
        {
            if (data.error == true)
            {
                alert(T('Введите корректные данные!'));
                return;
            }
			
			if (data.show_at_home == true)
			{	
				$('#tr_show_at_home').show();
			}
			
			if (data.show_at_office == true)
			{	
				$('#tr_show_at_office').show();
			}
            
			if (data.show_source == true)
			{	
				$('#tr_show_source').show();
			}
            
			if (data.show_source_title == true)
			{	
				$('#tr_show_source_title').show();
			}            
            
            setDatepicker(data.isAnyDates);
            
        },
        data	: 
        {
            YII_CSRF_TOKEN  : app.csrfToken,
            newstype        : $('select#News_news_types__id').val()
        },
        async		: false,
        cache		: false
    }); 

}


function setDatepicker(isAnyDates)
{
    if (isAnyDates > 0)
    {
        $("input.datepicker").datetimepicker({
            language: 'ru',
            autoclose: true
        });
    }
    else
    {
        $("input#News_publication_from").datetimepicker({
            language: 'ru',
            autoclose: true,
            startDate: new Date(),
            endDate: $("input#News_publication_end").val()
        }).change(dateFromChanged);   

        $("input#News_publication_end").datetimepicker({
            language: 'ru',
            autoclose: true,
            startDate: $("input#News_publication_from").val() == '' ? new Date() : $("input#News_publication_from").val(),
            endDate: "2024-12-12 00:00"
        }).change(dateEndChanged);   
    }
}

function dateFromChanged(ev) {
    $('input#News_publication_end').datetimepicker('setStartDate', $("input#News_publication_from").val());
}

function dateEndChanged(ev) {
    $('input#News_publication_from').datetimepicker('setEndDate', $("input#News_publication_end").val());
}

function ShowDatetimepickerFrom()
{
   $("input#News_publication_from").datetimepicker('show');
}

function ShowDatetimepickerEnd()
{
   $("input#News_publication_end").datetimepicker('show');
}

function after_is_visible_change()
{
    if ($('#News_is_visible').attr('checked') == 'checked')
    {
        $('.view_allowed').hide();
        $('.view_denied').show();
        $('div#visible').show();
        $('div#not_visible').hide();
    }
    else
    {
        $('.view_allowed').show();
        $('.view_denied').hide();
        $('div#visible').hide();
        $('div#not_visible').show();
    }
} 

$(function(){

    $('script#locale').attr('src', $('input#scriptSrc').val()).on('load', function () {
        getSkinsConfig();
    });


    $('select#News_news_types__id').bind('change', getSkinsConfig);

    $('#td_upload_link_change').bind('click', function(){
        $('#td_upload_photo').hide();
        $('#td_upload_link_change').hide();
        $('#td_upload_form_block').show();
        $('#td_upload_link_cancel').show();
    });
    
    $('#td_upload_link_cancel').bind('click', function(){
        $('input#news').val(null);
        $('#td_upload_form_block').hide();
        $('#td_upload_link_cancel').hide();
        $('#td_upload_photo').show();
        $('#td_upload_link_change').show();
    });

    after_is_visible_change();

    $('#News_is_visible').change(function(){
        after_is_visible_change();
    });
})