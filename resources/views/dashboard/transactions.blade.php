@extends('layouts.dashboard')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">
                    <h3 id="subtitle-dashboard-wapos">Transacciones</h3>
                </div>

                <div class="card-body" style="color: green">
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
                                @foreach($transactions as $transaction)
                                <tr>
                                    <td>{{$transaction->created_at}}</td>
                                    <td>{{$transaction->ordernumber}}</td>
                                    <td>{{$transaction->amount}}</td>
                                    <td>{{$transaction->buyer_id}}</td>
                                    <td>{{$transaction->transaction_status}}</td>
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



@endsection