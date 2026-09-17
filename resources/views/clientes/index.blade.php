@extends('layouts.vertical', ['title' => 'Clientes'])

@section('content')
<div class="container">
    <h1>Clientes</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('clientes.create') }}" class="btn btn-primary mb-3">Nuevo Cliente</a>

    <table class="table">
        <thead>
            <tr>
                <th>RUT Empresa</th>
                <th>Razón Social</th>
                <th>Rubro</th>
                <th>Contacto</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clientes as $cliente)
            <tr>
                <td>{{ $cliente->rut_empresa }}</td>
                <td>{{ $cliente->razon_social }}</td>
                <td>{{ $cliente->rubro }}</td>
                <td>{{ $cliente->nombre_contacto }}</td>
                <td>{{ $cliente->telefono }}</td>
                <td>
                    <a href="{{ route('clientes.show', $cliente) }}" class="btn btn-sm btn-info">Ver</a>
                    <a href="{{ route('clientes.edit', $cliente) }}" class="btn btn-sm btn-warning">Editar</a>
                    <form action="{{ route('clientes.destroy', $cliente) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar este cliente?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
