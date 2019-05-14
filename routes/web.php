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

Route::get('/', 'TopPage@index')->name("top.index");

Route::get('/post', 'MakeBoard@index')->name("board.index");
Route::post('/post/save', 'MakeBoard@save')->name("board.save");

Route::get('/show', function () {
    return view('show_bbs');
});
