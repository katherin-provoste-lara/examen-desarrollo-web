<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Http\Requests\StoreClienteRequest;
use App\Http\Requests\UpdateClienteRequest;

class ClienteController extends Controller
{
    public function index()
    {
        return response()->json(Client::all(), 200);
    }

    public function store(StoreClienteRequest $request)
    {
        $cliente = Client::create($request->validated());
        return response()->json($cliente, 201); // Created
    }

    public function show(Client $cliente)
    {
        return response()->json($cliente, 200);
    }

    public function update(UpdateClienteRequest $request, Client $cliente)
    {
        $cliente->update($request->validated());
        return response()->json($cliente, 200);
    }

    public function destroy(Client $cliente)
    {
        $cliente->delete();
        return response()->json(null, 204); // No Content
    }
}
