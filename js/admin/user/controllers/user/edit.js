function editPhoto()
{
    $('div#link_edit').hide();
    $('div#widget_upload').css('display', 'inline-block');
    $('div#link_hide').show();
    
}

function hidePhoto()
{
    $('div#link_hide').hide();
    $('div#widget_upload').hide();
    $('div#link_edit').show();
}

function deletePhoto(user_id, picture)
{
	if (!confirm(T('Удалить текущее изображение пользователя?')))
	{
		return;
	}
    $.ajax({
        url	: app.createAbsoluteUrl('admin/user/Ajaxuser/deletePicture'),
        error	: function ()
        {
            alert(T('Ошибка запроса'));
        },
        success	: function(data)
        {
            if (data.error != undefined)
            {
                alert(data.error);
                return;
            }
			
            $('div#picture_inner').html(data.html);

        },
        data	: 
        {
            YII_CSRF_TOKEN  : app.csrfToken,
			user_id			: user_id,
			picture			: picture
        },
        async		: false,
        cache		: false
    });
}

function img_load(user_id)
{
    $.ajax({
        url	: app.createAbsoluteUrl('admin/user/Ajaxuser/getNewPicture'),
        error	: function ()
        {
            alert(T('Ошибка запроса'));
        },
        success	: function(data)
        {
            if (data.error != undefined)
            {
                alert(data.error);
                return;
            }
            
            $('#picture_inner').html(data.html);

        },
        data	: 
        {
            YII_CSRF_TOKEN  : app.csrfToken,
			user_id			: user_id
        },
        async		: false,
        cache		: false
    });
}
function setDatepicker()
{

}

var temptime;

function getSponsorInfoWrapper()
{
    if (temptime != 0)
    {
        return;
    }
    temptime = 2000;
    setTimeout(getSponsorInfo, temptime);
}

function getSponsorInfo()
{
    temptime = 0;
    var login = $('input#sponsor_login').val();
    var id = $('input#ProfileAdmin_sponsor__id').val();
    
    $.ajax({
        url	: app.createAbsoluteUrl('admin/user/Ajaxuser/getSponsorInfo'),
        error	: function ()
        {
            alert(T('Ошибка запроса'));
        },
        success	: function(data)
        {
            
            if (login == '')
            {
                $('input#sponsor_login').val(data.login);
            }
            else if (data.id == '')
            {
                $('#sponsor__iderror').html(T('Пользователь с логином') + ' "' + login + '" ' + T('не найден'));
            }
            else
            {
                $('#sponsor__iderror').empty();
            }
            $('#sponsor_first_name').html(data.first_name);
            $('#sponsor_last_name').html(data.last_name);
            $('#sponsor_second_name').html(data.second_name);
            $('input#ProfileAdmin_sponsor__id').val(data.id);
        },
        data	: 
        {
            YII_CSRF_TOKEN  : app.csrfToken,
            login           : login,
            id              : id
        },
        async		: false,
        cache		: false
    });
}

function password_confirm ()
{
    if ($('#UsersAdmin_password_confirm').val() == $('#UsersAdmin_password').val())
    {
        $('#UsersAdmin_password_confirm').css('background-color', '#D9FFD6');
        $('#UsersAdmin_password').css('background-color', '#D9FFD6');
    }
    else
    {
        $('#UsersAdmin_password').css('background-color', '#FFD1D1');
        $('#UsersAdmin_password_confirm').css('background-color', '#FFD1D1');
    }

    if ($('#UsersAdmin_password_confirm_w').val() == $('#UsersAdmin_password_w').val())
    {
        $('#UsersAdmin_password_confirm_w').css('background-color', '#D9FFD6');
        $('#UsersAdmin_password_w').css('background-color', '#D9FFD6');
    }
    else
    {
        $('#UsersAdmin_password_w').css('background-color', '#FFD1D1');
        $('#UsersAdmin_password_confirm_w').css('background-color', '#FFD1D1');
    }

    $('.noPasswordEffects').css('background-color', '');
}

function finpassword_confirm ()
{
    if ($('#UsersAdmin_finpassword_confirm').val() == $('#UsersAdmin_finpassword').val())
    {
        $('#UsersAdmin_finpassword_confirm').css('background-color', '#D9FFD6');
        $('#UsersAdmin_finpassword').css('background-color', '#D9FFD6');
    }
    else
    {
        $('#UsersAdmin_finpassword').css('background-color', '#FFD1D1');
        $('#UsersAdmin_finpassword_confirm').css('background-color', '#FFD1D1');
    }

    if ($('#UsersAdmin_finpassword_confirm_w').val() == $('#UsersAdmin_finpassword_w').val())
    {
        $('#UsersAdmin_finpassword_confirm_w').css('background-color', '#D9FFD6');
        $('#UsersAdmin_finpassword_w').css('background-color', '#D9FFD6');
    }
    else
    {
        $('#UsersAdmin_finpassword_w').css('background-color', '#FFD1D1');
        $('#UsersAdmin_finpassword_confirm_w').css('background-color', '#FFD1D1');
    }

    $('.noPasswordEffects').css('background-color', '');
}

