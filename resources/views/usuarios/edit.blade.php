@extends('layouts.vertical', ['title' => 'Editar usuario'])

@section('content')
<div class="row"><div class="col-sm-12"><div class="page-title-box"><h4 class="page-title">Editar usuario</h4></div></div></div>
<div class="card"><div class="card-body">
    @include('usuarios.form', ['action' => route('usuarios.update', $usuario), 'method' => 'PUT', 'submit' => 'Guardar cambios'])
</div></div>
@endsection
