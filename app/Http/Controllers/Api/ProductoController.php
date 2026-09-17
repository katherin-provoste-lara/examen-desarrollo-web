<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Requests\StoreProductoRequest;
use App\Http\Requests\UpdateProductoRequest;

class ProductoController extends Controller
{
    public function index()
    {
        return response()->json(Product::all(), 200);
    }

    public function store(StoreProductoRequest $request)
    {
        $data = $request->validated();
        $data['precio_venta'] = round((float) $data['precio_neto'] * 1.19, 2);
        $producto = Product::create($data);
        return response()->json($producto, 201); // Created
    }

    public function show(Product $producto)
    {
        return response()->json($producto, 200);
    }

    public function update(UpdateProductoRequest $request, Product $producto)
    {
        $data = $request->validated();
        $data['precio_venta'] = round((float) $data['precio_neto'] * 1.19, 2);
        $producto->update($data);
        return response()->json($producto, 200);
    }

    public function destroy(Product $producto)
    {
        $producto->delete();
        return response()->json(null, 204); // No Content
    }
}
