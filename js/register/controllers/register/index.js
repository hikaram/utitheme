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
    var id = $('input#ProfileRegister_sponsor__id').val();
    
    $.ajax({
        url	: app.createAbsoluteUrl('register/Ajaxregister/getSponsorInfo'),
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
                $('td#sponsor__iderror').text(T('Пользователь с логином') + ' "' + login + '" не найден');
            }
            else
            {
                $('td#sponsor__iderror').empty();
            }
            $('#sponsor_first_name').html(data.first_name);
            $('#sponsor_last_name').html(data.last_name);
			$('#sponsor_second_name').html(data.second_name);
            $('input#ProfileRegister_sponsor__id').val(data.id);
            if ($('span#span_sponsor_login').val() != undefined)
            {
			
                $('span#span_sponsor_login').html(data.login);
				
            }
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
    if ($('#UsersRegister_password_confirm.live').val() == $('#UsersRegister_password').val())
    {
        $('#UsersRegister_password_confirm.live').css('background-color', '#D9FFD6');
        $('#UsersRegister_password.live').css('background-color', '#D9FFD6');
    }
    else
    {
        $('#UsersRegister_password.live').css('background-color', '#FFD1D1');
        $('#UsersRegister_password_confirm.live').css('background-color', '#FFD1D1');
    }

    if ($('#UsersRegister_password_confirm_w.live').val() == $('#UsersRegister_password_w').val())
    {
        $('#UsersRegister_password_confirm_w.live').css('background-color', '#D9FFD6');
        $('#UsersRegister_password_w.live').css('background-color', '#D9FFD6');
    }
    else
    {
        $('#UsersRegister_password_w.live').css('background-color', '#FFD1D1');
        $('#UsersRegister_password_confirm_w.live').css('background-color', '#FFD1D1');
    }	
	
	$('.noPasswordEffects').css('background-color', '');
}

function finpassword_confirm ()
{
    if ($('#UsersRegister_finpassword_confirm.live').val() == $('#UsersRegister_finpassword').val())
    {
        $('#UsersRegister_finpassword_confirm.live').css('background-color', '#D9FFD6');
        $('#UsersRegister_finpassword.live').css('background-color', '#D9FFD6');
    }
    else
    {
        $('#UsersRegister_finpassword.live').css('background-color', '#FFD1D1');
        $('#UsersRegister_finpassword_confirm.live').css('background-color', '#FFD1D1');
    }
	
    if ($('#UsersRegister_finpassword_confirm_w.live').val() == $('#UsersRegister_finpassword_w').val())
    {
        $('#UsersRegister_finpassword_confirm_w.live').css('background-color', '#D9FFD6');
        $('#UsersRegister_finpassword_w.live').css('background-color', '#D9FFD6');
    }
    else
    {
        $('#UsersRegister_finpassword_w.live').css('background-color', '#FFD1D1');
        $('#UsersRegister_finpassword_confirm_w.live').css('background-color', '#FFD1D1');
    }	
	
	$('.noPasswordEffects').css('background-color', '');
}

function showPassword(object)
{
	var checked = $(object).is(':checked');
	var passId = $(object).attr('passId');
	
	if (checked)
	{
		var value = $('input#UsersRegister_' + passId + '_w').val();
		$('input#UsersRegister_' + passId + '_n').val(value);
		$('#' + passId + 'sDesc_' + passId).hide();
		$('#' + passId + 'sFields_' + passId).hide();
		$('#' + passId + 'Show_' + passId).show();	
	}
	else
	{
		var value = $('input#UsersRegister_' + passId + '_n').val();
		$('input#UsersRegister_' + passId + '_w').val(value);
		$('#' + passId + 'Show_' + passId).hide();
		$('#' + passId + 'sDesc_' + passId).show();
		$('#' + passId + 'sFields_' + passId).show();
	}
	
	password_confirm();
	finpassword_confirm();
}

