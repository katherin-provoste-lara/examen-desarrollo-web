@extends('layouts.vertical', ['title' => 'Detalle de usuario'])

@section('content')
<div class="row"><div class="col-sm-12"><div class="page-title-box"><h4 class="page-title">Detalle de usuario</h4></div></div></div>
<div class="card"><div class="card-body">
    <dl class="row mb-0">
        <dt class="col-sm-3">RUT</dt><dd class="col-sm-9">{{ $usuario->rut }}</dd>
        <dt class="col-sm-3">Nombre</dt><dd class="col-sm-9">{{ $usuario->name }} {{ $usuario->lastname }}</dd>
        <dt class="col-sm-3">Email</dt><dd class="col-sm-9">{{ $usuario->email }}</dd>
        <dt class="col-sm-3">Registrado</dt><dd class="col-sm-9">{{ $usuario->created_at?->format('d/m/Y H:i') }}</dd>
    </dl>
    <a href="{{ route('usuarios.index') }}" class="btn btn-light mt-3">Volver</a>
    <a href="{{ route('usuarios.edit', $usuario) }}" class="btn btn-primary mt-3">Editar</a>
</div></div>
@endsection
