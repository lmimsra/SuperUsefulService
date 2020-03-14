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

// 認証用のルーティングを追加
Auth::routes();

// 認証を必要とするpath
Route::middleware('auth')->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
});
