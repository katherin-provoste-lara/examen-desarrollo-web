@extends('layouts.vertical', ['title' => 'Usuarios'])

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
            <h4 class="page-title">Usuarios</h4>
            <a href="{{ route('usuarios.create') }}" class="btn btn-primary"><i class="fas fa-plus me-1"></i>Nuevo usuario</a>
        </div>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card">
    <div class="card-header"><h4 class="card-title mb-0">Usuarios registrados</h4></div>
    <div class="card-body pt-0">
        <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead class="table-light">
                    <tr><th>RUT</th><th>Nombre</th><th>Email</th><th>Registro</th><th class="text-end">Acciones</th></tr>
                </thead>
                <tbody>
                @forelse($usuarios as $usuario)
                    <tr>
                        <td>{{ $usuario->rut }}</td>
                        <td>{{ $usuario->name }} {{ $usuario->lastname }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td>{{ $usuario->created_at?->format('d/m/Y') }}</td>
                        <td class="text-end">
                            <a href="{{ route('usuarios.show', $usuario) }}" class="btn btn-sm btn-soft-info">Ver</a>
                            <a href="{{ route('usuarios.edit', $usuario) }}" class="btn btn-sm btn-soft-warning">Editar</a>
                            <form action="{{ route('usuarios.destroy', $usuario) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-soft-danger" onclick="return confirm('¿Eliminar este usuario?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="text-center text-muted py-4">No hay usuarios registrados.</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
