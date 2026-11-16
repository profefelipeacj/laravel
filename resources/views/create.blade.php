<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear producto</title>
</head>
<body>

    <h1>Registrar nuevo producto</h1>

    @if(session('success'))
        <p style="color: green;">
            {{ session('success') }}
        </p>
    @endif

    @if($errors->any())
        <div style="color: red;">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('productos.crear_registro') }}" method="POST">

        @csrf

        <div>
            <label for="nombre">Nombre del producto:</label>
            <input
                type="text"
                name="nombre"
                id="nombre"
                value="{{ old('nombre') }}"
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
                value="{{ old('precio') }}"
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
                value="{{ old('stock') }}"
                min="0"
                step="1"
                required
            >
        </div>

        <br>

        <button type="submit">Guardar producto</button>

    </form>

</body>
</html>
