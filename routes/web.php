<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::any('{any}', function () {
    return response()->json([
        'message' => 'Route not found bro',
        'owner' => 'https://www.github.com/FigoArbiansyah',
    ], 404);
})->where('any', '.*');
