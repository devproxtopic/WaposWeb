@extends('layouts.dashboard')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">
                    <h3 id="subtitle-dashboard-wapos">Ordenes</h3>
                        <div class="text-right">
                            <a href="{{ url('dashboard/orders/create') }}" class="btn btn-success">
                                Crear nueva orden
                            </a>
                        </div>
                </div>

                <div class="card-body" style="color: green">
                    <table class="table" id="datatable" >
                        <thead class="table">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Cliente</th>
                                <th scope="col">Monto</th>
                                <th scope="col">Estatus</th>
                                <th scope="col">Info</th>
                                <th style="display:none;">Info</th>
                                <th style="display:none;">Info</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            <tr>
                                <td>{{ $order->ordernumber }}</td>
                                <td>{{ $order->created_at->format('d-m-Y') }}</td>
                                <td>{{ getFullName($order->buyer_id) }}</td>
                                <td>{{ $order->amount }}</td>
                                @if($order->transaction)
                                @switch($order->transaction->status_id){{-- Status = 1 -> Completo --}}
                                @case(1)
                                <td style="color: green">{{ $order->transaction->status->name }}</td>
                                @break
                                @case(2) {{-- Status = 2 -> Pendiente --}}
                                <td style="color: orange">{{ $order->transaction->status->name }}</td>
                                @break
                                @endswitch
                                @else
                                <td></td>
                                @endif
                                <td style="display:none;">{{ getFullBuyer($order->buyer_id) }}</td>
                                <td style="display:none;">{{ getProductInformation($order->product_id) }}</td>
                                <td><a class="badge badge-success edit">Info</a></td>

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


<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detalle de transacción</h5>
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
                            <input  disabled type="text" class="form-control" name="name" id="name"  placeholder="Nombre del cliente" required autofocus>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-4">
                            <input type="text" disabled class="form-control" name="ladanumber" id="ladanumber" placeholder="lada" required autofocus>
                        </div>
                        <div class="col-md-8">
                            <input type="text"  disabled class="form-control" name="phone" id="phone"  placeholder="phone" required autofocus>
                        </div>
                    </div>

                    <div class="form-group row ">
                        <label for="country_id" class="col-md-4 col-form-label ">Producto</label>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <input type="text" disabled class="form-control" name="product_name" id="product_name" placeholder="Nombre del producto" required autofocus>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <textarea type="text" disabled class="form-control" name="description" id="description" required autofocus></textarea>
                        </div>
                    </div>

                    <div class="form-group row ">
                        <label for="country_id" class="col-md-4 col-form-label ">Precio</label>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3">
                            <input type="text" disabled class="form-control" name="currency" id="currency" placeholder="currency" required autofocus>
                        </div>
                        <div class="col-md-3">
                            <input type="text"  disabled class="form-control" name="price" id="price" placeholder="price" required autofocus>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Cerrar</button>

            </div>
        </div>
    </div>
</div>

@stop

@section('scripts')
<script>
$(document).ready(function() {
    var table = $('#datatable').DataTable();
    table.on('click', '.edit', function() {
        $tr = $(this).closest('tr');
        if ($($tr).hasClass('child')) {
            $tr = $tr.prev('.parent');
        }

        var data = table.row($tr).data();
        console.log(data);
        $userFields = JSON.parse(data[6]);
        $productFields = JSON.parse(data[7]);

        $('#product_id').val(data[3]);
        $('#ordernumber').text(data[1]);
        $('#name').val($userFields["name"]);
        $('#phone').val($userFields["phone"]);
        $('#product_name').val($productFields["title"]);
        $('#currency').val($productFields["currency"]);
        $('#description').val($productFields["description"]);
        $('#price').val('$' + $productFields["price"]);
        $('#editModal').modal('show');
    });
});
</script>
@stop
