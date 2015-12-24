function showManageBlock()
{
    
	
	var active = $('#tabbable_tabs').find('ul li.active a').attr('href').substring(7);
    active = $('#tab_1_' + parseInt(active));
    $(active).find('div.report-manage-static').hide();
    $(active).find('div.report-manage-dynamic').show();
}

function hideManageBlock()
{
    var active = $('#tabbable_tabs').find('ul li.active a').attr('href').substring(7);
    active = $('#tab_1_' + parseInt(active));
    $(active).find('div.report-manage-dynamic').hide();
    $(active).find('div.report-manage-static').show();
}

function getDescriptionForBlock()
{
    getDescription(this);
}

function addColumn(report_alias, double)
{
    var value = $('select#' + report_alias).val();

    var active = $('#tabbable_tabs').find('ul li.active a').attr('href').substring(7);
    active = $('#tab_1_' + parseInt(active));

    if ((value == '') || (value == undefined))
    {
        return;
    }

    if (double == undefined)
    {
        double = 0;
    }

    preAjax();

    $.ajax({
        url	: app.createAbsoluteUrl('office/statssync/Ajaxsettings/saveColumn'),
        error	: function ()
        {
            postAjax();
            alert('Ошибка запроса');
        },
        success	: function(data)
        {
            postAjax();
            if (data.error == true)
            {
                alert('Введите корректные данные!');
                return;
            }

            if (data.double == true)
            {
                if (!confirm('Данное поле уже добавлено. Добавить его ещё раз ?'))
                {
                    return;
                }

                addColumn(report_alias, 1);

            }

            $(active).find('div.report-table-' + report_alias).html(data.content);

        },
        data	:
        {
            YII_CSRF_TOKEN  : app.csrfToken,
            column          : value,
            double          : double,
            report_alias    : report_alias
        },
        async		: false,
        cache		: false
    });
}

function getDescription(object)
{
    var active = $('#tabbable_tabs').find('ul li.active a').attr('href').substring(7);
    active = $('#tab_1_' + parseInt(active));

    $.ajax({
        url	: app.createAbsoluteUrl('office/statssync/Ajaxsettings/getDescription'),
        error	: function ()
        {
            alert('Ошибка запроса');
        },
        success	: function(data)
        {
            if (data.error == true)
            {
                alert('Введите корректные данные!');
                return;
            }

            $(active).find('div.listBoxDescription').html(data.description);

        },
        data	:
        {
            YII_CSRF_TOKEN  : app.csrfToken,
            column          : $(object).val(),
            report_alias    : object.id
        },
        async		: false,
        cache		: false
    });
}

function editColumnTitle(column_id)
{
    var active = $('#tabbable_tabs').find('ul li.active a').attr('href').substring(7);
    active = $('#tab_1_' + parseInt(active));

    $(active).find('div#static-table-manage-' + column_id).hide();
    $(active).find('div#column-title-static-' + column_id).hide();
    $(active).find('div#static-table-manage-' + column_id).hide();
    $(active).find('div#dinamic-table-manage-' + column_id).css('display', 'inline-block');
    $(active).find('div#column-title-dinamic-' + column_id).css('display', 'inline-block');
}

function hideColumnTitle(column_id)
{
    var active = $('#tabbable_tabs').find('ul li.active a').attr('href').substring(7);
    active = $('#tab_1_' + parseInt(active));
    $(active).find('div#dinamic-table-manage-' + column_id).hide();
    $(active).find('div#column-title-dinamic-' + column_id).hide();
    $(active).find('div#static-table-manage-' + column_id).css('display', 'inline-block');
    $(active).find('div#column-title-static-' + column_id).css('display', 'inline-block');
    $(active).find('div#static-table-manage-' + column_id).css('display', 'inline-block');

}

