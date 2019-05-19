@extends('layouts.app')

@section('content')

@php
$access = Session::get('access');
$tpsId = Session::get('tps');
@endphp
<div class="container">
    <div class="justify-content-center">
        <div class="col-md-12">
            @if (\Session::has('success'))
            <div class="alert alert-success alert-has-icon">
                <div class="alert-icon"><i class="far fa-check-circle"></i></div>
                <div class="alert-body">
                    <div class="alert-title">Terimakasih!</div>
                </div>
            </div>
            @endif
            @if (\Session::has('error'))
            <div class="alert alert-danger alert-has-icon">
                <div class="alert-icon"><i class="far fa-times-circle"></i></div>
                <div class="alert-body">
                <div class="alert-title">{{ \Session::get('error') }}</div>
                </div>
            </div>
            @endif
            <div class="card">
                <div class="card-header">Session ID: {{$access}}</div>

                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <h4 class="alert-heading">Error!</h4>
                        <hr>
                        @foreach ($errors->all() as $error)
                        <p class="mb-0">{{$error}}</p>
                        @endforeach
                    </div>
                    @endif
                    Selamat datang di TPS.
                    <p>Silakan lakukan tapping</p>
                    <form action="{{ route('voters.validate') }}" method="post">
                        @csrf
                        <input type="hidden" name="session" value="{{$access}}">
                    <input type="hidden" name="tpsId" value="{{$tpsId}}">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">E-KTP</span>
                            </div>
                            <input type="text" class="form-control" placeholder="Tap" aria-label="Tap"
                                aria-describedby="basic-addon1" name="idektp" autofocus>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection