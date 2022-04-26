<?php

use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\PruebasController;

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
Route::view('/', 'welcome');

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::delete('/logout', [UserController::class, 'logout']);

    Route::post('/enviar_solicitud/{user}', [ProveedorController::class, 'enviarSolicitud']);
    Route::put('/aprobar_solicitud/{proveedor}', [AdminController::class, 'aprobarSolicitud']);
    
    Route::delete('/proveedor/{proveedor}', [ProveedorController::class, 'destroy']);
    
    Route::middleware('admin')->group(function () {
        Route::get('/pruebas', [PruebasController::class, 'prueba']);
    });
});


Route::get('/proveedores', [ProveedorController::class, 'index']);

