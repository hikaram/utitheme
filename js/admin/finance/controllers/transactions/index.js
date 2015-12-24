function changePageSize()
{
    var value = $('#pageSizeSeletor option:selected').val();
    location.href=app.createAbsoluteUrl('admin/finance/transactions/index/unit/' + value);    
}

function setDatepicker()
{

    $.datepicker.setDefaults($.extend($.datepicker.regional["ru"]));
    $("input.datepicker").datepicker({
        changeMonth:       true,
        changeYear:        true,
        yearRange:         '-1:+10',
        showOn: 			'button',
        buttonImage:		$('#asseturl').val() + '/img/icons/calendar.png',
        buttonImageOnly:	true
    });
}

function direction()
{
    var value = $('#direction').val();
	
	if(value == 'balans_in')
	{
		$('#table_balans_in').show();
		$('#table_balans_out').hide();
		$('#debit_object_alias').val('users');
		$('#credit_object_alias').val('');
	}
	if(value == 'balans_out')
	{
		$('#table_balans_out').show();
		$('#table_balans_in').hide();
		$('#credit_object_alias').val('users');
		$('#debit_object_alias').val('');
	}
	if(value == 'all')
	{
		$('#table_balans_out').hide();
		$('#table_balans_in').hide();
		$('#debit_object_alias').val('');
		$('#credit_object_alias').val('');
	}
}

function addStyle()
{
	var key = parseInt($(this).attr('aliasKey'));
	
	if ($(this).attr('checked'))
	{
		$('div#specaliasCheckBox-' + key).addClass('selectedAlias');
	}
	else
	{
		$('div#specaliasCheckBox-' + key).removeClass('selectedAlias');
	}
}

$(function(){

    $("#content_filter_header").click(function(){
        $("#content_filter").toggle(500);
    });

	
	$('#direction').change(function(){
		direction();
	});
		
	direction();
		
	$('input.specaliasCheckBoxClass').each(addStyle);
		
	$('input.specaliasCheckBoxClass').bind('change', addStyle);
	
    setDatepicker();
    
    $('div#widgetWrapper').find('a').find('span.find').hide();

    $('#filterform').on('submit', function(e){
        
        e.preventDefault();

        $('input[type="button"]').attr('disabled', 'disabled');
        
        $.ajax({
            url	: app.createAbsoluteUrl('admin/finance/Ajaxtransactions/saveFilter'),
            type : 'POST',
            error	: function ()
            {
                $('input[type="button"]').removeAttr('disabled');
                alert('Ошибка запроса');
            },
            success	: function(data)
            {
                location.href = '/' + app.langUri + '/admin/finance/transactions/index/subsession/' + data.subsession;
            },
            data	    : $('form#filterform').serialize() + '&YII_CSRF_TOKEN='+app.csrfToken+'&alias=admin_finance_transactions',
            async		: false,
            cache		: false
        });
    });    
    
})

