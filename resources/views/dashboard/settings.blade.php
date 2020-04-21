@extends('layouts.dashboard')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 id="subtitle-dashboard-wapos">Datos Generales</h3>
                </div>
                <div class="card-body">
                    <form id="general_users" method="POST" action="{{ route('update.general_users', Auth::id()) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nombre</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" id="name" value='{{Auth::user()->name}}' required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lastname" class="col-md-4 col-form-label text-md-right">Apellido</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="lastname" id="lastname" value='{{Auth::user()->lastname}}' required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="email" id="email" value='{{Auth::user()->email}}' required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">Teléfono</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="phone" id="phone" value='{{Auth::user()->phone}}' required autofocus>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="date_of_birth" class="col-md-4 col-form-label text-md-right">Fecha de Nacimiento</label>

                            <div class="col-md-6">
                                <input id="date_of_birth" type="date" class="form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth" value="{{ old('date_of_birth') ?? Auth::user()->date_of_birth }}" required autocomplete="date_of_birth" autofocus>

                                @error('date_of_birth')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="country_id" class="col-md-4 col-form-label text-md-right">País</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control @error('country') is-invalid @enderror" name="country" id="country" @if(Auth::user()->country) value="{{ old('country') ?? Auth::user()->country->name }}" @else
                                value="{{ old('country') }}" @endif
                                required autocomplete="country" autofocus>

                                {{-- <select name="country_id" id="country_id" class="form-control" style="display:none;">
                                    {{-- SE LLENA CON AJAX --}}
                                {{-- </select> --}}

                                @error('country_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="city_id" class="col-md-4 col-form-label text-md-right">Ciudad</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control @error('city') is-invalid @enderror" name="city" id="city" @if(Auth::user()->city) value="{{ old('city') ?? Auth::user()->city->name }}" @else
                                value="{{ old('city') }}" @endif required autocomplete="city" autofocus>

                                {{-- <select name="city_id" id="city_id" class="form-control" style="display:none;"> --}}
                                {{-- SE LLENA CON AJAX --}}
                                {{-- </select> --}}

                                @error('city_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">Género</label>

                            <div class="col-md-6">
                                <select required class="form-control" name="gender" id="gender">
                                    <option value="0">Seleccione una opción</option>
                                    <option @if(Auth::user()->gender == 1) selected @endif value="1">Femenino</option>
                                    <option @if(Auth::user()->gender == 2) selected @endif value="2">Masculino</option>
                                </select>

                                @error('gender')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="profession_id" class="col-md-4 col-form-label text-md-right">Profesión</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control @error('profession') is-invalid @enderror" name="profession" id="profession" @if(Auth::user()->profession) value="{{ old('profession') ?? Auth::user()->profession->name }}" @else
                                value="{{ old('profession') }}" @endif required autocomplete="profession" autofocus>

                                {{-- <select name="profession_id" id="profession_id" class="form-control" style="display:none;"> --}}
                                {{-- SE LLENA CON AJAX --}}
                                {{-- </select> --}}

                                @error('profession_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4 text-right">
                                <button type="submit" class="btn btn-success save-general-user">
                                    Guardar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card">

                <div class="card-header">
                    <h3 id="subtitle-dashboard-wapos">Configuración</h3>
                </div>

                <div class="card-body" style="color: green">
                    <h2 class="display-3"> </h2>
                </div>


            </div>

        </div>
    </div>
</div>
@endsection