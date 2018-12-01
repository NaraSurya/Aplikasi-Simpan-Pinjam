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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/test', function () {
    return view('anggota.perbaikan');
});

Route::resource('anggota', 'AnggotaController');
Route::resource('usera', 'AnggotaController');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/simpanan', 'SimpananController');

