@extends('layouts.dashboard')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                <h3 id="subtitle-dashboard-wapos">Registrar producto</h3>    
                </div>

                <div class="card-body">

                    <form id="general_users" method="POST" action="{{ url('/dashboard/products/create')}}" enctype="multipart/form-data">
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
                            <label for="product_id" class="col-md-4 col-form-label text-md-right">Precio</label>

                            <div class="col-md-4">
                            <select name="currency" class="form-control client-select" >
                                    <option value="mxn" name="buyer_id">Pesos Mexicanos</option>
                                    <option value="ugy" name="buyer_id">Pesos Uruguayos</option>
                                    <option value="usd" name="buyer_id">Dólares Americanos</option>
                                </select>                            
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" name="price" id="price" placeholder="9,999.99" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="country_id" class="col-md-4 col-form-label text-md-right">SKU</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="sku" id="sku" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="currency" class="col-md-4 col-form-label text-md-right">Currency</label>

                            <div class="col-md-6">
                            <select name="currency" class="form-control client-select" >
                                    <option value="mxn" >Pesos Mexicanos</option>
                                    <option value="uyu" >Pesos Uruguayos</option>
                                    <option value="usd" >Dólares Americanos</option>
                                </select>                            
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
                <h3 id="subtitle-dashboard-wapos">Productos</h3>    
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
                        @foreach($products as $product)
                        <tr>
                            <td>{{$product->title}}</td>
                            <td>{{$product->description}}</td>
                            <td>{{$product->sku}}</td>
                            <td>{{$product->price}}</td>
                        </tr>
                        @endforeach
                      
                    </tbody>
                </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

