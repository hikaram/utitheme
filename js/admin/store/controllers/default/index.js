function Graph()
{
    this.dataCount = [],
    this.dataAmount = [],
    this.dataPoints = [],
    this.showTooltip = function(x, y, labelX, labelY, labelTooltip, toFixed) 
    {
        $('<div id="tooltip" class="chart-tooltip">' + (labelY.toFixed(toFixed).replace(/(\d)(?=(\d{3})+\.)/g, '$1,')) + labelTooltip + '<\/div>').css({
            position: 'absolute',
            display: 'none',
            top: y - 40,
            left: x - 60,
            border: '0px solid #ccc',
            padding: '2px 6px',
            'background-color': '#fff'
        }).appendTo("body").fadeIn(200);
    }   
    this.setDataCount = function(data)
    {
        var dataArray= explode('||', data);
        this.dataCount = [];
        $.each(dataArray, function(key, value){
            var valueArray = explode(',', value);
            if (valueArray[0] != '')
            {
                graph.dataCount.push(valueArray);
            }
        });
        graph.initChartCount();
    }
    this.setDataAmount = function(data)
    {
        var dataArray= explode('||', data);
        this.dataCount = [];
        $.each(dataArray, function(key, value){
            var valueArray = explode(',', value);
            if (valueArray[0] != '')
            {
                graph.dataAmount.push(valueArray);
            }
        });
    }
    this.setDataPoints = function(data)
    {
        var dataArray= explode('||', data);
        this.dataCount = [];
        $.each(dataArray, function(key, value){
            var valueArray = explode(',', value);
            if (valueArray[0] != '')
            {
                graph.dataPoints.push(valueArray);
            }
        });
    }

    this.initChartInner = function(data, tabId, color, labelTooltip, toFixed)
    {
        var plot_statistics = $.plot(
            $(tabId), 
            [
                {
                    data:data,
                    lines: {
                        fill: 0.6,
                        lineWidth: 0
                    },
                    color: [color]
                },
                {
                    data: data,
                    points: {
                        show: true,
                        fill: true,
                        radius: 5,
                        fillColor: color,
                        lineWidth: 3
                    },
                    color: '#fff',
                    shadowSize: 0
                }
            ], 
            {
                xaxis: {
                    tickLength: 0,
                    tickDecimals: 0,                        
                    mode: "categories",
                    min: 2,
                    font: {
                        lineHeight: 15,
                        style: "normal",
                        variant: "small-caps",
                        color: "#6F7B8A"
                    }
                },
                yaxis: {
                    ticks: 3,
                    tickDecimals: 0,
                    tickColor: "#f0f0f0",
                    font: {
                        lineHeight: 15,
                        style: "normal",
                        variant: "small-caps",
                        color: "#6F7B8A"
                    }
                },
                grid: {
                    backgroundColor: {
                        colors: ["#fff", "#fff"]
                    },
                    borderWidth: 1,
                    borderColor: "#f0f0f0",
                    margin: 0,
                    minBorderMargin: 0,
                    labelMargin: 20,
                    hoverable: true,
                    clickable: true,
                    mouseActiveRadius: 6
                },
                legend: {
                    show: false
                }
            }
        );

        var previousPoint = null;

        $(tabId).bind("plothover", function (event, pos, item) {
            $("#x").text(pos.x.toFixed(2));
            $("#y").text(pos.y.toFixed(2));
            if (item) {
                if (previousPoint != item.dataIndex) {
                    previousPoint = item.dataIndex;

                    $("#tooltip").remove();
                    var x = item.datapoint[0].toFixed(2),
                        y = item.datapoint[1].toFixed(2);

                    graph.showTooltip(item.pageX, item.pageY, item.datapoint[0], item.datapoint[1], labelTooltip, toFixed);
                }
            } else {
                $("#tooltip").remove();
                previousPoint = null;
            }
        }); 
    }
    this.initChartCount = function()
    {
        var data = graph.dataCount;

        this.initChartInner(data, "#statistics_1", '#f89f9f', ' ', 0);
    }
    this.initChartAmount = function() 
    {
        var data = graph.dataAmount;

        var mainCurrencyAbbr = ' ' + $('input#mainCurrencyAbbr').val();

        this.initChartInner(data, "#statistics_2", '#BAD9F5', mainCurrencyAbbr, 2);
    }

    this.initChartPoints = function() {

        var data = graph.dataPoints;

        this.initChartInner(data, "#statistics_3", '#3FA8A1', ' ', 0);
    }
}

var graph;

function showStatus(dataTable)
{
    $('tr.table-order-status').hide();
    $('tr.table-order-status-' + dataTable).show();
}

function explode(delimiter, string) 
{
    var emptyArray = { 0: '' };

    if ( arguments.length != 2 || typeof arguments[0] == 'undefined' || typeof arguments[1] == 'undefined' )
    {
        return null;
    }

    if ( delimiter === '' || delimiter === false || delimiter === null )
    {
        return false;
    }

    if ( typeof delimiter == 'function' || typeof delimiter == 'object' || typeof string == 'function' || typeof string == 'object' )
    {
        return emptyArray;
    }

    if ( delimiter === true ) 
    {
        delimiter = '1';
    }

    return string.toString().split ( delimiter.toString() );
}

function saveFilterForOrder(username)
{
    $.ajax({
        url : app.createAbsoluteUrl('admin/store/Ajaxdefault/saveFilterForUsername'),
        type : 'POST',
        error   : function ()
        {
            alert(T('Ошибка запроса'));
        },
        success : function(data)
        {
            openInNewTab('/' + app.langUri + '/admin/store/orders/index/subsession/' + data.subsession);
        },
        data        : 'username=' + username + '&YII_CSRF_TOKEN='+app.csrfToken+'&alias=store_order_index',
        async       : false,
        cache       : false
    });

}

function openInNewTab(url) 
{
    var win = window.open(url, '_blank');
    win.focus();
}

$(function(){
    
    $('a.table-order-status-check').bind('click', function(){
        var dataTable = $(this).data('status');
        showStatus(dataTable);
    });

    graph = new Graph();

    $('#statistics_amounts_tab').on('shown.bs.tab', function (e) {
        graph.initChartAmount();
    });

    $('#statistics_points_tab').on('shown.bs.tab', function (e) {
        graph.initChartPoints();
    });

});



