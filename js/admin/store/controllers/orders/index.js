function changePageSize()
{
    var value = $('#pageSizeSeletor option:selected').val();
    var sessionGuid = $('input#sessionGuid').val();

    if (sessionGuid != '')
    {
        location.href=app.createAbsoluteUrl('admin/store/orders/index/unit/' + value + '/subsession/' + sessionGuid);
    }
    else
    {
        location.href=app.createAbsoluteUrl('admin/store/orders/index/unit/' + value);    
    }
    
}

function setDatepicker()
{
    $("input.storedatepicker").datepicker({
        language: 'ru',
        autoclose: true
    });

    $("input#filtercreated_atot").datepicker({
        language: 'ru',
        autoclose: true,
        startDate: new Date(),
        endDate: $("input#filtercreated_atdo").val()
    }).change(dateFromChanged);   

    $("input#filtercreated_atdo").datepicker({
        language: 'ru',
        autoclose: true,
        startDate: $("input#filtercreated_atot").val() == '' ? new Date() : $("input#filtercreated_atot").val(),
        endDate: "2024-12-12"
    }).change(dateEndChanged);
}

function dateFromChanged(ev) {
    $('input#filtercreated_atdo').datepicker('setStartDate', $("input#filtercreated_atot").val());
}

function dateEndChanged(ev) {
    $('input#filtercreated_atot').datepicker('setEndDate', $("input#filtercreated_atdo").val());
}

function editUserBlock()
{
    var selectedType = $('select#filteris_unregistered_customer').val();
    var isGuest = $('input#isGuest').val();

    if (selectedType == isGuest)
    {
        $('input#showByUsername').val(0);
        $('div#userBlock').hide();
    }
    else
    {
        $('input#showByUsername').val(1);
        $('div#userBlock').show();
    }
}

$(function(){
    
    $("#content_filter_header").click(function(){
        $("#content_filter").toggle(500);
    });

    $('script#locale').attr('src', $('input#scriptSrc').val()).on('load', function () {
        setDatepicker();
    });

	editUserBlock();

	$('div#widgetWrapperForm').find('a.input-group-addon').hide();

    $('#filterform').on('submit', function(e){
        
        e.preventDefault();

        $('input[type="button"]').attr('disabled', 'disabled');
        
        $.ajax({
            url	: app.createAbsoluteUrl('admin/store/Ajaxdefault/saveFilter'),
            type : 'POST',
            error	: function ()
            {
                $('input[type="button"]').removeAttr('disabled');
                alert(T('Ошибка запроса'));
            },
            success	: function(data)
            {
                location.href = '/' + app.langUri + '/admin/store/orders/index/subsession/' + data.subsession;
            },
            data	    : $('form#filterform').serialize() + '&YII_CSRF_TOKEN='+app.csrfToken+'&alias=store_order_index',
            async		: false,
            cache		: false
        });
    }); 	

});