function hideerrors(object)
{
    var name = $(object).attr('name');
    
    if (name == 'sponsor_login')
    {
        var str = 'sponsor__id';
    }
    else
    {
        var str = name.split('[')[1].split(']')[0];
    }
    
    
    if ($(object).val() != '')
    {
        $('span#' + str + 'error').empty();
    }

    $(object).parent().parent().parent().removeClass('has-error');
}

function edit()
{
    if($(".denamic").css('display') == 'none')
    {
        $(".static").hide();
        $(".denamic").show();
    }
    else
    {
        $(".static").show();
        $(".denamic").hide();
        
    }
}

function showAnserDescription()
{
	var questionId = $('select#ProfileRegister_question').val();
	if (questionId === undefined)
	{
		return;
	}
	$('div.answer-desc').hide();
	
	$('div#answer-desc-' + questionId).show();
}

function showTip(object)
{
	$('.form-info').stop();
	if ($(object).attr('title') != undefined) {
		$('#form-text-info').html($(object).attr('title'));
		$('.form-info').animate({
			opacity : 1,
			top : $(object).offset().top - 305,
			
		}, 1000);
	}
	else {
		$('.form-info').animate({
			opacity : 0
		}, 1000);
	}
}

$(function(){
    
    temptime = 0;
	
	if ($('#ProfileRegister_country__id').length > 0)
	{
		$('#ProfileRegister_country__id').change(get_regions);
	}
	
	if ($('#ProfileRegister_country__id').length > 0)
	{
		$('#ProfileRegister_region__id').change(get_cities);
    }
	
    if (($('input#sponsor_login').val() != undefined) || ($('span#span_sponsor_login').val() != undefined))
    {
        getSponsorInfo();
    }
    
	
	//Если на загруженной странице пароли не совпадает, то подсвечиваем
	password_confirm();
	finpassword_confirm();
	
	//Привязка событий на случай если пароли не совпадают
    $('#UsersRegister_password_confirm').keyup(password_confirm);
    $('#UsersRegister_finpassword_confirm').keyup(finpassword_confirm);
    $('#UsersRegister_password').keyup(password_confirm);
    $('#UsersRegister_finpassword').keyup(finpassword_confirm);
	
    $('#UsersRegister_password_confirm_w').keyup(password_confirm);
    $('#UsersRegister_finpassword_confirm_w').keyup(finpassword_confirm);
    $('#UsersRegister_password_w').keyup(password_confirm);
    $('#UsersRegister_finpassword_w').keyup(finpassword_confirm);	
    
    $('.form-control').bind('blur', function(){
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
	
	//при загрузке страницы обрабатываем чекбокс
	showPassword($('#showPasswordCheckBox'));
	showPassword($('#showFinPasswordCheckBox'));
	
	$('input#showPasswordCheckBox').bind('change', function() {
		showPassword(this);
	});

    $('input#showFinPasswordCheckBox').bind('change', function() {
        showPassword(this);
    });

//  //  AlexXanDOR Динамическая подгрузка данных спонсора с двухсекундной задержкой 
//    $('input#sponsor_login').bind('keyup', getSponsorInfoWrapper);


//  AlexXanDOR Динамическая подгрузка данных спонсора при расфокусировке поля "Логин спонсора"
    $('input#sponsor_login').bind('blur', getSponsorInfo);

	$('select#ProfileRegister_question').bind('change', function(){
		showAnserDescription();
	});
	showAnserDescription();

	//плавающая всплывающая подсказка
    $('#users-form input').bind('focusin', function() {
		showTip(this);
    });
		//плавающая всплывающая подсказка отдельно на кнопку календаря				
	$('.date-picker button').click(function(){
		$('.form-info').stop();
		$('#form-text-info').html($('.date-picker input').attr('title'));
		$('.form-info').animate({
			opacity : 1,
			top : $(this).offset().top - 305,
			
		}, 1000);
	})
	
    $('.from_register input').bind('focusout', function() {
        var element = 'div[name="' + $(this).attr('name') + '"]';
        $(element).animate({'opacity': 0});
    });
		
});
