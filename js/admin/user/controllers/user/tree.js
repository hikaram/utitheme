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
            location.href = app.createAbsoluteUrl('/admin/user/user/tree/subsession/' + data.subsession);
        },
        data	:
        {   
            YII_CSRF_TOKEN      : app.csrfToken,
            alias               : 'admin_user_tree',
            username            : $("input#filter_username").val(),
            last_name           : $("input#filter_last_name").val(),
            first_name          : $("input#filter_first_name").val(),
            second_name         : $("input#filter_second_name").val(), 
            email               : $("input#filter_email").val(),
            sponsor_username    : $("input#filter_sponsor_username").val(),            
            skype               : $("input#filter_skype").val()            
        },
        async		: false,
        cache		: false,
        type        : "POST"
    });
}

function insertData(login)
{
    $("input#filter_username").val(login);
    saveFilter();
}

function hideTableWrapper(key)
{
    if (key == 27)
    {
        $("div#list_choose").hide();
    }    
}

function hideTable()
{
    $("div#list_choose").hide();
}

$(function(){

    if ($('div#list_choose').val() == undefined)
    {
        $('#users').Tree({
            ajax : {
                url 	: app.createAbsoluteUrl('/admin/user/Ajaxuser/getStructure'),
                data	: {
                    YII_CSRF_TOKEN      : app.csrfToken
                },            
                node_attributes : {
                    userid  : 'node',
                    level   : 'level'
                }
            }
        });
    }
    
    $('body').keypress(function(event){
        hideTableWrapper(event.keyCode)
    });
    
    $('input[name="btn_filter"]').bind('click', function(){
        saveFilter();
    });   

    $('form').keypress(function(e){
        if (e.keyCode == 13){
            saveFilter();
        }
    });    
});
