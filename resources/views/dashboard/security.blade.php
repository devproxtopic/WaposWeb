@extends('layouts.dashboard')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">
                    <h3 id="subtitle-dashboard-wapos">Seguridad</h3>
                </div>

                <div class="card-body" style="color: green">
                <a class="btn btn-success" href="{{ url('/edit-password') }}">Cambiar contraseña</a>

                </div>


            </div>

           



        </div>
    </div>
</div>
</div>
@endsection