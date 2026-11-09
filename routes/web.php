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
