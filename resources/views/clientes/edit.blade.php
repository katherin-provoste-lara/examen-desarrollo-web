@extends('layouts.vertical', ['title' => 'Editar cliente'])

@section('content')
<div class="container">
    <h1>Editar Cliente</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('clientes.update', $cliente) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>RUT Empresa</label>
            <input type="text" name="rut_empresa" class="form-control" value="{{ old('rut_empresa', $cliente->rut_empresa) }}" required>
        </div>

        <div class="mb-3">
            <label>Rubro</label>
            <input type="text" name="rubro" class="form-control" value="{{ old('rubro', $cliente->rubro) }}" required>
        </div>

        <div class="mb-3">
            <label>Razón Social</label>
            <input type="text" name="razon_social" class="form-control" value="{{ old('razon_social', $cliente->razon_social) }}" required>
        </div>

        <div class="mb-3">
            <label>Teléfono</label>
            <input type="text" name="telefono" class="form-control" value="{{ old('telefono', $cliente->telefono) }}" required>
        </div>

        <div class="mb-3">
            <label>Dirección</label>
            <input type="text" name="direccion" class="form-control" value="{{ old('direccion', $cliente->direccion) }}" required>
        </div>

        <div class="mb-3">
            <label>Nombre de contacto</label>
            <input type="text" name="nombre_contacto" class="form-control" value="{{ old('nombre_contacto', $cliente->nombre_contacto) }}" required>
        </div>

        <div class="mb-3">
            <label>Email de contacto</label>
            <input type="email" name="email_contacto" class="form-control" value="{{ old('email_contacto', $cliente->email_contacto) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
