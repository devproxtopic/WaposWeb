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
                                <select name="buyer_id" class="form-control client-select" >
                                    <option value="select" name="buyer_id">Seleccionar</option>
                                    <option value="0" name="buyer_id">Registrar nuevo cliente</option>
                                    @foreach($buyers as $buyer)
                                    <option value="{{$buyer->id}}" name="buyer_id">{{$buyer->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="product_id" class="col-md-4 col-form-label text-md-right">Nombre</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" id="name" placeholder="Escriba el nombre del cliente" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="product_id" class="col-md-4 col-form-label text-md-right">Apellido</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Escriba el apellido del cliente" required autofocus>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="product_id" class="col-md-4 col-form-label text-md-right">Teléfono</label>

                            <div class="col-md-2">
                            <select name="lada" class="form-control client-select" >
                                    <option value="mxn" name="buyer_id">México +52</option>
                                    <option value="ugy" name="buyer_id">Uruguay +59</option>
                                </select>                            
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="phone" id="phone" placeholder="Número*" required autofocus>
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
                            <label for="product_id" class="col-md-4 col-form-label text-md-right">Producto</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" id="name" placeholder="Nombre del producto*" required autofocus>
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