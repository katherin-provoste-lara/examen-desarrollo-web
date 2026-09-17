<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductoRequest;
use App\Http\Requests\UpdateProductoRequest;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Product::all();
        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        return view('productos.create');
    }

    public function store(StoreProductoRequest $request)
    {
        $data = $request->validated();
        $data['precio_venta'] = round($data['precio_neto'] * 1.19, 2);
        if ($request->hasFile('imagen')) {
            $data['imagen'] = $request->file('imagen')->store('productos', 'public');
        }
        Product::create($data);
        return redirect()->route('productos.index')->with('success', 'Producto creado correctamente');
    }

    public function show(Product $producto)
    {
        return view('productos.show', compact('producto'));
    }

    public function edit(Product $producto)
    {
        return view('productos.edit', compact('producto'));
    }

    public function update(UpdateProductoRequest $request, Product $producto)
    {
        $data = $request->validated();
        $data['precio_venta'] = round($data['precio_neto'] * 1.19, 2);
        if ($request->hasFile('imagen')) {
            $data['imagen'] = $request->file('imagen')->store('productos', 'public');
        } else {
            unset($data['imagen']);
        }
        $producto->update($data);
        return redirect()->route('productos.index')->with('success', 'Producto actualizado');
    }

    public function destroy(Product $producto)
    {
        $producto->delete();
        return redirect()->route('productos.index')->with('success', 'Producto eliminado');
    }
}
