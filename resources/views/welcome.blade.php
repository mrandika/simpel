<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{'css/app.css'}}">
    <title>Laravel</title>
</head>

@php
$provinces = DB::table('provinces')->get();
$districts = DB::table('districts')->get();
$subdistricts = DB::table('sub_districts')->get();
$urbanvillages = DB::table('urban_villages')->get();
$tps = DB::table('vote_places')->get();
@endphp

<body>
    <div class="container">
        @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <div class="alert alert-danger alert-has-icon">
                <div class="alert-icon"><i class="fas fa-exclamation-circle"></i></i></div>
                <div class="alert-body">
                    <div class="alert-title">Error</div>
                    <ol>
                        @foreach ($errors->all() as $error)
                        <li>
                            <p class="mb-0">{{ $error }}</p>
                        </li>
                        @endforeach
                    </ol>
                </div>
            </div>

        </div>

        @endif
        <div class="p-5">
            <h1>Halo!</h1>
            <p>Mari mulai</p>
            <form action="{{ route('tps.validate') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Provinsi</label>
                    </div>
                    <select class="custom-select" id="inputGroupSelect01" name="provinces">
                        <option selected>Choose...</option>
                        @foreach ($provinces as $province)
                        <option value="{{$province->id}}">{{$province->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Kabupaten</label>
                    </div>
                    <select class="custom-select" id="inputGroupSelect01" name="districts">
                        <option selected>Choose...</option>
                        @foreach ($districts as $district)
                        <option value="{{$district->id}}">{{$district->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Kecamatan</label>
                    </div>
                    <select class="custom-select" id="inputGroupSelect01" name="subdistricts">
                        <option selected>Choose...</option>
                        @foreach ($subdistricts as $subdistrict)
                        <option value="{{$subdistrict->id}}">{{$subdistrict->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Kelurahan</label>
                    </div>
                    <select class="custom-select" id="inputGroupSelect01" name="urbanvillages">
                        <option selected>Choose...</option>
                        @foreach ($urbanvillages as $urbanvillage)
                        <option value="{{$urbanvillage->id}}">{{$urbanvillage->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">TPS</label>
                    </div>
                    <select class="custom-select" id="inputGroupSelect01" name="tpsid">
                        <option selected>Choose...</option>
                        @foreach ($tps as $place)
                        <option value="{{$place->id}}">{{$place->number}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">TPS - </span>
                    </div>
                    <input type="text" class="form-control" placeholder="ID" aria-label="ID"
                        aria-describedby="basic-addon1" name="uid">
                </div>

                <button type="submit" class="btn btn-success float-right">Submit</button>
            </form>

        </div>
    </div>
</body>

</html>