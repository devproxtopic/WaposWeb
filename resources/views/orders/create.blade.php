@extends('layouts.dashboard')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 id="subtitle-dashboard-wapos">Registrar orden</h3>
                </div>

                <div class="card-body">

                    <form id="newOrder" method="POST" action="{{ url('/dashboard/orders/create')}}">
                        @csrf
                        <div class="form-group row">
                            <label for="buyer_id" class="col-md-4 col-form-label text-md-right">Clientes</label>

                            <div class="col-md-6">
                                <select name="buyer_id" id="buyer_id" class="form-control">
                                    <option value="">Seleccione una opción</option>
                                    @foreach($buyers as $buyer)
                                    <option value="{{ $buyer->id }}">{{ $buyer->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="country_id" class="col-md-4 col-form-label text-md-right">Concepto</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="lastname" id="descrlastnameiption" required autofocus></input>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="product_id" class="col-md-4 col-form-label text-md-right">Teléfono</label>

                            <div class="col-md-2">
                                <select name="ladanumber" id="ladanumber" class="form-control">
                                    <option value="00">Select</option>
                                    <option value="+52">México +52</option>
                                    <option value="+59">Uruguay +598</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <input type="number" class="form-control" name="phone" onkeypress="return checkPhoneNumber(event)"  id="phone-number-client" placeholder="Número*" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date_of_birth" class="col-md-4 col-form-label text-md-right">Fecha de Nacimiento</label>

                            <div class="col-md-6">
                                <input id="date_of_birth" type="date" class="form-control " name="date_of_birth" required autocomplete="date_of_birth" autofocus>

                                @error('date_of_birth')
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
        </div>
    </div>
</div>
</div>
@endsection
