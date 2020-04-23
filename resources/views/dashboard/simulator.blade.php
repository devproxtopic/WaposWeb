@extends('layouts.dashboard')

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
                            <th style="display:none;"></th>
                            <th></th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td name="date">14/06/20</td>
                                <td name="ordernumber">87347</td>
                                <td name="buyer_id">John Doe</td>
                                <td name="amount">$120.00 MXN</td>
                                <td style="color: orange" name="transaction_status">en proceso</td>
                                <td name="concept">Concepto de compra</td>
                                <td name="product_id" style="display:none;">1</td>
                                <td name="payment_type" style="display:none;">credito</td>
                                <td style="display:none;">{{getFullName(1)}}</td>
                                <td style="display:none;">{{getProductInformation(1)}}</td>
                                <td><a class="btn btn-success pagar">Pagar</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="PagarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Realizar pago</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="general_users" method="POST" action="{{ url('/dashboard/transactions/create')}}">
                    @csrf
                    <div class="form-group row">
                        <label class="col-md-5 col-form-label"></label>
                        <label class="col-md-3 col-form-label">Orden No.</label>
                        <label for="orderno" class="form-control" name="orderno" id="orderno" class="col-md-2 col-form-label text-align-right"></label>
                    </div>

                    <div class="form-group row ">
                        <label for="client" class="col-md-4 col-form-label ">Cliente</label>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="name" id="name" placeholder="Nombre del cliente" required autofocus>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="ladanumber" id="ladanumber" placeholder="lada" required autofocus>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="phone" required autofocus>
                        </div>
                    </div>

                    <div class="form-group row ">
                        <label for="country_id" class="col-md-4 col-form-label ">Precio</label>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="currency" id="currency" placeholder="currency" required autofocus>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="amount" id="amount" placeholder="price" required autofocus>
                        </div>
                    </div>

                    <div class="form-group row ">
                        <label for="titular" class="col-md-12 col-form-label ">Nombre del titular de la tarjeta</label>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="titular-card" id="titular" placeholder="Escriba el titular de la tarjeta" required autofocus>
                        </div>
                    </div>

                    <div class="form-group row ">
                        <label for="card-number" class="col-md-12 col-form-label ">Número de la tarjeta</label>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <input type="number" class="form-control" onkeypress="return checkNumberCard(event)" name="card-number" id="card-number" placeholder="Inserte los dígitos de su tarjeta" required autofocus>
                        </div>
                    </div>

                    <div class="form-group row ">
                        <label for="vto" class="col-md-6 col-form-label ">Fecha Vencimiento</label>
                        <label for="cvc" class="col-md-4 col-form-label ">CVC</label>
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
                    <input type="text" class="form-control" name="product_id"value="2" style="display:none;" class="col-md-4 col-form-label ">
                    <input type="text" class="form-control" name="buyer_id" value="2" style="display:none;" class="col-md-4 col-form-label ">
                    <input type="text" class="form-control" name="concept" value="producto importado" style="display:none;" class="col-md-4 col-form-label ">
                    <input type="text" class="form-control" name="payment_type" value="credito" style="display:none;" class="col-md-4 col-form-label ">
                    <input type="text" class="form-control" name="date" value="2020-04-22 17:54:28"  style="display:none;" class="col-md-4 col-form-label ">
                    <input type="text" class="form-control" name="transaction_status" id="transaction_status"  style="display:none;" class="col-md-4 col-form-label ">
                    <input type="text" class="form-control" name="ordernumber" id="ordernumber"  style="display:none;" class="col-md-4 col-form-label ">



                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection