@extends('layouts.dashboard')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 id="subtitle-dashboard-wapos">Registrar orden</h3>
                </div>

                <div class="card-body">

                    <form id="newOrder" method="POST" action="{{ url('/dashboard/orders/create')}}">
                        @csrf
                        <div class="form-group row">
                            <label for="buyer_id" class="col-md-2 col-form-label text-md-right">Cliente</label>

                            <div class="col-md-8">
                                <select name="buyer_id" id="buyer_id" class="form-control">
                                    <option value="">Seleccione una opción</option>
                                    @foreach($buyers as $buyer)
                                    <option value="{{ $buyer->id }}">{{ $buyer->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="country_id" class="col-md-2 col-form-label text-md-right">Concepto</label>

                            <div class="col-md-8">
                                <input type="text" class="form-control" name="concept" id="concept" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="payment_type" class="col-md-2 col-form-label text-md-right">Tipo de pago</label>

                            <div class="col-md-8">
                                <select name="payment_type" id="payment_type" class="form-control">
                                    <option value="">Seleccione una opción</option>
                                    <option selected>Stripe</option>
                                    <option>Efectivo</option>
                                    <option>Tarjeta</option>
                                    <option>Depósito</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date" class="col-md-2 col-form-label text-md-right">Fecha</label>

                            <div class="col-md-8">
                                <input id="date" type="date" class="form-control " name="date" required
                                autocomplete="date" autofocus>

                                @error('date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{-- <div class="row"> --}}
                            <div class="form-group row">
                                <label for="product_id" class="col-md-2 col-form-label text-md-right">Producto</label>
                                <div class="col-md-4">
                                    <select class="form-control select2" id="product_id" name="product_id">
                                        <option value="">Seleccione una opción</option>
                                        @foreach($products as $product)
                                        <option value="{{ $product->id }}" price="{{ $product->price }}" sku="{{ $product->sku }}" title="{{ $product->title }}">
                                            {{ $product->sku . ' - ' . $product->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <label for="quantity" class="col-md-2 col-form-label text-md-right">Cantidad</label>
                                <div class="col-md-2">
                                    <input type="text" class="form-control" id="quantity" name="quantity">
                                </div>

                                <button type="button" class="btn btn-info add">Agregar</button>
                            </div>
                        {{-- </div> --}}
                        <div class="form-group row">
                            <div class="col-md-12 ">
                                <table class="table" id="product_list">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Código SKU</th>
                                        <th>Producto</th>
                                        <th>Cantidad</th>
                                        <th>Precio</th>
                                        <th>Subtotal</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        {{-- SE LLENA CON AJAX --}}
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="amount" class="col-md-2 col-form-label text-md-right">Total</label>

                            <div class="col-md-8">
                                <input type="text" class="form-control" readonly name="amount" id="amount"
                                required autofocus>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4 text-right">
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
</div>
@stop

@section('scripts')
<script src="{{ asset('js/orders.js') }}"></script>
@stop

