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

Route::get('/productos_json', [ProductoController::class, 'index'])
->name('productos.listado');

// Mostrar formulario
Route::get('/productos/create', [ProductoController::class, 'formulario_crear'])
    ->name('productos.formulario_crear');

// Guardar producto
Route::post('/productos', [ProductoController::class, 'crear_registro'])
    ->name('productos.crear_registro');

// Eliminar producto
Route::delete('/productos/{id}', [ProductoController::class, 'eliminar_registro'])
    ->name('productos.eliminar_registro');

// Mostrar formulario de edición
Route::get('/productos/{id}/edit', [ProductoController::class, 'formulario_editar'])
    ->name('productos.formulario_editar');

// Actualizar producto
Route::put('/productos/{id}', [ProductoController::class, 'actualizar_registro'])
    ->name('productos.actualizar_registro');