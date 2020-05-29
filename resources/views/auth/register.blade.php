@extends('layouts.register_app')

@section('content')
<div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">
    <form class="login100-form validate-form" method="POST" action="{{ route('register') }}">
        @csrf
        <span class="login100-form-title p-b-39">
            <img src="{{ URL::asset('images/WAPOS.png')}}" alt="logo" style="width: 300px;">
            </br>
            Registro

        </span>

        <div class="wrap-input100 validate-input" data-validate="Nombre es requerido">
            <span class="label-input100">Nombre</span>
            <input class="input100 @error('name') is-invalid @enderror" placeholder="Ej. Mariela " type="text" name="name" value="{{ old('name') }}" required>
            <span class="focus-input100"></span>
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="wrap-input100 validate-input" data-validate="Apellido es requerido">
            <span class="label-input100">Apellido</span>
            <input class="input100  @error('lastname') is-invalid @enderror" type="text" name="lastname" id="lastname" placeholder="Apellido" required>
            <span class="focus-input100"></span>
            @error('lastname')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="validate-input" data-validate="Teléfono es requerido">
            <span class="label-input100">Teléfono</span>
            <div class="form-group row">

                <div class="col-md-5">
                    <select name="ladanumber" id="ladanumber" class="form-control">
                        <option value="+52">MEX +52</option>
                        <option value="+59">UY +59</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <input type="number" class="form-control" name="phone" id="phone" placeholder="Número*" required autofocus>
                    @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>



        <div class="wrap-input100 validate-input" data-validate="Email es requerido">
            <span class="label-input100">Email</span>
            <input class="input100 @error('email') is-invalid @enderror" type="email" name="email" placeholder="Email@..." required>
            <span class="focus-input100"></span>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
      
            
    

        <div class="wrap-input100 validate-input" data-validate="Password is required">
            <span class="label-input100">Contraseña</span>
            <input class="input100 @error('password') is-invalid @enderror" type="password" name="password" required placeholder="*************">
            <span class="focus-input100"></span>
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="wrap-input100 validate-input" data-validate="Repeat Password is required">
            <span class="label-input100">Confirmar contraseña</span>
            <input id="password-confirm" type="password" class="input100" name="password_confirmation" placeholder="*************" required>
            <span class="focus-input100"></span>
        </div>

        <div class="flex-m w-full p-b-33">
            <div class="contact100-form-checkbox">
                <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me" >
                <label class="label-checkbox100" for="ckb1">
                    <span class="txt1">
                        Estoy de acuerdo con los
                        <a href="#" class="txt2 hov1">
                            Términos y Condiciones
                        </a>
                    </span>
                </label>
            </div>


        </div>

        <div class="container-login100-form-btn">
            <div class="wrap-login100-form-btn">
                <div class="login100-form-bgbtn"></div>
                <button class="login100-form-btn">
                    Registrarme
                </button>
            </div>

            <a href="{{ route('login') }}" class="dis-block txt3 hov1 p-r-30 p-t-10 p-b-10 p-l-30">
                Acceder
                <i class="fa fa-long-arrow-right m-l-5"></i>
            </a>
        </div>
    </form>
</div>
<!--
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-grow-early">
                <div class="card-header">Registrate</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                
        

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    Registrate
                                </button>

                                <a class="btn btn-link text-right" href="{{ route('login') }}">
                                    ¿Ya tienes una cuenta? Inicia Sesión
                                </a>

                                <a class="btn btn-link text-right" href="{{ url('password/reset') }}">
                                    ¿No puedes ingresar? Restablecer Contraseña
                                </a>
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