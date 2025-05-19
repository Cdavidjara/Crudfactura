<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\FacturaDetalleController;

Route::get('/', function () {
    return view('welcome');
});

// Rutas para CRUD con recursos
Route::resource('clientes', ClienteController::class);
Route::resource('productos', ProductoController::class);
Route::resource('facturas', FacturaController::class);
Route::resource('factura_detalles', FacturaDetalleController::class);
