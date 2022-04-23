<?php

use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProveedorController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/register', [UserController::class, 'register']);
    Route::post('/login', [UserController::class, 'login']);
    Route::delete('/logout/{user}', [UserController::class, 'logout']);

    Route::post('/enviar_solicitud/{user}', [ProveedorController::class, 'enviarSolicitud']);
    Route::put('/aprobar_solicitud/{proveedor}', [AdminController::class, 'aprobarSolicitud']);
    
    Route::delete('/proveedor/{proveedor}', [ProveedorController::class, 'destroy']);
});

Route::get('/proveedores', [ProveedorController::class, 'index']);

