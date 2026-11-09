<?php

namespace App\Http\Controllers;
// Importando el modelo...
use App\Models\Producto;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::obtenerTodos();

        return view('productos', compact('productos'));
    }
}
