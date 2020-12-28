<?php

use Illuminate\Support\Facades\Route;

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
Route::get('midtrans', 'MidtransController@index')->name('midtrans.index');
Route::get('midtrans/token', 'MidtransController@token')->name('midtrans.token');
Route::post('midtrans/finish', 'MidtransController@finish')->name('midtrans.finish');
Route::get('midtrans/status/{id}', 'MidtransController@status')->name('midtrans.status');
