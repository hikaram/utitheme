/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
 function jquery_settings(){
	
	$.ajaxSetup({
		type 		: "POST",
		async		: false,
		dataType	: 'json'
	});
}

function sendForm()
{
    $.ajax({
        url	: $('#ajaxurl').val(),
        error	: function ()
        {
            alert('Ошибка запроса');
        },
        success	: function(data)
        {
            if (data.backurl != '')
            {
                location.href = data.backurl;
            }            
        },
        data	: 
        {
            YII_CSRF_TOKEN  : app.csrfToken,
            page__id        : $('#page__id').val()
        },
        async		: false,
        cache		: false
    });
}

function after_is_visible_change()
{
    if ($('#Pages_is_visible').attr('checked') == 'checked')
    {
        $('.view_allowed').hide();
        $('.view_denied').show();
    }
    else
    {
        $('.view_allowed').show();
        $('.view_denied').hide();
    }
}
  
$(function(){

	$('.page-template-select-layout').mCustomScrollbar({/*axis: "x", */theme: "light-3"});
    $('.page-roles-table-wrapper').mCustomScrollbar({/*axis: "x", */theme: "light-3"});
    
    jquery_settings();
    
    after_is_visible_change();

    $('#Pages_is_visible').change(function(){
        after_is_visible_change();
    });    
    
    var layout = $("#Pages_layout").val();     
    $('.'+layout+'-icon-picture').addClass('selected');
    switch (layout)
    {
        case 'wide':
            $('.select-layout').scrollTop(0)
            break
        case 'l_column':
            $('.select-layout').scrollTop(115)
            break
        case 'r_column':
            $('.select-layout').scrollTop(250)
            break
        case 'three_column':
            $('.select-layout').scrollTop(390)
            break
        case 'max_wide':
            $('.select-layout').scrollTop(530)
            break
        case 'max_l_column':
            $('.select-layout').scrollTop(670)
            break
        case 'max_r_column':
            $('.select-layout').scrollTop(800)
            break
        case 'max_three_column':
            $('.select-layout').scrollTop(1000)
            break
    } 

    /*
    $('.toolbar').animate({top : 0}, 10, function(){
        $('.l-show').hide();
        $('.l-hide').hide();
		$(this).css({
			position: 'static',
			border: 'none',
			backgroundColor: 'white',
			width: 1200,
			left: 'initial',
			"margin-left": 0
		});
    });*/
       
    $('.template').bind('click', function(){
        $('.template').removeClass('selected');
        $(this).addClass('selected');
        $('input[name="Pages[layout]"]').val($(this).attr('value'));
    });        
})

