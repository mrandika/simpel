@extends('layouts.app')

@section('content')
@php
$tps = DB::table('vote_places')->select('number')->where('usersInCharge', Auth::user()->id)->first();
$votersHere = DB::table('voters')->where('voteAt', $tps->number);
$voted = DB::table('voters')->where([['isVoted', 1], ['voteAt', $tps->number]])->count();

$validPoll = round(($voted/$votersHere->count())*100)
@endphp
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Halo, TPS {{$tps->number}}</h1>
            <p class="mb-5">Total Pemilih: {{ $votersHere->count() }}</p>
            <div class="card text-white bg-info mb-5" style="max-width: 18rem;">
                <div class="card-header text-center">Suara Masuk</div>
                <div class="card-body">
                    <h5 class="card-title text-center">{{$validPoll}}% / 100%</h5>
                    <p class="card-text text-center">{{ $voted }} / {{ $votersHere->count() }} Pemilih</p>
                </div>
            </div>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col" class="text-center">NIK</th>
                    <th scope="col" class="text-center">Nama</th>
                    <th scope="col" class="text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($votersHere->get() as $voters)
                <tr>
                <th scope="row">{{$voters->nik}}</th>
                    <td>{{$voters->name}}</td>
                    <td class="text-center">
                        @if ($voters->isVoted == 1)
                        <i class="far fa-check-circle" style="color: green"></i>
                        @else
                        <i class="far fa-times-circle" style="color: red"></i>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection