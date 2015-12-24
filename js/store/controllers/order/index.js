function hideerrors()
{
    if (this.name.split('[')[1] == undefined)
    {
        var str = this.name.split('[');
    }
    else
    {
        var str = this.name.split('[')[1].split(']')[0];
    }
    
    if ($(this).val() != '')
    {
        $('div#' + str + 'error').empty();
    }    
}

function deleting(productId, el){

	$.ajax({
		url: '/store/ajaxbasket/delete/product/' + productId,
		dataType: 'json',
		data: {
			YII_CSRF_TOKEN : app.csrfToken
		},
		success: function(json){
			if (json.content === undefined){
				alert(T('Ошибка загрузки корзины'));
			}else{
				$('.top-cart-block').html('');
				$('.top-cart-block').append(json.content);
				getBasket();
			}
		}
	});
}

function getBasket()
{
	$.ajax({
		url: '/store/ajaxorder/GetBasketProducts',
		dataType: 'json',
		data: {
			YII_CSRF_TOKEN : app.csrfToken
		},
		success: function(json){
			if(json.isEmpty === false)
			{
				$('#basket').replaceWith(json.content);
			}
			else
			{
				location.replace('/store');
			}
		}
	});
}

function add(productId, count, button){

	if (count === undefined){
		count = 1;
	}

	if (button !== undefined){
		var oldButtonText = 'Купить';
	}

	$.ajax({
		async: true,
		url: '/store/ajaxbasket/add/product/' + productId,
		dataType: 'json',
		data: {
			YII_CSRF_TOKEN : app.csrfToken,
			count: count
		},
		beforeSend: function(xhr){
			if (button !== undefined){
				button.html(T('Добавление...'));
			}

		},
		success: function(json){
			if (json.content === undefined){
				alert(T('Ошибка загрузки корзины'));
			}else{
				$('.top-cart-block').html('');
				$('.top-cart-block').append(json.content);
				
			}
		},
		complete: function(xhr){
			if (button !== undefined){
				button.html(oldButtonText);
			}
		}
	});
	
	return true;

}

function getSponsorInfo()
{

    temptime = 0;
    var login = $('input#sponsor_login').val();
    var id = $('input#OrderLimitedRegistrationForm_sponsor__id').val();
    
    $.ajax({
        url	: app.createAbsoluteUrl('register/Ajaxregister/getSponsorInfo'),
        error	: function ()
        {
            alert(T('Ошибка запроса'));
        },
        success	: function(data)
        {
            $('.basket-products-loader').hide();
            if (login == '')
            {
                $('input#sponsor_login').val(data.login);
            }
            else if (data.id == '')
            {
				$('input#sponsor__error').fadeIn(500);
				$('input#sponsor_first_name').fadeOut(500);
				$('input#sponsor_last_name').fadeOut(500);
                $('input#sponsor__error').val('Пользователь с логином "' + login + '" не найден');
            }
            else
            {	
				$('input#sponsor__error').fadeOut(500);
				$('input#sponsor_first_name').fadeIn(500);
				$('input#sponsor_last_name').fadeIn(500);
                $('input#sponsor__error').val();
            }
            $('input#sponsor_first_name').val(data.first_name);
            $('input#sponsor_last_name').val(data.last_name);
            $('input#OrderLimitedRegistrationForm_sponsor__id').val(data.id);
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

$(function(){

 $(document).on('click', '.del-goods', function(e){
        e.preventDefault();
        deleting($(this).data('product-id'), e);
   });

    $(document).on('click', '.quantity-up', function(w){    
        w.preventDefault();
        productId = $(this).parent().parent().parent().data('product-id');
        var result = add(productId, 1, undefined);
        if(result === true)
        {
            getBasket();
        }
    });

    $(document).on('click', '.quantity-down', function(w){
    
        w.preventDefault();
        productId = $(this).parent().parent().parent().data('product-id');
        $.ajax({
            url: '/store/ajaxbasket/lower/product/' + productId,
            dataType: 'json',
            data: {
                YII_CSRF_TOKEN : app.csrfToken
            },
            success: function(json){
                if (json.content === undefined){
                    alert(T('Ошибка загрузки корзины'));
                }else{
                    $('.top-cart-block').html('');
                    $('.top-cart-block').append(json.content);
                    getBasket();
                }
            }
        });
    });

    $('input#sponsor_login').bind('blur', getSponsorInfo);    
    $('.form-control').bind('blur', hideerrors);

    $('.panel-heading').bind('click', function(){
        if (!$(this).hasClass('no-actions'))
        {
            if (!$(this).siblings('.panel-collapse').hasClass('in'))
            {
                $('input:radio[name="Horders[user_mode]"]').removeAttr('checked');
                $(this).siblings('.panel-collapse').find('input:radio[name="Horders[user_mode]"]').attr('checked', 'checked');
            }
            else
            {
                $(this).siblings('.panel-collapse').find('input:radio[name="Horders[user_mode]"]').removeAttr('checked');
            }
        }
    });

    var isTabOpen = false;

    $.each($('.errorMessage'), function(){
        if ($(this).html() != '')
        {
            if (!$(this).closest('.panel-default').hasClass('no-actions'))
            {
                $('input:radio[name="Horders[user_mode]"]').removeAttr('checked');
                $(this).closest('.panel-default').find('input:radio[name="Horders[user_mode]"]').attr('checked', 'checked');    
            }

            $('.panel-collapse').collapse('hide');
            $(this).closest('.panel-default').find('.panel-collapse').collapse('show');
            isTabOpen = true;
            return false;
        }        
    });

    if ((!isTabOpen) && ($('.basket-error-info-wrapper').length > 0))
    {
        $('.panel-collapse').collapse('hide');
        $('.basket-error-info-wrapper').closest('.panel-default').find('.panel-collapse').collapse('show');
        isTabOpen = true;
        return false;
    };

    $('input:radio').bind('change', function(){
        $(this).closest('.radiolist-wrapper').find('span').removeClass('checked');
        $(this).parent().addClass('checked');
    });

    $('input:radio[name="Horders[store_pay_types__id]"]').bind('change', function(){
        $(this).closest('.radiolist-wrapper').find('span').removeClass('checked');
        $(this).parent().addClass('checked');

        if(($(this).val() != payMainWalletId) && ($(this).val() != payBonusWalletId))
        {
            $('.finpassord-container').hide();
        }
        else
        {
            $('.finpassord-container').show();
        }        
    });

    var checkedPaymentType = $('input:radio[name="Horders[store_pay_types__id]"]:checked').val();

    if ((checkedPaymentType != undefined) && ((checkedPaymentType == payMainWalletId) || (checkedPaymentType == payBonusWalletId)))
    {
        $('.finpassord-container').show();
    }

});