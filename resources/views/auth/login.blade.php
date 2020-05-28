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



<!--
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

-->
@endsection