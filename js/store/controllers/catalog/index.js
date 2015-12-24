$(function(){
 $(document).on('click', '.del-goods', function(e){
   		e.preventDefault();
		deleting($(this).data('product-id'), e);
   });
   
   $(document).on('click', '.del-goods', function(e){
   		e.preventDefault();
		deleting($(this).data('product-id'), e);
   });

});

function changePageSize()
{
    var value = $('#pageSizeSeletor option:selected').val();
    location.href=app.createAbsoluteUrl('store/catalog/' + $('#catalogAlias').val() + '/unit/' + value);
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

}
