function saveFilter(alias)
{
    $.ajax({
        url	: app.createAbsoluteUrl('office/statssync/Ajaxdefault/saveFilter'),
        error	: function ()
        {
            alert('Ошибка запроса');
        },
        success	: function(data)
        {
            location.href = '/office/statssync/default/' + alias + '/subsession/' + data.subsession;
        },
        data	:
        {
            YII_CSRF_TOKEN      : app.csrfToken,
            alias               : 'officestats_default_' + alias,
            form                : $('form#filterform').serializeArray()
        },
        async		: false,
        cache		: false
    });
}

function setDateFormatCorrect()
{
    var month = $('select#birthday').val();
    if ((month == 0) || (month == undefined))
    {
        return;
    }

    if (month < 10)
    {
        month = '0' + month;
    }

    $('input#birthday_month').val(month);
/*
    current_date = new Date();

    $('input#birthday_from_hidden').val('01.' + month + '.' + current_date.getFullYear());
    $('input#birthday_end_hidden').val(getLastDayOfMonth(current_date.getFullYear(), month - 1) + '.' + month + '.' + current_date.getFullYear());
*/
}

function getLastDayOfMonth(year, month)
{
    var date = new Date(year, month + 1, 0);
    return date.getDate();
}

function setDatepicker()
{
	$.fn.datepicker.dates['ru'] = {
    days: ["Воскресенье", "Понедельник", "Вторник", "Среда", "Четверг", "Пятница", "Суббота"],
    daysShort: ["Вск", "Пнд", "Втр", "Срд", "Чтв", "Птн", "Сбт"],
    daysMin: ["Вс", "Пн", "Вт", "Ср", "Чт", "Пт", "Сб"],
    months: ["Январь", "Февраль", "Март", "Апрель", "Май", "Июнь", "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь"],
    monthsShort: ["Янв", "Фев", "Мар", "Апр", "Май", "Июн", "Июл", "Авг", "Сен", "Окт", "Ноя", "Дек"],
    today: "Сегодня",
    clear: "Очистить",
    format: "dd.mm.yyyy",
    titleFormat: "MM yyyy", /* Leverages same syntax as 'format' */
    weekStart: 1
};
   
    $("input.date").datepicker({
        language: 'ru',
		format: "dd.mm.yyyy"  
    });
	 
	console.log($.datepicker);
	console.log($("input.date").datepicker());
}

function insertData(id)
{
    $("input#disrrtreeauserid").val(id);
    saveFilter('tree');
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

    setDateFormatCorrect();

    $("div.filter-title").click(function () {
        $("div.filter-block").slideToggle('fast');
    });
    setDatepicker();

    if (($('div#list_choose').val() == undefined) && ($('input#disrrtreeauserid').val() != undefined))
    {
        $('#distrslist').Tree({
            ajax : {
                url 	: '/office/statssync/Ajaxdefault/getStructure',
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

})

