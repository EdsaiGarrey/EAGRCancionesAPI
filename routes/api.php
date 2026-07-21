<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CancionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json([
        'message' => 'API de canciones funcionando correctamente.',
        'status' => 'online',
        'version' => '1.0',
        'endpoints' => [
            'register' => '/api/register',
            'login' => '/api/login',
            'canciones' => '/api/canciones',
        ],
    ]);
});

Route::post(
    '/register',
    [AuthController::class, 'register']
);

Route::post(
    '/login',
    [AuthController::class, 'login']
);

Route::middleware('auth:sanctum')->group(function () {
    Route::get(
        '/me',
        [AuthController::class, 'me']
    );

    Route::post(
        '/logout',
        [AuthController::class, 'logout']
    );

    Route::apiResource(
        'canciones',
        CancionController::class
    );
});