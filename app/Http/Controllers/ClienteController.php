<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Http\Requests\StoreClienteRequest;
use App\Http\Requests\UpdateClienteRequest;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Client::all();
        return view('clientes.index', compact('clientes'));
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(StoreClienteRequest $request)
    {
        Client::create($request->validated());
        return redirect()->route('clientes.index')->with('success', 'Cliente creado correctamente');
    }

    public function show(Client $cliente)
    {
        return view('clientes.show', compact('cliente'));
    }

    public function edit(Client $cliente)
    {
        return view('clientes.edit', compact('cliente'));
    }

    public function update(UpdateClienteRequest $request, Client $cliente)
    {
        $data = $request->validated();
        if (empty($data['password'])) {
            unset($data['password']);
        }
        $cliente->update($data);
        return redirect()->route('clientes.index')->with('success', 'Cliente actualizado');
    }

    public function destroy(Client $cliente)
    {
        $cliente->delete();
        return redirect()->route('clientes.index')->with('success', 'Cliente eliminado');
    }
}