function showPasswordNewRecord(object)
{
    var checked = $(object).is(':checked');
    var passId = $(object).attr('passId');

    if (checked)
    {
        var value = $('input#UsersAdmin_' + passId + '_w').val();
        $('input#UsersAdmin_' + passId + '_n').val(value);
        $('tr#' + passId + 'sDesc_' + passId).hide();
        $('tr#' + passId + 'sFields_' + passId).hide();
        $('tr#' + passId + 'Show_' + passId).show();
    }
    else
    {
        var value = $('input#UsersAdmin_' + passId + '_n').val();
        $('input#UsersAdmin_' + passId + '_w').val(value);
        $('tr#' + passId + 'Show_' + passId).hide();
        $('tr#' + passId + 'sDesc_' + passId).show();
        $('tr#' + passId + 'sFields_' + passId).show();
    }
}

function hideerrors(object)
{
    var str = $(object).attr('name').split('[')[1].split(']')[0];
    if ($(object).val() != '')
    {
        $('#' + str + 'error').empty();
    }

    $(object).removeClass('error');
}

function showAnserDescription()
{
    var questionId = $('select#ProfileAdmin_question').val();
    if (questionId === undefined)
    {
        return;
    }
    $('div.answer-desc').hide();

    $('div#answer-desc-' + questionId).show();
}

function showPassword()
{
    $('#password_static').hide();
    $('#password_dyn1').show();
    $('#password_dyn2').show();
    $('#password_dyn3').show();
    $('#UsersAdmin_password').val(null);
    $('#UsersAdmin_password_confirm').val(null);
}

function hidePassword()
{
    $('#password_dyn1').hide();
    $('#password_dyn2').hide();
    $('#password_dyn3').hide();
    $('#password_static').show();
    $('#UsersAdmin_password').val(null);
    $('#UsersAdmin_password_confirm').val(null);
}

function showFinPassword()
{
    $('#finpassword_static').hide();
    $('#finpassword_dyn1').show();
    $('#finpassword_dyn2').show();
    $('#finpassword_dyn3').show();
    $('#UsersAdmin_finpassword').val(null);
    $('#UsersAdmin_finpassword_confirm').val(null);
}

function hideFinPassword()
{
    $('#finpassword_dyn1').hide();
    $('#finpassword_dyn2').hide();
    $('#finpassword_dyn3').hide();
    $('#finpassword_static').show();
    $('#UsersAdmin_finpassword').val(null);
    $('#UsersAdmin_finpassword_confirm').val(null);
}

$(function(){
    
    temptime = 0;

    setDatepicker();
    if ($('input#sponsor_login').val() != undefined)
    {
        getSponsorInfo();
    }

    $('#UsersAdmin_password_confirm').keyup(password_confirm);
    $('#UsersAdmin_finpassword_confirm').keyup(finpassword_confirm);
    $('#UsersAdmin_password').keyup(password_confirm);
    $('#UsersAdmin_finpassword').keyup(finpassword_confirm);

    $('#UsersAdmin_password_confirm_w').keyup(password_confirm);
    $('#UsersAdmin_finpassword_confirm_w').keyup(finpassword_confirm);
    $('#UsersAdmin_password_w').keyup(password_confirm);
    $('#UsersAdmin_finpassword_w').keyup(finpassword_confirm);
    
    $('.forminput').bind('blur', function(){
        hideerrors(this);
    });

    $('select.cities-widget-country').bind('change', function(){
        hideerrors(this);
    });

    $('select.cities-widget-region').bind('change', function(){
        hideerrors(this);
    });

    $('select.cities-widget-city').bind('change', function(){
        hideerrors(this);
    });

    $('input#showPasswordCheckBox').bind('change', function() {
        showPasswordNewRecord(this);
    });

    $('input#showFinPasswordCheckBox').bind('change', function() {
        showPasswordNewRecord(this);
    });

//  AlexXanDOR Динамическая подгрузка данных спонсора с двухсекундной задержкой 
//    $('input#sponsor_login').bind('keyup', getSponsorInfoWrapper);


//  AlexXanDOR Динамическая подгрузка данных спонсора при расфокусировке поля "Логин спонсора"
    $('input#sponsor_login').bind('blur', getSponsorInfo);


    $('select#ProfileAdmin_question').bind('change', function(){
        showAnserDescription();
    });
    showAnserDescription();

});
