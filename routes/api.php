<?php

use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\PruebasController;
use App\Http\Controllers\RubroProveedorController;
use App\Http\Controllers\ServicioProveedorController;

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

    Route::post('/enviar_solicitud', [ProveedorController::class, 'enviarSolicitud']);
    Route::put('/proveedor/{proveedor}', [ProveedorController::class, 'update']);

    Route::middleware('admin')->group(function () {
        Route::put('/aprobar_solicitud/{proveedor}', [AdminController::class, 'aprobarSolicitud']);
        Route::get('/solicitudes', [AdminController::class, 'solicitudesPendientes']);
        Route::delete('/proveedor/{proveedor}', [ProveedorController::class, 'destroy']);
        
        Route::middleware('provider')->group(function () {
            Route::post('/servicio', [ServicioProveedorController::class, 'store']);
            Route::put('/servicio/{servicio}', [ServicioProveedorController::class, 'update']);
            Route::put('/estado/servicio/{servicio}', [ServicioProveedorController::class, 'cambiarEstado']);
        });
    });

});

Route::get('/proveedores', [ProveedorController::class, 'index']);
Route::get('/proveedores/{rubro_proveedor_id}', [ProveedorController::class, 'listarPorRubro']);
Route::get('/proveedor/{proveedor}', [ProveedorController::class, 'show']);

Route::get('/rubros', [RubroProveedorController::class, 'index']);
Route::get('/rubro/{rubro}', [RubroProveedorController::class, 'show']);

Route::get('/servicios', [ServicioProveedorController::class, 'index']);
Route::get('/servicios/{proveedor_id}', [ServicioProveedorController::class, 'listarPorProveedor']);
Route::get('/servicio/{servicio}', [ServicioProveedorController::class, 'show']);


Route::get('/pruebas', [PruebasController::class, 'prueba']);


