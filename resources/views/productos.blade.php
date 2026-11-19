<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de productos</title>
</head>
<body>

    <h1>Listado de productos</h1>
    <a href="{{ route('productos.formulario_crear') }}"> Crear Producto</a>
    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>ID</th>
                <th>Producto</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Acción</th>
            </tr>
        </thead>

        <tbody>
            @foreach($productos as $producto)
                <tr>
                    <td>{{ $producto->id }}</td>
                    <td>{{ $producto->nombre }}</td>
                    <td>${{ number_format($producto->precio, 0, ',', '.') }}</td>
                    <td>{{ $producto->stock }}</td>
                    <td>
                        <a href="{{ route('productos.formulario_editar', $producto->id) }}">
                            <button type="button">Editar</button>
                        </a>
                        <form action="{{ route('productos.eliminar_registro', $producto->id) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit" onclick="return confirm('¿Estás seguro de eliminar este producto?')">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
