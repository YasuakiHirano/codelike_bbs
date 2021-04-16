<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\BoardController;
use App\Http\Controllers\Api\MessageController;

Route::middleware('auth:sanctum')->group(function(){
    Route::get('/user', function(Request $request){
        return $request->user();
    });

    Route::post('/board/create', [BoardController::class, 'create']);
    Route::post('/logout', [LoginController::class, 'logout']);
});

// ユーザー登録
Route::post('/register', [RegisterController::class, 'register']);

// ログイン
Route::post('/login', [LoginController::class, 'login']);

// 掲示板一覧
Route::get('/board/fetch', [BoardController::class, 'fetch']);
Route::get('/board/find', [BoardController::class, 'find']);

// 掲示板のメッセージ
Route::post('/message/create', [MessageController::class, 'create']);
Route::get('/message/fetch_by_board_id', [MessageController::class, 'fetchByBoardId']);