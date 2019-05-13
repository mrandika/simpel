@extends('layouts.app')

@section('content')
@php
$candidates = DB::table('candidates')->get();
$voters = DB::table('voters')->count();
$voted = DB::table('voters')->where('isVoted', 1)->count();

$validPoll = round(($voted/$voters)*100)
@endphp
<div class="container">
    <b>Suara Masuk: </b>
    <div class="progress mb-5">
        <div class="progress-bar progress-bar-striped" role="progressbar" style="width: {{$validPoll}}%" aria-valuenow="{{$validPoll}}"
            aria-valuemin="0" aria-valuemax="100">{{$validPoll}}%</div>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                @foreach ($candidates as $candidate)
                <th class="text-center" width="50%" scope="col">{{$candidate->candidatesName}} -
                    {{$candidate->viceName}}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($candidates as $candidate)
                <td class="text-center"><img width="50%" src="/image/{{$candidate->image}}" alt=""></td>
                @endforeach
            </tr>
            <tr>
                @foreach ($candidates as $candidate)
                <td class="text-center">
                    <h1>{{round(($candidate->voteCount/$voters)*100)}}%</h1>
                </td>
                @endforeach
            </tr>
        </tbody>
    </table>
</div>
@endsection

{{-- @section('script')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>

<script>
    Highcharts.chart('chart', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Browser market shares in January, 2018'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                }
            }
        }
    },
    series: [{
        name: 'Brands',
        colorByPoint: true,
        data: [{
            name: 'Chrome',
            y: 61.41,
            sliced: true,
            selected: true
        }, {
            name: 'Internet Explorer',
            y: 11.84
        }, {
            name: 'Firefox',
            y: 10.85
        }, {
            name: 'Edge',
            y: 4.67
        }, {
            name: 'Safari',
            y: 4.18
        }, {
            name: 'Sogou Explorer',
            y: 1.64
        }, {
            name: 'Opera',
            y: 1.6
        }, {
            name: 'QQ',
            y: 1.2
        }, {
            name: 'Other',
            y: 2.61
        }]
    }]
});
</script>
@endsection --}}