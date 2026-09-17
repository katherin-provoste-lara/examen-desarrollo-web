<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\StoreUsuarioRequest;
use App\Http\Requests\UpdateUsuarioRequest;

class UsuarioController extends Controller
{
    public function index()
    {
        return response()->json(User::all(), 200);
    }

    public function store(StoreUsuarioRequest $request)
    {
        $usuario = User::create($request->validated());
        return response()->json($usuario, 201); // Created
    }

    public function show(User $usuario)
    {
        return response()->json($usuario, 200);
    }

    public function update(UpdateUsuarioRequest $request, User $usuario)
    {
        $usuario->update($request->validated());
        return response()->json($usuario, 200);
    }

    public function destroy(User $usuario)
    {
        $usuario->delete();
        return response()->json(null, 204); // No Content
    }
}
