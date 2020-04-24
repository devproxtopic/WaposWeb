@extends('layouts.dashboard')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <h3 id="subtitle-dashboard-wapos">Registrar cliente</h3>
                </div>

                <div class="card-body">

                    <form id="general_users" method="POST" action="{{ url('/dashboard/clients/create')}}">
                        @csrf
                        <div class="form-group row">
                            <label for="country_id" class="col-md-4 col-form-label text-md-right">Nombre</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" id="name" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="country_id" class="col-md-4 col-form-label text-md-right">Apellido</label>

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
                                    <option value="+59">Uruguay +59</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="phone" id="phone" placeholder="Número*" required autofocus>
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


            <div class="card">
                <div class="card-header">
                    <h3 id="subtitle-dashboard-wapos">Clientes</h3>
                </div>
                <div class="card-body">
                    <table class="table" id="clients-table">
                        <thead class="table">
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido</th>
                            <th scope="col">Teléfono</th>
                            <th scope="col">Fecha de nacimiento</th>
                            <th scope="col">Transacciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($buyers as $buyer)
                            <tr>
                                <td>{{$buyer->name}}</td>
                                <td>{{$buyer->lastname}}</td>
                                <td>{{$buyer->phone}}</td>
                                <td>{{$buyer->date_of_birth}}</td>
                                <td><a class="btn btn-success transacciones">Transacciones</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<div class="modal fade" id="transaction-client" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Transacciones</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead class="table">
                        <th scope="col">Fecha</th>
                        <th scope="col">Orden</th>
                        <th scope="col">Cliente</th>
                        <th scope="col">Monto</th>
                        <th scope="col">Estatus</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td name="date">14/06/20</td>
                            <td name="ordernumber">87347</td>
                            <td name="buyer_id">John Doe</td>
                            <td name="amount">$120.00 MXN</td>
                            <td style="color: green" name="transaction_status">Completado</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection