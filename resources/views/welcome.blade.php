<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="/css/app.css">
</head>
<body>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

<div id="results" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

<script type="text/javascript">
Highcharts.chart('results', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Rider finish times'
    },
    subtitle: {
        text: 'Source: ridelondon.com'
    },
    xAxis: {
        categories: {!! $results->pluck("finish_time") !!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'No. of rinder'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Rider times',
        data: {{ $results->pluck('total_riders') }}

    }]
});
</script>

<div id="finish_line" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

<script type="text/javascript">
Highcharts.chart('finish_line', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Rider finish times'
    },
    subtitle: {
        text: 'Source: ridelondon.com'
    },
    xAxis: {
        categories: {!! $grouped_finish_line_times->pluck("time_of_day") !!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'No. of rinder'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Rider times',
        data: {{ $grouped_finish_line_times->pluck('count') }}

    }]
});
</script>


<div id="start_time" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

<script type="text/javascript">
Highcharts.chart('start_time', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Start time correlation'
    },
    subtitle: {
        text: 'Source: ridelondon.com'
    },
    xAxis: {
        categories: {!! $starttime->pluck('est_start_time') !!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Time taken (in seconds)'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        },
        series:{
            turboThreshold: 0
        }
    },
    series: [{
        name: 'Rider times',
        data: {!! $starttime->pluck("finish_time") !!}

    }]
});
</script>


<script type="text/javascript" src="/js/app.js"></script>
</body>
</html>