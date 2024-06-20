<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\EmpleadoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ServicioController;

Route::get('/empleado', [EmpleadoController::class, 'index']);

Route::get('/empleado/{id}', [EmpleadoController::class, 'show']);

Route::post('/empleado', [EmpleadoController::class, 'store']);

Route::put('/empleado/{id}', [EmpleadoController::class, 'update']);

Route::delete('/empleado/{id}', [EmpleadoController::class, 'destroy']);



Route::get('/cliente',[ClienteController::class,'general']);

Route::get('/cliente/{id}', [ClienteController::class, 'show']);

Route::post('/cliente', [ClienteController::class, 'store']);

Route::put('/cliente/{id}', [ClienteController::class, 'update']);

Route::delete('/cliente/{id}', [ClienteController::class, 'destroy']);



Route::get('/servicio',[ServicioController::class,'general']);

Route::get('/servicio/{id}', [ServicioController::class, 'show']);

Route::post('/servicio', [ServicioController::class, 'store']);

Route::put('/servicio/{id}', [ServicioController::class, 'update']);

Route::delete('/servicio/{id}', [ServicioController::class, 'destroy']);