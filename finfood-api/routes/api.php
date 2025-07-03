<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('clients', \App\Http\Controllers\ClientController::class);
Route::apiResource('dishes', \App\Http\Controllers\DishController::class);
Route::apiResource('clientRequests', \App\Http\Controllers\RequestController::class);
Route::get('stats', [\App\Http\Controllers\DashboardController::class, 'stats']);




// Rota pública para registrar um novo usuário
Route::post('/register', [AuthController::class, 'register']);

// Rota pública para realizar o login
Route::post('/login', [AuthController::class, 'login']);

// Grupo de rotas que exigem autenticação via Sanctum
Route::middleware('auth:sanctum')->group(function () {
    // Rota para realizar o logout
    Route::post('/logout', [AuthController::class, 'logout']);

     Route::get('/user', function (Request $request) {
         return $request->user();
     });
});
