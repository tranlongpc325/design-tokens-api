<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/v1/themes/active', [App\Http\Controllers\ThemeTokenController::class, 'getActiveTheme']);
Route::patch('/v1/themes/activate', [App\Http\Controllers\ThemeTokenController::class, 'activateTheme']);
