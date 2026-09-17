@extends('layouts.vertical', ['title' => 'Detalle de producto'])

@section('content')
<div class="row"><div class="col-sm-12"><div class="page-title-box"><h4 class="page-title">Detalle de producto</h4></div></div></div>
<div class="card"><div class="card-body">
    <div class="row">
        @if($producto->imagen)<div class="col-md-3"><img src="{{ Storage::url($producto->imagen) }}" class="img-fluid rounded" alt="{{ $producto->nombre }}"></div>@endif
        <div class="col-md-9"><dl class="row mb-0">
            <dt class="col-sm-4">SKU</dt><dd class="col-sm-8">{{ $producto->sku }}</dd>
            <dt class="col-sm-4">Nombre</dt><dd class="col-sm-8">{{ $producto->nombre }}</dd>
            <dt class="col-sm-4">Descripción corta</dt><dd class="col-sm-8">{{ $producto->descripcion_corta }}</dd>
            <dt class="col-sm-4">Descripción larga</dt><dd class="col-sm-8">{{ $producto->descripcion_larga }}</dd>
            <dt class="col-sm-4">Precio neto</dt><dd class="col-sm-8">${{ number_format($producto->precio_neto, 0, ',', '.') }}</dd>
            <dt class="col-sm-4">Precio venta</dt><dd class="col-sm-8">${{ number_format($producto->precio_venta, 0, ',', '.') }}</dd>
            <dt class="col-sm-4">Stock</dt><dd class="col-sm-8">{{ $producto->stock_actual }}</dd>
        </dl></div>
    </div>
    <a href="{{ route('productos.index') }}" class="btn btn-light mt-3">Volver</a>
    <a href="{{ route('productos.edit', $producto) }}" class="btn btn-primary mt-3">Editar</a>
</div></div>
@endsection
