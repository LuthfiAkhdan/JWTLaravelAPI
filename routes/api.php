<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Article\ArticleController;
use App\Http\Controllers\UserController;


Route::namespace('Auth')->group(function () {

	Route::post('register', [RegisterController::class, '__invoke']);
	Route::post('login', [LoginController::class, '__invoke']);
	Route::post('logout', [LogoutController::class, '__invoke']);

});

Route::namespace('Article')->middleware('auth:api')->group(function () {

	Route::post('create-new-article', [ArticleController::class, 'store']);
	Route::patch('update-the-selected-article/{article}', [ArticleController::class, 'update']);
	Route::delete('delete-the-selected-article/{article}', [ArticleController::class, 'destroy']);

});
Route::get('articles/{article}', [ArticleController::class, 'show']);
Route::get('articles', [ArticleController::class, 'index']);

Route::get('user', [UserController::class, '__invoke']);