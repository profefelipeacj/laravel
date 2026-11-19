<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
// Importando el modelo...
use App\Models\Producto;

class ProductoController extends Controller{
    public function index(){
        $productos = Producto::obtenerTodos();

        return view('productos', compact('productos'));
    }

    // Mostrar formulario de creación
    public function formulario_crear(){
        return view('create');
    }

    // Guardar nuevo producto
    public function crear_registro(Request $request){
        // Validar los datos recibidos
        $datos = $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0'
        ]);

        // Crear el producto mediante el modelo
        Producto::crear($datos);

        // Redireccionar con mensaje de éxito
        return redirect()
            ->route('productos.formulario_crear')
            ->with('success', 'Producto creado correctamente.');
    }

    public function eliminar_registro($id){

        Producto::eliminar($id);

        return redirect()->back();
    }

    public function formulario_editar($id){

        // Buscar el producto por ID
        $producto = Producto::obtenerPorId($id);

        // Si no existe, mostrar error 404
        if (!$producto) {
            abort(404);
        }

        // Abrir la vista de edición
        return view('editar', compact('producto'));
    }

    public function actualizar_registro(Request $request, $id){

        // Validar los campos
        $datos = $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0'
        ]);

        // Actualizar el producto
        $actualizado = Producto::actualizar($id, $datos);

        if (!$actualizado) {
            abort(404);
        }

        // Volver al listado
        return redirect()->route('productos.listado')
            ->with('success', 'Producto actualizado correctamente');
    }
}
