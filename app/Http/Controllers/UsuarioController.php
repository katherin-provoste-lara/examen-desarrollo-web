<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUsuarioRequest;
use App\Http\Requests\UpdateUsuarioRequest;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = User::all();
        return view('usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        return view('usuarios.create');
    }

    public function store(StoreUsuarioRequest $request)
    {
        User::create($request->validated()); // password se cifra por el cast 'hashed'
        return redirect()->route('usuarios.index')->with('success', 'Usuario creado correctamente');
    }

    public function show(User $usuario)
    {
        return view('usuarios.show', compact('usuario'));
    }

    public function edit(User $usuario)
    {
        return view('usuarios.edit', compact('usuario'));
    }

    public function update(UpdateUsuarioRequest $request, User $usuario)
    {
        $data = $request->validated();
        if (empty($data['password'])) {
            unset($data['password']);
        }
        $usuario->update($data);
        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado');
    }

    public function destroy(User $usuario)
    {
        $usuario->delete();
        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado');
    }
}
