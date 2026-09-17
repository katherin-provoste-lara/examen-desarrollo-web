@extends('layouts.vertical', ['title' => 'Nuevo usuario'])

@section('content')
<div class="row"><div class="col-sm-12"><div class="page-title-box"><h4 class="page-title">Nuevo usuario</h4></div></div></div>
<div class="card"><div class="card-body">
    @include('usuarios.form', ['action' => route('usuarios.store'), 'method' => 'POST', 'submit' => 'Crear usuario'])
</div></div>
@endsection
