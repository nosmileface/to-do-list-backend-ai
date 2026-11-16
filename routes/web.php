<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Task;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('tasks')->name('tasks.')->group(function() {

    Route::get('/', [
        Task\TaskController::class, 'index'
    ])->name('index');

    Route::get('{task}', [
        Task\TaskController::class, 'show'
    ])->name('show');

    Route::get('create', [
        Task\TaskController::class, 'create'
    ])->name('create');

    Route::post('store', [
        Task\TaskController::class, 'store'
    ])->name('store');

    Route::get('{task}/edit', [
        Task\TaskController::class, 'edit'
    ])->name('edit');

    Route::put('{task}', [
        Task\TaskController::class, 'update'
    ])->name('update');

    Route::delete('{task}', [
        Task\TaskController::class, ''
    ])->name('destroy');

});
