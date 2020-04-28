@extends($business == 1 ? 'layouts.dashboard' : 'layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <h3 id="subtitle-dashboard-wapos">
                    @if ($business == 1)
                        ¡Bienvenido! </h3>
                    @else
                    Registrar negocio</h3>
                    Bienvenido, para comenzar a utilizar nuestro servicio, es necesario que registres tu negocio

                    @endif

                </div>
                
            </div>

            @if ($business == 0)          
            <div class="card">
                <div class="card-header">
                    
                Registrar un nuevo negocio</div>
                <div class="card-body">
                    <form id="" method="POST" action="{{ url('/dashboard/business/create') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="country_id" class="col-md-4 col-form-label text-md-right">Nombre</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" id="name" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="country_id" class="col-md-4 col-form-label text-md-right">Razon Social</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="razon_social" id="razon_social" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="country_id" class="col-md-4 col-form-label text-md-right">RFC</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="rfc_rut_cuit" id="rfc_rut_cuit" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="country_id" class="col-md-4 col-form-label text-md-right">Dirección</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="address" id="address" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row ">
                            <label for="country_id" class="col-md-4 col-form-label text-md-right">Código Postal</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="postal_code" id="postal_code" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ladanumber" class="col-md-4 col-form-label text-md-right">Teléfono</label>

                            <div class="col-md-2">
                                <select name="ladanumber" id="ladanumber" class="form-control">
                                    <option value="00">Select</option>
                                    <option value="+52">México +52</option>
                                    <option value="+59">Uruguay +59</option>
                                   

                                </select>
                            </div>
                            <div class="col-md-4">
                                <input type="number" class="form-control" name="phone"    onkeypress="return checkPhoneNumber(event)"  id="phone-number-client" placeholder="Número*" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row ">
                            <label for="country_id" class="col-md-4 col-form-label text-md-right">Email</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="email" id="email" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row ">
                            <label for="country_id" class="col-md-4 col-form-label text-md-right">PIN</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="pin" id="pin" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row ">
                            <label for="country_id" class="col-md-4 col-form-label text-md-right">Confirmar PIN</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control @error('pin') is-invalid @enderror" name="pin_confirmation" id="pin_confirmation" required autofocus>
                            </div>
                            @error('pin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
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
            @endif

        </div>
    </div>
</div>



@endsection