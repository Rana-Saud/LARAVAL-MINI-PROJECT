<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

Route::get('signup', [RegisterController::class, 'register']);

Route::post('signup', [RegisterController::class, 'store']);

Route::post('login', [LoginController::class, 'login']);
Route::get('logout', [LoginController::class, 'logout']);

Route::prefix('user')->group(function () {
    Route::controller(UserController::class)->group(function () {
        Route::get('list', 'index');
        Route::get('create', 'create');
        Route::post('store', 'store');
        Route::get('edit/{id}', 'edit');
        Route::post('update/{id}', 'update');
        Route::get('delete/{id}', 'delete');
        Route::get('{id}', 'show');
        Route::get('details', 'userDetails');
    });
});
