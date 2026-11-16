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
        $productos = self::obtenerTodos(); // this.obtenerTodos()

        // Obtener el siguiente ID
        $ultimoId = 0;
        // Muestra el número de una lista, de un arreglo, ó de 3 números ingresados por teclado.
        foreach ($productos as $producto) {
            if ($producto['id'] > $ultimoId) {
                $ultimoId = $producto['id'];
            }
        }

        // Crear el nuevo producto
        $nuevoProducto = [
            'id' => $ultimoId + 1,
            'nombre' => $datos['nombre'],
            'precio' => $datos['precio'],
            'stock' => $datos['stock']
        ];

        // Agregarlo al arreglo // Agregar un nuevo elemento.
        $productos[] = $nuevoProducto; // lista.append("nuevo elemento")

        // Guardar nuevamente el JSON
        file_put_contents(
            self::rutaArchivo(),
            json_encode(
                $productos,
                JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE
            ),
            LOCK_EX
        );

        return $nuevoProducto;
    }
}
