<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TypeUserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Resources
Route::apiResource('/type_user', TypeUserController::class);
Route::post('/register', [AuthController::class, 'register']);