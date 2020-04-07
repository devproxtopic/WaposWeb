@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Cambiar Contraseña</div>
                <div class="card-body">
                    <form method="POST" action="{{ url('/update-password') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="current_password" class="col-md-4 col-form-label text-md-right">Contraseña actual</label>

                            <div class="col-md-6">
                                <input required id="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password"
                                 autocomplete="current_password" autofocus>

                                @error('current_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Nueva Contraseña</label>

                            <div class="col-md-6">
                                <input required id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                                 autocomplete="password" autofocus>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm " class="col-md-4 col-form-label text-md-right">Confirme Nueva Contraseña</label>

                            <div class="col-md-6">
                                <input required id="password-confirm " type="password" class="form-control @error('password-confirm ') is-invalid @enderror"
                                name="password_confirmation" autocomplete="password-confirm " autofocus>

                            </div>
                        </div>

                        <div class="form-group row mb-0 text-right">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    Guardar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
