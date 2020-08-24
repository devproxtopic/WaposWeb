@extends('layouts.dashboard')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card" >

                <div class="card-header">
                    <h3 id="subtitle-dashboard-wapos">POS</h3>
                </div>

                <div class="card-body" style="color: green">
                    <form id="general_users" method="POST" action="{{ url('/messages/create')}}">
                        @csrf
                        <div class="form-group row">
                            <label for="buyer_id" class="col-md-4 col-form-label text-md-right">Cliente</label>

                            <div class="col-md-6">
                                <select name="buyer_id" class="form-control client-select-pos" >
                                    <option value="">Seleccionar</option>
                                    <option value="0">Registrar nuevo cliente</option>
                                    @foreach($buyers as $buyer)
                                    <option value="{{ $buyer->id }}"> {{ $buyer->name }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nombre</label>

                            <div class="col-md-6">
                                <input readonly type="text" class="form-control client_data" name="name"
                                id="name" placeholder="Escriba el nombre del cliente"  required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lastname" class="col-md-4 col-form-label text-md-right">Apellido</label>

                            <div class="col-md-6">
                                <input readonly type="text" class="form-control client_data" name="lastname"
                                id="lastname" placeholder="Escriba el apellido del cliente" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date_of_birth" class="col-md-4 col-form-label text-md-right">Fecha de Nacimiento</label>

                            <div class="col-md-6">
                                <input readonly type="date" class="form-control client_data" name="date_of_birth"
                                id="date_of_birth" required autofocus>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="lada" class="col-md-4 col-form-label text-md-right">Teléfono</label>

                            <div class="col-md-3">
                                <select disabled name="lada"  id="lada" class="form-control client_data" >
                                    <option value="+52">México +52</option>
                                    <option value="+598">Uruguay +598</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <input readonly type="number" class="form-control client_data" name="phone"
                                onkeypress="return checkPhoneNumber(event)"  id="phone-number-client"
                                placeholder="Número*" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ordernumber" class="col-md-4 col-form-label text-md-right">Número de orden</label>

                            <div class="col-md-6">
                                <select name="ordernumber"  id="ordernumber" class="form-control" >
                                    <option value="">Seleccione una opción</option>
                                    @foreach ($orders as $order)
                                        <option value="{{ $order->ordernumber }}">{{ $order->ordernumber . ' - ' . getFullName($order->buyer_id) }} </option>
                                    @endforeach
                                </select>
                                @error('ordernumber')
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
                                <input type="text" class="form-control" name="price" id="price" placeholder="9,999.99" required autofocus>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="message" class="col-md-4 col-form-label text-md-right">Mensaje</label>

                            <div class="col-md-6">
                                <textarea type="text" class="form-control" name="message" id="message" placeholder="Estimada Sandra, el negocio proxtopic te ha mandado una solicitud de pago por 116 pesos. Confirma tu solicitud en el siguiente link" required autofocus></textarea>
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
<script>
$(document).ready(function() {
    var customer_name = "";
    var business_name = "";
    var price = "";
    $('.client-select-pos').change(function() {
        var baseUrl = $('#url_base').val();
        var valId = $('.client-select-pos').val();

        $('.client_data').prop('disabled', false);
        $('.client_data').prop('readonly', false);

        if (valId) {
            $('.client_data').prop('disabled', false);
            $('.client_data').prop('readonly', false);
            if (valId != 0) {
                $.ajax({
                    type: 'GET', //THIS NEEDS TO BE GET
                    url: baseUrl + '/buyers/' + valId,
                    success: function(data) {
                        $buyer = data[0];
                        customer_name = $buyer["name"] + " " + $buyer["lastname"];
                        $('#name').val($buyer["name"]);
                        $('#lastname').val($buyer["lastname"]);
                        $('#lada').val($buyer["ladanumber"]);
                        $('#phone').val($buyer["phone"]);
                        $('#date_of_birth').val($buyer["date_of_birth"]);

                        messagePOS(customer_name, price, business_name);

                    },
                    error: function() {
                        console.log('no success');
                        console.log(data);
                    }
                });
            }
        }
    });
});
</script>
@endsection