function saveColumnTitle(column_id, alias)
{
    if ((column_id == '') || (column_id == 0) || (alias == ''))
    {
        alert('Ошибка сохранения! Обновите страницу и попробуйте ещё раз');
        return;
    }

    var active = $('#tabbable_tabs').find('ul li.active a').attr('href').substring(7);
    active = $('#tab_1_' + parseInt(active));

    var title = $(active).find('input#column-title-' + alias + '-' + column_id).val();

    if ((title == '') || (title == undefined))
    {
        alert('Введите название поля');
        return;
    }

    $.ajax({
        url	: app.createAbsoluteUrl('office/statssync/Ajaxsettings/saveNewTitle'),
        error	: function ()
        {
            alert('Ошибка запроса');
        },
        success	: function(data)
        {
            if (data.error == true)
            {
                alert('Ошибка сохранения! Обновите страницу и попробуйте ещё раз');
                return;
            }

            $(active).find('div#column-title-static-' + column_id).html(title);

            hideColumnTitle(column_id);
        },
        data	:
        {
            YII_CSRF_TOKEN  : app.csrfToken,
            column          : column_id,
            title           : title,
            report_alias    : alias
        },
        async		: false,
        cache		: false
    });

}

function changeUsed(column_id, alias)
{

    if ((column_id == '') || (column_id == 0) || (alias == ''))
    {
        alert('Ошибка сохранения! Обновите страницу и попробуйте ещё раз');
        return;
    }

    var active = $('#tabbable_tabs').find('ul li.active a').attr('href').substring(7);
    active = $('#tab_1_' + parseInt(active));

    var checked = $(active).find('input#column-is_used-' + alias + '-' + column_id).is(':checked');

    if (checked == undefined)
    {
        alert('Ошибка сохранения! Обновите страницу и попробуйте ещё раз');
        return;
    }

    $.ajax({
        url	: app.createAbsoluteUrl('office/statssync/Ajaxsettings/saveNewUsed'),
        error	: function ()
        {
            alert('Ошибка запроса');
        },
        success	: function(data)
        {
            if (data.error == true)
            {
                alert('Ошибка сохранения! Обновите страницу и попробуйте ещё раз');
                return;
            }
        },
        data	:
        {
            YII_CSRF_TOKEN  : app.csrfToken,
            column          : column_id,
            checked         : checked,
            report_alias    : alias
        },
        async		: false,
        cache		: false
    });
}

function deleteColumn(column_id, alias)
{
    if ((column_id == '') || (column_id == 0) || (alias == ''))
    {
        alert('Ошибка сохранения! Обновите страницу и попробуйте ещё раз');
        return;
    }

    var active = $('#tabbable_tabs').find('ul li.active a').attr('href').substring(7);
    active = $('#tab_1_' + parseInt(active));

    var title = $(active).find('input#column-title-' + alias + '-' + column_id).val();

    if ((title == '') || (title == undefined))
    {
        alert('Ошибка сохранения! Обновите страницу и попробуйте ещё раз');
        return;
    }

    if (!confirm('Удалить поле "' + title + '" из списка полей по данному отчету?'))
    {
        return;
    }

    preAjax();
    $.ajax({
        url	: app.createAbsoluteUrl('office/statssync/Ajaxsettings/deleteColumn'),
        error	: function ()
        {
            postAjax();
            alert('Ошибка запроса');
        },
        success	: function(data)
        {
            postAjax();
            if (data.error == true)
            {
                alert('Ошибка сохранения! Обновите страницу и попробуйте ещё раз');
                return;
            }

            $(active).find('div.report-table-' + alias).html(data.content);
        },
        data	:
        {
            YII_CSRF_TOKEN  : app.csrfToken,
            column          : column_id,
            report_alias    : alias
        },
        async		: false,
        cache		: false
    });
}

function sortChange(column_id, alias, type)
{
    if ((column_id == '') || (column_id == 0) || (alias == ''))
    {
        alert('Ошибка сохранения! Обновите страницу и попробуйте ещё раз'+column_id+'  '+alias);
        return;
    }
/*    var active = $('#tabbable_tabs').tabs('option', 'selected');
    active = $('#tabs-' + (active+1));*/
    //var active = $('#tabbable_tabs').find('ul li.active a').attr('href').substring(7);
    //console.log(active);
    //active = $('#tabs-' + (parseInt(active)+1));
    var active = $('#tabbable_tabs').find('ul li.active a').attr('href').substring(7);
    //console.log($('#tabbable_tabs').find('ul li.active a').attr('href').substring(7));
   // console.log(active);
    active = $('#tab_1_' + parseInt(active));
   // console.log(active);


    preAjax();
    $.ajax({
        url	: app.createAbsoluteUrl('office/statssync/Ajaxsettings/sortChange'),
        error	: function ()
        {
            postAjax();
            alert('Ошибка запроса');
        },
        success	: function(data)
        {
            postAjax();
            if (data.error == true)
            {
                console.log(data.content);
                alert('Ошибка сохранения! Обновите страницу и попробуйте ещё раз Ajax');
                return;
            }

            $(active).find('div.report-table-' + alias).html(data.content);
            //$(active).find('div.report-table-' + alias).find('div.table-scrollable').html(data.content);
            //$(active).find('div.report-table-' + alias).find('div.table-scrollable').html(data.content);
        },
        data	:
        {
            YII_CSRF_TOKEN  : app.csrfToken,
            column          : column_id,
            type            : type,
            report_alias    : alias
        },
        async		: false,
        cache		: false
    });
}

