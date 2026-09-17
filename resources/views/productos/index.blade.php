@extends('layouts.vertical', ['title' => 'Productos'])

@section('content')
<div class="container">
    <h1>Productos</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('productos.create') }}" class="btn btn-primary mb-3">Nuevo Producto</a>

    <table class="table">
        <thead>
            <tr>
                <th>SKU</th>
                <th>Nombre</th>
                <th>Precio Neto</th>
                <th>Precio Venta</th>
                <th>Stock</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
            <tr>
                <td>{{ $producto->sku }}</td>
                <td>{{ $producto->nombre }}</td>
                <td>${{ number_format($producto->precio_neto, 0, ',', '.') }}</td>
                <td>${{ number_format($producto->precio_venta, 0, ',', '.') }}</td>
                <td>{{ $producto->stock_actual }}</td>
                <td>
                    @php
                        $stockClass = $producto->stock_actual <= $producto->stock_minimo
                            ? 'text-danger bg-danger-subtle'
                            : ($producto->stock_actual <= $producto->stock_bajo
                                ? 'text-warning bg-warning-subtle'
                                : 'text-success bg-success-subtle');
                    @endphp
                    <span class="badge {{ $stockClass }}">{{ $producto->stock_actual <= $producto->stock_minimo ? 'Crítico' : ($producto->stock_actual <= $producto->stock_bajo ? 'Bajo' : 'Normal') }}</span>
                </td>
                <td>
                    <a href="{{ route('productos.show', $producto) }}" class="btn btn-sm btn-info">Ver</a>
                    <a href="{{ route('productos.edit', $producto) }}" class="btn btn-sm btn-warning">Editar</a>
                    <form action="{{ route('productos.destroy', $producto) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar este producto?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
