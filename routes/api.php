<?php

use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function() {
    Route::prefix('tasks')->group(function() {
        Route::get('/', [TaskController::class, 'index'])->name('get.tasks');
        Route::get('/{id}', [TaskController::class, 'show'])->name('get.tasks_detail');
        Route::post('/', [TaskController::class, 'store'])->name('add.tasks');
        Route::post('/{id}', [TaskController::class, 'update'])->name('update.tasks');
        Route::delete('/{id}', [TaskController::class, 'delete'])->name('delete.tasks');
    });
});
