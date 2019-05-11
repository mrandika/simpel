<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Disable unauth registration
Auth::routes(['register' => false]);

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'petugas', 'middleware' => ['auth','role:Petugas']], function(){
	Route::get('/', function(){
		return view('petugas');
	});
});

Route::group(['prefix' => 'pusat', 'middleware' => ['auth','role:Pusat']], function(){
	Route::get('/', function(){
		return view('pusat');
	});
});

Route::post('/validate/tps', 'TPSValidator@validateData')->name('tps.validate');

Route::get('/vote', function () {
    return view('vote');
})->name('vote.home');