function changeFilter(alias)
{

    if (alias == '')
    {
        alert('Ошибка сохранения! Обновите страницу и попробуйте ещё раз');
        return;
    }

    var active = $('#tabbable_tabs').find('ul li.active a').attr('href').substring(7);
    active = $('#tab_1_' + parseInt(active));
    var checked = $(active).find('input#is_filter_' + alias).is(':checked');

    if (checked == undefined)
    {
        alert('Ошибка сохранения! Обновите страницу и попробуйте ещё раз');
        return;
    }

    preAjax();

    $.ajax({
        url	: app.createAbsoluteUrl('office/statssync/Ajaxsettings/changeFilter'),
        error	: function ()
        {
            postAjax();
            alert('Ошибка запроса');
        },
        success	: function(data)
        {
            postAjax();

            if (data.error == true)
            {
                alert('Ошибка сохранения! Обновите страницу и попробуйте ещё раз');
                return;
            }

            $(active).find('div.report-table-' + alias).html(data.content);
        },
        data	:
        {
            YII_CSRF_TOKEN  : app.csrfToken,
            checked         : checked,
            report_alias    : alias
        },
        async		: false,
        cache		: false
    });
}

function changeFilterForColumn(column_id, alias)
{
    if ((column_id == '') || (column_id == 0) || (alias == ''))
    {
        alert('Ошибка сохранения! Обновите страницу и попробуйте ещё раз');
        return;
    }

    var active = $('#tabbable_tabs').find('ul li.active a').attr('href').substring(7);
    active = $('#tab_1_' + parseInt(active));

    var checked = $(active).find('input#column-is_filter-' + alias + '-' + column_id).is(':checked');

    if (checked == undefined)
    {
        alert('Ошибка сохранения! Обновите страницу и попробуйте ещё раз');
        return;
    }

    $.ajax({
        url	: app.createAbsoluteUrl('office/statssync/Ajaxsettings/saveNewFilter'),
        error	: function ()
        {
            alert('Ошибка запроса');
        },
        success	: function(data)
        {
            if (data.error == true)
            {
                alert('Ошибка сохранения! Обновите страницу и попробуйте ещё раз');
                return;
            }
        },
        data	:
        {
            YII_CSRF_TOKEN  : app.csrfToken,
            column          : column_id,
            checked         : checked,
            report_alias    : alias
        },
        async		: false,
        cache		: false
    });
}

function preAjax()
{
    var active = $('#tabbable_tabs').find('ul li.active a').attr('href').substring(7);
    active = $('#tab_1_' + parseInt(active));

    $(active).find('table.loader-table-off').addClass('loader-table');
    $(active).find('div.loader').css('height', $(active).find('table.loader-table-off').height());
    $(active).find('table.loader-table-off').css('margin-top', 57 - $(active).find('table.loader-table-off').height());
    $(active).find('div.loader').show();
}

function postAjax()
{
    var active = $('#tabbable_tabs').find('ul li.active a').attr('href').substring(7);
    active = $('#tab_1_' + parseInt(active));
    $(active).find('table.loader-table-off').removeClass('loader-table');

    $(active).find('table.loader-table-off').css('margin-top', '57px');

    $(active).find('div.loader').hide();
}

$(function(){

	var selectedTab = $('input#selectedTabNum').val();

    $('#tabs').tabs({selected: selectedTab});

    $('select.selectlistBox').bind('change', getDescriptionForBlock);

    $.each($('select.selectlistBox'), function(){
        getDescription(this);
    });
})

