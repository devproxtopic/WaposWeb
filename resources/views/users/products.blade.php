@extends('layouts.dashboard')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <h1>Mis productos</h1>
            <div class="card">
                <div class="card-header">Datos Generales</div>
                <div class="card-body">
                    <form id="general_users" method="POST" action="{{ url('/dashboard/products/create')}}">
                        @csrf
                        <div class="form-group row">
                            <label for="country_id" class="col-md-4 col-form-label text-md-right">Nombre producto/servicio</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="title" id="title" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="country_id" class="col-md-4 col-form-label text-md-right">Descripción</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="description" id="description" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="country_id" class="col-md-4 col-form-label text-md-right">Precio</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="price" id="price" required autofocus>
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

