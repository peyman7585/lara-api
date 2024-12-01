<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ArticleController;
use \App\Http\Controllers\AuthController;
Route::prefix('v1')->group(function(){
    Route::group(['prefix' => 'auth'], function ($router) {

        Route::post('login', [AuthController::class,'login']);
        Route::post('logout', [AuthController::class,'logout']);
        Route::post('refresh', [AuthController::class,'refresh']);
        Route::post('me', [AuthController::class,'me']);

    });
    Route::resource('articles',ArticleController::class);
});
