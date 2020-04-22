@extends('layouts.dashboard')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">
                    <h3 id="subtitle-dashboard-wapos">POS</h3>
                </div>

                <div class="card-body" style="color: green">
                    <form id="general_users" method="" action="{{ url('')}}">
                        @csrf
                        <div class="form-group row">
                            <label for="buyer_id" class="col-md-4 col-form-label text-md-right">Cliente</label>

                            <div class="col-md-6">
                                <select name="buyer_id" class="form-control">
                                    @foreach($buyers as $buyer)
                                    <option value="{{$buyer->id}}" name="buyer_id">{{$buyer->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="product_id" class="col-md-4 col-form-label text-md-right">Producto</label>

                            <div class="col-md-6">
                                <select name="product_id" class="form-control">
                                    @foreach($products as $product)
                                    <option value="{{$product->id}}" name="product_id">{{$product->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="country_id" class="col-md-4 col-form-label text-md-right">Mensaje</label>

                            <div class="col-md-6">
                                <textarea type="text" class="form-control" name="message" id="message" placeholder="Estimada Sandra, el negocio proxtopic te ha mandado una solicitud de pago por 116 pesos. Confirma tu solicitud en el siguiente link" required autofocus></textarea>
                            </div>
                        </div>

   

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4 text-right">
                                <button type="submit" class="btn btn-success save-general-user">
                                    Enviar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>


            </div>





        </div>
    </div>
</div>
</div>
@endsection