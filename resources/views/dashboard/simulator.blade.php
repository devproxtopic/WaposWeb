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
                    <table class="table" id="simulator-table" >
                        <thead class="table">
                            <th scope="col">Fecha</th>
                            <th scope="col">Orden</th>
                            <th scope="col">Cliente</th>
                            <th scope="col">Monto</th>
                            <th scope="col">Estatus</th>
                            <th ></th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>14/06/20</td>
                                <td>87347</td>
                                <td>John Doe</td>
                                <td>$120.00 MXN</td>
                                <td style="color: orange">En proceso</td>
                                <td><a class="btn btn-success pagar">Pagar</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
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
                <form id="general_users">

                    <div class="form-group row">
                        <label class="col-md-5 col-form-label"></label>
                        <label class="col-md-3 col-form-label">Orden No.</label>
                        <label for="ordernumber" name="ordernumber" id="ordernumber" class="col-md-2 col-form-label text-align-right"></label>
                    </div>

                    <div class="form-group row ">
                        <label for="country_id" class="col-md-4 col-form-label ">Cliente</label>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="name" id="name"  placeholder="Nombre del cliente" required autofocus>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="ladanumber" id="ladanumber" placeholder="lada" required autofocus>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="phone" id="phone"  placeholder="phone" required autofocus>
                        </div>
                    </div>

            

                    <div class="form-group row ">
                        <label for="country_id" class="col-md-4 col-form-label ">Precio</label>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="currency" id="currency" placeholder="currency" required autofocus>
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="price" id="price" placeholder="price" required autofocus>
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label for="titular" class="col-md-12 col-form-label ">Nombre del titular de la tarjeta</label>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="titular-card" id="titular"  placeholder="Escriba el titular de la tarjeta" required autofocus>
                        </div>
                    </div>

                    <div class="form-group row ">
                        <label for="card-number" class="col-md-12 col-form-label ">Número de la tarjeta</label>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="card-number" id="card-number"  placeholder="Inserte los dígitos de su tarjeta" required autofocus>
                        </div>
                    </div>

                    <div class="form-group row ">
                        <label for="vto" class="col-md-6 col-form-label ">Fecha Vencimiento</label>
                        <label for="cvc" class="col-md-4 col-form-label ">CVC</label>

                    </div>

                    <div class="form-group row">
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="vto" id="vto"  placeholder="09/09" required autofocus>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="cvc" id="cvc"  placeholder="000" required autofocus>
                        </div>
                    </div>









            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Cerrar</button>

            </div>
        </div>
    </div>
</div>


@endsection