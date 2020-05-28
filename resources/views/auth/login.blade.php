@extends('layouts.login_app')

@section('content')
<!--<h2>Acceso</h2>-->
<form action="{{ route('login') }}" method="POST">
    @csrf
    <div class=" w3l-form-group">
        <label>Usuario:</label>
        <div class="group">
            <i class="fas fa-user"></i>
            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Username" required="required" />

        </div>
    </div>

    @error('email')

    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>

    @enderror

    <div class=" w3l-form-group">
        <label>Contraseña:</label>
        <div class="group">
            <i class="fas fa-unlock"></i>
            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required="required" />
        </div>
    </div>

    @error('password')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror


    <div class="forgot">
        @if (Route::has('password.request'))
        <a href="{{ route('password.request') }}">
            {{ __('Forgot Your Password?') }}
        </a>
        @endif

        <p><input type="checkbox">Recordar su datos</p>
    </div>
    <button type="submit">Login</button>
</form>
<p class=" w3l-register-p">¿No tienes cuenta?<a href="{{ route('register') }}" class="register"> Registrar</a></p>



@endsection