<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ClienteController;

Route::get('/clientes', [ClienteController::class, 'listar']);
Route::post('/clientes', [ClienteController::class, 'crear']);
Route::get('/clientes/{cliente}', [ClienteController::class, 'ver']);
Route::put('/clientes/{cliente}', [ClienteController::class, 'actualizar']);
Route::patch('/clientes/{cliente}', [ClienteController::class, 'actualizar']);
Route::delete('/clientes/{cliente}', [ClienteController::class, 'eliminar']);