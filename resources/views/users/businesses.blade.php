@extends('layouts.dashboard')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1 id="subtitle-dashboard-wapos">Mis negocios</h1>
            <div class="card">
                <div class="card-header">Registrar un nuevo negocio</div>
                <div class="card-body">
                    <form id="" method="POST" action="{{ url('/dashboard/business/create') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="country_id" class="col-md-4 col-form-label text-md-right">Nombre</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" id="name" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="country_id" class="col-md-4 col-form-label text-md-right">Razon Social</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="razon_social" id="razon_social" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="country_id" class="col-md-4 col-form-label text-md-right">RFC</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="rfc_rut_cuit" id="rfc_rut_cuit" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="country_id" class="col-md-4 col-form-label text-md-right">Dirección</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="address" id="address" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row ">
                            <label for="country_id" class="col-md-4 col-form-label text-md-right">Código Postal</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="postal_code" id="postal_code" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row ">
                            <label for="country_id" class="col-md-4 col-form-label text-md-right">Teléfono</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="phone" id="phone" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row ">
                            <label for="country_id" class="col-md-4 col-form-label text-md-right">Email</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="email" id="email" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row ">
                            <label for="country_id" class="col-md-4 col-form-label text-md-right">PIN</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="pin" id="pin" required autofocus>
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
        </div>
    </div>
</div>
@endsection