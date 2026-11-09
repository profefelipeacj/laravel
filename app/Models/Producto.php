<?php

namespace App\Models;

class Producto
{
    public static function obtenerTodos()
    {
        $ruta = database_path('productos.json');

        $contenido = file_get_contents($ruta);

        return json_decode($contenido);
    }
}
