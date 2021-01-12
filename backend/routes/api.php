<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\LoginController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// ユーザー登録
Route::post('/register', [RegisterController::class, 'register']);

// ログイン
Route::post('/login', [LoginController::class, 'login']);