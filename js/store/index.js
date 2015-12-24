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

function changePageSizeAndSort()
{
    var valueSize = $('#pageSizeSeletor option:selected').val();
    var valueSort = $('#sortSizeSeletor option:selected').val();
    location.href=app.createAbsoluteUrl($('#catalogUrl').val().substr(1) + '/unit/' + valueSize + '/sort/' + valueSort);
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
