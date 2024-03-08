<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    // Muestra una lista de todos los productos
    public function index()
    {
        $productos = Producto::all();
        return view('productos.index', compact('productos'));
    }

    // Muestra el formulario para crear un nuevo producto
    public function create()
    {
        return view('productos.create');
    }

    // Guarda un nuevo producto en la base de datos
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|max:255',
            'descripcion' => 'required',
            'precio' => 'required|numeric',
            
        ]);

        Producto::create($validatedData);
        return redirect()->route('productos.index')->with('success', 'Producto creado con éxito.');
    }

    // Muestra un producto específico por su ID
    public function show(Producto $producto)
    {
        $producto->load('categoria', 'comentarios.usuario');

        return view('productos.show', compact('producto'));
    }

    // Muestra el formulario para editar un producto existente
    public function edit(Producto $producto)
    {
        return view('productos.edit', compact('producto'));
    }

    // Actualiza un producto en la base de datos
    public function update(Request $request, Producto $producto)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|max:255',
            'descripcion' => 'required',
            'precio' => 'required|numeric',
            
        ]);

        $producto->update($validatedData);
        return redirect()->route('productos.index')->with('success', 'Producto actualizado con éxito.');
    }

    // Elimina un producto de la base de datos
    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('productos.index')->with('success', 'Producto eliminado con éxito.');
    }

    // Carga los elementos relacionados de otro modelo, como comentarios de un producto
    public function comentarios($id)
    {
        $producto->load('comentarios.usuario'); // Asegurándonos de cargar también el usuario que hizo cada comentario
        return view('productos.comentarios', compact('producto'));
    }
}
