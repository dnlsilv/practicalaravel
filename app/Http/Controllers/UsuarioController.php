<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    // Muestra la lista de usuarios
    public function index()
    {
        $usuarios = Usuario::all();
        return view('usuarios.index', compact('usuarios'));
    }

    // Muestra el formulario para crear un nuevo usuario
    public function create()
    {
        return view('usuarios.create');
    }

    // Guarda un nuevo usuario en la base de datos
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|max:255',
            'email' => 'required|email|unique:usuarios,email',
            'password' => 'required|min:6',
        ]);

        // Asegúrate de encriptar la contraseña antes de guardarla
        $validatedData['password'] = Hash::make($validatedData['password']);

        Usuario::create($validatedData);
        return redirect()->route('usuarios.index')->with('success', 'Usuario creado con éxito.');
    }

    // Muestra un usuario específico
    public function show(Usuario $usuario)
    {
        return view('usuarios.show', compact('usuario'));
    }

    // Muestra el formulario para editar un usuario existente
    public function edit(Usuario $usuario)
    {
        return view('usuarios.edit', compact('usuario'));
    }

    // Actualiza un usuario en la base de datos
    public function update(Request $request, Usuario $usuario)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|max:255',
            'email' => 'required|email|unique:usuarios,email,' . $usuario->id,
            // No incluimos password aquí para no obligar a actualizarlo en cada edición
        ]);

        // Si se proporciona una nueva contraseña, actualízala
        if ($request->filled('password')) {
            $validatedData['password'] = Hash::make($request->password);
        }

        $usuario->update($validatedData);
        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado con éxito.');
    }

    // Elimina un usuario de la base de datos
    public function destroy(Usuario $usuario)
    {
        $usuario->delete();
        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado con éxito.');
    }
}
