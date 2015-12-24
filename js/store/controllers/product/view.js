$(function(){
	var comment = parseInt(location.hash.substr(1));

	if ((!isNaN(comment)) && (comment > 0))
	{
		$('.nav-tabs a[href="#Reviews"]').tab('show');
	}

    $('#rateit').bind('rated', function(){ 
        recalcProductRatio($(this).rateit('value'));    
    });

});

function recalcProductRatio(setting)
{
	$('.header-review-inner').hide();
	$('.review-comment-wrapper').hide();

	$.ajax({
		url: '/store/ajaxproduct/stat',
		dataType: 'json',
		data: {
			YII_CSRF_TOKEN 	: app.csrfToken,
			productId 		: $('#Prodid').data("product-id"),
            setting         : setting
		},
		success: function(json){
            $('#total-rateit').rateit('value', json.rating);
		}
	});
}

function comment_form_show()
{
	$('.nav-tabs a[href="#Reviews"]').tab('show');
	setTimeout(scrollToComment, 200);
}

function scrollToComment()
{
	$('html,body').stop().animate({ scrollTop: $('.post-comment').offset().top }, 500);
}

function deleting(productId){

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
				$('#product-quantity').html($('#'+productId+'').text());
			}
		},
		complete: function(xhr){
			if (button !== undefined){
				button.html(oldButtonText);
			}
		}
	});

}

function lower(productId){
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
			}
		}
	});
}
