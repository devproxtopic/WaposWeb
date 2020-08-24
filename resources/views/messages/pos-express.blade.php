@extends('layouts.dashboard')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card" >

                <div class="card-header">
                    <h3 id="subtitle-dashboard-wapos">POS Express</h3>
                </div>

                <div class="card-body" style="color: green">
                    <form method="POST" action="{{ url('/messages/create-express')}}">
                        @csrf

                        <div class="form-group row">
                            <label for="service_name" class="col-md-4 col-form-label text-md-right">Nombre</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control client_data" name="service_name"
                                id="service_name" placeholder="Nombre del servicio"  required autofocus>
                            </div>

                            @error('service_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group row">
                            <label for="lada" class="col-md-4 col-form-label text-md-right">Teléfono</label>

                            <div class="col-md-3">
                                <select name="lada"  id="lada" class="form-control" >
                                    <option value="+52">México +52</option>
                                    <option value="+598">Uruguay +598</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <input type="number" class="form-control" name="phone"
                                onkeypress="return checkPhoneNumber(event)"  id="phone-number-client"
                                placeholder="Número*" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="concept" class="col-md-4 col-form-label text-md-right">Concepto</label>

                                <div class="col-md-6">
                                    <textarea class="form-control" name="concept" id="concept"
                                    required autofocus
                                    placeholder="Descripción del servicio"></textarea>

                                @error('concept')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="currency" class="col-md-4 col-form-label text-md-right">Precio</label>

                            <div class="col-md-4">
                                <select name="currency"  id="currency" class="form-control" >
                                    <option value="mxn">Pesos Mexicanos</option>
                                    <option value="ugy">Pesos Uruguayos</option>
                                    <option value="usd">Dólares Americanos</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" name="amount"
                                id="amount" placeholder="9,999.99" required autofocus>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="message" class="col-md-4 col-form-label text-md-right">Mensaje</label>

                            <div class="col-md-6">
                                <textarea class="form-control" name="message" id="message"
                                placeholder="Estimada Sandra, el negocio proxtopic te ha mandado una solicitud de pago por 116 pesos. Confirma tu solicitud en el siguiente link" required autofocus></textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4 text-right">
                                <button type="submit" id="enviar" class="btn btn-success save-general-user">
                                    Enviar
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

@stop

@section('scripts')
<script></script>
@endsection
