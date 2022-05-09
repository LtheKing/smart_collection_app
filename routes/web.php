<?php

use Illuminate\Support\Facades\Route;
use App\Models\Nasabah;
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
})->name('login');

//user
Route::post('/user/login', 'UserController@login')->name('user_login');
Route::get('/user/register', 'UserController@create')->name('user_register');
Route::post('/user/store', 'UserController@store')->name('user_store');

Route::middleware('usersession')->group(function() {
    Route::get('/nasabah/index', 'NasabahController@index')->name('nasabah_index');
    //NASABAH
    Route::post('/nasabah/export/excel', 'NasabahController@export_excel')->name('nasabah_export_excel');
    Route::get('/nasabah/create', 'NasabahController@create')->name('nasabah_create');
    Route::post('/nasabah/store', 'NasabahController@store')->name('nasabah_store');
    Route::post('/nasabah/import/excel', 'NasabahController@import_excel')->name('nasabah_import_excel');
    Route::get('/nasabah/edit/{id}', 'NasabahController@edit')->name('nasabah_edit');
    Route::put('/nasabah/update/{id}', 'nasabahController@update')->name('nasabah_update');
    Route::get('/nasabah/detail/{id}', 'NasabahController@show')->name('nasabah_detail');
    Route::delete('/nasabah/delete/{id}', 'NasabahController@destroy')->name('nasabah_destroy');
    
    //TEAM LEAD
    Route::get('/teamlead/distribusi_kerjaan', 'TeamLeadController@distribusi')->name('tl_distribusi');
    Route::get('/teamlead/set_supervisor', 'TeamLeadController@set_supervisor')->name('tl_set_supervisor');
    Route::post('/teamlead/distribusi_kerjaan/store', 'TeamLeadController@store')->name('tl_distribusi_store');
    Route::post('/teamlead/distribusi_kerjaan/update_supervisor_id', 'TeamLeadController@update_supervisor_id')->name('tl_update_supervisor_id');

    //DESK COLL
    Route::get('/deskcoll/index', 'DeskCollController@index')->name('dc_index');

    //Customer
    Route::get('/customer/index', 'CustomerController@index')->name('customer_index');
    Route::get('/customer/create', 'CustomerController@create')->name('customer_create');
    Route::post('/customer/store', 'CustomerController@store')->name('customer_store');
    Route::get('/customer/detail/{id}', 'CustomerController@show')->name('customer_detail');
    Route::get('/customer/edit/{id}', 'CustomerController@edit')->name('customer_edit');
    Route::put('/customer/update/{id}', 'CustomerController@update')->name('customer_update');
    Route::post('/customer/export/excel', 'CustomerController@export')->name('customer_export');
    Route::post('/customer/import/excel', 'CustomerController@import')->name('customer_import');

    //User
    Route::get('/user/index', 'UserController@index')->name('user_index');
    Route::get('/user/create', 'UserController@create')->name('user_create');
    Route::post('/user/store', 'UserController@store')->name('user_store');
    Route::get('/user/edit/{id}', 'UserController@edit')->name('user_edit');
    Route::put('/user/update/{id}', 'UserController@update')->name('user_update');
    Route::get('/user/detail/{id}', 'UserController@show')->name('user_detail');
});


//api
Route::get('/api/token', function() {
    return csrf_token();
});

Route::get('/logout', function(){
    session()->flush();
    return redirect('/');
})->name('logout');

Route::get('/nasabah/array', 'NasabahController@getNasabahArray')->name('nasabah_array');
Route::get('/teamlead/nasabah/array', 'NasabahController@getNasabahArray')->name('teamlead_array');
Route::get('/teamlead/customer/array', 'CustomerController@getAll')->name('customer_array');
Route::get('/teamlead/deskcoll/array', 'DeskCollController@getData')->name('deskcoll_array');
Route::get('/deskcoll/array', 'DeskCollController@getData')->name('deskcoll_array');
Route::get('/customer/array', 'CustomerController@getAll')->name('customer_array');
Route::get('/user/array', 'UserController@getAll')->name('user_array');
Route::delete('/api/nasabah/delete/{id}', 'NasabahController@api_delete')->name('nasabah_api_delete');
Route::delete('/api/customer/delete/{id}', 'CustomerController@api_delete')->name('customer_api_delete');
Route::delete('/api/user/delete/{id}', 'UserController@api_delete')->name('user_api_delete');

//testing
Route::get('/test', 'NasabahController@checkingResult');
Route::get('/test/bank/{bank}', function($bank){
    $nasabahs = Nasabah::where('Bank', $bank)->get();
    return $nasabahs;
});
Route::get('/test/deskcoll', 'DeskCollController@getData');
Route::get('/test/nasabah/custom/export', 'NasabahController@export_excel_custom');
Route::get('/test/customer/selected_by_role/{role}/{username}', 'CustomerController@select_by_role');
Route::get('/test/customer/detail/{id}', 'CustomerController@test_detail_customer')->name('test_detail_page');
Route::get('/test/customer/pic-name/{id}', 'CustomerController@getPICNameById')->name('test_pic_name');
Route::post('/test/customer/import-response', 'CustomerController@customResponseImport');
Route::post('/test/user/get-supervisor', 'UserController@testGetUserByRole');

