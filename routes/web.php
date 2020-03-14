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

// 認証用のルーティング
Auth::routes();

// 認証を必要とするpath
//Route::middleware('auth')->group(function () {
//    Route::get('/home', 'HomeController@index')->name('home');
//});

// トップページ用のルーティング
Route::get('/', 'HomeController@index');

// スレッド関連
Route::resource('/threads', 'ThreadController');

// ポスト関連
Route::resource('/post', 'PostController');
