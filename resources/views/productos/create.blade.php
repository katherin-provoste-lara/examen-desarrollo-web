@extends('layouts.vertical', ['title' => 'Nuevo producto'])

@section('content')
<div class="container">
    <h1>Nuevo Producto</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>SKU</label>
            <input type="text" name="sku" class="form-control" value="{{ old('sku') }}" required>
        </div>

        <div class="mb-3">
            <label>Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}" required>
        </div>

        <div class="mb-3">
            <label>Descripción corta</label>
            <input type="text" name="descripcion_corta" class="form-control" value="{{ old('descripcion_corta') }}" required>
        </div>

        <div class="mb-3">
            <label>Descripción larga</label>
            <textarea name="descripcion_larga" class="form-control" required>{{ old('descripcion_larga') }}</textarea>
        </div>

        <div class="mb-3">
            <label>Imagen</label>
            <input type="file" name="imagen" class="form-control" accept="image/*" required>
        </div>

        <div class="mb-3">
            <label>Precio Neto</label>
            <input type="number" step="0.01" name="precio_neto" class="form-control" value="{{ old('precio_neto') }}" required>
            <small class="text-muted">El precio de venta (con IVA 19%) se calcula automáticamente.</small>
        </div>

        <div class="row">
            <div class="col mb-3">
                <label>Stock actual</label>
                <input type="number" name="stock_actual" class="form-control" value="{{ old('stock_actual') }}" required>
            </div>
            <div class="col mb-3">
                <label>Stock mínimo</label>
                <input type="number" name="stock_minimo" class="form-control" value="{{ old('stock_minimo') }}" required>
            </div>
            <div class="col mb-3">
                <label>Stock bajo</label>
                <input type="number" name="stock_bajo" class="form-control" value="{{ old('stock_bajo') }}" required>
            </div>
            <div class="col mb-3">
                <label>Stock alto</label>
                <input type="number" name="stock_alto" class="form-control" value="{{ old('stock_alto') }}" required>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('productos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
