<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\JobPostingController;
use App\Http\Controllers\TimeController;
use App\Http\Controllers\TypeUserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::middleware(['auth:sanctum'])->group(function () {
    // Ruta para obtener los datos del usuario
    Route::get('/user', function (Request $request) {
        $user = $request->user();
        $imagePath = '/users/' . $user->image;
        $imageUrl = asset('/storage' . $imagePath);
        $user['image'] = $imageUrl;

        return $user;
    });

    Route::post('/update', [AuthController::class, 'update']);
    Route::post('/logout', [AuthController::class, 'logout']);

    // Start routes for Projects
    Route::post('/project-register', [JobPostingController::class, 'store']);
});

// Resources
Route::get('/time', [TimeController::class, 'index']);
Route::apiResource('/type_user', TypeUserController::class);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Start routes for Projects
Route::get('/project', [JobPostingController::class, 'show']);
