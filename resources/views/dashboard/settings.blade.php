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
                    <form id="general_users" method="POST" action="{{ url('/dashboard/settings/update') }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nombre</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" id="name" value='{{$business->name}}' required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="razon_social" class="col-md-4 col-form-label text-md-right">Razón social</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="razon_social" id="razon_social" value='{{$business->razon_social}}' required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="rfc_rut_cuit" class="col-md-4 col-form-label text-md-right">RFC</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="rfc_rut_cuit" id="rfc_rut_cuit" value='{{$business->rfc_rut_cuit}}' required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">Dirección</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="address" id="address" value='{{$business->address}}' required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="postal_code" class="col-md-4 col-form-label text-md-right">Código postal</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="postal_code" id="postal_code" value='{{$business->postal_code}}' required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ladanumber" class="col-md-4 col-form-label text-md-right">Teléfono</label>

                            <div class="col-md-2">
                                <select name="ladanumber" id="ladanumber" class="form-control">
                                    <option value="00">Select</option>
                                    @if($business->ladanumber == '+52')
                                    <option value="+52" selected>México +52</option>
                                    @else
                                    <option value="+52">México +52</option>
                                    @endif
                                    @if($business->ladanumber == '+59')
                                    <option value="+59" selected>Uruguay +59</option>
                                    @else
                                    <option value="+59">Uruguay +59</option>
                                    @endif

                                </select>
                            </div>
                            <div class="col-md-4">
                                <input type="number" class="form-control" name="phone" value='{{$business->phone}}'   onkeypress="return checkPhoneNumber(event)"  id="phone-number-client" placeholder="Número*" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="email" id="email" value='{{$business->email}}' required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="pin" class="col-md-4 col-form-label text-md-right">PIN</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control @error('pin') is-invalid @enderror" name="pin" id="pin" value='{{$business->pin}}' required autofocus>
                            </div>
                            @error('pin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group row">
                            <label for="pin_confirmation" class="col-md-4 col-form-label text-md-right">Confirmación de PIN</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="pin_confirmation" id="pin_confirmation" value='{{$business->pin_confirmation}}' required autofocus>
                            </div>
                        </div>
<!--
                        <div class="form-group row">
                            <label for="country_id" class="col-md-4 col-form-label text-md-right">País</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control @error('country') is-invalid @enderror" name="country" id="country" @if(Auth::user()->country) value="{{ old('country') ?? Auth::user()->country->name }}" @else
                                value="{{ old('country') }}" @endif
                                 autocomplete="country" autofocus>

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
                                value="{{ old('city') }}" @endif  autocomplete="city" autofocus>

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

                                -->

                   

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