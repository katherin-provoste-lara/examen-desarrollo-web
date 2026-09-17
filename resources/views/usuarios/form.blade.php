@if($errors->any())
    <div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>
@endif
<form action="{{ $action }}" method="POST">
    @csrf
    @if($method !== 'POST') @method($method) @endif
    <div class="row">
        <div class="col-md-6 mb-3"><label class="form-label">RUT</label><input name="rut" class="form-control" value="{{ old('rut', $usuario->rut ?? '') }}" required></div>
        <div class="col-md-6 mb-3"><label class="form-label">Nombre</label><input name="name" class="form-control" value="{{ old('name', $usuario->name ?? '') }}" required></div>
        <div class="col-md-6 mb-3"><label class="form-label">Apellido</label><input name="lastname" class="form-control" value="{{ old('lastname', $usuario->lastname ?? '') }}" required></div>
        <div class="col-md-6 mb-3"><label class="form-label">Email corporativo</label><input type="email" name="email" class="form-control" value="{{ old('email', $usuario->email ?? '') }}" placeholder="usuario@ventasfix.cl" required></div>
        <div class="col-md-6 mb-3"><label class="form-label">Contraseña @if($method !== 'POST')<small class="text-muted">(opcional)</small>@endif</label><input type="password" name="password" class="form-control" @if($method === 'POST') required @endif></div>
    </div>
    <a href="{{ route('usuarios.index') }}" class="btn btn-light">Cancelar</a>
    <button class="btn btn-primary">{{ $submit }}</button>
</form>
