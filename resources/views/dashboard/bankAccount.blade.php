@extends('layouts.dashboard')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">
                    <h3 id="subtitle-dashboard-wapos">Resumen</h3>
                </div>

                <div class="card-body" style="color: green">
                    <h2 class="display-3">$000.000 MXN</h2>
                </div>

                <div class="card-body">
                    21 de Marzo 2020
                </div>

            </div>

            <div class="card">

                <div class="card-header">
                    <h3 id="subtitle-dashboard-wapos">Movimientos Recientes</h3>
                </div>
                <table class="table">
                    <thead class="table-primary">
                        <tr>
                            <th scope="col">Fecha</th>
                            <th scope="col">Cliente</th>
                            <th scope="col">Monto</th>
                            <th scope="col">Estatus</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>

                            <td>14/06/20</td>
                            <td>John Doe</td>
                            <td>$120.00 MXN</td>
                            <td style="color: green">Completado</td>
                        </tr>
                        <tr>
                            <td>14/06/20</td>
                            <td>John Doe</td>
                            <td>$120.00 MXN</td>
                            <td style="color: red">Fallido</td>
                        </tr>
                        <tr>
                            <td>14/06/20</td>
                            <td>John Doe</td>
                            <td>$120.00 MXN</td>
                            <td style="color: orange">En procceso</td>
                        </tr>
                    </tbody>
                </table>


            </div>



        </div>
    </div>
</div>
</div>
@endsection