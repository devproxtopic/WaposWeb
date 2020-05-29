@extends('layouts.login_app')

@section('content')
<form action="{{ url('/update-password') }}" method="POST">
    @csrf
    <div class=" w3l-form-group">
        <label>Contraseña actual:</label>
        <div class="group">
            <i class="fas fa-unlock"></i>
            <input type="password" id="current_password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" required="required" placeholder="Contraseña actual" />
        </div>
    </div>

    @error('current_password')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror

    <div class=" w3l-form-group">
        <label>Nueva contraseña:</label>
        <div class="group">
            <i class="fas fa-unlock"></i>
            <input required="required" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required="required" />
        </div>
    </div>

    @error('password')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror

    <div class=" w3l-form-group">
        <label>Confirmar nueva contraseña:</label>
        <div class="group">
            <i class="fas fa-unlock"></i>
            <input required="required" id="password-confirm " type="password" class="form-control @error('password-confirm ') is-invalid @enderror" name="password_confirmation" placeholder="Confirme nueva contraseña" required="required" />
        </div>
    </div>
    <button type="submit">Guardar</button>
</form>


@endsection