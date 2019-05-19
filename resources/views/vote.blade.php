@extends('layouts.app')

@section('content')

@php
$data = Session::get('data');
$uid = Session::get('id');
$tps = Session::get('tps');
$candidates = DB::table('candidates')->get();
@endphp
<div class="container">
    <div class="justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Halo, {{$data->name}}</div>

            <div class="card-body">
                Lindungi Hak Pilih Mu!
                <p>Untuk Indonesia yang lebih baik</p>
                <form action="{{ route('voters.submit') }}" method="post">
                    @csrf
                    <input type="hidden" name="idektp" value="{{$uid}}">
                    <input type="hidden" name="tpsId" value="{{$tps}}">
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
                                <td class="text-center"><input type="radio" name="candidates" value="{{$candidate->id}}"></td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-success float-right">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection