<?php

namespace App\Models;

class Producto
{
    public static function obtenerTodos(){
        $ruta = database_path('productos.json');

        $contenido = file_get_contents($ruta);

        return json_decode($contenido);
    }

    
public static function crear($datos){

    $productos = self::obtenerTodos();

    // Obtener el siguiente ID
    $ultimoId = 0;

    foreach ($productos as $producto) {
        if ($producto->id > $ultimoId) {
            $ultimoId = $producto->id;
        }
    }

    // Crear el nuevo producto
    $nuevoProducto = [
        'id' => $ultimoId + 1,
        'nombre' => $datos['nombre'],
        'precio' => $datos['precio'],
        'stock' => $datos['stock']
    ];

    // Agregar el nuevo elemento
    $productos[] = (object) $nuevoProducto;

    // Guardar nuevamente el JSON
    file_put_contents(
        database_path('productos.json'),
        json_encode(
            $productos,
            JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE
        ),
        LOCK_EX
    );

    return $nuevoProducto;
}

public static function eliminar($id){

    // Obtener todos los productos
    $productos = self::obtenerTodos();

    // Filtrar los productos, dejando todos menos el que tenga ese ID
    $productosFiltrados = array_filter($productos, function($producto) use ($id) {
        return $producto->id != $id; // 6 != 6 ---- Lo descarta
    });

    // Reorganizar los índices del arreglo
    $productosFiltrados = array_values($productosFiltrados);

    // Guardar nuevamente el JSON
    file_put_contents(
        database_path('productos.json'),
        json_encode(
            $productosFiltrados,
            JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE
        ),
        LOCK_EX
    );

    return true;
}

}
