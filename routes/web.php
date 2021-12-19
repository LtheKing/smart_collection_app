<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NasabahController;

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

Route::get('/', function () {
    return view('welcome');
});

//NASABAH
Route::get('/nasabah/index', 'NasabahController@index')->name('nasabah_index');
Route::get('/nasabah/export/excel', 'NasabahController@export_excel')->name('nasabah_export_excel');
Route::get('/nasabah/create', 'NasabahController@create')->name('nasabah_create');
Route::post('/nasabah/store', 'NasabahController@store')->name('nasabah_store');
Route::post('/nasabah/import/excel', 'NasabahController@import_excel')->name('nasabah_import_excel');
Route::get('/nasabah/edit/{id}', 'NasabahController@edit')->name('nasabah_edit');
Route::put('/nasabah/update/{id}', 'nasabahController@update')->name('nasabah_update');
Route::get('/nasabah/detail/{id}', 'NasabahController@show')->name('nasabah_detail');


//api
Route::get('/nasabah/array', 'NasabahController@getNasabahArray')->name('nasabah_array');

//testing
Route::get('/test', 'NasabahController@checkingResult');