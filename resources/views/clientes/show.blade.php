@extends('layouts.vertical', ['title' => 'Detalle de cliente'])

@section('content')
<div class="row"><div class="col-sm-12"><div class="page-title-box"><h4 class="page-title">Detalle de cliente</h4></div></div></div>
<div class="card"><div class="card-body">
    <dl class="row mb-0">
        <dt class="col-sm-3">RUT empresa</dt><dd class="col-sm-9">{{ $cliente->rut_empresa }}</dd>
        <dt class="col-sm-3">Razón social</dt><dd class="col-sm-9">{{ $cliente->razon_social }}</dd>
        <dt class="col-sm-3">Rubro</dt><dd class="col-sm-9">{{ $cliente->rubro }}</dd>
        <dt class="col-sm-3">Contacto</dt><dd class="col-sm-9">{{ $cliente->nombre_contacto }}</dd>
        <dt class="col-sm-3">Email</dt><dd class="col-sm-9">{{ $cliente->email_contacto }}</dd>
        <dt class="col-sm-3">Teléfono</dt><dd class="col-sm-9">{{ $cliente->telefono }}</dd>
        <dt class="col-sm-3">Dirección</dt><dd class="col-sm-9">{{ $cliente->direccion }}</dd>
    </dl>
    <a href="{{ route('clientes.index') }}" class="btn btn-light mt-3">Volver</a>
    <a href="{{ route('clientes.edit', $cliente) }}" class="btn btn-primary mt-3">Editar</a>
</div></div>
@endsection
