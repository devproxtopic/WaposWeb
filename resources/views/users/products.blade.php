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
                            <label for="title" class="col-md-4 col-form-label text-md-right">Nombre producto/servicio</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="title" id="title" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">Descripción</label>

                            <div class="col-md-6">
                                <textarea type="text" class="form-control" name="description" id="description" required autofocus></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="product_id" class="col-md-4 col-form-label text-md-right">Precio</label>

                            <div class="col-md-4">
                                <select name="currency" class="form-control">
                                    <option value="mxn">Pesos Mexicanos</option>
                                    <option value="ugy">Pesos Uruguayos</option>
                                    <option value="usd">Dólares Americanos</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" name="price" id="price" placeholder="9,999.99" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="sku" class="col-md-4 col-form-label text-md-right">SKU</label>

                            <div class="col-md-6">
                                <input type="number" class="form-control  @error('sku') is-invalid @enderror" name="sku" id="sku" required autofocus>
                                @error('sku')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="image-product" class="col-md-4 col-form-label text-md-right">Subir Imagen</label>

                            <div class="col-md-6">
                                <input type="file" class="form-control-plaintext" name="image-product">
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

                    <table class="table" id="table-products-img">
                        <thead class="table">
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Descripcion</th>
                                <th scope="col">SKU</th>
                                <th scope="col">Precio</th>
                                <th style="display:none;"></th>
                                <th scope="col">Imagen</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td>{{$product->title}}</td>
                                <td>{{$product->description}}</td>
                                <td>{{$product->sku}}</td>
                                <td>{{$product->price}}</td>
                                @if($product->image)
                                <td style="display:none;">{{ url('storage/'.$product->image) }}</td>
                                <td><a class="btn btn-success imagenDetail">Ver img</a></td>
                                @else
                                <td style="display:none;"></td>
                                <td><a class="btn btn-warning disabled">No disponible</a></td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="detailImage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <label>
                        <h3 id="name-product"></h3>
                    </label>
                </div>
                <div class="row">
                    <label id="description-product"></label>
                </div>
                <img src="" id="imageProduct" style="width: 200px; height: 264px;">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>

    </div>

</div>
@endsection