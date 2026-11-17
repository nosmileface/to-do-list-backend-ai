<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Task\TaskController;

Route::get('/', function () {
    return auth()->check()
        ? redirect()->route('tasks.index')
        : redirect()->route('login.show');
})->name('home');

Route::middleware('guest')->prefix('login')->name('login.')->group(function () {

    Route::get('/', [
        AuthController::class, 'show'
    ])->name('show');

    Route::post('/', [
        AuthController::class, 'login'
    ])->name('login');

});

Route::middleware('auth')->group(function () {

    Route::prefix('tasks')->name('tasks.')->group(function () {

        Route::get('/', [
            TaskController::class, 'index'
        ])->name('index');

        Route::get('/create', [
            TaskController::class, 'create'
        ])->name('create');

        Route::post('/', [
            TaskController::class, 'store'
        ])->name('store');

        Route::get('/{task}', [
            TaskController::class, 'show'
        ])->name('show');

        Route::get('/{task}/edit', [
            TaskController::class, 'edit'
        ])->name('edit');

        Route::put('/{task}', [
            TaskController::class, 'update'
        ])->name('update');

        Route::delete('/{task}', [
            TaskController::class, 'destroy'
        ])->name('destroy');

        Route::put('/{task}/toggle', [
            TaskController::class, 'toggle'
        ])->name('toggle');

    });

    Route::post('/logout', [
        AuthController::class, 'logout'
    ])->name('logout');

});
