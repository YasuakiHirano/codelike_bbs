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

// 掲示板一覧[トップ]
Route::get('/', 'TopPage@index')->name("top.index");

// 掲示板作成
Route::get('/post', 'MakeBoard@index')->name("board.index");
Route::post('/post/save', 'MakeBoard@save')->name("board.save");

// 掲示板詳細
Route::get('/detail', 'DetailPage@index')->name("detail.index");
Route::post('/detail/response', 'DetailPage@makeResponse')->name("detail.response");
Route::post('/detail/delete', 'DetailPage@deleteBoard')->name("detail.delete");

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
