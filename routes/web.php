<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DetalleOrdenController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\OrdenCOntroller;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\TransporteController;
use DragonCode\Contracts\Cashier\Config\Main;

Route::get('/', [MainController::class, 'index'])->name('dashboard');

Route::get('/categoria', [CategoriaController::class, 'index'])->name('categorias');

Route::get('/cliente', [ClienteController::class, 'index'])->name('cliente');

Route::get('/empleado', [EmpleadoController::class, 'index'])->name('empleado');

Route::get('/det_orden', [DetalleOrdenController::class, 'index'])->name('det_orden');

Route::get('/orden', [OrdenCOntroller::class, 'index'])->name('orden');

Route::get('/producto', [ProductoController::class, 'index'])->name('producto');

Route::get('/transporte', [TransporteController::class, 'index'])->name('transporte');

Route::get('/proveedor', [ProveedorController::class, 'index'])->name('proveedor');
