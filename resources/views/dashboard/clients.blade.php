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
                                <textarea type="text" class="form-control" name="description" id="description" required autofocus></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="country_id" class="col-md-4 col-form-label text-md-right">Precio</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="price" id="price" required autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="country_id" class="col-md-4 col-form-label text-md-right">SKU</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="sku" id="sku" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4 text-right">
                                <button type="submit" class="btn btn-success save-general-user" disabled>
                                    Guardar
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>

           
            <div class="card-body">

<table class="table">
    <thead class="table">
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Descripcion</th>
            <th scope="col">SKU</th>
            <th scope="col">Precio</th>
        </tr>
    </thead>
    <tbody>
    
      
    </tbody>
</table>

</div>


        </div>
    </div>
</div>
</div>
@endsection