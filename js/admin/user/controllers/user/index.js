function changePageSize()
{
    var value = $('#pageSizeSeletor option:selected').val();
    location.href=app.createAbsoluteUrl('admin/user/user/index/unit/' + value);
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

function saveFilter()
{  
    $('input[type="button"]').attr('disabled', 'disabled');
    $.ajax({
        url	: app.createAbsoluteUrl('admin/user/Ajaxuser/saveFilter'),
        error	: function ()
        {
            $('input[type="button"]').removeAttr('disabled');
            alert(T('Ошибка запроса'));
        },
        success	: function(data)
        {
            location.href = app.createAbsoluteUrl('/admin/user/user/index/subsession/' + data.subsession);
        },
        data	:
        {   
            YII_CSRF_TOKEN      : app.csrfToken,
            alias               : 'admin_user_index',
            username            : $("input#filter_username").val(),
            last_name           : $("input#filter_last_name").val(),
            first_name          : $("input#filter_first_name").val(),
            second_name         : $("input#filter_second_name").val(), 
            email               : $("input#filter_email").val(),
            sponsor_username    : $("input#filter_sponsor_username").val(),            
            skype               : $("input#filter_skype").val(),           
            created_at_from     : $("input#filter_created_at_from").val(),
            created_at_to       : $("input#filter_created_at_to").val()
        },
        async		: false,
        cache		: false,
        type        : "POST"
    });
}

$(function(){

    $("#content_filter_header").click(function(){
        $("#content_filter").toggle(500);
    });

    $('script#locale').attr('src', $('input#scriptSrc').val()).on('load', function () {
        setDatepicker();
    });

    $('input[name="btn_filter"]').bind('click', function(){
        saveFilter();
    });
    
    $('form').keypress(function(e){
        if (e.keyCode == 13){
            saveFilter();
        }
    });    
})