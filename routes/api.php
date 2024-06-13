<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\EmpleadoController;

Route::get('/empleado', [EmpleadoController::class, 'index']);

Route::get('/empleado/{id}', [EmpleadoController::class, 'show']);

Route::post('/empleado', [EmpleadoController::class, 'store']);

Route::put('/empleado/{id}', [EmpleadoController::class, 'update']);

Route::delete('/empleado/{id}', [EmpleadoController::class, 'destroy']);
