
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar producto</title>
</head>
<body>

    <h1>Editar producto</h1>

    @if($errors->any())
        <div style="color: red;">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('productos.actualizar_registro', $producto->id) }}" method="POST">

        @csrf
        @method('PUT')

        <div>
            <label for="nombre">Nombre del producto:</label>

            <input
                type="text"
                name="nombre"
                id="nombre"
                value="{{ old('nombre', $producto->nombre) }}"
                required
            >
        </div>

        <br>

        <div>
            <label for="precio">Precio:</label>

            <input
                type="number"
                name="precio"
                id="precio"
                value="{{ old('precio', $producto->precio) }}"
                min="0"
                step="0.01"
                required
            >
        </div>

        <br>

        <div>
            <label for="stock">Stock:</label>

            <input
                type="number"
                name="stock"
                id="stock"
                value="{{ old('stock', $producto->stock) }}"
                min="0"
                step="1"
                required
            >
        </div>

        <br>

        <button type="submit">Guardar cambios</button>

    </form>

    <br>

    <a href="{{ route('productos.listado') }}">
        Volver al listado
    </a>

</body>
</html>
