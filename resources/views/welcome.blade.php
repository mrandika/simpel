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
        <div class="p-5">
            @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <h4 class="alert-heading">Error!</h4>
                <hr>
                @foreach ($errors->all() as $error)
                <p class="mb-0">{{$error}}</p>
                @endforeach
            </div>
            @endif

            <h1>Halo!</h1>
            <p>Mari mulai</p>
            <form action="{{ route('tps.validate') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="provSelect">Provinsi</label>
                    </div>
                    <select class="custom-select" id="provSelect" name="provinces">
                        <option selected>Choose...</option>
                        @foreach ($provinces as $province)
                        <option class="{{$province->name}}" value="{{$province->id}}">{{$province->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="discSelect">Kabupaten</label>
                    </div>
                    <select class="custom-select" id="discSelect" name="districts">
                        <option selected>Choose...</option>
                        @foreach ($districts as $district)
                        <option
                            class="{{ DB::table('provinces')->select('name')->where('id', $district->provinceId)->first()->name }}"
                            value="{{$district->id}}">{{$district->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="subDiscSelect">Kecamatan</label>
                    </div>
                    <select class="custom-select" id="subDiscSelect" name="subdistricts">
                        <option selected>Choose...</option>
                        @foreach ($subdistricts as $subdistrict)
                    <option class="{{ DB::table('districts')->select('name')->where('id', $subdistrict->districtId)->first()->name }}" value="{{$subdistrict->id}}">{{$subdistrict->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="urbanVillageSelect">Kelurahan</label>
                    </div>
                    <select class="custom-select" id="urbanVillageSelect" name="urbanvillages">
                        <option selected>Choose...</option>
                        @foreach ($urbanvillages as $urbanvillage)
                    <option class="{{ DB::table('sub_districts')->select('name')->where('id', $urbanvillage->subDistrictId)->first()->name }}" value="{{$urbanvillage->id}}">{{$urbanvillage->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="tpsSelect">TPS</label>
                    </div>
                    <select class="custom-select" id="tpsSelect" name="tpsid">
                        <option selected>Choose...</option>
                        @foreach ($tps as $place)
                        <option class="{{ DB::table('urban_villages')->select('name')->where('id', $place->urbanVillageId)->first()->name }}" value="{{$place->id}}">{{$place->number}}</option>
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

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script>
    $(function () {
        $("#provSelect").on("change", function () {
            var levelClass = $('#provSelect').find('option:selected').attr('class');
            $('#discSelect option').each(function () {
                var self = $(this);
                if (self.hasClass(levelClass)) {
                    self.show();
                } else {
                    self.hide();
                }
            });
        });
    });

    $(function() {
        $("#discSelect").on("change", function () {
            var levelClass = $('#discSelect').find('option:selected').text();
            $('#subDiscSelect option').each(function () {
                var self = $(this);
                if (self.hasClass(levelClass)) {
                    self.show();
                } else {
                    self.hide();
                }
            });
        });
    });

    $(function() {
        $("#subDiscSelect").on("change", function () {
            var levelClass = $('#subDiscSelect').find('option:selected').text();
            $('#urbanVillageSelect option').each(function () {
                var self = $(this);
                if (self.hasClass(levelClass)) {
                    self.show();
                } else {
                    self.hide();
                }
            });
        });
    });

    $(function() {
        $("#urbanVillageSelect").on("change", function () {
            var levelClass = $('#urbanVillageSelect').find('option:selected').text();
            $('#tpsSelect option').each(function () {
                var self = $(this);
                if (self.hasClass(levelClass)) {
                    self.show();
                } else {
                    self.hide();
                }
            });
        });
    });
</script>

</html>