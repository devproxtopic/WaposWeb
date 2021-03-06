@extends('layouts.dashboard_simulator')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">
                    <h3 id="subtitle-dashboard-wapos">Simulador de pago</h3>
                </div>

                <div class="card-body" style="color: green">
                    <table class="table" id="simulator-table">
                        <thead class="table">
                            <th scope="col">Fecha</th>
                            <th scope="col">Orden</th>
                            <th scope="col">Cliente</th>
                            <th scope="col">Monto</th>
                            <th scope="col">Estatus</th>
                            <th scope="col">Concepto</th>
                            <th style="display:none;"></th>
                            <th style="display:none;"></th>
                            <th style="display:none;"></th>
                            <th></th>
                            <th></th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($transactions as $transaction)
                            <tr>
                                <td>{{$transaction->date}}</td>
                                <td>{{$transaction->ordernumber}}</td>
                                <td>{{getFullName($transaction->buyer_id)}}</td>
                                <td>{{$transaction->amount}}</td>
                                <td style="color: orange">{{$transaction->transaction_status}}</td>
                                <td>{{$transaction->concept}}</td>
                                <td style="display:none;">{{$transaction->payment_type}}</td>
                                <td style="display:none;">{{getFullName($transaction->buyer_id)}}</td>
                                <td style="display:none;">{{getProductInformation($transaction->product_id)}}</td>
                                <td><a class="btn btn-success pagar">Pagar</a></td>
                                <td>
                                    <form action="{{ url('/api/payment')}}" method="POST">
                                        <script src="https://checkout.stripe.com/checkout.js" class="stripe-button" //data-key="pk_test_bOwsCmDWzdS8k2SYwvX3WoIn00tK9Z5yXo" data-key="{{ env('STRIPE_PK')}}" data-amount="34000000" data-name="Juan Salaz" data-description="Example charge" data-image="https://stripe.com/img/documentation/checkout/marketplace.png" data-locale="auto" data-currency="mxn">

                                        </script>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="PagarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header " id="modal-purchase">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-money" style="color:white" aria-hidden="true"> </i> <span>Realizar pago</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form id="payment-form" method="POST" action="/charge">
                    @csrf
                    <div class="form-group row">
                        <label class="col-md-5 col-form-label "></label>
                        <label class="col-md-3 col-form-label " id="title-purchase">Orden No.</label>
                        <input for="orderno" name="orderno" id="orderno" class=" form-control col-md-2 col-form-label text-align-right" require autofocus disabled>
                    </div>

                    <div class="form-group row ">
                        <label for="client" class="col-md-4 col-form-label " id="title-purchase">Cliente</label>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="name" id="name" placeholder="Nombre del cliente" required autofocus disabled>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="ladanumber" id="ladanumber" placeholder="lada" required autofocus disabled>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="phone" required autofocus disabled>
                        </div>
                    </div>

                    <div class="form-group row ">
                        <label for="country_id" class="col-md-4 col-form-label " id="title-purchase">Precio</label>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="currency" id="currency" placeholder="currency" required autofocus disabled>
                        </div>
                       
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="amount" id="amount"  required autofocus disabled>
                            <input type="hidden" class="form-control" name="amount_db" id="amount_db"required autofocus>

                        </div>
                    </div>
                    <!--
                    <div class="form-group row ">
                        <label for="titular" class="col-md-12 col-form-label " id="title-purchase">Nombre del titular de la tarjeta</label>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="titular-card" id="titular" placeholder="Escriba el titular de la tarjeta" required autofocus>
                        </div>
                    </div>

                    <div class="form-group row ">
                        <label for="card-number" class="col-md-12 col-form-label " id="title-purchase">Número de la tarjeta</label>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <input type="number" class="form-control" onkeypress="return checkNumberCard(event)" name="card-number" id="card-number" placeholder="Inserte los dígitos de su tarjeta" required autofocus>
                        </div>
                    </div>

                    <div class="form-group row ">
                        <label for="vto" class="col-md-6 col-form-label " id="title-purchase">Fecha Vencimiento</label>
                        <label for="cvc" class="col-md-4 col-form-label " id="title-purchase">CVC</label>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-3">
                            <input type="text" class="form-control" onkeypress="return checkMonth(event)" name="month" id="month" placeholder="01" required autofocus>
                        </div>/
                        <div class="col-md-3">
                            <input type="text" class="form-control" onkeypress="return checkYear(event)" name="year" id="year" placeholder="20" required autofocus>
                        </div>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="cvc" id="cvc" onkeypress="return checkCVC(event)" placeholder="000" required autofocus>
                        </div>
                    </div>


-->


                    <div class="form-group row">
                        <div class="col-md-5">
                            <label for="card-element" id="title-purchase">
                                Credit or debit card
                            </label>
                        </div>
                    </div>
                    <div class="form-group row">
                    <div class="col-md-12">
                        <div style="width: 30em" id="card-element">
                            <!-- A Stripe Element will be inserted here. -->
                        </div>

                        <!-- Used to display Element errors. -->
                        <div id="card-errors" role="alert"></div>
                    </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success">Pagar</button>
                    </div>
                </form>
                <script src="https://js.stripe.com/v3/"></script>
            </div>
        </div>
    </div>

</div>
@endsection