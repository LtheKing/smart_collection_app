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