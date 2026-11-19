<?php
use App\Http\Controllers\InicioController;
use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return 'Hola mundo';
});

Route::get('/productos', function () {
    return 'Productos 1,2,3';
});

Route::get('/holaMundoCC', [InicioController::class, 'index']);

Route::get('/productos_json', [ProductoController::class, 'index']);

// Mostrar formulario
Route::get('/productos/create', [ProductoController::class, 'formulario_crear'])
    ->name('productos.formulario_crear');

// Guardar producto
Route::post('/productos', [ProductoController::class, 'crear_registro'])
    ->name('productos.crear_registro');

// Eliminar producto
Route::delete('/productos/{id}', [ProductoController::class, 'eliminar_registro'])
    ->name('productos.eliminar_registro');
