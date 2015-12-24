function changePageSize()
{
    var value   = $('#pageSizeSeletor option:selected').val();
    var dir     = $('input#dirField').val();

    location.href=app.createAbsoluteUrl('admin/news/news/index/unit/' + value + '/dir/' + dir);
}

function setDatepicker()
{
    $("input.storedatepicker").datepicker({
        language: 'ru',
        autoclose: true
    });

    $("input#created_at_from").datepicker({
        language: 'ru',
        autoclose: true,
        startDate: new Date(),
        endDate: $("input#created_at_to").val()
    }).change(dateFromChanged);   

    $("input#created_at_to").datepicker({
        language: 'ru',
        autoclose: true,
        startDate: $("input#created_at_from").val() == '' ? new Date() : $("input#created_at_from").val(),
        endDate: "2024-12-12"
    }).change(dateEndChanged);
}

function dateFromChanged(ev) {
    $('input#created_at_to').datepicker('setStartDate', $("input#created_at_from").val());
}

function dateEndChanged(ev) {
    $('input#created_at_from').datepicker('setEndDate', $("input#created_at_to").val());
}

$(function(){
    
    $("#content_filter_header").click(function(){
        $("#content_filter").toggle(500);
    });

    $('script#locale').attr('src', $('input#scriptSrc').val()).on('load', function () {
        setDatepicker();
    });

    $('#filterform').on('submit', function(e){
        
        e.preventDefault();

        $('input[type="button"]').attr('disabled', 'disabled');
        
        $.ajax({
            url	: app.createAbsoluteUrl('admin/news/Ajaxnews/saveFilter'),
            type : 'POST',
            error	: function ()
            {
                $('input[type="button"]').removeAttr('disabled');
                alert(T('Ошибка запроса'));
            },
            success	: function(data)
            {
                location.href = '/' + app.langUri + '/admin/news/news/index/subsession/' + data.subsession;
            },
            data	    : $('form#filterform').serialize() + '&YII_CSRF_TOKEN='+app.csrfToken+'&alias=news_default_index',
            async		: false,
            cache		: false
        });
    }); 	

});



