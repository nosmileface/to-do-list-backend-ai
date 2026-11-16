<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

Route::prefix('login')->name('login.')->group(function() {
    Route::get('/', [
        Controllers\Auth\AuthController::class, 'show'
    ])->name('show');

    Route::post('login', [
        Controllers\Auth\AuthController::class, 'login'
    ])->name('login');
});

Route::middleware('auth')->group(function() {

    // Tasks
    Route::prefix('tasks')->name('tasks.')->group(function() {

        Route::get('/', [
            Controllers\Task\TaskController::class, 'index'
        ])->name('index');

        Route::get('{task}', [
            Controllers\Task\TaskController::class, 'show'
        ])->name('show');

        Route::get('create', [
            Controllers\Task\TaskController::class, 'create'
        ])->name('create');

        Route::post('store', [
            Controllers\Task\TaskController::class, 'store'
        ])->name('store');

        Route::get('{task}/edit', [
            Controllers\Task\TaskController::class, 'edit'
        ])->name('edit');

        Route::put('{task}', [
            Controllers\Task\TaskController::class, 'update'
        ])->name('update');

        Route::delete('{task}', [
            Controllers\Task\TaskController::class, ''
        ])->name('destroy');

    });

    Route::post('logout', [
        Controllers\Auth\AuthController::class, 'logout'
    ])->name('logout');

});
